<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function insert($data) {
        return $this->db->insert('users', $data);
    }

    public function get_by_identity($identity) {
        $this->db->where('username', $identity);
        $this->db->or_where('email', $identity);
        return $this->db->get('users')->row_array();
    }

    public function get_all() {
        return $this->db->get('users')->result_array();
    }
} 