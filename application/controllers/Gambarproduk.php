<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gambarproduk extends CI_Controller {
	
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_gambarproduk');
    }
    
	public function index()
	{
        $data = array (
            'title' => 'Gambar Produk',
            'gambarproduk' => $this->m_gambarproduk->get_all_data(),
            'isi' => 'gambarproduk/v_index',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}
}
