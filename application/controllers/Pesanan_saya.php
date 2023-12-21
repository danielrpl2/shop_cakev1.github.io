<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_saya extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi');
        $this->load->model('m_pesanan_masuk');
        $this->load->model('m_home');

    }

    public function index()
    {
        $data = array(
            'title' => 'Pesanan Saya',
            'blog' => $this->m_home->get_all_data_blog(),
            'belum_bayar' => $this->m_transaksi->belum_bayar(),
            'diproses' => $this->m_transaksi->diproses(),
            'dikirim' => $this->m_transaksi->dikirim(),
            'selesai' => $this->m_transaksi->selesai(),
            'isi' => 'v_pesanan_saya',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, false);
    }

    public function bayar($id_transaksi)
    {
        $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required', array(
            'required' => '%s Harus Diisi !!!',
        ));

        if ($this->form_validation->run() == true) {
            $config['upload_path'] = './bukti_bayar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
            $config['max_size'] = '9000';
            $this->upload->initialize($config);
            $field_name = 'bukti_bayar';

            if (!$this->upload->do_upload($field_name)) {
                // SweetAlert for error
                $this->session->set_flashdata('swal', 'error');
                $this->session->set_flashdata('pesan', 'Upload Bukti Pembayaran Gagal !!!');

                $data = array(
                    'title' => 'Pembayaran',
                    'pesanan' => $this->m_transaksi->detail_pesanan($id_transaksi),
                    'rekening' => $this->m_transaksi->rekening(),
                    'blog' => $this->m_home->get_all_data_blog(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'v_bayar',
                );
                $this->load->view('layout/v_wrapper_frontend', $data, false);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './bukti_bayar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_transaksi' => $id_transaksi,
                    'atas_nama' => $this->input->post('atas_nama'),
                    'nama_bank' => $this->input->post('nama_bank'),
                    'no_rek' => $this->input->post('no_rek'),
                    'status_bayar' => '1',
                    'bukti_bayar' => $upload_data['uploads']['file_name'],
                );

                $this->m_transaksi->upload_buktibayar($data);

                // SweetAlert for success
                $this->session->set_flashdata('swal', 'success');
                $this->session->set_flashdata('pesan', 'Upload Bukti Pembayaran Sukses !!!');
                redirect('pesanan_saya');
            }
        }

        // SweetAlert for error
        $this->session->set_flashdata('swal', 'error');
        $this->session->set_flashdata('pesan', 'Silakan lengkapi formulir pembayaran.');

        $data = array(
            'title' => 'Pembayaran',
            'pesanan' => $this->m_transaksi->detail_pesanan($id_transaksi),
            'rekening' => $this->m_transaksi->rekening(),
            'blog' => $this->m_home->get_all_data_blog(),
            'isi' => 'v_bayar',
        );

        $this->load->view('layout/v_wrapper_frontend', $data, false);
    }

    public function diterima($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => '3',
        );

        if ($this->m_pesanan_masuk->update_order($data)) {
            // SweetAlert for success
            $this->session->set_flashdata('swal', 'success');
            $this->session->set_flashdata('pesan', 'Pesanan Diterima !!');
        } else {
            // SweetAlert for error
            $this->session->set_flashdata('swal', 'error');
            $this->session->set_flashdata('pesan', 'Gagal menandai pesanan sebagai diterima.');
        }

        redirect('pesanan_saya');
    }

    //cancel pesanan
    public function cancel($id_transaksi)
    {
        $pesanan = $this->m_transaksi->detail_pesanan($id_transaksi);

        // Pastikan pesanan belum dibayar (status order = 0) atau belum dikirim (status order = 2)
        if ($pesanan->status_order == 0 || $pesanan->status_order == 2) {
            // Hapus pesanan dari tbl_detail_transaksi

            // Hapus pesanan dari tbl_transaksi
            $this->m_transaksi->hapus_transaksi($id_transaksi);

            // SweetAlert for success
            $this->session->set_flashdata('swal', 'success');
            $this->session->set_flashdata('pesan', 'Pesanan berhasil di cancel.');
        } else {
            // SweetAlert for error
            $this->session->set_flashdata('swal', 'error');
            $this->session->set_flashdata('pesan', 'Pesanan tidak dapat dihapus karena sudah dibayar atau dikirim.');
        }

        redirect('pesanan_saya');
    }

}
