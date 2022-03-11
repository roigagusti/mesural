<?php
require_once('../conexiones/conexion.php');
$incomingContentType = $_SERVER['CONTENT_TYPE'];

if($incomingContentType != 'application/json'){
	header($_SERVER['SERVER_PROTOCOL'].' 500 Internal Server Error');
	exit();
}

$content = trim(file_get_contents('php://input'));
$decoded = json_decode($content, true);
$data = array();


// S'ha afegit deviceType per saber quin tipus de càpsula és i enviar les dades a la taula pertinent !!!
switch($decoded['deviceType']){
    case 'Bos':
    	$timeArray = explode(" ",$decoded['datetime']);
		$mesos = ["Jan"=>"01","Feb"=>"02","Mar"=>"03","Apr"=>"04","May"=>"05","Jun"=>"06","Jul"=>"07","Aug"=>"08","Sep"=>"09","Oct"=>"10","Nov"=>"11","Dec"=>"12"];
		$time = substr($timeArray[4],0,4)."-".$mesos[$timeArray[1]]."-".$timeArray[2]." ".$timeArray[3];
		$datetime = date("Y-m-d H:i:s", strtotime($time)+18000);

		$deviceID = $database->get("capsuleInfo","id",["deviceKey"=>$decoded['deviceKey']]);
		$values = $database->insert("capsuleValues_bos", [
			"deviceID" => $deviceID,
			"createDate" => date('Y-m-d H:i:s'),
			"value" => $decoded['value'],
			"temperature" => $decoded['temperature'],
			"humidity" => $decoded['humidity'],
			"voltatge" => $decoded['voltatge'],
			"deviceDate" => $datetime
		]);
        break;
    case 'Quar':
    	$deviceID = $database->get("capsuleInfo","id",["deviceKey"=>$decoded['deviceKey']]);
    	$values = $database->insert("capsuleValues_quar", [
			"deviceID" => $deviceID,
			"createDate" => date('Y-m-d H:i:s'),
			"setupTime" => $decoded['setupTime'],
			"sendMac" => $decoded['sendMac'],
			"sendTime" => $decoded['sendTime'],
			"receiveMac" => $decoded['receiveMac'],
			"receiveTime" => $decoded['receiveTime']
		]);
        break;
    case 'Lep':
		$json = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Barcelona&appid=0b0db523ef77dbcc29eef7f280e359b2');
		$obj = json_decode($json);
		function grados($kelvin){
		  return $kelvin-273;
		}
		$deviceID = $database->get("capsuleInfo","id",["deviceKey"=>$decoded['device']]);
		$values = $database->insert("capsuleValues_lep", [
		    "deviceID" => $deviceID,
		    "temperature" => $decoded['temperature'],
		    "humidity" => $decoded['humidity'],
		    "weatherMain" => $obj->weather[0]->main,
		    "weatherTemp" => grados($obj->main->temp),
		    "weatherFeels_like" => grados($obj->main->feels_like),
		    "weatherTemp_min" => grados($obj->main->temp_min),
		    "weatherTemp_max" => grados($obj->main->temp_max),
		    "weatherPressure" => $obj->main->pressure,
		    "weatherHumidity" => $obj->main->humidity,
		    "weatherWind_speed" => $obj->wind->speed,
		    "weatherWind_deg" => $obj->wind->deg,
		    "createDate" => date('Y-m-d H:i:s')
		]);
        break;
    case 'Lep double':
		$json = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Barcelona&appid=0b0db523ef77dbcc29eef7f280e359b2');
		$obj = json_decode($json);
		function grados($kelvin){
		  return $kelvin-273;
		}
		$deviceID1 = $database->get("capsuleInfo","id",["deviceKey"=>$decoded['device1']]);
		$values = $database->insert("capsuleValues_lep", [
		    "deviceID" => $deviceID1,
		    "temperature" => $decoded['temperature1'],
		    "humidity" => $decoded['humidity1'],
		    "weatherMain" => $obj->weather[0]->main,
		    "weatherTemp" => grados($obj->main->temp),
		    "weatherFeels_like" => grados($obj->main->feels_like),
		    "weatherTemp_min" => grados($obj->main->temp_min),
		    "weatherTemp_max" => grados($obj->main->temp_max),
		    "weatherPressure" => $obj->main->pressure,
		    "weatherHumidity" => $obj->main->humidity,
		    "weatherWind_speed" => $obj->wind->speed,
		    "weatherWind_deg" => $obj->wind->deg,
		    "createDate" => date('Y-m-d H:i:s')
		]);
		$deviceID2 = $database->get("capsuleInfo","id",["deviceKey"=>$decoded['device2']]);
		$values = $database->insert("capsuleValues_lep", [
		    "deviceID" => $deviceID2,
		    "temperature" => $decoded['temperature2'],
		    "humidity" => $decoded['humidity2'],
		    "weatherMain" => $obj->weather[0]->main,
		    "weatherTemp" => grados($obj->main->temp),
		    "weatherFeels_like" => grados($obj->main->feels_like),
		    "weatherTemp_min" => grados($obj->main->temp_min),
		    "weatherTemp_max" => grados($obj->main->temp_max),
		    "weatherPressure" => $obj->main->pressure,
		    "weatherHumidity" => $obj->main->humidity,
		    "weatherWind_speed" => $obj->wind->speed,
		    "weatherWind_deg" => $obj->wind->deg,
		    "createDate" => date('Y-m-d H:i:s')
		]);
        break;
}	

if($values){
	$data = array(
		"received" => 1,
		"inserted" => 1
	);
}else{
	$data = array(
		"received" => 1,
		"inserted" => 0
	);		
}
header('Content-Type: application/json');
echo json_encode(array("data" => $data));
?>