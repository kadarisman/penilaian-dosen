<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_matakuliah extends CI_Model
{
    public function count_matakuliah()
    {
        return $this->db->count_all_results('matakuliah');
    }
    public function count_matakuliah_prodi()
    {
        $prodi = $this->session->userdata('kd_prodi');
        $this->db->from('matakuliah');
        $this->db->where('kd_prodi', $prodi);
        return $this->db->count_all_results();
    }
    public function get_matakuliah_mahasiswa()
    {
        $prodi = $this->session->userdata('kd_prodi');
        $this->db->select('*');
        $this->db->from('matakuliah');
        $where = array('matakuliah.kd_prodi' => $prodi);
        $this->db->where($where);
        return $this->db->get()->result();
    }

    public function ambil_nama_mk($kd_matakuliah)
    {
        $this->db->from('matakuliah');
        $this->db->where('kd_matakuliah', $kd_matakuliah);
        return $this->db->get()->row();
    }

    public function get_all_matakuliah()
    {
        $this->db->select('*');
        $this->db->from('matakuliah');
        $this->db->join('prodi', 'prodi.kd_prodi=matakuliah.kd_prodi', 'left');
        $this->db->join('fakultas', 'fakultas.kd_fakultas=prodi.kd_fakultas', 'left');
        $this->db->order_by('nama_prodi', 'asc');
        return $this->db->get()->result();
    }
    public function get_all_matakuliah_prodi()
    {
        $prodi = $this->session->userdata('kd_prodi');
        $this->db->select('*');
        $this->db->from('matakuliah');
        $this->db->join('prodi', 'prodi.kd_prodi = matakuliah.kd_prodi', 'left');
        $this->db->join('fakultas', 'fakultas.kd_fakultas=prodi.kd_fakultas', 'left');
        $where = array('matakuliah.kd_prodi' => $prodi);
        $this->db->where($where);
        return $this->db->get()->result();
    }
    public function get_all_tahun_ajaran()
    {
        //$prodi = $this->session->userdata('kd_prodi');
        $this->db->select('*');
        $this->db->from('tahun_ajaran');
        //$where = array('matakuliah.kd_prodi' => $prodi);
        //$this->db->where($where);
        return $this->db->get()->result();
    }
    public function add_matakuliah($data)
    {
        $this->db->insert('matakuliah', $data);
    }

    public function edit_matakuliah($data)
    {
        $this->db->where('kd_matakuliah', $this->input->post('kd_matakuliah'));
        $this->db->update('matakuliah', $data);
    }
    public function get_matakuliah_by_id($kd_matakuliah)
    {
        $this->db->select('*');
        $this->db->from('matakuliah');
        $this->db->join('prodi', 'prodi.kd_prodi=matakuliah.kd_prodi', 'left');
        $this->db->where('kd_matakuliah', $kd_matakuliah);
        return $this->db->get()->row();
    }
    public function delete_matakuliah($kd_matakuliah)
    {
        $this->db->delete('matakuliah', ['kd_matakuliah' => $kd_matakuliah]);
    }
}