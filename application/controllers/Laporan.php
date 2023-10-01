<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function index()
	{
        $data = array (
            'title' => 'Laporan Harian',
            'isi' => 'v_laporan',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}

    public function harian()
    {
        $tanggal = $this->input->post('tanggal');    
        $bulan = $this->input->post('bulan');    
        $tahun = $this->input->post('tahun');  
        
        $data = array (
            'title' => 'Laporan Harian',
            'isi' => 'v_lap_harian',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
}