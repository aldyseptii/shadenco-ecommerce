<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_motif extends CI_Controller
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

        $this->load->model('motif_model');

    }

    public function index()
    {
        $pushdata['admin_info'] = $this->profile_info;
        $pushdata['pagetitle'] = "Kelola Motif";
        $this->load->view('admin/header', $pushdata);
        $this->load->view('admin/motif/index', $pushdata);
        $this->load->view('admin/footer', $pushdata);
    }

    function edit($id)
    {
        $data = $this->input->post();
        $rules = [
            [
                "field" => "name_variant",
                "label" => "name_variant",
                "rules" => "required"
            ]
        ];
        $this->load->library("json_validate");
        $callback = $this->json_validate->validate($data, $rules);

        if ($this->motif_model->get_variant($id)->num_rows() < 1) {
            $callback['status'] = 0;
        }

        if ($callback['status']) {
            $this->motif_model->put_variant($id, $data);
        }

        echo json_encode($callback);
    }

    function add()
    {
        $data = $this->input->post();
        $rules = [
            [
                "field" => "name_variant",
                "label" => "name_variant",
                "rules" => "required"
            ]
        ];
        $this->load->library("json_validate");
        $callback = $this->json_validate->validate($data, $rules);

        if ($callback['status']) {
            $data['id_variant'] = "";
            $this->motif_model->post_variant($data);
        }

        echo json_encode($callback);
    }

    function delete($id)
    {

        if ($this->motif_model->get_variant($id)->num_rows() < 1) {
            $callback['status'] = 0;
            $callback['msg'] = "Motif gagal dihapus";
        } else {
            $this->motif_model->delete_variant($id);
            $callback['status'] = 1;
            $callback['msg'] = "Motif berhasil dihapus";
        }
        echo json_encode($callback);
    }

    function index_json()
    {
        $this->load->library("datatables");
        $this->datatables->from("variant");
        $this->datatables->set_column(['id_variant', 'id_product', 'name_product']);
        $list = $this->datatables->get_datatables()->result();
        $data = array();
        $no = $this->input->get('start');
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->id_product;
            $row[] = $field->name_variant;
            $row[] = $field->stock;
            $row[] = $field->motif_link;
            $row[] = '<button type="button" class="btn" data-toggle="modal" data-target="#' . $field->name_variant . '">
                      <img src="' . $field->image_url . '" width="80">
              </button>
            <div class="modal modal-success fade" id="' . $field->name_variant . '" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <img src="' . $field->image_url . '" style="width: 100%;">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
            ';
            $row[] = '<button type="button" class="btn btn-sm btn-dark btnedit" data-toggle="modal" data-target="#editModal" data-name="' . $field->name_variant . '" data-id="' . $field->id_variant . '" data-stock="' . $field->stock . '" data-motiflink="' . $field->motif_link . '">
                        <i class="fas fa-pen"></i>
                      </button> 
                      <button type="button" class="btn btn-sm btn-danger btn-delete" data-name="' . $field->name_variant . '" data-id="' . $field->id_variant . '"><i class="fas fa-trash"></i>
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
