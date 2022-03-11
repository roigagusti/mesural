<?php session_start();
// Redirecció a HTTPS
if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on"){
  header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
  exit;
}
require('conexiones/conexion.php');
//Verificar si hi ha sessió iniciada i agafar les dades (id, nom i email) de l'usuari pertinent de la BBDD "users"
if(isset($_SESSION['user_name'])) {
  $id = $database->get("users","id",["email"=>$_SESSION['user_name']]);
  $userEmail = $_SESSION['user_name'];
  $userName = $database->get("users","nom",["id"=>$id]);
  $accountType = $database->get("users","type",["id"=>$id]);
//Si no hi ha sessió redirigir a Login
}else{
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Meta data -->
  <?php include_once("sections/metadata.php"); ?>

  <!-- Títol i Favicons -->
  <title>Mesural. Capsulas</title>
  <link rel="shortcut icon" href="img/favicons/favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicons/favicon-16x16.png">
  <link rel="manifest" href="img/favicons/site.webmanifest">

  <!-- CSS basics -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" media="screen">
	<!-- CSS custom -->
  <?php if($_GET['test']=='on'){echo '<link rel="stylesheet" type="text/css" href="css/style_vermell.css" media="screen">';}else{echo '<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">';}?>
  <!--<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">-->
	<link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">
  <!-- CSS datepicker -->
</head>

<body>
  <div class="db-world">
    <div class="db-content">
      <div class="nav-lateral main-menu">
        <?php include("sections/nav-lateral.php"); ?>
      </div>
      <div class="main-content">
        <?php include("sections/content-header.php"); ?>

        <?php 
        $capsules = $database->select("capsuleProperty",["id","userid","capsuleNumber","nom","create_date"],["userid"=>$id]);
        switch($_GET['action']){
          case 'add':
            include("sections/capsule-add.php");
            break;
          case 'edit':
            include("sections/capsule-edit.php");
            break;
          default:
            if(count($capsules)==0){
              include("sections/capsule-initial.php");
            }else{
              include("sections/capsule-list.php");
            }
            break;
        } ?>
      </div>
    </div>
  </div>

<!-- JavaScripts basics -->
<script src="lib/jquery/jquery.min.js"></script>
<!-- JavaScripts custom -->
<script type="text/javascript" src="js/script.js"></script>
<!-- Scripts custom -->
</body>
</html>
