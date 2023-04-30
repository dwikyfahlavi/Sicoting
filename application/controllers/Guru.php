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
        }
        $this->load->model('m_guru', 'guru');
    }

    public function index()
    {
        $data['title'] = 'Beranda';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['siswa'] = $this->guru->getSiswaCount();
        $data['materi'] = $this->guru->getMateriCount();
        $data['submateri'] = $this->guru->getSubMateriCount();

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

    public function chat()
    {
        $data['title'] = 'Room Chat';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pesan'] = $this->guru->getPesan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/chat', $data);
        $this->load->view('templates/footer');
    }

    public function chat_siswa_response()
    {
        $data = [
            'isi_pesan' => $this->input->post('isi_pesan'),
            'tanggal' => date("Y-m-d H:i:s"),
            'id_user' => $this->input->post('id_user'),
        ];
        $this->guru->addPesan($data);

        redirect('guru/chat');
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
        $data['materi'] = $this->guru->getMateri();

        $this->form_validation->set_rules('materi', 'Materi', 'required');
        $this->form_validation->set_rules('cp_pembelajaran', 'cp_pembelajaran', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/pembelajaran', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'materi' => $this->input->post('materi'),
                'cp_pembelajaran' => $this->input->post('cp_pembelajaran')
            ];
            $this->guru->addMateri($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">
                    Materi berhasil ditambahkan!</div>');
            redirect('guru/pembelajaran');
        }
    }

    public function updatePembelajaran($id_materi)
    {
        $data['title'] = 'Update Materi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['updateMateri'] = $this->guru->getMateriByID($id_materi);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/pembelajaranupdate', $data);
        $this->load->view('templates/footer');
    }

    public function updatePembelajaranRespon()
    {
        $id_materi = $this->input->post('id_materi');
        $data = [
            'materi' => $this->input->post('materi'),
            'cp_pembelajaran' => $this->input->post('cp_pembelajaran')
        ];
        $this->guru->updateMateri($id_materi, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">
                    Materi berhasil di ubah!</div>');
        redirect('guru/pembelajaran');
    }

    public function deletePembelajaran($id_materi)
    {
        $this->guru->deleteMateri($id_materi);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">
                Materi berhasil dihapus!</div>');
        redirect('guru/pembelajaran');
    }

    public function submateri($id_materi)
    {
        $data['title'] = 'Sub Materi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['materi'] = $this->guru->getMateriByID($id_materi);
        $data['submateri'] = $this->guru->getSubMateri($id_materi);

        $this->form_validation->set_rules('sub_materi', 'sub_materi', 'required');
        $this->form_validation->set_rules('kompetensidasar', 'Kompetensidasar', 'required');
        $this->form_validation->set_rules('ipk', 'IPK', 'required');
        $this->form_validation->set_rules('tujuan', 'tujuan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/submateri', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'sub_materi' => $this->input->post('sub_materi'),
                'kompetensidasar' => $this->input->post('kompetensidasar'),
                'ipk' => $this->input->post('ipk'),
                'tujuan' => $this->input->post('tujuan'),
                'id_materi' => $this->input->post('id_materi')
            ];
            $this->guru->addSubMateri($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">
                    Sub Materi berhasil ditambahkan!</div>');
            redirect('guru/submateri/' . $this->input->post('id_materi'));
        }
    }

    public function updateSubMateri($id_materi, $id_submateri)
    {
        $data['title'] = 'Update Sub Materi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['updateSubMateri'] = $this->guru->getSubMateriByID($id_submateri);
        $data['materi'] = $this->guru->getMateriByID($id_materi);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/submateriupdate', $data);
        $this->load->view('templates/footer');
    }

    public function updateSubMateriRespon()
    {
        $id_submateri = $this->input->post('id_submateri');
        $data = [
            'sub_materi' => $this->input->post('sub_materi'),
            'kompetensidasar' => $this->input->post('kompetensidasar'),
            'ipk' => $this->input->post('ipk'),
            'tujuan' => $this->input->post('tujuan'),
        ];
        $this->guru->updateSubMateri($id_submateri, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">
                    Sub Materi berhasil di ubah!</div>');
        redirect('guru/submateri/' . $this->input->post('id_materi'));
    }

    public function deleteSubMateri($id_materi, $id_submateri)
    {
        $this->guru->deleteSubMateri($id_submateri);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">
                Sub Materi berhasil dihapus!</div>');
        redirect('guru/submateri/' . $id_materi);
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

    // public function materiRespon()
    // {
    //     $data['title'] = 'Materi';
    //     $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    //     $data['materi'] = $this->guru->getMateri();
    //     $data['updatePembelajaran'] = $this->guru->getKDByID($this->input->post('id_kd'));

    //     $this->form_validation->set_rules('judul', 'Judul', 'required');
    //     $this->form_validation->set_rules('topik', 'Topik', 'required');
    //     $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
    //     $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
    //     $this->form_validation->set_rules('apersepsi', 'Apersepsi', 'required');
    //     $this->form_validation->set_rules('file_apersepsi', 'File_apersepsi');

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('guru/materi', $data);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $config['upload_path']          = './assets/materi/apersepsi';
    //         $config['allowed_types']        = 'docs|docx|pdf|jpg|png|jpeg|svg';
    //         $config['max_size']             = 5000;

    //         $this->load->library('upload', $config);

    //         $this->upload->do_upload('file_apersepsi');
    //         $data1 = array('upload_file_apersepsi' => $this->upload->data());
    //         $data = [
    //             'judul' => htmlspecialchars($this->input->post('judul')),
    //             'topik' => htmlspecialchars($this->input->post('topik')),
    //             'deskripsi' => htmlspecialchars($this->input->post('deskripsi')),
    //             'tujuan' => htmlspecialchars($this->input->post('tujuan')),
    //             'apersepsi' => htmlspecialchars($this->input->post('apersepsi')),
    //             'file_apersepsi' => $data1['upload_file_apersepsi']['file_name'],
    //         ];
    //         $this->db->insert('materi', $data);
    //         $this->session->set_flashdata('message', '<div class="alert alert-success">
    //                 Materi berhasil ditambahkan!</div>');
    //         redirect('guru/materi/' . $this->input->post('id_kd'));
    //     }
    // }

    // public function updateMateri($id_kd, $id_materi)
    // {
    //     $data['title'] = 'Update Materi';
    //     $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    //     $data['updateMateri'] = $this->guru->getMateriByID($id_materi);
    //     $data['updatePembelajaran'] = $this->guru->getKDByID($id_kd);

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('guru/materiupdate', $data);
    //     $this->load->view('templates/footer');
    // }

    // public function updateMateriRespon()
    // {
    //     $config['upload_path']          = './assets/materi/apersepsi';
    //     $config['allowed_types']        = 'docs|docx|pdf|jpg|png|jpeg|svg';
    //     $config['max_size']             = 5000;

    //     $this->load->library('upload', $config);

    //     $this->upload->do_upload('file_apersepsi');
    //     $data1 = array('upload_file_apersepsi' => $this->upload->data());
    //     $id = $this->input->post('id_materi');
    //     $data = [
    //         'judul' => $this->input->post('judul'),
    //         'topik' => $this->input->post('topik'),
    //         'deskripsi' => $this->input->post('deskripsi'),
    //         'tujuan' => $this->input->post('tujuan'),
    //         'apersepsi' => $this->input->post('apersepsi'),
    //         'file_apersepsi' => $data1['upload_file_apersepsi']['file_name'],
    //     ];
    //     $this->guru->updateMateri($id, $data);
    //     $this->session->set_flashdata('message', '<div class="alert alert-success">
    //             Materi berhasil dirubah!</div>');
    //     redirect('guru/materi/' . $this->input->post('id_kd'));
    // }

    // public function deleteMateri($id_kd, $id_materi)
    // {
    //     $this->guru->deleteMateri($id_materi);
    //     $this->session->set_flashdata('message', '<div class="alert alert-danger">
    //             Materi berhasil dihapus!</div>');
    //     redirect('guru/materi/' . $id_kd);
    // }

    public function apersepsi($id_submateri)
    {
        $data['title'] = 'Daftar Apersepsi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['apersepsi'] = $this->guru->getApersepsiID($id_submateri);
        $data['submateri'] = $this->guru->getSubMateriByID($id_submateri);
        // $data['breadcrumb'] = $this->guru->getSubMateriID($id_submateri);

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
            $id_submateri = $this->input->post('id_submateri');
            $data = [
                'pertanyaan_apersepsi' => htmlspecialchars($this->input->post('pertanyaan_apersepsi')),
                'file_apersepsi' => $data1['upload_file_apersepsi']['file_name'],
                'id_submateri' => $id_submateri
            ];
            $this->guru->addApersepsi($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">
                    Apersepsi berhasil ditambahkan!</div>');
            redirect('guru/apersepsi/' . $id_submateri);
        }
    }

    public function updateApersepsi($id_apersepsi, $id_submateri)
    {
        $data['title'] = 'Update Apersepsi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['updateApersepsi'] = $this->guru->getApersepsiByID($id_apersepsi);
        $data['submateri'] = $this->guru->getSubMateriByID($id_submateri);

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
        $id_submateri = $this->input->post('id_submateri');
        $data = [
            'pertanyaan_apersepsi' => htmlspecialchars($this->input->post('pertanyaan_apersepsi')),
            'file_apersepsi' => $data1['upload_file_apersepsi']['file_name'],
        ];
        $this->guru->updateApersepsi($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">
                Pertanyaan Apersepsi berhasil dirubah!</div>');
        redirect('guru/apersepsi/' . $id_submateri);
    }

    public function deleteApersepsi($id_apersepsi, $id_submateri)
    {
        $this->guru->deleteApersepsi($id_apersepsi);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">
                Apersepsi berhasil dihapus!</div>');
        redirect('guru/apersepsi/' . $id_submateri);
    }

    public function detailApersepsi($id_apersepsi, $id_submateri)
    {
        $data['title'] = 'Komentar Siswa';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['komentar'] = $this->guru->getKomentarApersepsi($id_apersepsi);
        $data['apersepsi'] = $this->guru->getApersepsiByID($id_apersepsi);
        $data['submateri'] = $this->guru->getSubMateriByID($id_submateri);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/apersepsikomentar', $data);
        $this->load->view('templates/footer');
    }

    public function media($id_submateri)
    {
        $data['title'] = 'Media';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['media'] = $this->guru->getMediaByID($id_submateri);
        $data['submateri'] = $this->guru->getSubMateriByID($id_submateri);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/media', $data);
        $this->load->view('templates/footer');
    }

    public function tambahMedia($id_submateri)
    {
        $data['title'] = 'Tambah Media';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['submateri'] = $this->guru->getSubMateriByID($id_submateri);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/mediatambah', $data);
        $this->load->view('templates/footer');
    }

    public function deleteMedia($id_media, $id_submateri)
    {
        $this->guru->deleteMedia($id_media);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">
                Media berhasil dihapus!</div>');
        redirect('guru/media/' . $id_submateri);
    }

    public function updateMedia($id_media, $id_submateri)
    {
        $data['title'] = 'Update Media';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['updateMedia'] = $this->guru->UpdateMediaByID($id_media);
        $data['submateri'] = $this->guru->getSubMateriByID($id_submateri);


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
        $id_submateri = $this->input->post('id_submateri');
        $data = [
            'jenis_media' => $this->input->post('jenis_media'),
            'file_media' => $data1['upload_file_media']['file_name'],
            'id_submateri' => $id_submateri
        ];
        $this->guru->updateMedia($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">
                Media berhasil dirubah!</div>');
        redirect('guru/media/' . $id_submateri);
    }

    public function tambahMediaRespon()
    {
        $config['upload_path']          = './assets/materi/media';
        $config['allowed_types']        = 'docs|docx|pdf|jpg|png|jpeg|svg|mp4';
        $config['max_size']             = 0;

        $this->load->library('upload', $config);

        $this->upload->do_upload('file_media');
        $data1 = array('upload_file_media' => $this->upload->data());
        $data = [
            'jenis_media' => $this->input->post('jenis_media'),
            'file_media' => $data1['upload_file_media']['file_name'],
            'id_submateri' => $this->input->post('id_submateri'),
        ];
        $this->guru->addMedia($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">
                Media berhasil ditambahkan!</div>');
        redirect('guru/media/' . $this->input->post('id_submateri'));
    }

    public function tes($id_materi)
    {
        $data['title'] = 'Daftar Tes';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['tes'] = $this->guru->getTesByID($id_materi);
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
        // $data['tes'] = $this->guru->getTesByID($id_materi);

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
        $data['updateTes'] = $this->guru->updateTesByID($id_tes);

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

    public function deleteSoalLatihan($id_latihan, $id_materi)
    {
        $this->guru->deleteLatihan($id_latihan);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">
                Soal Latihan berhasil dihapus!</div>');
        redirect('guru/latihan/' . $id_materi);
    }

    public function deleteSubSoalLatihan($id_sub_latihan, $id_latihan, $id_materi)
    {
        $this->guru->deleteSubLatihan($id_sub_latihan);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">
                Soal Latihan berhasil dihapus!</div>');
        redirect('guru/soalCT/' . $id_latihan . '/' . $id_materi);
    }

    public function latihan($id_sub_materi)
    {
        $data['title'] = 'latihan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $datasubmateri = $this->guru->getSubMateriByID($id_sub_materi);
        $data['latihan'] = $this->guru->getLatihanByIDMateri($id_sub_materi);
        $data['subMateri'] = $this->guru->getSubMateriByID($id_sub_materi);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/latihan', $data);
        $this->load->view('templates/footer');
    }

    public function editLatihan($id_latihan)
    {
        $data['title'] = 'update latihan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['latihan'] = $this->guru->getLatihanRowID($id_latihan);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/latihanupdate', $data);
        $this->load->view('templates/footer');
    }

    public function updateLatihanRespon()
    {
        $id = $this->input->post('id_latihan');

        $config['upload_path']          = './assets/materi/latihan';
        $config['allowed_types']        = 'docs|docx|pdf|jpg|png|jpeg|svg';
        $config['max_size']             = 5000;

        $this->load->library('upload', $config);

        $this->upload->do_upload('file_latihan');
        $data1 = array('upload_file_latihan' => $this->upload->data());
        $data = [
            'soal' => $this->input->post('soal'),
            'file_latihan' => $data1['upload_file_latihan']['file_name'],
        ];
        $this->guru->updateLatihan($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">
                Latihan berhasil dirubah!</div>');
        redirect('guru/latihan/' . $this->input->post('id_sub_materi'));
    }

    public function tambahLatihan()
    {
        $config['upload_path']          = './assets/materi/latihan';
        $config['allowed_types']        = 'docs|docx|pdf|jpg|png|jpeg|svg';
        $config['max_size']             = 5000;

        $this->load->library('upload', $config);

        //Soal Besar
        $this->upload->do_upload('file_latihan');
        $data1 = array('upload_file_latihan' => $this->upload->data());
        $data = [
            'soal' => $this->input->post('soal'),
            'file_latihan' => $data1['upload_file_latihan']['file_name'],
            'id_sub_materi' => $this->input->post('id_sub_materi'),
        ];
        $this->guru->addLatihan($data);

        $this->session->set_flashdata('message', '<div class="alert alert-success">
                Soal Latihan berhasil ditambahkan!</div>');
        redirect('guru/latihan/' . $this->input->post('id_sub_materi'));
    }

    public function tambahNilai()
    {
        $id_hasil_siswa = $this->input->post('id_hasil_siswa');
        $id_submateri = $this->input->post('id_submateri');
        $id_user = $this->input->post('id_user');
        $id_latihan = $this->input->post('id_latihan');
        $data = [
            'nilai_dekomposisi' => $this->input->post('nilai_dekomposisi'),
            'nilai_abstraksi' => $this->input->post('nilai_abstraksi'),
            'nilai_pp' => $this->input->post('nilai_pp'),
            'nilai_ba' => $this->input->post('nilai_ba'),
            'nilai_akhir' => $this->input->post('nilai_akhir'),
        ];
        $this->guru->updateNilai($id_hasil_siswa, $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success">
                Nilai Latihan berhasil ditambahkan!</div>');
        redirect('guru/hasilLatihan/' . $id_latihan . '/' . $id_submateri);
    }

    public function soalCT($id_latihan, $id_sub_materi)
    {
        $data['title'] = 'Soal CT';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['latihan'] = $this->guru->getSubLatihanByIDLatihan($id_latihan);
        $data['subMateri'] = $this->guru->getSubMateriByID($id_sub_materi);
        $data['subLatihan'] = $this->guru->getLatihanRowID($id_latihan);
        $data['breadcrump'] = $this->guru->getSubLatihanByIDLatihanRow($id_latihan);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/SoalCT', $data);
        $this->load->view('templates/footer');
    }

    public function editSubLatihan($id_sub_latihan, $id_sub_materi)
    {
        $data['title'] = 'update latihan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['latihan'] = $this->guru->getSubLatihanByID($id_sub_latihan);
        $data['subMateri'] = $this->guru->getSubMateriByID($id_sub_materi);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/soalCTUpdate', $data);
        $this->load->view('templates/footer');
    }

    public function updateSubLatihanRespon()
    {
        $id = $this->input->post('id_sub_latihan');

        $config['upload_path']          = './assets/materi/latihan';
        $config['allowed_types']        = 'docs|docx|pdf|jpg|png|jpeg|svg';
        $config['max_size']             = 5000;

        $this->load->library('upload', $config);

        $this->upload->do_upload('file_soal');
        $data1 = array('upload_file_soal' => $this->upload->data());
        $data = [
            'jenis_sub_soal' => $this->input->post('jenis_sub_soal'),
            'pertanyaan' => $this->input->post('pertanyaan'),
            'file_soal' => $data1['upload_file_soal']['file_name'],
            'tipe_file' => $data1['upload_file_soal']['file_type'],
            'opsi_a' => $this->input->post('opsi_a'),
            'opsi_b' => $this->input->post('opsi_b'),
            'opsi_c' => $this->input->post('opsi_c'),
            'opsi_d' => $this->input->post('opsi_d'),
            'opsi_e' => $this->input->post('opsi_e'),
            'jawaban_benar' => $this->input->post('jawaban_benar'),
            'alasan' => $this->input->post('alasan'),

        ];
        $this->guru->updateSubLatihan($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">
                Latihan berhasil dirubah!</div>');
        redirect('guru/soalCT/' . $this->input->post('id_latihan') . '/' . $this->input->post('id_submateri'));
    }

    public function tambahSubLatihan()
    {
        $config['upload_path']          = './assets/materi/latihan';
        $config['allowed_types']        = 'docs|docx|pdf|jpg|png|jpeg|svg';
        $config['max_size']             = 5000;

        $this->load->library('upload', $config);

        //Soal Besar
        $this->upload->do_upload('file_soal');
        $data1 = array('upload_file_soal' => $this->upload->data());
        $data = [
            'jenis_sub_soal' => $this->input->post('jenis_sub_soal'),
            'pertanyaan' => $this->input->post('pertanyaan'),
            'file_soal' => $data1['upload_file_soal']['file_name'],
            'tipe_file' => $data1['upload_file_soal']['file_type'],
            'opsi_a' => $this->input->post('opsi_a'),
            'opsi_b' => $this->input->post('opsi_b'),
            'opsi_c' => $this->input->post('opsi_c'),
            'opsi_d' => $this->input->post('opsi_d'),
            'opsi_e' => $this->input->post('opsi_e'),
            'jawaban_benar' => $this->input->post('jawaban_benar'),
            'alasan' => $this->input->post('alasan'),
            'id_submateri' => $this->input->post('id_submateri'),
            'id_latihan' => $this->input->post('id_latihan'),

        ];
        $this->guru->addSubSoal($data);

        $this->session->set_flashdata('message', '<div class="alert alert-success">
                Sub Soal Latihan berhasil ditambahkan!</div>');
        redirect('guru/soalCT/' . $this->input->post('id_latihan') . '/' . $this->input->post('id_submateri'));
    }

    public function getSubSoal()
    {
        $id = $this->input->get('id');
        $jenis_sub_soal = $this->input->get('jenis_sub_soal');
        $get_latihan = $this->guru->getSubSoalByID($id, $jenis_sub_soal);
        echo json_encode($get_latihan);
        exit();
    }

    public function getHasilSoal()
    {
        $id = $this->input->get('id');
        $id_user = $this->input->get('id_user');
        $jenis_sub_soal = $this->input->get('jenis_sub_soal');
        $get_latihan = $this->guru->getHasilSiswaById($id, $id_user, $jenis_sub_soal);
        echo json_encode($get_latihan);
        exit();
    }

    public function hasilLatihan($id_latihan, $id_submateri)
    {
        $data['title'] = 'Hasil Latihan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['latihan'] = $this->guru->getLatihanByID($id_submateri);
        $data['materi'] = $this->guru->getSubMateriByID($id_submateri);
        $data['nilai'] = $this->guru->bandingNilai($id_submateri);
        $data['subMateri'] = $this->guru->getSubMateriByID($id_submateri);
        $data['breadcrump'] = $this->guru->getSubLatihanByIDLatihanRow($id_latihan);
        $data['id_latihan1'] = $id_latihan;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/hasilSiswaLatihan', $data);
        $this->load->view('templates/footer');
    }

    public function LihatJawabanSiswa($id_hasil_siswa, $id_submateri, $id_user, $id_latihan)
    {
        $list_jawaban = $this->guru->getJawabanUser($id_submateri, $id_user);
        $list_alasan = $this->guru->getAlasanUser($id_submateri, $id_user);
        $pc_jawaban = explode(",", $list_jawaban);
        $pc_alasan = explode(",", $list_alasan);
        foreach ($pc_jawaban as $jwb) {
            $pc_dt         = explode(";", $jwb);
            $id_soal     = $pc_dt[0];
            $jenis_sub_soal     = $pc_dt[1];
            $jawaban         = $pc_dt[2];
            $jawaban_anda[] = $jawaban;
            $jenis_soal[] = $jenis_sub_soal;
        }
        foreach ($pc_alasan as $alsn) {
            $pc_dt         = explode(";", $alsn);
            $id_soal     = $pc_dt[0];
            $jenis_sub_soal     = $pc_dt[1];
            $alasan         = $pc_dt[2];
            $alasan_anda[] = $alasan;
        }
        $data['jns1'] = $jenis_soal;
        $data['jwbn1'] = $jawaban_anda;
        $data['alsn1'] = $alasan_anda;
        $data['title'] = 'latihan';
        $data['akun'] = $this->guru->getDataAkun($id_user);
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['latihan'] = $this->guru->getsoal($id_submateri, $id_latihan);
        $data['latihan1'] = $this->guru->getsoalRow($id_submateri);
        $data['hasils'] = $this->guru->gethasilsiswaID($id_hasil_siswa);
        $data['subMateri'] = $this->guru->getSubMateriByID($id_submateri);
        $data['breadcrump'] = $this->guru->getLatihanRowID($id_latihan);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/jawaban_siswa', $data);
        $this->load->view('templates/footer');
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
