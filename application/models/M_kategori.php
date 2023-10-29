<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model 
{
    public function get_all_data(){
        $this->db->select('*');
        $this->db->from('tbl_kategori');
        $this->db->order_by('id_kategori', 'desc');
        return $this->db->get()->result();
    }
    //menambah data
    public function add($data)
    {
        // Mengambil ID terakhir
        $last_id = $this->db->select('id_kategori')->order_by('id_kategori', 'desc')->limit(1)->get('tbl_kategori')->row();

        // Menghasilkan ID baru
        if ($last_id) {
            $last_id = $last_id->id_kategori;
            $id_number = (int) substr($last_id, 3) + 1; // Mengambil angka dari karakter ketiga dan seterusnya
            $new_id = 'KTG' . str_pad($id_number, 2, '0', STR_PAD_LEFT); // Menggunakan panjang 2 untuk angka
        } else {
            $new_id = 'KTG01'; // ID awal jika ini adalah entri pertama
        }

        $data['id_kategori'] = $new_id;
        $this->db->insert('tbl_kategori', $data);
    }

    //edit data
    public function edit($data)
    {
        $this->db->where('id_kategori', $data['id_kategori']);
        $this->db->update('tbl_kategori', $data);
    }
    
    //delete data
    public function delete($data)
    {
        $this->db->where('id_kategori', $data['id_kategori']);
        $this->db->delete('tbl_kategori', $data);
    }

}    