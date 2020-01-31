<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller
{	
	public function index()
	{
	}
	
	public function serverpost()
	{	
		$dat = (object)[];
		$dat->msg = "Data Detail Down (Simulation)";
		//$dat->raw = file_get_contents('php://input');
		 		
		$data = (object)[];
		$data->d = json_encode($dat);

		//var_dump($data->d);
	
		echo json_encode($data);
	}

	public function wsdldata()
	{	
		$soapclient = new SoapClient('http://10.126.20.22/timbangan/service.asmx?WSDL', array('trace'=>1));
		//$soapclient = new SoapClient('http://10.126.105.99/timbangan/service.asmx?WSDL', array('trace'=>1));
		//$soapclient = new SoapClient('http://webqa.indofood.com/timbangan/service.asmx?WSDL', array('trace'=>1));

		$params = array('Werks'=>'2875', 'Lifnr'=>'115543', 'Ebeln'=>'4504694593');
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
				print_r($soap_result);		
		}
		
		//return $newid;
	}
}
