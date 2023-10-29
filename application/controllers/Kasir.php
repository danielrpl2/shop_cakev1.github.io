<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        
    }

    public function index()
    {
        $data = array (
            'title' => 'Kasir',
            'isi' => 'kasir/v_transaksi',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

}