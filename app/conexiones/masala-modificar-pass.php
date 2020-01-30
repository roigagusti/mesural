<?php 
require('conexion.php');
session_start();

if($_POST["pass1"] == $_POST["pass2"]) {
	$database->update("usuaris", [
	  "pass" => password_hash($_POST["pass1"], PASSWORD_BCRYPT), "modificapass" => 1
	  ], ["usuari" => $_SESSION['k_username']]);

	header('Location: ../nomines.php');
}else{
	header('Location: ../editar.php');
}
?>
