<?php
if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on"){
  header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
  exit;
}
include_once("sections/languages.php");
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
	<title>Mesural | Buy capsule</title>
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
<?php include_once("sections/cookies.php") ?>

<body>
<?php include_once("sections/analytics.php") ?>
<?php include_once("sections/header.php") ?>

<div class="main-container">
		<div class="main-container">
			<section>
				<div class="container capsule-connectivity">
					<div class="col-md-4">
						<img id="capsule" src="img/capsule.png" alt="View of capsule"/>
					</div>
					<div class="col-md-8">
						<div class="row">
							<form action="#">
							<div class="col-md-6">
								<div class="buy-title">Capsule connectivity</div>
								<div class="buy-specs">
									Valores de tensión de cualquier elemento estructural,<br>
									de forma no invasiva a partir de microdeformaciones.<br>
									Monitorización en remoto,<br>
									sin personal cualificado en obra.<br>
									Datos en tiempo real y<br>
									generación de patrones de comportamiento.<br>
									Dispositivo sin cables,<br>
									evitando material sensible en obra.<br>
									Instalación automática:<br>
									colocar y presionar, al alcance de cualquiera.
								</div>
								<div class="deliver">
									<img src="img/deliver.jpg" alt="Types of delivery">
								</div>
							</div>
							<div class="col-md-3 items">
								<select id="items" onchange="actualitzapreu()" id="">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<div class="select-arrow"></div>
							</div>
							<div class="col-md-3 price" id="preu">299,00 €</div>
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
								<div id="promo" class="collapse">
									<div class="ruby">
										<form action="#" method="post">
											<input type="text" name="codi-promo" placeholder="<?php echo $text['Introduce codigo']; ?>">
											<button class="valida-promo" type="submit"><?php echo $text['Validar']; ?></button>
										</form>
									</div>
								</div>
							</div>
							<div class="col-md-6 value">
								<div id="subtotal" class="subtotal right">299,00 €</div>
								<div class="entrega right">0,00 €</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 concepte">
								<div class="total left"><?php echo $text['Total']; ?>:</div>
							</div>
							<div class="col-md-6 value">
								<div id="total" class="total right">299,00 €</div>
								<div class="iva right"><?php echo $text['Includes']; ?> <span id="iva">51,89 €</span> <?php echo $text['of VAT']; ?></div>
								<button class="pay" type="submit"><?php echo $text['Pagar']; ?></button>
							</div>
							</form>
						</div>
					</div>
				</div>
			</section>

		</div>		

		<?php include_once("sections/footer.php") ?>
	</div>
</div>

</body>
<!-- Scripts Libraries -->
<script src="lib/bootstrap/bootstrap.min.js"></script>
</html>