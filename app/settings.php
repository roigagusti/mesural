<?php session_start();
//Redirigir a connexió segura HTTPS
if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on"){
  header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
  exit;
}
#Incloure direcció dels arxius de traducció
include_once("sections/languages.php");
#Incloure arxius de connexió a BBDD
require('conexiones/conexion.php');
#Verificar si hi ha sessió iniciada i agafar les dades (id, email, nom, empresa i idioma) de l'usuari pertinent de la BBDD "users"
if(isset($_SESSION['k_username'])) {
  $usuari = $_SESSION['k_username'];
  $taulausuaris = $database->select("users", [
    "id",
    "email",
    "nom",
    "corporation",
    "language"
    ], ["email" => $usuari]);
  #Registrar les dades de la BBDD en variables per utilitzarles en qualsevol moment
  foreach ($taulausuaris as $usuari){
    $userid = $usuari['id'];
    $useremail = $usuari['email'];
    $usernom = $usuari['nom'];
    if($usuari['corporation']==""){$usercorp = "-";}else{$usercorp = $usuari['corporation'];}
    $userlanguage = $usuari['language'];
  }

#Si no hi ha sessió redirigir a Login
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
  <title>Settings | Mesural</title>
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
      <div class="contingut col-md-6 settings">
        <h2>General Account Settings</h2>
        
        <ul class="table-hover account-settings">
          <form class="form-account-settings" action="conexiones/update-settings.php?action=name" method="post">
            <li>
                <div class="set-title col-xs-12 col-sm-2">Name</div>
                <?php if($_GET["edit"] == "name"){?>
                  <div class="col-xs-6 col-sm-4">
                    <input type="text" name="name" placeholder="<?php echo $usernom;?>">
                  </div>
                  <button class="set-button col-xs-6 col-sm-2" type="submit">Save</button>
                <?php }else{?>
                  <div class="set-value col-xs-6 col-sm-4"><?php echo $usernom;?></div>
                  <div class="set-button col-xs-6 col-sm-2"><a href="settings.php?edit=name">Edit</a></div>
                <?php }?>
            </li>
          </form>
          <form class="form-account-settings" action="conexiones/update-settings.php?action=corporation" method="post">
            <li>
                <div class="set-title col-xs-12 col-sm-2">Corporation</div>
                <?php if($_GET["edit"] == "corporation"){?>
                  <div class="col-xs-6 col-sm-4">
                    <input type="text" name="corporation" placeholder="<?php echo $usercorp;?>">
                  </div>
                  <button class="set-button col-xs-6 col-sm-2" type="submit">Save</button>
                <?php }else{?>
                  <div class="set-value col-xs-6 col-sm-4"><?php echo $usercorp;?></div>
                  <input type="hidden" name="corporation" content="<?php echo $usercorp;?>">
                  <div class="set-button col-xs-6 col-sm-2"><a href="settings.php?edit=corporation">Edit</a></div>
                <?php }?>
            </li>
          </form>
            <li>
                <div class="set-title col-xs-12 col-sm-2">Email</div>
                <div class="set-value"><?php echo $useremail;?></div>
            </li>
          <form class="form-account-settings" action="conexiones/update-settings.php?action=language" method="post">
            <li>
                <div class="set-title col-xs-12 col-sm-2">Language</div>
                <?php if($_GET["edit"] == "language"){?>
                  <input type="language" name="language" placeholder="<?php echo ucfirst($userlanguage);?>">
                  <button class="set-button col-xs-6 col-sm-2" type="submit">Save</button>
                <?php }else{?>
                  <div class="set-value col-xs-6 col-sm-4"><?php echo ucfirst($userlanguage);?></div>
                  <!--<div class="set-button col-xs-6 col-sm-2"><a href="settings.php?edit=language">Edit</a></div>-->
                <?php }?>
            </li>
          </form>
          <form class="form-account-settings" action="conexiones/update-settings.php?action=password" method="post">
            <li>
                <div class="set-title col-xs-12 col-sm-2">Password</div>
                <?php if($_GET["edit"] == "password"){?>
                  <div class="col-xs-6 col-sm-4">
                    <input type="password" name="password" placeholder="********">
                  </div>
                  <button class="set-button col-xs-6 col-sm-2" type="submit">Save</button>
                <?php }else{?>
                  <div class="set-value col-xs-6 col-sm-4">********</div>
                  <div class="set-button col-xs-6 col-sm-2"><a href="settings.php?edit=password">Edit</a></div>
                <?php }?>
            </li>
          </form>
        </ul>

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
