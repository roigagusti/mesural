<?php 
include_once("sections/languages.php");
include_once("sections/visitors.php");
?>

<!DOCTYPE html>
<html lang="<?php echo $text['Lang']; ?>">
	<head>
	<!-- Meta data -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="title" content="Mesural">
	<meta name="description" content="Mesural permite conrolar el comportamiento estructural de los edificios en tiempo y de forma remota.">
	<meta property="image" content="img/mini-marca.jpg">
	<meta name="author" content="Aldasoro">

	<!-- Títol i Favicons -->
	<title>Mesural</title>
	<link rel="shortcut icon" href="img/favicon.ico">

	<!-- CSS basics -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="css/mesural/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/mesural/themify-icons.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/mesural/flexslider.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/mesural/knowledge.css" rel="stylesheet" type="text/css" media="all" />	
 	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
	<!-- CSS custom -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/theme-mesural.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/footer.css" rel="stylesheet" type="text/css" />	
	<link href="css/pricing.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/responsive.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400%7CRaleway:100,400,300,500,600,700%7COpen+Sans:400,500,600' rel='stylesheet' type='text/css'>
    <link href="http://fonts.googleapis.com/css?family=Roboto:100,300,400,600,700" rel="stylesheet" type="text/css">
	<!-- Scripts custom -->
	<script src="js/mesural/jquery.min.js"></script>
	<script src="js/mesural/common.js"></script>
	<script src="js/script.js"></script>
</head>
<?php include_once("sections/cookies.php") ?>

<body>
<?php include_once("sections/analytics.php") ?>
<?php include_once("sections/header.php") ?>

<div class="main-container">
		<div class="main-container">
			<section class="pt120 pb24 image-bg">
				<div class="background-image-holder chien">
					<img alt="Mesural background" class="background-image" src="../img/louvre-bg.jpg" />
				</div>
				<div class="container">
					<div class="row">
						<div class="col-sm-8 mb-xs-80">
							<br>
							<br>
							<br>
							<h1 class="mb16"><?php echo $text['Titol']; ?></h1>
							<h6 class="uppercase mb32"><span style="font-weight:normal"><?php echo $text['Subtitol-primer']; ?></span><?php echo $text['Subtitol-segon']; ?></h6>
							<p><a class="btn btn-lg" href="https://app.mesural.com/register.php" target="_blank"><?php echo $text['Sign up now']; ?></a></p>
							<br>
							<br>
							<br>
						</div>
					</div>
				</div>
			</section>

			<hr></hr>

			<section>
				<div class="container">
					<h2>Mesural Capsule</h2>
					<h3>The only thing that change is everything</h3>
					<a href="#">More information</a>
					<a href="#">Buy</a>
					<img src="img/capsule.png" />
					<p>Te resultará totalmente familiar y totalmente revolucionario. Crea las mejores soluciones constructivas con la tranquilidad en todo momento. Presentamos la posibilidad de innovar bajo control.</p>
				</div>
			</section>

			<section class="bg-secondary" >
				<div class="container">
					<h2>Now and remotely</h2>
					<h3>On construction, at the office, at home: in the same way and on real time</h3>
					<img src="img/devices.png" />
					<p>Imagina, crea, modifica en tiempo real. Nunca ha sido tan fácil tomar decisiones del mismo modo en la obra que desde el sofá de tu casa.<br><br>Tú decides cómo te ayudamos. Deja que la Cápsula de Mesural haga el resto.</p>
					<a href="#">More information</a>
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
							<a href="//fundacion.arquia.com" target="_blank"><img src="img/suport/fundacion-arquia.png" ></a>
						</div>
						<div class="col-md-3 text-center">
							<a href="//www.barcelona.cat" target="_blank"><img src="img/suport/barcelona-activa.png" ></a>
						</div>
						<!--<div class="col-md-3 text-center">
							<a href="//www.upc.edu/emprenupc/es/empren-upc" target="_blank"><img src="img/suport/upc.png" ></a>
						</div>
						<div class="col-md-3 text-center">
							<a href="//www.masalaconsultors.com" target="_blank"><img src="img/suport/masala.png" ></a>
						</div>-->
					</div>
				</div>
			</section>

		</div>		

		<?php include_once("sections/footer.php") ?>
	</div>
</div>

</body>

<script src="js/mesural/bootstrap.min.js"></script>
<script src="js/mesural/flickr.js"></script>
<script src="js/mesural/flexslider.min.js"></script>
<script src="js/mesural/masonry.min.js"></script>
<script src="js/mesural/twitterfetcher.min.js"></script>
<script src="js/mesural/spectragram.min.js"></script>
<script src="js/mesural/ytplayer.min.js"></script>
<script src="js/mesural/countdown.min.js"></script>
<script src="js/mesural/smooth-scroll.min.js"></script>
<script src="js/mesural/parallax.js"></script>
<script src="js/mesural/scripts.js?v=20190531"></script>
<script src="js/mesural/form.js"></script>
</html>