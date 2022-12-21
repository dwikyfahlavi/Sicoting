<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model', 'menu');
    }

    public function index()
    {
        $data['title'] = 'Menu Manajemen';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success">
                    Menu berhasil ditambahkan!</div>');
            redirect('menu');
        }
    }

    public function updateMenu($id)
    {
        $data['title'] = 'Update Menu';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['updateMenu'] = $this->menu->getDataMenu($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('menu/updatemenu', $data);
        $this->load->view('templates/footer');
    }

    public function updateMenuRespon()
    {
        $id = $this->input->post('id');
        $data = [
            'menu' => $this->input->post('menu'),
        ];
        $this->menu->updateMenu($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">
                Menu berhasil dirubah!</div>');
        redirect('menu');
    }

    public function deleteMenu($id)
    {
        $this->menu->deleteMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">
                Menu berhasil dihapus!</div>');
        redirect('menu');
    }

    public function submenu()
    {
        $data['title'] = 'Sub Menu Manajemen';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['subMenu'] = $this->db->get('user_sub_menu')->result_array();

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">
                    Sub Menu berhasil ditambahkan!</div>');
            redirect('menu/submenu');
        }
    }

    public function updateSubmenu($id)
    {
        $data['title'] = 'Update Sub Menu';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['updateSubmenu'] = $this->menu->getDataSubMenu($id);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('menu/updatesubmenu', $data);
        $this->load->view('templates/footer');
    }

    public function updateSubmenuRespon()
    {
        $id = $this->input->post('id_user_sub_menu');
        $data = [
            'title' => $this->input->post('title'),
            'menu_id' => $this->input->post('menu_id'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active')
        ];
        $this->menu->updateSubMenu($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">
                Sub Menu berhasil dirubah!</div>');
        redirect('menu/submenu');
    }

    public function deleteSubmenu($id)
    {
        $this->menu->deletesubMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">
                Sub Menu berhasil dihapus!</div>');
        redirect('menu/submenu');
    }

    public function manajemenakun()
    {
        $data['title'] = 'Akun Manajemen';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['akun'] = $this->menu->getRoleUser();


        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('role_id', 'Role', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('menu/manajemenakun', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'role_id' => $this->input->post('role_id'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">
                    Akun berhasil ditambahkan!</div>');
            redirect('menu/manajemenakun');
        }
    }

    public function updateAkun($id_user)
    {
        $data['title'] = 'Update Akun';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['updateAkun'] = $this->menu->getRoleUserByID($id_user);
        $data['akun'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('menu/updateakun', $data);
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
            'nip' => $this->input->post('nip'),
            'nis' => $this->input->post('nis'),
            'mapel' => $this->input->post('mapel'),
            'role_id' => $this->input->post('role_id'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'is_active' => 1,
            'date_created' => time()
        ];
        $this->menu->updateAkun($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">
                Akun berhasil dirubah!</div>');
        redirect('menu/manajemenakun');
    }

    public function deleteAkun($id_user)
    {
        $this->menu->deleteAkun($id_user);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">
                Akun berhasil dihapus!</div>');
        redirect('menu/manajemenakun');
    }
}
