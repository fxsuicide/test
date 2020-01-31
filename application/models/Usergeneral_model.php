<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usergeneral_model extends CI_Model
{
	public function selectlogin($username, $password, $groupid)
	{
		$this->db->select('*');
		$this->db->from('user_general');
		$this->db->where('username', $username);
		$this->db->where('userpass', strtoupper(md5($password)));
		$this->db->where('groupid', $groupid);
		$this->db->limit(1);
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function selectid($id)
	{
		$this->db->select('*');
		$this->db->from('user_general');
		$this->db->where('id', $id);
		$this->db->limit(1);
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function updateid($user)
	{
		$this->db->where('id', $user['id']);
		$this->db->update('user_general', $user);
	}
}