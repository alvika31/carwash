<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Login_model');
		if (!$this->session->userdata('user_username')) redirect('C_login');
	}

	public function index()
	{
		$this->load->view('auth/V_formlogin');
	}

	public function login()
	{
		$username = $this->input->post('user_username');
		$password = md5($this->input->post('user_password'));
		$user = $this->M_Login_model->get($username);
		if (empty($user)) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
		  <span style="color:white">Username Tidak Ditemukan</span>
		 </div>');
			redirect('C_login');
		} else {
			if ($password == $user->user_password) {
				$session = array(
					'authenticated' => true,
					'user_id' => $user->user_id,
					'user_username' => $user->user_username,
					'user_email' => $user->user_email,
					'status' => "login",
					'is_login' => true
				);
				$this->session->set_userdata($session);
				redirect('welcome');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			<span style="color:white">Harap Masukan Password Yang Benar</span>
		   </div>');
				redirect('C_login');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('C_login');
	}

	public function changepass()
	{
		if ($this->input->post('change') && $this->validation('change')) {
			redirect('welcome');
		}
		$this->load->view('auth/V_formchangepass');
	}

	public function validation($type)
	{
		$this->load->library('form_validation');

		if ($type == 'login') {
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
		} else {
			$this->form_validation->set_rules('oldpassword', 'Old Password', 'required');
			$this->form_validation->set_rules('newpassword', 'New Password', 'required');
		}
		if ($this->form_validation->run())
			return TRUE;
		else
			return FALSE;
	}
}
