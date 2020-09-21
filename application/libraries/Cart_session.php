<?php
class Cart_session {
    private $CI;

    function __construct() {
        $this->CI =& get_instance();
    }

    function get_cart($data) {
        if(!empty($data)) {
            $items = array();
            foreach($data as $item) {
                $items[] = $item[0];
            }
            $this->CI->db->select("product.id_product,product.name_product,product.price_product,product.weight_product,product.stock_product,photo_product.url_photo");
            $this->CI->db->from("product");
            $this->CI->db->join("photo_product","photo_product.id_product=product.id_product","left");
            $this->CI->db->group_by("id_product");
            $this->CI->db->where_in("product.id_product",$items);
            $dbitem = $this->CI->db->get()->result_array();
            $append = array();
            $total = 0;
            $weight = 0;

            foreach($dbitem as $itemget) {
                if($itemget['stock_product'] > 0) {
                    $tmp = array();
                    $id = $itemget['id_product'];
                    $tmp["id"] = $itemget['id_product'];
                    $tmp['name'] = $itemget['name_product'];
                    $tmp['price'] = $itemget['price_product'];
                    $tmp['photo'] = base_url("img/622x800/".$itemget['url_photo']);
                    $tmp['qty'] = $data[$id][1];
                    if($itemget['stock_product'] < $data[$id][1]) {
                        $tmp['qty'] = $itemget['stock_product'];
                    }
                    $tmp['sub'] = $tmp['price'] * $tmp['qty'];
                    $tmp['stock'] = $itemget['stock_product'];


                    $total = $total + ($tmp['sub']);
                    $weight = $weight + ($itemget['weight_product'] * $tmp['qty']);
                    $append[] = $tmp;
                }
            }

            $return = [
                "total" => $total,
                "weight" => $weight,
                "data" => $append
            ];

            return $return;
        } else {
            $return = [
                "total" => 0,
                "data" => []
            ];

            return $return;
        }
    }

}