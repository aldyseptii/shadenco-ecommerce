<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_size extends CI_Controller
{
    private $profile_info;

    function __construct()
    {
        parent::__construct();

        $this->load->model('admin_model');

        if (!$this->session->login_status) {
            redirect(base_url('admin'));
        } else {
            $this->profile_info = $this->admin_model->profile_usn($this->session->usn)->row_array();
        }

        $this->load->model('size_model');

    }

    public function index()
    {
        $pushdata['admin_info'] = $this->profile_info;
        $pushdata['pagetitle'] = "Kelola Ukuran";
        $this->load->view('admin/header', $pushdata);
        $this->load->view('admin/size/index', $pushdata);
        $this->load->view('admin/footer', $pushdata);
    }

    function edit($id)
    {
        $data = $this->input->post();
        $rules = [
            [
                "field" => "name_ukuran",
                "label" => "name_ukuran",
                "rules" => "required"
            ],
            [
                "field" => "id_product",
                "label" => "id_product",
                "rules" => "required"
            ]
        ];
        $this->load->library("json_validate");
        $callback = $this->json_validate->validate($data, $rules);

        if ($this->size_model->get_ukuran($id)->num_rows() < 1) {
            $callback['status'] = 0;
        }

        if ($callback['status']) {
            $this->size_model->put_ukuran($id, $data);
        }

        echo json_encode($callback);
    }

    function add()
    {
        $data = $this->input->post();
        $rules = [
            [
                "field" => "name_ukuran",
                "label" => "name_ukuran",
                "rules" => "required"
            ],
            [
                "field" => "id_product",
                "label" => "id_product",
                "rules" => "required"
            ]
        ];
        $this->load->library("json_validate");
        $callback = $this->json_validate->validate($data, $rules);

        if ($callback['status']) {
            $data['id_ukuran'] = "";
            $this->size_model->post_ukuran($data);
        }

        echo json_encode($callback);
    }

    function delete($id)
    {

        if ($this->size_model->get_ukuran($id)->num_rows() < 1) {
            $callback['status'] = 0;
            $callback['msg'] = "Ukuran gagal dihapus";
        } else {
            $this->size_model->delete_ukuran($id);
            $callback['status'] = 1;
            $callback['msg'] = "Ukuran berhasil dihapus";
        }
        echo json_encode($callback);
    }

    function index_json()
    {
        $this->load->library("datatables");
        $this->datatables->from("ukuran");
        $this->datatables->set_column(['id_ukuran', 'id_product', 'name_product']);
        $list = $this->datatables->get_datatables()->result();
        $data = array();
        $no = $this->input->get('start');
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->id_product;
            $row[] = $field->name_ukuran;
            $row[] = '<button type="button" class="btn btn-sm btn-dark btnedit" data-toggle="modal" data-target="#editModal" data-name="' . $field->name_ukuran . '" id-product="' . $field->id_product . '" data-id="' . $field->id_ukuran . '">
                        <i class="fas fa-pen"></i>
                      </button> 
                      <button type="button" class="btn btn-sm btn-danger btn-delete" data-name="' . $field->name_ukuran . '" data-id="' . $field->id_ukuran . '"><i class="fas fa-trash"></i>
                      </button>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $this->input->get('draw'),
            "recordsTotal" => $this->datatables->count_all(),
            "recordsFiltered" => $this->datatables->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}
