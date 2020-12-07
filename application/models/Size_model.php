<?php

class Size_model extends CI_Model
{
    function get_ukuran($id)
    {
        return $this->db->get_where("ukuran", ["id_ukuran" => $id]);
    }

    function get_all()
    {
        return $this->db->get("ukuran");
    }

    function put_ukuran($id, $data)
    {
        $this->db->where('id_ukuran', $id);
        $this->db->update('ukuran', $data);
    }

    function delete_ukuran($id)
    {
        return $this->db->delete("ukuran", ["id_ukuran" => $id]);
    }

    function post_ukuran($data)
    {
        $this->db->insert("ukuran", $data);
    }
}
