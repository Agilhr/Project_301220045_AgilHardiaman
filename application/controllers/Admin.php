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

    public function articles() {
        $this->load->model('Article_model');
        $data['articles'] = $this->Article_model->get_all();
        $this->load->view('admin_articles', $data);
    }
    public function add_article() {
        $this->load->model('Article_model');
        $this->load->model('User_model');
        $this->load->model('Category_model');
        $data['categories'] = $this->Category_model->get_all();
        $data['authors'] = $this->User_model->get_all();
        $this->load->view('admin_article_form', $data);
    }
    public function save_article() {
        $this->load->model('Article_model');
        $data = [
            'title' => $this->input->post('title'),
            'category_id' => $this->input->post('category_id'),
            'content' => $this->input->post('content'),
            'author_id' => $this->input->post('author_id'),
            'status' => $this->input->post('status'),
            'featured_image' => $this->input->post('featured_image'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->Article_model->insert($data);
        redirect('admin/articles');
    }
    public function edit_article($id) {
        $this->load->model('Article_model');
        $this->load->model('User_model');
        $this->load->model('Category_model');
        $data['article'] = $this->Article_model->get_by_id($id);
        $data['categories'] = $this->Category_model->get_all();
        $data['authors'] = $this->User_model->get_all();
        $this->load->view('admin_article_form', $data);
    }
    public function update_article($id) {
        $this->load->model('Article_model');
        $data = [
            'title' => $this->input->post('title'),
            'category_id' => $this->input->post('category_id'),
            'content' => $this->input->post('content'),
            'author_id' => $this->input->post('author_id'),
            'status' => $this->input->post('status'),
            'featured_image' => $this->input->post('featured_image'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->Article_model->update($id, $data);
        redirect('admin/articles');
    }
    public function delete_article($id) {
        $this->load->model('Article_model');
        $this->Article_model->delete($id);
        redirect('admin/articles');
    }

    public function videos() {
        $this->load->model('Video_model');
        $data['videos'] = $this->Video_model->get_all();
        $this->load->view('admin_videos', $data);
    }
    public function add_video() {
        $this->load->model('Video_model');
        $this->load->model('User_model');
        $this->load->model('Category_model');
        $data['categories'] = $this->Category_model->get_all();
        $data['authors'] = $this->User_model->get_all();
        $this->load->view('admin_video_form', $data);
    }
    public function save_video() {
        $this->load->model('Video_model');
        $data = [
            'title' => $this->input->post('title'),
            'category_id' => $this->input->post('category_id'),
            'description' => $this->input->post('description'),
            'video_url' => $this->input->post('video_url'),
            'thumbnail' => $this->input->post('thumbnail'),
            'duration' => $this->input->post('duration'),
            'author_id' => $this->input->post('author_id'),
            'status' => $this->input->post('status'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->Video_model->insert($data);
        redirect('admin/videos');
    }
    public function edit_video($id) {
        $this->load->model('Video_model');
        $this->load->model('User_model');
        $this->load->model('Category_model');
        $data['video'] = $this->Video_model->get_by_id($id);
        $data['categories'] = $this->Category_model->get_all();
        $data['authors'] = $this->User_model->get_all();
        $this->load->view('admin_video_form', $data);
    }
    public function update_video($id) {
        $this->load->model('Video_model');
        $data = [
            'title' => $this->input->post('title'),
            'category_id' => $this->input->post('category_id'),
            'description' => $this->input->post('description'),
            'video_url' => $this->input->post('video_url'),
            'thumbnail' => $this->input->post('thumbnail'),
            'duration' => $this->input->post('duration'),
            'author_id' => $this->input->post('author_id'),
            'status' => $this->input->post('status'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->Video_model->update($id, $data);
        redirect('admin/videos');
    }
    public function delete_video($id) {
        $this->load->model('Video_model');
        $this->Video_model->delete($id);
        redirect('admin/videos');
    }

    public function webinars() {
        $this->load->model('Webinar_model');
        $data['webinars'] = $this->Webinar_model->get_all();
        $this->load->view('admin_webinars', $data);
    }
    public function add_webinar() {
        $this->load->view('admin_webinar_form');
    }
    public function save_webinar() {
        $this->load->model('Webinar_model');
        $data = [
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'speaker_name' => $this->input->post('speaker_name'),
            'speaker_bio' => $this->input->post('speaker_bio'),
            'webinar_date' => $this->input->post('webinar_date'),
            'duration' => $this->input->post('duration'),
            'max_participants' => $this->input->post('max_participants'),
            'current_participants' => $this->input->post('current_participants'),
            'meeting_link' => $this->input->post('meeting_link'),
            'recording_url' => $this->input->post('recording_url'),
            'status' => $this->input->post('status'),
            'is_free' => $this->input->post('is_free'),
            'price' => $this->input->post('price'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->Webinar_model->insert($data);
        redirect('admin/webinars');
    }
    public function edit_webinar($id) {
        $this->load->model('Webinar_model');
        $data['webinar'] = $this->Webinar_model->get_by_id($id);
        $this->load->view('admin_webinar_form', $data);
    }
    public function update_webinar($id) {
        $this->load->model('Webinar_model');
        $data = [
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'speaker_name' => $this->input->post('speaker_name'),
            'speaker_bio' => $this->input->post('speaker_bio'),
            'webinar_date' => $this->input->post('webinar_date'),
            'duration' => $this->input->post('duration'),
            'max_participants' => $this->input->post('max_participants'),
            'current_participants' => $this->input->post('current_participants'),
            'meeting_link' => $this->input->post('meeting_link'),
            'recording_url' => $this->input->post('recording_url'),
            'status' => $this->input->post('status'),
            'is_free' => $this->input->post('is_free'),
            'price' => $this->input->post('price'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->Webinar_model->update($id, $data);
        redirect('admin/webinars');
    }
    public function delete_webinar($id) {
        $this->load->model('Webinar_model');
        $this->Webinar_model->delete($id);
        redirect('admin/webinars');
    }
} 