<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendorgeneral_model extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('vendor_general');
		$this->db->order_by('id', 'ASC');
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function selectgroup()
	{
		$this->db->select('*');
		$this->db->from('vendor_general');
		$this->db->where('vendorgroup', '0');
		$this->db->order_by('id', 'ASC');
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function selectlocal()
	{
		$this->db->select('*');
		$this->db->from('vendor_general');
		$this->db->where('vendorgroup', '1');
		$this->db->order_by('id', 'ASC');
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function selectsearch($search)
	{
		$this->db->select('*');
		$this->db->from('vendor_general');
		$this->db->like('vendornumber', $search, 'both');
		$this->db->or_like('vendorname', $search, 'both');
		$this->db->order_by('vendorname', 'ASC');
		
		$query = $this->db->get();
		return $query->result_array();
	}
}