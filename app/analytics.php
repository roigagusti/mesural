<?php
// Redirecció a HTTPS
if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on"){
  header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
  exit;
}
require('conexiones/conexion.php');
session_start();
include_once("sections/sessionStart.php");
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Meta data -->
  <?php include_once("sections/metadata.php"); ?>

  <!-- Títol i Favicons -->
  <title>Mesural. Humedad</title>

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
              <h4 class="mb-0">Analíticas de humedad</h4>
                
              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="index.php">Mesural</a></li>
                  <li class="breadcrumb-item active">Analíticas</li>
                </ol>
              </div>

            </div>
          </div>
        </div>

        <!-- ZONA NOTIFIACIONS -->
        <?php include_once("sections/notifications.php") ?>

        <?php
        $datas = $database->select("capsuleProperty", [
          "userID",
          "deviceID",
          "deviceName",
          "createDate"
          ],["userID"=>$id,"ORDER"=>["createDate"=>"ASC"]]);
        ?>

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="center">

                  <form method="get" action="analytics.php" >
                    <!--<div class="row">
                      <div class="switcher center col-md-12" style="display:block ruby">
                        <input class="input" id="tempSwitch" name="tempSwitch" type="checkbox">
                        <label class="label" for="tempSwitch">
                          <div class="left">Humedad</div>
                          <div class="switch">
                            <span class="slider round"></span>
                          </div>
                          <div class="right">Temperatura</div>
                        </label>
                      </div>
                    </div>-->

                    <div class="row analytics-page mt-3">
                    
                      <div class="col-md-2 offset-2">
                        <div class="form-group">
                            <label style="float:left">Cápsula 01</label>
                            <select class="form-control" name="c01">
                              <?php 
                              foreach($datas as $data){
                                $deviceKey = $database->get('capsuleInfo', 'deviceKey', ["id"=>$data['deviceID']]);
                                echo '<option value="'.$data['deviceID'].'">'.$data['deviceName'].' ('.$deviceKey.')</option>';
                              }
                              ?>
                            </select>
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group">
                            <label style="float:left">Cápsula 02</label>
                            <select class="form-control" name="c02">
                              <?php 
                              foreach($datas as $data){
                                $deviceKey = $database->get('capsuleInfo', 'deviceKey', ["id"=>$data['deviceID']]);
                                echo '<option value="'.$data['deviceID'].'">'.$data['deviceName'].' ('.$deviceKey.')</option>';
                              }
                              ?>
                            </select>
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group">
                            <label style="float:left">Cápsula 03</label>
                            <select class="form-control" name="c03">
                              <?php 
                              foreach($datas as $data){
                                $deviceKey = $database->get('capsuleInfo', 'deviceKey', ["id"=>$data['deviceID']]);
                                echo '<option value="'.$data['deviceID'].'">'.$data['deviceName'].' ('.$deviceKey.')</option>';
                              }
                              ?>
                            </select>
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group" style="float:left;padding-top:29px">
                            <button type="submit" class="btn btn-primary" >Comparar</button>
                        </div>

                      </div>
                    </form>

                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <?php if($_GET['c01']>0){?>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <?php 
                $c01Name = $database->get('capsuleProperty', 'deviceName', ["deviceID"=>$_GET['c01']]);
                $c01 = $database->select("capsuleValues_lep", [
                  "deviceID",
                  "createDate",
                  "temperature",
                  "humidity",
                  "weatherTemp"
                  ],["deviceID"=>$_GET['c01']]);
                $c02Name = $database->get('capsuleProperty', 'deviceName', ["deviceID"=>$_GET['c02']]);
                $c02 = $database->select("capsuleValues_lep", [
                  "deviceID",
                  "createDate",
                  "temperature",
                  "humidity",
                  "weatherTemp"
                  ],["deviceID"=>$_GET['c02']]);
                $c03Name = $database->get('capsuleProperty', 'deviceName', ["deviceID"=>$_GET['c03']]);
                $c03 = $database->select("capsuleValues_lep", [
                  "deviceID",
                  "createDate",
                  "temperature",
                  "humidity",
                  "weatherTemp"
                  ],["deviceID"=>$_GET['c03']]);

                $etiquetas = [];
                $datosC01 = [];
                $datosC02 = [];
                $datosC03 = [];
                foreach($c01 as $data){
                  $etiquetas[] = $data['createDate'];
                  $datosC01[] = $data['humidity'];
                }
                foreach($c02 as $data){
                  $datosC02[] = $data['humidity'];
                }
                foreach($c03 as $data){
                  $datosC03[] = $data['humidity'];
                }
                $respuesta = [
                    "etiquetas" => $etiquetas,
                    "datosTemp" => $datosC01,
                    "datosHum" => $datosC02,
                    "datosExt" => $datosC03,
                    "c01" => $c01Name,
                    "c02" => $c02Name,
                    "c03" => $c03Name                               
                ];
                $chart = json_encode($respuesta);
                ?>
                <div id="sales-analytics-chart" class="apex-charts" dir="ltr"></div>

              </div>
            </div>
          </div>
        </div>
        <?}?>

      </div>
    </div>

    <?php include_once("sections/footer.php") ?>
    <?php include_once("sections/modal/modal-capsule.php") ?>

  </div>
</div>

<!-- JavaScripts basics -->
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

<script src="assets/libs/apexcharts/apexcharts.min.js"></script>
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
<script>
    const dades = JSON.parse('<?= $chart; ?>');
    const etiquetas = dades.etiquetas;
    const datosTemp = dades.datosTemp;
    const datosHum = dades.datosHum;
    const datosExt = dades.datosExt;
    var max = new Date(dades.max).getTime();
    var min = new Date(dades.min).getTime();
    var range = dades.visibility * (max - min);
    const c01Name = dades.c01;
    const c02Name = dades.c02;
    const c03Name = dades.c03;

    var options = {
      chart: {
        height: 339,
        type: "line",
        stacked: !1,
        toolbar: {
            show: 1
        }
      },
      stroke: {
        width: [2, 2, 2],
        curve: "smooth"
      },
      plotOptions: {
        bar: {
          columnWidth: "30%"
        }
      },
      colors: ["#bd574e", "#f1b44c", "#dfe2e6"],
      series: [{
        name: c01Name,
        type: "line",
        data: datosTemp
      }, {
        name: c02Name,
        type: "line",
        data: datosHum
      }, {
        name: c03Name,
        type: "line",
        data: datosExt
      }],
      fill: {
        opacity: [1, 1, 1],
        gradient: {
          inverseColors: !1,
          shade: "light",
          type: "vertical",
          opacityFrom: .85,
          opacityTo: .55,
          stops: [0, 100, 100, 100]
        }
      },
      labels: etiquetas,
      markers: {
        size: 0
      },
      xaxis: {
        type: "datetime",
        tickPlacement: 'on',
        hideOverlappingLabels: true,
        showDuplicates: false,
        //range: range
      },
      yaxis: {
        title: {
          text: ""
        }
      },
      tooltip: {
        shared: !0,
        intersect: !1,
        y: {
          formatter: function(e) {
            return void 0 !== e ? e.toFixed(0) + "" : e
          }
        },
        x: {
          show: true,
          format: 'HH:mm',
          formatter: undefined,
        }
      },
      toolbar: {
        show: true,
        offsetX: 0,
        offsetY: 0,
        tools: {
          download: true,
          selection: true,
          zoom: true,
          zoomin: true,
          zoomout: true,
          pan: false,
          reset: true | '<img src="/static/icons/reset.png" width="20">',
          customIcons: []
        },
        export: {
          csv: {
            filename: undefined,
            columnDelimiter: ',',
            headerCategory: 'category',
            headerValue: 'value',
            dateFormatter(timestamp) {
              return new Date(timestamp).toDateString()
            }
          },
          svg: {
            filename: undefined,
          },
          png: {
            filename: undefined,
          }
        },
        autoSelected: 'zoom' 
      },
      grid: {
        borderColor: "#f1f1f1"
      }
    };
    (chart = new ApexCharts(document.querySelector("#sales-analytics-chart"), options)).render();
</script>
</body>
</html>
