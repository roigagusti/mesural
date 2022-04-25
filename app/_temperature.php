<?php
require_once('conexiones/conexiones.php');
$incomingContentType = $_SERVER['CONTENT_TYPE'];

if($incomingContentType != 'application/json'){
  header($_SERVER['SERVER_PROTOCOL'].' 500 Internal Server Error');
  exit();
}

$content = trim(file_get_contents('php://input'));
$decoded = json_decode($content, true);
$data = array();

$json = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Barcelona&appid=0b0db523ef77dbcc29eef7f280e359b2');
$obj = json_decode($json);
function grados($kelvin){
  return $kelvin-273;
}

if($decoded['device'] != ''){

  $values = $database->insert("capsuleValues_lep", [
    "deviceID" => $decoded['device'],
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
}
header('Content-Type: application/json');
echo json_encode(array("data" => $data));
?>