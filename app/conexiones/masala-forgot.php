<?php 
require('conexion.php');
session_start();

if(isset($_POST["email"])) {
	
	$email = $_POST["email"];

	if($database->has("usuaris", [
	  "mail" => $email])){
	    function generateRandomString($length) {
		    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		}
		$key = generateRandomString(25);

		if($database->update("usuaris", 
			["token" => $key],
			["mail" => $email]
		)){
			require_once('mail/config.php');
			$mail->ClearAllRecipients( );

			$mail->AddAddress($email);
			//$mail->AddCC("concopia1@email.com");
			//mail->AddCC("concopia2@email.com");

			$mail->IsHTML(true);  //podemos activar o desactivar HTML en mensaje
			$mail->Subject = 'Accés a Masala Consultors';

			$msg = 'Hola,<br><strong>Email: </strong>' .$email. '<br><strong>Codi: </strong>' .$key. '<br><strong>URL: </strong><a href="https://personal.masalaconsultors.com/conexiones/validar_usuario.php?key="' .$key. '<br>';

			$mail->Body    = $msg;
			$mail->Send();
			//require('mail.php');
			//enviaMail($email,$key);
		}else{
			echo "no";
		}

		header('Location: ../index.php?&login=send-success');
		echo "T'hem enviat correctament el mail, seràs redirigit automàticament. En cas contrari fes clic <a href='../index.php?login=send-success'>aquí</a>.";
	}else{
		header('Location: ../index.php?event=forgot&login=send-error');
		echo "El mail no existeix a Masala, seràs redirigit automàticament. En cas contrari fes clic <a href='../index.php?event=forgot&login=send-error'>aquí</a>.";
	}
}
?>

