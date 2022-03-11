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
  <title>Mesural. Administrar</title>
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

        <div class="db-box box-shadow capsule-list">
          <div class="title">
            <div class="title-value"><h1>Administrar</h1></div>
            <div class="table-header-buttons">
              <?php if($_GET['action']!="add" && !isset($_GET['tab'])){?><a href="admin.php?action=add" class="btn-add"><div>+ Create capsule</div></a><?php } ?>
            </div>
          </div>
          <div class="body-box">
            <!-- Panell superior per navegar entre taules -->
            <div class="admin-nav">
              <ul>
                <a href="admin.php"><li<?php if(!isset($_GET['tab'])){echo ' class="active"';}?>>Capsules</li></a>
                <a href="?tab=cp"><li<?php if($_GET['tab']=="cp"){echo ' class="active"';}?>>Códigos promocionales</li></a>
            </div>

            <?php
            if(!$_GET['tab']){
              switch($_GET['action']){
                case 'capsule-info':
                  include("sections/admin-infoCapsules.php");
                  break;
                case 'add':
                  include("sections/admin-addCapsules.php");
                  break;

                default:
                  include("sections/admin-llistaCapsules.php");
                  break;
              } 
            }else{
              switch($_GET['action']){
                case 'add':
                  include("sections/admin-addPromo.php");
                  break;

                default:
                  include("sections/admin-llistaPromo.php");
                  break;
              } 
            }
            ?>

          </div>
        </div>
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
