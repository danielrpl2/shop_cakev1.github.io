<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model 
{
    public function simpan_transaksi($data)
    {
         // Mengambil ID terakhir
         $last_id = $this->db->select('id_transaksi')->order_by('id_transaksi', 'desc')->limit(1)->get('tbl_transaksi')->row();

        // Menghasilkan ID baru
        if ($last_id) {
            $last_id = $last_id->id_transaksi;
            $id_number = (int) substr($last_id, 3) + 1; // Mengambil angka dari karakter ketiga dan seterusnya
            $new_id = 'TRS' . str_pad($id_number, 2, '0', STR_PAD_LEFT); // Menggunakan panjang 2 untuk angka
        } else {
            $new_id = 'TRS01'; // ID awal jika ini adalah entri pertama
        }
 
         $data['id_transaksi'] = $new_id;
        $this->db->insert('tbl_transaksi', $data);
            
    }

    public function simpan_detail_transaksi($data_detail)
    {
        
        $this->db->insert('tbl_detail_transaksi', $data_detail);      
    }

    public function belum_bayar() 
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));  
        $this->db->where('status_order=0');            
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
        
    }

    public function diproses() 
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));  
        $this->db->where('status_order=1');            
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
        
    }

    public function dikirim() 
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));  
        $this->db->where('status_order=2');            
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
        
    }

    public function selesai() 
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));  
        $this->db->where('status_order=3');            
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
        
    }

    public function detail_pesanan($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->get()->row();
    }

    public function rekening() 
    {
        $this->db->select('*');
        $this->db->from('tbl_rekening');
        return $this->db->get()->result();
    }

    public function upload_buktibayar($data) 
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('tbl_transaksi', $data);
    }

    public function hapus_transaksi($id_transaksi)
    {
        // Ambil 'no_order' dari 'tbl_transaksi' yang akan dihapus
        $this->db->select('no_order');
        $this->db->where('id_transaksi', $id_transaksi);
        $result = $this->db->get('tbl_transaksi')->row();
    
        if ($result) {
            $no_order = $result->no_order;
    
            // Hapus semua data 'tbl_transaksi' dengan 'id_transaksi' yang sesuai
            $this->db->where('id_transaksi', $id_transaksi);
            $this->db->delete('tbl_transaksi');
    
            // Hapus semua data 'tbl_detail_transaksi' dengan 'no_order' yang sesuai
            $this->db->where('no_order', $no_order);
            $this->db->delete('tbl_detail_transaksi');
        }
    }
    
    

}
