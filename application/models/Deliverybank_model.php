<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deliverybank_model extends CI_Model
{
	public function createdelivery($delivery)
	{
		$this->db->insert('delivery_bank', $delivery);
		
		return $this->db->insert_id();
	}
	
	public function select($detailid)
	{
		$this->db->select('delivery_bank.*, detail_bank.detail_matname, quality_delivery.quality_status');
		$this->db->from('delivery_bank');
		$this->db->join('detail_bank', 'detail_bank.id = delivery_bank.detailid', 'left');
		$this->db->join('quality_delivery', 'quality_delivery.deliveryid = delivery_bank.id', 'left');
		$this->db->where('detailid', $detailid);
		$this->db->order_by('id', 'ASC');
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function selectid($id)
	{
		$this->db->select('delivery_bank.*, detail_bank.detail_matnumber, detail_bank.detail_matname, matpack_general.matpack_unit, matpack_general.matpack_value, matpack_general.matpack_pack');
		$this->db->from('delivery_bank');
		$this->db->join('detail_bank', 'detail_bank.id = delivery_bank.detailid', 'left');
		$this->db->join('matpack_general', 'matpack_general.matpack_number = detail_bank.detail_matnumber', 'left');
		$this->db->where('delivery_bank.id', $id);
		$this->db->limit(1);
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function deleteid($id)
	{
		$this->db->delete('delivery_bank', array('id' => $id));
	}
	
	public function updateid($id, $deliverytare0, $deliverypack)
	{
		$data = array(
			'delivery_tare0' => $deliverytare0,
			'delivery_pack' => $deliverypack
		);
		
		$this->db->where('id', $id);
    	$this->db->update('delivery_bank', $data);
	}
}