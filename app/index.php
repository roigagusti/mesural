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
    if($database->has("gaugeProperty", ["AND"=>["gaugeNumber" => $gaugeid, "userid" => $userid]])){
      header("Location: index.php?event=already-connected");
    }else{
      $values = $database->insert("gaugeProperty", [
      "userid" => $userid,
      "gaugeNumber" => $gaugeid,
      "create_date" => date('Y-m-d H:i:s'),
      ]);
      header("Location: index.php?event=success"); 
    }   
  }else{
    header("Location: index.php?event=no-gauge");
  }
}
if(isset($_GET['newname'])){
  $database->update("gaugeProperty", [
  "nom" => $_GET['newname']
  ], ["AND"=>["gaugeNumber" => $_GET['gaugeid'],"userid" => $userid]]);
} 
if(isset($_GET['delete-sensor'])){
  $database->delete("gaugeProperty", ["gaugeNumber" => $_GET['delete-sensor']]);
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
          <form class="form-new" action="index.php?lang=<?php echo $text['lang']; ?>" method="get">
            <input type="text" id="newgauge" name="newgauge" placeholder="<?php echo $text['Add new sensor']; ?>">
            <button class="btn-acces" type="submit"><?php echo $text['Add']; ?></button>
            <span class="success <?php if($_GET['event'] == 'success'){}else{echo 'hidden';}?>"><?php echo $text['Gauge-success']; ?></span>
            <span class="fail <?php if($_GET['event'] == 'no-gauge'){}else{echo 'hidden';}?>"><?php echo $text['No-gauge']; ?></span>
            <span class="fail <?php if($_GET['event'] == 'already-connected'){}else{echo 'hidden';}?>"><?php echo $text['Already-connected']; ?></span>
          </form>
        </div>

        <div class="sensor-tables">
          <?php 
          $sensors = $database->select("gaugeProperty", [
          "userid",
          "gaugeNumber",
          "nom"
          ], ["userid" => $userid]);

          foreach($sensors as $sensor){
            if($sensor['nom'] == ""){
              $gaugename = "Sensor ".$sensor["gaugeNumber"];
            }else{
              $gaugename = $sensor['nom'];
            }
          ?>
          <div class="sensor-box">
            <div class="sensor-box-title col-md-10">
              <?php if($_GET['edit-name'] == $sensor['gaugeNumber']){?>
              <form class="edit-name" action="index.php" method="get">
                <input type="text" id="newname" name="newname" placeholder="<?php echo $gaugename; ?>">
                <input type="hidden" id="gaugeid" name="gaugeid" value="<?php echo $sensor['gaugeNumber']; ?>">
            <?php }else{
              echo $gaugename;
            }?>
            </div>

            <div class="sensor-edit col-md-2">
              <?php if($_GET['edit-name'] == $sensor['gaugeNumber']){?><button type="submit"><?php echo $text['Accept']; ?></button>
              <?php }else{ ?><a href="index.php?edit-name=<?php echo $sensor['gaugeNumber']; ?>"><?php echo $text['Edit']; ?></a>
              <?php } ?>
              </form>
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
                  <?php
                  $values = $database->select("gaugeValues", [
                  "gaugeid",
                  "date",
                  "time",
                  "value"
                  ], ["gaugeid" => $sensor['gaugeNumber'], "ORDER" => ["date" => "DESC", "time" => "DESC"]]);

                  foreach ($values as $value) {
                    echo "<tr>";
                    echo "<td>".$value['date']."</td>";
                    echo "<td>".$value['time']."</td>";
                    echo "<td>".number_format(floatval($value['value']),2)." kN</td>";
                    echo "</tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>

            <?php 
            if($_GET['edit-name'] == $sensor['gaugeNumber']){?>
            <div class="delete-sensor">
              <a href="index.php?delete-sensor=<?php echo $sensor['gaugeNumber']; ?>">Eliminar</a>
            </div>
            <?php }else{ ?>
            <!--<div class="sensor-box-date"><a href="#">Filtrar fechas</a></div>-->
          <?php } ?>
          </div>
        <?php } ?>

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
