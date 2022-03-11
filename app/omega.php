<?php
// Redirecció a HTTPS
if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on"){
  header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
  exit;
}
require('conexiones/conexion.php');
session_start();
include_once("sections/sessionStart.php");
include_once("sections/functions.php");
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Meta data -->
  <?php include_once("sections/metadata.php"); ?>

  <!-- Títol i Favicons -->
  <title>Mesural. Omega</title>

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
              <h4 class="mb-0">Omega</h4>
                
              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="index.php">Mesural</a></li>
                  <li class="breadcrumb-item active">Omega</li>
                </ol>
              </div>

            </div>
          </div>
        </div>

        <!-- ZONA NOTIFIACIONS -->
        <?php include_once("sections/notifications.php") ?>

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <?php include_once("capsule/omega.php") ?>
              </div>
            </div>
        </div>
          
        </div>

      </div>
    </div>

    <?php include_once("sections/footer.php") ?>

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
