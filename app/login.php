<?php
//Redirigir a connexió segura HTTPS
if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on"){
  header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
  exit;
}
#Incloure direcció dels arxius de traducció
include_once("sections/languages.php");
?>
<!DOCTYPE html>
<html lang="<?php echo $text['lang']; ?>">
  <head>
    <!-- Meta data -->
  <?php include_once("sections/metadata.php"); ?>

  <!-- Títol i Favicons -->
  <title>Mesural | Login</title>
  <link rel="shortcut icon" href="img/favicon.ico">

  <!-- CSS Libraries -->
  <!-- CSS Custom -->
  <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
  <link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">

  <!-- Scripts Libraries -->
  <!-- Scripts custom -->
</head>

<body class="access">
<?php include_once("sections/analytics.php") ?>
<!-- Contingut de pàgina -->
<div class="limiter">
  <div class="content">
    <div class="box box-login">
      <div class="logo">
        <a href="//www.mesural.com"><img src="img/mesural.png" /></a>
      </div>

      <form class="form-signin" action="conexiones/validar_usuario.php?lang=<?php echo $text['lang']; ?>" method="post">
        <input type="text" id="email" name="email" placeholder="<?php echo $text['Email']; ?>" required>
        <input type="password" id="password" name="password" placeholder="<?php echo $text['Password']; ?>" required><br>
        <div class="submit-zone">
          <button class="btn-acces" type="submit"><?php echo $text['Log in']; ?></button>
          <a href="#" class="btn-apple hidden"><span class="devicons devicons-apple"></span> Sign in with Apple</a>
        </div>
        <div class="forgot-zone">
          <div class="forgot">
            <a href="forgot.php"><?php echo $text['Forgot']; ?></a>
            <span class="cta"><?php echo $text['Not account']; ?> <a href="register.php?lang=<?php echo $text['lang']; ?>" class="sign-up"><?php echo $text['Sign up']; ?></a></span>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="alert-zone">
    <div class="fail <?php if($_GET['event'] == 'signin-error'){}else{echo 'hidden';}?>"><?php echo $text['Login error']; ?></div>
    <div class="fail <?php if($_GET['event'] == 'email-error'){}else{echo 'hidden';}?>"><?php echo $text['Email error']; ?></div>
    <div class="fail <?php if($_GET['event'] == 'error'){}else{echo 'hidden';}?>"><?php echo $text['Email not found']; ?></div>
    <div class="fail <?php if($_GET['event'] == 'insufficient-data'){}else{echo 'hidden';}?>"><?php echo $text['Insufficient data']; ?></div>
    <div class="fail <?php if($_GET['event'] == 'email-fail'){}else{echo 'hidden';}?>"><?php echo $text['Email-fail']; ?></div>
    <div class="fail <?php if($_GET['event'] == 'email-not-confirmed'){}else{echo 'hidden';}?>"><?php echo $text['Email-not-confirmed']; ?></div>
    <div class="fail <?php if($_GET['event'] == 'token-fail'){}else{echo 'hidden';}?>"><?php echo $text['Token fail']; ?></div>
    <div class="success <?php if($_GET['event'] == 'success'){}else{echo 'hidden';}?>"><?php echo $text['Register success']; ?></div>
    <div class="success <?php if($_GET['event'] == 'forgot-success'){}else{echo 'hidden';}?>"><?php echo $text['Forgot success']; ?></div>
  </div>
</div>
<!-- JavaScripts basics -->
<!-- JavaScripts custom -->
<script type="text/javascript" src="js/script.js"></script>
<!-- Scripts custom -->

</body>
</html>
