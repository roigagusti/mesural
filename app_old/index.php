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
  <title>Mesural. Dashboard</title>
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
        <?php include("sections/content-header.php"); ?><div class="db-box box-shadow center">
          <div class="body-box full-button">
            <div class="full-icon">
              <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="-5 0 24 24">
                <path d="M4.35,23.93c-1.3,0-2.35-0.36-3.15-1.07C0.4,22.14,0,21.1,0,19.76c0-1.45,0.48-2.53,1.42-3.23s2.38-1.14,4.3-1.33
c0.26-0.03,0.55-0.07,0.85-0.1c0.31-0.03,0.65-0.07,1.03-0.1s0.68-0.06,0.9-0.09v-0.74c0-0.85-0.2-1.46-0.59-1.85
c-0.39-0.39-0.98-0.58-1.78-0.58c-1.14,0-2.54,0.32-4.21,0.95c-0.01-0.03-0.15-0.41-0.42-1.16c-0.27-0.75-0.41-1.13-0.42-1.14
c1.65-0.7,3.43-1.06,5.34-1.06c1.88,0,3.25,0.41,4.11,1.23c0.86,0.82,1.29,2.14,1.29,3.98v9.12H9.36c-0.01-0.03-0.1-0.32-0.28-0.85
c-0.18-0.53-0.27-0.82-0.27-0.85c-0.7,0.68-1.38,1.18-2.04,1.49C6.11,23.77,5.3,23.93,4.35,23.93z M5.25,21.56
c0.77,0,1.44-0.18,2.02-0.55c0.57-0.37,0.98-0.82,1.23-1.34v-2.7c-0.03,0-0.25,0.02-0.67,0.05c-0.42,0.03-0.65,0.05-0.68,0.05
c-1.35,0.12-2.34,0.37-2.96,0.76c-0.63,0.39-0.94,1.02-0.94,1.88c0,0.59,0.17,1.05,0.52,1.37C4.11,21.4,4.61,21.56,5.25,21.56z
M9.67,3.08C9.67,1.38,8.29,0,6.59,0S3.51,1.38,3.51,3.08c0,1.7,1.38,3.08,3.08,3.08S9.67,4.78,9.67,3.08z" />
              </svg>
            </div>
            <h1>Bienvenido a tu panel de Mesural</h1>
            <h2>Aquí enconrarás todos los paneles para controlar tus cápsulas</h2>
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
