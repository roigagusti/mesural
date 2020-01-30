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
	<title>Mesural | Cookie policy</title>
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
		                                    <a href="index.php#services"><?php echo $text['Services']; ?></a>
		                                </li>
										<li class="has-dropdown"><a href="index.php#pricing"><?php echo $text['Pricing']; ?></a></li>
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
					<div class="row mb-xs-24">
						<div class="col-sm-12">
							<h2>Cookie Policy</h2>
						</div>
					</div>	
					<div class="row">
						<div class="col-md-12 text-justify">
							<p>This cookie policy (&quot;Policy&quot;) describes what cookies are and how Website Operator (&quot;Website Operator&quot;, &quot;we&quot;, &quot;us&quot; or &quot;our&quot;) uses them on the <a target="_blank" rel="nofollow" href="http://www.mesural.com">mesural.com</a> website and any of its products or services (collectively, &quot;Website&quot; or &quot;Services&quot;). You should read this Policy so you can understand what type of cookies we use, the information we collect using cookies and how that information is used. It also describes the choices available to you regarding accepting or declining the use of cookies.</p>
							<strong>What are cookies?</strong>
							<p>Cookies are small pieces of data stored in text files that are saved on your computer or other devices when websites are loaded in a browser. They are widely used to remember you and your preferences, either for a single visit (through a &quot;session cookie&quot;) or for multiple repeat visits (using a &quot;persistent cookie&quot;). Session cookies are temporary cookies that are used during the course of your visit to the Website, and they expire when you close the web browser. Persistent cookies are used to remember your preferences within our Website and remain on your desktop or mobile device even after you close your browser or restart your computer. They ensure a consistent and efficient experience for you while visiting our Website or using our Services. Cookies may be set by the Website (&quot;first-party cookies&quot;), or by third parties, such as those who serve content or provide advertising or analytics services on the website (&quot;third party cookies&quot;). These third parties can recognize you when you visit our website and also when you visit certain other websites.</p>
							<strong>What type of cookies do we use?</strong><br>
							<u>Necessary cookies</u>
							<p>Necessary cookies allow us to offer you the best possible experience when accessing and navigating through our Website and using its features. For example, these cookies let us recognize that you have created an account and have logged into that account to access the content.</p>
							<u>Functionality cookies</u>
							<p>Functionality cookies let us operate the Website and our Services in accordance with the choices you make. For example, we will recognize your username and remember how you customized the Website and Services during future visits.</p>
							<u>Analytical cookies</u>
							<p>These cookies enable us and third-party services to collect aggregated data for statistical purposes on how our visitors use the Website. These cookies do not contain personal information such as names and email addresses and are used to help us improve your user experience of the Website.</p>
							<strong>What are your cookie options?</strong>
							<p>If you don't like the idea of cookies or certain types of cookies, you can change your browser's settings to delete cookies that have already been set and to not accept new cookies. To learn more about how to do this or to learn more about cookies, visit <a target="_blank" href="https://www.internetcookies.org">internetcookies.org</a>. Please note, however, that if you delete cookies or do not accept them, you might not be able to use all of the features our Website and Services offer.</p>
							<strong>Changes and amendments</strong>
							<p>We reserve the right to modify this Policy relating to the Website or Services at any time, effective upon posting of an updated version of this Policy on the Website. When we do we will revise the updated date at the bottom of this page. Continued use of the Website after any such changes shall constitute your consent to such changes. Policy was created with <a style="color:inherit" target="_blank" title="Cookie policy generator" href="https://www.websitepolicies.com/cookie-policy-generator">WebsitePolicies</a>.</p>
							<strong>Acceptance of this policy</strong>
							<p>You acknowledge that you have read this Policy and agree to all its terms and conditions. By using the Website or its Services you agree to be bound by this Policy. If you do not agree to abide by the terms of this Policy, you are not authorized to use or access the Website and its Services.</p>
							<srong>Contacting us</strong>
							<p>If you would like to contact us to understand more about this Policy or wish to contact us concerning any matter relating to our use of cookies, you may send an email to info&#64;mes&#117;r&#97;&#108;.&#99;&#111;m</p>
							<p>This document was last updated on December 11, 2019</p>
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