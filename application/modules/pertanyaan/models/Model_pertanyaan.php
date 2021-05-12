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
        $this->db->join('kriteria_pertanyaan', 'kriteria_pertanyaan.kd_kriteria=pertanyaan.kd_kriteria', 'right');
        //$this->db->group_by('nama_kriteria');
        $this->db->order_by('nama_kriteria', 'asc');
        return $this->db->get()->result();
    }
    public function get_pertanyaan_by_kd_kriteria_km()
    {
        $this->db->select('*');
        $this->db->from('pertanyaan');
        $this->db->where('kd_kriteria', 'KM');
        return $this->db->get()->result();
    }

    public function get_pertanyaan_by_kd_kriteria_mp()
    {
        $this->db->select('*');
        $this->db->from('pertanyaan');
        $this->db->where('kd_kriteria', 'MP');
        return $this->db->get()->result();
    }
    public function get_pertanyaan_by_kd_kriteria_dm()
    {
        $this->db->select('*');
        $this->db->from('pertanyaan');
        $this->db->where('kd_kriteria', 'DM');
        return $this->db->get()->result();
    }
    public function get_pertanyaan_by_kd_kriteria_emj()
    {
        $this->db->select('*');
        $this->db->from('pertanyaan');
        $this->db->where('kd_kriteria', 'EMJ');
        return $this->db->get()->result();
    }
    public function get_pertanyaan_by_kd_kriteria_kd()
    {
        $this->db->select('*');
        $this->db->from('pertanyaan');
        $this->db->where('kd_kriteria', 'KD');
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

    public function edit_pertanyaan($data)
    {
        $this->db->where('id_pertanyaan', $this->input->post('id_pertanyaan'));
        $this->db->update('pertanyaan', $data);
    }
    public function get_pertanyaan_by_id($id_pertanyaan)
    {
        $this->db->select('*');
        $this->db->from('pertanyaan');
        $this->db->join('kriteria_pertanyaan', 'kriteria_pertanyaan.kd_kriteria=pertanyaan.kd_kriteria', 'left');
        $this->db->where('id_pertanyaan', $id_pertanyaan);
        return $this->db->get()->row();
    }
}