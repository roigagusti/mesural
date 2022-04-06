<?php
// Redirecció a HTTPS
if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on"){
  header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
  exit;
}
require('conexiones/conexion.php');
session_start();
include_once("sections/sessionStart.php");

function dateDistance($datetime){
  $strTime = array("segundos", "minutos", "horas", "días", "meses", "años");
  $length = array("60","60","24","30","12","10");
  $timestamp = strtotime($datetime);
  $currentTime = time();
  $diff = $currentTime - $timestamp;
  if($diff<60){return "Hace un momento";}elseif($diff>150000000){return "-";}else{
    for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
    $diff = $diff / $length[$i];
    }

    $diff = round($diff);
    return "Hace ".$diff." ".$strTime[$i];
  }
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Meta data -->
  <?php include_once("sections/metadata.php"); ?>

  <!-- Títol i Favicons -->
  <title>Mesural. Admin</title>

  <!-- CSS Libraries -->
  <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
  <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
  
  <link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">
  <link href="assets/libs/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
  <link href="assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
  <link href="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">
  <!-- CSS Custom -->
  <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
  <link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">

  <!-- Scripts Libraries -->
  <!-- Scripts custom -->
</head>

<body>
<div id="layout-wrapper" class="simpleLayout">
  <?php include_once("sections/header.php") ?>
  <?php include_once("sections/sidebarMenu.php") ?>
  
  <div class="main-content">
    <div class="page-content">
      <div class="container-fluid">

        <!-- Zona superior de títol -->
        <div class="row">
          <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
              <h4 class="mb-0">Cápsulas</h4>
                
              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="index.php">Mesural</a></li>
                  <li class="breadcrumb-item active">Administración</li>
                </ol>
              </div>

            </div>
          </div>
        </div>

        <!-- ZONA NOTIFIACIONS -->
        <?php include_once("sections/notifications.php") ?>

        <div class="row">
          <div class="col-md-4">
            <div>
              <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newCapsule">
                <i class="mdi mdi-plus mr-1"></i> Crear cápsula
              </button>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <?php
                $capsules = $database->select("capsuleInfo",[
                  "id",
                  "deviceKey",
                  "deviceType",
                  "createDate",
                  "frequency"
                  ],["ORDER"=>["id"=>"ASC"]]);
                ?>

                <div class="table-responsive" style="min-height:300px">
                  <table class="table table-centered table-nowrap mb-0">
                    <thead class="thead-light">
                      <tr>
                        <th>Número</th>
                        <th>Device Key</th>
                        <th>Device Type</th>
                        <th>Frecuencia</th>
                        <th>Temperatura</th>
                        <th>Humedad</th>
                        <th>Clima</th>
                        <th></th>
                        <th>Última conexión</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i=0;
                      foreach($capsules as $capsula){
                        $i++;
                        if($capsula['deviceType']==3){
                          $temperature = $database->get("capsuleValues_lep","temperature",["deviceID"=>$capsula['id']]);
                          $humidity = $database->get("capsuleValues_lep","humidity",["deviceID"=>$capsula['id']]);
                          $clima = $database->get("capsuleValues_lep","weatherMain",["deviceID"=>$capsula['id']]);
                        }else{
                          $temperature = "-";
                          $humidity = "-";
                          $clima = "-";
                        }
                        $date = $database->get("capsuleValues_lep", "createDate", ["deviceID"=>$capsula['id'],"ORDER"=>["createDate"=>"DESC"]]);
                        $timeLastTemp = time()-strtotime($date);
                        $capsulaFrequency = ($capsula['frequency']+2)*60;
                        if($timeLastTemp > $capsulaFrequency){
                            $battery = '<span style="color:#ddd;"><i class="fas fa-circle"></i></span>';
                        }else{
                            $battery = '<span style="color:rgb(192,227,181);"><i class="fas fa-circle"></i></span>';
                        }
                        ?>
                        <tr>
                          <td><strong><?php echo $i;?></strong></td>
                          <td><a href="admin-detail.php?id=<?php echo $capsula['id'];?>" class="text-body"><?php echo $capsula['deviceKey'];?></a></td>
                          <td><?php echo $capsula['deviceType'];?></td>
                          <td><?php echo $capsula['frequency'].' minutos';?></td>
                          <td><?php echo $temperature;?></td>
                          <td><?php echo $humidity;?></td>
                          <td><?php echo $clima;?></td>
                          <td><?php echo $battery;?></td>
                          <td style="color:#999;"><?php echo dateDistance($date);?></td>
                        </tr>
                      <?php }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
          
        </div>

      </div>
    </div>

    <?php include_once("sections/footer.php") ?>
    <?php include_once("sections/modal/modal-newCapsule.php") ?>

  </div>
</div>

<!-- JavaScripts basics -->
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

<script src="assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="assets/js/pages/dashboard.init.js"></script>
<script src="assets/js/pages/form-advanced.init.js"></script>
<script src="assets/libs/select2/js/select2.min.js"></script>
<script src="assets/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="assets/js/pages/table-responsive.init.js"></script>
<!-- JavaScripts custom -->
<script src="assets/js/app.js"></script>
<script src="js/script.js"></script>
<!-- Scripts custom -->
</body>
</html>
