<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Users_model');
        if (!$this->session->userdata('user_username')) redirect('C_login');
    }

    public function index()
    {
        $data['users'] = $this->M_Users_model->read();
        $this->load->view('template/header');
        $this->load->view('users/V_listuser', $data);
        $this->load->view('template/footer');
    }

    function create()
    {
        $this->load->view('template/header');
        $this->load->view('users/V_formuser');
        $this->load->view('template/footer');
    }

    public function add()
    {
        if ($this->input->post('submit')) {
            $data = [
                'user_username' => $this->input->post('user_username'),
                'user_password' => md5($this->input->post('user_password')),
                'user_email' => $this->input->post('user_email'),
            ];
            $this->M_Users_model->create($data);
            $this->session->set_flashdata('success', 'User Berhasil ditambahkan');
            redirect('C_Users');
        }
    }

    public function edit($id)
    {
        if ($this->input->post('submit')) {
            $query = $this->M_Users_model->update($id);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('msg', '<p style="color:orange"> successfuly updated !</p>');
            } else {
                $this->session->set_flashdata('msg', '<p style="color:red"> update failed !</p>');
            }
            redirect('C_Users');
        }

        $data['user'] = $this->M_Users_model->read_by($id);
        $this->load->view('template/header');
        $this->load->view('users/V_formuser', $data);
        $this->load->view('template/footer');
    }

    public function delete($id)
    {
        $this->M_Users_model->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('msg', ' successfuly deleted !');
        } else {
            $this->session->set_flashdata('msg', ' delete failed !');
        }
        redirect('C_Users');
    }
}
