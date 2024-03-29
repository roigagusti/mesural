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
  <title>Mesural. Dashboard</title>

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
              <h4 class="mb-0">Cápsula</h4>
                
              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="index.php">Mesural</a></li>
                  <li class="breadcrumb-item active">Capsula</li>
                </ol>
              </div>

            </div>
          </div>
        </div>

        <!-- ZONA NOTIFIACIONS -->
        <?php include_once("sections/notifications.php") ?>

        <?php 
        $capsula = $database->get('capsuleProperty', [
            'id',
            'userID',
            'deviceID',
            'deviceName',
            'devicePlace',
            'deviceUse',
            'createDate',
          ],["AND"=>["deviceID"=>$_GET['id'], "userID"=>$id]]
        );
        $deviceKey = $database->get('capsuleInfo', 'deviceKey', ["id"=>$capsula['deviceID']]);
        $frequency = $database->get('capsuleInfo', 'frequency', ["id"=>$capsula['deviceID']]);
        ?>

        <div class="row mb-4">
          <div class="col-xl-4">
              <div class="card">
                  <div class="card-body">
                      <div class="text-center">
                          <div class="dropdown float-right">
                              <a class="text-body dropdown-toggle font-size-18" href="#" role="button" data-toggle="dropdown" aria-haspopup="true">
                                <i class="uil uil-ellipsis-v"></i>
                              </a>
                            
                              <div class="dropdown-menu dropdown-menu-right">
                                  <a class="dropdown-item" data-toggle="modal" data-target="#editCapsule" style="cursor:pointer;">Editar cápsula</a>
                                  <a class="dropdown-item text-danger" data-toggle="modal" data-target="#removeCapsule" style="cursor:pointer;">Borrar cápsula</a>
                              </div>
                          </div>
                          <div class="clearfix"></div>
                          <h5 class="mt-3 mb-1"><?php echo $capsula['deviceName'];?></h5>
                          <p class="text-muted">Mesural Lep</p>
                      </div>

                      <hr class="my-4">

                      <div class="text-muted">
                          <div class="table-responsive mt-4">
                              <div>
                                  <p class="mb-1">Device key:</p>
                                  <h5 class="font-size-16"><?php echo $deviceKey;?></h5>
                              </div>
                              <?php if($capsula['devicePlace']!=""){?>
                              <div>
                                  <p class="mb-1">Ubicación:</p>
                                  <h5 class="font-size-16"><?php echo $capsula['devicePlace'];?></h5>
                              </div>
                              <?php } if($capsula['deviceUse']!=""){?>
                              <div>
                                  <p class="mb-1">Funcionalidad:</p>
                                  <h5 class="font-size-16"><?php echo $capsula['deviceUse'];?></h5>
                              </div>
                              <?php }?>
                              <div>
                                  <p class="mb-1">Frecuencia de lectura:</p>
                                  <h5 class="font-size-16"><?php echo $frequency.' minutos';?></h5>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              
              <div class="d-print-none mt-4 mb-4">
                  <a href="index.php" class="btn btn-link text-muted">
                      <i class="uil uil-arrow-left mr-1"></i> Volver a Cápsulas
                  </a>
              </div>
          </div>

          <div class="col-xl-8">
              <div class="card mb-0">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                      <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#chart" role="tab">
                              <i class="uil uil-chart-down font-size-20"></i>
                              <span class="d-none d-sm-block">Gráficos</span> 
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link active" data-toggle="tab" href="#list" role="tab">
                              <i class="uil uil-list-ui-alt font-size-20"></i>
                              <span class="d-none d-sm-block">Lista</span> 
                          </a>
                      </li>
                  </ul>
                  <!-- Tab content -->
                  <div class="tab-content p-4">
                    <?php
                      $datas = $database->select("capsuleValues_lep", [
                          "deviceID",
                          "createDate",
                          "temperature",
                          "humidity",
                          "weatherTemp",
                          "weatherHumidity",
                          "weatherMain"
                          ],["deviceID"=>$_GET['id'],"ORDER"=>["createDate"=>"DESC"]]);
                    ?>
                    
                    <!-- CHART -->
                    <div class="tab-pane" id="chart">
                      <?php if(count($datas)==0){echo "No hay datos para esta cápsula.";}else{?>
                        <div id="sales-analytics-chart" class="apex-charts" dir="ltr"></div>
                      <?php } ?>
                    </div>

                    <!-- LLISTA -->
                    <div class="tab-pane active" id="list">
                      <?php if(count($datas)==0){echo "No hay datos para esta cápsula.";}else{?>
                      <div class="tab-pane">
                        <div class="table-responsive">
                            <table class="table table-nowrap table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Fecha</th>
                                        <th scope="col" class="text-center">Hora</th>
                                        <th scope="col" class="text-center">Humedad</th>
                                        <th scope="col" class="text-center">Hum.ext</th>
                                        <th scope="col" class="text-center">Temperatura</th>
                                        <th scope="col" class="text-center">Temp.ext</th>
                                        <th scope="col" class="text-center">Clima</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $etiquetas = [];
                                $datosTemp = [];
                                $datosHum = [];
                                $datosText = [];
                                $datosHext = [];

                                foreach($datas as $data){
                                  $dateCr = explode(" ",$data['createDate']);
                                  $dataFecha = $dateCr[0];
                                  $dataHora = $dateCr[1];

                                  $etiquetas[] = $data['createDate'];
                                  $datosTemp[] = $data['temperature'];
                                  $datosHum[] = $data['humidity'];
                                  $datosText[] = $data['weatherTemp'];
                                  $datosHext[] = $data['weatherHumidity'];
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo $dataFecha;?></td>
                                        <td class="text-center"><?php echo $dataHora;?></td>
                                        <td class="text-center"><?php echo number_format($data['humidity'],2,",",".");?> %</td>
                                        <td class="text-center"><?php echo number_format($data['weatherHumidity'],2,",",".");?> %</td>
                                        <td class="text-center"><?php echo number_format($data['temperature'],2,",",".");?> º</td>
                                        <td class="text-center"><?php echo number_format($data['weatherTemp'],2,",",".");?> º</td>
                                        <td class="text-center"><?php echo $data['weatherMain'];?></td>
                                    </tr>

                                <?php
                                }
                                $respuesta = [
                                    "etiquetas" => $etiquetas,
                                    "datosTemp" => $datosTemp,
                                    "datosHum" => $datosHum,
                                    "datosText" => $datosText,  
                                    "datosHext" => $datosHext                          
                                ];
                                $chart = json_encode($respuesta);
                                ?>
                                </tbody>
                            </table>
                        </div>
                      </div>
                      <?php }?>
                    </div>

                  </div>
              </div>
          </div>
        </div>   
      </div>
    </div>
    <?php include_once("sections/footer.php") ?>
    <?php include_once("sections/modal/modal-capsule.php") ?>
    <?php include_once("sections/modal/modal-editCapsule.php") ?>
    <?php include_once("sections/modal/modal-rmCapsule.php") ?>

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
    const datosText = dades.datosText;
    const datosHext = dades.datosHext;

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
        width: [2, 4, 2, 2],
        curve: "smooth"
      },
      plotOptions: {
        bar: {
          columnWidth: "30%"
        }
      },
      colors: ["#f1b44c","#bd574e","#dfe2e6","#dfe2e6"],
      series: [{
        name: "Humedad",
        type: "line",
        data: datosHum
      }, {
        name: "Temperatura",
        type: "line",
        data: datosTemp
      }, {
        name: "Hum.ext",
        type: "line",
        data: datosHext
      }, {
        name: "Temp.ext",
        type: "area",
        data: datosText
      }],
      fill: {
        opacity: [1, 1, .45, .45],
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
        showDuplicates: false
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
