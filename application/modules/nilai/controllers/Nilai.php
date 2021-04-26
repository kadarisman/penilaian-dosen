<?php defined('BASEPATH') or exit('No direct script access allowed');
class Nilai  extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    //mahasiswa method
    public function get_nilai_mahasiswa()
    {
        $data['title'] = 'Nilai';
        //get data for session        
        $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
        $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
        $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--// 

        //prodi count master data
        $data['total_nilai_mahasiswa'] = $this->Model_nilai->count_nilai_mahasiswa();
        $data['nilai_mahasiswa'] = $this->Model_nilai->get_nilai_mahasiswa();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('mahasiswa/v_nilai_mahasiswa', $data);
        $this->load->view('templates/footer');
    }
}