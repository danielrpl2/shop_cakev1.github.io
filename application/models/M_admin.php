<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model 
{
    public function total_produk()
    {
        return $this->db->get('tbl_produk')->num_rows();
        
    }

    public function total_kategori()
    {
        return $this->db->get('tbl_kategori')->num_rows();
        
    }

    public function total_pelanggan()
    {
        return $this->db->get('tbl_pelanggan')->num_rows();
        
    }

    //pesanan masuk / belum bayar
    public function total_pesanan_belum_bayar()
    {
        $this->db->select('COUNT(*) as jumlah_pesanan');
        $this->db->from('tbl_transaksi');
        $this->db->where('status_bayar', 0);
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->jumlah_pesanan;
        } else {
            return 0;
        }
    }

    //pesanan diproses / sudah bayar
    public function total_pesanan_sudah_bayar()
    {
        $this->db->select('COUNT(*) as sudah_bayar');
        $this->db->from('tbl_transaksi');
        $this->db->where('status_order', 1);
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->sudah_bayar;
        } else {
            return 0;
        }
    }

    //pesanan dikirim / sudah bayar
    public function total_pesanan_dikirim()
    {
        $this->db->select('COUNT(*) as dikirim');
        $this->db->from('tbl_transaksi');
        $this->db->where('status_order', 2);
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->dikirim;
        } else {
            return 0;
        }
    }

    //pesanan selesai / sudah bayar
    public function total_pesanan_selesai()
    {
        $this->db->select('COUNT(*) as selesai');
        $this->db->from('tbl_transaksi');
        $this->db->where('status_order', 3);
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->selesai;
        } else {
            return 0;
        }
    }

    public function total_pendapatan()
    {
        $this->db->select('SUM(CAST(REPLACE(total_bayar, "Rp ", "") AS DECIMAL(10, 2))) as total_pendapatan');
        $this->db->from('tbl_transaksi');
        $this->db->where('status_order', 3);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->row();
            $total_pendapatan = (float)$result->total_pendapatan; // Mengkonversi ke float
            return number_format($total_pendapatan, 0, '', ''); // Menghilangkan angka nol di belakang
        } else {
            return 0;
        }
    }
    
    public function data_setting() 
    {
        $this->db->select('*');
        $this->db->from('tbl_set_lokasi');
        $this->db->where('id', 1);
        return $this->db->get()->row();
          
    }

    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('tbl_set_lokasi', $data);    
    }
    
}