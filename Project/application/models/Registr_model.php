<?php
if ( ! defined('BASEPATH'))  exit('No direct script access allowed');
class Registr_model extends CI_Model{
    function check_email($email){                   //check email
        $this->db->where('email',$email);
        $query = $this->db->get('authorization');
        return $query->result_array();
    }
    function check_login_in($email,$pass){                //check login in
        $this->db->where('email',$email);
        $this->db->where('pass',$pass);
        $query = $this->db->get('authorization');
        return $query->result_array();
    }
}