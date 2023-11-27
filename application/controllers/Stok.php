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
            'stok' => $this->m_stok->get_stok_in()->result(), // Menggunakan result() untuk mendapatkan data dalam bentuk array
            'isi' => 'stok/v_stok',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
    
    public function tambah_stok() {
        $data = array (
            'title' => 'Tambah Stok',
            'produk' => $this->m_produk->get_all_data(),
            'supplier' => $this->m_supplier->get_all_data_supplier(),
            'isi' => 'stok/v_stok_add',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function delete_stok($id_stok) {
        $data = $this->m_stok->get($id_stok)->row();
        if ($data) {
            $id_produk = $data->id_produk;
            $qty = $data->qty;
            $data_to_update = ['qty' => $qty, 'id_produk' => $id_produk];
            $this->m_produk->update_stok_out($data_to_update);
            $this->m_stok->delete($id_stok);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Stok Berhasil Dihapus');
            }
        }
        redirect('stok');
    }
    

    public function proses() {
        $id_user = $this->session->userdata('id_user');
        $data = array(
            'date' => $this->input->post('date'),
            'id_produk' => $this->input->post('id_produk'),
            'id_supplier' => $this->input->post('id_supplier'),
            'detail' => $this->input->post('detail'),
            'qty' => $this->input->post('qty'),
            'id_user' => $id_user,
            'created' => date('Y-m-d H:i:s'), // Isi dengan nilai waktu saat ini
        );
        
        $this->db->insert('tbl_stok', $data);
        redirect('stok');
        

        // if (isset($_POST['tambah_stok'])) {
        //     $this->form_validation->set_rules('date', 'Tanggal', 'required');
        //     $this->form_validation->set_rules('id_supplier', 'Supplier', 'required');
        //     $this->form_validation->set_rules('qty', 'Qty', 'required|numeric');
    
        //     if ($this->form_validation->run() == FALSE) {
        //         // Validasi gagal, tampilkan pesan kesalahan
        //         $this->load->view('stok/v_stok_add');
        //     } else {
        //         // Validasi berhasil, lanjutkan dengan proses
        //         $post = $this->input->post(null, TRUE);
        //         $this->m_stok->tambah_stok($post);
        //         $this->m_produk->update_stok_in($post);
    
        //         if ($this->db->affected_rows() > 0) {
        //             $this->session->set_flashdata('success', 'Data Stok Berhasil Ditambahkan');
        //         }
                
        //     }
        // }
    }
    
}