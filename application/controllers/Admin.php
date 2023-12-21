<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->model('m_pesanan_masuk');
        $this->load->model('m_transaksi');
        $this->load->model('m_penjualan');

    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $total_revenue = $this->m_penjualan->getTotalRevenueByUserId($id_user);
        $data = array(
            'title' => 'Dashboard',
            // 'total_pesanan' => $this->m_admin->total_pesanan(),
            'belum_bayar' => $this->m_admin->total_pesanan_belum_bayar(),
            'sudah_bayar' => $this->m_admin->total_pesanan_sudah_bayar(),
            'dikirim' => $this->m_admin->total_pesanan_dikirim(),

            'selesai' => $this->m_admin->total_pesanan_selesai(),
            'total_revenue' => $total_revenue,
            'total_pendapatan' => $this->m_admin->total_pendapatan(),
            'total_produk' => $this->m_admin->total_produk(),
            'total_kategori' => $this->m_admin->total_kategori(),
            'total_pelanggan' => $this->m_admin->total_pelanggan(),
            'isi' => 'v_admin',
        );
        $this->load->view('layout/v_wrapper_backend', $data, false);
    }

    public function pesanan_masuk()
    {
        $data = array(
            'title' => 'Pesanan Masuk',
            'pesanan' => $this->m_pesanan_masuk->pesanan(),
            'pesanan_diproses' => $this->m_pesanan_masuk->pesanan_diproses(),
            'paksa_selesai' => $this->m_transaksi->dikirim(),
            'pesanan_dikirim' => $this->m_pesanan_masuk->pesanan_dikirim(),
            'pesanan_selesai' => $this->m_pesanan_masuk->pesanan_selesai(),
            'isi' => 'v_pesanan_masuk',
        );
        $this->load->view('layout/v_wrapper_backend', $data, false);
    }

    public function proses($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => '1',
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('swal', 'success');
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Proses !');
        redirect('admin/pesanan_masuk');

    }

    public function kirim($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'no_resi' => $this->input->post('no_resi'),
            'status_order' => '2',
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('swal', 'success');
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil DiKirim !');
        redirect('admin/pesanan_masuk');

    }

    public function diterima($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => '3',
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('swal', 'success');
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Terima !');
        redirect('admin/pesanan_masuk');

    }

    public function rekening()
    {
        $data = array(
            'title' => 'Rekening',
            'rekening' => $this->m_admin->get_all_data_rekening(),
            'isi' => 'rekening/v_rekening',
        );
        $this->load->view('layout/v_wrapper_backend', $data, false);
    }
    
    public function add()
    {
        try {
            $data = array(
                'nama_bank' => $this->input->post('nama_bank'),
                'no_rek' => $this->input->post('no_rek'),
                'atas_nama' => $this->input->post('atas_nama'),
            );

            $this->m_admin->add($data);
            $this->session->set_flashdata('swal', 'success');
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
            redirect('admin/rekening');
        } catch (Exception $e) {
            $this->session->set_flashdata('swal', 'error');
            $this->session->set_flashdata('pesan', 'Error adding data: ' . $e->getMessage());
            redirect('admin/rekening');
        }
    }

    public function edit($id_rekening = null)
    {
        try {
            if ($id_rekening === null) {
                throw new Exception('Invalid ID for editing');
            }

            $data = array(
                'id_rekening' => $id_rekening,
                'nama_bank' => $this->input->post('nama_bank'),
                'no_rek' => $this->input->post('no_rek'),
                'atas_nama' => $this->input->post('atas_nama'),
            );

            $this->m_admin->edit($data);
            $this->session->set_flashdata('swal', 'success');
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
            redirect('admin/rekening');
        } catch (Exception $e) {
            $this->session->set_flashdata('swal', 'error');
            $this->session->set_flashdata('pesan', 'Error editing data: ' . $e->getMessage());
            redirect('admin/rekening');
        }
    }

    public function delete($id_rekening = null)
    {
        try {
            if ($id_rekening === null) {
                throw new Exception('Invalid ID for deletion');
            }

            $data = array('id_rekening' => $id_rekening);

            // Your code for deleting data
            $this->m_admin->delete($data);

            // If the operation is successful
            $this->session->set_flashdata('swal', 'success');
            $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
            redirect('admin/rekening');
        } catch (Exception $e) {
            // If an error occurs
            $this->session->set_flashdata('swal', 'error');
            $this->session->set_flashdata('pesan', 'Error deleting data: ' . $e->getMessage());
            redirect('admin/rekening');
        }
    }


}
