<?php defined('BASEPATH') or exit('No direct script access allowed');

class Matakuliah  extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index() // method index
    {
        $data['title'] = 'Matakuliah';
        $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
        $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
        $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  
        $data['total_mahasiswa'] = $this->Model_user->count_mahasiswa();
        $data['total_prodi'] = $this->Model_user->count_prodi();
        $data['total_dosen'] = $this->Model_user->count_dosen();
        $data['total_bpm'] = $this->Model_user->count_bpm();
        $data['total_admin'] = $this->Model_user->count_admin();
        $data['total_fakultas'] = $this->Model_fakultas->count_fakultas();
        $data['fakultas'] = $this->Model_fakultas->get_all_fakultas();
        $data['total_prodi'] = $this->Model_prodi->count_prodi();
        $data['prodi'] = $this->Model_prodi->get_all_prodi();
        $data['total_dosen'] = $this->Model_dosen->count_dosen();
        $data['dosen'] = $this->Model_dosen->get_all_dosen();
        $data['total_mahasiswa'] = $this->Model_mahasiswa->count_mahasiswa();
        $data['mahasiswa'] = $this->Model_mahasiswa->get_all_mahasiswa();
        $data['total_pertanyaan'] = $this->Model_pertanyaan->count_pertanyaan();
        $data['pertanyaan'] = $this->Model_pertanyaan->get_all_pertanyaan();
        $data['total_matakuliah'] = $this->Model_matakuliah->count_matakuliah();
        $data['matakuliah'] = $this->Model_matakuliah->get_all_matakuliah();
        $data['selectProdi'] = $this->Model_user->select_where('prodi', 'nama_prodi');
        // $data['selectMahasiswa'] = $this->Model_mahasiswa->get_all_mahasiswa();
        $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_matakuliah', $data);
        $this->load->view('templates/footer');
    }
}