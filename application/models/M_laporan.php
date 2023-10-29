<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model 
{
    public function laporan_harian($tanggal, $bulan, $tahun)
    {
        $this->db->select('no_order, tgl_order, provinsi, kota, total_bayar');
        $this->db->from('tbl_transaksi');
        $this->db->where('status_order', 3);
        $this->db->where('DAY(tbl_transaksi.tgl_order)', $tanggal);
        $this->db->where('MONTH(tbl_transaksi.tgl_order)', $bulan);
        $this->db->where('YEAR(tbl_transaksi.tgl_order)', $tahun);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array(); // Mengembalikan array kosong jika tidak ada data yang sesuai
        }
    }
    
    public function laporan_bulanan($bulan, $tahun)
    {
        $this->db->select('no_order, tgl_order, provinsi, kota, total_bayar');
        $this->db->from('tbl_transaksi');
        $this->db->where('status_order', 3);
        $this->db->where('MONTH(tbl_transaksi.tgl_order)', $bulan);
        $this->db->where('YEAR(tbl_transaksi.tgl_order)', $tahun);
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array(); // Mengembalikan array kosong jika tidak ada data yang sesuai
        }
    }

    public function laporan_tahunan($tahun)
    {
        $this->db->select('no_order, tgl_order, provinsi, kota, total_bayar');
        $this->db->from('tbl_transaksi');
        $this->db->where('status_order', 3);
        $this->db->where('YEAR(tbl_transaksi.tgl_order)', $tahun);
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array(); // Mengembalikan array kosong jika tidak ada data yang sesuai
        }
    }
    
}