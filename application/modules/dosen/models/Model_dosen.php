<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_dosen extends CI_Model
{
    public function count_dosen()
    {
        return $this->db->count_all_results('dosen');
    }
    public function get_all_dosen()
    {
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->join('prodi', 'prodi.kd_prodi=dosen.kd_prodi', 'left');
        $this->db->order_by('nama_prodi', 'asc');
        return $this->db->get()->result();
    }
}