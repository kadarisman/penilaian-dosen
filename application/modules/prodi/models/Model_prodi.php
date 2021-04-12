<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_prodi extends CI_Model
{
    public function count_prodi()
    {
        return $this->db->count_all_results('prodi');
    }
    public function get_all_prodi()
    {
        $this->db->select('*');
        $this->db->from('prodi');
        $this->db->join('fakultas', 'fakultas.kd_fakultas=prodi.kd_fakultas', 'left');
        $this->db->order_by('nama_fakultas', 'asc');
        return $this->db->get()->result();
    }
    public function add_prodi($data)
    {
        $this->db->insert('prodi', $data);
    }
}