<?php include_once("sections/languages.php") ?>
<!DOCTYPE html>
<html lang="<?php echo $text['lang']; ?>">
  <head>
    <!-- Meta data -->
  <?php include_once("sections/metadata.php"); ?>

  <!-- Títol i Favicons -->
  <title>Login | Mesural</title>
  <link rel="shortcut icon" href="img/favicon.ico">

  <!-- CSS basics -->
  <link href='//cdn.jsdelivr.net/devicons/1.8.0/css/devicons.min.css' rel='stylesheet'>
	<!-- CSS custom -->
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">
	<!-- Google Fonts -->
</head>

<body>
<?php include_once("sections/analytics.php") ?>
<!-- Contingut de pàgina -->
<div class="limiter">
  <div class="content">
    <div class="box box-login">
      <div class="logo">
        <a href="//www.mesural.com"><img src="img/mesural.png" /></a>
      </div>

      <form class="form-signin" action="conexiones/sendmail.php?type=forgot" method="post">
        <input type="text" id="email" name="email" placeholder="<?php echo $text['Email']; ?>" required>
        <div class="submit-zone">
          <button class="btn-acces" type="submit">Recuperar</button>
        </div>
        <div class="forgot-zone">
          <div class="forgot">
            <span class="cta">Prefieres iniciar sesion? <a href="login.php?lang=<?php echo $text['lang']; ?>" class="sign-up">Login</a></span>
            <span class="cta"><?php echo $text['Not account']; ?> <a href="register.php?lang=<?php echo $text['lang']; ?>" class="sign-up"><?php echo $text['Sign up']; ?></a></span>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- JavaScripts basics -->
<!-- JavaScripts custom -->
<script type="text/javascript" src="js/script.js"></script>
<!-- Scripts custom -->

</body>
</html>
