<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rfidgeneral_model extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('rfid_general');
		$this->db->order_by('id', 'ASC');
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function selectfree()
	{
		$this->db->select('*');
		$this->db->from('rfid_general');
		$this->db->where('rfidusedby', '');
		$this->db->order_by('id', 'ASC');
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function selectinuse()
	{
		$this->db->select('*');
		$this->db->from('rfid_general');
		$this->db->where('rfidinuse !=', '0');
		$this->db->order_by('id', 'ASC');
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function selectrsvp()
	{
		$this->db->select('*');
		$this->db->from('rfid_general');
		$this->db->where('rfidreserve !=', '0');
		$this->db->order_by('id', 'ASC');
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function selectsearchfree($search)
	{
		$this->db->select('*');
		$this->db->from('rfid_general');
		$this->db->where('rfidnumber', $search);
		$this->db->or_where('rfidplate', $search);
		$this->db->limit(1);
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function activate($plate)
	{
		$data = array(
    		'rfidinuse' => '1'
    	);
    	
    	$this->db->where('rfidplate', $plate);
    	$this->db->update('rfid_general', $data);
	}
	
	public function deactivate($plate)
	{
		$data = array(
    		'rfidinuse' => '0'
    	);
    	
    	$this->db->where('rfidplate', $plate);
    	$this->db->update('rfid_general', $data);
	}
	
	/*public function select($filter)
	{
		if ($filter == '')
		{
			
		}
		else
		{
			$this->db->select('*');
    		$this->db->from('rfid_general');
    		$this->db->like('rfidnumber', $filter, 'both');
			$this->db->or_like('rfidplate', $filter, 'both');
    		$this->db->order_by('id', 'ASC');
		}
		
		$query = $this->db->get();
		return $query->result_array();
	}*/
	
    /*public function select()
    {
    	$this->db->select('*');
    	$this->db->from('rfid');
    	$this->db->order_by('id', 'ASC');
    	
    	$query = $this->db->get();
    	return $query->result_array();
    }
    
    public function filter($filter)
    {
    	$this->db->select('*');
    	$this->db->from('rfid');
    	$this->db->like('rfid_number', $filter, 'both');
    	$this->db->or_like('rfid_name', $filter, 'both');
		$this->db->or_like('rfid_plate', $filter, 'both');
    	$this->db->order_by('id', 'ASC');
    	
    	$query = $this->db->get();
    	return $query->result_array();
    }
    
    public function create($number, $name, $plate)
    {
    	$data = array(
    		'rfid_number' => $number,
    		'rfid_name' => $name,
    		'rfid_plate' => $plate,
    		'rfid_group' => '2872'
    	);
    	
    	$this->db->insert('rfid', $data);
    	
    	return $this->db->insert_id();
    }
    
    public function update($id, $number, $name, $plate)
    {
    	$data = array(
    		'rfid_number' => $number,
    		'rfid_name' => $name,
    		'rfid_plate' => $plate
    	);
    	
    	$this->db->where('id', $id);
    	$this->db->update('rfid', $data);
    }
    
    public function delete($id)
    {
    	$this->db->where_in('id', $id);
    	$this->db->delete('rfid');
    }
	
	public function selectwherenumber($number)
    {
    	$this->db->select('*');
    	$this->db->from('rfid');
    	$this->db->where('rfid_number', $number);
    	
    	$query = $this->db->get();
    	return $query->result_array();
    }
	
	public function selnumberplate($numberplate)
    {
    	$this->db->select('*');
    	$this->db->from('rfid');
    	$this->db->where('rfid_number', $numberplate);
    	$this->db->or_where('rfid_plate', $numberplate);
    	$this->db->order_by('id', 'ASC');
    	
    	$query = $this->db->get();
    	return $query->result_array();
    }*/
}