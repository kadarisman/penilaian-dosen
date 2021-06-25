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

    public function get_prodi_name($kd_prodi)
    {
        $this->db->select('*');
        return $this->db->get_where('prodi', ['kd_prodi' => $kd_prodi])->row();
    }

    public function get_all_prodi_for_admin()
    {
        $this->db->select('*');
        $this->db->from('prodi');
        $this->db->join('fakultas', 'fakultas.kd_fakultas=prodi.kd_fakultas', 'left');
        $this->db->order_by('nama_prodi', 'asc');
        return $this->db->get()->result();
    }
    public function add_prodi($data)
    {
        $this->db->insert('prodi', $data);
    }

    public function edit_prodi($data)
    {
        $this->db->where('kd_prodi', $this->input->post('kd_prodi'));
        $this->db->update('prodi', $data);
    }
    public function get_prodi_by_id($kd_prodi)
    {
        $this->db->select('*');
        $this->db->from('prodi');
        $this->db->join('fakultas', 'fakultas.kd_fakultas=prodi.kd_fakultas', 'left');
        $this->db->where('kd_prodi', $kd_prodi);
        return $this->db->get()->row();
    }
    public function delete_prodi($kd_prodi)
    {
        $this->db->delete('prodi', ['kd_prodi' => $kd_prodi]);
    }
}