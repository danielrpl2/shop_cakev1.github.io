<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->order_by('id_user', 'desc');
        return $this->db->get()->result();
    }

    public function add($data)
    {
        // Mengambil ID terakhir
        $last_id = $this->db->select('id_user')->order_by('id_user', 'desc')->limit(1)->get('tbl_user')->row();

        // Menghasilkan ID baru
        if ($last_id) {
            $last_id = $last_id->id_user;
            $id_number = (int) substr($last_id, 3) + 1; // Mengambil angka dari karakter ketiga dan seterusnya
            $new_id = 'USR' . str_pad($id_number, 2, '0', STR_PAD_LEFT); // Menggunakan panjang 2 untuk angka
        } else {
            $new_id = 'USR01'; // ID awal jika ini adalah entri pertama
        }
        $data['id_user'] = $new_id;
        $this->db->insert('tbl_user', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('tbl_user', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->delete('tbl_user', $data);
    }

    //edit profile
    public function data_profile()
    {
        // Assuming you are fetching the data based on the logged-in user's ID
        $id_user = $this->session->userdata('id_user'); // Assuming 'id_user' is the session variable storing the user's ID
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('id_user', $id_user);
        return $this->db->get()->row();
    }

    public function edit_profile($data)
    {
        $id_user = $this->session->userdata('id_user'); // Assuming 'id_user' is the session variable storing the user's ID
        $this->db->where('id_user', $id_user);
        $this->db->update('tbl_user', $data);
    }

    public function update_profile_image($id_user, $image_path)
    {
        $this->db->where('id_user', $id_user);
        $this->db->update('tbl_user', array('profile_image' => $image_path));
    }
}
