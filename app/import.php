<?php session_start();
//Incloure direcció dels arxius de traducció
include_once("sections/languages.php");
//Incloure arxius de connexió a BBDD
require('conexiones/conexion.php');
//Verificar si hi ha sessió iniciada i agafar les dades (id, nom i email) de l'usuari pertinent de la BBDD "users"
if(isset($_SESSION['k_username'])) {
  $usuari = $_SESSION['k_username'];
  $taulausuaris = $database->select("users", [
    "id",
    "nom",
    "email",
    ], ["email" => $usuari]);
  foreach ($taulausuaris as $usuari){
    $userid = $usuari['id'];
    $usernom = $usuari['nom'];
    $useremail = $usuari['email'];
  }
//Si no hi ha sessió redirigir a Login
}else{
  if(isset($_GET['lang'])){
    header('Location: login.php?lang='.$_GET['lang']);
  }else{
    header('Location: login.php');
  }
}
?>
<!DOCTYPE html>
<html lang="<?php echo $text['Lang']; ?>">
  <head>
    <!-- Meta data -->
  <?php include_once("sections/metadata.php"); ?>

  <!-- Títol i Favicons -->
  <title>Data import | Mesural</title>
  <link rel="shortcut icon" href="img/favicon.ico">

  <!-- CSS basics -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" media="screen">
	<!-- CSS custom -->
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">
  <link rel="stylesheet" type="text/css" href="lib/bootstrap/bootstrap.css" media="screen">
  <!-- CSS datepicker -->
</head>

<body>
<!-- Contingut de pàgina -->
<div class="limiter">
  <div class="page">
    <?php include_once("sections/lateral-header.php"); ?>
    <div class="board col-lg-offset-2 col-lg-10 col-xs-offset-3 col-xs-9 ">
      <div class="contingut col-md-12 import">
        <span class="">Option temporarily not available</span>
      </div>
    </div>
  </div>
</div>
<!-- JavaScripts basics -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- JavaScripts custom -->
<script type="text/javascript" src="js/script.js"></script>
<!-- Scripts custom -->
</body>
</html>
