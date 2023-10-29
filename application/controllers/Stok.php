<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends CI_Controller {
	
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_produk');        
        $this->load->model('m_stok');        
        $this->load->model('m_supplier');        
    }

    public function index() {
        $data = array (
            'title' => 'Stok',
            'produk' => $this->m_produk->get_all_data(),
            'supplier' => $this->m_supplier->get_all_data_supplier(),
            'isi' => 'stok/v_stok_in',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function stock_in_add() {
        $data = array (
            'title' => 'Tambah Stok',
            'produk' => $this->m_produk->get_all_data(),
            // 'supplier' => $this->m_supplier->get_all_data_supplier(),
            'isi' => 'stok/v_stok_add',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function proses() {
        if (isset($_POST['tambah_stok'])) {
            $post = $this->input->post(null, TRUE);
            // $post['id_user'] = $this->session->userdata('id_user');
            $this->m_stok->tambah_stok($post);
            $this->m_produk->update_stok_in($post);
    
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Stok Berhasil Ditambahkan');
            }
            redirect('stok');
        }
    }
    
}