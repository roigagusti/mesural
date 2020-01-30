<?php
$lang = "en";
if(isset($_GET['lang'])){
	$lang = $_GET['lang'];
	if($lang =="es"){
		include_once("languages/es_translate.php");
	}else{
		include_once("languages/en_translate.php");
	}
}else{
	$lang = "en";
	include_once("languages/en_translate.php");
}
?>