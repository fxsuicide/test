<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Routegeneral_model extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('route_general');
		$this->db->order_by('id', 'ASC');
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function selectreceive()
	{
		$this->db->select('*');
		$this->db->from('route_general');
		$this->db->where('routeflag', 'R');
		$this->db->order_by('id', 'ASC');
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function selectissue()
	{
		$this->db->select('*');
		$this->db->from('route_general');
		$this->db->where('routeflag', 'I');
		$this->db->order_by('id', 'ASC');
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function selectother()
	{
		$this->db->select('*');
		$this->db->from('route_general');
		$this->db->where('routeflag', 'X');
		$this->db->order_by('id', 'ASC');
		
		$query = $this->db->get();
		return $query->result_array();
	}
}