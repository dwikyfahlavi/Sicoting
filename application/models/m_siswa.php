<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_siswa extends CI_Model
{
    public function getAkun()
    {
        $query = $this->db->get("user");
        return $this->db->query($query)->result_array();
    }

    public function getDataAkun($id_user)
    {
        $argumen = array("id_user" => $id_user);
        $data = $this->db->get_where("user", $argumen);
        return $data->row();
    }

    public function editProfileSiswa($id_user, $argumen)
    {
        $this->db->where('id_user', $id_user)->update('user', $argumen);
    }

    public function getMateri()
    {
        $data = $this->db->get("materi");
        return $data->result_array();
    }

    public function getSubMateri($id_materi)
    {
        $argumen = array("id_materi" => $id_materi);
        $data = $this->db->get_where("submateri", $argumen);
        return $data->result_array();
    }

    public function getSubMateriById($id_subMateri)
    {
        $argumen = array("id_submateri" => $id_subMateri);
        $data = $this->db->get_where("submateri", $argumen);
        return $data->row();
    }

    public function getApersepsiByIdSubMateri($id_subMateri)
    {
        $argumen = array("id_submateri" => $id_subMateri);
        $data = $this->db->get_where("apersepsi", $argumen);
        return $data->row();
    }
    
    public function getKomenApersepsiByIdUser($id_user,$id_apersepsi)
    {
        $argumen = array("id_user" => $id_user,"id_apersepsi" => $id_apersepsi);
        $data = $this->db->get_where("komentar_apersepsi", $argumen);
        return $data->row();
    }

    public function addKomenApersepsi($data)
    {
        $data = $this->db->insert("komentar_apersepsi", $data);
        return $data;
    }

    public function getMedia()
    {
        $data = $this->db->get("media");
        return $data->result_array();
    }

    public function getMediaById($id_subMateri)
    {
        $argumen = array("id_submateri" => $id_subMateri);
        $data = $this->db->get_where("media", $argumen);
        return $data->result_array();
    }

    public function getMediaPilih($id_submateri, $jenis_media)
    {
        $argumen = array("id_submateri" => $id_submateri, "jenis_media" => $jenis_media);
        $data1 = $this->db->get_where("media", $argumen);
        return $data1->row();
    }

    public function getMediaPilihCount($id_submateri, $jenis_media)
    {
        $argumen = array("id_submateri" => $id_submateri, "jenis_media" => $jenis_media);
        $data1 = $this->db->get_where("media", $argumen);
        return $data1->num_rows();
    }

    public function getStatusBelajar($id_submateri, $id_user)
    {
        $argumen = array("id_submateri" => $id_submateri, "id_user" => $id_user);
        $data1 = $this->db->get_where("belajar", $argumen);
        return $data1->num_rows();
    }

    public function getLatihanByIDMateri($id_sub_materi)
    {
        $argumen = array("id_sub_materi" => $id_sub_materi);
        $data = $this->db->get_where("soal_latihan", $argumen);
        return $data->result_array();
    }

    // public function getSubMateriByID($id_submateri)
    // {
    //     $argumen = array("id_submateri" => $id_submateri);
    //     $data = $this->db->get_where("submateri", $argumen);
    //     return $data->row_array();
    // }

    public function insertStatusBelajar($data)
    {
        $result  = $this->db->insert("belajar", $data);
        return $result;
    }
}
