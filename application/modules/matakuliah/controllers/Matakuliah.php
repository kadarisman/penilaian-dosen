<?php defined('BASEPATH') or exit('No direct script access allowed');

class Matakuliah  extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
    }

    public function index() // method index
    {
        $data['title'] = 'Matakuliah';

        //all matakuliah               
        $data['matakuliah'] = $this->Model_matakuliah->get_all_matakuliah();

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
        $this->load->view('v_matakuliah', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_matakuliah()
    {
        $this->form_validation->set_rules('kd_matakuliah', 'Kd_matakuliah', 'required|trim|is_unique[matakuliah.kd_matakuliah]', [
            'is_unique' => 'Kode Mtakuliah sudah terdaftar..!',
            'required' => 'Kode Mtakuliah tidak boleh kosong..!',
        ]);

        $this->form_validation->set_rules('nama_matakuliah', 'nama_matakuliah', 'required|trim', [
            'required' => 'Nama Matakuliah tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('sks', 'Alamat_mahasiswa', 'required|trim', [
            'required' => 'SKS harus dipilih'
        ]);
        $this->form_validation->set_rules('kd_prodi', 'Kd_prodi', 'required|trim', [
            'required' => 'Prodi harus dipilih'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Matakuliah';
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
            $this->load->view('v_tambah_matakuliah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kd_matakuliah' => htmlspecialchars($this->input->post('kd_matakuliah', true)),
                'nama_matakuliah' => htmlspecialchars($this->input->post('nama_matakuliah', true)),
                'sks' => htmlspecialchars($this->input->post('sks', true)),
                'kd_prodi' => htmlspecialchars($this->input->post('kd_prodi', true)),
            ];
            $this->Model_matakuliah->add_matakuliah($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
            redirect('matakuliah');
        }
    }

    public function edit_matakuliah($kd_matakuliah)
    {
        $data['prodi'] = $this->Model_prodi->get_all_prodi();
        $this->form_validation->set_rules('nama_matakuliah', 'Nama_matakuliah', 'required|trim', [
            'required' => 'Matakuliah tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('kd_prodi', 'Kd_prodi', 'required|trim', [
            'required' => 'Prodi harus dipilih..!'
        ]);
        $this->form_validation->set_rules('sks', 'Sks', 'required|trim', [
            'required' => 'SKS tidak boleh kosong..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Matakuliah';
            //get data for session        
            $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
            $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
            $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  

            //get user by id
            $data['matakuliah'] = $this->Model_matakuliah->get_matakuliah_by_id($kd_matakuliah);

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
            $this->load->view('v_edit_matakuliah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_matakuliah' => htmlspecialchars($this->input->post('nama_matakuliah', true)),
                'sks' => htmlspecialchars($this->input->post('sks', true)),
                'kd_prodi' => htmlspecialchars($this->input->post('kd_prodi', true)),
            ];
            $this->Model_matakuliah->edit_matakuliah($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah diedit !</div>');
            redirect('matakuliah');
        }
    }
}