<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model 
{
    public function total_produk()
    {
        return $this->db->get('tbl_produk')->num_rows();
        
    }

    public function total_kategori()
    {
        return $this->db->get('tbl_kategori')->num_rows();
        
    }

    public function data_setting() 
    {
        $this->db->select('*');
        $this->db->from('tbl_set_lokasi');
        $this->db->where('id', 1);
        return $this->db->get()->row();
          
    }

    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('tbl_set_lokasi', $data);    
    }
}