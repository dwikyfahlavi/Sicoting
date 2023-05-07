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

	public function chat()
	{
		$data['title'] = 'Room Chat';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['pesan'] = $this->siswa->getPesan();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('siswa/chat', $data);
		$this->load->view('templates/footer');
	}

	public function chat_guru_response()
	{
		$data = [
			'isi_pesan' => $this->input->post('isi_pesan'),
			'tanggal' => date("Y-m-d H:i:s"),
			'id_user' => $this->input->post('id_user'),
		];
		$this->siswa->addPesan($data);

		redirect('siswa/chat');
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
		$data['title'] = 'Daftar Mata Pelajaran';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['materi'] = $this->siswa->getMateri();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('siswa/materi', $data);
		$this->load->view('templates/footer');
	}

	public function nilai()
	{
		$data['title'] = 'Daftar Materi';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['materi'] = $this->siswa->getMateri();
		$materi = $this->siswa->getMateri();
		foreach ($materi as $key) {
			$jml = $this->siswa->getlatihancount($key['id_materi']);
			$jml1[] = $jml;
		}
		$data['jumlah'] = $jml1;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('siswa/nilai_materi', $data);
		$this->load->view('templates/footer');
	}

	public function nilai_detail($id_materi)
	{
		$data['title'] = 'Daftar Sub Materi';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['submateri'] = $this->siswa->getMateriByID($id_materi);
		$data['nilai'] = $this->siswa->getNilai($user['id_user'], $id_materi);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('siswa/nilai_submateri', $data);
		$this->load->view('templates/footer');
	}

	public function list_latihan($id_sub_materi)
	{
		$data['title'] = 'latihan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$datasubmateri = $this->siswa->getSubMateriByID1($id_sub_materi);
		$data['latihan'] = $this->siswa->getLatihanByIDMateri1($id_sub_materi);
		$data['subMateri'] = $this->siswa->getSubMateriByID1($id_sub_materi);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('siswa/list_latihan', $data);
		$this->load->view('templates/footer');
	}

	public function nilai_latihan($id_submateri, $id_user)
	{
		$data['title'] = 'hasil';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['hasil'] = $this->siswa->getHasilByIdSubmateriUser1($id_submateri, $id_user);
		$data['materi'] = $this->siswa->getSubMateriByID1($id_submateri);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('siswa/hasilSiswaLatihan', $data);
		$this->load->view('templates/footer');
	}

	public function subMateri($id_materi)
	{
		$data['title'] = 'Daftar Materi';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['submateri'] = $this->siswa->getSubMateri($id_materi);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('siswa/subMateri', $data);
		$this->load->view('templates/footer');
	}

	public function getSubMateriById()
	{
		$id_submateri = $this->input->get('id');
		$get_subMateri = $this->siswa->getSubMateriById($id_submateri);
		echo json_encode($get_subMateri);
		exit();
	}

	public function getApersepsiByIdMateri()
	{
		$id_subMateri = $this->input->get('id');
		$get_subMateri = $this->siswa->getApersepsiByIdSubMateri($id_subMateri);
		echo json_encode($get_subMateri);
		exit();
	}

	public function komenApersepsi($id_subMateri)
	{
		$data['title'] = 'Komentar Apersepsi';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['apersepsi'] = $this->siswa->getApersepsiByIdSubMateri($id_subMateri);
		$data['komen'] = $this->siswa->getKomenApersepsiByIdUser($data['user']['id_user'], $data['apersepsi']->id_apersepsi);
		$data['id_submateri'] = $id_subMateri;
		$data['submateri'] = $this->siswa->getSubMateriID($id_subMateri);


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		if ($data['komen']  == null) {
			$this->load->view('siswa/komentarApersepsi', $data);
		} else {
			$this->load->view('siswa/media', $data);
		}

		$this->load->view('templates/footer');
	}

	public function komenApersepsiRespon()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$idUser = $this->input->post('id_user');
		$idApersepsi = $this->input->post('id_apersepsi');
		$data = [
			'id_user' => $idUser,
			'id_apersepsi' => $idApersepsi,
			'nis' => $data['user']['nis'],
			'nama' => $data['user']['nama'],
			'komentar' => $this->input->post('komenAper'),
		];
		$this->siswa->addKomenApersepsi($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success">
                Berhasil Menambahkan Komentar Apersepsi!</div>');
		redirect('siswa/media/' . $this->input->post('id_submateri'));
	}

	public function media($id_submateri)
	{
		$data['title'] = 'Media';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['id_submateri'] = $id_submateri;
		$data['media'] = $this->siswa->getMediaById($id_submateri);
		$data['submateri'] = $this->siswa->getSubMateriID($id_submateri);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('siswa/media', $data);
		$this->load->view('templates/footer');
	}

	public function detail_media($id_submateri, $jenis_media)
	{
		$data = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row();
		$data7 = $this->siswa->getMediaPilih($id_submateri, $jenis_media);
		$data8 = $this->siswa->getMediaPilihCount($id_submateri, $jenis_media);
		$data7 = $this->siswa->getMediaPilih($id_submateri, $jenis_media);
		$data8 = $this->siswa->getMediaPilihCount($id_submateri, $jenis_media);
		if ($data8 == 0) {
			echo "media tidak tersedia!!!.";
		} else {
			// $cek_status = $this->siswa->getStatusBelajar($id_submateri, $data->id_user);
			// if ($cek_status == 0) {
			// 	$arg2 = array('status_belajar' => 1, 'id_materi' => $id_submateri, 'id_user' => $data->id_user);
			// 	$this->siswa->insertStatusBelajar($arg2);
			// }
			// $cek_status = $this->siswa->getStatusBelajar($id_submateri, $data->id_user);
			// if ($cek_status == 0) {
			// 	$arg2 = array('status_belajar' => 1, 'id_materi' => $id_submateri, 'id_user' => $data->id_user);
			// 	$this->siswa->insertStatusBelajar($arg2);
			// }
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

	public function latihan($id_sub_materi)
	{
		$data['title'] = 'Latihan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['latihan'] = $this->siswa->getLatihanByIDMateri($id_sub_materi);
		$data['materi'] = $this->siswa->getSubMateriID($id_sub_materi);
		$data['hasil'] = $this->siswa->getHasilByIdSubmateriUser($id_sub_materi, $data['user']['id_user']);
		$data['idsubmateri'] = $id_sub_materi;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('siswa/latihan', $data);
		$this->load->view('templates/footer');
	}

	public function latihanSiswa($id_latihan, $id_sub_materi)
    {
        $data['title'] = 'Latihan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['dekomposisi'] = $this->siswa->getSubLatihanByIdJenisSoal("Dekomposisi");
        $data['abstraksi'] = $this->siswa->getSubLatihanByIdJenisSoal("Abstraksi");
        $data['pengenalanPola'] = $this->siswa->getSubLatihanByIdJenisSoal("Pengenalan Pola");
        $data['algoritma'] = $this->siswa->getSubLatihanByIdJenisSoal("Algoritma");
        $data['latihan'] = $this->siswa->getLatihanByIDLatihan($id_latihan);
        $data['idsubmateri'] = $id_sub_materi;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/latihanSiswa', $data);
        $this->load->view('templates/footer');
    }

	public function latihanTestRespon()
	{
		$idUser = $this->input->post('id_user');
		$idSubmateri = $this->input->post('id_submateri');
		$id_latihan = $this->input->post('id_latihan');
		$dekomposisi = $this->siswa->getSubLatihanByIdJenisSoal("Dekomposisi");
		$abstraksi = $this->siswa->getSubLatihanByIdJenisSoal("Abstraksi");
		$pengenalan_pola = $this->siswa->getSubLatihanByIdJenisSoal("Pengenalan Pola");
		$algoritma = $this->siswa->getSubLatihanByIdJenisSoal("Algoritma");
		$list_jawaban = "";
		$list_alasan = "";
		$index = 1;
		for($i=0;$i<sizeof($dekomposisi);$i++){
			$text = 'opsiDekom' . "{$i}";
			$textAlasan = 'alasanDekom' . "{$i}";
			$list_alasan =  $list_alasan . "{$index}".";Dekomposisi;".$this->input->post($textAlasan).",";
			$list_jawaban =  $list_jawaban . "{$index}".";Dekomposisi;".$this->input->post($text).",";
			$index ++;
        }    
		for($i=0;$i<sizeof($abstraksi);$i++){
			$text = 'opsiabstraksi' . "{$i}";
			$textAlasan = 'alasanAbstraksi' . "{$i}";
			$list_alasan =  $list_alasan . "{$index}".";Abstraksi;".$this->input->post($textAlasan).",";
			$list_jawaban = $list_jawaban . "{$index}".";Abstraksi;".$this->input->post($text).",";
			$index ++;
        }    
		for($i=0;$i<sizeof($pengenalan_pola);$i++){
			$text = 'opsiPola' . "{$i}";
			$textAlasan = 'alasanPola' . "{$i}";
			$list_alasan =  $list_alasan . "{$index}".";Pengenalan Pola;".$this->input->post($textAlasan).",";
			$list_jawaban = $list_jawaban . "{$index}".";Pengenalan Pola;".$this->input->post($text).",";
			$index ++;
        }    
		for($i=0;$i<sizeof($algoritma);$i++){
			$text = 'opsiAlgo' . "{$i}";
			$textAlasan = 'alasanAlgo' . "{$i}";
			$list_alasan =  $list_alasan . "{$index}".";Algoritma;".$this->input->post($textAlasan);
			$list_jawaban = $list_jawaban . "{$index}".";Algoritma;".$this->input->post($text);
			$index ++;

        }    

		$data = [
			'list_soal' => "1;2;3;4;5",
			'list_jawaban' => $list_jawaban,
			'list_alasan' => $list_alasan,
			'status' => 1,
			'id_materi' => $idmateri,
			'id_submateri' => $idSubmateri,
			'id_user' => $idUser,
			'id_latihan' => $id_latihan
		];
		$this->siswa->insertHasilLatihan($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success">
                Profile berhasil dirubah!</div>');
		redirect('siswa/test/' . $idSubmateri);
	}

	public function test($id_sub_materi)
	{
		$data['title'] = 'latihan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['hasil'] = $this->siswa->getHasilByIdSubmateriUser($id_sub_materi, $data['user']['id_user']);
		$data['latihan'] = $this->siswa->getLatihanByIDMateri($id_sub_materi);
		$data['idsubmateri'] = $id_sub_materi;
		$data['subMateri'] = $this->siswa->getSubMateriByID($id_sub_materi);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('siswa/latihan', $data);
		$this->load->view('templates/footer');
	}

	public function download_media($file)
	{
		force_download('/skripsi/assets/materi/media/' . $file, NULL);
	}

	public function tes()
	{
		$data['title'] = 'Daftar Tes';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['materi'] = $this->siswa->getMateri();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('siswa/tes', $data);
		$this->load->view('templates/footer');
	}

	public function tes_detail($id_materi)
	{
		$data['title'] = 'Daftar Tes';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['tes'] = $this->siswa->getTesByID($id_materi);
		$data['materi'] = $this->siswa->getMateriByID($id_materi);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('siswa/tes_detail', $data);
		$this->load->view('templates/footer');
	}
	public function LihatJawabanSiswa($id_submateri, $id_user)
	{
		$list_jawaban = $this->siswa->getJawabanUser($id_submateri, $id_user);
		$list_alasan = $this->siswa->getAlasanUser($id_submateri, $id_user);
		$pc_jawaban = explode(",", $list_jawaban);
		$pc_alasan = explode(",", $list_alasan);
		foreach ($pc_jawaban as $jwb) {
			$pc_dt 		= explode(";", $jwb);
			$id_soal 	= $pc_dt[0];
			$jenis_sub_soal 	= $pc_dt[1];
			$jawaban 		= $pc_dt[2];
			$jawaban_anda[] = $jawaban;
			$jenis_soal[] = $jenis_sub_soal;
		}
		foreach ($pc_alasan as $alsn) {
			$pc_dt 		= explode(";", $alsn);
			$id_soal 	= $pc_dt[0];
			$jenis_sub_soal 	= $pc_dt[1];
			$alasan 		= $pc_dt[2];
			$alasan_anda[] = $alasan;
		}
		$data['jns1'] = $jenis_soal;
		$data['jwbn1'] = $jawaban_anda;
		$data['alsn1'] = $alasan_anda;
		$data['title'] = 'latihan';
		$data['akun'] = $this->siswa->getDataAkun($id_user);
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['latihan'] = $this->siswa->getsoal($id_submateri);
		$data['latihan1'] = $this->siswa->getsoalRow($id_submateri);
		$data['subMateri'] = $this->siswa->getSubMateriByID($id_submateri);
		$data['breadcrump'] = $this->siswa->getSubMateriID($id_submateri);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('siswa/jawaban_siswa', $data);
		$this->load->view('templates/footer');
	}
}
