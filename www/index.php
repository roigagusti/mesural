<?php include_once("sections/languages.php");?>

<!DOCTYPE html>
<html lang="<?php echo $text['Lang']; ?>">
	<head>
	<!-- Meta data -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="Mesural es la tecnología de fácil instalación que monitoriza estructuras a tiempo real y de forma remota garantizando la seguridad en la arquitectura.">
	<meta property="image" content="img/mini-marca.jpg">
	<meta name="author" content="Aldasoro">
  	<meta name="title" content="Mesural">

	<!-- Títol i Favicons -->
	<title>Mesural | Monitorización de estructuras</title>
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

<div class="main-container main">
	<div class="main-container">
		<section class="pt120 pb24 image-bg">
			<div class="background-image-holder louvre">
				<img alt="Mesural background" class="background-image" src="../img/louvre-bg.jpg" />
			</div>
			<div class="container">
				<div class="row">
					<div class="col-sm-8 mb-xs-80">
						<br>
						<br>
						<br>
						<h1 class="mb16"><?php echo $text['Titol']; ?></h1>
						<h6 class="uppercase mb32"><span style="font-weight:normal"><?php echo $text['Subtitol']; ?></span><?php echo $text['Subtitol negrita']; ?></h6>
						<p><a class="btn btn-lg" href="https://app.mesural.com/register.php" hreflang="en" target="_blank"><?php echo $text['Sign up now']; ?></a></p>
						<br>
						<br>
						<br>
					</div>
				</div>
			</div>
		</section>

		<hr></hr>

		<section>
			<div class="container center">
				<h2><?php echo $text['Titol capsula']; ?></h2>
				<h3><?php echo $text['Subtitol capsula']; ?></h3>
				<div class="capsule-buttons">
					<a href="buy-capsule.php" hreflang="<?php echo $text['Lang']; ?>"><?php echo $text['Buy']; ?></a> <i class="fas fa-chevron-right"></i>
				</div>

				<div class="col-sm-12">
					<img alt ="Mesural capsule" id="capsule" src="img/capsule.png" />
				</div>

				<div class="col-md-6 col-md-push-3">
					<p class="reduce-top-50"><?php echo $text['Paragraf capsula']; ?></p>
				</div>
			</div>
		</section>

		<section class="bg-secondary">
			<div class="col-sm-12">
				<div class="container center">
					<h2><?php echo $text['Now and remotely']; ?></h2>
					<h3><?php echo $text['Subtitol remot']; ?></h3>
					
					<div class="col-sm-8">
						<img alt="Mesural devices" id="devices" src="img/devices.png" />
					</div>
					<div class="col-sm-4">
						<p id="devices-text"><?php echo $text['Paragraf remot 1']; ?><br><br><?php echo $text['Paragraf remot 2']; ?><br><br>
						<!--<a class="more-information" href="#" hreflang="<?php echo $text['Lang']; ?>"><?php echo $text['More information']; ?></a>-->
						</p>
					</div>
				</div>
			</div>
		</section>

		<section>
			<div class="container">
				<div class="row mb64 mb-xs-24">
					<div class="col-sm-12 text-center">
						<h2><?php echo $text['Supported by']; ?></h2>
					</div>
				</div>	
				<div class="row suport">
					<div class="col-md-3"></div>
					<div class="col-md-3 text-center">
						<a href="https://fundacion.arquia.com" hreflang="es" target="_blank"><img alt="Fundación Arquia logo" src="img/suport/fundacion-arquia.png" ></a>
					</div>
					<div class="col-md-3 text-center">
						<a href="https://www.barcelona.cat" hreflang="es" target="_blank"><img alt="Barcelonactiva logo" src="img/suport/barcelona-activa.png" ></a>
					</div>
				</div>
			</div>
		</section>

	</div>
	<?php include_once("sections/footer.php") ?>
</div>

</body>
<!-- Scripts Libraries -->
<script src="lib/bootstrap/bootstrap.min.js"></script>
</html>