<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_matakuliah extends CI_Model
{
    public function count_matakuliah()
    {
        return $this->db->count_all_results('matakuliah');
    }
    public function get_all_matakuliah()
    {
        $this->db->select('*');
        $this->db->from('matakuliah');
        $this->db->join('prodi', 'prodi.kd_prodi=matakuliah.kd_prodi', 'left');
        $this->db->order_by('nama_prodi', 'asc');
        return $this->db->get()->result();
    }
    public function add_matakuliah($data)
    {
        $this->db->insert('matakuliah', $data);
    }
}