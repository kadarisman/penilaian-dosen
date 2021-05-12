<?php defined('BASEPATH') or exit('No direct script access allowed');
class Nilai  extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_login();
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

    //add nilai
    public function buat_penilaian()
    {

        $this->form_validation->set_rules('kd_matakuliah', 'Kd_matakuliah', 'required|trim', [
            'required' => 'Matakuliah harus dipilih'
        ]);
        $this->form_validation->set_rules('smester', 'Smester', 'required|trim', [
            'required' => 'Smester harus dipilih'
        ]);

        $this->form_validation->set_rules('NIDN', 'Nidn', 'required|trim', [
            'required' => 'Dosen harus dipilih'
        ]);
        $this->form_validation->set_rules('pesan', 'Pesan', 'required|trim', [
            'required' => 'Pesan tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('nilai', 'Nilai', 'required|trim', [
            'required' => 'Nilai tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Penilaian';
            //get data for session        
            $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
            $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
            $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--// 

            //prodi count master data
            $data['total_nilai_mahasiswa'] = $this->Model_nilai->count_nilai_mahasiswa();
            $data['nilai_mahasiswa'] = $this->Model_nilai->get_nilai_mahasiswa();;
            $data['dosen'] = $this->Model_dosen->get_dosen_mahasiswa();
            $data['matakuliah'] = $this->Model_matakuliah->get_matakuliah_mahasiswa();
            $data['pertanyaan'] = $this->Model_pertanyaan->get_all_pertanyaan();
            $data['pertanyaan1'] = $this->Model_pertanyaan->get_pertanyaan_by_kd_kriteria_km();
            $data['pertanyaan2'] = $this->Model_pertanyaan->get_pertanyaan_by_kd_kriteria_mp();
            $data['pertanyaan3'] = $this->Model_pertanyaan->get_pertanyaan_by_kd_kriteria_dm();
            $data['pertanyaan4'] = $this->Model_pertanyaan->get_pertanyaan_by_kd_kriteria_emj();
            $data['pertanyaan5'] = $this->Model_pertanyaan->get_pertanyaan_by_kd_kriteria_kd();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('mahasiswa/v_penilaian_mahasiswa', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'NPM' => $this->session->userdata('username'),
                'NIDN' => htmlspecialchars($this->input->post('NIDN', true)),
                'smester' => htmlspecialchars($this->input->post('smester', true)),
                'kd_matakuliah' => htmlspecialchars($this->input->post('kd_matakuliah', true)),
                'tahun_ajaran' => htmlspecialchars($this->input->post('tahun_ajaran', true)),
                'pesan' => htmlspecialchars($this->input->post('pesan', true)),
                'nilai' => htmlspecialchars($this->input->post('nilai', true)),
            ];
            $this->Model_nilai->add_nilai($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
            redirect('nilai');
        }
    }
    //end mahasiswa method

    //prodi method
    public function get_nilai_prodi()
    {
        $data['title'] = 'Nilai';
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
        $data['total_nilai_prodi'] = $this->Model_nilai->count_nilai_prodi();

        //get data
        $data['nilai_prodi'] = $this->Model_nilai->get_nilai_prodi();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('prodi/v_nilai_prodi', $data);
        $this->load->view('templates/footer');
    }

    public function rekapitulasi_prodi()
    {
        $data['title'] = 'Rekapitulasi';
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
        $data['total_nilai_prodi'] = $this->Model_nilai->count_nilai_prodi();
        $data['nidn'] = $this->Model_nilai->count_NIDN_in_nilai();

        //get data
        $data['nilai_prodi'] = $this->Model_nilai->get_nilai_prodi();
        $data['rekap_prodi'] = $this->Model_nilai->rekapitulasi_prodi();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('prodi/v_rekapitulasi_prodi', $data);
        $this->load->view('templates/footer');
    }

    public function filter_tahun_prodi()
    {
        $data['title'] = 'Rekapitulasi';
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
        $data['total_nilai_prodi'] = $this->Model_nilai->count_nilai_prodi();
        $data['nidn'] = $this->Model_nilai->count_NIDN_in_nilai();

        $tahun = $this->input->post('tahun_ajaran', true);
        $smester = $this->input->post('smester', true);

        //get data
        $data['nilai_prodi'] = $this->Model_nilai->get_nilai_prodi();
        $data['filter_tahun1'] = $this->Model_nilai->filter_tahun_prodi($tahun, $smester);
        $data['sm'] = $smester;
        $data['th'] = $tahun;


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('prodi/v_filter_nilai_prodi', $data);
        $this->load->view('templates/footer');
    }


    // public function rekap_nilai_prodi()
    // {
    //     $data['title'] = 'Rekap data';
    //     //get data for session        
    //     $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    //     $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
    //     $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
    //     $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--// 

    //     //count user
    //     $data['total_user_mahasiswa_prodi'] = $this->Model_user->count_mahasiswa_prodi();
    //     $data['total_user_dosen_prodi'] = $this->Model_user->count_dosen();

    //     //count master data
    //     $data['total_dosen_prodi'] = $this->Model_dosen->count_dosen_prodi();
    //     $data['total_mahasiswa_prodi'] = $this->Model_mahasiswa->count_mahasiswa_prodi();
    //     $data['total_matakuliah_prodi'] = $this->Model_matakuliah->count_matakuliah_prodi();
    //     $data['total_nilai_prodi'] = $this->Model_nilai->count_nilai_prodi();
    //     $data['nidn'] = $this->Model_nilai->count_NIDN_in_nilai();

    //     //get data
    //     $data['nilai_prodi'] = $this->Model_nilai->get_nilai_prodi();
    //     $data['laporan'] = $this->Model_nilai->laporan();


    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('prodi/v_rekap_nilai_prodi', $data);
    //     $this->load->view('templates/footer');
    // }
    // end prodi method

    //admin dan bpm method
    public function get_nilai_dosen()
    {
        $data['title'] = 'Nilai';
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
        $data['total_nilai_mahasiswa'] = $this->Model_nilai->count_nilai_mahasiswa();
        $data['total_nilai_prodi'] = $this->Model_nilai->count_nilai_prodi();
        $data['total_semua_nilai'] = $this->Model_nilai->count_nilai();

        //get data
        $data['all_nilai'] = $this->Model_nilai->get_all_nilai();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_nilai', $data);
        $this->load->view('templates/footer');
    }

    public function rekapitulasi()
    {
        $data['title'] = 'Rekapitulasi';
        //get data for session        
        $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
        $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
        $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--// 

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

        //get data
        $data['rekap'] = $this->Model_nilai->rekapitulasi();
        $data['nidn'] = $this->Model_nilai->count_NIDN_in_nilai();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_rekapitulasi', $data);
        $this->load->view('templates/footer');
    }

    public function filter_tahun()
    {
        $data['title'] = 'Rekapitulasi';
        //get data for session        
        $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
        $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
        $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--// 

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

        $tahun = $this->input->post('tahun_ajaran', true);
        $smester = $this->input->post('smester', true);
        $data['nidn'] = $this->Model_nilai->count_NIDN_in_nilai();

        //get data
        //$data['nilai_prodi'] = $this->Model_nilai->get_nilai_prodi();
        $data['filter_tahun'] = $this->Model_nilai->filter_tahun($tahun, $smester);
        $data['sm'] = $smester;
        $data['th'] = $tahun;


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_filter_nilai', $data);
        $this->load->view('templates/footer');
    }
    //end admin dan bpm method

    //dosen  method
    public function get_nilai_dosen_selfe()
    {
        $data['title'] = 'Nilai';
        //get data for session        
        $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
        $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
        $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--// 


        //count master data      
        $data['total_nilai_self'] = $this->Model_nilai->count_nilai_self();

        //get data
        $data['all_nilai_self'] = $this->Model_nilai->get_all_nilai_self();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_nilai_self', $data);
        $this->load->view('templates/footer');
    }

    //all user edit nilai
    public function edit_nilai($id_nilai)
    {

        $this->form_validation->set_rules('pesan', 'Pesan', 'required|trim', [
            'required' => 'Pesan tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('nilai', 'Nilai', 'required|trim', [
            'required' => 'Nilai tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Edit Nilai';
            //get data for session        
            $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
            $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
            $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--// 

            //get nilai by id
            $data['nilai'] = $this->Model_nilai->get_nilai_by_id($id_nilai);

            //prodi count master data
            $data['total_nilai_mahasiswa'] = $this->Model_nilai->count_nilai_mahasiswa();
            $data['nilai_mahasiswa'] = $this->Model_nilai->get_nilai_mahasiswa();
            $data['total_semua_nilai'] = $this->Model_nilai->count_nilai();
            $data['total_nilai_prodi'] = $this->Model_nilai->count_nilai_prodi();
            $data['dosen'] = $this->Model_dosen->get_dosen_mahasiswa();
            $data['pertanyaan'] = $this->Model_pertanyaan->get_all_pertanyaan();
            $data['matakuliah'] = $this->Model_matakuliah->get_matakuliah_mahasiswa();
            $data['pertanyaan1'] = $this->Model_pertanyaan->get_pertanyaan_by_kd_kriteria_km();
            $data['pertanyaan2'] = $this->Model_pertanyaan->get_pertanyaan_by_kd_kriteria_mp();
            $data['pertanyaan3'] = $this->Model_pertanyaan->get_pertanyaan_by_kd_kriteria_dm();
            $data['pertanyaan4'] = $this->Model_pertanyaan->get_pertanyaan_by_kd_kriteria_emj();
            $data['pertanyaan5'] = $this->Model_pertanyaan->get_pertanyaan_by_kd_kriteria_kd();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('v_edit_nilai', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'NIDN' => htmlspecialchars($this->input->post('NIDN', true)),
                'smester' => htmlspecialchars($this->input->post('smester', true)),
                'kd_matakuliah' => htmlspecialchars($this->input->post('kd_matakuliah', true)),
                'pesan' => htmlspecialchars($this->input->post('pesan', true)),
                'nilai' => htmlspecialchars($this->input->post('nilai', true)),
            ];
            $this->Model_nilai->edit_nilai($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
            if (($this->session->userdata('level') == 'mahasiswa')) {
                redirect('nilai');
            } else if (($this->session->userdata('level') == 'mahasiswa')) {
                redirect('nilai');
            } else if (($this->session->userdata('level') == 'prodi')) {
                redirect('nilai-prd');
            } else if (($this->session->userdata('level') == 'BPM')) {
                redirect('nilai-bpm');
            } else {
                redirect('nilai-dosen');
            }
        }
    }

    //all user delete nilai
    public function delete_nilai($id_nilai)
    {
        $this->Model_nilai->delete_nilai($id_nilai);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
        if (($this->session->userdata('level') == 'mahasiswa')) {
            redirect('nilai');
        } else if (($this->session->userdata('level') == 'mahasiswa')) {
            redirect('nilai');
        } else if (($this->session->userdata('level') == 'prodi')) {
            redirect('nilai-prd');
        } else if (($this->session->userdata('level') == 'BPM')) {
            redirect('nilai-bpm');
        } else {
            redirect('nilai-dosen');
        }
    }

    //all user detail nilai 
    // public function detail_nilai($NIDN)
    // {
    //     $data['title'] = 'Detail';
    //     //get data for session        
    //     $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    //     $data['user_prodi'] = $this->Model_user->user_prodi_get_data(); // get data user prodi where her session
    //     $data['user_dosen'] = $this->Model_user->user_dosen_get_data(); //--//
    //     $data['user_mahasiswa'] = $this->Model_user->user_mahasiswa_get_data(); //--// 

    //     //count user
    //     $data['total_user_mahasiswa_prodi'] = $this->Model_user->count_mahasiswa_prodi();
    //     $data['total_user_dosen_prodi'] = $this->Model_user->count_dosen();

    //     //count master data
    //     $data['total_dosen_prodi'] = $this->Model_dosen->count_dosen_prodi();
    //     $data['total_mahasiswa_prodi'] = $this->Model_mahasiswa->count_mahasiswa_prodi();
    //     $data['total_matakuliah_prodi'] = $this->Model_matakuliah->count_matakuliah_prodi();
    //     $data['total_nilai_prodi'] = $this->Model_nilai->count_nilai_prodi();
    //     $data['nidn'] = $this->Model_nilai->count_NIDN_in_nilai();

    //     //get data
    //     $data['nilai_prodi'] = $this->Model_nilai->get_nilai_prodi();
    //     $data['laporan'] = $this->Model_nilai->laporan();
    //     $data['detail'] = $this->Model_nilai->get_nilai_by_NIDN($NIDN);
    //     $data['detail2'] = $this->Model_nilai->get_nilai_by_NIDN2($NIDN);


    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('v_detail_nilai', $data);
    //     $this->load->view('templates/footer');
    // }
}