<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_fakultas extends CI_Model
{
    public function count_fakultas()
    {
        return $this->db->count_all_results('fakultas');
    }
    public function get_all_fakultas()
    {
        return $this->db->get('fakultas')->result();
    }
    public function add_fakultas($data)
    {
        $this->db->insert('fakultas', $data);
    }
    public function edit_fakultas($data)
    {
        $this->db->where('kd_fakultas', $this->input->post('kd_fakultas'));
        $this->db->update('fakultas', $data);
    }
    public function get_fakultas_by_id($kd_fakultas)
    {
        $this->db->select('*');
        $this->db->from('fakultas');
        $this->db->where('kd_fakultas', $kd_fakultas);
        return $this->db->get()->row();
    }
    public function delete_fakultas($kd_fakultas)
    {
        $this->db->delete('fakultas', ['kd_fakultas' => $kd_fakultas]);
    }
}