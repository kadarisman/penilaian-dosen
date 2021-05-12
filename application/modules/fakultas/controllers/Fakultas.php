<?php defined('BASEPATH') or exit('No direct script access allowed');

class Fakultas  extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
    }

    public function index() // method index
    {
        $data['title'] = 'Fakultas';

        //all fakultas
        $data['fakultas'] = $this->Model_fakultas->get_all_fakultas();

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
        $data['total_nilai_mahasiswa'] = $this->Model_nilai->count_nilai_mahasiswa();
        $data['total_nilai_prodi'] = $this->Model_nilai->count_nilai_prodi();
        $data['total_semua_nilai'] = $this->Model_nilai->count_nilai();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_fakultas', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_fakultas()
    {
        $this->form_validation->set_rules('kd_fakultas', 'Kd_fakultas', 'required|trim|is_unique[fakultas.kd_fakultas]', [
            'is_unique' => 'Kode Fakultas sudah terdaftar..!',
            'required' => 'Kode Fakultas tidak boleh kosong..!',
        ]);

        $this->form_validation->set_rules('nama_fakultas', 'Nama_fakultas', 'required|trim', [
            'required' => 'Nama Fakultas tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Fakultas';
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
            $data['total_nilai_mahasiswa'] = $this->Model_nilai->count_nilai_mahasiswa();
            $data['total_nilai_prodi'] = $this->Model_nilai->count_nilai_prodi();
            $data['total_semua_nilai'] = $this->Model_nilai->count_nilai();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('v_tambah_fakultas', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kd_fakultas' => htmlspecialchars($this->input->post('kd_fakultas', true)),
                'nama_fakultas' => htmlspecialchars($this->input->post('nama_fakultas', true)),
            ];
            $this->Model_fakultas->add_fakultas($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
            redirect('fakultas');
        }
    }

    public function edit_fakultas($kd_fakultas)
    {
        $this->form_validation->set_rules('nama_fakultas', 'Level', 'required|trim', [
            'required' => 'Nama Fakultas tidak boleh kosong..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Fakultas';
            //get data for session        
            $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
            $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
            $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  

            //get user by id
            $data['fakultas'] = $this->Model_fakultas->get_fakultas_by_id($kd_fakultas);

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
            $data['total_nilai_mahasiswa'] = $this->Model_nilai->count_nilai_mahasiswa();
            $data['total_nilai_prodi'] = $this->Model_nilai->count_nilai_prodi();
            $data['total_semua_nilai'] = $this->Model_nilai->count_nilai();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('v_edit_fakultas', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_fakultas' => htmlspecialchars($this->input->post('nama_fakultas', true)),
            ];
            $this->Model_fakultas->edit_fakultas($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah diedit !</div>');
            redirect('fakultas');
        }
    }
    //delete data
    public function delete_fakultas($kd_fakultas)
    {
        $this->Model_fakultas->delete_fakultas($kd_fakultas);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
        redirect('fakultas');
    }
}