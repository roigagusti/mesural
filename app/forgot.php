<?php include_once("sections/languages.php") ?>
<!DOCTYPE html>
<html lang="<?php echo $text['lang']; ?>">
  <head>
    <!-- Meta data -->
  <?php include_once("sections/metadata.php"); ?>

  <!-- Títol i Favicons -->
  <title>Mesural | Forgot</title>
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

      <form class="form-signin" action="conexiones/sendmail.php?type=forgot" method="post">
        <input type="text" id="email" name="email" placeholder="<?php echo $text['Email']; ?>" required>
        <div class="submit-zone">
          <button class="btn-acces" type="submit">Recuperar</button>
        </div>
        <div class="forgot-zone">
          <div class="forgot">
            <span class="cta"><?php echo $text['Better login']; ?> <a href="login.php?lang=<?php echo $text['lang']; ?>" class="sign-up"><?php echo $text['Log in']; ?></a></span>
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
