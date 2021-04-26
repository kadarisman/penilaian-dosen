<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_login(); // this is a function in login_helper
    }
    public function index() // method index
    {
        $data['title'] = 'Dashboard';
        //get data for session        
        $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
        $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
        $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  

        //admin count user
        $data['total_user_mahasiswa'] = $this->Model_user->count_mahasiswa();
        $data['total_user_prodi'] = $this->Model_user->count_prodi();
        $data['total_user_dosen'] = $this->Model_user->count_dosen();
        $data['total_user_bpm'] = $this->Model_user->count_bpm();
        $data['total_user_admin'] = $this->Model_user->count_admin();

        //prodi count user
        $data['total_user_dosen_prodi'] = $this->Model_user->count_dosen_prodi();
        $data['total_user_mahasiswa_prodi'] = $this->Model_user->count_mahasiswa_prodi();

        //admin count master data
        $data['total_fakultas'] = $this->Model_fakultas->count_fakultas();
        $data['total_prodi'] = $this->Model_prodi->count_prodi();
        $data['total_dosen'] = $this->Model_dosen->count_dosen();
        $data['total_mahasiswa'] = $this->Model_mahasiswa->count_mahasiswa();
        $data['total_pertanyaan'] = $this->Model_pertanyaan->count_pertanyaan();
        $data['total_matakuliah'] = $this->Model_matakuliah->count_matakuliah();
        $data['total_nilai_mahasiswa'] = $this->Model_nilai->count_nilai_mahasiswa();
        //$data['selectProdi'] = $this->Model_user->select_where('prodi', 'nama_prodi');
        // $data['selectMahasiswa'] = $this->Model_mahasiswa->get_all_mahasiswa();

        //prodi count master data
        $data['total_dosen_prodi'] = $this->Model_dosen->count_dosen_prodi();
        $data['total_mahasiswa_prodi'] = $this->Model_mahasiswa->count_mahasiswa_prodi();
        $data['total_matakuliah_prodi'] = $this->Model_matakuliah->count_matakuliah_prodi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_dashboard', $data);
        $this->load->view('templates/footer');
    }

    //for all user vie profil
    public function profil()
    {
        $data['title'] = 'Profil';
        //get data for session        
        $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
        $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
        $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  

        //admin count user
        $data['total_user_mahasiswa'] = $this->Model_user->count_mahasiswa();
        $data['total_user_prodi'] = $this->Model_user->count_prodi();
        $data['total_user_dosen'] = $this->Model_user->count_dosen();
        $data['total_user_bpm'] = $this->Model_user->count_bpm();
        $data['total_user_admin'] = $this->Model_user->count_admin();

        //prodi count user
        $data['total_user_dosen_prodi'] = $this->Model_user->count_dosen_prodi();
        $data['total_user_mahasiswa_prodi'] = $this->Model_user->count_mahasiswa_prodi();

        //admin count master data
        $data['total_fakultas'] = $this->Model_fakultas->count_fakultas();
        $data['total_prodi'] = $this->Model_prodi->count_prodi();
        $data['total_dosen'] = $this->Model_dosen->count_dosen();
        $data['total_mahasiswa'] = $this->Model_mahasiswa->count_mahasiswa();
        $data['total_pertanyaan'] = $this->Model_pertanyaan->count_pertanyaan();
        $data['total_matakuliah'] = $this->Model_matakuliah->count_matakuliah();
        //$data['selectProdi'] = $this->Model_user->select_where('prodi', 'nama_prodi');
        // $data['selectMahasiswa'] = $this->Model_mahasiswa->get_all_mahasiswa();

        //prodi count master data
        $data['total_dosen_prodi'] = $this->Model_dosen->count_dosen_prodi();
        $data['total_mahasiswa_prodi'] = $this->Model_mahasiswa->count_mahasiswa_prodi();
        $data['total_matakuliah_prodi'] = $this->Model_matakuliah->count_matakuliah_prodi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_profil', $data);
        $this->load->view('templates/footer');
    }

    //admin methods
    //read data
    public function admin()
    {
        $data['title'] = 'Admin';

        //all users admin data
        $data['admin'] = $this->Model_user->get_admin(); // get data user prodi where her session

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
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/v_user_admin', $data);
        $this->load->view('templates/footer');
    }


    public function user_BPM()
    {
        $data['title'] = 'BPM';

        //all users bpm data
        $data['BPM'] = $this->Model_user->get_BPM(); // get data user prodi where her session

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
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/v_user_BPM', $data);
        $this->load->view('templates/footer');
    }

    public function user_prodi() //methode get users where level prodi only
    {
        $data['title'] = 'Pengguna Prodi';

        //all users prodi data
        $data['prodi'] = $this->Model_user->get_user_prodi(); // get data user prodi where her session

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
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/v_user_prodi', $data);
        $this->load->view('templates/footer');
    }

    public function user_dosen() //methode get users where level dosen only
    {
        $data['title'] = 'Pengguna Dosen';

        //all users dosen data
        $data['dosen'] = $this->Model_user->get_user_dosen(); // get data user prodi where her session

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

        //count master data
        $data['total_fakultas'] = $this->Model_fakultas->count_fakultas();
        $data['total_prodi'] = $this->Model_prodi->count_prodi();
        $data['total_dosen'] = $this->Model_dosen->count_dosen();
        $data['total_mahasiswa'] = $this->Model_mahasiswa->count_mahasiswa();
        $data['total_pertanyaan'] = $this->Model_pertanyaan->count_pertanyaan();
        $data['total_matakuliah'] = $this->Model_matakuliah->count_matakuliah();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/v_user_dosen', $data);
        $this->load->view('templates/footer');
    }

    public function user_mahasiswa() //methode get users where level mahasiswa only
    {
        $data['title'] = 'Pengguna Mahasiswa';

        //all users mahasiswa data
        $data['mahasiswa'] = $this->Model_user->get_user_mahasiswa(); // get data user prodi where her session


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

        //count master data
        $data['total_fakultas'] = $this->Model_fakultas->count_fakultas();
        $data['total_prodi'] = $this->Model_prodi->count_prodi();
        $data['total_dosen'] = $this->Model_dosen->count_dosen();
        $data['total_mahasiswa'] = $this->Model_mahasiswa->count_mahasiswa();
        $data['total_pertanyaan'] = $this->Model_pertanyaan->count_pertanyaan();
        $data['total_matakuliah'] = $this->Model_matakuliah->count_matakuliah();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/v_user_mahasiswa', $data);
        $this->load->view('templates/footer');
    }

    //add data
    public function tambah_user_admin()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah terdaftar..!',
            'required' => 'Username tidak boleh kosong..!',
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|max_length[8]|matches[password2]', [
            'matches' => 'Password tidak sama..!',
            'min_length' => 'Password terlalu pendek minimal 3 karakter',
            'max_length' => 'Password terlalu panjang maksimal 10 karakter',
            'required' => 'Password tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', [
            'matches' => 'Ulangi password tidak sama',
            'required' => 'Ulangi password tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Admin';
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
            $this->load->view('admin/tambah_user/v_tambah_user_admin', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'level' => 'admin',
                'created' => date('d-m-Y H:i:s')
            ];
            $this->Model_user->add_user($data, 'user');
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
            redirect('admin');
        }
    }

    public function tambah_user_bpm()
    {
        $this->form_validation->set_rules('NIDN', 'Nidn', 'required|trim|is_unique[dosen.NIDN]', [
            'is_unique' => 'NIDN sudah terdaftar..!',
            'required' => 'NIDN tidak boleh kosong..!',
        ]);

        $this->form_validation->set_rules('nama_dosen', 'Nama_dosen', 'required|trim', [
            'required' => 'Nama Dosen tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('kd_prodi', 'Kd_prodi', 'required|trim', [
            'required' => 'Kode Prodi password tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Dosen';
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
            $this->load->view('admin/tambah_user/v_tambah_user_bpm', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'NIDN' => htmlspecialchars($this->input->post('NIDN', true)),
                'nama_dosen' => htmlspecialchars($this->input->post('nama_dosen', true)),
                'alamat_dosen' => htmlspecialchars($this->input->post('alamat_dosen', true)),
                'kd_prodi' => htmlspecialchars($this->input->post('kd_prodi', true)),
            ];
            $this->Model_dosen->add_dosen($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
            redirect('dosen');
        }
    }

    public function tambah_user_prodi()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah terdaftar..!',
            'required' => 'Username tidak boleh kosong..!',
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|max_length[8]|matches[password2]', [
            'matches' => 'Password tidak sama..!',
            'min_length' => 'Password terlalu pendek minimal 3 karakter',
            'max_length' => 'Password terlalu panjang maksimal 10 karakter',
            'required' => 'Password tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', [
            'matches' => 'Ulangi password tidak sama',
            'required' => 'Ulangi password tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('kd_prodi', 'Kd_prodi', 'required|trim', [
            'required' => 'Kode Prodi harus dipilih'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah user Prodi';
            $data['prodi'] = $this->Model_prodi->get_all_prodi();

            //count master data
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

            $data['total_fakultas'] = $this->Model_fakultas->count_fakultas();
            $data['total_prodi'] = $this->Model_prodi->count_prodi();
            $data['total_dosen'] = $this->Model_dosen->count_dosen();
            $data['total_mahasiswa'] = $this->Model_mahasiswa->count_mahasiswa();
            $data['total_pertanyaan'] = $this->Model_pertanyaan->count_pertanyaan();
            $data['total_matakuliah'] = $this->Model_matakuliah->count_matakuliah();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/tambah_user/v_tambah_user_prodi', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'kd_prodi' => htmlspecialchars($this->input->post('kd_prodi', true)),
                'level' => 'prodi',
                'created' => date('d-m-Y H:i:s')
            ];
            $this->Model_user->add_user($data, 'user');
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
            redirect('user-prodi');
        }
    }

    public function tambah_user_dosen()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah terdaftar..!',
            'required' => 'Username tidak boleh kosong..!',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|max_length[8]|matches[password2]', [
            'matches' => 'Password tidak sama..!',
            'min_length' => 'Password terlalu pendek minimal 3 karakter',
            'max_length' => 'Password terlalu panjang maksimal 10 karakter',
            'required' => 'Password tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', [
            'matches' => 'Ulangi password tidak sama',
            'required' => 'Ulangi password tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('kd_prodi', 'Kd_prodi', 'required|trim', [
            'required' => 'Kode Prodi harus dipilih'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah user Dosen';
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
            $this->load->view('admin/tambah_user/v_tambah_user_dosen', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'kd_prodi' => htmlspecialchars($this->input->post('kd_prodi', true)),
                'level' => 'dosen',
                'created' => date('d-m-Y H:i:s')
            ];
            $this->Model_user->add_user($data, 'user');
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
            redirect('user-dosen');
        }
    }

    public function tambah_akun_dosen_takterdata($NIDN)
    {

        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah terdaftar..!',
            'required' => 'Username tidak boleh kosong..!',
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|max_length[8]|matches[password2]', [
            'matches' => 'Password tidak sama..!',
            'min_length' => 'Password terlalu pendek minimal 3 karakter',
            'max_length' => 'Password terlalu panjang maksimal 10 karakter',
            'required' => 'Password tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', [
            'matches' => 'Ulangi password tidak sama',
            'required' => 'Ulangi password tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('kd_prodi', 'Kd_prodi', 'required|trim', [
            'required' => 'Kode Prodi harus dipilih'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah user Dosen';
            //get data for session        
            $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
            $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
            $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  

            //get user by id
            $data['dosen'] = $this->Model_dosen->get_dosen_by_id($NIDN);


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
            $this->load->view('prodi/tambah_user/v_tambah_akun_dosen', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'kd_prodi' => htmlspecialchars($this->input->post('kd_prodi', true)),
                'level' => 'dosen',
                'created' => date('d-m-Y H:i:s')
            ];
            $this->Model_user->add_user($data, 'user');
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
            redirect('user-dosen');
        }
    }

    public function tambah_user_mahasiswa()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah terdaftar..!',
            'required' => 'Username tidak boleh kosong..!',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|max_length[8]|matches[password2]', [
            'matches' => 'Password tidak sama..!',
            'min_length' => 'Password terlalu pendek minimal 3 karakter',
            'max_length' => 'Password terlalu panjang maksimal 10 karakter',
            'required' => 'Password tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', [
            'matches' => 'Ulangi password tidak sama',
            'required' => 'Ulangi password tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('kd_prodi', 'Kd_prodi', 'required|trim', [
            'required' => 'Kode Prodi harus dipilih'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah user Mahasiswa';
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
            $data['mahasiswa'] = $this->Model_mahasiswa->get_all_mahasiswa();

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
            $this->load->view('admin/tambah_user/v_tambah_user_mahasiswa', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'kd_prodi' => htmlspecialchars($this->input->post('kd_prodi', true)),
                'level' => 'mahasiswa',
                'created' => date('d-m-Y H:i:s')
            ];
            $this->Model_user->add_user($data, 'user');
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
            redirect('user-mahasiswa');
        }
    }

    public function tambah_akun_mahasiswa_takterdata($NPM)
    {

        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah terdaftar..!',
            'required' => 'Username tidak boleh kosong..!',
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|max_length[8]|matches[password2]', [
            'matches' => 'Password tidak sama..!',
            'min_length' => 'Password terlalu pendek minimal 3 karakter',
            'max_length' => 'Password terlalu panjang maksimal 10 karakter',
            'required' => 'Password tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', [
            'matches' => 'Ulangi password tidak sama',
            'required' => 'Ulangi password tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('kd_prodi', 'Kd_prodi', 'required|trim', [
            'required' => 'Kode Prodi harus dipilih'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah user Mahasiswa';
            //get data for session        
            $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
            $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
            $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  

            //get user by id
            $data['mahasiswa'] = $this->Model_mahasiswa->get_mahasiswa_by_id($NPM);


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
            $this->load->view('prodi/tambah_user/v_tambah_akun_mahasiswa', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'kd_prodi' => htmlspecialchars($this->input->post('kd_prodi', true)),
                'level' => 'mahasiswa',
                'created' => date('d-m-Y H:i:s')
            ];
            $this->Model_user->add_user($data, 'user');
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
            redirect('user-mahasiswa');
        }
    }



    //edit data
    public function edit_user1($id_user)
    {
        $user = $this->Model_user->get_user_by_id($id_user);
        $original_value = $user->username;
        if ($this->input->post('username') != $original_value) {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
                'is_unique' => 'Username sudah terdaftar !',
                'required' => 'Username tidak boleh kosong..!'
            ]);
        }
        $this->form_validation->set_rules('level', 'Level', 'required|trim', [
            'required' => 'Level harus dipilih..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit User';
            //get data for session        
            $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
            $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
            $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  

            //get user by id
            $data['user1'] = $this->Model_user->get_user_by_id($id_user);

            //count user
            $data['total_user_mahasiswa'] = $this->Model_user->count_mahasiswa();
            $data['total_user_prodi'] = $this->Model_user->count_prodi();
            $data['total_user_dosen'] = $this->Model_user->count_dosen();
            $data['total_user_bpm'] = $this->Model_user->count_bpm();
            $data['total_user_admin'] = $this->Model_user->count_admin();
            $data['mahasiswa'] = $this->Model_mahasiswa->get_all_mahasiswa();

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
            $this->load->view('admin/edit_user/v_edit_user1', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'level' => htmlspecialchars($this->input->post('level', true)),
                'modifed' => date('d-m-Y H:i:s')
            ];
            $this->Model_user->edit_user($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah diedit !</div>');
            if ($this->input->post('level') == 'admin') {
                redirect('admin');
            } else if ($this->input->post('level') == 'BPM') {
                redirect('BPM');
            } else if ($this->input->post('level') == 'dosen') {
                redirect('user-dosen');
            } else if ($this->input->post('level') == 'mahasiswa') {
                redirect('user-mahasiswa');
            } else {
                redirect('user-prodi');
            }
        }
    }

    public function edit_user2($id_user)
    {
        $data['prodi'] = $this->Model_prodi->get_all_prodi();
        $user = $this->Model_user->get_user_by_id($id_user);
        $original_value = $user->username;
        if ($this->input->post('username') != $original_value) {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
                'is_unique' => 'Username sudah terdaftar !',
                'required' => 'Username tidak boleh kosong..!'
            ]);
        }

        $this->form_validation->set_rules('kd_prodi', 'Kd_prodi', 'required|trim', [
            'required' => 'Kode prodi harus dipilih..!'
        ]);
        $this->form_validation->set_rules('level', 'Level', 'required|trim', [
            'required' => 'Level harus dipilih..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit User';
            //get data for session        
            $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
            $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
            $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  

            //get user by id
            $data['user2'] = $this->Model_user->get_user_by_id2($id_user);

            //count user
            $data['total_user_mahasiswa'] = $this->Model_user->count_mahasiswa();
            $data['total_user_prodi'] = $this->Model_user->count_prodi();
            $data['total_user_dosen'] = $this->Model_user->count_dosen();
            $data['total_user_bpm'] = $this->Model_user->count_bpm();
            $data['total_user_admin'] = $this->Model_user->count_admin();
            $data['mahasiswa'] = $this->Model_mahasiswa->get_all_mahasiswa();

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
            $this->load->view('admin/edit_user/v_edit_user2', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'kd_prodi' => htmlspecialchars($this->input->post('kd_prodi', true)),
                'level' => htmlspecialchars($this->input->post('level', true)),
                'modifed' => date('d-m-Y H:i:s')
            ];
            // var_dump($data);
            // die();
            $this->Model_user->edit_user($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah diedit !</div>');
            if ($this->input->post('level') == 'admin') {
                redirect('admin');
            } else if ($this->input->post('level') == 'BPM') {
                redirect('BPM');
            } else if ($this->input->post('level') == 'dosen') {
                redirect('user-dosen');
            } else if ($this->input->post('level') == 'mahasiswa') {
                redirect('user-mahasiswa');
            } else {
                redirect('user-prodi');
            }
        }
    }

    //delete data
    public function delete_admin($id_user)
    {
        $this->Model_user->delete_user($id_user);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
        redirect('admin');
    }

    public function delete_user_bpm($id_user)
    {
        $this->Model_user->delete_user($id_user);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
        redirect('BPM');
    }

    public function delete_user_prodi($id_user)
    {
        $this->Model_user->delete_user($id_user);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
        redirect('user-prodi');
    }

    public function delete_user_dosen($id_user)
    {
        $this->Model_user->delete_user($id_user);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
        redirect('user-dosen');
    }

    public function delete_user_mahasiswa($id_user)
    {
        $this->Model_user->delete_user($id_user);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
        redirect('user-mahasiswa');
    }
    //end admin method

    //prodi method
    //read data
    public function user_dosen_prodi() //methode get users where level dosen only
    {
        $data['title'] = 'Pengguna Dosen';

        //all users dosen data
        $data['dosen_prodi'] = $this->Model_user->get_user_dosen_prodi(); // get data user prodi where her session


        //get data for session        
        $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
        $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
        $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  

        //count user
        $data['total_user_mahasiswa_prodi'] = $this->Model_user->count_mahasiswa_prodi();
        $data['total_user_dosen_prodi'] = $this->Model_user->count_dosen();

        //count master data
        $data['total_dosen_prodi'] = $this->Model_dosen->count_dosen_prodi();
        $data['total_mahasiswa_prodi'] = $this->Model_mahasiswa->count_mahasiswa_prodi();
        $data['total_matakuliah_prodi'] = $this->Model_matakuliah->count_matakuliah_prodi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('prodi/v_user_dosen_prodi', $data);
        $this->load->view('templates/footer');
    }

    public function user_mahasiswa_prodi() //methode get users where level mahasiswa only
    {
        $data['title'] = 'Pengguna Mahasiswa';

        //all users mahasiswa data
        $data['mahasiswa_prodi'] = $this->Model_user->get_user_mahasiswa_prodi(); // get data user prodi where her session


        //get data for session        
        $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
        $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
        $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  

        //count user
        $data['total_user_mahasiswa_prodi'] = $this->Model_user->count_mahasiswa_prodi();
        $data['total_user_dosen_prodi'] = $this->Model_user->count_dosen();


        //count master data
        $data['total_dosen_prodi'] = $this->Model_dosen->count_dosen_prodi();
        $data['total_mahasiswa_prodi'] = $this->Model_mahasiswa->count_mahasiswa_prodi();
        $data['total_matakuliah_prodi'] = $this->Model_matakuliah->count_matakuliah_prodi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('prodi/v_user_mahasiswa_prodi', $data);
        $this->load->view('templates/footer');
    }

    //add data
    public function tambah_user_dosen_prodi()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah terdaftar..!',
            'required' => 'Username tidak boleh kosong..!',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|max_length[8]|matches[password2]', [
            'matches' => 'Password tidak sama..!',
            'min_length' => 'Password terlalu pendek minimal 3 karakter',
            'max_length' => 'Password terlalu panjang maksimal 10 karakter',
            'required' => 'Password tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', [
            'matches' => 'Ulangi password tidak sama',
            'required' => 'Ulangi password tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah user Dosen';
            //get data for session        
            $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
            $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
            $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  

            //count user
            $data['total_user_mahasiswa_prodi'] = $this->Model_user->count_mahasiswa_prodi();
            $data['total_user_dosen_prodi'] = $this->Model_user->count_dosen();

            //count master data
            $data['total_dosen_prodi'] = $this->Model_dosen->count_dosen_prodi();
            $data['total_mahasiswa_prodi'] = $this->Model_mahasiswa->count_mahasiswa_prodi();
            $data['total_matakuliah_prodi'] = $this->Model_matakuliah->count_matakuliah_prodi();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('prodi/tambah_user/v_tambah_user_dosen_prodi', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'kd_prodi' => $this->session->userdata('kd_prodi'),
                'level' => 'dosen',
                'created' => date('d-m-Y H:i:s')
            ];
            $this->Model_user->add_user($data, 'user');
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
            redirect('user-dosen-prodi');
        }
    }

    public function tambah_akun_dosen_takterdata_prodi($NIDN)
    {

        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah terdaftar..!',
            'required' => 'Username tidak boleh kosong..!',
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|max_length[8]|matches[password2]', [
            'matches' => 'Password tidak sama..!',
            'min_length' => 'Password terlalu pendek minimal 3 karakter',
            'max_length' => 'Password terlalu panjang maksimal 10 karakter',
            'required' => 'Password tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', [
            'matches' => 'Ulangi password tidak sama',
            'required' => 'Ulangi password tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah user Dosen';
            //get data for session        
            $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
            $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
            $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  

            //get user by id
            $data['dosen'] = $this->Model_dosen->get_dosen_by_id($NIDN);


            //count user
            $data['total_user_mahasiswa_prodi'] = $this->Model_user->count_mahasiswa_prodi();
            $data['total_user_dosen_prodi'] = $this->Model_user->count_dosen();

            //count master data
            $data['total_dosen_prodi'] = $this->Model_dosen->count_dosen_prodi();
            $data['total_mahasiswa_prodi'] = $this->Model_mahasiswa->count_mahasiswa_prodi();
            $data['total_matakuliah_prodi'] = $this->Model_matakuliah->count_matakuliah_prodi();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('prodi/tambah_user/v_tambah_akun_dosen_prodi', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'kd_prodi' => $this->session->userdata('kd_prodi'),
                'level' => 'dosen',
                'created' => date('d-m-Y H:i:s')
            ];
            $this->Model_user->add_user($data, 'user');
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
            redirect('user-dosen-prodi');
        }
    }

    public function tambah_user_mahasiswa_prodi()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah terdaftar..!',
            'required' => 'Username tidak boleh kosong..!',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|max_length[8]|matches[password2]', [
            'matches' => 'Password tidak sama..!',
            'min_length' => 'Password terlalu pendek minimal 3 karakter',
            'max_length' => 'Password terlalu panjang maksimal 10 karakter',
            'required' => 'Password tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', [
            'matches' => 'Ulangi password tidak sama',
            'required' => 'Ulangi password tidak boleh kosong'
        ]);


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah user Mahasiswa';
            $data['prodi'] = $this->Model_prodi->get_all_prodi();
            //get data for session        
            $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
            $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
            $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  

            //count user
            $data['total_user_mahasiswa_prodi'] = $this->Model_user->count_mahasiswa_prodi();
            $data['total_user_dosen_prodi'] = $this->Model_user->count_dosen();

            //count master data
            $data['total_dosen_prodi'] = $this->Model_dosen->count_dosen_prodi();
            $data['total_mahasiswa_prodi'] = $this->Model_mahasiswa->count_mahasiswa_prodi();
            $data['total_matakuliah_prodi'] = $this->Model_matakuliah->count_matakuliah_prodi();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('prodi/tambah_user/v_tambah_user_mahasiswa_prodi', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'kd_prodi' => $this->session->userdata('kd_prodi'),
                'level' => 'mahasiswa',
                'created' => date('d-m-Y H:i:s')
            ];
            $this->Model_user->add_user($data, 'user');
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
            redirect('user-mahasiswa-prodi');
        }
    }

    public function tambah_akun_mahasiswa_takterdata_prodi($NPM)
    {

        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah terdaftar..!',
            'required' => 'Username tidak boleh kosong..!',
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|max_length[8]|matches[password2]', [
            'matches' => 'Password tidak sama..!',
            'min_length' => 'Password terlalu pendek minimal 3 karakter',
            'max_length' => 'Password terlalu panjang maksimal 10 karakter',
            'required' => 'Password tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', [
            'matches' => 'Ulangi password tidak sama',
            'required' => 'Ulangi password tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah user Mahasiswa';
            //get data for session        
            $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
            $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
            $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  

            //get user by id
            $data['mahasiswa'] = $this->Model_mahasiswa->get_mahasiswa_by_id($NPM);


            //count user
            $data['total_user_mahasiswa_prodi'] = $this->Model_user->count_mahasiswa_prodi();
            $data['total_user_dosen_prodi'] = $this->Model_user->count_dosen();

            //count master data
            $data['total_dosen_prodi'] = $this->Model_dosen->count_dosen_prodi();
            $data['total_mahasiswa_prodi'] = $this->Model_mahasiswa->count_mahasiswa_prodi();
            $data['total_matakuliah_prodi'] = $this->Model_matakuliah->count_matakuliah_prodi();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('prodi/tambah_user/v_tambah_akun_mahasiswa_prodi', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'kd_prodi' => $this->session->userdata('kd_prodi'),
                'level' => 'mahasiswa',
                'created' => date('d-m-Y H:i:s')
            ];
            $this->Model_user->add_user($data, 'user');
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
            redirect('user-mahasiswa-prodi');
        }
    }


    //edit data
    public function edit_user1_prodi($id_user)
    {
        $user = $this->Model_user->get_user_by_id($id_user);
        $original_value = $user->username;
        if ($this->input->post('username') != $original_value) {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
                'is_unique' => 'Username sudah terdaftar !',
                'required' => 'Username tidak boleh kosong..!'
            ]);
        }
        $this->form_validation->set_rules('level', 'Level', 'required|trim', [
            'required' => 'Level harus dipilih..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit User';
            //get data for session        
            $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
            $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
            $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  

            //get user by id
            $data['user1'] = $this->Model_user->get_user_by_id($id_user);

            //count user
            $data['total_user_mahasiswa_prodi'] = $this->Model_user->count_mahasiswa_prodi();
            $data['total_user_dosen_prodi'] = $this->Model_user->count_dosen();

            //count master data
            $data['total_dosen_prodi'] = $this->Model_dosen->count_dosen_prodi();
            $data['total_mahasiswa_prodi'] = $this->Model_mahasiswa->count_mahasiswa_prodi();
            $data['total_matakuliah_prodi'] = $this->Model_matakuliah->count_matakuliah_prodi();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('prodi/edit_user/v_edit_user1_prodi', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'level' => htmlspecialchars($this->input->post('level', true)),
                'modifed' => date('d-m-Y H:i:s')
            ];
            $this->Model_user->edit_user($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah diedit !</div>');
            if ($this->input->post('level') == 'admin') {
                redirect('admin');
            } else if ($this->input->post('level') == 'BPM') {
                redirect('BPM');
            } else if ($this->input->post('level') == 'dosen') {
                redirect('user-dosen');
            } else if ($this->input->post('level') == 'mahasiswa') {
                redirect('user-mahasiswa');
            } else {
                redirect('user-prodi');
            }
        }
    }

    //prodi delete data user
    public function delete_user_dosen_prodi($id_user)
    {
        $this->Model_user->delete_user($id_user);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
        redirect('user-dosen-prodi');
    }

    public function delete_user_mahasiswa_prodi($id_user)
    {
        $this->Model_user->delete_user($id_user);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
        redirect('user-mahasiswa-prodi');
    }
    //end prodi method
}

/* End of file Dashboard.php */