<?php
require('conexiones/conexion.php');

/*$values = $database->insert("capsuleValues_bos", [
	"deviceID" => $decoded['id'],
	"createDate" => date('Y-m-d H:i:s'),
	"value" => $decoded['value'],
	"temperature" => $decoded['temperature'],
	"humidity" => $decoded['humidity'],
	"voltatge" => $decoded['voltatge'],
	"deviceDate" => date('Y-m-d H:i:s')
]);*/
$values = $database->insert("capsuleValues_bos", [
	"deviceID" => 'mucewu',
	"createDate" => date('Y-m-d H:i:s'),
	"value" => 3.45,
	"temperature" => 27.9,
	"humidity" => 50.2,
	"voltatge" => 3.05,
	"deviceDate" => date('Y-m-d H:i:s')
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
$prova =  $database->get("users", 'nom', ["id" => 69]);
echo $prova.'<br>';
print_r($data);
?>