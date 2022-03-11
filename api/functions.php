<?php
function grados($kelvin){
  return $kelvin-273;
}
function generateApiKey($longitud){
	$key = '';
	$pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$max = strlen($pattern)-1;
	for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
	return $key;
}
function insertData($deviceKey,$temperature,$humidity){
	$deviceID1 = $database->get("capsuleInfo","id",["deviceKey"=>$deviceKey]);
	$values = $database->insert("capsuleValues_lep", [
	    "deviceID" => $deviceID1,
	    "temperature" => $temperature,
	    "humidity" => $humidity,
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
}
?>