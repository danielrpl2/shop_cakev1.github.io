<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelanggan extends CI_Model 
{

    public function register($data) 
    {
        // Mengambil ID terakhir
        $last_id = $this->db->select('id_pelanggan')->order_by('id_pelanggan', 'desc')->limit(1)->get('tbl_pelanggan')->row();

        // Menghasilkan ID baru
        if ($last_id) {
            $last_id = $last_id->id_pelanggan;
            $id_number = (int) substr($last_id, 3) + 1; // Mengambil angka dari karakter ketiga dan seterusnya
            $new_id = 'PGN' . str_pad($id_number, 2, '0', STR_PAD_LEFT); // Menggunakan panjang 2 untuk angka
        } else {
            $new_id = 'PGN01'; // ID awal jika ini adalah entri pertama
        }
        
         $data['id_pelanggan'] = $new_id;
        $this->db->insert('tbl_pelanggan', $data);
        
    }

    public function get_all_data(){
        $this->db->select('*');
        $this->db->from('tbl_pelanggan');
        $this->db->order_by('id_pelanggan', 'desc');
        return $this->db->get()->result();
    }

    public function delete($data)
    {
        $this->db->where('id_pelanggan', $data['id_pelanggan']);
        $this->db->delete('tbl_pelanggan', $data);
    }
}