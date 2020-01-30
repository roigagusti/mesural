<?php session_start();
include_once("sections/languages.php");
require('conexiones/conexion.php');
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
}else{
  if(isset($_GET['lang'])){
    header('Location: login.php?lang='.$_GET['lang']);
  }else{
    header('Location: login.php');
  }
}

if(isset($_GET['newgauge'])){
  $gaugeid = $_GET['newgauge'];

  if($database->has("gaugeInfo", ["number" => $gaugeid])){
    $values = $database->insert("gaugeProperty", [
    "userid" => $userid,
    "gaugeNumber" => $gaugeid,
    "create_date" => date('Y-m-d H:i:s'),
    ]);
    header("Location: index.php?event=success");    
  }else{
    header("Location: index.php?event=no-gauge");
  }
}
?>
<!DOCTYPE html>
<html lang="<?php echo $text['Lang']; ?>">
  <head>
    <!-- Meta data -->
  <?php include_once("sections/languages.php"); ?>

  <!-- Títol i Favicons -->
  <title>Dashboard | Mesural</title>
  <link rel="shortcut icon" href="img/favicon.ico">

  <!-- CSS basics -->
  <link href='//cdn.jsdelivr.net/devicons/1.8.0/css/devicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" media="screen">
	<!-- CSS custom -->
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">
  <link rel="stylesheet" type="text/css" href="css/custom-bootstrap.css" media="screen">
  <!-- CSS datepicker -->
</head>

<body>
<?php include_once("sections/analytics.php") ?>
<!-- Contingut de pàgina -->
<div class="limiter">
  <div class="page">
    <?php include_once("sections/lateral-header.php") ?>
    <div class="board">
      <div class="header">
        <div class="nav-logo" >
          <a href="https://www.mesural.com" alt="Mesural">
            <img alt="Mesural Logo" title="Mesural Logo"  src="img/mesural.png" />
          </a>
        </div>
      </div>
      <div class="contingut">
        <div class="new">
          <form class="form-new" action="admin.php" method="get">
            <select id="bdtable" name="bdtable">
              <option value="0">Informació de sensors</option>
              <option value="1">Propietat de sensors</option>
              <option value="2">Valors de sensors</option>
              <option value="3">Usuaris</option>
              <option value="4">Visites</option>
            </select>
            <button class="btn-acces" type="submit">Select</button>
          </form>
        </div>

        <div class="sensor-tables">
          <?php
          if(isset($_GET['bdtable'])){
            $taula = $_GET['bdtable'];
          }else{
            $taula = "gaugeInfo";
          }
          ?>
          <div class="sensor-box">
            <div class="sensor-box-title col-md-10">
              Nom de taula
            </div>

            <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
              <table class="table table-hover table-sm">
                <thead>
                  <tr>
                    <th scope="col"><?php echo $text['Date']; ?></th>
                    <th scope="col"><?php echo $text['Time']; ?></th>
                    <th scope="col"><?php echo $text['Value']; ?></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>

        </div>

      </div>
    </div>
  </div>
</div>
<!-- JavaScripts basics -->
<!-- JavaScripts custom -->
<script type="text/javascript" src="js/script.js"></script>
<!-- Scripts custom -->
</body>
</html>
