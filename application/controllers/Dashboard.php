<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public function index() {
        // Dummy data statistik dan rekomendasi
        $data['user'] = $this->session->userdata();
        $data['statistik'] = [
            'artikel_dibaca' => 12,
            'simulasi_dilakukan' => 3,
            'skor_quiz' => 85,
            'progress_belajar' => 60
        ];
        $data['rekomendasi'] = [
            'artikel' => [
                ['title' => 'Cara Investasi Saham untuk Pemula'],
                ['title' => 'Tips Memilih Reksa Dana'],
            ],
            'webinar' => [
                ['title' => 'Webinar Investasi Emas'],
            ],
            'challenge' => [
                ['title' => 'Challenge Investasi Virtual Februari 2024'],
            ]
        ];
        $this->load->view('dashboard', $data);
    }
} 