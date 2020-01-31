<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller
{
	public function index()
	{
	}
	
	public function ajax_request()
	{
		switch ($this->input->post('command'))
		{
			case "USER-LOGIN":
				$result = $this->user->selectlogin($this->input->post('paramtext1'), $this->input->post('paramtext2'), '2');
				if (count($result) == 1)
				{
					$this->session->set_userdata('id', $result[0]['id']);
					$this->session->set_userdata('groupid', $result[0]['groupid']);
					$this->session->set_userdata('username', $result[0]['username']);
					$this->session->set_userdata('userlevel', $result[0]['userlevel']);
					$package = array(
						'databool' => true,
						'datatext' => 'SUCCESS: redirecting ...'
					);
				}
				else
				{
					$package = array(
						'databool' => false,
						'datatext' => 'ERROR: Username / Password is not registered.'
					);
				}
				break;
			case "USER-LOADPROFILE":
				$package = array(
					'dataset' => $this->user->selectid($this->session->userdata('id'))
				);
				break;
			case "USER-UPDATEFULLNAME":
				if ($this->input->post('paramtext1') != '')
				{
					$result = $this->user->selectid($this->session->userdata('id'));
					if (count($result) == 1)
					{
						$result[0]['userfull'] = $this->input->post('paramtext1');
						$this->user->updateid($result[0]);
						
						$package = array(
							'databool' => true,
							'datatext' => 'SUCCESS: Full name updated'
						);
					}
					else
					{
						$package = array(
							'databool' => false,
							'datatext' => 'ERROR: Session expired'
						);
					}
				}
				else
				{
					$package = array(
						'databool' => false,
						'datatext' => 'ERROR: Invalid entry'
					);
				}
				break;
			case "USER-UPDATEPASSWORD":
				if ($this->input->post('paramtext1') == '' || $this->input->post('paramtext2') == '')
				{
					$package = array(
						'databool' => false,
						'datatext' => 'ERROR: Invalid entry'
					);
				}
				else if ($this->input->post('paramtext1') != $this->input->post('paramtext2'))
				{
					$package = array(
						'databool' => false,
						'datatext' => 'ERROR: Invalid entry'
					);
				}
				else
				{
					$result = $this->user->selectid($this->session->userdata('id'));
					if (count($result) == 1)
					{
						$result[0]['userpass'] = strtoupper(md5($this->input->post('paramtext1')));
						$this->user->updateid($result[0]);
						
						$package = array(
							'databool' => true,
							'datatext' => 'SUCCESS: Password updated'
						);
					}
					else
					{
						$package = array(
							'databool' => false,
							'datatext' => 'ERROR: Session expired'
						);
					}
				}
				break;
			////
			case "HOME-DASHBOARD":
				$package = array(
					'databool' => true,
					'datatext' => '',
					'dataset' => $this->bank->selectantri($this->input->post('paramtext1')),
					'dataset1' => $this->bank->selectproses($this->input->post('paramtext1'))
				);
				break;
			case "CREATE-RFID-SEARCH":
				$result = $this->bank->selectrfid($this->input->post('paramtext1'));
				$resultbool = true;
				$resulttext = "";
				if (count($result) == 0)
				{
					$resultbool = false;
					$resulttext = "Data kartu tidak ditemukan atau kartu sudah selesai proses administrasi.";
				}
				$package = array(
					'dataset' => $result,
					'databool' => $resultbool,
					'datatext' => $resulttext
				);
				break;
			case "CREATE-SELECT-DATA":
				$package = array(
					'dataset' => $this->data->select($this->input->post('paramtext1')),
					'databool' => true
				);
				break;
			case "CREATE-SELECT-WEIGHT":
				$package = array(
					'dataset' => $this->bank->selectweight($this->input->post('paramtext1')),
					'databool' => true
				);
				break;
			case "CREATE-DEL-WEIGHT":
				$this->bank->deleteweightid($this->input->post('paramtext1'));
				$package = array(
					'databool' => true,
					'datatext' => "Berat timbangan berhasil dihapus dari database (code:".$this->input->post('paramtext1').")"
				);
				break;
			case "CREATE-SELECT-DETAIL":
				$package = array(
					'dataset' => $this->detail->select($this->input->post('paramtext1')),
					'databool' => true
				);
				break;
			case "CREATE-SELECT-DELIVERY":
				$package = array(
					'dataset' => $this->delivery->select($this->input->post('paramtext1')),
					'databool' => true
				);
				break;
			case "CREATE-SELECT-PACKAGE":
				$package = array(
					'dataset' => $this->package->select($this->input->post('paramtext1')),
					'databool' => true
				);
				break;
			case "CREATE-NEW-DATA":
				$resultbool = false;
				$resulttext = "";
				$result = 0;
				if ($this->input->post('paramtext2') == '45')
				{
					$result = $this->data->dummy($this->input->post('paramtext1'));
				}
				else if ($this->input->post('paramtext2') != "")
				{
					$result = $this->data->wsdldata($this->input->post('paramtext1'), '2875', $this->input->post('paramtext3'), $this->input->post('paramtext2'));
				}
				if ($result == 0)
				{
					$resultbool = false;
					$resulttext = "PO Nomor ".$this->input->post('paramtext2')." gagal diunduh dari SAP";
				}
				else
				{
					$resultbool = true;
					$resulttext = "PO Nomor ".$this->input->post('paramtext2')." berhasil diunduh dari SAP (code:".$result.")";
				}
				$package = array(	
					'databool' => $resultbool,
					'datatext' => $resulttext
				);
				break;
			case "CREATE-DEL-DATA":
				$this->data->deleteid($this->input->post('paramtext1'));
				$package = array(
					'databool' => true,
					'datatext' => "PO berhasil dihapus dari database (code:".$this->input->post('paramtext1').")"
				);
				break;
			case "CREATE-POST-DATA":
				$resultbool = false;
				$resultbool = $this->data->postdata($this->input->post('paramtext1'));
				if ($resultbool)
				{
					$resulttext = "HTTP POST Data berhasil (code:200)";
				}
				else
				{
					$resulttext = "HTTP POST Data gagal";
				}
				$package = array(
					'databool' => $resultbool,
					'datatext' => $resulttext
				);
				break;
			case "CREATE-NEW-DELIVERY":
				$delivery = array(
					'detailid' => $this->input->post('paramtext1'),
					'delivery_number' => $this->input->post('paramtext2'),
					'delivery_target' => $this->input->post('paramtext3'),
					'delivery_gross' => '0',
					'delivery_tare0' => '0',
					'delivery_tare1' => '0',
					'delivery_pack' => '0'
				);
				$resulttext = $this->delivery->createdelivery($delivery);
				$quality = array(
					'deliveryid' => $resulttext,
					'quality_bankroute' => $this->input->post('paramtext4'),
					'quality_status' => '0',
					'quality_matname' => $this->input->post('paramtext5')
				);
				$this->quality->createquality($quality);
				$package = array(
					'databool' => true,
					'datatext' => $resulttext
				);
				break;
			case "CREATE-DEL-DELIVERY":
				$this->delivery->deleteid($this->input->post('paramtext1'));
				$this->quality->deletedeliveryid($this->input->post('paramtext1'));
				$package = array(
					'databool' => true,
					'datatext' => $this->input->post('paramtext1')
				);
				break;
			case "CREATE-GET-DELIVERY":
				$package = array(
					'dataset' => $this->delivery->selectid($this->input->post('paramtext1')),
					'databool' => true
				);
				break;
			case "CREATE-SET-DELIVERY":
				$this->delivery->updateid($this->input->post('paramtext1'), $this->input->post('paramtext2'), $this->input->post('paramtext3'), $this->input->post('paramtext4'));
				$package = array(
					'databool' => true,
					'datatext' => $this->input->post('paramtext1')
				);
				break;
			case "CREATE-EXIT-ID":
				$this->bank->exitid($this->input->post('paramtext1'), $this->input->post('paramtext2'));
				$package = array(
					'databool' => true,
					'datatext' => $this->input->post('paramtext1')
				);
				break;
			case "REPORT-LOAD-VEHICLE":
				$package = array(
					'dataset' => $this->bank->selectfinishrange($this->input->post('paramtext1') . " 00:00:00", $this->input->post('paramtext2') . " 23:59:59")
				);
				break;
			case "REPORT-SELECT-VEHICLE":
				$bank = $this->bank->selectid($this->input->post('paramtext1'));
				$package = array(
					'dataset' => $bank
				);
				break;
			default:
				$package = array(
					'dataset' => array(),
					'databool' => false,
					'datatext' => ''
				);
				break;
		}
		echo json_encode($package);
	}
	
	public function download_listadmin_csv($startdate, $enddate)
	{
		$this->load->dbutil();
		
		$delimiter = ",";
		$newline = "\r\n";
		$enclosure = '"';
		
		$query = $this->bank->selectfinishrangeraw($startdate . " 00:00:00", $enddate . " 23:59:59");
		
		$data = $this->dbutil->csv_from_result($query, $delimiter, $newline, $enclosure);
		$name = "listadmin_".$startdate."_to_".$enddate."_on_".date("YmdHis").'.csv';
		
		force_download($name, $data);
	}
}
