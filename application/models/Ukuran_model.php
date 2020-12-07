<?php

class Ukuran_model extends CI_Model
{
//    function post_comment($data) {
//        $data = [
//            "id_comment" => NULL,
//            "id_product" => $data['id_product'],
//            "name_comment" => $data['name_comment'],
//            "email_comment" => $data['email_comment'],
//            "body_comment" => $data['body_comment'],
//            "rating_comment" => $data['rating_comment'],
//            "date_comment" => $data['date_comment']
//        ];
//
//        $this->db->insert('comment',$data);
//    }

    function get_allukuran($id)
    {
        $this->db->order_by("id_ukuran", "ASC");
        return $this->db->get_where("ukuran", ['id_product' => $id]);
    }

    function get_list_ukuran($limit = [0, 5])
    {
        $this->db->select("ukuran.*,product.name_product");
        $this->db->from("ukuran");
        $this->db->join("product", "product.id_product=ukuran.id_product", "left");
        $this->db->order_by("id_product", "ASC");
        $this->db->limit($limit[1], $limit[0]);
        return $this->db->get();
    }

    function get_num_ukuran_where($data)
    {
        return $this->db->get_where("ukuran", $data);
    }
//
//    function get_average_rating() {
//        $this->db->select("(SUM(rating_comment) / COUNT(id_comment)) as average");
//        $this->db->from("comment");
//        $average = $this->db->get()->row();
//        $average = $average->average;
//        return $average;
//    }
}