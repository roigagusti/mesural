<?php
if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on"){
  header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
  exit;
}
include_once("sections/languages.php");;
?>
<!DOCTYPE html>
<html lang="<?php echo $text['Lang']; ?>">
	<head>
	<!-- Meta data -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="Mesural es la tecnología de fácil instalación que monitoriza estructuras a tiempo real y de forma remota garantizando la seguridad en la arquitectura gracias a la tranquilidad que ofrecen los datos.">
	<meta property="image" content="img/mini-marca.jpg">
	<meta name="author" content="Aldasoro">
  	<meta name="title" content="Mesural">

	<!-- Títol i Favicons -->
	<title>Mesural. <?php echo $text['Book'];?> capsule</title>
	<link rel="shortcut icon" href="img/favicon.ico">


	<!-- CSS Libraries -->
	<link href="lib/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<!-- CSS Custom -->
    <link href="css/mesural.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/responsive.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

	<!-- Scripts Libraries -->
	<script src="lib/jquery/jquery.min.js"></script>

	<!-- Scripts custom -->
	<script src="js/script.js"></script>
	<script type="application/ld+json">
	  {
	    "@context": "http://schema.org",
	    "@type": "Organization",
	    "name": "Mesural",
	    "url": "https://www.mesural.com",
	    "address": "Roc Boronat 117, 08018 Barcelona",
	    "sameAs": [
	      "https://www.facebook.com/mesuralstartup",
	      "https://twitter.com/mesuralstartup",
	      "https://linkedin.com/company/mesural",
	      "https://www.instagram.com/mesuralstartup"
	    ]
	  }
	</script>
</head>
<?php include_once("sections/cookies.php"); ?>

<body>
<?php include_once("sections/analytics.php"); ?>
<?php include_once("sections/header.php"); ?>

<div class="main-container">
		<div class="main-container">
			<section>
				<div class="col-sm-12 mesuralDevices buyDevice">
					<a class="device" href="buy-capsule.php?id=bos">
				      <div class="deviceLogo">
				        <svg style="height: 100%; width: 100%; display: block; overflow: visible;" viewBox="0 0 24.75 24.75" fill="currentColor" fill-opacity="0" stroke="currentColor" stroke-width="1" focusable="false" aria-hidden="true" role="presentation" stroke-linecap="round" stroke-linejoin="round">
				          <g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><rect class="cls-1" x="0.38" y="0.38" width="24" height="24" rx="6.86"/><circle class="cls-1" cx="12.38" cy="12.38" r="6.06" transform="translate(-3.79 19.07) rotate(-67.5)"/></g></g>
				        </svg>
				      </div>
				      <div class="deviceTitle">Mesural Bos</div>
				    </a>

				    <a class="device" href="buy-capsule.php?id=quar">
				      <div class="deviceLogo">
				        <svg style="height: 100%; width: 100%; display: block; overflow: visible;" viewBox="0 0 24.75 24.75" fill="currentColor" fill-opacity="0" stroke="currentColor" stroke-width="1" focusable="false" aria-hidden="true" role="presentation" stroke-linecap="round" stroke-linejoin="round">
				          <g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><rect class="cls-1" x="0.38" y="0.38" width="24" height="24" rx="6.86"/></g></g>
				        </svg>
				      </div>
				      <div class="deviceTitle">Mesural Quar</div>
				    </a>

				    <a class="device" href="buy-capsule.php?id=lep">
				      <div class="deviceLogo">
				        <svg style="height: 100%; width: 100%; display: block; overflow: visible;" viewBox="0 0 25 25" fill="currentColor" fill-opacity="0" stroke="currentColor" stroke-width="1" focusable="false" aria-hidden="true" role="presentation" stroke-linecap="round" stroke-linejoin="round">
				          <g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><g id="Capa_1-2-2" data-name="Capa 1-2"><rect class="cls-1" x="0.5" y="0.5" width="24" height="24" rx="6.86"/></g><circle class="cls-2" cx="12.5" cy="12.5" r="1.98"/></g></g>
				        </svg>
				      </div>
				      <div class="deviceTitle">Mesural Lep</div>
				    </a>
				</div>

				<div class="container capsule-connectivity">
					<?php 
					switch($_GET['id']){
					    case 'quar':
					        $titleDevice = 'Mesural Quar';
							$descriptionDevice = 'Control de movimiento<br>Desplazamientos en cualquier dirección<br>Analisis topográficos en tiempo real<br>Dispositivo sin cables<br>Instalación automática';
							$imgDevice = 'img/capsule-quar.png';
							$priceDevice = '149.00';
							$vatDevice = '25.86';
					        break;
					    case 'lep':
					        $titleDevice = 'Mesural Lep';
							$descriptionDevice = 'Control de temperatura<br>Control de humedad<br>Analisis climáticos en tiempo real<br>Dispositivo sin cables<br>Instalación automática';
							$imgDevice = 'img/capsule-lep.png';
							$priceDevice = '59.00';
							$vatDevice = '10.24';
					        break;
					    default:
					        $titleDevice = 'Mesural Bos';
							$descriptionDevice = 'Valores de tensión de cualquier elemento estructural<br>Monitorización en remoto<br>Datos en tiempo real<br>Dispositivo sin cables<br>Instalación automática';
							$imgDevice = 'img/capsule-bos.png';
							$priceDevice = '299.00';
							$vatDevice = '51.89';
					        break;
					}?>
					<div class="col-md-4">
						<img id="capsule" src="<?php echo $imgDevice;?>" alt="View of capsule"/>
					</div>
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-6">
								<div class="buy-title"><?php echo $titleDevice;?></div>
								<div class="buy-specs"><?php echo $descriptionDevice;?></div>
								<div class="deliver">
									<img src="img/deliver.jpg" alt="Types of delivery">
								</div>
							</div>
							<div class="col-md-3 items">
								<select id="items" onchange="actualitzapreu(<?php echo $priceDevice;?>)">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<div class="select-arrow"></div>
							</div>
							<div class="col-md-3 price" id="preu"><?php echo $priceDevice;?> €</div>
						</div>
					</div>
				</div>

				<div class="container total-compra">
					<div class="col-md-offset-4 col-md-8">
						<div class="row totals">
							<div class="col-md-6 concepte">
								<div class="subtotal left"><?php echo $text['Subtotal']; ?></div>
								<div class="entrega left"><?php echo $text['Envio']; ?></div>
								<div class="codi-promo left"><a href="#promo" data-toggle="collapse"><?php echo $text['Promotional code']; ?></a></div>
								<div id="promo" class="collapse <?php if(isset($_GET['event'])){echo 'in';}?>">
									<div class="ruby">
										<form action="conexiones/codi-promo.php?lang=<?php echo $text['Lang']; ?>" method="post">
											<input type="text" name="codi-promo" placeholder="<?php echo $text['Introduce codigo']; ?>">
											<button class="valida-promo" type="submit"><?php echo $text['Validar']; ?></button>
										</form>
										<div class="alert-zone">
    										<div class="fail <?php if($_GET['event'] == "fail-code"){}else{echo 'hidden';}?>"><?php echo $text['Avis fallo']; ?></div>
    										<div class="fail <?php if($_GET['event'] == "expired"){}else{echo 'hidden';}?>"><?php echo $text['Avis caducat']; ?></div>
    										<div class="fail <?php if($_GET['event'] == "used"){}else{echo 'hidden';}?>"><?php echo $text['Avis utilitzat']; ?></div>
    										<div class="success <?php if($_GET['event'] == "success"){}else{echo 'hidden';}?>"><?php echo $text['Avis aplicat']; ?></div>
										</div>

									</div>
								</div>
							</div>
							<div class="col-md-6 value">
								<div id="subtotal" class="subtotal right"><?php echo $priceDevice;?> €</div>
								<div class="entrega right">0,00 €</div>
							</div>
						</div>

						<?php
						require('conexiones/conexion.php');
						$descuento = 0;
						if($_GET['event'] == "success"){
							$descuento = $database->get("codi-promo","descuento",["codigo" => $_GET['code']]);
						}
						echo '<input id="discount" class="hidden" value="'.$descuento.'">';
						?>

						<div class="row">
							<div class="col-md-6 concepte">
								<div class="total left"><?php echo $text['Total']; ?>:</div>
							</div>
							<div class="col-md-6 value">
								<div id="total" class="total right"><?php echo $priceDevice;?> €</div>
								<div class="iva right"><?php echo $text['Includes']; ?> <span id="iva"><?php echo $vatDevice;?> €</span> <?php echo $text['of VAT']; ?></div>
								<button class="pay" type="submit"><?php echo $text['Book']; ?></button>
							</div>
						</div>
					</div>
				</div>
			</section>

		</div>		

		<?php include_once("sections/footer.php");?>
	</div>
</div>

</body>
<!-- Scripts Libraries -->
<script src="lib/bootstrap/bootstrap.min.js"></script>
</html>