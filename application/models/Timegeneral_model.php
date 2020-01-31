<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timegeneral_model extends CI_Model
{
	public function createstamp($bankid, $stage)
	{
		$data = array(
			'bankid' => $bankid,
			'time_stage' => $stage
		);
		$this->db->insert('time_general', $data);
	}
	
	public function selectbankid($id)
	{
		$storedproc = "CALL test('36')";
        $result = $this->db->query($storedproc);
        
        mysqli_next_result( $this->db->conn_id );
        
        return $result->result();
	}
}