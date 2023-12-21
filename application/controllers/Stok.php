<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_produk');
        $this->load->model('m_stok');
        $this->load->model('m_supplier');
    }

    public function index()
    {
        $data = array(
            'title' => 'Stok',
            'produk' => $this->m_produk->get_all_data(),
            'supplier' => $this->m_supplier->get_all_data_supplier(),
            'stok' => $this->m_stok->get_stok_in()->result(), // Menggunakan result() untuk mendapatkan data dalam bentuk array
            'isi' => 'stok/v_stok_masuk',
        );
        $this->load->view('layout/v_wrapper_backend', $data, false);
    }

    public function tambah_stok()
    {
        $data = array(
            'title' => 'Tambah Stok',
            'produk' => $this->m_produk->get_all_data(),
            'supplier' => $this->m_supplier->get_all_data_supplier(),
            'isi' => 'stok/v_stok_add',
        );
        $this->load->view('layout/v_wrapper_backend', $data, false);
    }

    public function delete_stok($id_stok)
    {
        $data = $this->m_stok->get($id_stok)->row();
        if ($data) {
            $id_produk = $data->id_produk;
            $qty = $data->qty;
            $data_to_update = ['qty' => $qty, 'id_produk' => $id_produk];
            $this->m_produk->update_stok_out($data_to_update);
            $this->m_stok->delete($id_stok);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('swal', 'success');
                $this->session->set_flashdata('pesan', 'Data Stok Berhasil Dihapus');
            }
        } else {
            $this->session->set_flashdata('swal', 'error');
            $this->session->set_flashdata('pesan', 'Gagal menghapus data stok. Silakan coba lagi.');
        }

        redirect('stok');
    }

    public function proses()
    {
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

        // Check if the stock addition was successful
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('swal', 'success');
            $this->session->set_flashdata('pesan', 'Data Stok Berhasil Ditambahkan');
        } else {
            $this->session->set_flashdata('swal', 'error');
            $this->session->set_flashdata('pesan', 'Gagal menambahkan data stok. Silakan coba lagi.');
        }

        redirect('stok');
    }

    public function stok_keluar()
{
    $data = array(
        'title' => 'Stok Keluar',
        'stok_keluar' => $this->m_stok->get_stok_out()->result(),
        'isi' => 'stok/v_stok_keluar',
    );
    $this->load->view('layout/v_wrapper_backend', $data, false);
}




}
