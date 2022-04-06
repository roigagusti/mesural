<?php
function inicialsNom($nom){
	$trans = array("À"=>"A","Á"=>"A","È"=>"E","É"=>"E","Ì"=>"I","Í"=>"I","Ò"=>"O","Ó"=>"O","Ù"=>"U","Ú"=>"U");
    $nomWords = explode(" ", strtr($nom,$trans));
    $inicials = strtoupper($nomWords[0][0].$nomWords[1][0]);
    return $inicials;
}
if(isset($_SESSION['user_name'])) {
  $id = $database->get("users","id",["email"=>$_SESSION['user_name']]);
  $userEmail = $_SESSION['user_name'];
  $userName = $database->get("users","nom",["id"=>$id]);
  $accountType = $database->get("users","type",["id"=>$id]);

  $userLang = $database->get("users","language",["id"=>$userId]);
  include_once("languages.php");
//Si no hi ha sessió redirigir a Login
}else{
  $callback = $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
  $callback = str_replace("#","$23",$callback);
  $callback = str_replace("&","$26",$callback);
  $callback = str_replace("?","$3F",$callback);
  header('Location: login.php?callback=https://'.$callback);
}
?>