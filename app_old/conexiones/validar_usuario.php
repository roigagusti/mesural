<?php 
require('conexion.php');
session_start();
//Comprovem que el mail i la contrassenya coincideixen
if(isset($_POST["email"])&&isset($_POST["password"])) {	
	$email = $_POST["email"];
	$password = $_POST["password"];
	//Comprovem que el mail hagi estat validat
	if(! filter_var($email, FILTER_VALIDATE_EMAIL)){
		header('Location: ../login.php?lang='.$_GET['lang'].'&event=email-error');

	}else{
    	if($database->has("users",["email" => $email])){
			
			$data = $database->get("users", [
			  "id",
			  "email",
			  "password",
			  "nom",
			  "active",
			  "emailconfirmed"
			  ], ["email" => $email]);
			
			if($data['emailconfirmed']==0){
				header('Location: ../login.php?lang='.$_GET['lang'].'&event=email-not-confirmed');
				echo "Email not confirmed, you will be redirected or you can click <a href='../login.php?lang=".$_GET['lang']."&event=email-not-confirmed'>here</a>.";
			}else if($data['active']==0){
				header('Location: ../login.php?lang='.$_GET['lang'].'&event=deleted-account');
				echo "The account had been deleted, you will be redirected or you can click <a href='../login.php?lang=".$_GET['lang']."&event=deleted-account'>here</a>.";
			}else{
				if(password_verify($password,$data['password'])){
					$_SESSION["user_name"] = $email;
					header('Location: ../index.php?lang='.$_GET['lang']);
					echo "Welcome ".$data['nom'].". You will be redirected or you can click <a href='../index.php?lang=".$_GET['lang'].">here</a>.";
				}else{
					header('Location: ../login.php?lang='.$_GET['lang'].'&event=signin-error');
					echo "Wrong password, you will be redirected or you can click <a href='../login.php?lang=".$_GET['lang']."&event=signin-error'>here</a>.";
				}
			}
		}else{
			header('Location: ../login.php?lang='.$_GET['lang'].'&event=error');
			echo "Email not found, you will be redirected or you can click <a href='../login.php?lang=".$_GET['lang']."&event=error'>here</a>.";
		}
	}
}else{
	if(isset($_GET['token'])){
		if($_GET['token']!=""){
			if($database->has("users",["token" => $_GET['token']])){
				$usuari = $database->get("users", [
					"email",
					"token"
					], ["token" => $_GET['token']]);
				$database->update("users", [
					"token" => "",
					"emailconfirmed" => 1,
					], ["token" => $_GET['token']]);
				$_SESSION["user_name"] = $usuari['email'];
				header('Location: ../settings.php');
				echo "Welcome. You will be redirected or you can click <a href='../settings.php'>here</a>.";
			}else{
				header('Location: ../login.php?event=token-fail');
			}
		}else{
			header('Location: ../login.php?event=token-fail');			
		}
	}
}
/*if(isset($_GET['key'])){
	if($database->has("usuaris", [
	  "token" => $_GET['key']])){
		$taulausuaris = $database->select("usuaris", [
			"usuari",
			"nom"
		], ["token" => $_GET['key']]);
		foreach($taulausuaris as $data){
			$_SESSION["user_name"] = $data['usuari'];
			if($database->update("usuaris", 
				["token" => ""],
				["usuari" => $data['usuari']]
			)){
				echo "borrat";
			}
			echo $data['nom'].", has entrat correctament. En breu seràs redirigit automàticament. En cas contrari fes clic <a href='../nomines.php'>aquí</a>.";
			header('Location: ../nomines.php');
		}
	}else{
		header('Location: ../index.php?event=link-error');
			echo "La clau no existeix, seràs redirigit automàticament. En cas contrari fes clic <a href='../index.php'>aquí</a>.";
	}
}*/
?>