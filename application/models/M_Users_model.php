<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Users_model extends CI_Model
{

    public function read()
    {
        $query = $this->db->get('tbl_user');
        return $query->result();
    }

    public function read_by($id)
    {
        $this->db->where('user_id', $id);
        $query = $this->db->get('tbl_user');
        return $query->row();
    }

    public function create($data)
    {
        $result = $this->db->insert('tbl_user', $data);
        return $result;
    }

    public function update($id)
    {
        $data = array(
            'user_username' => $this->input->post('user_username'),
            'user_email' => $this->input->post('user_email')
        );
        $this->db->where('user_id', $id);
        $this->db->update('tbl_user', $data);
    }

    public function delete($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('tbl_user');
    }
}
