<?php
require('conexion.php');

function token($longitud) {
	$key = '';
	$pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$max = strlen($pattern)-1;
	for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
	return $key;
}
$token = token(64);
$database->update("users", [
	"token" => $token
	], ["email" => $to]);

$subject = "Recuperar password Mesural";
$body = 'Hemos recibido la solicitud de recuperacion de password. Haz click <a href="https://app.mesural.com/conexiones/validar_usuario.php?token='.$token.'">aqui</a> para generar una nueva password.';
$returnsuccess = "https://app.mesural.com/login.php?event=forgot-success";
$returnfail = "https://app.mesural.com/login.php?event=error";
?>