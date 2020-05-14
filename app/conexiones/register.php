<?php 
require('conexion.php');
session_start();

function token($longitud) {
	$key = '';
	$pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$max = strlen($pattern)-1;
	for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
	return $key;
}

if(isset($_POST["email"])&&isset($_POST["password"])&&isset($_POST["re-password"])) {
	$profile = $_POST["profile"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$repassword = $_POST["re-password"];
	$nom = explode("@",$email);

	if($password != $repassword){
		header('Location: ../register.php?lang='.$_GET['lang'].'&event=pass-differents');
	}else{
		if($profile == "0"){
			header('Location: ../register.php?lang='.$_GET['lang'].'&event=not-profile');
		}else{
			if($database->has("users",["email" => $email])){
				header('Location: ../register.php?lang='.$_GET["lang"].'&event=email-exists');
			}else{
				$taulausuaris = $database->insert("users", [
				"email" => $email,
				"password" => password_hash($password, PASSWORD_DEFAULT),
				"create_date" => date('Y-m-d H:i:s'),
				"nom" => $nom[0],
				"emailconfirmed" => 0,
				"language" => "english",
				"token" => token(64)
				]);

				header('Location: sendmail.php?type=register&to='.$email.'&lang='.$_GET["lang"]);
			}
		}
	}
}
?>