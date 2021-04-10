<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_mahasiswa extends CI_Model
{
    public function count_mahasiswa()
    {
        return $this->db->count_all_results('mahasiswa');
    }
    public function get_all_mahasiswa()
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('prodi', 'prodi.kd_prodi=mahasiswa.kd_prodi', 'left');
        $this->db->order_by('nama_prodi', 'asc');
        return $this->db->get()->result();
    }
}