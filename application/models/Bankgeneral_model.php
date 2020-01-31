<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bankgeneral_model extends CI_Model
{
	public function createantri($antrian)
	{
		$this->db->insert('bank_general', $antrian);
		
		return $this->db->insert_id();
	}
	
	public function selectantri($route)
	{
		$this->db->select('bank_general.*, time_general.time_stage AS stage, time_general.time_stamp AS time0');
		$this->db->from('bank_general');
		$this->db->join('time_general', 'time_general.bankid = bank_general.id AND time_general.time_stage = "1"', 'left');
		$this->db->where('bank_routenumber', $route);
		$this->db->where_in('bank_queueflag', array('1', '2'));
		$this->db->order_by('bank_queueflag', 'DESC');
		$this->db->order_by('id', 'ASC');
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function selectproses($route)
	{
		$this->db->select('bank_general.*, time_general.time_stage AS stage, time_general.time_stamp AS time0');
		$this->db->from('bank_general');
		$this->db->join('time_general', 'time_general.bankid = bank_general.id AND time_general.time_stage = "2"', 'left');
		$this->db->where('bank_routenumber', $route);
		$this->db->where('bank_queueflag', '0');
		$this->db->where('bank_rfidnumber !=', '');
		$this->db->where('bank_rfidplate !=', '');
		$this->db->order_by('id', 'ASC');
		
		$query = $this->db->get();
		return $query->result_array();
	}

	public function selectfinishrange($startdate, $enddate)
	{
		$this->db->select('bank_general.*, t0.time_stage AS stage, t0.time_stamp AS time0');
		$this->db->from('bank_general');
		$this->db->join('time_general AS t0', 't0.bankid = bank_general.id AND t0.time_stage = "2"', 'left');
		$this->db->where('bank_exitflag', '0');
		$this->db->where('t0.time_stamp >=', $startdate);
		$this->db->where('t0.time_stamp <=', $enddate);
		$this->db->where_in('bank_routenumber', array('1', '2'));
		$this->db->order_by('time_stamp', 'ASC');
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function selectfinishrangeraw($startdate, $enddate)
	{
		$this->db->select('bank_routecode, bank_routename, bank_routeflag, bank_vendornumber, bank_vendorname, bank_vehiclenumber, bank_vehicledriver, bank_vehiclenote, bank_exitnote, t0.time_stamp AS time_antrian, t1.time_stamp AS time_proses, t2.time_stamp AS time_keluar');
		$this->db->from('bank_general');
		$this->db->join('time_general AS t0', 't0.bankid = bank_general.id AND t0.time_stage = "1"', 'left');
		$this->db->join('time_general AS t1', 't1.bankid = bank_general.id AND t1.time_stage = "2"', 'left');
		$this->db->join('time_general AS t2', 't2.bankid = bank_general.id AND t2.time_stage = "3"', 'left');
		$this->db->where('bank_exitflag', '0');
		$this->db->where('t1.time_stamp >=', $startdate);
		$this->db->where('t1.time_stamp <=', $enddate);
		$this->db->where_in('bank_routenumber', array('1', '2'));
		$this->db->order_by('t1.time_stamp', 'ASC');
		
		$query = $this->db->get();
		return $query;
	}
	
	public function deleteid($id)
	{
		$this->db->delete('bank_general', array('id' => $id));
	}

	public function deleteweightid($id)
	{
		$this->db->delete('weight', array('id' => $id));
	}
	
	public function transferid($id)
	{
		$data = array(
			'bank_queueflag' => '0'
		);
		$this->db->where('id', $id);
		$this->db->update('bank_general', $data);
	}
	
	public function finishid($id)
	{
		$data = array(
			'bank_rfidplate' => '',
			'bank_rfidnumber' => ''
		);
		$this->db->where('id', $id);
		$this->db->update('bank_general', $data);
	}
	
	public function selectid($id)
	{
		$this->db->select('bank_general.*, t0.time_stamp AS t0, t1.time_stamp AS t1, t2.time_stamp AS t2');
		$this->db->from('bank_general');
		$this->db->join('time_general AS t0', 't0.bankid = bank_general.id AND t0.time_stage = "1"', 'left');
		$this->db->join('time_general AS t1', 't1.bankid = bank_general.id AND t1.time_stage = "2"', 'left');
		$this->db->join('time_general AS t2', 't2.bankid = bank_general.id AND t2.time_stage = "3"', 'left');
		$this->db->where('bank_general.id', $id);
		$this->db->limit(1);
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function selectrfid($rfid)
	{
		$this->db->select('*');
		$this->db->from('bank_general');
		$this->db->where('bank_rfidnumber', $rfid);
		$this->db->where('bank_queueflag', '0');
		$this->db->where('bank_exitflag', '1');
		$this->db->where_in('bank_routenumber', array('1', '2','5','6'));
		$this->db->limit(1);
		
		$query = $this->db->get();
		return $query->result_array();
	}

	public function selectweight($bankid)
	{

		$sql = "SELECT weight.* FROM weight
			LEFT JOIN bank_general
			ON weight.`bankid` = bank_general.`id`
			WHERE bank_general.`id` = '".$bankid."'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	public function exitid($id, $note)
	{
		$data = array(
			'bank_exitflag' => '0',
			'bank_exitnote' => $note
		);
		$this->db->where('id', $id);
		$this->db->update('bank_general', $data);
	}
}