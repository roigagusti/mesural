<?php
// Redirecció a HTTPS
if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on"){
  header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
  exit;
}
require('conexiones/conexion.php');
session_start();
include_once("sections/sessionStart.php");

$data = $database->select('capsuleValues_lep',[
  'createDate',
  'deviceID',
  'type'
],['type'=>0,"ORDER"=>["createDate"=>"DESC"]]);
foreach($data as $d){
  $lastTimeCapsula = $d['createDate'];
  $device = $database->get('capsuleInfo','deviceKey',['id'=>$d['deviceID']]);
  echo $lastTimeCapsula." -> ".$device."<br>";
}
?>