<?php
require('conexiones/conexion.php');
session_start();

$gaugeNumber = $_GET['gauge'];
$user = $_GET['user'];


$values = $database->insert("gaugeProperty", [
"userid" => $user,
"gaugeNumber" => $gaugeNumber,
"create_date" => date('Y-m-d H:i:s'),
]);
?>