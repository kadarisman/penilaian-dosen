<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_nilai extends CI_Model
{
    public function count_nilai()
    {
        return $this->db->count_all_results('nilai');
    }

    public function nilai_detail($NIDN)
    {
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');
        $this->db->join('mahasiswa', 'mahasiswa.NPM = nilai.NPM', 'left');
        $this->db->join('matakuliah', 'matakuliah.kd_matakuliah = nilai.kd_matakuliah', 'left');
        $this->db->group_by('nilai.kd_matakuliah');
        $this->db->order_by('nilai',' desc');
        $this->db->where('nilai.NIDN', $NIDN);
        return $this->db->get()->result();

    }
    // public function nilai_detail_by_mk($NIDN)
    // {
    //     $this->db->select('*');
    //     $this->db->from('nilai');
    //     $this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');
    //     $this->db->join('mahasiswa', 'mahasiswa.NPM = nilai.NPM', 'left');
    //     $this->db->join('matakuliah', 'matakuliah.kd_matakuliah = nilai.kd_matakuliah', 'left');
    //     $this->db->group_by('nilai.NIDN');
    //     $this->db->group_by('nilai.kd_matakuliah');
    //     $this->db->where('nilai.NIDN', $NIDN);
    //     return $this->db->get()->result();

    // }
    public function get_dosen_by_id($NIDN)
    {
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->where('NIDN', $NIDN);
        return $this->db->get()->row();
    }

    public function detail_genap($kd_matakuliah)
    {
        $prodi = $this->session->userdata('kd_prodi');
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');
        $this->db->join('mahasiswa', 'mahasiswa.NPM = nilai.NPM', 'left');

        $this->db->group_by('nilai.NIDN');
        //$this->db->group_by(array('nilai.NIDN', 'nilai.kd_matakuliah', 'nilai.smester', 'nilai.tahun_ajaran'));
        $this->db->order_by('smester', 'desc');
        $this->db->order_by('tahun_ajaran', 'desc');

        $this->db->where('nilai.kd_matakuliah', $kd_matakuliah);
        $this->db->where('dosen.kd_prodi',$prodi);
        $this->db->where('nilai.smester','Genap');
        return $this->db->get()->result();
    }
    public function detail_ganjil($kd_matakuliah)
    {
        $prodi = $this->session->userdata('kd_prodi');
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');
        $this->db->join('mahasiswa', 'mahasiswa.NPM = nilai.NPM', 'left');

        $this->db->group_by('nilai.NIDN');
        //$this->db->group_by(array('nilai.NIDN', 'nilai.kd_matakuliah', 'nilai.smester', 'nilai.tahun_ajaran'));
        $this->db->order_by('smester', 'desc');
        $this->db->order_by('tahun_ajaran', 'desc');

        $this->db->where('nilai.kd_matakuliah', $kd_matakuliah);
        $this->db->where('dosen.kd_prodi',$prodi);
        $this->db->where('nilai.smester','Ganjil');
        return $this->db->get()->result();
    }


    public function detail_genap_mhs($kd_matakuliah)
    {
        $mhs = $this->session->userdata('username');
        //echo $mhs; die();
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');

        $this->db->group_by('nilai.NIDN');
        //$this->db->group_by(array('nilai.NIDN', 'nilai.kd_matakuliah', 'nilai.smester', 'nilai.tahun_ajaran'));
        $this->db->order_by('smester', 'desc');
        $this->db->order_by('tahun_ajaran', 'desc');

        $this->db->where('nilai.kd_matakuliah', $kd_matakuliah);
        $this->db->where('nilai.NPM',$mhs);
        $this->db->where('nilai.smester','Genap');
        return $this->db->get()->result();
    }
    public function detail_ganjil_mhs($kd_matakuliah)
    {
        $mhs = $this->session->userdata('username');
        //echo $mhs; die();
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');

        $this->db->group_by('nilai.NIDN');
        //$this->db->group_by(array('nilai.NIDN', 'nilai.kd_matakuliah', 'nilai.smester', 'nilai.tahun_ajaran'));
        $this->db->order_by('smester', 'desc');
        $this->db->order_by('tahun_ajaran', 'desc');

        $this->db->where('nilai.kd_matakuliah', $kd_matakuliah);
        $this->db->where('nilai.NPM',$mhs);
        $this->db->where('nilai.smester','Ganjil');
        return $this->db->get()->result();
    }

    public function get_all_nilai()
    {
        $this->db->from('nilai');
        $this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');
        $this->db->join('mahasiswa', 'mahasiswa.NPM = nilai.NPM', 'left');
        $this->db->join('prodi', 'prodi.kd_prodi = dosen.kd_prodi', 'left');
        $this->db->join('matakuliah', 'matakuliah.kd_matakuliah = nilai.kd_matakuliah', 'left');
        $this->db->join('fakultas', 'fakultas.kd_fakultas = prodi.kd_fakultas', 'left');
        return $this->db->get()->result();
    }
    public function add_nilai($data)
    {
        $this->db->insert('nilai', $data);
    }
    public function edit_nilai($data)
    {
        $this->db->where('id_nilai', $this->input->post('id_nilai'));
        $this->db->update('nilai', $data);
    }
    public function get_nilai_by_id($id_nilai)
    {
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->join('dosen', 'dosen.NIDN=nilai.NIDN', 'left');
        $this->db->join('matakuliah', 'matakuliah.kd_matakuliah = nilai.kd_matakuliah', 'left');
        $this->db->where('id_nilai', $id_nilai);
        return $this->db->get()->row();
    }

    public function get_nilai_by_NIDN($NIDN)
    {
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->join('dosen', 'dosen.NIDN=nilai.NIDN', 'left');
        $this->db->join('mahasiswa', 'mahasiswa.NPM = nilai.NPM', 'left');
        $this->db->join('matakuliah', 'matakuliah.kd_matakuliah = nilai.kd_matakuliah', 'left');
        $this->db->where('nilai.NIDN', $NIDN);
        return $this->db->get()->result();
    }

    public function get_nilai_by_NIDN2($NIDN)
    {
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->join('dosen', 'dosen.NIDN=nilai.NIDN', 'left');
        $this->db->join('prodi', 'prodi.kd_prodi = dosen.kd_prodi', 'left');
        $this->db->where('nilai.NIDN', $NIDN);
        return $this->db->get()->row();
    }


    public function count_nilai_mahasiswa()
    {
        $username = $this->session->userdata('username');
        $this->db->from('nilai');
        $this->db->where('NPM', $username);
        return $this->db->count_all_results();
    }

    public function count_nilai_prodi()
    {
        $kd_prodi = $this->session->userdata('kd_prodi');
        $this->db->from('nilai');
        $this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');
        $this->db->where('kd_prodi', $kd_prodi);
        return $this->db->count_all_results();
    }
    // public function count_nilai_prodi_per_mk()
    // {
    //     $kd_prodi = $this->session->userdata('kd_prodi');
    //     $this->db->from('nilai');
    //     $this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');
    //     //$this->db->join('matakuliah', 'dosen.NIDN = matakuliah.NIDN', 'left');
    //     //$this->db->join('matakuliah', 'nilai.kd_matakuliah = matakuliah.kd_matakuliah', 'left');
    //     $this->db->where('kd_prodi', $kd_prodi);
    //     return $this->db->count_all_results();
    // }

    public function count_nilai_self()
    {
        $username = $this->session->userdata('username');
        $this->db->from('nilai');
        $this->db->where('NIDN', $username);
        return $this->db->count_all_results();
    }
    public function get_nilai_mahasiswa()
    {
        $username = $this->session->userdata('username');
        $this->db->from('nilai');
        $this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');
        $this->db->join('prodi', 'prodi.kd_prodi = dosen.kd_prodi', 'left');
        $this->db->join('matakuliah', 'matakuliah.kd_matakuliah = nilai.kd_matakuliah', 'left');
        $this->db->join('fakultas', 'fakultas.kd_fakultas = prodi.kd_fakultas', 'left');
        $this->db->where('nilai.NPM', $username);
        return $this->db->get()->result();
    }
    public function get_all_nilai_self()
    {
        $username = $this->session->userdata('username');
        $this->db->from('nilai');
        $this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');
        $this->db->join('prodi', 'prodi.kd_prodi = dosen.kd_prodi', 'left');
        $this->db->join('mahasiswa', 'mahasiswa.NPM = nilai.NPM', 'left');
        $this->db->join('matakuliah', 'matakuliah.kd_matakuliah = nilai.kd_matakuliah', 'left');
        $this->db->order_by('smester', 'desc');
        $this->db->order_by('tahun_ajaran', 'desc');
        $this->db->where('nilai.NIDN', $username);
        return $this->db->get()->result();
    }

    public function get_nilai_prodi()
    {
        $kd_prodi = $this->session->userdata('kd_prodi');
        $this->db->from('nilai');
        $this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');
        $this->db->join('mahasiswa', 'mahasiswa.NPM = nilai.NPM', 'left');
        $this->db->join('matakuliah', 'matakuliah.kd_matakuliah = nilai.kd_matakuliah', 'left');
        $this->db->order_by('smester', 'desc');
        $this->db->order_by('tahun_ajaran', 'desc');
        $this->db->where('dosen.kd_prodi', $kd_prodi);
        return $this->db->get()->result();
    }


    public function filter_tahun_prodi($tahun, $smester)
    {
        $kd_prodi = $this->session->userdata('kd_prodi');
        $this->db->select('*');
        $this->db->select_sum('nilai');
        $this->db->from('nilai');
        $this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');
        $this->db->join('matakuliah', 'matakuliah.kd_matakuliah = nilai.kd_matakuliah', 'left');
        $this->db->group_by('nilai.NIDN');
        $this->db->group_by(array('nilai.NIDN', 'nilai.kd_matakuliah', 'nilai.smester', 'nilai.tahun_ajaran'));
        $this->db->order_by('smester', 'desc');
        $this->db->order_by('tahun_ajaran', 'desc');
        $where = array('dosen.kd_prodi' => $kd_prodi, 'nilai.tahun_ajaran' => $tahun, 'nilai.smester' => $smester);
        $this->db->where($where);
        return $this->db->get()->result();
    }

    public function filter_tahun($tahun, $smester)
    {
        $this->db->select('*');
        $this->db->select_sum('nilai');
        $this->db->from('nilai');
        $this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');
        $this->db->join('matakuliah', 'matakuliah.kd_matakuliah = nilai.kd_matakuliah', 'left');
        $this->db->group_by('nilai.NIDN');
        $this->db->group_by(array('nilai.NIDN', 'nilai.kd_matakuliah', 'nilai.smester', 'nilai.tahun_ajaran'));
        $this->db->order_by('smester', 'desc');
        $this->db->order_by('tahun_ajaran', 'desc');
        $where = array('nilai.tahun_ajaran' => $tahun, 'nilai.smester' => $smester);
        $this->db->where($where);
        return $this->db->get()->result();
    }
    // function filter_nilai($smester, $tahun_ajaran)
    // {
    //     $where = array();

    //     if ($smester != '') $where['smester'] = $smester;
    //     if ($tahun_ajaran != '') $where['tahun_ajaran'] = $tahun_ajaran;

    //     if (empty($where)) {
    //         return array(); // ... or NULL
    //     } else {
    //         return $this->db->get_where('nilai', $where);
    //     }
    // }
    public function rekapitulasi_prodi()
    {
        $kd_prodi = $this->session->userdata('kd_prodi');
        $this->db->select('*');
        $this->db->select_sum('nilai');
        $this->db->from('nilai');
        $this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');
        $this->db->join('matakuliah', 'matakuliah.kd_matakuliah = nilai.kd_matakuliah', 'left');
        $this->db->group_by('nilai.NIDN');
        $this->db->group_by(array('nilai.NIDN', 'nilai.kd_matakuliah', 'nilai.smester', 'nilai.tahun_ajaran'));
        $this->db->order_by('smester', 'desc');
        $this->db->order_by('tahun_ajaran', 'desc');
        $this->db->where('dosen.kd_prodi', $kd_prodi);
        return $this->db->get()->result();


        // SELECT NIDN, SUM(nilai) AS total 
        // FROM `nilai` 
        // GROUP BY NIDN

    }

    public function informasi_nilai_prodi()
    {
        $tahun1 = date('Y');
        $tahun2 = date('Y') + 1;
        $ta= $tahun1.' / '. $tahun2;

        $kd_prodi = $this->session->userdata('kd_prodi');
        $this->db->select('*');
        $this->db->select_sum('nilai');
        $this->db->from('nilai');
        $this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');
        //$this->db->join('matakuliah', 'matakuliah.kd_matakuliah = nilai.kd_matakuliah', 'left');
        $this->db->group_by('nilai.NIDN');
        //$this->db->group_by(array('nilai.NIDN', 'nilai.smester'));
        //$this->db->order_by('smester', 'desc');
        $this->db->order_by('nilai',' desc');
        $this->db->where('nilai.tahun_ajaran', $ta);
        $this->db->where('dosen.kd_prodi', $kd_prodi);
        return $this->db->get()->result();


        // SELECT NIDN, SUM(nilai) AS total 
        // FROM `nilai` 
        // GROUP BY NIDN

    }

    public function rekapitulasi()
    {
        $this->db->select('*');
        $this->db->select_sum('nilai');
        $this->db->from('nilai');
        $this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');
        $this->db->join('matakuliah', 'matakuliah.kd_matakuliah = nilai.kd_matakuliah', 'left');
        $this->db->group_by('nilai.NIDN');
        $this->db->group_by(array('nilai.NIDN', 'nilai.kd_matakuliah', 'nilai.smester', 'nilai.tahun_ajaran'));
        $this->db->order_by('smester', 'desc');
        $this->db->order_by('tahun_ajaran', 'desc');
        return $this->db->get()->result();
    }

    public function count_NIDN_in_nilai()
    {
        // $kd_prodi = $this->session->userdata('kd_prodi');
        $query = $this->db->query('SELECT nilai.id_nilai, COUNT( * ) as total FROM nilai
         GROUP BY NIDN');
        return $query->result();
    }

    public function delete_nilai($id_nilai)
    {
        $this->db->delete('nilai', ['id_nilai' => $id_nilai]);
    }
}
