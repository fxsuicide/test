<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detailbank_model extends CI_Model
{
	public function createdetail($detail)
	{
		$this->db->insert('data_bank', $detail);
		
		return $this->db->insert_id();
	}
	
	public function select($dataid)
	{
		$this->db->select('detail_bank.*, data_bank.data_po');
		$this->db->from('detail_bank');
		$this->db->join('data_bank', 'data_bank.id = detail_bank.dataid', 'left');
		$this->db->where('dataid', $dataid);
		$this->db->order_by('id', 'ASC');
		
		$query = $this->db->get();
		return $query->result_array();
	}
}