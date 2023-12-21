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

    //untuk penjualan online
    // public function total_pendapatan()
    // {
    //     $this->db->select('SUM(CAST(REPLACE(total_bayar, "Rp ", "") AS DECIMAL(10, 2))) as total_pendapatan');
    //     $this->db->from('tbl_transaksi');
    //     $this->db->where('status_order', 3);
    //     $query = $this->db->get();

    //     if ($query->num_rows() > 0) {
    //         $result = $query->row();
    //         $total_pendapatan = (float)$result->total_pendapatan; 
    //         return number_format($total_pendapatan, 0, '', ''); 
    //     } else {
    //         return 0;
    //     }
    // }

    //untuk semua penjualan
    public function total_pendapatan()
{
    // Calculate total from tbl_transaksi
    $this->db->select('SUM(CAST(REPLACE(total_bayar, "Rp ", "") AS DECIMAL(10, 2))) as total_transaksi');
    $this->db->from('tbl_transaksi');
    $this->db->where('status_order', 3);
    $query_transaksi = $this->db->get();
    $total_transaksi = 0;

    if ($query_transaksi->num_rows() > 0) {
        $result_transaksi = $query_transaksi->row();
        $total_transaksi = (float)$result_transaksi->total_transaksi;
    }

    // Calculate total from tbl_penjualan
    $this->db->select('SUM(sub_total) as total_penjualan');
    $this->db->from('tbl_penjualan');
    $query_penjualan = $this->db->get();
    $total_penjualan = 0;

    if ($query_penjualan->num_rows() > 0) {
        $result_penjualan = $query_penjualan->row();
        $total_penjualan = (float)$result_penjualan->total_penjualan;
    }

    // Sum the total
    $total_pendapatan = $total_transaksi + $total_penjualan;

    return number_format($total_pendapatan, 0, '', '');
}

   
    
    public function data_setting() 
    {
        $this->db->select('*');
        $this->db->from('tbl_set_lokasi');
        $this->db->where('id', 1);
        return $this->db->get()->row();
          
    }

    public function get_all_data_rekening()
    {
        $this->db->select('*');
        $this->db->from('tbl_rekening');
        $this->db->order_by('id_rekening', 'desc');
        return $this->db->get()->result();
    }

    public function add($data)
    {
        // Mengambil ID terakhir
        $last_id = $this->db->select('id_rekening')->order_by('id_rekening', 'desc')->limit(1)->get('tbl_rekening')->row();

        // Menghasilkan ID baru
        if ($last_id) {
            $last_id = $last_id->id_rekening;
            $id_number = (int) substr($last_id, 3) + 1; // Mengambil angka dari karakter ketiga dan seterusnya
            $new_id = 'RKNG' . str_pad($id_number, 2, '0', STR_PAD_LEFT); // Menggunakan panjang 2 untuk angka
        } else {
            $new_id = 'RKNG01'; // ID awal jika ini adalah entri pertama
        }
        $data['id_rekening'] = $new_id;
        $this->db->insert('tbl_rekening', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_rekening', $data['id_rekening']);
        $this->db->update('tbl_rekening', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_rekening', $data['id_rekening']);
        $this->db->delete('tbl_rekening', $data);
    }
    
}