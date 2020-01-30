<?php
if ($_SERVER['HTTPS'] != "on") {
    $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    header("Location: $url");
    exit;
}
if ($_SERVER['SERVER_NAME'] != "sandbox.mesural.com") {
    $page = explode("/",$_SERVER['REQUEST_URI'])['2'];
    $url = "https://sandbox.mesural.com/".$page;
    header("Location: $url");
    exit;
}

require('conexiones/conexion.php');
session_start();

$ipaddress = $_SERVER['REMOTE_ADDR'];
$user = $_SERVER['REMOTE_USER'];

require_once("conexiones/geoip2.phar");
use GeoIp2\Database\Reader;
$reader = new Reader('conexiones/GeoLite2-City.mmdb');
$record = $reader->city($_SERVER['REMOTE_ADDR']);

function isMobileDevice() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
if(isMobileDevice()){
    $mobile = 1;
}
else {
    $mobile = 0;
}

$taulausuaris = $database->insert("visitors", [
"ip" => $ipaddress,
"user" => $user,
"city" => $record->city->name,
"postal" => $record->postal->code,
"mobile" => $mobile,
"type" => "visit",
"visit_date" => date('Y-m-d H:i:s')
]);
?>