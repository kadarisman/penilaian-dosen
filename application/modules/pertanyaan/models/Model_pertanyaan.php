<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_pertanyaan extends CI_Model
{
    public function count_pertanyaan()
    {
        return $this->db->count_all_results('pertanyaan');
    }
    public function get_all_pertanyaan()
    {
        $this->db->select('*');
        $this->db->from('pertanyaan');
        $this->db->join('kriteria_pertanyaan', 'kriteria_pertanyaan.kd_kriteria=pertanyaan.kd_kriteria', 'left');
        $this->db->order_by('nama_kriteria', 'asc');
        return $this->db->get()->result();
    }
    public function get_all_kriteria()
    {
        $this->db->select('*');
        $this->db->from('kriteria_pertanyaan');
        $this->db->order_by('nama_kriteria', 'asc');
        return $this->db->get()->result();
    }
    public function add_pertanyaan($data)
    {
        $this->db->insert('pertanyaan', $data);
    }
}