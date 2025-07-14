<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webinar_model extends CI_Model {
    public function get_all() {
        $this->db->order_by('webinar_date', 'DESC');
        return $this->db->get('webinars')->result_array();
    }
    public function get_by_id($id) {
        return $this->db->get_where('webinars', ['id' => $id])->row_array();
    }
    public function insert($data) {
        $this->db->insert('webinars', $data);
        return $this->db->insert_id();
    }
    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('webinars', $data);
    }
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('webinars');
    }
} 