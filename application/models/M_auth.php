<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model 
{
    public function login_user($username, $password) {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function login_pelanggan($email, $password) {
        $this->db->select('*');
        $this->db->from('tbl_pelanggan');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->limit(1);
        return $this->db->get()->row();
    }

     public function get_profile_image($username) {
        $this->db->select('profile_image');
        $this->db->from('tbl_user');
        $this->db->where('username', $username);
        return $this->db->get()->row('profile_image');
    }

}


	