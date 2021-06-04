<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('username')) { //status user check, has been login or not
            redirect('user/User');
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'SIEKID';
            $this->load->view('v_login', $data);
        } else {
            // validation success
            $this->_doLogin();
        }
    }

    private function _doLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->Model_login->auth($username);

        // if user available
        if ($user) {
            // check password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'level' => $user['level'],
                    'kd_prodi' => $user['kd_prodi']
                ];
                $this->session->set_userdata($data);
                if ($user['level'] == 'admin' || $user['level'] == 'BPM' || $user['level'] == 'prodi' || $user['level'] == 'dosen' || $user['level'] == 'mahasiswa') {
                    redirect('Dashboard');
                } else {
                    redirect('Dashboard');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Password Salah !</div>');
                redirect('auth/Login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-info"></i> Alert!</h4>Belum Terdaftar, hubungi BPM <a href="#" target="_blank"><strong>klik disini</strong></a> </div>');
            redirect('auth/Login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');

        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Anda sudah log out</div>');
        redirect('Login');
    }
}

/* End of file Login.php */