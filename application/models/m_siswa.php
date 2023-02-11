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

    public function getMedia()
    {
        $data = $this->db->get("media");
        return $data->result_array();
    }

    public function getMediaPilih($id_materi, $jenis_media)
    {
        $argumen = array("id_materi" => $id_materi, "jenis_media" => $jenis_media);
        $data1 = $this->db->get_where("media", $argumen);
        return $data1->row();
    }

    public function getMediaPilihCount($id_materi, $jenis_media)
    {
        $argumen = array("id_materi" => $id_materi, "jenis_media" => $jenis_media);
        $data1 = $this->db->get_where("media", $argumen);
        return $data1->num_rows();
    }

    public function getStatusBelajar($id_materi, $id_user)
    {
        $argumen = array("id_materi" => $id_materi, "id_user" => $id_user);
        $data1 = $this->db->get_where("belajar", $argumen);
        return $data1->num_rows();
    }

    public function insertStatusBelajar($data)
    {
        $result  = $this->db->insert("belajar", $data);
        return $result;
    }
}
