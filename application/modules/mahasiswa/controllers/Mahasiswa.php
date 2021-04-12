<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa  extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
    }

    public function index() // method index
    {
        $data['title'] = 'Mahasiswa';

        // all mahasiswa       
        $data['mahasiswa'] = $this->Model_mahasiswa->get_all_mahasiswa();
        //get data for session    
        $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
        $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
        $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  

        //count users
        $data['total_user_mahasiswa'] = $this->Model_user->count_mahasiswa();
        $data['total_user_prodi'] = $this->Model_user->count_prodi();
        $data['total_user_dosen'] = $this->Model_user->count_dosen();
        $data['total_user_bpm'] = $this->Model_user->count_bpm();
        $data['total_user_admin'] = $this->Model_user->count_admin();

        //count master data
        $data['total_fakultas'] = $this->Model_fakultas->count_fakultas();
        $data['total_prodi'] = $this->Model_prodi->count_prodi();
        $data['total_dosen'] = $this->Model_dosen->count_dosen();
        $data['total_mahasiswa'] = $this->Model_mahasiswa->count_mahasiswa();
        $data['total_pertanyaan'] = $this->Model_pertanyaan->count_pertanyaan();
        $data['total_matakuliah'] = $this->Model_matakuliah->count_matakuliah();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_mahasiswa', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_mahasiswa()
    {
        $this->form_validation->set_rules('NPM', 'Npm', 'required|trim|is_unique[mahasiswa.NPM]', [
            'is_unique' => 'NPM sudah terdaftar..!',
            'required' => 'NPM tidak boleh kosong..!',
        ]);

        $this->form_validation->set_rules('nama_mahasiswa', 'Nama_mahasiswa', 'required|trim', [
            'required' => 'Nama Mahasiswa tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('alamat_mahasiswa', 'Alamat_mahasiswa', 'required|trim', [
            'required' => 'Alamat Mahasiswa tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('kd_prodi', 'Kd_prodi', 'required|trim', [
            'required' => 'Prodi harus dipilih'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Mahasiswa';
            $data['prodi'] = $this->Model_prodi->get_all_prodi();

            //get data for session        
            $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
            $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
            $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  

            //count user
            $data['total_user_mahasiswa'] = $this->Model_user->count_mahasiswa();
            $data['total_user_prodi'] = $this->Model_user->count_prodi();
            $data['total_user_dosen'] = $this->Model_user->count_dosen();
            $data['total_user_bpm'] = $this->Model_user->count_bpm();
            $data['total_user_admin'] = $this->Model_user->count_admin();
            $data['dosen'] = $this->Model_dosen->get_all_dosen();

            //count master data
            $data['total_fakultas'] = $this->Model_fakultas->count_fakultas();
            $data['total_prodi'] = $this->Model_prodi->count_prodi();
            $data['total_dosen'] = $this->Model_dosen->count_dosen();
            $data['total_mahasiswa'] = $this->Model_mahasiswa->count_mahasiswa();
            $data['total_pertanyaan'] = $this->Model_pertanyaan->count_pertanyaan();
            $data['total_matakuliah'] = $this->Model_matakuliah->count_matakuliah();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('v_tambah_mahasiswa', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'NPM' => htmlspecialchars($this->input->post('NPM', true)),
                'kd_prodi' => htmlspecialchars($this->input->post('kd_prodi', true)),
                'nama_mahasiswa' => htmlspecialchars($this->input->post('nama_mahasiswa', true)),
                'alamat_mahasiswa' => htmlspecialchars($this->input->post('alamat_mahasiswa', true)),
                'status' => '1',
            ];
            $this->Model_mahasiswa->add_mahasiswa($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
            redirect('mahasiswa');
        }
    }
}