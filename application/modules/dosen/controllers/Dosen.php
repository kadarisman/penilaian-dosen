<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dosen  extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
    }

    public function index() // method index
    {
        $data['title'] = 'Dosen';
        //methods for admin
        //admin read all dosen 
        $data['dosen'] = $this->Model_dosen->get_all_dosen();
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
        $this->load->view('admin/v_dosen', $data);
        $this->load->view('templates/footer');
    }

    //admin add dosen
    public function tambah_dosen()
    {
        $this->form_validation->set_rules('NIDN', 'Nidn', 'required|trim|is_unique[dosen.NIDN]', [
            'is_unique' => 'NIDN Prodi sudah terdaftar..!',
            'required' => 'NIDN tidak boleh kosong..!',
        ]);

        $this->form_validation->set_rules('nama_dosen', 'Nama_dosen', 'required|trim', [
            'required' => 'Nama Dosen tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('alamat_dosen', 'Alamat_dosen', 'required|trim', [
            'required' => 'Alamat Dosen tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('kd_prodi', 'Kd_prodi', 'required|trim', [
            'required' => 'Prodi harus dipilih'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Dosen';
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
            $data['total_nilai_mahasiswa'] = $this->Model_nilai->count_nilai_mahasiswa();
            $data['total_nilai_prodi'] = $this->Model_nilai->count_nilai_prodi();
            $data['total_semua_nilai'] = $this->Model_nilai->count_nilai();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/tambah_dosen/v_tambah_dosen', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'NIDN' => htmlspecialchars($this->input->post('NIDN', true)),
                'kd_prodi' => htmlspecialchars($this->input->post('kd_prodi', true)),
                'nama_dosen' => htmlspecialchars($this->input->post('nama_dosen', true)),
                'alamat_dosen' => htmlspecialchars($this->input->post('alamat_dosen', true)),
                'status' => '1',
            ];
            $this->Model_dosen->add_dosen($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
            redirect('dosen');
        }
    }

    //admin add dosen taktterdata
    public function tambah_dosen_takterdata($id_user)
    {
        $this->form_validation->set_rules('NIDN', 'Nidn', 'required|trim|is_unique[mahasiswa.NPM]', [
            'is_unique' => 'NIDN sudah terdaftar..!',
            'required' => 'NIDN tidak boleh kosong..!',
        ]);

        $this->form_validation->set_rules('nama_dosen', 'Nama_dosen', 'required|trim', [
            'required' => 'Nama Mahasiswa tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('alamat_dosen', 'Alamat_dosen', 'required|trim', [
            'required' => 'Alamat Dosen tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('kd_prodi', 'Kd_prodi', 'required|trim', [
            'required' => 'Prodi harus dipilih'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Dosen';
            $data['prodi'] = $this->Model_prodi->get_all_prodi();

            //get data for session        
            $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
            $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
            $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  

            //get user by id
            $data['dosen'] = $this->Model_user->get_user_by_id($id_user);

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
            $this->load->view('admin/tambah_dosen/v_tambah_dosen_takterdata', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'NIDN' => htmlspecialchars($this->input->post('NIDN', true)),
                'kd_prodi' => htmlspecialchars($this->input->post('kd_prodi', true)),
                'nama_dosen' => htmlspecialchars($this->input->post('nama_dosen', true)),
                'alamat_dosen' => htmlspecialchars($this->input->post('alamat_dosen', true)),
                'status' => '1',
            ];
            $this->Model_dosen->add_dosen($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
            redirect('user-dosen');
        }
    }

    //admin edit dosen
    public function edit_dosen($NIDN)
    {
        $data['prodi'] = $this->Model_prodi->get_all_prodi();
        $this->form_validation->set_rules('nama_dosen', 'Nama_dosen', 'required|trim', [
            'required' => 'Nama Dosen tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('alamat_dosen', 'Alamat_dosen', 'required|trim', [
            'required' => 'Alamat tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('kd_prodi', 'Kd_prodi', 'required|trim', [
            'required' => 'Prodi harus dipilih..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Dosen';
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
            $data['mahasiswa'] = $this->Model_mahasiswa->get_all_mahasiswa();

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
            $this->load->view('admin/edit_dosen/v_edit_dosen', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_dosen' => htmlspecialchars($this->input->post('nama_dosen', true)),
                'alamat_dosen' => htmlspecialchars($this->input->post('alamat_dosen', true)),
                'kd_prodi' => htmlspecialchars($this->input->post('kd_prodi', true)),
            ];
            $this->Model_dosen->edit_dosen($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah diedit !</div>');
            redirect('dosen');
        }
    }
    //admin delete dosen
    public function delete_dosen($NIDN)
    {
        $this->Model_dosen->delete_dosen($NIDN);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
        redirect('dosen');
    }
    //end method for admin

    //methods for prodi
    //prodi read data dosen
    public function dosen_prodi()
    {
        $data['title'] = 'Dosen';

        // all dosen       
        $data['dosen_prodi'] = $this->Model_dosen->get_all_dosen_prodi();
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
        $this->load->view('prodi/v_dosen_prodi', $data);
        $this->load->view('templates/footer');
    }

    //prodi add dosen
    public function tambah_dosen_prodi()
    {
        $this->form_validation->set_rules('NIDN', 'Nidn', 'required|trim|is_unique[dosen.NIDN]', [
            'is_unique' => 'NIDN Prodi sudah terdaftar..!',
            'required' => 'NIDN tidak boleh kosong..!',
        ]);

        $this->form_validation->set_rules('nama_dosen', 'Nama_dosen', 'required|trim', [
            'required' => 'Nama Dosen tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('alamat_dosen', 'Alamat_dosen', 'required|trim', [
            'required' => 'Alamat Dosen tidak boleh kosong'
        ]);


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Dosen';

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
            $this->load->view('prodi/tambah_dosen/v_tambah_dosen_prodi', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'NIDN' => htmlspecialchars($this->input->post('NIDN', true)),
                'kd_prodi' => $this->session->userdata('kd_prodi'),
                'nama_dosen' => htmlspecialchars($this->input->post('nama_dosen', true)),
                'alamat_dosen' => htmlspecialchars($this->input->post('alamat_dosen', true)),
                'status' => '1',
            ];
            $this->Model_dosen->add_dosen($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
            redirect('dosen-prodi');
        }
    }

    //prodi edit dosen
    public function edit_dosen_prodi($NIDN)
    {
        $this->form_validation->set_rules('nama_dosen', 'Nama_dosen', 'required|trim', [
            'required' => 'Nama Dosen tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('alamat_dosen', 'Alamat_dosen', 'required|trim', [
            'required' => 'Alamat tidak boleh kosong..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Dosen';
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
            $data['total_nilai_mahasiswa'] = $this->Model_nilai->count_nilai_mahasiswa();
            $data['total_nilai_prodi'] = $this->Model_nilai->count_nilai_prodi();
            $data['total_semua_nilai'] = $this->Model_nilai->count_nilai();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('prodi/edit_dosen/v_edit_dosen_prodi', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_dosen' => htmlspecialchars($this->input->post('nama_dosen', true)),
                'alamat_dosen' => htmlspecialchars($this->input->post('alamat_dosen', true)),
            ];
            $this->Model_dosen->edit_dosen($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah diedit !</div>');
            redirect('dosen-prodi');
        }
    }

    //prodi add dosen taktterdata
    public function tambah_dosen_takterdata_prodi($id_user)
    {
        $this->form_validation->set_rules('NIDN', 'Nidn', 'required|trim|is_unique[mahasiswa.NPM]', [
            'is_unique' => 'NIDN sudah terdaftar..!',
            'required' => 'NIDN tidak boleh kosong..!',
        ]);

        $this->form_validation->set_rules('nama_dosen', 'Nama_dosen', 'required|trim', [
            'required' => 'Nama Mahasiswa tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('alamat_dosen', 'Alamat_dosen', 'required|trim', [
            'required' => 'Alamat Dosen tidak boleh kosong'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Dosen';
            $data['prodi'] = $this->Model_prodi->get_all_prodi();

            //get data for session        
            $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
            $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
            $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  

            //get user by id
            $data['dosen'] = $this->Model_user->get_user_by_id($id_user);

            //count user
            $data['total_user_mahasiswa_prodi'] = $this->Model_user->count_mahasiswa_prodi();
            $data['total_user_dosen_prodi'] = $this->Model_user->count_dosen();

            //count master data
            $data['total_dosen_prodi'] = $this->Model_dosen->count_dosen_prodi();
            $data['total_mahasiswa_prodi'] = $this->Model_mahasiswa->count_mahasiswa_prodi();
            $data['total_matakuliah_prodi'] = $this->Model_matakuliah->count_matakuliah_prodi();
            $data['total_nilai_mahasiswa'] = $this->Model_nilai->count_nilai_mahasiswa();
            $data['total_nilai_prodi'] = $this->Model_nilai->count_nilai_prodi();
            $data['total_semua_nilai'] = $this->Model_nilai->count_nilai();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('prodi/tambah_dosen/v_tambah_dosen_takterdata_prodi', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'NIDN' => htmlspecialchars($this->input->post('NIDN', true)),
                'kd_prodi' => $this->session->userdata('kd_prodi'),
                'nama_dosen' => htmlspecialchars($this->input->post('nama_dosen', true)),
                'alamat_dosen' => htmlspecialchars($this->input->post('alamat_dosen', true)),
                'status' => '1',
            ];
            $this->Model_dosen->add_dosen($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
            redirect('user-dosen-prodi');
        }
    }
    //prodi delete dosen
    public function delete_dosen_prodi($NIDN)
    {
        $this->Model_dosen->delete_dosen($NIDN);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
        redirect('dosen-prodi');
    }
    //end method for prodi
}