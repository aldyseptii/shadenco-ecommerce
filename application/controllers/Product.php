<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("product_model");
        $this->load->model("slider_model");
        $this->load->model("category_model");
        $this->load->model("page_model");
        $this->load->model("comment_model");
        $this->load->model("variant_model");
        $this->load->library("cart_session");

    }

    function index($id,$tourl) {
        $cek = $this->product_model->get_product($id);
        if($cek->num_rows() < 1) {
            redirect(base_url("404"));
            die();
        }

        $data = $cek->row();
        if($this->toolset->tourl($data->name_product) != $tourl) {
            redirect(base_url("404"));
            die();
        }

        $push['categories'] = $this->category_model->get_all()->result();
        $push['pages'] = $this->page_model->all_page()->result();
        $push['detail'] = $data;
        $push['related'] = $this->product_model->related_product($data->id_category,$data->id_product)->result();
        $push['pagetitle'] = $data->name_product;
        $push['cart'] = $this->cart_session->get_cart($this->session->cart);
        $push['comments'] = $this->comment_model->get_allcomment($id)->result();
        $push['variant'] = $this->variant_model->get_allvariant($id)->result();

        $this->load->view('shop/header',$push);
        $this->load->view('shop/product',$push);
        $this->load->view('shop/footer',$push);
    }
}