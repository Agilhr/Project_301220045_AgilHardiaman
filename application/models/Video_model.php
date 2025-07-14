<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_model extends CI_Model {
    public function get_all() {
        $this->db->select('videos.*, categories.name as category_name, users.username as author_name');
        $this->db->from('videos');
        $this->db->join('categories', 'categories.id = videos.category_id', 'left');
        $this->db->join('users', 'users.id = videos.author_id', 'left');
        $this->db->order_by('videos.created_at', 'DESC');
        return $this->db->get()->result_array();
    }
    public function get_by_id($id) {
        return $this->db->get_where('videos', ['id' => $id])->row_array();
    }
    public function insert($data) {
        $this->db->insert('videos', $data);
        return $this->db->insert_id();
    }
    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('videos', $data);
    }
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('videos');
    }
} 