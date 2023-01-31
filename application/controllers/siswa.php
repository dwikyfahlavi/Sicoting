<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata("logged_in_siswa")) {
			//jika tak ada, balik ke controler login
			redirect('auth/blocked');
		}
		$this->load->model('m_siswa', 'siswa');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('siswa/dashboard', $data);
		$this->load->view('templates/footer');
	}

	public function profile()
	{
		$data['title'] = 'Profile';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('siswa/profile', $data);
		$this->load->view('templates/footer');
	}

	public function editProfileSiswa($id_user)
	{
		$data['title'] = 'Edit Profile';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['editProfile'] = $this->siswa->getDataAkun($id_user);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('siswa/editprofile', $data);
		$this->load->view('templates/footer');
	}

	public function editProfileRespon()
	{
		$config['upload_path']          = './assets/profile';
		$config['allowed_types']        = 'jpg|png|jpeg|svg';
		$config['max_size']             = 2048;

		$this->load->library('upload', $config);

		$this->upload->do_upload('image');
		$data1 = array('upload_image' => $this->upload->data());
		$id = $this->input->post('id_user');
		$data = [
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'nis' => $this->input->post('nis'),
			'email' => $this->input->post('email'),
			'kontak' => $this->input->post('kontak'),
			'image' => $data1['upload_image']['file_name'],
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'role_id' => $this->input->post('role_id'),
			'is_active' => 1,
			'date_created' => time()
		];
		$this->siswa->editProfileSiswa($id, $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success">
                Profile berhasil dirubah!</div>');
		redirect('siswa/profile');
	}

	public function materi()
	{
		$data['title'] = 'Daftar Materi';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['materi'] = $this->siswa->getMateri();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('siswa/materi', $data);
		$this->load->view('templates/footer');
	}

	public function media()
	{
		$data['title'] = 'Media';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['media'] = $this->siswa->getMedia();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('siswa/media', $data);
		$this->load->view('templates/footer');
	}
}
