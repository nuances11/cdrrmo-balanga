<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Prometeo - Business, Financial and Consulting Site Template">
	<meta name="author" content="Ansonika">
	<title><?php echo $title ;?></title>

	<!-- BASE CSS -->
	<link href="<?php echo base_url() ;?>assets/frontend/css/animate.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ;?>assets/frontend/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ;?>assets/frontend/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url() ;?>assets/frontend/css/icon_fonts/css/all_icons_min.css" rel="stylesheet">

	<!-- YOUR CUSTOM CSS -->
	<link href="<?php echo base_url() ;?>assets/frontend/css/custom.css" rel="stylesheet">
	
	<!-- LayerSlider stylesheet -->
	<link href="<?php echo base_url() ;?>assets/frontend/layerslider/css/layerslider.css" rel="stylesheet">

</head>

<body>

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2';
	fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div><!-- /Preload -->

	<div class="layer"></div>
	<!-- /Overlay mask -->

	<header>
		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header-wp">
					<div class="navbar-header">
						<a class="cmn-toggle-switch cmn-toggle-switch__htx" href="javascript:void(0);" data-toggle="collapse" data-target="#navbar"><span>Menu mobile</span></a>
						<div id="logo_home">
							<h1><a style="color:black;" href="<?php echo base_url() ;?>" title="<?php echo $title;?>">CDRRMO</a></h1>
						</div>
						<!--/top_nav-->
					</div>
					<!--/navbar-header-->
				</div>
				<!--/navbar-header-wp-->
				<div class="collapse navbar-collapse navbar-right" id="navbar">
					<ul class="nav navbar-nav">
						<li>
							<a href="<?php echo base_url();?>"><span>Home</span></a>
						</li>
						<li><a href="<?php echo base_url();?>hazard-map"><span>Hazard Map</span></a></li>
						<li><a href="<?php echo base_url();?>evacuation"><span>Evacuation</span></a></li>
						<li class="dropdown">
							<a href="#0" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span>More</span></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url();?>without-disaster">Without Disaster</a></li>
								<li><a href="<?php echo base_url();?>early-warning-risk">Early Warning Risk</a></li>
								<li><a href="<?php echo base_url();?>history">History</a></li>
								<li><a href="<?php echo base_url();?>drmm">Established DRMM Office Plan</a></li>
								<li><a href="<?php echo base_url();?>organizational-chart">Organizational Chart</a></li>
							</ul>
						</li>
						<li><a href="<?php echo base_url();?>contact-us"><span>Contact</span></a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- /Nav -->
	</header><!-- /Header -->
	
	<?php ($this->uri->uri_string() == '') ? '' : $this->load->view('templates/frontend/includes/header'); ; ?>

	<main>
		<?php echo $content ;?>
	</main><!--/main-->

	<footer>
		<div class="container margin_60_35">
			<div class="row ">
				<div class="col-md-4 col-sm-6">
					<img src="img/logo-footer.png" width="190" height="48" alt="LOGO HERE" data-retina="true" id="logo_footer">
					<p><small><b>BALANGA CITY</b> Disaster Risk Reduction Management Office (CDRRMO), as known today, was established year 2008 as City Disaster Operation Center headed by Engr. Noli Dizon, with around 12 personnel. As the present Department Head of CDRRMO, Engr. Dennis B. Mariano took over the leadership on 2009, the same time the office was updated as CDRRMO. From 16 employees at that time, it raises to 22 at the present.</small></p>
				</div>
				<div class="col-md-3 col-md-offset-1 col-sm-3">
					<h3>Discover</h3>
					<ul>
						<li><a href="#">LINK 1</a></li>
						<li><a href="#">LINK 2</a></li>
						<li><a href="#">LINK 3</a></li>
						<li><a href="#">LINK 4</a></li>
					</ul>
				</div>
				<div class="col-md-4 col-sm-3" id="contact_bg">
					<h3>Contacts</h3>
					<ul id="contact_details_footer">
						<!-- <li id="address_footer">4 West 31st Street New York, New York - 10001<br>United States</li> -->
						<li id="phone_footer"><a href="tel://0472370687">(047)-237-0687</a></li>
						<li id="email_footer"><a href="#">cdrrmo.cob@gmail.com</a></li>
					</ul>
				</div>
			</div><!-- End row -->
		</div><!-- End container -->
		<div id="copy">
			<div class="container">
				© Balanga CDRRMO 2018 - All rights reserved.
			</div>
		</div><!-- End copy -->
	</footer><!-- End footer -->

	<!-- COMMON SCRIPTS -->
	<script src="<?php echo base_url() ;?>assets/frontend/js/jquery-2.2.4.min.js"></script>
	<script src="<?php echo base_url() ;?>assets/frontend/js/common_scripts.js"></script>
	<script src="<?php echo base_url() ;?>assets/frontend/assets/validate.js"></script>
	<script src="<?php echo base_url() ;?>assets/frontend/js/header_sticky_1.js"></script>
	<script src="<?php echo base_url() ;?>assets/frontend/js/functions.js"></script>

	<!-- LayerSlider script files -->
	<script src="<?php echo base_url() ;?>assets/frontend/layerslider/js/greensock.js"></script>
	<script src="<?php echo base_url() ;?>assets/frontend/layerslider/js/layerslider.transitions.js"></script>
	<script src="<?php echo base_url() ;?>assets/frontend/layerslider/js/layerslider.kreaturamedia.jquery.js"></script>
	<script src="<?php echo base_url() ;?>assets/frontend/js/slider_func.js"></script>

</body>
</html>