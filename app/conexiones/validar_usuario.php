<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
require('conexion.php');
require('../sections/functions.php');
session_start();

function crearUrl($page,$args){
	$params = $args;
    if(isset($_POST['callback'])){
        $callback = explode("$3F",$_POST['callback']);
        $page = $callback[0];
        if(strlen($callback[1])>0){
        	$callbackParams = explode("$26",$callback[1]);
        	foreach($callbackParams as $x){
        		$params[]=$x;
        	}
        }
    }
    if(count($params)>0){
        $parametres = implode('&',$params);
        $url = $page.'?'.$parametres;
        $url = str_replace('$23','#',$url);
    }else{
        $url = $page;
    }
    return $url;
}
//Comprovem que el mail i la contrassenya coincideixen
if(isset($_POST["email"])&&isset($_POST["password"])) {	
	$email = $_POST["email"];
	$password = $_POST["password"];
	//Comprovem que el mail hagi estat validat
	if(! filter_var($email, FILTER_VALIDATE_EMAIL)){
		$headerUrl = "../login.php";
		$parameters = ['lang='.$_GET['lang'],'event=email-error'];
		header('Location: '.crearUrl($headerUrl,$parameters));

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
				$headerUrl = "../login.php";
				$parameters = ['lang='.$_GET['lang'],'event=email-not-confirmed'];
				header('Location: '.crearUrl($headerUrl,$parameters));
				echo "Email not confirmed, you will be redirected or you can click <a href='".crearUrl($headerUrl,$parameters).">here</a>.";
			}else if($data['active']==0){
				$headerUrl = "../login.php";
				$parameters = ['lang='.$_GET['lang'],'event=deleted-account'];
				header('Location: '.crearUrl($headerUrl,$parameters));
				echo "The account had been deleted, you will be redirected or you can click <a href='../login.php?lang=".crearUrl($headerUrl,$parameters)."'>here</a>.";
			}else{
				if(password_verify($password,$data['password'])){
					$_SESSION["user_name"] = $email;

					if(!empty($_POST['rememberMe'])){
						$activeSession = $database->get("users","session",["email" => $email]);
						if(strlen($activeSession)>10){
							$session = $activeSession;
						}else{
							$session = token(64);
							$database->update("users", [
							  "session" => $session
							  ], ["email" => $email]);
						}
						setcookie("mesural_sess", $session, time() + 30 * 24 * 60 * 60,'/login.php');
					}

					
					$headerUrl = "../index.php";
					$parameters = ['lang='.$_GET['lang']];
					header('Location: '.crearUrl($headerUrl,$parameters));
					echo "Welcome ".$data['nom'].". You will be redirected or you can click <a href='../index.php?lang=".$_GET['lang'].">here</a>.";
				}else{
					$headerUrl = "../login.php";
					$parameters = ['lang='.$_GET['lang'],'event=signin-error'];
					header('Location: '.crearUrl($headerUrl,$parameters));
					echo "Wrong password, you will be redirected or you can click <a href='".crearUrl($headerUrl,$parameters)."'>here</a>.";
				}
			}
		}else{
			$headerUrl = "../login.php";
			$parameters = ['lang='.$_GET['lang'],'event=error'];
			header('Location: '.crearUrl($headerUrl,$parameters));
			echo "Email not found, you will be redirected or you can click <a href='".crearUrl($headerUrl,$parameters)."'>here</a>.";
		}
	}
}elseif(isset($_GET['session'])){
	$activeSession = $database->get("users","session",["email" => $email]);
	if(strlen($activeSession)==0){
		setcookie("mesural_sess", "", time()-60*60*24*7,"/login.php");
		unset($_COOKIE["mesural_sess"]);
		$headerUrl = "../login.php";
		$parameters = [];
		header('Location: '.crearUrl($headerUrl,$parameters));
		echo "Welcome to login. You will be redirected or you can click <a href='".crearUrl($headerUrl,$parameters)."'>here</a>.";
	}
	$usuari = $database->get("users", [
		"email",
		"session"
		], ["session" => $_GET['session']]);
	$_SESSION["user_name"] = $usuari['email'];
	$headerUrl = "../index.php";
	$parameters = [];
	header('Location: '.crearUrl($headerUrl,$parameters));
	echo "Welcome again. You will be redirected or you can click <a href='".crearUrl($headerUrl,$parameters)."'>here</a>.";
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

				if($_GET['login']=="cookie"){
					$headerUrl = "../index.php";
					$parameters = [];
					header('Location: '.crearUrl($headerUrl,$parameters));
					echo "Welcome again. You will be redirected or you can click <a href='".crearUrl($headerUrl,$parameters)."'>here</a>.";
				}else{
					$headerUrl = "../config.php";
					$parameters = [];
					header('Location: '.crearUrl($headerUrl,$parameters));
					echo "Welcome. You will be redirected or you can click <a href='".crearUrl($headerUrl,$parameters)."'>here</a>.";
				}
			}else{
			$headerUrl = "../login.php";
			$parameters = ['event=token-fail'];
			header('Location: '.crearUrl($headerUrl,$parameters));
			}
		}else{
			$headerUrl = "../login.php";
			$parameters = ['event=token-fail'];
			header('Location: '.crearUrl($headerUrl,$parameters));	
		}
	}
}
?>