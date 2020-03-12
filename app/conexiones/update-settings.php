<?php session_start();
#Incloure arxius de connexió a BBDD
require('conexion.php');

#Si hi ha petició d'actualitzar name, pujar-ho a la BBDD
if($_GET['action']=="name"){
	if($_POST['name']!=""){
		$values = $database->update("users", [
			"nom" => $_POST['name'],
			"modificate_date" => date('Y-m-d H:i:s')
		], ["email"=>$_SESSION['k_username']]);
		header('Location: ../settings.php');
	}else{
		header('Location: ../settings.php');
	}
}

#Si hi ha petició d'actualitzar l'empresa, pujar-ho a la BBDD
if($_GET['action']=="corporation"){
	if($_POST['corporation']!=""){
		$values = $database->update("users", [
			"corporation" => $_POST['corporation'],
			"modificate_date" => date('Y-m-d H:i:s')
		], ["email"=>$_SESSION['k_username']]);
		header('Location: ../settings.php');
	}else{
		header('Location: ../settings.php');
	}
}

#Si hi ha petició d'actualitzar l'idioma, pujar-ho a la BBDD
if($_GET['action']=="language"){
	if($_POST['language']!=""){
		$values = $database->update("users", [
			"language" => $_POST['language'],
			"modificate_date" => date('Y-m-d H:i:s')
		], ["email"=>$_SESSION['k_username']]);
		header('Location: ../settings.php');
	}else{
		header('Location: ../settings.php');
	}
}

#Si hi ha petició d'actualitzar la contrasenya, pujar-ho a la BBDD
if($_GET['action']=="password"){
	if($_POST['password']!=""){
		$values = $database->update("users", [
			"password" => password_hash($_POST['password'], PASSWORD_DEFAULT),
			"modificate_date" => date('Y-m-d H:i:s')
		], ["email"=>$_SESSION['k_username']]);
		header('Location: ../settings.php');
	}else{
		header('Location: ../settings.php');
	}
}