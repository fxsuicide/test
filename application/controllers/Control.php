<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$publicpages = array(
			'index'
		);
		
		if (!in_array($this->uri->segment(2), $publicpages))
		{
			if (!$this->session->has_userdata('username'))
			{
				redirect('control/index');
			}
		}
		
		if (in_array($this->uri->segment(2), $publicpages))
		{
			if ($this->session->has_userdata('username'))
			{
				redirect('control/home');
			}
		}
	}
	
	public function index()
	{
		$this->load->view('common/publicheader');
		$this->load->view('frame/login');
		$this->load->view('common/footer');
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}
	
	public function home()
	{
		$navdata = array(
			'username' => $this->session->userdata('username'),
			'subtitle' => "Dashboard"
		);
		
		$this->load->view('common/privateheader', $navdata);
		$this->load->view('frame/home');
		$this->load->view('common/footer');
	}
	
	public function userprofile()
	{
		$navdata = array(
			'username' => $this->session->userdata('username'),
			'subtitle' => "User Profile"
		);
		
		$this->load->view('common/privateheader', $navdata);
		$this->load->view('frame/userprofile');
		$this->load->view('common/footer');
	}
	
	public function createadmin()
	{
		$navdata = array(
			'username' => $this->session->userdata('username'),
			'subtitle' => "Masuk Administrasi"
		);
		
		$this->load->view('common/privateheader', $navdata);
		$this->load->view('frame/createadmin');
		$this->load->view('common/footer');
	}

	public function listadmin()
	{
		$navdata = array(
			'username' => $this->session->userdata('username'),
			'subtitle' => "Laporan Administrasi"
		);
		
		$this->load->view('common/privateheader', $navdata);
		$this->load->view('frame/listadmin');
		$this->load->view('common/footer');
	}

	public function printPageTimbangan($bankid, $sjnumber)
	{
		$sjnumber = str_replace('_', '/', $sjnumber);

		//where bankid and sjnumber orderby

		$sql = "SELECT package_bank.`id`,delivery_bank.`delivery_number`,detail_bank.`detail_matnumber`,detail_bank.`detail_matname`,detail_bank.`detail_target`,
			package_bank.`package_value`,
			ROUND(SUM(package_bank.`package_value`),2) AS total, ABS(ROUND(detail_bank.`detail_target` - ROUND(SUM(package_bank.`package_value`),2),2)) AS selisih,
			bank_general.`bank_vehiclenumber`, bank_general.`bank_vendorname`,MIN(TIME(package_bank.`package_timestamp`)) mulai, 
			MAX(TIME(package_bank.`package_timestamp`)) selesai, 
			MIN(package_bank.`package_timestamp`) AS jam,
			GROUP_CONCAT(package_bank.`package_value` ORDER BY package_bank.`id` ASC) package_nett_all,COUNT(package_bank.`id`) jml FROM package_bank
			LEFT JOIN `delivery_bank`
			 ON package_bank.`deliveryid` = delivery_bank.`id`
			LEFT JOIN `detail_bank`
			 ON delivery_bank.`detailid` = detail_bank.`id`
			 LEFT JOIN `data_bank`
			 ON detail_bank.`dataid` = data_bank.`id`
			 LEFT JOIN bank_general
			 ON data_bank.`bankid` = bank_general.`id`
			 WHERE delivery_bank.`delivery_number` = '".$sjnumber."' AND bank_general.`id` =  '".$bankid."'
			 GROUP BY package_bank.`deliveryid`
			 ORDER BY package_bank.`id` ASC";
	  
	  $data = $this->db->query($sql)->result_array();
	  $result = array();
	  foreach($data as $key => $d){
		$result[$key] = $d;
		//$sjlist_arr   = array(0,1,2,3,4,5,6,7,8,9,10,11,12);
		$sjlist_arr   = explode(',',$d['package_nett_all']);
		$sj_list = array();
		foreach($sjlist_arr as $i => $sj){
			$i = strlen($i) <= 1 ? 0 : substr($i, 0,1);
			// $i             = 
			$sj_list[$i][] = $sj;
		}
		
		$result[$key]['sj_list'] = $sj_list;
	  }
		$data['result'] = $result;
		//var_dump($result);
		$this->load->view('print/gempol.php', $data);
	}

	public function printPageReject()
	{		
				
		$sql = "SELECT quality_delivery.*,bank_general.*,delivery_bank.`delivery_number`,detail_bank.`detail_tare1` FROM quality_delivery
				LEFT JOIN delivery_bank
				ON quality_delivery.`deliveryid` = delivery_bank.`id`
				LEFT JOIN `detail_bank`
				ON delivery_bank.`detailid` = detail_bank.`id`
				LEFT JOIN `data_bank`
				ON detail_bank.`dataid` = data_bank.`id`
				LEFT JOIN bank_general
				ON data_bank.`bankid` = bank_general.`id`
				WHERE delivery_bank.`delivery_number` = 'fdsa' AND bank_general.`id` = '44'";
	  
	 	$result = $this->db->query($sql)->row_array();
		$data['result'] = $result;
		//$data['test'] = "test waee";
		//print_r($data);
		$this->load->view('print/reject', $data);
		
	}

	public function printPageSparepart()
	{		
				
		$sql = "SELECT quality_delivery.*,bank_general.*,delivery_bank.*,detail_bank.* , data_bank.* FROM quality_delivery
				LEFT JOIN delivery_bank
				ON quality_delivery.`deliveryid` = delivery_bank.`id`
				LEFT JOIN `detail_bank`
				ON delivery_bank.`detailid` = detail_bank.`id`
				LEFT JOIN `data_bank`
				ON detail_bank.`dataid` = data_bank.`id`
				LEFT JOIN bank_general
				ON data_bank.`bankid` = bank_general.`id`
				WHERE delivery_bank.`delivery_number` = 'fdsa' AND bank_general.`id` = '44'";
	  
	 	$result = $this->db->query($sql)->row_array();
		$data['result'] = $result;
		//$data['test'] = "test waee";
		//print_r($data);
		$this->load->view('print/sparepart', $data);
		
	}

	public function printPageJembatan($bankid)
	
	{	
		$sql = "SELECT weight.*,bank_general.*  FROM bank_general
				LEFT JOIN weight ON weight.`bankid` = bank_general.`id`
				WHERE bank_general.`id` = '".$bankid."'
				ORDER BY weight.`id` ASC";
	  
	 	$result = $this->db->query($sql)->result_array();
		$data['result'] = $result;
		//$data['test'] = "test waee";
		//print_r($data);
		$this->load->view('print/jembatan', $data);
		
	}
}
