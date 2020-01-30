<?php
require('conexiones/conexion.php');
session_start();

$gaugeNumber = $_GET['id'];
$initialValue = rand(-15,15); //maxim increase en um
$gaugeIncrease = [-0.1,0,0.1]; //en um


$gaugeValue = $initialValue;
for ($iteracio = 0; $iteracio < 1440; $iteracio++){
	$values = $database->insert("gaugeValues", [
	"gaugeid" => $gaugeNumber,
	"value" => $gaugeValue,
	"date" => date('Y-m-d'),
	"time" => date('H:i:sa')
	]);

	$pasoRand = rand(0,2);
	$paso = $gaugeIncrease[$pasoRand];
	$gaugeValue += $paso;
}
?>