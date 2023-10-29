<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gambarproduk extends CI_Model 
{
    public function get_all_data(){
        $this->db->select('tbl_produk.*,COUNT(tbl_gambar.id_produk) as total_gambar');
        $this->db->from('tbl_produk');
        $this->db->join('tbl_gambar', 'tbl_gambar.id_produk = tbl_produk.id_produk', 'left'); 
        $this->db->group_by('tbl_produk.id_produk');
        $this->db->order_by('tbl_produk.id_produk', 'desc');       
        return $this->db->get()->result();
    }

    public function get_data($id_gambar)
    {
        $this->db->select('*');
        $this->db->from('tbl_gambar');
        $this->db->where('id_gambar', $id_gambar);
        return $this->db->get()->row(); 
    }

    public function get_gambar($id_produk)
    {
        $this->db->select('*');
        $this->db->from('tbl_gambar');
        $this->db->where('id_produk', $id_produk);
        return $this->db->get()->result();
    }

    public function add($data)
    {
         // Mengambil ID terakhir
         $last_id = $this->db->select('id_gambar')->order_by('id_gambar', 'desc')->limit(1)->get('tbl_gambar')->row();

         // Menghasilkan ID baru
         if ($last_id) {
             $last_id = $last_id->id_gambar;
             $id_number = (int) substr($last_id, 3) + 1; // Mengambil angka dari karakter ketiga dan seterusnya
             $new_id = 'GMR' . str_pad($id_number, 2, '0', STR_PAD_LEFT); // Menggunakan panjang 2 untuk angka
         } else {
             $new_id = 'GMR01'; // ID awal jika ini adalah entri pertama
         }
 
         $data['id_gambar'] = $new_id;
        $this->db->insert('tbl_gambar', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_gambar', $data['id_gambar']);
        $this->db->delete('tbl_gambar', $data);
    }
} 