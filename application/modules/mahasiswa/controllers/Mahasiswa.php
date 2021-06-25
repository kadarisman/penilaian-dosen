<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa  extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
    }


    //method for admin
    //admin red data mahasiswa
    public function index() // method index
    {
        $data['title'] = 'Mahasiswa';

        $data['prodi'] = $this->Model_prodi->get_all_prodi_for_admin();

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
        $data['total_nilai_mahasiswa'] = $this->Model_nilai->count_nilai_mahasiswa();
        $data['total_nilai_prodi'] = $this->Model_nilai->count_nilai_prodi();
        $data['total_semua_nilai'] = $this->Model_nilai->count_nilai();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/v_mahasiswa_perprodi', $data);
        $this->load->view('templates/footer');
    }

    public function get_mahasiswa_perprodi($kd_prodi)
    {
        $data['title'] = 'Mahasiswa';

        $data['prodi'] = $this->Model_prodi->get_prodi_name($kd_prodi);


        // all mahasiswa       
        $data['mahasiswa'] = $this->Model_mahasiswa->get_mahasiswa_perprodi($kd_prodi);
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
        $this->load->view('admin/v_mahasiswa', $data);
        $this->load->view('templates/footer');
    }



    //admin tambah mahasiswa
    public function tambah_mahasiswa($kd_prodi)
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
            $data['prodi_1'] = $this->Model_prodi->get_prodi_name($kd_prodi);

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
            $this->load->view('admin/tambah_mahasiswa/v_tambah_mahasiswa', $data);
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
            redirect('detail-mahasiswa/' . $kd_prodi);
        }
    }

    //admin tambah mahasswa takterdata
    public function tambah_mahasiswa_takterdata($id_user)
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

            //get user by id
            $data['mahasiswa'] = $this->Model_user->get_user_by_id($id_user);

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
            $this->load->view('admin/tambah_mahasiswa/v_tambah_mahasiswa_takterdata', $data);
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
            redirect('user-mahasiswa');
        }
    }

    //admin edit mahasiswa
    public function edit_mahasiswa($NPM)
    {
        $data['prodi'] = $this->Model_prodi->get_all_prodi();
        $this->form_validation->set_rules('nama_mahasiswa', 'Nama_mahasiswa', 'required|trim', [
            'required' => 'Nama Mahasiswa tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('alamat_mahasiswa', 'Alamat_mahasiswa', 'required|trim', [
            'required' => 'Alamat tidak boleh kosong..!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Mahasiswa';

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
            $this->load->view('admin/edit_mahasiswa/v_edit_mahasiswa', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_mahasiswa' => htmlspecialchars($this->input->post('nama_mahasiswa', true)),
                'alamat_mahasiswa' => htmlspecialchars($this->input->post('alamat_mahasiswa', true)),
            ];
            $this->Model_mahasiswa->edit_mahasiswa($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah diedit !</div>');
            $kd_prodi = $this->input->post('kd_prodi');
            redirect('detail-mahasiswa/' . $kd_prodi);
        }
    }

    //admin delete mahasiswa
    public function delete_mahasiswa($NPM)
    {

        $this->Model_mahasiswa->delete_mahasiswa($NPM);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
        redirect('mahasiswa');
    }
    //end method admin

    //method for prodi
    //prodi read data
    public function mahasiswa_prodi()
    {
        $data['title'] = 'Mahasiswa';

        // all mahasiswa       
        $data['mahasiswa_prodi'] = $this->Model_mahasiswa->get_all_mahasiswa_prodi();
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
        $data['total_nilai_mahasiswa'] = $this->Model_nilai->count_nilai_mahasiswa();
        $data['total_nilai_prodi'] = $this->Model_nilai->count_nilai_prodi();
        $data['total_semua_nilai'] = $this->Model_nilai->count_nilai();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('prodi/v_mahasiswa_prodi', $data);
        $this->load->view('templates/footer');
    }

    //prodi tambah mahasiswa
    public function tambah_mahasiswa_prodi()
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

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Mahasiswa';

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
            $data['total_nilai_mahasiswa'] = $this->Model_nilai->count_nilai_mahasiswa();
            $data['total_nilai_prodi'] = $this->Model_nilai->count_nilai_prodi();
            $data['total_semua_nilai'] = $this->Model_nilai->count_nilai();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('prodi/tambah_mahasiswa/v_tambah_mahasiswa_prodi', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'NPM' => htmlspecialchars($this->input->post('NPM', true)),
                'kd_prodi' => $this->session->userdata('kd_prodi'),
                'nama_mahasiswa' => htmlspecialchars($this->input->post('nama_mahasiswa', true)),
                'alamat_mahasiswa' => htmlspecialchars($this->input->post('alamat_mahasiswa', true)),
                'status' => '1',
            ];
            $this->Model_mahasiswa->add_mahasiswa($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
            redirect('mahasiswa-prodi');
        }
    }

    //prodi tambah mahasswa takterdata
    public function tambah_mahasiswa_takterdata_prodi($id_user)
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

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Mahasiswa';
            $data['prodi'] = $this->Model_prodi->get_all_prodi();

            //get data for session        
            $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
            $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
            $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--//  

            //get user by id
            $data['mahasiswa'] = $this->Model_user->get_user_by_id($id_user);

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
            $this->load->view('prodi/tambah_mahasiswa/v_tambah_mahasiswa_takterdata_prodi', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'NPM' => htmlspecialchars($this->input->post('NPM', true)),
                'kd_prodi' => $this->session->userdata('kd_prodi'),
                'nama_mahasiswa' => htmlspecialchars($this->input->post('nama_mahasiswa', true)),
                'alamat_mahasiswa' => htmlspecialchars($this->input->post('alamat_mahasiswa', true)),
                'status' => '1',
            ];
            $this->Model_mahasiswa->add_mahasiswa($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
            redirect('user-mahasiswa-prodi');
        }
    }
    //admin edit mahasiswa
    public function edit_mahasiswa_prodi($NPM)
    {
        $this->form_validation->set_rules('nama_mahasiswa', 'Nama_mahasiswa', 'required|trim', [
            'required' => 'Nama Mahasiswa tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('alamat_mahasiswa', 'Alamat_mahasiswa', 'required|trim', [
            'required' => 'Alamat tidak boleh kosong..!'
        ]);


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Mahasiswa';
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
            $data['total_nilai_mahasiswa'] = $this->Model_nilai->count_nilai_mahasiswa();
            $data['total_nilai_prodi'] = $this->Model_nilai->count_nilai_prodi();
            $data['total_semua_nilai'] = $this->Model_nilai->count_nilai();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('prodi/edit_mahasiswa/v_edit_mahasiswa_prodi', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_mahasiswa' => htmlspecialchars($this->input->post('nama_mahasiswa', true)),
                'alamat_mahasiswa' => htmlspecialchars($this->input->post('alamat_mahasiswa', true)),
            ];
            $this->Model_mahasiswa->edit_mahasiswa($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" id="msg" role="alert">Sudah diedit !</div>');
            redirect('mahasiswa-prodi');
        }
    }

    //prodi delete dosen
    public function delete_mahasiswa_prodi($NPM)
    {
        $this->Model_mahasiswa->delete_mahasiswa($NPM);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
        redirect('mahasiswa-prodi');
    }
    //end method for prodi
}