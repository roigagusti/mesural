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
			<section>
				<div class="container capsule-connectivity">
					<div class="col-md-4">
						<img id="capsule" src="img/capsule.png" />
					</div>
					<div class="col-md-8">
						<div class="row">
							<form action="index.php">
							<div class="col-md-6">
								<div class="buy-title">Capsule connectivity</div>
								<div class="buy-specs">
									Lorem ipsum dolor sit amet<br>
									Consectetur adipiscing elit<br>
									Vivamus augue metus<br>
									Egestas vitae mauris a<br>
									Auctor fermentum sem<br>
									Mauris imperdiet pulvinar metus<br>
									A convallis risus<br>
									Donec lacinia velit et purus ullamcorper facilisis<br>
									Phasellus elementum malesuada lobortis<br>
									Proin ultrices et leo vel ultricies
								</div>
								<div class="deliver">
									<img src="img/deliver.jpg">
								</div>
							</div>
							<div class="col-md-3 items">1<i class="fa fa-chevron-down"></i></div>
							<div class="col-md-3 price">200,00 €</div>
						</div>
					</div>
				</div>

				<div class="container">
					<div class="col-md-offset-4 col-md-8">
						<div class="row totals">
							<div class="col-md-6 concepte">
								<div class="subtotal left">Subtotal</div>
								<div class="entrega left">Entrega</div>
								<div class="codi-promo left">¿Tienes un código promocional?</div>
							</div>
							<div class="col-md-6 value">
								<div class="subtotal right">200,00 €</div>
								<div class="entrega right">0,00 €</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 concepte">
								<div class="total left">Tu total:</div>
							</div>
							<div class="col-md-6 value">
								<div class="total right">200,00 €</div>
								<div class="iva right">Incluye 34,71 € de IVA</div>
								<button class="pay" type="submit">Pagar</button>
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