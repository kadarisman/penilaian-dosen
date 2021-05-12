<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pertanyaan  extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
    }

    public function index() // method index
    {
        $data['title'] = 'Pertanyaan';

        //all pertanyaan       
        $data['pertanyaan'] = $this->Model_pertanyaan->get_all_pertanyaan();

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
        $this->load->view('v_pertanyaan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_pertanyaan()
    {
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required|trim', [
            'required' => 'Pertanyaan tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('kd_kriteria', 'Kd_kriteria', 'required|trim', [
            'required' => 'Kode Kriteria harus dipilih'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Pertanyaan';
            $data['kriteria'] = $this->Model_pertanyaan->get_all_kriteria();

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
            $this->load->view('v_tambah_pertanyaan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kd_kriteria' => htmlspecialchars($this->input->post('kd_kriteria', true)),
                'pertanyaan' => htmlspecialchars($this->input->post('pertanyaan', true)),
            ];
            $this->Model_pertanyaan->add_pertanyaan($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
            redirect('pertanyaan');
        }
    }

    public function edit_pertanyaan($id_pertanyaan)
    {
        $data['kriteria'] = $this->Model_pertanyaan->get_all_kriteria();
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required|trim', [
            'required' => 'Pertanyaan tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('kd_kriteria', 'Kd_kriteria', 'required|trim', [
            'required' => 'Kriteria harus dipilih..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Pertanyaan';
            //get data for session        
            $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
            $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
            $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  

            //get user by id
            $data['pertanyaan'] = $this->Model_pertanyaan->get_pertanyaan_by_id($id_pertanyaan);

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
            $this->load->view('v_edit_pertanyaan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'pertanyaan' => htmlspecialchars($this->input->post('pertanyaan', true)),
                'kd_kriteria' => htmlspecialchars($this->input->post('kd_kriteria', true)),
            ];
            $this->Model_pertanyaan->edit_pertanyaan($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah diedit !</div>');
            redirect('pertanyaan');
        }
    }
}