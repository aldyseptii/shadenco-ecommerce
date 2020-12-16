<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_upload_motif extends CI_Controller
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
        $callback = $this->motif_model->get_photo($id)->row_array();
        if (isset($callback['img_photo'])) {
            $callback['img_photo'] = base_url("upload/motif/" . $callback['img_photo']);
        }

        echo json_encode($callback);
    }

    public function index()
    {
        $pushdata['admin_info'] = $this->profile_info;
        $pushdata['pagetitle'] = "Kelola Motif Warna";

        $this->load->view('admin/header', $pushdata);
        $this->load->view('admin/motif/upload/index', $pushdata);
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
                "field" => "title_photo",
                "label" => "title_photo",
                "rules" => "required"
            ]
        ];
        $this->load->library("json_validate");
        $callback = $this->json_validate->validate($data, $rules);

        if ($action == "edit") {
            $query = $this->motif_model->get_photo($id);
            if ($query->num_rows() < 1) {
                $callback['status'] = 0;
            } else {
                $oldname = $query->row_array();
                $oldname = $oldname['img_photo'];
            }
        }

        if ($callback['status']) {


            $name = str_replace(" ", "_", $data['title_photo']);

            $this->load->helper("string");
            $this->load->helper("file");
            $name = preg_replace('/[^\w-]/', '', $name);
            if ($action == "edit") {
                $name = $oldname;
            }

            $config['upload_path'] = '././upload/motif';
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

                if ($this->upload->do_upload('img_photo')) {
                    $result = $this->upload->data();
                    $fotoup = $result['file_name'];
                    $data['id_photo'] = "";
                    $data['img_photo'] = $fotoup;

                    $this->motif_model->post_photo($data);
                } else {
                    $callback['status'] = 0;
                    $callback['error'][] = [
                        "field" => "img_photo",
                        "msg" => "Foto tak terupload"
                    ];
                }
            } else {
                if ($this->upload->do_upload('img_photo')) {
                    $result = $this->upload->data();
                    $fotoup = $result['file_name'];
                }
                if ($callback['status']) {
                    $this->motif_model->put_photo($id, $data);
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
        $callback['msg'] = "Photo telah dihapus";
        $query = $this->motif_model->get_photo($id);
        if ($query->num_rows() < 1) {
            $callback['status'] = 0;
            $callback['msg'] = "Gagal menghapus photo";
        }

        $getname = $query->row_array();
        $filebefore = '././upload/motif/' . $getname['img_photo'];
        if (is_readable($filebefore)) {
            unlink($filebefore);
        }

        $this->motif_model->delete_photo($id);

        echo json_encode($callback);
    }

    public function index_json()
    {
        $this->load->library("datatables");
        $this->datatables->from("photo_motif");
        $this->datatables->set_search_field("title_photo");
        $this->datatables->set_column(['id_photo', 'name_photo']);
        $list = $this->datatables->get_datatables()->result();
        $data = array();
        $no = $this->input->get('start');
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '<img style="max-width:150px" src="' . base_url("upload/motif/$field->img_photo") . '"/>';
            $row[] = $field->title_photo;
            $row[] = $field->link_photo;
            $row[] = '<button type="button" class="btn btn-dark btn-sm btnedit" data-id="' . $field->id_photo . '" data-toggle="modal" data-target="#editModal"><i class="fas fa-pen"></i></button> <button type="button" class="btn btn-danger btn-sm btndelete" data-id="' . $field->id_photo . '"><i class="fas fa-trash"></i></button>';

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
