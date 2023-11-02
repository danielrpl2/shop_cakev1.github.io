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

    public function get_all_data_blog(){
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->order_by('id_blog', 'desc');
        return $this->db->get()->result();
    }

    public function detail_blog($id_blog) 
    {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('id_blog', $id_blog);
        return $this->db->get()->row();
    }

    public function get_recommended_products($id_produk) {
        // Dapatkan kategori produk saat ini
        $produk = $this->detail_produk($id_produk);
        $kategori_id = $produk->id_kategori;
    
        // Dapatkan semua produk dalam kategori yang sama, kecuali produk saat ini
        $this->db->select('*');
        $this->db->from('tbl_produk');
        $this->db->where('id_kategori', $kategori_id);
        $this->db->where('id_produk !=', $id_produk); // Kecuali produk saat ini
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
    
    // public function get_all_data_gambar_produk(){
    //     $this->db->select('*');
    //     $this->db->from('tbl_gambar');
    //     return $this->db->get()->result();
    // }

    public function get_keyword($keyword){
        $this->db->select('*');
        $this->db->from('tbl_produk');
        $this->db->like('nama_produk',$keyword);
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_produk.id_kategori', 'left', $keyword); 
        $this->db->or_like('harga',$keyword);
        $this->db->or_like('deskripsi',$keyword);
        $this->db->or_like('gambar1',$keyword);
        return $this->db->get()->result();
    }

    public function gallery(){
        return $this->db->get('tbl_produk')->result();
    }

    public function gambar_produk($id_produk) 
    {
        $this->db->select('*');
        $this->db->from('tbl_produk');
        $this->db->where('id_produk', $id_produk);
        return $this->db->get()->result();    
    }


}