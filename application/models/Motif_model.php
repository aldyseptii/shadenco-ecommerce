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

    // Motif Upload Photo

    function post_photo($data)
    {
        $this->db->insert("photo_motif", $data);
    }

    function get_photo($id)
    {
        return $this->db->get_where("photo_motif", ["id_photo" => $id]);
    }

    function put_photo($id, $data)
    {
        $this->db->where("id_photo", $id);
        $this->db->update("photo_motif", $data);
    }

    function delete_photo($id)
    {
        $this->db->delete("photo_motif", ['id_photo' => $id]);
    }

    function all_photo()
    {
        return $this->db->get("photo_motif");
    }

    // Thumbnail Upload

    function post_thumbnail($data)
    {
        $this->db->insert("thumbnail_motif", $data);
    }

    function get_thumbnail($id)
    {
        return $this->db->get_where("thumbnail_motif", ["id_thumbnail" => $id]);
    }

    function put_thumbnail($id, $data)
    {
        $this->db->where("id_thumbnail", $id);
        $this->db->update("thumbnail_motif", $data);
    }

    function delete_thumbnail($id)
    {
        $this->db->delete("thumbnail_motif", ['id_thumbnail' => $id]);
    }

    function all_thumbnail()
    {
        return $this->db->get("thumbnail_motif");
    }
}
