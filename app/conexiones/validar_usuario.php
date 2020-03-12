<?php 
require('conexion.php');
session_start();
if(isset($_POST["email"])&&isset($_POST["password"])) {	
	$email = $_POST["email"];
	$password = $_POST["password"];

	if(! filter_var($email, FILTER_VALIDATE_EMAIL)){
		header('Location: ../login.php?lang='.$_GET['lang'].'&event=email-error');
    }else{
    	if($database->has("users",["email" => $email])){
			
			$taulausuaris = $database->select("users", [
			  "id",
			  "email",
			  "password",
			  "nom",
			  "emailconfirmed"
			  ], ["email" => $email]);
			
			foreach($taulausuaris as $data){
				if($data['emailconfirmed']==0){
					header('Location: ../login.php?lang='.$_GET['lang'].'&event=email-not-confirmed');
					echo "Email not confirmed, you will be redirected or you can click <a href='../login.php?lang=".$_GET['lang']."&event=email-not-confirmed'>here</a>.";
				}else{
					if(password_verify($password,$data['password'])){
						$_SESSION["k_username"] = $email;
						header('Location: ../index.php?lang='.$_GET['lang']);
						echo "Welcome ".$data['nom'].". You will be redirected or you can click <a href='../index.php?lang=".$_GET['lang'].">here</a>.";
					}else{
						header('Location: ../login.php?lang='.$_GET['lang'].'&event=signin-error');
						echo "Wrong password, you will be redirected or you can click <a href='../login.php?lang=".$_GET['lang']."&event=signin-error'>here</a>.";
					}
				}
			}
		}else{
			header('Location: ../login.php?lang='.$_GET['lang'].'&event=error');
			echo "Email not found, you will be redirected or you can click <a href='../login.php?lang=".$_GET['lang']."&event=error'>here</a>.";
		}
	}
}else{
	if(isset($_GET['token'])){
		if($database->has("users",["token" => $_GET['token']])){
			$usuaris = $database->select("users", [
				"email",
				"token"
				], ["token" => $_GET['token']]);
			foreach($usuaris as $usuari){
				$database->update("users", [
					"token" => "",
					"emailconfirmed" => 1,
					], ["token" => $_GET['token']]);
				$_SESSION["k_username"] = $usuari['email'];
				header('Location: ../index.php');
				echo "Welcome. You will be redirected or you can click <a href='../index.php'>here</a>.";
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
			$_SESSION["k_username"] = $data['usuari'];
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