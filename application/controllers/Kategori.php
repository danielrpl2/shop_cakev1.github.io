<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kategori');
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Kategori',
            'kategori' => $this->m_kategori->get_all_data(),
            'isi' => 'v_kategori',
        );
        $this->load->view('layout/v_wrapper_backend', $data, false);
    }

    public function add()
    {
        try {
            // Your code for adding data
            $data = array(
                'nama_kategori' => $this->input->post('nama_kategori'),
            );
            $this->m_kategori->add($data);

            // If the operation is successful
            $this->session->set_flashdata('swal', 'success');
            $this->session->set_flashdata('pesan', 'Data added successfully');
            redirect('kategori');
        } catch (Exception $e) {
            // If an error occurs
            $this->session->set_flashdata('swal', 'error');
            $this->session->set_flashdata('pesan', 'Error adding data: ' . $e->getMessage());
            redirect('kategori');
        }
    }

    // Example code for handling errors during editing
    public function edit($id_kategori = null)
    {
        try {
            if ($id_kategori === null) {
                throw new Exception('Invalid ID for editing');
            }

            $data = array(
                'id_kategori' => $id_kategori,
                'nama_kategori' => $this->input->post('nama_kategori'),
            );

            // Your code for editing data
            $this->m_kategori->edit($data);

            // If the operation is successful
            $this->session->set_flashdata('swal', 'success');
            $this->session->set_flashdata('pesan', 'Data edited successfully');
            redirect('kategori');
        } catch (Exception $e) {
            // If an error occurs
            $this->session->set_flashdata('swal', 'error');
            $this->session->set_flashdata('pesan', 'Error editing data: ' . $e->getMessage());
            redirect('kategori');
        }
    }

    // Example code for handling errors during deletion
    public function delete($id_kategori = null)
    {
        try {
            if ($id_kategori === null) {
                throw new Exception('Invalid ID for deletion');
            }

            // Your code for deleting data
            $data = array('id_kategori' => $id_kategori);
            $this->m_kategori->delete($data);

            // If the operation is successful
            $this->session->set_flashdata('swal', 'success');
            $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
            redirect('user');
        } catch (Exception $e) {
            // If an error occurs
            $this->session->set_flashdata('swal', 'error');
            $this->session->set_flashdata('pesan', 'Error deleting data: ' . $e->getMessage());
            redirect('kategori');
        }
    }

}
