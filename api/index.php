<?php
require_once('conexiones/conexion.php');
require_once('functions.php');

switch($_GET['get']){
    case 'apikey':
    	$id=$_GET['id'];
    	$apiKey=generateApiKey(32);
		$values=$database->update("users",["apiKey"=>$apiKey],["id"=>$id]);

		header('Location: //app.mesural.com/config.php');
		echo "The apiKey has been created, you will be redirected or you can click <a href='//app.mesural.com/config.php>here</a>.";
        break;

    case 'userInfo':
	    $apiKey=$_GET['key'];
	    $user=$database->get("users",["nom","email","language"],["apiKey"=>$apiKey]);

	    $apiHash=$_GET['hash'];
	    $emailHash=hash("sha256",$user['email']);
	    if($apiHash==$emailHash){
	    	$apiStatus=1;
		    $sysStatus=1;
		    $reponse=["apiStatus"=>$apiStatus,"sysStatus"=>$sysStatus,"data"=>$user];
	    }else{
	    	$reponse=["code"=>'400',"message"=>"Error de hash"];
	    }
        break;

    case 'devices':
	    $apiKey=$_GET['key'];
	    $user=$database->get("users",["id","email"],["apiKey"=>$apiKey]);

	    $posibleFields=["deviceKey","deviceMAC","deviceType","frequency","deviceName","devicePlace","deviceUse"];
	    $fields=['deviceID'];
	    if(isset($_GET['fields'])){
	    	$tags = explode(",",$_GET['fields']);
	    	foreach($tags as $tag){
	    		if(in_array($tag,$posibleFields)){
	    			$fields[]=$tag;
	    		}
	    	}
	    }

	    $apiHash=$_GET['hash'];
	    $emailHash=hash("sha256",$user['email']);

	    $data=$database->select("capsuleProperty",["[>]capsuleInfo"=>["deviceID" => "id"]],$fields,["userID"=>$user['id']]);

	    if($apiHash==$emailHash){
	    	$apiStatus=1;
		    $sysStatus=1;
		    $reponse=["apiStatus"=>$apiStatus,"sysStatus"=>$sysStatus,"data"=>$data];
	    }else{
	    	$reponse=["code"=>'400',"message"=>"Error de hash"];
	    }
        break;

    case 'values':
	    $apiKey=$_GET['key'];
	    $user=$database->get("users",["id","nom","email"],["apiKey"=>$apiKey]);

	    $apiHash=$_GET['hash'];
	    $emailHash=hash("sha256",$user['email']);

	    $deviceID=$_GET['device'];
	    $property=$database->has("capsuleProperty",["AND"=>["userID"=>$user['id'],"deviceID"=>$deviceID]]);
	    if(!$property){
	    	$reponse=["code"=>'400',"message"=>"Error de propiedad de device"];
	    	break;
	    }

	    $posibleFields=["temperature","humidity","weatherMain","weatherTemp","weatherFeels_like","weatherTemp_min","weatherTemp_max","weatherPressure","weatherHumidity","weatherWind_speed","weatherWind_deg"];
	    $fields=['createDate'];
	    if(isset($_GET['fields'])){
	    	$tags = explode(",",$_GET['fields']);
	    	foreach($tags as $tag){
	    		if(in_array($tag,$posibleFields)){
	    			$fields[]=$tag;
	    		}
	    	}
	    }
	    $limit=$_GET['limit'];
	    $data=$database->select("capsuleValues_lep",$fields,["LIMIT"=>$limit],["deviceID"=>$deviceID]);

	    if($apiHash==$emailHash){
	    	$apiStatus=1;
		    $sysStatus=1;
		    $reponse=["apiStatus"=>$apiStatus,"sysStatus"=>$sysStatus,"data"=>$data];
	    }else{
	    	$reponse=["code"=>'400',"message"=>"Error de hash"];
	    }
        break;
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($reponse);
?>