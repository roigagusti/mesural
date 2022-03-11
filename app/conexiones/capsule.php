<?php 
require('conexion.php');
session_start();

switch($_GET['action']){
	// CAPSULES
	case 'newCapsule':
		$device = $database->insert("capsuleInfo", [
			"deviceKey" => $_POST['deviceKey'],
			"deviceType" => $_POST['deviceType'],
			"createDate" => date('Y-m-d H:i:s'),
			"frequency" => $_POST['deviceFrequency']
		]);
		header('Location: ../admin.php?event=newCapsule-success');
		break;

	case 'addCapsule':
		$deviceID = $database->get("capsuleInfo","id",["deviceKey"=>$_POST['deviceKey']]);
		if(strlen($deviceID)>0){
			$device = $database->insert("capsuleProperty", [
				"userID" => $_POST['userID'],
				"deviceID" => $deviceID,
				"deviceName" => $_POST['deviceName'],
				"devicePlace" => $_POST['devicePlace'],
				"deviceUse" => $_POST['deviceUse'],
				"createDate" => date('Y-m-d H:i:s')
			]);
			header('Location: ../index.php?event=addCapsule-success');
		}else{
			header('Location: ../index.php?event=addCapsule-fail');
		}
		break;

	case 'editCapsule':
		$editCapsule = $database->update("capsuleProperty", [
				"deviceName" => $_POST['deviceName'],
				"devicePlace" => $_POST['devicePlace'],
				"deviceUse" => $_POST['deviceUse']
		],['deviceID'=>$_POST['deviceID']]);

		header('Location: ../index.php?event=editCapsule-success');
		break;

	case 'removeCapsule':
		$rmCapsule = $database->delete("capsuleProperty",['deviceID'=>$_GET['id']]);

		header('Location: ../index.php?event=rmCapsule-success');
		break;

	default:
		header('Location: ../index.php');
		break;
}
?>