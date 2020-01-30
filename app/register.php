<?php include_once("sections/languages.php") ?>
<?php
if(isset($_GET['profile'])){
  $profile = $_GET['profile'];
}
  require('conexiones/conexion.php');
  $ipaddress = $_SERVER['REMOTE_ADDR'];
  $user = $_SERVER['REMOTE_USER'];

  require_once("conexiones/geoip2.phar");
  use GeoIp2\Database\Reader;
  $reader = new Reader('conexiones/GeoLite2-City.mmdb');
  $record = $reader->city($_SERVER['REMOTE_ADDR']);

  function isMobileDevice() {
      return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
  }
  if(isMobileDevice()){
      $mobile = 1;
  }
  else {
      $mobile = 0;
  }

  $taulausuaris = $database->insert("visitors", [
  "ip" => $ipaddress,
  "user" => $user,
  "city" => $record->city->name,
  "postal" => $record->postal->code,
  "mobile" => $mobile,
  "type" => $profile,
  "visit_date" => date('Y-m-d H:i:s')
]);
?>
<!DOCTYPE html>
<html lang="<?php echo $text['lang']; ?>">
  <head>
    <!-- Meta data -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="title" content="Mesural">
  <meta name="description" content="Mesural permite conrolar el comportamiento estructural de los edificios en tiempo y de forma remota.">
  <meta property="image" content="img/mini-marca.jpg">
  <meta name="author" content="Aldasoro">

    <!-- Títol i Favicons -->
    <title>Register | Mesural</title>
    <link rel="shortcut icon" href="img/favicon.ico">

    <!-- CSS basics -->
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
    <div class="box box-register">
      <div class="logo"><?php echo $text['Sign up']; ?></div>

      <form class="form-signin" action="conexiones/register.php?lang=<?php echo $text['lang']; ?>" method="post">
        <select id="profile" name="profile" required>
          <option value="0"><?php echo $text['Choose your profile']; ?></option>
          <option value="1"><?php echo $text['Architect']; ?></option>
          <option value="2"><?php echo $text['Engineer']; ?></option>
          <option value="3"><?php echo $text['Constructor']; ?></option>
          <option value="4"><?php echo $text['Promotor']; ?></option>
          <option value="5"><?php echo $text['Assurance']; ?></option>
        </select>
        <input type="email" id="email" name="email" placeholder="<?php echo $text['Your email']; ?>" required>
        <input type="password" id="password" name="password" placeholder="<?php echo $text['Password']; ?>" required>
        <input type="password" id="re-password" name="re-password" placeholder="<?php echo $text['Repeat password']; ?>" required>
        <div class="terms">
          <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required><?php echo $text['Agree with']; ?> <a href="#" class="term-service"><?php echo $text['Terms of service']; ?></a>
        </div>
        <div class="submit-zone">
          <button class="btn-acces" type="submit"><?php echo $text['Register']; ?></button>
        </div>
        <div class="forgot-zone">
          <div class="forgot">
            <span class="cta"><?php echo $text['Already member']; ?> <a href="login.php?lang=<?php echo $text['lang']; ?>" class="sign-up">Log in</a></span>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="alert-zone">
    <div class="fail <?php if($_GET['event'] == 'email-exists'){}else{echo 'hidden';}?>"><?php echo $text['Email exists']; ?></div>
    <div class="fail <?php if($_GET['event'] == 'pass-differents'){}else{echo 'hidden';}?>"><?php echo $text['Pass differents']; ?></div>
    <div class="fail <?php if($_GET['event'] == 'not-profile'){}else{echo 'hidden';}?>"><?php echo $text['Not profile']; ?></div>
    <div class="fail <?php if($_GET['event'] == 'email-fail'){}else{echo 'hidden';}?>"><?php echo $text['Email-fail']; ?></div>
    <div class="success <?php if($_GET['event'] == 'success'){}else{echo 'hidden';}?>"><?php echo $text['Register success']; ?></div>
  </div>
</div>
<!-- JavaScripts basics -->
<!-- JavaScripts custom -->
<script type="text/javascript" src="js/script.js"></script>
<!-- Scripts custom -->

</body>
</html>
