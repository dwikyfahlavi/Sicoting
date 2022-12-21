<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
  public function getMenu()
  {
    $query = $this->db->get("user_menu");
    return $this->db->query($query)->result_array();
  }

  public function getDataMenu($id_user_menu)
  {
    $argumen = array("id_user_menu" => $id_user_menu);
    $data = $this->db->get_where("user_menu", $argumen);
    return $data->row();
  }

  public function getSubMenu()
  {
    $query = "SELECT user_sub_menu . *, user_menu . menu
                    FROM user_sub_menu JOIN user_menu
                      ON user_sub_menu . menu_id = user_menu . id_user_menu
                 ";
    return $this->db->query($query)->result_array();
  }

  public function updateMenu($id_user_menu, $argumen)
  {
    $this->db->where('id_user_menu', $id_user_menu)->update('user_menu', $argumen);
  }

  public function deleteMenu($id_user_menu)
  {
    $db_debug = $this->db->db_debug; //save setting
    $this->db->db_debug = FALSE; //disable debugging for queries

    $this->db->where('id_user_menu', $id_user_menu);
    $this->db->delete('user_menu');
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

  public function getDataSubMenu($id_user_sub_menu)
  {
    $data = $this->db->query("SELECT user_sub_menu . *, user_menu . menu
        FROM user_sub_menu JOIN user_menu
          ON user_sub_menu . menu_id = user_menu . id_user_menu
        WHERE user_sub_menu . id_user_sub_menu = $id_user_sub_menu
        ");
    return $data->row();
  }

  public function updateSubMenu($id_user_sub_menu, $argumen)
  {
    $this->db->where('id_user_sub_menu', $id_user_sub_menu)->update('user_sub_menu', $argumen);
  }

  public function deletesubMenu($id_user_sub_menu)
  {
    $db_debug = $this->db->db_debug; //save setting
    $this->db->db_debug = FALSE; //disable debugging for queries

    $this->db->where('id_user_sub_menu', $id_user_sub_menu);
    $this->db->delete('user_sub_menu');
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

  public function getRoleUser()
  {
    $data = $this->db->query("SELECT *
        FROM user JOIN user_role
          ON user . role_id = user_role . id_user_role
        ");
    return $data->result_array();
  }

  public function updateAkun($id_user, $argumen)
  {
    $this->db->where('id_user', $id_user)->update('user', $argumen);
  }

  public function getRoleUserByID($id_user)
  {
    $data = $this->db->query("SELECT *
        FROM user JOIN user_role
          ON user . role_id = user_role . id_user_role
          WHERE id_user = $id_user
        ");
    return $data->row_array();
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
