<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_upload_thumbnail extends CI_Controller
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

        $this->load->model("motif_model");

    }

    public function get($id)
    {
        $callback = $this->motif_model->get_thumbnail($id)->row_array();
        if (isset($callback['img_thumbnail'])) {
            $callback['img_thumbnail'] = base_url("assets/motif/" . $callback['img_thumbnail']);
        }

        echo json_encode($callback);
    }

    public function index()
    {
        $pushdata['admin_info'] = $this->profile_info;
        $pushdata['pagetitle'] = "Kelola Thumbnail Motif";

        $this->load->view('admin/header', $pushdata);
        $this->load->view('admin/motif/thumbnail/index', $pushdata);
        $this->load->view('admin/footer', $pushdata);
    }

    function add()
    {
        $data = $this->input->post();
        $this->proccess($data, "add");
    }

    private function proccess($data, $action, $id = "")
    {
        $rules = [
            [
                "field" => "title_thumbnail",
                "label" => "title_thumbnail",
                "rules" => "required"
            ]
        ];
        $this->load->library("json_validate");
        $callback = $this->json_validate->validate($data, $rules);

        if ($action == "edit") {
            $query = $this->motif_model->get_thumbnail($id);
            if ($query->num_rows() < 1) {
                $callback['status'] = 0;
            } else {
                $oldname = $query->row_array();
                $oldname = $oldname['img_thumbnail'];
            }
        }

        if ($callback['status']) {


            $name = str_replace(" ", "_", $data['title_thumbnail']);

            $this->load->helper("string");
            $this->load->helper("file");
            $name = preg_replace('/[^\w-]/', '', $name);
            if ($action == "edit") {
                $name = $oldname;
            }

            $config['upload_path'] = '././assets/motif';
            $config['allowed_types'] = 'jpg|png|jpeg|JPG|JPEG';
            $config['max_size'] = 1000;
            $config['max_width'] = 1920;
            $config['max_height'] = 1920;
            $config['file_name'] = $name;

            if ($action == "edit") {
                $config['overwrite'] = TRUE;
            }

            $this->load->library('upload', $config);

            if ($action == "add") {

                if ($this->upload->do_upload('img_thumbnail')) {
                    $result = $this->upload->data();
                    $fotoup = $result['file_name'];
                    $data['id_thumbnail'] = "";
                    $data['img_thumbnail'] = $fotoup;

                    $this->motif_model->post_thumbnail($data);
                } else {
                    $callback['status'] = 0;
                    $callback['error'][] = [
                        "field" => "img_thumbnail",
                        "msg" => "Foto tak terupload"
                    ];
                }
            } else {
                if ($this->upload->do_upload('img_thumbnail')) {
                    $result = $this->upload->data();
                    $fotoup = $result['file_name'];
                }
                if ($callback['status']) {
                    $this->motif_model->put_thumbnail($id, $data);
                }
            }

        }

        echo json_encode($callback);
    }

    function edit($id)
    {
        $data = $this->input->post();
        $this->proccess($data, "edit", $id);
    }

    function delete($id)
    {
        $callback['status'] = 1;
        $callback['msg'] = "thumbnail telah dihapus";
        $query = $this->motif_model->get_thumbnail($id);
        if ($query->num_rows() < 1) {
            $callback['status'] = 0;
            $callback['msg'] = "Gagal menghapus thumbnail";
        }

        $getname = $query->row_array();
        $filebefore = '././assets/motif/' . $getname['img_thumbnail'];
        if (is_readable($filebefore)) {
            unlink($filebefore);
        }

        $this->motif_model->delete_thumbnail($id);

        echo json_encode($callback);
    }

    public function index_json()
    {
        $this->load->library("datatables");
        $this->datatables->from("thumbnail_motif");
        $this->datatables->set_search_field("title_thumbnail");
        $this->datatables->set_column(['id_thumbnail', 'title_thumbnail']);
        $list = $this->datatables->get_datatables()->result();
        $data = array();
        $no = $this->input->get('start');
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '<img style="max-width:150px" src="' . base_url("assets/motif/$field->img_thumbnail") . '"/>';
            $row[] = $field->title_thumbnail;
            $row[] = $field->link_thumbnail;
            $row[] = '
<button type="button" class="btn btn-dark btn-sm btnedit" data-id="' . $field->id_thumbnail . '" data-toggle="modal" data-target="#editModal"><i class="fas fa-pen"></i></button> 
<button type="button" class="btn btn-danger btn-sm btndelete" data-id="' . $field->id_thumbnail . '"><i class="fas fa-trash"></i></button> 
<input type="text" value="' . $field->img_thumbnail . '" id="myInput">';

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
