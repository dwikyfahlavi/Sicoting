<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
	}

	public function index()
	{
		$logged_in_admin = $this->session->userdata("logged_in_admin");
		$logged_in_guru = $this->session->userdata("logged_in_guru");
		$logged_in_siswa = $this->session->userdata("logged_in_siswa");
		if ($logged_in_admin == true) {
			redirect('Admin');
		} else if ($logged_in_guru == true) {
			redirect('Guru');
		} else if ($logged_in_siswa == true) {
			redirect('Siswa');
		} else {
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data['title'] = 'Login';
				$this->load->view("templates/auth_header", $data);
				$this->load->view("auth/v_login");
				$this->load->view("templates/auth_footer");
			} else {
				$this->_login();
			}
		}
	}

	public function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['username' => $username])->row_array();

		//usernya ada
		if ($user) {
			//jika user sudah aktivasi
			if ($user['is_active'] == 1) {
				//cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'username' => $user['username'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						$this->session->set_userdata('logged_in_admin', TRUE);
					} else if ($user['role_id'] == 2) {
						$this->session->set_userdata('logged_in_guru', TRUE);
					} else {
						$this->session->set_userdata('logged_in_siswa', TRUE);
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger">
                    Password salah!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">
                    Email belum diaktivasi!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger">
                    Email belum terdaftar!</div>');
			redirect('auth');
		}
		redirect('auth');
	}

	public function registration()
	{
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'Email sudah terdaftar!'
		]);
		$this->form_validation->set_rules('kontak', 'Kontak', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
			'matches' => 'Password tidak sama!',
			'min_length' => 'Password terlalu pendek!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		$data['title'] = 'Register';
		if ($this->form_validation->run() == false) {
			$this->load->view("templates/auth_header", $data);
			$this->load->view("auth/v_registration");
			$this->load->view("templates/auth_footer");
		} else {
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'username' => htmlspecialchars($this->input->post('username')),
				'email' => htmlspecialchars($this->input->post('email')),
				'kontak' => htmlspecialchars($this->input->post('kontak')),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 3,
				'is_active' => 1,
				'date_created' => time()
			];
			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success">
				Akun berhasil dibuat.</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in_admin');
		$this->session->unset_userdata('logged_in_guru');
		$this->session->unset_userdata('logged_in_siswa');
		$this->session->set_flashdata('message', '<div class="alert alert-success">
			Berhasil Logout!</div>');
		redirect('auth');
	}

	public function blocked()
	{
		$this->load->view("error/v_403");
	}
}
