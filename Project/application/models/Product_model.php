<?php
if ( ! defined('BASEPATH'))  exit('No direct script access allowed');

class Product_model extends CI_Model{
    function addGoods($data){
        $this->db->insert('stock', $data);
        return $this->db->insert_id(); //return last insert data id
    }
    function addImage($array){
        $query = $this->db->insert_batch('product_image', $array); //insert array into table (key => database row name , and value => value need to save)
        //return $this->db->insert_id(); //return last insert data id
        if($query == true) {
            return true;
        } else {
            return false;
        }
    }
    function check_user_post($id){  //check user post count
        $this->db->select('stock.user_id');
        $this->db->where('user_id',$id);
        $query = $this->db->get('stock');
        return $query->num_rows();
    }
    function showAll($num, $offset){     //show all store product
        $this->db->select('stock.*, product_image.image_name');
        $this->db->from('stock');
        $this->db->join('product_image', 'stock.stock_id = product_image.id_stock_product');
        $this->db->limit($num, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }
    function showFilter($array ,$num, $offset) { //display products match the filter ($array containes filter result)
        $this->db->select('product_image.image_name, stock.*');
        $this->db->from('product_image');
        $this->db->join('stock', 'stock.stock_id = product_image.id_stock_product');
        //$this->db->group_by("stock.stock_id");
        $this->db->like($array);
        $this->db->limit($num, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }
}