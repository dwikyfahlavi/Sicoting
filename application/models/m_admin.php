<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_admin extends CI_Model {

	public function getAllAkun()
	{
		$argumen = $this->db->get("akun");
		return $argumen;
	}

	public function getByID($id_akun){
	    $argumen = array("id_akun" => $id_akun);
	    $data = $this->db->get_where("akun", $argumen);
	    return $data->row();
  	}
	
	public function update($id_akun, $argumen) {
		$this->db->where('id_akun', $id_akun)->update('akun', $argumen);
	}

	//hapus berdarkan record id
	public function delete($id_akun) {
		$db_debug = $this->db->db_debug; //save setting
		$this->db->db_debug = FALSE; //disable debugging for queries

		$this->db->where('id_akun', $id_akun);
		$this->db->delete('akun');
		$db_error = $this->db->error();
		$this->db->db_debug = $db_debug; //restore setting

		//cek error db
		if ($db_error['code']==0) {
		  //kalau 0, maka return true
		   $result = TRUE;
		} else  {
		  //kalau bukan 0, maka return false
		   $result = FALSE;
		}

		return $result;
	}

}