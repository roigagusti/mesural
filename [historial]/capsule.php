<?php 
include_once("sections/languages.php");
include_once("sections/visitors.php");
?>

<!DOCTYPE html>
<html lang="<?php echo $text['Lang']; ?>">
	<head>
	<!-- Meta data -->
  	<meta name="title" content="Mesural">
	<?php include_once("sections/metadata.php"); ?>

	<!-- Títol i Favicons -->
	<title>Capsule | Mesural</title>
	<link rel="shortcut icon" href="img/favicon.ico">

	<!-- CSS basics -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="css/mesural/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/mesural/themify-icons.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/mesural/flexslider.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/mesural/knowledge.css" rel="stylesheet" type="text/css" media="all" />	
 	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
	<!-- CSS custom -->
    <link href="css/theme-mesural.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
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
					<img alt="Mesural background" class="background-image" src="../img/capsule-bg.jpg" />
				</div>
				<div class="container">
					<div class="row">
						<div class="col-sm-8 mb-xs-80">
							<br>
							<br>
							<br>
							<h1 class="mb16">Mesural Capsule</h1>
							<h6 class="uppercase mb32"><span style="font-weight:normal">Easy installation to </span>monitoring your buildings</h6>
							<p><a class="btn btn-lg" href="https://app.mesural.com/register.php" target="_blank">Buy now</a></p>
							<br>
							<br>
							<br>
						</div>
					</div>
				</div>
			</section>

			<hr></hr>

			<style>
			.service-icon{
				height:100px;
				width:100px;
				background-color: #ffe4e1;
				border-radius: 50%;
				display: inline-block;
				padding-top:35px;
			}
			.service-icon i{
				font-size:30px; 
				color: rgba(160,0,0,0.4);
			}
			h3{
				margin-bottom:10px !important;
				margin-top:20px !important;
			}

			.etapa{
				margin-bottom:50px;
			}
			.etapa .descripcio{
				margin-top:60px;
			}
			.etapa .descripcio p{
				margin-top:20px;
				text-align: justify;
			}

			.text-justify{
				text-align: justify !important;
			}
			.mobile{
				display:none;
			}
			</style>
			<section>
				<div class="container">
					<div class="row mb64 mb-xs-24">
						<div class="col-sm-12 text-center">
							<h2><?php echo $text['Our system']; ?></h2>
						</div>
					</div>	
					<div class="row">
						<div class="col-md-3 text-center">
							<div class="service-icon">
								<i class="fas fa-microchip"></i>
							</div>
							<h3><?php echo $text['Titol 1']; ?></h3>
							<p><?php echo $text['Descripcio 1']; ?></p>
						</div>
						<div class="col-md-3 text-center">
							<div class="service-icon">
								<i class="fas fa-server"></i>
							</div>
							<h3><?php echo $text['Titol 2']; ?></h3>
							<p><?php echo $text['Descripcio 2']; ?></p>
						</div>
						<div class="col-md-3 text-center">
							<div class="service-icon">
								<i class="fas fa-code"></i>
							</div>
							<h3><?php echo $text['Titol 3']; ?></h3>
							<p><?php echo $text['Descripcio 3']; ?></p>
						</div>
						<div class="col-md-3 text-center">
							<div class="service-icon">
								<i class="far fa-check-circle"></i>
							</div>
							<h3><?php echo $text['Titol 4']; ?></h3>
							<p><?php echo $text['Descripcio 4']; ?></p>
						</div>
					</div>
				</div>
			</section>

			<section class="bg-secondary" id="services">
				<div class="container">
					<div class="row mb64 mb-xs-24">
						<div class="col-sm-12 text-center">
							<h2><?php echo $text['Services']; ?></h2>
						</div>
					</div>
					<div class="row etapa">
						<div class="col-md-6">
							<img src="img/serveis/mac+dashboard.png" alt="Previsualización en Macbook">
						</div>
						<div class="col-md-6 descripcio">
							<h3><?php echo $text['Etapa. Titol 1']; ?></h3>
							<p><?php echo $text['Etapa. Descripcio 1']; ?></p>
						</div>
					</div>

					<div class="row etapa">
						<div class="col-md-6 mobile">
							<img src="img/serveis/ipad+iphone.png" alt="Previsualización en Ipad e Iphone">
						</div>
						<div class="col-md-6 descripcio">
							<h3><?php echo $text['Etapa. Titol 2']; ?></h3>
							<p><?php echo $text['Etapa. Descripcio 2']; ?></p>
						</div>
						<div class="col-md-6 no-mobile">
							<img src="img/serveis/ipad+iphone.png" alt="Previsualización en Ipad e Iphone">
						</div>
					</div>
				</div>
			</section>

			<section class="bg">
				<div class="col-sm-12">
					<div class="container center">
						<h2><?php echo $text['Now and remotely']; ?></h2>
						<h3><?php echo $text['Subtitle remot']; ?></h3>
						
						<div class="col-sm-8">
							<img id="devices" src="img/devices.png" />
						</div>
						<div class="col-sm-4">
							<p id="devices-text"><?php echo $text['Paragraf remot 1']; ?><br><br><?php echo $text['Paragraf remot 2']; ?><br><br>
							<a class="more-information" href="#"><?php echo $text['More information']; ?></a>
							</p>
						</div>
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