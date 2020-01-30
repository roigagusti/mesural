<?php 
require('conexion.php');
require_once('mail.php');
session_start();

function generarCodi($longitud) {
 $key = '';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
 return $key;
}

$codi = generarcodi(20);

if(isset($_POST["mail"])) {
	$database->update("usuaris", [
	  "mail" => $_POST["mail"],
	  "verificarmail" => "0",
	  "codimail" => $codi
	  ], ["usuari" => $_SESSION['k_username']]);

	enviaMail($mail, $codi);
	header('Location: ../nomines.php');
}else{
	header('Location: ../editar.php');
}
?>
