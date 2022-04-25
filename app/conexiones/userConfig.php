<?php 
require('conexion.php');
session_start();

switch($_GET['action']){
	// USUARI
	case 'editProfile':
		$editProfile = $database->update("users", [
			"nom" => $_POST['userNom']
		],['id'=>$_POST['userId']]);

		if($_POST['userPass']!=""){
			if($_POST['userPass']==$_POST['userPass2']){
				$editProfilePass = $database->update("users", [
				"password" => password_hash($_POST['userPass'], PASSWORD_DEFAULT)
			],['id'=>$_POST['userId']]);
			}else{
				header('Location: ../config.php?event=pass-error');
			}
		}
		
		header('Location: ../config.php?event=editUser-success');
		break;

	default:
		header('Location: ../config.php');
		break;
}
?>