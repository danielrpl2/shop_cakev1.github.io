<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_laporan');
        $this->load->model('m_stok');
    }
    

    //laporan pendapatan
    public function index()
	{
        $data = array (
            'title' => 'Laporan Pendapatan',
            'isi' => 'laporan_penjualan/v_laporan',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}

    public function laporan_stok()
	{
        $data = array (
            'title' => 'Laporan Pendapatan',
            'isi' => 'laporan_stok/v_laporan_stok.php',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}

    public function laporan_harian()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        
        $data = array (
            'title' => 'Laporan Harian',
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->laporan_harian($tanggal, $bulan, $tahun),
            'isi' => 'laporan_penjualan/v_lap_harian',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
    

    public function laporan_bulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        
        $data = array (
            'title' => 'Laporan Bulanan',
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->laporan_bulanan($bulan, $tahun),
            'isi' => 'laporan_penjualan/v_lap_bulanan',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function laporan_tahunan()
    {
        $tahun = $this->input->post('tahun');
        
        $data = array (
            'title' => 'Laporan Tahunan',
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->laporan_tahunan($tahun),
            'isi' => 'laporan_penjualan/v_lap_tahunan',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function laporan_stok_masuk()
    {
        $data = array (
            'title' => 'Laporan Stok Masuk',
            'laporan' => $this->m_stok->get_stok_in()->result(),
            'isi' => 'laporan_stok/v_lap_stok_masuk',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    // Laporan Stok Keluar
    public function laporan_stok_keluar()
    {
        $data = array (
            'title' => 'Laporan Stok Keluar',
            'laporan' => $this->m_stok->get_stok_out()->result(),
            'isi' => 'laporan_stok/v_lap_stok_keluar',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }


}