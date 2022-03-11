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
  <title>Mesural. Forgot</title>
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
<div class="content">
  <div class="franja-central">
    <div class="logo">
      <a href="//www.mesural.com"><img src="img/mesural.png" /></a>
    </div>


    <div class="box box-login box-shadow">
      <div class="forgot-notice"><?php echo $text['Forgot text']; ?></div>

      <form class="form-signin" action="conexiones/sendmail.php?type=forgot" method="post">
        <div class="login-input">
          <label for="email"><?php echo $text['Email']; ?></label>
          <input type="text" id="email" name="email" required>
        </div>

        <div class="submit-zone">
          <button class="btn-access" type="submit"><?php echo $text['Continue']; ?></button>
        </div>
      </form>
    </div>


    <div class="alert-zone">
      <div class="register"><?php echo $text['Have account']; ?> <a href="login.php?lang=<?php echo $text['lang']; ?>"><?php echo $text['Log in']; ?></a><br>
      <?php echo $text['Not account']; ?> <a href="register.php?lang=<?php echo $text['lang']; ?>"><?php echo $text['Create your account']; ?></a></div>
    </div>

  </div>
</div>
<div class="footer">
  <a href="//www.mesural.com">© Mesural</a>
  <a href="#"><?php echo $text['Contact']; ?></a>
  <a href="//www.mesural.com/legal.php"><?php echo $text['Privacy and conditions']; ?></a>
</div>
<!-- JavaScripts basics -->
<!-- JavaScripts custom -->
<script type="text/javascript" src="js/script.js"></script>
<!-- Scripts custom -->

</body>
</html>
