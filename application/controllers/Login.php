<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('login');
    }

    public function submit() {
        $this->form_validation->set_rules('identity', 'Username or Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $identity = $this->input->post('identity');
            $password = $this->input->post('password');
            $user = $this->User_model->get_by_identity($identity);
            if ($user && password_verify($password, $user['password'])) {
                $userdata = array(
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($userdata);
                redirect('dashboard');
            } else {
                $data['error'] = 'Username/email atau password salah!';
                $this->load->view('login', $data);
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
} 