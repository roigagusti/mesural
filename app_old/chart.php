<?php session_start();
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
?>
<!DOCTYPE html>
<html lang="<?php echo $text['Lang']; ?>">
  <head>

  <!-- Títol i Favicons -->
  <title>Charts | Mesural</title>
  <link rel="shortcut icon" href="img/favicons/favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicons/favicon-16x16.png">
  <link rel="manifest" href="img/favicons/site.webmanifest">

  <!-- CSS basics -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" media="screen">
	<!-- CSS custom -->
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">
  <link rel="stylesheet" type="text/css" href="lib/bootstrap/bootstrap.css" media="screen">
  <link rel="stylesheet" type="text/css" href="lib/chart/Chart.min.css" media="screen">
  <!-- CSS datepicker -->

<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/chart/Chart.min.js"></script>
</head>

<body>
<!-- Contingut de pàgina -->
<div class="limiter">
  <div class="page">
    <div class="board col-lg-10 col-xs-9 ">
      
      <div class="contingut">
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
            <?php
            $valuesChart = $database->select("capsuleValues", [
              "capsuleid",
              "capsule_date",
              "value", 
              "voltatge"
              ], ["capsuleid" => $sensor['capsuleNumber'], "ORDER" => ["capsule_date" => "DESC"],"LIMIT" => 20]);
            $lastValue = $valuesChart[count($valuesChart)-1]['value'];
            $lastDate = $valuesChart[count($valuesChart)-1]['capsule_date'];
            $chartData = "[";
            $chartLabels = "[";
            $valuesChart = array_reverse($valuesChart);
            foreach ($valuesChart as $value) {
              $chartData .= $value['value'].",";
              $chartLabels .= "'',";
            }
            $chartData = substr($chartData, 0, -1);
            $chartLabels = substr($chartLabels, 0, -1);
            $chartData .= "]";
            $chartLabels .= "]";
            ?>
            <div class="title">
              <div class="name"><?php echo $capsulename; ?></div>
              <div class="updated">Last update: <?php echo $lastDate;?></div>
            </div>

            <div class="value"><?php echo $lastValue;?> N/mm<sup>2</sup></div>
          </div>

          <div id="capsula<?php echo $capsulenumber; ?>">

            <div class="mesural-chart" style="width:385px;margin-left:45px;margin-top:20px;">
              <canvas id="myChart<?php echo $capsulenumber; ?>"></canvas>
            </div>
            <script>
            var ctx = document.getElementById('myChart<?php echo $capsulenumber; ?>');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                  datasets: [{
                    data: <?php echo $chartData;?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                  }],
                  labels: <?php echo $chartLabels;?>
                },
                options: {
                    legend: {display: false},
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                minRotation:90
                            }
                        }]
                    }
                }
            });
            </script>
            <table class="capsule-data-table">
              <tr class="table-titles">
                <th class="date-title">Date</th>
                <th class="value-title">Value</th>
              </tr>
              <?php
              $values = $database->select("capsuleValues", [
                "capsuleid",
                "capsule_date",
                "value",
                "voltatge"
                ], ["capsuleid" => $sensor['capsuleNumber'], "ORDER" => ["capsule_date" => "DESC"],"LIMIT" => 20]);
              foreach ($values as $value) {
                echo '<tr>';                  
                echo '<tr class="table-values">';
                echo '<td class="date-value">'.str_replace("-","/",$value['capsule_date']).'</td>';
                echo '<td class="value-value">'.$value['value'].' N/mm<sup>2</sup></td>';
                echo '</tr>';
              }
              ?>
            </table>
          </div>

          <div class="edit-box">
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<!-- JavaScripts basics -->
<script src="lib/jquery/jquery.min.js"></script>
<!-- Scripts custom -->
<!-- Scripts custom -->
</body>
</html>
