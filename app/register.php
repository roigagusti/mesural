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
  <title>Mesural. Register</title>
  <link rel="shortcut icon" href="img/favicons/favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicons/favicon-16x16.png">
  <link rel="manifest" href="img/favicons/site.webmanifest">

  <!-- CSS Libraries -->
  <!-- CSS Custom -->
  <link rel="stylesheet" type="text/css" href="css/access.css" media="screen">
  <link rel="stylesheet" type="text/css" href="css/access-responsive.css" media="screen">

  <!-- Scripts Libraries -->
  <!-- Scripts custom -->
</head>

<body>
<!-- Contingut de pàgina -->
<div class="register-content">
  <div class="left-side">
    <div class="franja-left">
      <div class="logo-register">
        <a href="//www.mesural.com"><img src="img/logo-dark.png" /></a>
      </div>
    </div>
  </div>
  <div class="right-side">
    <div class="franja-right box box-register">
      <div class="register-title"><?php echo $text['Create your Mesural account']; ?></div>

      <form class="form-signin" action="conexiones/register.php?lang=<?php echo $text['lang']; ?>" method="post">
        <div class="login-input">
          <label for="name"><?php echo $text['Full name']; ?></label>
          <input type="text" id="name" name="name" placeholder="Gavin Belson" required>
          <label for="email"><?php echo $text['Email']; ?></label>
          <input type="text" id="email" name="email" placeholder="gavin@hooli.com" required>
          <label for="password"><?php echo $text['Password']; ?></label>
          <input type="password" id="password" name="password" placeholder="********" required>
          <label for="re-password"><?php echo $text['Confirm password']; ?></label>
          <input type="password" id="re-password" name="re-password" placeholder="********" required>
          <div class="terms">
            <!-- Pot ser "checked", "disabled" o "checked disabled"-->
            <input type="checkbox" name="agree-term" id="agree-term" onchange="termsChanged()"><?php echo $text['Agree']; ?> <a href="//www.mesural.com/legal.php" target="_blank" class="term-service" required><?php echo $text['Terms of service']; ?></a>
          </div>
        </div>

        <div class="submit-zone">
          <button class="btn-access disabled" type="submit"><?php echo $text['Create account']; ?></button>
        </div>
      </form>
      <div class="alert-zone">
      <div class="register"><?php echo $text['Have account']; ?> <a href="login.php?lang=<?php echo $text['lang']; ?>"><?php echo $text['Log in']; ?></a></div>
        <div class="fail <?php if($_GET['event'] == 'email-exists'){}else{echo 'hidden';}?>"><?php echo $text['Email exists']; ?></div>
        <div class="fail <?php if($_GET['event'] == 'pass-differents'){}else{echo 'hidden';}?>"><?php echo $text['Pass differents']; ?></div>
        <div class="fail <?php if($_GET['event'] == 'email-fail'){}else{echo 'hidden';}?>"><?php echo $text['Email-fail']; ?></div>
        <div class="success <?php if($_GET['event'] == 'success'){}else{echo 'hidden';}?>"><?php echo $text['Register success']; ?></div>
      </div>
    </div>
  </div>
</div>
<!-- JavaScripts basics -->
<script src="lib/jquery/jquery.min.js"></script>
<!-- JavaScripts custom -->
<script type="text/javascript" src="js/script.js"></script>
<!-- Scripts custom -->
<script>
if (window.navigator.userAgent.indexOf('iPhone') != -1) {
  if (window.navigator.standalone == true) {
    alert("Yes iPhone! Yes Full Screen!");
  }
}
</script>
</body>
</html>
