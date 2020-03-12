<?php session_start();
//Incloure direcció dels arxius de traducció
include_once("sections/languages.php");
//Incloure arxius de connexió a BBDD
require('conexiones/conexion.php');
//Verificar si hi ha sessió iniciada i agafar les dades (id, nom i email) de l'usuari pertinent de la BBDD "users"
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
//Si no hi ha sessió redirigir a Login
}else{
  if(isset($_GET['lang'])){
    header('Location: login.php?lang='.$_GET['lang']);
  }else{
    header('Location: login.php');
  }
}

//Si tenim el paràmetre de "newcapsule" agafar la id que porta
if(isset($_GET['newcapsule'])){
  $capsuleid = $_GET['newcapsule'];

  //Verifiquem que la ID de càpsula existeix a la BBDD "capsuleInfo"
  if($database->has("capsuleInfo", ["number" => $capsuleid])){
    //Verifiquem si la càpsula ja ha estat registrada en aquest usuari
    if($database->has("capsuleProperty", ["AND"=>["capsuleNumber" => $capsuleid, "userid" => $userid]])){
      header("Location: index.php?event=already-connected");
    }else{
      //Registrem la connexió propietari-càpsula a la BBDD "capsuleProperty"
      $values = $database->insert("capsuleProperty", [
      "userid" => $userid,
      "capsuleNumber" => $capsuleid,
      "create_date" => date('Y-m-d H:i:s'),
      ]);
      header("Location: index.php?event=success"); 
    }   
  }else{
    header("Location: index.php?event=no-capsule");
  }
}

//Si tenim el paràmetre "newname" (i "capsuleid") canviem el nom a la BBDD "capsuleProperty" el nom que aquesta propietat li posa a la càpsula
if(isset($_GET['newname'])){
  $database->update("capsuleProperty", [
  "nom" => $_GET['newname']
  ], ["AND"=>["capsuleNumber" => $_GET['capsuleid'],"userid" => $userid]]);
}

//Si tenim el paràmetre "delete-sensor" eliminar la propietat a la BBDD "capsuleProperty"
if(isset($_GET['delete-sensor'])){
  $database->delete("capsuleProperty", ["capsuleNumber" => $_GET['delete-sensor']]);
}
?>
<!DOCTYPE html>
<html lang="<?php echo $text['Lang']; ?>">
  <head>
    <!-- Meta data -->
  <?php include_once("sections/metadata.php"); ?>

  <!-- Títol i Favicons -->
  <title>Dashboard | Mesural</title>
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
      <div class="contingut">
        
        <div class="add">
            <form class="form-new" action="index.php?lang=<?php echo $text['lang']; ?>" method="get">
              <input type="text" id="newcapsule" name="newcapsule" placeholder="Add new sensor">
              <button type="submit"><div class="rodo-mes">+</div></button>
              <span class="success <?php if($_GET['event'] == 'success'){}else{echo 'hidden';}?>"><?php echo $text['Gauge-success']; ?></span>
              <span class="fail <?php if($_GET['event'] == 'no-capsule'){}else{echo 'hidden';}?>"><?php echo $text['No-gauge']; ?></span>
              <span class="fail <?php if($_GET['event'] == 'already-connected'){}else{echo 'hidden';}?>"><?php echo $text['Already-connected']; ?></span>
            </form>
        </div>

        <div class="capsulas">
          <?php 
          $sensors = $database->select("capsuleProperty", [
          "userid",
          "capsuleNumber",
          "nom"
          ], ["userid" => $userid]);

          foreach($sensors as $sensor){
            if($sensor['nom'] == ""){
              $capsulename = "Capsule ".$sensor["capsuleNumber"];
            }else{
              $capsulename = $sensor['nom'];
            }
            $capsulenumber = $sensor['capsuleNumber'];
          ?>

          <div class="capsula">
            <div class="informacio">
              <img src="img/icon-box.png" />
              <div class="title">
                <div class="name"><?php echo $capsulename; ?></div>
                <div class="updated">Updated on real time</div>
              </div>
              <div class="value">255.00 N/mm<sup>2</sup></div>
              <div class="arrow"><a data-toggle="collapse" href="#capsula<?php echo $capsulenumber; ?>" role="button" aria-expanded="false" aria-controls="capsula<?php echo $capsulenumber; ?>"><i class="fa fa-chevron-down"></i></a></div>
            </div>

            <div class="collapse" id="capsula<?php echo $capsulenumber; ?>" style="font-size:12px;margin-top:10px;">
              <!--<div class="sensor-edit col-md-2">
                <?php if($_GET['edit-name'] == $sensor['capsuleNumber']){?><button type="submit"><?php echo $text['Accept']; ?></button>
                <?php }else{ ?><a href="index.php?edit-name=<?php echo $sensor['capsuleNumber']; ?>"><?php echo $text['Edit']; ?></a>
                <?php } ?>
              </div>-->
              <div class="capsule-info">
                <!--<?php include("prova.php"); ?>-->
              </div>
              <div class="table-data table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table table-hover table-sm">
                  <thead>
                    <tr>
                      <th scope="col">Date</th>
                      <th scope="col">Time</th>
                      <th scope="col">Creation date</th>
                      <th scope="col">Creation time</th>
                      <th scope="col"><?php echo $text['Value']; ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $values = $database->select("capsuleValues", [
                    "capsuleid",
                    "datetime",
                    "create_date",
                    "modificate_date",
                    "value"
                    ], ["capsuleid" => $sensor['capsuleNumber'], "ORDER" => ["datetime" => "DESC"]]);

                    foreach ($values as $value) {
                      echo "<tr>";
                      echo "<td>".explode(" ",$value['datetime'])[0]."</td>";
                      echo "<td>".explode(" ",$value['datetime'])[1]."</td>";
                      echo "<td>".explode(" ",$value['create_date'])[0]."</td>";
                      echo "<td>".explode(" ",$value['create_date'])[1]."</td>";
                      echo "<td>".number_format(floatval($value['value']),2)." N/mm<sup>2</sup></td>";
                      echo "</tr>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="edit-box">
            </div>
          </div>
        <?php } ?>

        </div>
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
