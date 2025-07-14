<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->view('register');
    }

    public function submit() {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required|in_list[admin,user]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'role' => $this->input->post('role'),
                'is_active' => 1,
                'is_verified' => 0
            );
            $this->User_model->insert($data);
            $this->session->set_flashdata('success', 'Registrasi berhasil! Silakan login.');
            redirect('login');
        }
    }
} 