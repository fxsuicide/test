<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Databank_model extends CI_Model
{
	public function createdata($data)
	{
		$this->db->insert('data_bank', $data);
		
		return $this->db->insert_id();
	}
	
	public function select($bankid)
	{
		$this->db->select('*');
		$this->db->from('data_bank');
		$this->db->where('bankid', $bankid);
		$this->db->order_by('id', 'ASC');
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function deleteid($id)
	{
		$this->db->delete('data_bank', array('id' => $id));
	}
	
	public function dummy($bankid)
	{
		$data = array(
			'bankid' => $bankid,
			'data_po' => '4500000000'
		);
		$dataid = $this->createdata($data);
		
		$detail = array(
			'dataid' => $dataid,
			'detail_matno' => '10',
			'detail_matnumber' => '0000000001',
			'detail_matname' => 'Sample Item 1',
			'detail_matunit' => 'KG',
			'detail_poqty' => '1000',
			'detail_osqty' => '1000',
			'detail_gross' => '0',
			'detail_tare0' => '0',
			'detail_tare1' => '0',
			'detail_nett' => '0',
			'detail_target' => '0'
		);
		$this->db->insert('detail_bank', $detail);
		
		$detail = array(
			'dataid' => $dataid,
			'detail_matno' => '20',
			'detail_matnumber' => '0000000001',
			'detail_matname' => 'Sample Item 2',
			'detail_matunit' => 'KG',
			'detail_poqty' => '2000',
			'detail_osqty' => '2000',
			'detail_gross' => '0',
			'detail_tare0' => '0',
			'detail_tare1' => '0',
			'detail_nett' => '0',
			'detail_target' => '0'
		);
		$this->db->insert('detail_bank', $detail);
		
		return $dataid;
	}
	
	public function wsdldata($bankid, $factory, $vendor, $datapo)
	{	
		$soapclient = new SoapClient('http://10.126.20.22/timbangan/service.asmx?WSDL', array('trace'=>1));
		//$soapclient = new SoapClient('http://10.126.105.99/timbangan/service.asmx?WSDL', array('trace'=>1));
		//$soapclient = new SoapClient('http://webqa.indofood.com/timbangan/service.asmx?WSDL', array('trace'=>1));

		$params = array('Werks'=>$factory, 'Lifnr'=>$vendor, 'Ebeln'=>$datapo);
		$response = $soapclient->WSPO_WB($params);
		
		$xml = simplexml_load_string($response->WSPO_WBResult->any);
		$json = json_encode($xml);
		$soap_result = json_decode($json);
		
		$newid = 0;
		if ($soap_result == new stdClass())
		{
		}
		else
		{
			$data = array(
				'bankid' => $bankid,
				'data_po' => $datapo
			);
			$dataid = $this->createdata($data);
			$newid = $dataid;
			
			if (is_object($soap_result->NewDataSet->Table1))
			{
				$detail = array(
					'dataid' => $dataid,
					'detail_matno' => $soap_result->NewDataSet->Table1->Ebelp,
					'detail_matnumber' => $soap_result->NewDataSet->Table1->Matnr,
					'detail_matname' => $soap_result->NewDataSet->Table1->Maktx,
					'detail_matunit' => $soap_result->NewDataSet->Table1->Meins,
					'detail_poqty' => $soap_result->NewDataSet->Table1->Poqty,
					'detail_osqty' => $soap_result->NewDataSet->Table1->Osqty,
					'detail_gross' => '0',
					'detail_tare0' => '0',
					'detail_tare1' => '0',
					'detail_nett' => '0',
					'detail_target' => '0'
				);
				$this->db->insert('detail_bank', $detail);
			}
		
			if (is_array($soap_result->NewDataSet->Table1))
			{
				for ($i = 0; $i < count($soap_result->NewDataSet->Table1); $i++)
				{
					$detail = array(
						'dataid' => $dataid,
						'detail_matno' => $soap_result->NewDataSet->Table1[$i]->Ebelp,
						'detail_matnumber' => $soap_result->NewDataSet->Table1[$i]->Matnr,
						'detail_matname' => $soap_result->NewDataSet->Table1[$i]->Maktx,
						'detail_matunit' => $soap_result->NewDataSet->Table1[$i]->Meins,
						'detail_poqty' => $soap_result->NewDataSet->Table1[$i]->Poqty,
						'detail_osqty' => $soap_result->NewDataSet->Table1[$i]->Osqty,
						'detail_gross' => '0',
						'detail_tare0' => '0',
						'detail_tare1' => '0',
						'detail_nett' => '0',
						'detail_target' => '0'
					);
					$this->db->insert('detail_bank', $detail);
				}
			}
		}
		
		return $newid;
	}
	
	public function postdata2($dataid)
	{	
		$this->db->select('*');
		$this->db->from('data_bank');
		$this->db->where('id', $dataid);
		$this->db->limit(1);
		
		$query = $this->db->get();
		$data = $query->result_array();
		
		$this->db->select('*');
		$this->db->from('bank_general');
		$this->db->where('id', $data[0]['bankid']);
		$this->db->limit(1);
		
		$query = $this->db->get();
		$bank = $query->result_array();
		
		$this->db->select('*');
		$this->db->from('detail_bank');
		$this->db->where('dataid', $dataid);
		$this->db->limit(1);
		
		$query = $this->db->get();
		$detail = $query->result_array();
		
		
		$json = array();
		$json["MJAHR"] = date("Y");
		$json["VBELN"] = $bank[0]["bank_routeflag"];
		$json["WERKS"] = "2875";
		$json["header"] = array();
		$json["header"][] = array();
		$json["header"][0]["BUKRS"] = "2800";
		$json["header"][0]["WERKS"] = "2875";
		$json["header"][0]["VBELN"] = $bank[0]["bank_routeflag"];
		$json["header"][0]["MJAHR"] = date("Y");
		$json["header"][0]["ROUTE"] = $bank[0]["bank_routecode"];
		$json["header"][0]["LIFNR"] = $bank[0]["bank_vendornumber"];
		$json["header"][0]["XBLNR"] = "";//Surat Jalan
		$json["header"][0]["VGBEL"] = $data[0]["data_po"];
		$json["header"][0]["EXDAT"] = date("Y-m-d");
		$json["header"][0]["RMRK1"] = "";//Remark
		$json["header"][0]["SEALN"] = "V0001";
		$json["header"][0]["VSSLN"] = $bank[0]["bank_vehiclenumber"];
		$json["header"][0]["DRVRN"] = $bank[0]["bank_vehicledriver"];
		$json["header"][0]["SIGN_NAME"] = "";//User
		$json["header"][0]["BRGW1"] = "0";
		$json["header"][0]["DATE1"] = date("Y-m-d");//$weight[0]["weight_gross"]
		$json["header"][0]["TIME1"] = date("H:i:s");//$weight[0]["weight_gross"]
		$json["header"][0]["BRGW2"] = "0";
		$json["header"][0]["DATE2"] = date("Y-m-d");//$weight[0]["weight_gross"]
		$json["header"][0]["TIME2"] = date("H:i:s");//$weight[0]["weight_gross"]
		$json["header"][0]["BRGTK"] = "0";
		
		$json["detail"] = array();
		$j = 0;
		for ($i = 0; $i < count($detail); $i++)
		{
			if ($detail[$i]["detail_gross"] != '0')
			{
				$json["detail"][] = array();
				$json["detail"][$j]["VBELN"] = $bank[0]["bank_routeflag"];
				$json["detail"][$j]["MJAHR"] = date("Y");
				$json["detail"][$j]["VGBEL"] = $data[0]["data_po"];
				$json["detail"][$j]["POSNR"] = $detail[$i]["detail_matno"];
				$json["detail"][$j]["MATNR"] = $detail[$i]["detail_matnumber"];
				$json["detail"][$j]["MEINS"] = $detail[$i]["detail_matunit"];
				$json["detail"][$j]["BRGW3"] = $detail[$i]["detail_gross"];
				$json["detail"][$j]["DATE3"] = date("Y-m-d");
				$json["detail"][$j]["TIME3"] = date("H:i:s");
				$json["detail"][$j]["FPBTB"] = $detail[$i]["detail_tare0"];
				$json["detail"][$j]["FPBQC"] = $detail[$i]["detail_tare1"];
				$json["detail"][$j]["WEMNG"] = $detail[$i]["detail_gross"];//NET
				$json["detail"][$j]["QTYSJ"] = $detail[$i]["detail_target"];
				$json["detail"][$j]["QTYGR"] = $detail[$i]["detail_gross"];//GR
				$json["detail"][$j]["QTYNV"] = $detail[$i]["detail_gross"];//NV
				$json["detail"][$j]["QTYSL"] = $detail[$i]["detail_gross"];//SL
				$json["detail"][$j]["VRKME"] = $detail[$i]["detail_matunit"];//"KG";
				$json["detail"][$j]["RMRK1"] = "";//REMARK;
				$j++;
			}
		}
		
		$jsonstring = json_encode($json);
		
		//$ch = curl_init("http://10.126.20.22/Timbangan/service.asmx/WSWB_GET");//SAP PROD
		$ch = curl_init("http://10.126.105.99/Timbangan/service.asmx/WSWB_GET");//SAP QA
		//$ch = curl_init("http://10.126.26.222/adminfrm/index.php/test/serverpost");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonstring);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);
		
		$jsonoutput = json_decode($output);

		$jsonoutputd = json_decode($jsonoutput->d);
		
		if ($info["http_code"] == 200)
		{
			$this->db->set('data_status', $jsonoutputd->msg);
			$this->db->set('data_posttime', 'NOW()', FALSE);
			$this->db->set('data_postraw', $jsonstring);
			
			$this->db->where('id', $dataid);
			$this->db->update('data_bank');
			
			return true;
		}
		else
		{
			return false;
		}
	}


	public function postdata($dataid)
	{	
		$this->db->select('*');
		$this->db->from('data_bank');
		$this->db->where('id', $dataid);
		$this->db->limit(1);
		
		$query = $this->db->get();
		$data = $query->result_array();
		
		$this->db->select('*');
		$this->db->from('bank_general');
		$this->db->where('id', $data[0]['bankid']);
		$this->db->limit(1);
		
		$query = $this->db->get();
		$bank = $query->result_array();
		
		$this->db->select('*');
		$this->db->from('detail_bank');
		$this->db->where('dataid', $dataid);
		//$this->db->limit(1);
		
		$query = $this->db->get();
		$detail = $query->result_array();
		
		
		$json = array();
		$json["MJAHR"] = date("Y");
		$json["VBELN"] = $bank[0]["bank_routeflag"];
		$json["WERKS"] = "2875";
		$json["header"] = array();
		$json["header"][] = array();
		$json["header"][0]["BUKRS"] = "2800";
		$json["header"][0]["WERKS"] = "2875";
		$json["header"][0]["VBELN"] = $bank[0]["bank_routeflag"];
		$json["header"][0]["MJAHR"] = date("Y");
		$json["header"][0]["ROUTE"] = $bank[0]["bank_routecode"];
		$json["header"][0]["LIFNR"] = $bank[0]["bank_vendornumber"];
		$json["header"][0]["XBLNR"] = "";//Surat Jalan
		$json["header"][0]["VGBEL"] = $data[0]["data_po"];
		$json["header"][0]["EXDAT"] = date("Y-m-d");
		$json["header"][0]["RMRK1"] = "";//Remark
		$json["header"][0]["SEALN"] = "V0001";
		$json["header"][0]["VSSLN"] = $bank[0]["bank_vehiclenumber"];
		$json["header"][0]["DRVRN"] = $bank[0]["bank_vehicledriver"];
		$json["header"][0]["SIGN_NAME"] = "";//User
		$json["header"][0]["BRGW1"] = "0";
		$json["header"][0]["DATE1"] = date("Y-m-d");//$weight[0]["weight_gross"]
		$json["header"][0]["TIME1"] = date("H:i:s");//$weight[0]["weight_gross"]
		$json["header"][0]["BRGW2"] = "0";
		$json["header"][0]["DATE2"] = date("Y-m-d");//$weight[0]["weight_gross"]
		$json["header"][0]["TIME2"] = date("H:i:s");//$weight[0]["weight_gross"]
		$json["header"][0]["BRGTK"] = "0";
		
		$json["detail"] = array();
		$j = 0;
		for ($i = 0; $i < count($detail); $i++)
		{
			
			var_dump($detail[$i]["id"]);

			$sql = "SELECT ROUND(SUM(package_bank.`package_value`),2) AS detail_gross2 FROM delivery_bank
					LEFT JOIN package_bank ON package_bank.`deliveryid` = delivery_bank.`id`
					WHERE delivery_bank.`detailid` = '".$detail[$i]["id"]."'";
			
			$detailpo = $this->db->query($sql)->result_array();

			$detailpo[0]["detail_nett"] = $detailpo[0]["detail_gross2"] - $detail[$i]["detail_tare0"] - $detail[$i]["detail_tare1"] ;
			$detailpo[0]["detail_qtygr"] = $detailpo[0]["detail_gross2"];
			$detailpo[0]["detail_qtysl"] = "0";
			$detailpo[0]["detail_qtynv"] = "0";

			if ($detailpo[0]["detail_nett"] > $detail[$i]["detail_target"])
			{
				$detailpo[0]["detail_qtynv"] = round($detailpo[0]["detail_nett"] - $detail[$i]["detail_target"],2);
			}
			else
			{
				$detailpo[0]["detail_qtysl"] = round($detail[$i]["detail_target"] - $detailpo[0]["detail_nett"],2);
			}
				
			if ($detail[$i]["detail_gross"] != '0')
			{
				print_r($detailpo);

				$json["detail"][] = array();
				$json["detail"][$j]["VBELN"] = $bank[0]["bank_routeflag"];
				$json["detail"][$j]["MJAHR"] = date("Y");
				$json["detail"][$j]["VGBEL"] = $data[0]["data_po"];
				$json["detail"][$j]["POSNR"] = $detail[$i]["detail_matno"];
				$json["detail"][$j]["MATNR"] = $detail[$i]["detail_matnumber"];
				$json["detail"][$j]["MEINS"] = $detail[$i]["detail_matunit"];
				$json["detail"][$j]["BRGW3"] = $detail[$i]["detail_gross"];
				$json["detail"][$j]["DATE3"] = date("Y-m-d");
				$json["detail"][$j]["TIME3"] = date("H:i:s");
				$json["detail"][$j]["FPBTB"] = $detail[$i]["detail_tare0"];
				$json["detail"][$j]["FPBQC"] = $detail[$i]["detail_tare1"];
				$json["detail"][$j]["WEMNG"] = $detailpo[0]["detail_nett"];//NET
				$json["detail"][$j]["QTYSJ"] = $detail[$i]["detail_target"];
				$json["detail"][$j]["QTYGR"] = $detailpo[0]["detail_qtygr"];//GR
				$json["detail"][$j]["QTYNV"] = $detailpo[0]["detail_qtynv"];//NV
				$json["detail"][$j]["QTYSL"] = $detailpo[0]["detail_qtysl"];//SL
				$json["detail"][$j]["VRKME"] = $detail[$i]["detail_matunit"];//"KG";
				$json["detail"][$j]["RMRK1"] = "";//REMARK;
				$j++;
			}
		}
		
		$jsonstring = json_encode($json);
		
		$ch = curl_init("http://10.126.20.22/Timbangan/service.asmx/WSWB_GET");//SAP PROD
		  $ch = curl_init("http://10.126.105.99/Timbangan/service.asmx/WSWB_GET");//SAP QA
		//$ch = curl_init("http://localhost/adminfrm/index.php/test/serverpost");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonstring);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);
		
		$jsonoutput = json_decode($output);

		$jsonoutputd = json_decode($jsonoutput->d);
		
		if ($info["http_code"] == 200)
		{
			$this->db->set('data_status', $jsonoutputd->msg);
			$this->db->set('data_posttime', 'NOW()', FALSE);
			$this->db->set('data_postraw', $jsonstring);
			
			$this->db->where('id', $dataid);
			$this->db->update('data_bank');
			
			return true;
		}
		else
		{
			return false;
		}
	}
}