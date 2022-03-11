<?php session_start();
#Incloure arxius de connexió a BBDD
require('conexion.php');
#Si hi ha petició d'actualitzar, pujar-ho a la BBDD
switch($_GET['action']){
	case 'add':
		if($database->has("capsuleInfo",["number"=>$_POST['capsuleNumber']])){
			$values = $database->insert("capsuleProperty", [
				"userid" => $_POST['userId'],
				"capsuleNumber" => $_POST['capsuleNumber'],
				"nom" => $_POST['customName'],
				"create_date" => date('Y-m-d H:i:s')
			]);
			header('Location: ../capsules.php?event=success');
		}else{
			header('Location: ../capsules.php?event=fail');			
		}
		break;

	case 'edit':
		$values = $database->update("capsuleProperty", [
			"nom" => $_POST['customName'],
			"create_date" => date('Y-m-d H:i:s')
		],["id"=>$_POST['propertyId']]);
		header('Location: ../capsules.php');
		break;

	case 'delete':
		$values = $database->delete("capsuleProperty", ["id"=>$_POST['propertyId']]);
		header('Location: ../capsules.php');
		break;

	case 'admin-add':
		if(!$database->has("capsuleInfo",["number"=>$_POST['capsuleNumber']])){
		$values = $database->insert("capsuleInfo", [
			"number" => $_POST['capsuleNumber'],
			"create_date" => date('Y-m-d H:i:s')
		]);
		header('Location: ../admin.php?event=success');
		}else{
			header('Location: ../admin.php?event=fail');			
		}
		break;
	
	default:
		header('Location: ../capsules.php');
		break;
}