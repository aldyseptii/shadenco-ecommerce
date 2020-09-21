<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("product_model");
        $this->load->model("slider_model");
        $this->load->model("category_model");
        $this->load->model("page_model");
        $this->load->library("cart_session");

    }

    function index($page) {
        $push['categories'] = $this->category_model->get_all()->result();
        $push['pages'] = $this->page_model->all_page()->result();

        $getpage = $this->page_model->get_page($page);

        if($getpage->num_rows() < 1) {
            redirect(base_url("404"));
        }

        $fetch = $getpage->row();
        $push['page'] = $fetch;

        $push['pagetitle'] = $fetch->title_page; 
        $push['cart'] = $this->cart_session->get_cart($this->session->cart);

        $this->load->view('shop/header',$push);
        $this->load->view('shop/page',$push);
        $this->load->view('shop/footer',$push);
    }
}