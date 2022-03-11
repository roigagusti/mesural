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
  <title>Mesural. Configuración</title>

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
              <h4 class="mb-0">Configuración</h4>
                
              <div class="page-title-right">
                <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="index.php">Mesural</a></li>
                  <li class="breadcrumb-item active">Configuración</li>
                </ol>
              </div>

            </div>
          </div>
        </div>

        <!-- ZONA NOTIFIACIONS -->
        <?php include_once("sections/notificacions.php") ?>

        <div class="row">

          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <h4 style="font-size:16px">Configuración personal</h4>
                <div class="profileDades">
                  <div class="row">
                    <div class="col-md-12">
                      <ul class="dadesConfig">
                        <li><div class="row"><div class="dadesTitles">Nombre</div> <div class="dadesFacturacio"><?php echo $userName;?></div></div></li>
                        <li><div class="row"><div class="dadesTitles">Email</div> <div class="dadesFacturacio"><?php echo $userEmail;?></div></div></li>
                        <li><div class="row"><div class="dadesTitles">Contraseña</div> <div class="dadesFacturacio">********</div></div></li>
                        <li><div class="row"><div class="dadesTitles">Idioma</div> <div class="dadesFacturacio">Español</div></div></li>
                        <br>
                        <li><a data-toggle="modal" data-target="#editProfile" style="cursor:pointer;color:#bd574e">Cambiar configuración</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <h4 style="font-size:16px">Suscripciones</h4>
                <div class="profileSuscripcio">
                  <?php 
                  switch($planUsuari){
                    case 1: echo '<div class="planTitle"><i class="uil uil-laptop text-primary"></i><br><strong>Manos a la obra.</strong> Plan expansión (9.99€/mes)</div>';
                        break;
                    case 2: echo '<div class="planTitle"><i class="uil uil-plane-fly text-primary"></i><br><strong>Profesional.</strong> Plan profesional (19.99€/mes)</div>';
                        break;
                    default: echo '<div class="planTitle"><i class="uil uil-heart text-primary"></i><br><strong>Entre amigos.</strong> Prueba versión beta (0.00€/mes)</div>';
                        break;
                  }?>
                  <ul class="dadesConfig mt-4">
                    <li><a data-toggle="modal" data-target="#payment" style="cursor:pointer;color:#bd574e">Cambiar de plan</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <h4 style="font-size:16px">API Claves</h4>
                <div class="profileSuscripcio">


                  <?php 
                  $apiKey = $database->get("users","apiKey",["id"=>$id]);
                  if(strlen($apiKey)>0){?>
                  <div class="row">
                    <div class="col-md-12">
                      <ul class="dadesConfig">
                        <li><div class="row"><div class="dadesTitles">Clave pública</div> <div class="dadesFacturacio"><?php echo $apiKey;?></div></div></li>
                      </ul>
                    </div>
                  </div>
                  <?php }else{
                    echo '<div class="planTitle">No hay claves generadas</div>';
                  } ?>

                  <ul class="dadesConfig mt-4">
                    <li><a href="https://api.mesural.com/index.php?get=apikey&id=<?php echo $id;?>">Generar claves</a></li>
                  </ul>
                </div>

              </div>
            </div>
          </div> 

        </div>
      </div>
    </div>

    <?php include_once("sections/footer.php") ?>
    <?php include_once("sections/modal/modal-editProfile.php") ?>
    <?php include_once("sections/modal/modal-userEmpresa.php") ?>
    <?php include_once("sections/modal/modal-payment.php") ?>

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
<script src="https://js.stripe.com/v3/"></script>
<script>
// Create an instance of the Stripe object
// Set your publishable API key
var stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

// Create an instance of elements
var elements = stripe.elements();

var style = {
    base: {
        fontWeight: 400,
        fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
        fontSize: '16px',
        lineHeight: '1.4',
        color: '#555',
        backgroundColor: '#fff',
        '::placeholder': {
            color: '#888',
        },
    },
    invalid: {
        color: '#eb1c26',
    }
};

var cardElement = elements.create('cardNumber', {
    style: style
});
cardElement.mount('#card_number');

var exp = elements.create('cardExpiry', {
    'style': style
});
exp.mount('#card_expiry');

var cvc = elements.create('cardCvc', {
    'style': style
});
cvc.mount('#card_cvc');

// Validate input of the card elements
var resultContainer = document.getElementById('paymentResponse');
cardElement.addEventListener('change', function(event) {
    if (event.error) {
        resultContainer.innerHTML = '<p>'+event.error.message+'</p>';
    } else {
        resultContainer.innerHTML = '';
    }
});

// Get payment form element
var form = document.getElementById('paymentFrm');

// Create a token when the form is submitted.
form.addEventListener('submit', function(e) {
    e.preventDefault();
    createToken();
});

// Create single-use token to charge the user
function createToken() {
    stripe.createToken(cardElement).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error
            resultContainer.innerHTML = '<p>'+result.error.message+'</p>';
        } else {
            // Send the token to your server
            stripeTokenHandler(result.token);
        }
    });
}

// Callback to handle the response from stripe
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
    
    // Submit the form
    form.submit();
}
</script>
</body>
</html>
