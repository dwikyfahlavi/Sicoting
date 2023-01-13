<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("logged_in_guru")) {
            //jika tak ada, balik ke controler login
            redirect('auth/blocked');
            fghjkl;
        }
        $this->load->model('m_guru', 'guru');
    }

    public function index()
    {
        $data['title'] = 'Beranda';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/index', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/profile', $data);
        $this->load->view('templates/footer');
    }

    public function editProfile($id_user)
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['editProfile'] = $this->guru->getDataAkun($id_user);
        // $data['akun'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/editprofile', $data);
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
            'nip' => $this->input->post('nip'),
            'email' => $this->input->post('email'),
            'kontak' => $this->input->post('kontak'),
            'mapel' => $this->input->post('mapel'),
            'image' => $data1['upload_image']['file_name'],
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => $this->input->post('role_id'),
            'is_active' => 1,
            'date_created' => time()
        ];
        $this->guru->editProfile($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">
                Profile berhasil dirubah!</div>');
        redirect('guru/profile');
    }

    public function pembelajaran()
    {
        $data['title'] = 'Pembelajaran';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['perulangan'] = $this->guru->getDataKD();

        $this->form_validation->set_rules('kd', 'KD', 'required');
        $this->form_validation->set_rules('kompetensidasar', 'kompetensidasar', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/perulangan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kd' => $this->input->post('kd'),
                'kompetensidasar' => $this->input->post('kompetensidasar')
            ];
            $this->db->insert('kd', $data);
            $kd = $this->guru->getKDLast();
            $kd_id = $kd->id_kd;
            $ip = $this->input->post('ip');
            $indikatorpencapaian = $this->input->post('indikatorpencapaian');
            foreach ($ip as $indikator) :
                $ip1[] = $indikator;
            endforeach;
            $nomor = 0;
            foreach ($indikatorpencapaian as $indikator1) :
                $data1 = array("ip" => $ip1[$nomor], "indikatorpencapaian" => $indikator1, "kd_id" => $kd_id);
                $this->db->insert('ip', $data1);
                $nomor++;
            endforeach;
            $this->session->set_flashdata('message', '<div class="alert alert-success">
                    Kompetensi Dasar berhasil ditambahkan!</div>');
            redirect('guru/pembelajaran');
        }
    }

    public function updatePembelajaran($id_kd)
    {
        $data['title'] = 'Update Akun Siswa';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['updatePembelajaran'] = $this->guru->getKDByID($id_kd);
        $data['updatePembelajaran1'] = $this->guru->getIPByID($id_kd);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/pembelajaranupdate', $data);
        $this->load->view('templates/footer');
    }

    public function updatePembelajaranRespon()
    {
        $id = $this->input->post('id_kd');
        $data = [
            'kd' => $this->input->post('kd'),
            'kompetensidasar' => $this->input->post('kompetensidasar')
        ];
        $this->guru->updatePembelajaran($id, $data);
        $ip = $this->input->post('ip');
        $id_ip = $this->input->post('id_ip');
        $indikatorpencapaian = $this->input->post('indikatorpencapaian');
        foreach ($ip as $indikator) :
            $ip1[] = $indikator;
        endforeach;
        foreach ($id_ip as $indikatorip) :
            $id_ip1[] = $indikatorip;
        endforeach;
        $nomor = 0;
        foreach ($indikatorpencapaian as $indikator1) :
            $data1 = array("ip" => $ip1[$nomor], "indikatorpencapaian" => $indikator1);
            $this->guru->updatePembelajaran1($id_ip1[$nomor], $data1);
            $nomor++;
        endforeach;
        $this->session->set_flashdata('message', '<div class="alert alert-success">
                    Kompetensi Dasar berhasil dirubah!</div>');
        redirect('guru/pembelajaran');
    }

    public function deletePembelajaran($id_kd)
    {
        $this->guru->deletePembelajaran($id_kd);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">
                KD berhasil dihapus!</div>');
        redirect('guru/pembelajaran');
    }

    public function materi($id_kd)
    {
        $data['title'] = 'Materi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['materi'] = $this->guru->getMateri();
        $data['updatePembelajaran'] = $this->guru->getKDByID($id_kd);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/materi', $data);
        $this->load->view('templates/footer');
    }

    public function materiApersepsi()
    {
        $phoneData = $this->input->post('phoneData');

        if (isset($phoneData) and !empty($phoneData)) {
            $data = $this->guru->getMateriByID($phoneData);
            $output = '';
            foreach ($data as $row) {
                $output .= '
                     
                <h4 class="text-center">Detail Apersepsi</h4><br>
                <center><img style="width:150px; height: 160px;" src="' . base_url() . 'assets/images/apersepsi/' . $row["file_apersepsi"] . '"></center><br><br>
                <input type="text" class="form-control" placeholder="Tujuan Pembelajaran">' . $row["apersepsi"] . '</input>';
            }
            echo $output;
        } else {
            echo '<center><ul class="list-group"><li class="list-group-item">' . 'Select a Phone' . '</li></ul></center>';
        }
    }


    public function materiRespon()
    {
        $data['title'] = 'Materi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['materi'] = $this->guru->getMateri();
        $data['updatePembelajaran'] = $this->guru->getKDByID($this->input->post('id_kd'));

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('topik', 'Topik', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
        $this->form_validation->set_rules('apersepsi', 'Apersepsi', 'required');
        $this->form_validation->set_rules('file_apersepsi', 'File_apersepsi');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/materi', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']          = './assets/materi/apersepsi';
            $config['allowed_types']        = 'docs|docx|pdf|jpg|png|jpeg|svg';
            $config['max_size']             = 5000;

            $this->load->library('upload', $config);

            $this->upload->do_upload('file_apersepsi');
            $data1 = array('upload_file_apersepsi' => $this->upload->data());
            $data = [
                'judul' => htmlspecialchars($this->input->post('judul')),
                'topik' => htmlspecialchars($this->input->post('topik')),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi')),
                'tujuan' => htmlspecialchars($this->input->post('tujuan')),
                'apersepsi' => htmlspecialchars($this->input->post('apersepsi')),
                'file_apersepsi' => $data1['upload_file_apersepsi']['file_name'],
            ];
            $this->db->insert('materi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">
                    Materi berhasil ditambahkan!</div>');
            redirect('guru/materi/' . $this->input->post('id_kd'));
        }
    }

    public function updateMateri($id_kd, $id_materi)
    {
        $data['title'] = 'Update Materi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['updateMateri'] = $this->guru->getMateriByID($id_materi);
        $data['updatePembelajaran'] = $this->guru->getKDByID($id_kd);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/materiupdate', $data);
        $this->load->view('templates/footer');
    }

    public function updateMateriRespon()
    {
        $config['upload_path']          = './assets/materi/apersepsi';
        $config['allowed_types']        = 'docs|docx|pdf|jpg|png|jpeg|svg';
        $config['max_size']             = 5000;

        $this->load->library('upload', $config);

        $this->upload->do_upload('file_apersepsi');
        $data1 = array('upload_file_apersepsi' => $this->upload->data());
        $id = $this->input->post('id_materi');
        $data = [
            'judul' => $this->input->post('judul'),
            'topik' => $this->input->post('topik'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tujuan' => $this->input->post('tujuan'),
            'apersepsi' => $this->input->post('apersepsi'),
            'file_apersepsi' => $data1['upload_file_apersepsi']['file_name'],
        ];
        $this->guru->updateMateri($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">
                Materi berhasil dirubah!</div>');
        redirect('guru/materi/' . $this->input->post('id_kd'));
    }

    public function deleteMateri($id_kd, $id_materi)
    {
        $this->guru->deleteMateri($id_materi);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">
                Materi berhasil dihapus!</div>');
        redirect('guru/materi/' . $id_kd);
    }

    public function apersepsi($id_materi)
    {
        $data['title'] = 'Daftar Apersepsi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['apersepsi'] = $this->guru->getApersepsi();
        $data['updateMateri'] = $this->guru->getMateriByID($id_materi);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/apersepsi', $data);
        $this->load->view('templates/footer');
    }

    public function apersepsiRespon()
    {
        $data['title'] = 'Daftar Apersepsi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['apersepsi'] = $this->guru->getApersepsi();
        $data['updateMateri'] = $this->guru->getMateriByID($this->input->post('id_materi'));

        $this->form_validation->set_rules('pertanyaan_apersepsi', 'Pertanyaan_Apersepsi', 'required');
        $this->form_validation->set_rules('file_apersepsi', 'File_apersepsi');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/apersepsi', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']          = './assets/materi/apersepsi';
            $config['allowed_types']        = 'docs|docx|pdf|jpg|png|jpeg|svg';
            $config['max_size']             = 5000;

            $this->load->library('upload', $config);

            $this->upload->do_upload('file_apersepsi');
            $data1 = array('upload_file_apersepsi' => $this->upload->data());
            $data = [
                'pertanyaan_apersepsi' => htmlspecialchars($this->input->post('pertanyaan_apersepsi')),
                'file_apersepsi' => $data1['upload_file_apersepsi']['file_name'],
                'id_materi' => ($this->input->post('id_materi'))
            ];
            $this->db->insert('apersepsi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">
                    Apersepsi berhasil ditambahkan!</div>');
            redirect('guru/apersepsi/' . $this->input->post('id_materi'));
        }
    }

    public function updateApersepsi($id_apersepsi, $id_materi)
    {
        $data['title'] = 'Update Apersepsi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['updateApersepsi'] = $this->guru->getApersepsiByID($id_apersepsi);
        $data['materi'] = $id_materi;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/apersepsiupdate', $data);
        $this->load->view('templates/footer');
    }

    public function updateApersepsiRespon()
    {
        $config['upload_path']          = './assets/materi/apersepsi';
        $config['allowed_types']        = 'docs|docx|pdf|jpg|png|jpeg|svg';
        $config['max_size']             = 5000;

        $this->load->library('upload', $config);

        $this->upload->do_upload('file_apersepsi');
        $data1 = array('upload_file_apersepsi' => $this->upload->data());
        $id = $this->input->post('id_apersepsi');
        $id_materi = $this->input->post('id_materi');
        $data = [
            'pertanyaan_apersepsi' => htmlspecialchars($this->input->post('pertanyaan_apersepsi')),
            'file_apersepsi' => $data1['upload_file_apersepsi']['file_name'],
        ];
        $this->guru->updateApersepsi($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">
                Pertanyaan Apersepsi berhasil dirubah!</div>');
        redirect('guru/apersepsi/' . $id_materi);
    }

    public function deleteApersepsi($id_apersepsi, $id_materi)
    {
        $this->guru->deleteApersepsi($id_apersepsi);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">
                Pertanyaan Apersepsi berhasil dihapus!</div>');
        redirect('guru/apersepsi/' . $id_materi);
    }

    public function media($id_materi)
    {
        $data['title'] = 'Media';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['media'] = $this->guru->getMedia();
        $data['materi'] = $this->guru->getMateriByID($id_materi);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/media', $data);
        $this->load->view('templates/footer');
    }

    public function tambahMedia($id_materi)
    {
        $data['title'] = 'Tambah Media';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['updateMateri'] = $this->guru->getMateriByID($id_materi);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/mediatambah', $data);
        $this->load->view('templates/footer');
    }

    public function deleteMedia($id_media, $id_materi)
    {
        $this->guru->deleteMedia($id_media);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">
                Media berhasil dihapus!</div>');
        redirect('guru/media/' . $id_materi);
    }

    public function updateMedia($id_media, $id_materi)
    {
        $data['title'] = 'Update Media';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['updateMedia'] = $this->guru->getMediaByID($id_media);
        $data['materi'] = $id_materi;


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/mediaupdate', $data);
        $this->load->view('templates/footer');
    }

    public function updateMediaRespon()
    {
        $config['upload_path']          = './assets/materi/media';
        $config['allowed_types']        = 'docs|docx|pdf|jpg|png|jpeg|svg';
        $config['max_size']             = 5000;

        $this->load->library('upload', $config);

        $this->upload->do_upload('file_media');
        $data1 = array('upload_file_media' => $this->upload->data());
        $id = $this->input->post('id_media');
        $id_materi = $this->input->post('id_materi');
        $data = ['file_media' => $data1['upload_file_media']['file_name']];
        $this->guru->updateMedia($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">
                Media berhasil dirubah!</div>');
        redirect('guru/media/' . $id_materi);
    }

    public function tambahMediaRespon()
    {
        $config['upload_path']          = './assets/materi/media';
        $config['allowed_types']        = 'docs|docx|pdf|jpg|png|jpeg|svg';
        $config['max_size']             = 5000;

        $this->load->library('upload', $config);

        $this->upload->do_upload('file_media');
        $data1 = array('upload_file_media' => $this->upload->data());
        $data = [
            'jenis_media' => $this->input->post('jenis_media'),
            'file_media' => $data1['upload_file_media']['file_name'],
            'id_materi' => $this->input->post('id_materi'),
        ];
        $this->guru->addMedia($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">
                Media berhasil ditambahkan!</div>');
        redirect('guru/media/' . $this->input->post('id_materi'));
    }

    public function tes($id_materi)
    {
        $data['title'] = 'Tes';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['tes'] = $this->guru->getTes();
        $data['materi'] = $this->guru->getMateriByID($id_materi);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/tes', $data);
        $this->load->view('templates/footer');
    }

    public function tesRespon()
    {
        $data['title'] = 'tes';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama_tes', 'Nama', 'required');
        $this->form_validation->set_rules('jenis_tes', 'Jenis', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/tes', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_tes' => htmlspecialchars($this->input->post('nama_tes')),
                'jenis_tes' => htmlspecialchars($this->input->post('jenis_tes')),
                'url' => htmlspecialchars($this->input->post('url')),
                'id_materi' => htmlspecialchars($this->input->post('id_materi')),
            ];
            $this->db->insert('tes', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">
                    Tes berhasil ditambahkan!</div>');
            redirect('guru/tes/' . $this->input->post('id_materi'));
        }
    }

    public function updateTes($id_tes, $id_materi)
    {
        $data['title'] = 'Update Tes';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['updateMateri'] = $this->guru->getMateriByID($id_materi);
        $data['updateTes'] = $this->guru->getTesByID($id_tes);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/tesupdate', $data);
        $this->load->view('templates/footer');
    }

    public function updateTesRespon()
    {
        $id = $this->input->post('id_tes');
        $data = [
            'nama_tes' => htmlspecialchars($this->input->post('nama_tes')),
            'jenis_tes' => htmlspecialchars($this->input->post('jenis_tes')),
            'url' => htmlspecialchars($this->input->post('url')),
            'id_materi' => htmlspecialchars($this->input->post('id_materi')),
        ];
        $this->guru->updateTes($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">
                Tes berhasil dirubah!</div>');
        redirect('guru/tes/' . $this->input->post('id_materi'));
    }


    public function deleteTes($id_tes, $id_materi)
    {
        $this->guru->deleteTes($id_tes);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">
                Tes berhasil dihapus!</div>');
        redirect('guru/tes/' . $id_materi);
    }

    public function latihan($id_materi)
    {
        $data['title'] = 'latihan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['latihan'] = $this->guru->getLatihan();
        $data['materi'] = $this->guru->getMateriByID($id_materi);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/latihan', $data);
        $this->load->view('templates/footer');
    }

    public function getSubSoal()
    {
        $id = $this->input->get('id');
        $get_latihan = $this->guru->getSubSoal($id);
        echo json_encode($get_latihan);
        exit();
    }


    public function akunsiswa()
    {
        $data['title'] = 'Manajemen Akun Siswa';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['akun'] = $this->guru->getUserSiswa();


        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('kontak', 'kontak', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/akunsiswa', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username')),
                'email' => htmlspecialchars($this->input->post('email')),
                'kontak' => htmlspecialchars($this->input->post('kontak')),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 3,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">
                    Akun berhasil ditambahkan!</div>');
            redirect('guru/akunsiswa');
        }
    }

    public function updateAkun($id_user)
    {
        $data['title'] = 'Update Akun Siswa';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['updateAkun'] = $this->guru->getUserSiswaByID($id_user);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/akunsiswaupdate', $data);
        $this->load->view('templates/footer');
    }

    public function updateAkunRespon()
    {
        $id = $this->input->post('id_user');
        $data = [
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'kontak' => $this->input->post('kontak'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => 3,
            'is_active' => 1,
            'date_created' => time()
        ];
        $this->guru->updateAkun($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">
                Akun berhasil dirubah!</div>');
        redirect('guru/akunsiswa');
    }

    public function deleteAkun($id_user)
    {
        $this->guru->deleteAkun($id_user);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">
                Akun berhasil dihapus!</div>');
        redirect('guru/akunsiswa');
    }

    public function profileAkun($id_user)
    {
        $data['title'] = 'Profile Siswa';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user1'] = $this->db->get_where('user', ['id_user' => $id_user])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/akunsiswaprofile', $data);
        $this->load->view('templates/footer');
    }
}
