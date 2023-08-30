<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct()
	{
       parent::__construct();
	   $this->load->model('m_user');
       
	}

	public function index()
	{
        $data = array (
            'title' => 'User',
			'user' => $this->m_user->get_all_data(),
            'isi' => 'v_user',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'nama_user' => $this->input->post('nama_user'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'level_user' => $this->input->post('level_user'),
			// 'profile_image' => $this->input->post('profile_image'),
		);
		$profile_image = $_FILES['profile_image']['name'];
        if ($profile_image) {
            $data['profile_image'] = $profile_image;
            move_uploaded_file($_FILES['profile_image']['tmp_name'], './assets/profile_img/' . $profile_image);
        }
		$this->m_user->add($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
		redirect('user');
	}
	
	public function edit($id_user = NULL)
{
    $data = array(
        'id_user' => $id_user,
        'nama_user' => $this->input->post('nama_user'),
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password'),
        'level_user' => $this->input->post('level_user'),
    );

    // Check if a new profile image is uploaded
    if ($_FILES['profile_image']['name']) {
        $config['upload_path'] = './assets/profile_img/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // 2MB max size, you can change this value
        $config['file_name'] = $this->input->post('username') . '_' . time(); // New file name

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('profile_image')) {
            $upload_data = $this->upload->data();
            $data['profile_image'] = $upload_data['file_name'];
            
            // Delete the old profile image if exists
            if ($this->input->post('current_profile_image')) {
                unlink('./assets/profile_img/' . $this->input->post('current_profile_image'));
            }
        } else {
            $this->session->set_flashdata('error', 'Failed to upload profile image: ' . $this->upload->display_errors());
            redirect('user');
        }
    }

    $this->m_user->edit($data);
    $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
    redirect('user');
}

	
	public function delete($id_user = NULL)
	{
		$data = array('id_user' => $id_user);
		$this->m_user->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');
		redirect('user');
	}
	
}
