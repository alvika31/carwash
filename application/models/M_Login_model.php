<?php

class M_Login_model extends CI_Model
{

	public function read()
	{
		$query = $this->db->get('tbl_users');
		return $query->result();
	}

	public function getuser($username)
	{
		$this->db->where('username', $username);
		return $this->db->get('tbl_users')->row();
	}

	public function changepass()
	{
	}

	function get($username)
	{
		$this->db->where('user_username', $username);
		$result = $this->db->get('tbl_user')->row();
		return $result;
	}
}
