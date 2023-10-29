<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_laporan');
    }
    
    public function index()
	{
        $data = array (
            'title' => 'Laporan Harian',
            'isi' => 'v_laporan',
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
            'isi' => 'v_lap_harian',
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
            'isi' => 'v_lap_bulanan',
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
            'isi' => 'v_lap_tahunan',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

}