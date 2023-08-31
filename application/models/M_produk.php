<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model 
{
    public function get_all_data(){
        $this->db->select('*');
        $this->db->from('tbl_produk');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_produk.id_kategori', 'left'); 
        $this->db->order_by('tbl_produk.id_produk', 'desc');
        return $this->db->get()->result();
    }

    //menambah data
    public function add($data)
    {
        $this->db->insert('tbl_produk', $data);
    }

    //edit data
    public function edit($data)
    {
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->update('tbl_produk', $data);
    }

    //delete data
    public function delete($data)
    {
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->delete('tbl_produk', $data);
    }

}    