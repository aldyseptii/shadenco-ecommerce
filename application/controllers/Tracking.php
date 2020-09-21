<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracking extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("product_model");
        $this->load->model("slider_model");
        $this->load->model("category_model");
        $this->load->model("page_model");
        $this->load->library("cart_session");
        
        $this->load->model("midtrans");

        $this->load->model("invoice_model");

    }

    function index() {
        if(!empty($this->input->get("order_id"))) {
            redirect(base_url("tracking/order".$this->input->get("order_id")));
        }
        if(!empty($this->input->post("order_id"))) {
            redirect(base_url("tracking/order".$this->input->post("order_id")));
        }
        $push['productlist'] = $this->product_model->all_product()->result();
        $push['sliders'] = $this->slider_model->all_slider()->result();
        $push['categories'] = $this->category_model->get_all()->result();
        $push['pages'] = $this->page_model->all_page()->result();
        $push['cart'] = $this->cart_session->get_cart($this->session->cart);

        $this->load->view('shop/header',$push);
        $this->load->view('shop/tracking_order/index',$push);
        $this->load->view('shop/footer',$push);
    }
    function order($order_id) {

        $email = $this->input->post('email_invoice');

        if(empty($email)) {
            $email = $this->session->email_invoice;
        }

        $push['pagetitle'] = "Status Pesanan #".$order_id;
        $push['productlist'] = $this->product_model->all_product()->result();
        $push['sliders'] = $this->slider_model->all_slider()->result();
        $push['categories'] = $this->category_model->get_all()->result();
        $push['pages'] = $this->page_model->all_page()->result();
        $push['cart'] = $this->cart_session->get_cart($this->session->cart);
        $push['clientkey'] = $this->midtrans->get_access("clientkey");

        $querycek = $this->invoice_model->get_invoice_by_email($order_id,$email);

        if($querycek->num_rows() < 1) {
            $push['not_found'] = 1;
        } else {
            $push['invoice'] = $this->invoice_model->get_invoice($order_id)->row_array();
            $push['detail_invoice'] = $this->invoice_model->get_invoice_detail($push['invoice']['id_invoice'])->result_array();
            $push['invoice']['text_status_invoice'] = $this->toolset->order_status( $push['invoice']['status_invoice']);

            $push['not_found'] = 0;
        }
        

        $this->load->view('shop/header',$push);
        $this->load->view('shop/tracking_order/show',$push);
        $this->load->view('shop/footer',$push);
    }
}