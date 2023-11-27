<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->model('m_stok');        
        $this->load->model('m_supplier');   
        $this->load->model('m_produk');   
        $this->load->model('m_transaksi');
        $this->load->model('m_home');
    }

    public function index()
    {
        $data = array (
            'title' => 'Kasir',
            'produk' => $this->m_home->get_all_data(),
            'galery' => $this->m_home->gallery(),
            'blog' => $this->m_home->get_all_data_blog(),
            'stok' => $this->m_stok->get_stok_in()->result(),
            'isi' => 'kasir/v_transaksi',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function tambah()
    {
        $redirect_page = $this->input->post('redirect_page');
        $data = array(
            'id'            => $this->input->post('casier_id'),
            'qty'           => $this->input->post('casier_qty'),
            'price'         => $this->input->post('casier_price'),
            'name'          => $this->input->post('casier_name'),
        );
    $this->cart->insert($data);
    redirect($redirect_page, 'refresh');
    }

    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('kasir');
    }

}