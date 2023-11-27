<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_setting extends CI_Model
{
    public function data_setting()
    {
        $this->db->select('*');
        $this->db->from('tbl_set_lokasi');
        $this->db->where('id', 1);
        return $this->db->get()->row();
    }

    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('tbl_set_lokasi', $data);
    }

}
