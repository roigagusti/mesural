<?php 
function token($longitud) {
  $key = '';
  $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $max = strlen($pattern)-1;
  for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
  return $key;
}
function dateDistance($datetime){
  $strTime = array("segundos", "minutos", "horas", "días", "meses", "años");
  $length = array("60","60","24","30","12","10");
  $timestamp = strtotime($datetime);
  $currentTime = time();
  $diff = $currentTime - $timestamp;
  if($diff<60){return "Hace un momento";}elseif($diff>150000000){return "-";}else{
    for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
    $diff = $diff / $length[$i];
    }

    $diff = round($diff);
    return "Hace ".$diff." ".$strTime[$i];
  }
}
function timeDistance($datetime){
  $timestamp = strtotime($datetime);
  $currentTime = time();
  $diff = $currentTime - $timestamp;
  return $diff;  
}
?>