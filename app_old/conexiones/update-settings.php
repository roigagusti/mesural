<?php session_start();
#Incloure arxius de connexió a BBDD
require('conexion.php');
#Si hi ha petició d'actualitzar, pujar-ho a la BBDD
if($_GET['action']=="personal"){
	$values = $database->update("users", [
		"nom" => $_POST['name'],
		"corporation" => $_POST['corporation'],
		"language" => $_POST['language'],
		"modificate_date" => date('Y-m-d H:i:s')
	], ["email"=>$_SESSION['user_name']]);

	if($_POST['password']!=""){
		if($_POST['password']==$_POST['re-password']){
			$values = $database->update("users", [
			"password" => password_hash($_POST['password'], PASSWORD_DEFAULT),
			"modificate_date" => date('Y-m-d H:i:s')
			], ["email"=>$_SESSION['user_name']]);
		}else{
			header('Location: ../settings.php?event=fail-password');
		}
	}
	header('Location: ../settings.php?event=success');
}
#Si hi ha petició de desubscriure's, pujar-ho a la BBDD
if($_GET['action']=="unsubscribe"){
	$values = $database->update("users", [
		"unsubscribed" => 1,
		"modificate_date" => date('Y-m-d H:i:s')
	], ["email"=>$_GET['email']]);
	header('Location: ../login.php?event=unsubscribed-success');
}
#Si hi ha petició de desubscriure's, pujar-ho a la BBDD
if($_GET['action']=="delete-account"){
	$values = $database->update("users", [
		"active" => 0,
		"modificate_date" => date('Y-m-d H:i:s')
	], ["id"=>$_POST['user']]);
	header('Location: ../login.php?event=deleted-success');
}