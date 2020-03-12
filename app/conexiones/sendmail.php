<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../lib/PHPMailer/src/Exception.php';
require '../lib/PHPMailer/src/PHPMailer.php';
require '../lib/PHPMailer/src/SMTP.php';

/* cridar arxiu "sendmail.php"
  
  POST PARÀMETRES
    to = destinatari del mail

  GET PARÀMETRES
    to = destinatari del mail
    type = tipus d'email a enviar
    lang = idioma en que s'ha d'efectuar els mails

  PARÀMETRES DES D'ARXIU EMAIL
    subject = assumpte
    body = text del mail
    returnsuccess = url de redirecció en cas de success a contar des de l'arrel de app
    returnfail = url de redirecció en cas de fail a contar des de l'arrel de app
*/

switch($_GET['type']){
  case "register":
    $to = $_GET['to'];
    include_once("mails/registration.php");
    break;
  case "forgot":
    $to = $_POST['email'];
    include_once("mails/forgot.php");
    break;
  default:
    $to = $_GET['to'];
    $subject = $_GET['subject'];
    $body = $_GET['body'];
}

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       //Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    
    /*Google Server
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'agusti@mesural.com';                   // SMTP username
    $mail->Password   = 'Meencha2020+';                         // SMTP password*/

    //Microsoft Server
    $mail->Host       = 'smtp-mail.outlook.com';                // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'agusti@mesural.com';                   // SMTP username
    $mail->Password   = 'Meencha2020+';                         // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('agusti@mesural.com','Agusti de Mesural');
    $mail->addAddress($to);                                     // Add a recipient

    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;
    //$mail->addReplyTo('agusti@mesural.com', 'Agustí de Mesural');

    $mail->send();
    header('Location: '.$returnsuccess);
} catch (Exception $e) {
    header('Location: '.$returnfail);
}
?>