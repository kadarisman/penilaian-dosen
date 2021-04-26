<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_nilai extends CI_Model
{
    public function count_nilai()
    {
        return $this->db->count_all_results('nilai');
    }

    public function get_all_nilai()
    {
        return $this->db->get('nilai')->result();
    }

    public function count_nilai_mahasiswa()
    {
        $username = $this->session->userdata('username');
        $this->db->from('nilai');
        $this->db->where('NPM', $username);
        return $this->db->count_all_results();
    }
    public function get_nilai_mahasiswa()
    {
        $username = $this->session->userdata('username');
        $this->db->from('nilai');
        $this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');
        $this->db->join('prodi', 'prodi.kd_prodi = dosen.kd_prodi', 'left');
        $this->db->join('fakultas', 'fakultas.kd_fakultas = prodi.kd_fakultas', 'left');
        $this->db->where($username);
        return $this->db->get()->result();
    }
}