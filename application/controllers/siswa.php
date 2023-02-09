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
		$this->load->helper('download');
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

	public function media($id_materi)
	{
		$data['title'] = 'Media';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['id_materi'] = $id_materi;

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('siswa/media', $data);
		$this->load->view('templates/footer');
	}

	public function detail_media($id_materi, $jenis_media)
	{
		$data = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row();
		$data7 = $this->siswa->getMediaPilih($id_materi, $jenis_media);
		$data8 = $this->siswa->getMediaPilihCount($id_materi, $jenis_media);
		if ($data8 == 0) {
			echo "media tidak tersedia!!!.";
		} else {
			$cek_status = $this->siswa->GetStatusBelajar($id_materi, $data->id_user);
			if ($cek_status == 0) {
				$arg2 = array('status_belajar' => 1, 'id_materi' => $id_materi, 'id_user' => $data->id_user);
				$this->siswa->insertStatusBelajar($arg2);
			}
			echo "Selamat Belajar!!!";
			echo "<br>";
			echo "<br>";
			if ($data7->jenis_media == "pdf") {
				echo "<embed width='100%' height='450' src='/skripsi/assets/materi/media/$data7->file_media' type='application/pdf'></embed>";
				echo anchor("siswa/download_media/$data7->file_media", 'Klik Disini Untuk Download File');
			} elseif ($data7->jenis_media == "ppt") {
				echo "<embed width='100%' height='450' src='/skripsi/assets/materi/media/$data7->file_media' type='application/pdf'></embed>";
			} elseif ($data7->jenis_media == "audio") {
				echo "<audio controls>";
				echo "<source src='/skripsi/assets/materi/media/$data7->file_media' type='audio/mpeg'>";
				echo "</audio>";
			} elseif ($data7->jenis_media == "video") {
				echo "<video width='100%' height='240' controls>";
				echo "<source src='/skripsi/assets/materi/media/$data7->file_media' type='video/mp4'>";
				echo "</video>";
			}
		}
	}

	public function download_media($file)
	{
		force_download('/skripsi/assets/materi/media/' . $file, NULL);
	}
}
