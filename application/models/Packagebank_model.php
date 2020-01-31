<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packagebank_model extends CI_Model
{
	public function createdata($data)
	{
		$this->db->insert('data_bank', $data);
		
		return $this->db->insert_id();
	}
	
	public function select($deliveryid)
	{
		$this->db->select('*');
		$this->db->from('package_bank');
		$this->db->where('deliveryid', $deliveryid);
		$this->db->order_by('id', 'ASC');
		
		$query = $this->db->get();
		return $query->result_array();
	}
}