<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model 
{
    public function get_all_data(){
        $this->db->select('*');
        $this->db->from('tbl_produk');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_produk.id_kategori', 'left'); 
        $this->db->order_by('tbl_produk.id_produk', 'desc');
        return $this->db->get()->result();
    }

    public function get_total_produk_by_kategori($id_kategori)
    {
        // Menghitung jumlah produk dalam kategori berdasarkan ID kategori
        $this->db->select('COUNT(*) as total_produk');
        $this->db->from('tbl_produk');
        $this->db->where('id_kategori', $id_kategori);
        $query = $this->db->get();
        $result = $query->row();
        return $result->total_produk;
    }

    public function get_all_data_kategori(){
        $this->db->select('*');
        $this->db->from('tbl_kategori');
        $this->db->order_by('id_kategori', 'desc');
        return $this->db->get()->result();
    }

    public function detail_produk($id_produk) 
    {
        $this->db->select('*');
        $this->db->from('tbl_produk');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_produk.id_kategori', 'left'); 
        $this->db->where('id_produk', $id_produk);
        return $this->db->get()->row();
    }

    public function gambar_produk($id_produk) 
    {
        $this->db->select('*');
        $this->db->from('tbl_gambar');
        $this->db->where('id_produk', $id_produk);
        return $this->db->get()->result();    
    }

    public function kategori($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('tbl_kategori');
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->get()->row(); 
    }

    public function get_all_data_produk($id_kategori){
        $this->db->select('*');
        $this->db->from('tbl_produk');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_produk.id_kategori', 'left'); 
        $this->db->where('tbl_produk.id_kategori', $id_kategori);
        return $this->db->get()->result();
    }
    

}