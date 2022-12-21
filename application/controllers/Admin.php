<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata("logged_in_admin")) {
			//jika tak ada, balik ke controler login
			redirect('auth/blocked');
		}
		$this->load->model('Menu_model', 'menu');
	}

	public function index()
	{
		$data['title'] = 'Beranda Admin';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['akun'] = $this->menu->getRoleUser();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/v_admin', $data);
		$this->load->view('templates/footer');
	}
}
