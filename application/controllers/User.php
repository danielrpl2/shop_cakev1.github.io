<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        $this->load->library('upload');
    }

    public function index()
    {
        $data = array(
            'title' => 'User',
            'user' => $this->m_user->get_all_data(),
            'isi' => 'v_user',
        );
        $this->load->view('layout/v_wrapper_backend', $data, false);
    }

    public function add()
    {
        try {
            $data = array(
                'nama_user' => $this->input->post('nama_user'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'email' => $this->input->post('email'),
                'no_tlp' => $this->input->post('no_tlp'),
                'level_user' => $this->input->post('level_user'),
            );

            $profile_image = $_FILES['profile_image']['name'];
            if ($profile_image) {
                $config['upload_path'] = './assets/profileimg/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 10048; // 2MB max size, you can change this value
                $config['file_name'] = $this->input->post('username') . '_' . time(); // New file name

                $this->upload->initialize($config);

                if ($this->upload->do_upload('profile_image')) {
                    $upload_data = $this->upload->data();
                    $data['profile_image'] = $upload_data['file_name'];
                } else {
                    throw new Exception('Failed to upload profile image: ' . $this->upload->display_errors());
                }
            }

            $this->m_user->add($data);
            $this->session->set_flashdata('swal', 'success');
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
            redirect('user');
        } catch (Exception $e) {
            $this->session->set_flashdata('swal', 'error');
            $this->session->set_flashdata('pesan', 'Error adding data: ' . $e->getMessage());
            redirect('user');
        }
    }

    // Example code for handling errors during editing
    public function edit($id_user = null)
    {
        try {
            if ($id_user === null) {
                throw new Exception('Invalid ID for editing');
            }

            $data = array(
                'id_user' => $id_user,
                'nama_user' => $this->input->post('nama_user'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'email' => $this->input->post('email'),
                'no_tlp' => $this->input->post('no_tlp'),
                'level_user' => $this->input->post('level_user'),
            );

            // Check if a new profile image is uploaded
            if ($_FILES['profile_image']['name']) {
                $config['upload_path'] = './assets/profileimg/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2048; // 2MB max size, you can change this value
                $config['file_name'] = $this->input->post('username') . '_' . time(); // New file name

                $this->upload->initialize($config);

                if ($this->upload->do_upload('profile_image')) {
                    $upload_data = $this->upload->data();
                    $data['profile_image'] = $upload_data['file_name'];

                    // Delete the old profile image if exists
                    if ($this->input->post('current_profile_image')) {
                        unlink('./assets/profileimg/' . $this->input->post('current_profile_image'));
                    }
                } else {
                    throw new Exception('Failed to upload profile image: ' . $this->upload->display_errors());
                }
            }

            $this->m_user->edit($data);
            $this->session->set_userdata($session_data);
            $this->session->set_flashdata('swal', 'success');
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
            redirect('user');
        } catch (Exception $e) {
            $this->session->set_flashdata('swal', 'error');
            $this->session->set_flashdata('pesan', 'Error editing data: ' . $e->getMessage());
            redirect('user');
        }
    }

    // Example code for handling errors during deletion
    public function delete($id_user = null)
    {
        try {
            if ($id_user === null) {
                throw new Exception('Invalid ID for deletion');
            }

            $data = array('id_user' => $id_user);

            // Your code for deleting data
            $this->m_user->delete($data);

            // If the operation is successful
            $this->session->set_flashdata('swal', 'success');
            $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
            redirect('user');
        } catch (Exception $e) {
            // If an error occurs
            $this->session->set_flashdata('swal', 'error');
            $this->session->set_flashdata('pesan', 'Error deleting data: ' . $e->getMessage());
            redirect('user');
        }
    }

}
