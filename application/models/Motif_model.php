<?php

class Motif_model extends CI_Model
{
    function get_variant($id)
    {
        return $this->db->get_where("variant", ["id_variant" => $id]);
    }

    function get_all()
    {
        return $this->db->get("variant");
    }

    function put_variant($id, $data)
    {
        $this->db->where('id_variant', $id);
        $this->db->update('variant', $data);
    }

    function delete_variant($id)
    {
        return $this->db->delete("variant", ["id_variant" => $id]);
    }

    function post_variant($data)
    {
        $this->db->insert("variant", $data);
    }
}
