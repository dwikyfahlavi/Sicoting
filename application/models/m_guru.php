<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_guru extends CI_Model
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

    public function editProfile($id_user, $argumen)
    {
        $this->db->where('id_user', $id_user)->update('user', $argumen);
    }

    public function getDataKD()
    {
        $data = $this->db->query("SELECT ip . *, kd . *
        FROM ip JOIN kd
          ON ip . kd_id = kd . id_kd
        ");
        return $data->result_array();
    }

    public function GetKDLast()
    {
        $data = $this->db->query("SELECT * FROM kd ORDER BY id_kd DESC");
        return $data->row();
    }

    public function getKDByID($id_kd)
    {
        $argumen = array("id_kd" => $id_kd);
        $data = $this->db->get_where("kd", $argumen);
        return $data->row_array();
    }

    public function getIPByID($id_kd)
    {
        $argumen = array("kd_id" => $id_kd);
        $data = $this->db->get_where("ip", $argumen);
        return $data->result_array();
    }

    public function updatePembelajaran($id_kd, $argumen)
    {
        $this->db->where('id_kd', $id_kd)->update('kd', $argumen);
    }

    public function updatePembelajaran1($id_ip, $argumen)
    {
        $this->db->where('id_ip', $id_ip)->update('ip', $argumen);
    }

    public function deletePembelajaran($id_kd)
    {
        $db_debug = $this->db->db_debug; //save setting
        $this->db->db_debug = FALSE; //disable debugging for queries

        $this->db->where('id_kd', $id_kd);
        $this->db->delete('kd');
        $db_error = $this->db->error();
        $this->db->db_debug = $db_debug; //restore setting

        //cek error db
        if ($db_error['code'] == 0) {
            //kalau 0, maka return true
            $result = TRUE;
        } else {
            //kalau bukan 0, maka return false
            $result = FALSE;
        }

        return $result;
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

    public function updateMateri($id_materi, $argumen)
    {
        $this->db->where('id_materi', $id_materi)->update('materi', $argumen);
    }

    public function deleteMateri($id_materi)
    {
        $db_debug = $this->db->db_debug; //save setting
        $this->db->db_debug = FALSE; //disable debugging for queries

        $this->db->where('id_materi', $id_materi);
        $this->db->delete('materi');
        $db_error = $this->db->error();
        $this->db->db_debug = $db_debug; //restore setting

        //cek error db
        if ($db_error['code'] == 0) {
            //kalau 0, maka return true
            $result = TRUE;
        } else {
            //kalau bukan 0, maka return false
            $result = FALSE;
        }

        return $result;
    }

    public function getApersepsi()
    {
        $data = $this->db->get("apersepsi");
        return $data->result_array();
    }

    public function getApersepsiByID($id_apersepsi)
    {
        $argumen = array("id_apersepsi" => $id_apersepsi);
        $data = $this->db->get_where("apersepsi", $argumen);
        return $data->row_array();
    }

    public function updateApersepsi($id_apersepsi, $argumen)
    {
        $this->db->where('id_apersepsi', $id_apersepsi)->update('apersepsi', $argumen);
    }

    public function deleteApersepsi($id_apersepsi)
    {
        $db_debug = $this->db->db_debug; //save setting
        $this->db->db_debug = FALSE; //disable debugging for queries

        $this->db->where('id_apersepsi', $id_apersepsi);
        $this->db->delete('apersepsi');
        $db_error = $this->db->error();
        $this->db->db_debug = $db_debug; //restore setting

        //cek error db
        if ($db_error['code'] == 0) {
            //kalau 0, maka return true
            $result = TRUE;
        } else {
            //kalau bukan 0, maka return false
            $result = FALSE;
        }

        return $result;
    }

    public function getKomentarApersepsi()
    {
        $data = $this->db->get("komentar_apersepsi");
        return $data->result_array();
    }

    public function getMedia()
    {
        $data = $this->db->get("media");
        return $data->result_array();
    }

    public function getMediaByID($id_media)
    {
        $argumen = array("id_media" => $id_media);
        $data = $this->db->get_where("media", $argumen);
        return $data->row_array();
    }

    public function addMedia($data)
    {
        $data = $this->db->insert("media", $data);
        return $data;
    }

    

    public function updateMedia($id_media, $argumen)
    {
        $this->db->where('id_media', $id_media)->update('media', $argumen);
    }

    public function deleteMedia($id_media)
    {
        $db_debug = $this->db->db_debug; //save setting
        $this->db->db_debug = FALSE; //disable debugging for queries

        $this->db->where('id_media', $id_media);
        $this->db->delete('media');
        $db_error = $this->db->error();
        $this->db->db_debug = $db_debug; //restore setting

        //cek error db
        if ($db_error['code'] == 0) {
            //kalau 0, maka return true
            $result = TRUE;
        } else {
            //kalau bukan 0, maka return false
            $result = FALSE;
        }

        return $result;
    }

    public function getTes()
    {
        $data = $this->db->get("tes");
        return $data->result_array();
    }

    public function getTesByID($id_tes)
    {
        $argumen = array("id_tes" => $id_tes);
        $data = $this->db->get_where("tes", $argumen);
        return $data->row_array();
    }

    public function deleteTes($id_tes)
    {
        $db_debug = $this->db->db_debug; //save setting
        $this->db->db_debug = FALSE; //disable debugging for queries

        $this->db->where('id_tes', $id_tes);
        $this->db->delete('tes');
        $db_error = $this->db->error();
        $this->db->db_debug = $db_debug; //restore setting
        //cek error db
        if ($db_error['code'] == 0) {
            //kalau 0, maka return true
            $result = TRUE;
        } else {
            //kalau bukan 0, maka return false
            $result = FALSE;
        }

        return $result;
    }

    public function updateTes($id_tes, $argumen)
    {
        $this->db->where('id_tes', $id_tes)->update('tes', $argumen);
    }

    public function getLatihan()
    {
        $data = $this->db->get("soal_latihan");
        return $data->result_array();
    }

    public function getLastLatihan()
    {
        $data = $this->db->query("SELECT * FROM soal_latihan ORDER BY id_latihan DESC");
        return $data->row();
    }

    public function addLatihan($data)
    {
        $data = $this->db->insert("soal_latihan", $data);
        return $data;
    }

    public function addSubSoal($data)
    {
        $data = $this->db->insert("sub_soal_latihan", $data);
        return $data;
    }

    public function getLastSubSoal()
    {
        $data = $this->db->query("SELECT * FROM sub_soal_latihan ORDER BY id_sub_latihan DESC");
        return $data->row();
    }

     public function addOpsiSubSoal($data)
    {
        $data = $this->db->insert("opsi_soal_latihan", $data);
        return $data;
    }

    public function getLatihanByID($id_latihan)
    {
        $argumen = array("id_latihan" => $id_latihan);
        $data = $this->db->get_where("soal_latihan", $argumen);
        return $data->row_array();
    }

    public function deleteLatihan($id_latihan)
    {
        $db_debug = $this->db->db_debug; //save setting
        $this->db->db_debug = FALSE; //disable debugging for queries

        $this->db->where('id_latihan', $id_latihan);
        $this->db->delete('soal_latihan');
        $db_error = $this->db->error();
        $this->db->db_debug = $db_debug; //restore setting

        //cek error db
        if ($db_error['code'] == 0) {
            //kalau 0, maka return true
            $result = TRUE;
        } else {
            //kalau bukan 0, maka return false
            $result = FALSE;
        }

        return $result;
    }

    public function updateLatihan($id_latihan, $argumen)
    {
        $this->db->where('id_latihan', $id_latihan)->update('soal_latihan', $argumen);
    }

    public function getSubSoalByID($id_latihan,$jenis_sub_soal)
    {
        $argumen = array("id_soal_latihan" => $id_latihan, "jenis_sub_soal" => $jenis_sub_soal);
        $data = $this->db->get_where("sub_soal_latihan", $argumen);
        return $data->row_array();
    }

    public function getHasilLatihan()
    {
        $data = $this->db->get("hasil_siswa");
        return $data->result_array();
    }

    public function getHasilSiswaById($id, $id_user ,$jenis_sub_soal)
    {
        $this->db->select('*');
        $this->db->from('hasil_siswa');
        $this->db->join('sub_soal_latihan', 'hasil_siswa.id_sub_soal = sub_soal_latihan.id_sub_latihan');
        $this->db->join('opsi_soal_latihan', 'opsi_soal_latihan.id_sub_soal = hasil_siswa.id_sub_soal');
        // $this->db->join('sub_soal_latihan', 'sub_soal_latihan.id_soal_latihan = soal_latihan.id_latihan');
        $this->db->where('hasil_siswa.id_sub_soal', $id);
        $this->db->where('hasil_siswa.id_user', $id_user);
        $this->db->where('opsi_soal_latihan.id_sub_soal', $id);
        // $this->db->where('sub_soal_latihan.id_sub_latihan', $id);
        // $this->db->where('sub_soal_latihan.jenis_sub_soal', $jenis_sub_soal);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    
    }

    public function getUserSiswa()
    {
        $kondisi = array("role_id" => 3);
        $data = $this->db->get_where("user", $kondisi);
        return $data->result_array();
    }

    public function getUserSiswaByID($id_user)
    {
        $argumen = array("id_user" => $id_user);
        $data = $this->db->get_where("user", $argumen);
        return $data->row_array();
    }

    public function updateAkun($id_user, $argumen)
    {
        $this->db->where('id_user', $id_user)->update('user', $argumen);
    }

    public function deleteAkun($id_user)
    {
        $db_debug = $this->db->db_debug; //save setting
        $this->db->db_debug = FALSE; //disable debugging for queries

        $this->db->where('id_user', $id_user);
        $this->db->delete('user');
        $db_error = $this->db->error();
        $this->db->db_debug = $db_debug; //restore setting

        //cek error db
        if ($db_error['code'] == 0) {
            //kalau 0, maka return true
            $result = TRUE;
        } else {
            //kalau bukan 0, maka return false
            $result = FALSE;
        }

        return $result;
    }
}
