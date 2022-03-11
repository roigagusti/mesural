<?php
require_once('conexiones/conexion.php');
$incomingContentType = $_SERVER['CONTENT_TYPE'];

if($incomingContentType != 'application/json'){
	header($_SERVER['SERVER_PROTOCOL'].' 500 Internal Server Error');
	exit();
}

$content = trim(file_get_contents('php://input'));
$decoded = json_decode($content, true);
$data = array();

// S'ha canviat capsuleId per deviceID !!!
if($decoded['deviceID'] != ''){
	// S'ha afegit deviceType per saber quin tipus de càpsula és i enviar les dades a la taula pertinent !!!
	switch($decoded['deviceType']){
	    case 'bos':
	    	$timeArray = explode(" ",$decoded['datetime']);
			$mesos = ["Jan"=>"01","Feb"=>"02","Mar"=>"03","Apr"=>"04","May"=>"05","Jun"=>"06","Jul"=>"07","Aug"=>"08","Sep"=>"09","Oct"=>"10","Nov"=>"11","Dec"=>"12"];
			$time = substr($timeArray[4],0,4)."-".$mesos[$timeArray[1]]."-".$timeArray[2]." ".$timeArray[3];
			$datetime = date("Y-m-d H:i:s", strtotime($time)+18000);

			$values = $database->insert("capsuleValues_bos", [
				"deviceID" => $decoded['deviceID'],
				"createDate" => date('Y-m-d H:i:s'),
				"value" => $decoded['value'],
				"temperature" => $decoded['temperature'],
				"humidity" => $decoded['humidity'],
				"voltatge" => $decoded['voltatge'],
				"deviceDate" => $datetime
			]);
	        break;
	    case 'quar':
	    	$values = $database->insert("capsuleValues_quar", [
				"deviceID" => $decoded['deviceID'],
				"createDate" => date('Y-m-d H:i:s'),
				"setupTime" => $decoded['setupTime'],
				"sendMac" => $decoded['sendMac'],
				"sendTime" => $decoded['sendTime'],
				"receiveMac" => $decoded['receiveMac'],
				"receiveTime" => $decoded['receiveTime']
			]);
	        break;
	    case 'lep':
	        break;
	    default:
	        break;

	if($values){
		$data = array(
			"received" => 1,
			"inserted" => 1
		);
	}else{
		$data = array(
			"received" => 1,
			"inserted" => 0
		);		
	}
}
header('Content-Type: application/json');
echo json_encode(array("data" => $data));
?>