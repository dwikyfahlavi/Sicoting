<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_akun extends CI_Model{

	public function getAkun($username, $password){
		$akun = $this->db->get_where('akun', ['username' => $username, 'password' => $password]);
		return $akun->row();
	}

	public function getAkunKelompok($username, $password){
		$akun = $this->db->get_where('kelompok', ['username_siswa' => $username, 'password_siswa' => $password]);
		return $akun->row();
	}

	public function insertAkun($data){
		$result  = $this->db->insert("akun",$data);
    	return $result;
	}

	public function insertProfile($data){
		$result  = $this->db->insert("guru",$data);
    	return $result;
	}

	public function GetIdUser($email){
        $this->db->where('email', $email);
        $result = $this->db->get('user');
        return $result;
    }
}