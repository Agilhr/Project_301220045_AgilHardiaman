<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_Model {
    public function get_all() {
        $this->db->select('articles.*, categories.name as category_name, users.username as author_name');
        $this->db->from('articles');
        $this->db->join('categories', 'categories.id = articles.category_id', 'left');
        $this->db->join('users', 'users.id = articles.author_id', 'left');
        $this->db->order_by('articles.created_at', 'DESC');
        return $this->db->get()->result_array();
    }
    public function get_by_id($id) {
        return $this->db->get_where('articles', ['id' => $id])->row_array();
    }
    public function insert($data) {
        $this->db->insert('articles', $data);
        return $this->db->insert_id();
    }
    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('articles', $data);
    }
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('articles');
    }
} 