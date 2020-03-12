<?php
require_once('conexiones/conexion.php');

#Comprovem si el canal segur 
if($_SERVER['HTTPS'] != "on") {
	echo "Non-secure channel";
}else{
	#Agafem tots els paràmetres introduits per la URL
	$id = $_GET['id'];
	$time = $_GET['time'];
	$value = $_GET['value'];
	$cc = $_GET['cc'];
	#Convertim el valor de $time a format decent
	$datetime = "20".substr($time,4,2)."-".substr($time,2,2)."-".substr($time,0,2)." ".substr($time,6,2).":".substr($time,8,2).":".substr($time,10,2);

	#Comprovem si falta algun dels paràmetres
	if($id == "" || $time == "" || $value == "" || $cc == ""){echo 'Not enough data. We need "id, time, value and cc".';}

	#Es substitueix el valor string de la ID per un valor numèric
	$dcArray = ["0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
	for ($i = 0; $i < strlen($id); $i++) {
		$rest = substr($id, $i, 1);
	    $key = array_search($rest, $dcArray);
	    $idValue .= $key;
	}

	#Es crea la funció que converteix cadena de números en un dígit de control a-z
	function lletra($num){
		$a = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"];
		$n = floatval($num)-floor(floatval($num)/26)*26;
		return $a[$n];
	}

	#Concatenació dels tres dígits de control creant el codi de control
	$ccIntern = lletra($idValue).lletra($time).lletra($value);

	#Es comprova que coincideixin els CC
	if($cc != $ccIntern){
		echo "CC value is not valid";
	}else{
		#Es verifica si existeix una entrada per a aquest ID amb aquest valor de Datatime
		if($database->has("capsuleValues", ["AND" => ["capsuleid" => $id,"datetime" => $datetime]])){
			$values = $database->update("capsuleValues", [
			"value" => $value,
			"cc" => $ccIntern,
			"modificate_date" => date('Y-m-d H:i:s')
			]);

			echo "Update success";

		#Si no hi ha cap entrada, s'inserten les dades a la BBDD
		}else{
			$values = $database->insert("capsuleValues", [
			"capsuleid" => $id,
			"datetime" => $datetime,
			"value" => $value,
			"cc" => $ccIntern,
			"create_date" => date('Y-m-d H:i:s'),
			"modificate_date" => date('0000-00-00 00:00:00')
			]);

			echo "Insert success";
		}
	}
}
?>