<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_blog extends CI_Model 
{
    public function get_all_data(){
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->order_by('id_blog', 'desc');
        return $this->db->get()->result();
    }

    public function get_data($id_blog){
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('id_blog', $id_blog);
        return $this->db->get()->row();
    }

     //menambah data
     public function add($data)
     {
         // Mengambil ID terakhir
         $last_id = $this->db->select('id_blog')->order_by('id_blog', 'desc')->limit(1)->get('tbl_blog')->row();
 
         // Menghasilkan ID baru
         if ($last_id) {
             $last_id = $last_id->id_blog;
             $id_number = (int) substr($last_id, 3) + 1; // Mengambil angka dari karakter ketiga dan seterusnya
             $new_id = 'BLG' . str_pad($id_number, 2, '0', STR_PAD_LEFT); // Menggunakan panjang 2 untuk angka
         } else {
             $new_id = 'BLG01'; // ID awal jika ini adalah entri pertama
         }
 
         $data['id_blog'] = $new_id;
         $this->db->insert('tbl_blog', $data);
     }
 
     //edit data
     public function edit($data)
     {
         $this->db->where('id_blog', $data['id_blog']);
         $this->db->update('tbl_blog', $data);
     }
     
     //delete data
     public function delete($data)
     {
         $this->db->where('id_blog', $data['id_blog']);
         $this->db->delete('tbl_blog', $data);
     }
}