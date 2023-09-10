<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('m_kategori');
    }

    // List all your items
    public function register()
    {
        $data = array (
            'title' => 'Pelanggan',
            'isi' => 'v_register',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
}   