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

if($decoded['sendMac'] != ''){

	$values = $database->insert("spaceM", [
		"datetime" => date('Y-m-d H:i:s'),
		"setupTime" => $decoded['setupTime'],
		"sendMac" => $decoded['sendMac'],
		"sendTime" => $decoded['sendTime'],
		"receiveMac" => $decoded['receiveMac'],
		"receiveTime" => $decoded['receiveTime']
	]);

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