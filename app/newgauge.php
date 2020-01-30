<?php
require('conexiones/conexion.php');

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
$number = substr(str_shuffle($permitted_chars), 0, 8);

if($database->has("gaugeInfo", ["number" => $number])){
	header("Refresh:0");
}else{
	$values = $database->insert("gaugeInfo", [
	"number" => $number,
	"create_date" => date('Y-m-d H:i:s')
	]);
	echo $number;
}
?>