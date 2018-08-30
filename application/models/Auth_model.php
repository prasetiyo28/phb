<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    private $pk = "id_user";

    public function __construct() {
        parent::__construct();
    }

    // ambil data dari database yang usernamenya $username dan passwordnya p$assword
  function cek($table,$where)
  {
		return $this->db->get_where($table,$where);
	}

    // update user
    public function update($table,$data, $where)
    {
      $this->db->update($table, $data, $where);
      return $this->db->affected_rows();
    }

    // ambil data berdasarkan cookie
    function get_by_cookie($where,$table)
    {
      return $this->db->get_where($table,$where);
    }

    public function last_login($table,$data, $where)
    {
      $this->db->update($table, $data, $where);
      return $this->db->affected_rows();
    }

}

 ?>
