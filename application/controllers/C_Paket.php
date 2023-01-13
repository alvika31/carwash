<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Paket extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Paket_model');
        if (!$this->session->userdata('user_username')) redirect('C_login');
    }

    public function index()
    {
        $data['datapaket']=$this->M_Paket_model->read();
        $this->load->view('template/header');
        $this->load->view('paket/V_listpaket',$data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        if($this->input->post('submit')) {
           $query = $this->M_Paket_model->create();
        if($query) {
            $this->session->set_flashdata('msg','Categories successfuly added !');
        } else {
            $this->session->set_flashdata('msg','Categories add failed !');
        }
           redirect('C_Paket');
        }
        
        $this->load->view('template/header');
        $this->load->view('paket/V_formpaket');
        $this->load->view('template/footer');
}

public function edit($id)
{
    if($this->input->post('submit')) {
        $query = $this->M_Paket_model->update($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('msg','<p style="color:orange">Cat successfuly updated !</p>');
        } else {
            $this->session->set_flashdata('msg','<p style="color:red">Cat update failed !</p>');
        }
        redirect('C_Paket');
     }
    
    $data['paket']=$this->M_Paket_model->read_by($id);
    $this->load->view('template/header');
    $this->load->view('paket/V_formpaket',$data);
    $this->load->view('template/footer');
}

    public function delete($id)
    {
        $this->M_Paket_model->delete($id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('msg','Categories successfuly deleted !');
        } else {
            $this->session->set_flashdata('msg','Categories delete failed !');
        }
        redirect('C_Paket');

    }
}
