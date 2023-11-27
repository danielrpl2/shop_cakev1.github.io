<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_stok extends CI_Model 
{
        
    public function get_stok_in() {
        $this->db->select('tbl_stok.id_stok, tbl_produk.id_produk,
        tbl_produk.nama_produk as nama_produk, qty, date, detail,
        tbl_supplier.nama_supplier as nama_supplier, tbl_produk.id_produk');
        $this->db->from('tbl_stok');
        $this->db->join('tbl_produk','tbl_stok.id_produk = tbl_produk.id_produk');
        $this->db->join('tbl_supplier','tbl_stok.id_supplier = tbl_supplier.id_supplier', 'left');
        $this->db->order_by('id_stok', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null) 
    {
        if ($id != null) {
            $this->db->where('id_stok', $id);
        }    
        $query = $this->db->get('tbl_stok');
        return $query;
    }

    // In M_transaksi.php model
public function insert_pesanan($data)
{
    $this->db->insert('tbl_jual', $data);
}


    //tambah penjualan / kueangi stok
    public function tambah_penjualan($data)
    {
        $this->db->insert('tbl_jual', $data);
    }

    public function delete($id) 
    {
        $this->db->where('id_stok', $id);
        $this->db->delete('tbl_stok');
        
    }

    

    public function tambah_stok($post) {
        // Dapatkan id_user dari sesi
        $id_user = $this->session->userdata('id_user');
    
        $params = [
            'id_produk' => $post['id_produk'],
            'detail' => $post['detail'],
            'id_supplier' => $post['supplier'] == '' ? null : $post['supplier'],
            'qty' => $post['qty'],
            'date' => $post['date'],
            'id_user' => $id_user, // Menggunakan ID pengguna dari sesi
            'created' => date('Y-m-d H:i:s'),  // Menggunakan waktu saat ini sebagai nilai 'created'.
        ];
        $this->db->insert('tbl_stok', $params);
    }
    
    
    
    
}