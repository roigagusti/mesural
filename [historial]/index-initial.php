<?php include_once("sections/languages.php") ?>
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
    <link href="css/style-initial.css" rel="stylesheet" type="text/css" media="all" />
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
<div class="nav-container">
	<header>
		<div class="nav-container">
            <a id="top"></a>
            <nav class="absolute transparent">
                <div class="nav-bar">
		    		<div class="container">
		    			<div class="row">
		                    <div class="module left nopadding">
		                        <a href="https://www.mesural.com" alt="Mesural">
									<img class="logo logo-light" alt="Mesural Logo" title="Mesural Logo"  src="https://www.mesural.com/img/mesural.png" />
		                            <img class="logo logo-dark" alt="Mesural Logo" title="Mesural Logo"  src="https://www.mesural.com/img/mesural.png" />
		       					</a>
		                    </div>
		                    <div class="module widget-handle mobile-toggle right visible-sm visible-xs">
								<i class="fas fa-bars"></i>
		                    </div>
		                    <div class="module-group right">
		                        <div class="module left">
		                            <ul class="menu">
		                                <li class="has-dropdown">
		                                    <a href="#services"><?php echo $text['Services']; ?></a>
		                                    <!--<ul class="mega-menu">
		                                        <li>
		                                            <ul>
		                                               	<li><a href="#">Hardware</a></li>
		                                                <li><a href="#">Software</a></li>
		                                                <li><a href="#">Downloads</a></li> 
		                                            </ul>
		                                        </li>
		                                    </ul>-->
		                                </li>
										<li class="has-dropdown"><a href="#pricing"><?php echo $text['Pricing']; ?></a></li>
										<li class="has-dropdown">
											<script>
									        	enlace_correo()
									        </script>
									        <?php echo $text['Contact']; ?></a></li>
		                                <li class="has-dropdown"><a href="https://app.mesural.com/login.php?lang=<?php echo $text['Lang']; ?>" target="_blank"><strong><?php echo $text['Login']; ?></strong></a></li>
		                            </ul>
		                        </div>

		                        <div class="module widget-handle language left nopadding">
		                            <ul class="menu">
		                                <li class="has-dropdown"><a href="#"><?php echo $text['Lang']; ?></a>
		                                    <ul>
		                                        <li><a href="?lang=en"><?php echo $text['English']; ?></a></li>
		                                        <li><a href="?lang=es"><?php echo $text['Espanyol']; ?></a></li>
		                                    </ul>
		                                </li>
		                            </ul>
		                        </div>
		                    </div>
						</div>
				    </div>
				</div>
		    </nav>
		</div>
	</header>
</div>

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

			<section class="bg-third" id="pricing">
				<div class='pricing pricing-palden'>

					<div class='pricing-item'>
					  <div class='pricing-deco'>
					    <svg class='pricing-deco-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
					      <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
					      <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
					      <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
					      <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
					    </svg>
					    <div class='pricing-price'><span class='pricing-currency'>€</span>1.99
					      <span class='pricing-period'>/ month</span>
					    </div>
					    <h3 class='pricing-title'>Constructor / Assurance</h3>
					  </div>
					  <ul class='pricing-feature-list'>
					    <li class='pricing-feature'>Unlimited buildings data</li>
					    <li class='pricing-feature'>Installation at 20.00€/element</li>
					    <li class='pricing-feature'>Standard control rules</li>
					  </ul>
					  <a href="//app.mesural.com/register.php?profile=constructor" class='pricing-action'>Choose plan</a>
					</div>

					<div class='pricing-item pricing__item--featured'>
					  <div class='pricing-deco'>
					    <svg class='pricing-deco-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
					      <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
					      <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
					      <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
					      <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
					    </svg>
					    <div class='pricing-price'><span class='pricing-currency'>€</span>2.99
					      <span class='pricing-period'>/ month</span>
					    </div>
					    <h3 class='pricing-title'>Architect</h3>
					  </div>
					  <ul class='pricing-feature-list'>
					    <li class='pricing-feature'>2 buildings data</li>
					    <li class='pricing-feature'>Installation at 0.00€/element</li>
					    <li class='pricing-feature'>Standard control rules</li>
					  </ul>
					  <a href="//app.mesural.com/register.php?profile=architect" class='pricing-action'>Choose plan</a>
					</div>

					<div class='pricing-item'>
					  <div class='pricing-deco'>
					    <svg class='pricing-deco-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
					      <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
					      <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
					      <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
					      <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
					    </svg>
					    <div class='pricing-price'><span class='pricing-currency'>€</span>4.99
					      <span class='pricing-period'>/ month</span>
					    </div>
					    <h3 class='pricing-title'>Engineer / OCT</h3>
					  </div>
					  <ul class='pricing-feature-list'>
					    <li class='pricing-feature'>5 buildings data</li>
					    <li class='pricing-feature'>Installation at 0.00€/element</li>
					    <li class='pricing-feature'>Customizable control rules</li>
					  </ul>
					  <a href="//app.mesural.com/register.php?profile=engineer" class='pricing-action'>Choose plan</a>
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