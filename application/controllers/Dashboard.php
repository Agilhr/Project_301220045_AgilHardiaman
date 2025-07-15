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

    public function simulasi() {
        $this->load->view('simulasi');
    }

    public function challenge_quiz() {
        $questions = [
            [
                'question' => 'Apa itu investasi?',
                'choices' => ['A. Menyimpan uang di bawah bantal', 'B. Menanamkan modal untuk mendapatkan keuntungan', 'C. Membelanjakan seluruh pendapatan', 'D. Membayar utang'],
                'answer' => 'B'
            ],
            [
                'question' => 'Instrumen investasi berikut yang paling berisiko adalah?',
                'choices' => ['A. Deposito', 'B. Obligasi', 'C. Saham', 'D. Tabungan'],
                'answer' => 'C'
            ],
            [
                'question' => 'Apa tujuan utama melakukan diversifikasi investasi?',
                'choices' => ['A. Memaksimalkan risiko', 'B. Mengurangi risiko', 'C. Mengurangi keuntungan', 'D. Menghindari pajak'],
                'answer' => 'B'
            ],
            [
                'question' => 'Reksa dana dikelola oleh?',
                'choices' => ['A. Investor', 'B. Manajer Investasi', 'C. Bank', 'D. Pemerintah'],
                'answer' => 'B'
            ],
            [
                'question' => 'Apa itu return investasi?',
                'choices' => ['A. Modal awal', 'B. Keuntungan atau kerugian dari investasi', 'C. Jumlah pinjaman', 'D. Pajak investasi'],
                'answer' => 'B'
            ],
            [
                'question' => 'Salah satu keuntungan investasi emas adalah?',
                'choices' => ['A. Nilai stabil jangka panjang', 'B. Mudah rusak', 'C. Tidak bisa dijual', 'D. Tidak ada risiko'],
                'answer' => 'A'
            ],
            [
                'question' => 'Apa yang dimaksud dengan inflasi?',
                'choices' => ['A. Penurunan harga barang', 'B. Kenaikan harga barang secara umum', 'C. Penurunan nilai uang', 'D. Kenaikan nilai investasi'],
                'answer' => 'B'
            ],
            [
                'question' => 'Investasi yang cocok untuk pemula adalah?',
                'choices' => ['A. Saham spekulatif', 'B. Reksa dana pasar uang', 'C. Forex', 'D. Properti mewah'],
                'answer' => 'B'
            ],
            [
                'question' => 'Apa itu dividen?',
                'choices' => ['A. Bunga bank', 'B. Pembagian keuntungan perusahaan kepada pemegang saham', 'C. Pajak investasi', 'D. Biaya transaksi'],
                'answer' => 'B'
            ],
            [
                'question' => 'Sebelum berinvestasi, sebaiknya?',
                'choices' => ['A. Meminjam uang sebanyak-banyaknya', 'B. Membaca dan memahami profil risiko', 'C. Mengikuti tren tanpa analisa', 'D. Menjual aset penting'],
                'answer' => 'B'
            ],
        ];
        $score = null;
        if ($this->input->method() === 'post') {
            $user_answers = $this->input->post('answers');
            $score = 0;
            foreach ($questions as $i => $q) {
                if (isset($user_answers[$i]) && strtoupper($user_answers[$i]) === $q['answer']) {
                    $score++;
                }
            }
        }
        $data = [
            'questions' => $questions,
            'score' => $score
        ];
        $this->load->view('challenge_quiz', $data);
    }

    public function articles() {
        $this->load->model('Article_model');
        $data['articles'] = $this->Article_model->get_all();
        $this->load->view('articles', $data);
    }

    public function article_detail($id) {
        $this->load->model('Article_model');
        $article = $this->Article_model->get_by_id($id);
        if (!$article) {
            show_404();
        }
        $data['article'] = $article;
        $this->load->view('article_detail', $data);
    }

    public function webinars() {
        $this->load->model('Webinar_model');
        $data['webinars'] = $this->Webinar_model->get_all();
        $this->load->view('webinars', $data);
    }

    public function webinar_detail($id) {
        $this->load->model('Webinar_model');
        $webinar = $this->Webinar_model->get_by_id($id);
        if (!$webinar) {
            show_404();
        }
        $data['webinar'] = $webinar;
        $this->load->view('webinar_detail', $data);
    }
} 