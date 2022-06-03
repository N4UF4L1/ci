<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
	//menghalangi masuk tanpa login
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		//tampilkan view
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('data/index', $data);
		$this->load->view('templates/footer');
	}
}