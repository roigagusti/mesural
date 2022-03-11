<?php
require_once('conexiones/conexion.php');

$content = trim(file_get_contents('php://input'));
$decoded = json_decode($content, true);
$data = array();

$deviceID = $database->get("capsuleInfo","id",["deviceKey"=>$decoded['deviceKey']]);
$values = $database->insert("capsuleValues_lep", [
    "deviceID" => $deviceID,
    "temperature" => $decoded['temperature'],
    "humidity" => $decoded['humidity'],
    "createDate" => date('Y-m-d H:i:s')
]);
$guti = $database->get("capsuleInfo","id",["deviceKey"=>'mesural_0020']);

if($values){
	$data = array(
		"received" => 1,
		"inserted" => 1,
		"prova1" => $deviceID,
		"prova2" => $guti
	);
}else{
	$data = array(
		"received" => 1,
		"inserted" => 0,
		"prova1" => $deviceID,
		"prova2" => $guti
	);		
}
header('Content-Type: application/json');
echo json_encode(array("data" => $data));

?>