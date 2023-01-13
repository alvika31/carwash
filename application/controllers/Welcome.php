<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Cucimobil_model');
		$this->load->model('M_Paket_model');
		$this->load->library('Pdf');
		if (!$this->session->userdata('user_username')) redirect('C_login');
	}
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('home_menu');
		$this->load->view('template/footer');
	}
}
