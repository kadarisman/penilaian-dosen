<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{
    //below this codeigniter querys builder to process data users from the database :

    public function count_mahasiswa()
    {
        $this->db->where('level', 'mahasiswa');
        return $this->db->count_all_results('user');
    }
    public function count_prodi()
    {
        $this->db->where('level', 'prodi');
        return $this->db->count_all_results('user');
    }
    public function count_dosen()
    {
        $this->db->where('level', 'dosen');
        return $this->db->count_all_results('user');
    }
    public function count_bpm()
    {
        $this->db->where('level', 'BPM');
        return $this->db->count_all_results('user');
    }
    public function count_admin()
    {
        $this->db->where('level', 'admin');
        return $this->db->count_all_results('user');
    }


    public function get_admin()
    {
        $this->db->select('*');
        $this->db->from('user')->where('level', 'admin');
        return $this->db->get()->result();
    }

    public function get_BPM()
    {
        $this->db->select('*');
        $this->db->from('user')->where('level', 'BPM');
        return $this->db->get()->result();
    }

    public function get_user_prodi()
    {
        $this->db->select('*');
        $this->db->from('user')->where('level', 'prodi');
        $this->db->join('prodi', 'prodi.kd_prodi = user.kd_prodi');
        $this->db->order_by('nama_prodi', 'asc');
        return $this->db->get()->result();
    }

    public function get_user_dosen()
    {
        $this->db->select('*');
        $this->db->from('user')->where('level', 'dosen');
        $this->db->join('dosen', 'dosen.NIDN = user.username', 'left');
        $this->db->join('prodi', 'prodi.kd_prodi = dosen.kd_prodi', 'left');
        $this->db->order_by('nama_prodi', 'asc');
        return $this->db->get()->result();
    }

    public function get_user_mahasiswa()
    {
        $this->db->select('*');
        $this->db->from('user')->where('level', 'mahasiswa');
        $this->db->join('mahasiswa', 'mahasiswa.NPM = user.username', 'left');
        $this->db->join('prodi', 'prodi.kd_prodi = mahasiswa.kd_prodi', 'left');
        $this->db->order_by('nama_prodi', 'asc');
        return $this->db->get()->result();
    }

    public function get_user_ById($id)
    {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }

    public function add_user($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_user($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('user', $data);
    }

    public function delete_user($id)
    {
        $this->db->delete('user', ['id_user' => $id]);
    }

    public function select_where($table, $orderBy)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($orderBy, "asc");
        return $this->db->get()->result();
    }

    public function count_all_user()
    {
        return $this->db->count_all('user');
    }

    public function count_admin_user()
    {
        return $this->db
            ->where(['level' => 'admin BPM'])
            ->from('user')
            ->count_all_results();
    }

    public function count_prodi_user()
    {
        return $this->db
            ->where(['level' => 'prodi'])
            ->from('user')
            ->count_all_results();
    }

    public function count_dosen_user()
    {
        return $this->db
            ->where(['level' => 'dosen'])
            ->from('user')
            ->count_all_results();
    }

    public function count_mahasiswa_user()
    {
        return $this->db
            ->where(['level' => 'mahasiswa'])
            ->from('user')
            ->count_all_results();
    }

    public function user_prodi_get_data() //query for user prodi get self data in table prodi
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $this->session->userdata('username'));
        $this->db->join('prodi', 'prodi.kd_prodi = user.kd_prodi');
        return $this->db->get()->row_array();
    }

    public function user_dosen_get_data() //query for user dosen get self data in table dosen
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $this->session->userdata('username'));
        $this->db->join('dosen', 'dosen.NIDN = user.username');
        return $this->db->get()->row_array();
    }

    public function user_mahasiswa_get_data() //query for user mahasiswa get self data in table mahasiswa
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $this->session->userdata('username'));
        $this->db->join('mahasiswa', 'mahasiswa.NPM = user.username');
        return $this->db->get()->row_array();
    }
}

/* End of file Model_user.php */