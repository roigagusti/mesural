<?php
require('conexion.php');
$register = $database->select("users", [
"email",
"nom",
"token"
], ["email" => $to]);

foreach($register as $registered){
	$correu = $registered['email'];
	$nom = $registered['nom'];
	$token = $registered['token'];
}

$subject = "Bienvenido a Mesural";
$body = 'Bienvenido de nuevo a Mesural. Te has registrado con el nombre: '.$nom.' y con el email: '.$correu.'<br>Confirma tu direccion haciendo click <a href="https://app.mesural.com/conexiones/validar_usuario.php?token='.$token.'">aqui</a>';
$returnsuccess = "https://app.mesural.com/login.php?event=success";
$returnfail = "https://app.mesural.com/login.php?event=email-fail";
?>