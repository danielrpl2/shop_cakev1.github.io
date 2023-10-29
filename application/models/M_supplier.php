<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_supplier extends CI_Model 
{
    public function get_all_data_supplier(){
        $this->db->select('*');
        $this->db->from('tbl_supplier');
        return $this->db->get()->result();
    }
}