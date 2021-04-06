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
        $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
        $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
        $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  
        $data['total_mahasiswa'] = $this->Model_user->count_mahasiswa();
        $data['total_prodi'] = $this->Model_user->count_prodi();
        $data['total_dosen'] = $this->Model_user->count_dosen();
        $data['total_bpm'] = $this->Model_user->count_bpm();
        $data['total_admin'] = $this->Model_user->count_admin();
        $data['selectProdi'] = $this->Model_user->select_where('prodi', 'nama_prodi');
        // $data['selectMahasiswa'] = $this->Model_mahasiswa->get_all_mahasiswa();
        $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_dashboard', $data);
        $this->load->view('templates/footer');
    }

    //below the methods for managing the user table
    public function admin() //methode get all user
    {
        $data['title'] = 'Admin';
        $data['admin'] = $this->Model_user->get_admin(); // get data user prodi where her session
        $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
        $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
        $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  
        $data['total_mahasiswa'] = $this->Model_user->count_mahasiswa();
        $data['total_prodi'] = $this->Model_user->count_prodi();
        $data['total_dosen'] = $this->Model_user->count_dosen();
        $data['total_bpm'] = $this->Model_user->count_bpm();
        $data['total_admin'] = $this->Model_user->count_admin();
        $data['selectProdi'] = $this->Model_user->select_where('prodi', 'nama_prodi');
        // $data['selectMahasiswa'] = $this->Model_mahasiswa->get_all_mahasiswa();
        $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin_dan_BPM/v_user_admin', $data);
        $this->load->view('templates/footer');
    }


    public function user_BPM() //methode get users where level admin only
    {
        $data['title'] = 'BPM';
        $data['BPM'] = $this->Model_user->get_BPM(); // get data user prodi where her session
        $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
        $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
        $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  
        $data['total_mahasiswa'] = $this->Model_user->count_mahasiswa();
        $data['total_prodi'] = $this->Model_user->count_prodi();
        $data['total_dosen'] = $this->Model_user->count_dosen();
        $data['total_bpm'] = $this->Model_user->count_bpm();
        $data['total_admin'] = $this->Model_user->count_admin();
        $data['selectProdi'] = $this->Model_user->select_where('prodi', 'nama_prodi');
        // $data['selectMahasiswa'] = $this->Model_mahasiswa->get_all_mahasiswa();
        $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin_dan_BPM/v_user_BPM', $data);
        $this->load->view('templates/footer');
    }

    public function user_prodi() //methode get users where level prodi only
    {
        $data['title'] = 'Pengguna Prodi';
        $data['prodi'] = $this->Model_user->get_user_prodi(); // get data user prodi where her session
        $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
        $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
        $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  
        $data['total_mahasiswa'] = $this->Model_user->count_mahasiswa();
        $data['total_prodi'] = $this->Model_user->count_prodi();
        $data['total_dosen'] = $this->Model_user->count_dosen();
        $data['total_bpm'] = $this->Model_user->count_bpm();
        $data['total_admin'] = $this->Model_user->count_admin();
        $data['selectProdi'] = $this->Model_user->select_where('prodi', 'nama_prodi');
        // $data['selectMahasiswa'] = $this->Model_mahasiswa->get_all_mahasiswa();
        $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin_dan_BPM/v_user_prodi', $data);
        $this->load->view('templates/footer');
    }

    public function user_dosen() //methode get users where level dosen only
    {
        $data['title'] = 'Pengguna Dosen';
        $data['dosen'] = $this->Model_user->get_user_dosen(); // get data user prodi where her session
        $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
        $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
        $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  
        $data['total_mahasiswa'] = $this->Model_user->count_mahasiswa();
        $data['total_prodi'] = $this->Model_user->count_prodi();
        $data['total_dosen'] = $this->Model_user->count_dosen();
        $data['total_bpm'] = $this->Model_user->count_bpm();
        $data['total_admin'] = $this->Model_user->count_admin();
        $data['selectProdi'] = $this->Model_user->select_where('prodi', 'nama_prodi');
        // $data['selectMahasiswa'] = $this->Model_mahasiswa->get_all_mahasiswa();
        $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin_dan_BPM/v_user_dosen', $data);
        $this->load->view('templates/footer');
    }

    public function user_mahasiswa() //methode get users where level mahasiswa only
    {
        $data['title'] = 'Pengguna Mahasiswa';
        $data['mahasiswa'] = $this->Model_user->get_user_mahasiswa(); // get data user prodi where her session
        $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
        $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
        $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  
        $data['total_mahasiswa'] = $this->Model_user->count_mahasiswa();
        $data['total_prodi'] = $this->Model_user->count_prodi();
        $data['total_dosen'] = $this->Model_user->count_dosen();
        $data['total_bpm'] = $this->Model_user->count_bpm();
        $data['total_admin'] = $this->Model_user->count_admin();
        $data['selectProdi'] = $this->Model_user->select_where('prodi', 'nama_prodi');
        // $data['selectMahasiswa'] = $this->Model_mahasiswa->get_all_mahasiswa();
        $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin_dan_BPM/v_user_mahasiswa', $data);
        $this->load->view('templates/footer');
    }

    public function add_user()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah terdaftar..!',
            'required' => 'Username tidak boleh kosong..!',
        ]);
        $this->form_validation->set_rules('selectLevel', 'Level', 'required|trim', [
            'required' => 'Level Harus Dipilih'
        ]);

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|max_length[10]|matches[password2]', [
            'matches' => 'Password tidak sama..!',
            'min_length' => 'Password terlalu pendek minimal 3 karakter',
            'max_length' => 'Password terlalu panjang maksimal 10 karakter',
            'required' => 'Password tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Dashboard';
            $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
            $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
            $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  
            $data['total_mahasiswa'] = $this->Model_mahasiswa->count_mahasiswa();
            $data['total_prodi'] = $this->Model_prodi->count_prodi();
            $data['total_dosen'] = $this->Model_dosen->count_dosen();
            $data['selectProdi'] = $this->Model_user->select_where('prodi', 'nama_prodi');
            $data['selectMahasiswa'] = $this->Model_mahasiswa->get_all_mahasiswa();
            $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('v_dashboard', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'level' => $this->input->post('selectLevel', true),
                'kd_prodi' => $this->input->post('selectProdi', true),
            ];
            $this->Model_user->add_user($data, 'user');
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
        }
    }

    public function edit_user()
    {
        $data = [
            'id_user' => $this->input->post('id_user', true),
            'level' => $this->input->post('level_U', true),
            'kd_prodi' => $this->input->post('s_e_prodi', true),
            'modifed' => date('d-m-Y H:i:s')
        ];
        $this->Model_user->edit_user($data);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Edit</div>');
        redirect('user/User/all_user');
    }

    public function delete_user($id)
    {
        $this->Model_user->delete_user($id);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
        redirect('user/User/all_user');
    }
    //end for managing the user table

}

/* End of file Dashboard.php */