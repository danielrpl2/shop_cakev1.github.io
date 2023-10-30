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

    public function get_data($id_produk){
        $this->db->select('*');
        $this->db->from('tbl_produk');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_produk.id_kategori', 'left'); 
        $this->db->where('id_produk', $id_produk);
        return $this->db->get()->row();
    }

    //menambah data
    public function add($data)
    {
         // Mengambil ID terakhir
         $last_id = $this->db->select('id_produk')->order_by('id_produk', 'desc')->limit(1)->get('tbl_produk')->row();

        // Menghasilkan ID baru
        if ($last_id) {
            $last_id = $last_id->id_produk;
            $id_number = (int) substr($last_id, 3) + 1; // Mengambil angka dari karakter ketiga dan seterusnya
            $new_id = 'PRD' . str_pad($id_number, 2, '0', STR_PAD_LEFT); // Menggunakan panjang 2 untuk angka
        } else {
            $new_id = 'PRD01'; // ID awal jika ini adalah entri pertama
        }
 
        $data['id_produk'] = $new_id;
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

    //relasi dengan tabel stok / tambah stok
    public function update_stok_in($data) {
        $qty = $data['qty'];
        $id = $data['id_produk'];
        $sql = "UPDATE tbl_produk SET stok = stok + '$qty' WHERE id_produk = '$id'";

        $this->db->query($sql);
    }

    //relasi dengan tabel stok / kurangi stok
    public function update_stok_out($data) {
        $qty = $data['qty'];
        $id = $data['id_produk'];
        $sql = "UPDATE tbl_produk SET stok = stok - '$qty' WHERE id_produk = '$id'";

        $this->db->query($sql);
    }

}    