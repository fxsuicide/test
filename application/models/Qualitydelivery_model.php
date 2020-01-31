<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qualitydelivery_model extends CI_Model
{
	public function createquality($quality)
	{
		$this->db->insert('quality_delivery', $quality);
		
		return $this->db->insert_id();
	}
	
	public function deletedeliveryid($deliveryid)
	{
		$this->db->delete('quality_delivery', array('deliveryid' => $deliveryid));
	}
}