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

    public function add_mahasiswa($data)
    {
        $this->db->insert('mahasiswa', $data);
    }
    public function edit_mahasiswa($data)
    {
        $this->db->where('NPM', $this->input->post('NPM'));
        $this->db->update('mahasiswa', $data);
    }
    public function get_mahasiswa_by_id($NPM)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('prodi', 'prodi.kd_prodi=mahasiswa.kd_prodi', 'left');
        $this->db->where('NPM', $NPM);
        return $this->db->get()->row();
    }
}