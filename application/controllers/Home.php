<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("product_model");
        $this->load->model("slider_model");
        $this->load->model("category_model");
        $this->load->model("page_model");
        $this->load->model("product_list");
        $this->load->library("cart_session");

    }

    function index() {
        $push['productlist'] = $this->product_list->showall("id_product-DESC",NULL,[0,8])->result();
        $push['toplist'] = $this->product_list->showall("total_rating-DESC",NULL,[0,4])->result();
        $push['sliders'] = $this->slider_model->all_slider()->result();
        $push['categories'] = $this->category_model->get_all()->result();
        $push['pages'] = $this->page_model->all_page()->result();
        $push['cart'] = $this->cart_session->get_cart($this->session->cart);

        $this->load->view('shop/header',$push);
        $this->load->view('shop/index',$push);
        $this->load->view('shop/footer',$push);
    }

    function get_token() {
        $this->load->model("midtrans");
        $push['order_id'] = "2020012286";
        $push['status_code'] = 200;
        $grossAmount = 200000+41000;
        $push['gross_amount'] = $grossAmount.".00";
        $serverKey = $this->midtrans->get_access("serverkey");
        $input = $push['order_id'].$push['status_code'].$push['gross_amount'].$serverKey;
        $signature = openssl_digest($input, 'sha512');
        $push['signature_key'] = $signature;
        echo json_encode($push);
    }
    
    function notif_midtrans() {
        
        $this->load->model("midtrans");
        $this->load->model("invoice_model");
        $this->load->library('cart_session');
        $json = json_decode(trim($this->input->raw_input_stream),TRUE);
        if(!isset($json['order_id'])) {
            $error = "Order ID tidak sesuai";
        } else {
            $orderid = $json['order_id'];
            $statusCode = $json['status_code'];
            $grossAmount = $json['gross_amount'];
            $serverKey = $this->midtrans->get_access("serverkey");

            $input = $orderid.$statusCode.$grossAmount.$serverKey;
            $signature = openssl_digest($input, 'sha512');

            if($signature != $json['signature_key']){
                $error = "signature key salah";
            } else {

                $response = $this->midtrans->get_status($orderid,$serverKey);
                
                if(!isset($response['status_code'])) {
                    $error = "curlopt gagal";
                } else {
                    $settlement = ['capture','settlement'];
                    $fraudarray = ['accept','challenge'];
                    $fraud = 0;

                    if($response['status_code'] != 200) {
                        if($response['status_code'] != 201) {
                            $pending = TRUE;
                        }
                    }

                    if(isset($response['fraud_status'])) {
                        if(!in_array($response['fraud_status'],$fraudarray)) {
                            $pending = TRUE;
                        }
                        $fraud = 1;
                    }

                    if(!in_array($response['transaction_status'],$settlement)) {
                        $pending = TRUE;
                    }

                    if(!isset($pending)) {
                        if(!$fraud) {
                            $dataupdate = [
                                'status_invoice' => 3
                            ];
                        } else {
                            if($response['fraud_status'] == "accept") {
                                $dataupdate = [
                                    'status_invoice' => 3
                                ];
                            } else {
                                $dataupdate = [
                                    'status_invoice' => 2
                                ];
                            }
                        }
                        $this->invoice_model->put_invoice($orderid,$dataupdate);
                    } else {
                        if($response['status_code'] == 202) {
                            if($response['transaction_status'] == 'expire') {

                                $carts = $this->invoice_model->get_invoice_detail_byno($orderid)->result();
                                $cartappend = array();

                                foreach($carts as $cart) {
                                    $cartappend[$id] = [$cart->id_product,$cart->qty_detail];
                                }

                                $datacart['data'] = $this->cart_session->get_cart($cartappend);

                                $countstock = array();

                                foreach($datacart['data'] as $crt) {
                                    $row2 = array();
                                    $row2['id_product'] = $crt['id'];
                                    $row2['stock_product'] = $crt['stock'] + $crt['qty'];
                                    $countstock[] = $row2;
                                }
                                $this->invoice_model->update_stock($countstock);
                                $this->invoice_model->delete_invoice($orderid);
                            }
                        }
                    }

                }
        
            }
        }

    }
}