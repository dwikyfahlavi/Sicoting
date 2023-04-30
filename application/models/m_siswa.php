<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_siswa extends CI_Model
{
    public function getAkun()
    {
        $query = $this->db->get("user");
        return $this->db->query($query)->result_array();
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

    public function getMateriByID($id_materi)
    {
        $argumen = array("id_materi" => $id_materi);
        $data = $this->db->get_where("materi", $argumen);
        return $data->row_array();
    }

    public function getSubMateri($id_materi)
    {
        $argumen = array("id_materi" => $id_materi);
        $data = $this->db->get_where("submateri", $argumen);
        return $data->result_array();
    }

    public function getSubMateriID($id_submateri)
    {
        $argumen = array("id_submateri" => $id_submateri);
        $data = $this->db->get_where("submateri", $argumen);
        return $data->row_array();
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

    public function getKomenApersepsiByIdUser($id_user, $id_apersepsi)
    {
        $argumen = array("id_user" => $id_user, "id_apersepsi" => $id_apersepsi);
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

    public function getlatihancount($id_materi)
    {
        $argumen = array("id_materi" => $id_materi);
        $data = $this->db->get_where("soal_latihan", $argumen);
        return $data->num_rows();
    }

    public function getLatihanByIDLatihan($id_latihan)
    {
        $argumen = array("id_latihan" => $id_latihan);
        $data = $this->db->get_where("soal_latihan", $argumen);
        return $data->row();
    }

    public function getHasilByIdSubmateriUser($id_submateri, $id_user)
    {
        $argumen = array("id_submateri" => $id_submateri, "id_user" => $id_user);
        $data1 = $this->db->get_where("hasil_siswa", $argumen);
        return $data1->row();
    }

    public function getHasilByIdSubmateriUser1($id_submateri, $id_user)
    {
        $data1 = $this->db->query("SELECT * FROM hasil_siswa WHERE hasil_siswa.id_submateri = $id_submateri AND hasil_siswa.id_user = $id_user");
        return $data1->row_array();
    }

    public function getNilai($id_user, $id_materi)
    {
        $data1 = $this->db->query("SELECT * FROM hasil_siswa  INNER JOIN submateri ON hasil_siswa.id_submateri = submateri.id_submateri WHERE hasil_siswa.id_user = $id_user AND hasil_siswa.id_materi = $id_materi");
        return $data1->result_array();
    }
    public function getPesan()
    {
        $data = $this->db->query("SELECT * FROM pesan  INNER JOIN user ON pesan.id_user = user.id_user");
        return $data->result_array();
    }

    public function addPesan($data)
    {
        $data = $this->db->insert("pesan", $data);
        return $data;
    }

    public function getSubLatihanByIDLatihan($id_latihan)
    {
        $argumen = array("id_latihan" => $id_latihan);
        $data = $this->db->get_where("sub_soal_latihan", $argumen);
        return $data->result_array();
    }

    public function insertStatusBelajar($data)
    {
        $result  = $this->db->insert("belajar", $data);
        return $result;
    }

    public function insertHasilLatihan($data)
    {
        $result  = $this->db->insert("hasil_siswa", $data);
        return $result;
    }

    public function getTesByID($id_materi)
    {
        $argumen = array("id_materi" => $id_materi);
        $data = $this->db->get_where("tes", $argumen);
        return $data->result_array();
    }
    public function getSubMateriByID1($id_submateri)
    {
        $argumen = array("id_submateri" => $id_submateri);
        $data = $this->db->get_where("submateri", $argumen);
        return $data->row_array();
    }
    public function getLatihanByIDMateri1($id_sub_materi)
    {
        $argumen = array("id_sub_materi" => $id_sub_materi);
        $data = $this->db->get_where("soal_latihan", $argumen);
        return $data->result_array();
    }
    public function getJawabanUser($id_submateri, $id_user)
    {
        $argumen = array("id_submateri" => $id_submateri, "id_user" => $id_user);
        $this->db->select('list_jawaban');
        $this->db->from('hasil_siswa');
        $this->db->where($argumen);
        return $this->db->get()->row()->list_jawaban;
    }
    public function getAlasanUser($id_submateri, $id_user)
    {
        $argumen = array("id_submateri" => $id_submateri, "id_user" => $id_user);
        $this->db->select('list_alasan');
        $this->db->from('hasil_siswa');
        $this->db->where($argumen);
        return $this->db->get()->row()->list_alasan;
    }
    public function getDataAkun($id_user)
    {
        $argumen = array("id_user" => $id_user);
        $data = $this->db->get_where("user", $argumen);
        return $data->row();
    }
    public function getSoal($id_submateri)
    {
        $argumen = array("id_submateri" => $id_submateri);
        $data = $this->db->get_where("sub_soal_latihan", $argumen);
        return $data->result_array();
    }
    public function getSoalRow($id_submateri)
    {
        $argumen = array("id_submateri" => $id_submateri);
        $data = $this->db->get_where("sub_soal_latihan", $argumen);
        return $data->row_array();
    }
    public function gethasilsiswaID($id_hasil_siswa)
    {
        $argumen = array("id_hasil_siswa" => $id_hasil_siswa);
        $data = $this->db->get_where("hasil_siswa", $argumen);
        return $data->row_array();
    }
}
