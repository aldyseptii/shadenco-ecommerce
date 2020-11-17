<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("product_model");
        $this->load->model("slider_model");
        $this->load->model("category_model");
        $this->load->model("page_model");
        $this->load->library("cart_session");

    }

    function index() {
        $push['productlist'] = $this->product_model->all_product()->result();
        $push['sliders'] = $this->slider_model->all_slider()->result();
        $push['categories'] = $this->category_model->get_all()->result();
        $push['pages'] = $this->page_model->all_page()->result();
        $push['cart'] = $this->cart_session->get_cart($this->session->cart);
        $push['pagetitle'] = "Keranjang Belanja";

        $this->load->view('shop/header',$push);
        $this->load->view('shop/cart',$push);
        $this->load->view('shop/footer',$push);
    }

    function delete() {
        $callback['status'] = 1;
        $callback['msg'] = "Berhasil menghapus item";
        $callback['csrf_regenerate'] = $this->security->get_csrf_hash();

        $id = $this->input->post("id");

        $getcart = $this->session->cart;

        unset($getcart[$id]);

        $this->session->set_userdata(["cart" => $getcart]);

        echo json_encode($callback);
    }

    function add() {
        $callback['status'] = 1;
        $callback['msg'] = "Item ditambahkan ke keranjang";
        $callback['csrf_regenerate'] = $this->security->get_csrf_hash();

        $id = $this->input->post("id");
        $qty = $this->input->post("qty");
        $motif = $this->input->post("motif");
        if(empty($qty)) {
            $qty = 1;
        }
        if(empty($this->input->post("update"))) {
            $update = FALSE;
        } else {
            $update = TRUE;
        }

        $query = $this->product_model->get_product($id);

        if($query->num_rows() < 1 OR $qty < 1 OR !is_numeric($qty)) {
            redirect(base_url("404"));
        } else {
            $stok = $query->row_array();
            if($stok['stock_product'] < $qty) {
                $callback['status'] = 0;
                $callback['msg'] = "Stok tidak tersedia sebanyak $qty <br/>Hubungi admin <a href='https://wa.me/6281278947744'>+6281278947744</a>";
            } else {
                if(empty($this->session->cart)) {
                    $row = [$id => [$id, $qty, $motif]];
                    $this->session->set_userdata(["cart" => $row]);
                } else {
                    $rowbefore = $this->session->cart;
                    if(isset($rowbefore[$id])) {
                        if(!$update) {
                            $qty = $rowbefore[$id][1] + $qty;  
                        }
                    }
                    if($stok['stock_product'] < $qty) {
                        $callback['status'] = 0;
                        $callback['msg'] = "Maaf stok tidak tersedia";
                    } else {
                        $rowbefore[$id] = [$id, $qty, $motif];
                        $this->session->set_userdata(["cart" => $rowbefore]);
                    }
                }
            }
        }
        echo json_encode($callback);
    }

}