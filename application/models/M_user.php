<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model 
{
    public function get_all_data(){
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->order_by('id_user', 'desc');
        return $this->db->get()->result();
    }

    public function add($data)
    {
         // Mengambil ID terakhir
         $last_id = $this->db->select('id_user')->order_by('id_user', 'desc')->limit(1)->get('tbl_user')->row();

         // Menghasilkan ID baru
         if ($last_id) {
             $last_id = $last_id->id_user;
             $id_number = (int) substr($last_id, 3) + 1; // Mengambil angka dari karakter ketiga dan seterusnya
             $new_id = 'USR' . str_pad($id_number, 2, '0', STR_PAD_LEFT); // Menggunakan panjang 2 untuk angka
         } else {
             $new_id = 'USR01'; // ID awal jika ini adalah entri pertama
         }
        $data['id_user'] = $new_id;
        $this->db->insert('tbl_user', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('tbl_user', $data);
    }
    
    public function delete($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->delete('tbl_user', $data);
    }
}