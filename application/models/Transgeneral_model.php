<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transgeneral_model extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('trans_general');
		$this->db->order_by('id', 'ASC');
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function selectsearch($search)
	{
		$this->db->select('*');
		$this->db->from('trans_general');
		$this->db->like('transnumber', $search, 'both');
		$this->db->or_like('transname', $search, 'both');
		$this->db->order_by('transname', 'ASC');
		
		$query = $this->db->get();
		return $query->result_array();
	}
}