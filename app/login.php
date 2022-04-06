<?php
//Redirigir a connexió segura HTTPS
if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on"){
  header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
  exit;
}
if(isset($_COOKIE['mesural_sess'])){
  header("Location: https://app.mesural.com/conexiones/validar_usuario.php?session=".$_COOKIE['mesural_sess']);
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
  <title>Mesural. Login</title>
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
      <div class="login-title"><?php echo $text['Login to your account']; ?></div>

      <form class="form-signin" action="conexiones/validar_usuario.php?lang=<?php echo $text['lang']; ?>" method="post">
      <div class="login-input">
        <?php
          $callback = str_replace("#","%23",$_GET['callback']);
          if(isset($_GET['callback'])){echo '<input type="hidden" id="callback" name="callback" value="'.$callback.'">';}
        ?>
        <label for="email"><?php echo $text['Email']; ?></label>
        <input type="text" id="email" name="email" placeholder="gavin@hooli.com" required>
        <label for="password"><div class="label-pass"><?php echo $text['Password']; ?></div><div class="label-forgot"><a href="forgot.php"><?php echo $text['Forgot']; ?></a></div></label>
        <input type="password" id="password" name="password" placeholder="********" required>
        <div class="rememberMe">
          <input type="checkbox" class="custom-control-input" name="rememberMe" id="rememberMe">Recuerdame
        </div>
      </div>

      <div class="submit-zone">
        <button class="btn-access" type="submit"><?php echo $text['Continue']; ?></button>
      </div>
      </form>
    </div>


    <div class="alert-zone">
      <div class="register"><?php echo $text['Not account']; ?> <a href="register.php?lang=<?php echo $text['lang']; ?>"><?php echo $text['Create your account']; ?></a></div>
      <div class="fail <?php if($_GET['event'] == 'signin-error'){}else{echo 'hidden';}?>"><?php echo $text['Login error']; ?></div>
      <div class="fail <?php if($_GET['event'] == 'email-error'){}else{echo 'hidden';}?>"><?php echo $text['Email error']; ?></div>
      <div class="fail <?php if($_GET['event'] == 'error'){}else{echo 'hidden';}?>"><?php echo $text['Email not found']; ?></div>
      <div class="fail <?php if($_GET['event'] == 'insufficient-data'){}else{echo 'hidden';}?>"><?php echo $text['Insufficient data']; ?></div>
      <div class="fail <?php if($_GET['event'] == 'email-fail'){}else{echo 'hidden';}?>"><?php echo $text['Email-fail']; ?></div>
      <div class="fail <?php if($_GET['event'] == 'email-not-confirmed'){}else{echo 'hidden';}?>"><?php echo $text['Email-not-confirmed']; ?></div>
      <div class="fail <?php if($_GET['event'] == 'token-fail'){}else{echo 'hidden';}?>"><?php echo $text['Token fail']; ?></div>
      <div class="fail <?php if($_GET['event'] == 'deleted-account'){}else{echo 'hidden';}?>"><?php echo $text['Deleted account']; ?></div>
      <div class="success <?php if($_GET['event'] == 'success'){}else{echo 'hidden';}?>"><?php echo $text['Register success']; ?></div>
      <div class="success <?php if($_GET['event'] == 'forgot-success'){}else{echo 'hidden';}?>"><?php echo $text['Forgot success']; ?></div>
      <div class="success <?php if($_GET['event'] == 'unsubscribed-success'){}else{echo 'hidden';}?>"><?php echo $text['Unsubscribed success']; ?></div>
      <div class="success <?php if($_GET['event'] == 'deleted-success'){}else{echo 'hidden';}?>"><?php echo $text['Deleted success']; ?></div>
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
