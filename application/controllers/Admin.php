<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') !== 'admin') {
            redirect('login');
        }
    }

    public function index() {
        if (!$this->session->userdata('admin_verified')) {
            $this->load->view('admin_password');
        } else {
            $this->load->view('admin_dashboard');
        }
    }

    public function verify() {
        $password = $this->input->post('admin_password');
        if ($password === '868686') {
            $this->session->set_userdata('admin_verified', true);
            redirect('admin');
        } else {
            $data['error'] = 'Password admin salah!';
            $this->load->view('admin_password', $data);
        }
    }

    public function logout() {
        $this->session->unset_userdata('admin_verified');
        redirect('dashboard');
    }
} 