<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_stok extends CI_Model 
{
    public function tambah_stok($post) {
        $params = [
            'id_produk' => $post['id_produk'],
            'type' => 'in',
            'detail' => $post['detail'],
            'id_supplier' => $post['supplier'] == '' ? null : $post['supplier'],
            'qty' => $post['qty'],
            'date' => $post['date'],
            // 'id_user' => $post['id_user'], // Menggunakan ID pengguna dari sesi
            'created' => date('Y-m-d H:i:s'),  // Menggunakan waktu saat ini sebagai nilai 'created'.
        ];
        $this->db->insert('tbl_stok', $params);
    }
    
    
    
}