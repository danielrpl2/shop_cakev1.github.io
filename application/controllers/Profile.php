<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        $this->load->model('m_penjualan');
        $this->load->library('upload');
        $this->load->library('session');
    }

    public function index()
    {
        try {
            // Set form validation rules
            $this->form_validation->set_rules('nama_user', 'Nama User', 'required', array('required' => '%s Harus Diisi !!!'));
            $this->form_validation->set_rules('username', 'Username', 'required', array('required' => '%s Harus Diisi !!!'));
            $this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s Harus Diisi !!!'));
            $this->form_validation->set_rules('no_tlp', 'No Tlp', 'required', array('required' => '%s Harus Diisi !!!'));
            $this->form_validation->set_rules('email', 'Email', 'required', array('required' => '%s Harus Diisi !!!'));

            // Check if form validation fails
            if ($this->form_validation->run() == false) {
                $id_user = $this->session->userdata('id_user');

                // mendapatkan pendapatan 
                $total_revenue = $this->m_penjualan->getTotalRevenueByUserId($id_user);
                // mendapatkan jumlah transaksi
                $total_sales_count = $this->m_penjualan->getTotalSalesCountByUserId($id_user);

                $data = array(
                    'title' => 'Profile',
                    'header' => 'Profile',
                    'total_revenue' => $total_revenue,
                    'total_sales_count' => $total_sales_count,
                    'profile' => $this->m_user->data_profile(),
                    'isi' => 'profile/v_profile_user',
                );
                $this->load->view('layout/v_wrapper_backend', $data, false);
            } else {
                // If validation passes, handle form data
                $data = array(
                    'nama_user' => $this->input->post('nama_user'),
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'no_tlp' => $this->input->post('no_tlp'),
                    'email' => $this->input->post('email'),
                );
                
                if ($_FILES['gambar']['name']) {
                    $config['upload_path'] = './assets/profileimg/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = 2048; // 2MB max size, you can change this value
                    $config['file_name'] = $this->input->post('username') . '_' . time(); // New file name

                    $this->upload->initialize($config);
                
                    if ($this->upload->do_upload('gambar')) {
                        $upload_data = $this->upload->data();
                        $data['profile_image'] = $upload_data['file_name'];

                        // Delete the old profile image if exists
                        if ($this->input->post('current_profile_image')) {
                            unlink('./assets/profileimg/' . $this->input->post('current_profile_image'));
                        }
                        $this->m_user->update_profile_image($id_user, $data['profile_image']);
                        
                        $session_data = array('profile_image' => $data['profile_image']);
                        $this->session->set_userdata($session_data);    } else {
                            throw new Exception('Failed to upload profile image: ' . $this->upload->display_errors());
                        }
                    }
                    $this->m_user->edit_profile($data);
                    $this->session->set_userdata($session_data);
                
                // Set flash message for success
                $this->session->set_flashdata('pesan', 'Profile Berhasil Diupdate!!!');
                $this->session->set_flashdata('swal', 'success');
                $this->session->set_flashdata('swal_message', 'Profile Berhasil Diupdate!!!');
                
                // Redirect to the profile page
                redirect('profile');
            }
        } catch (Exception $e) {
            // If an exception occurs, handle the error
            $this->session->set_flashdata('pesan', 'Error: ' . $e->getMessage());
            $this->session->set_flashdata('swal', 'error');
            $this->session->set_flashdata('swal_message', 'Error: ' . $e->getMessage());
            redirect('profile');
        }
    }
}
