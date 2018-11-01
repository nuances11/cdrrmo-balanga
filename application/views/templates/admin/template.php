<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Meta -->
	<meta name="description" content="BALANGA CITY Disaster Risk Reduction Management Office (CDRRMO), as known today, was established year 2008 as City Disaster Operation Center headed by Engr. Noli Dizon, with around 12 personnel.">
	<meta name="author" content="AMA Students">

	<meta name="base_url" content="<?php echo BASE_URL() ;?>">

	<title>
		<?= $title ;?>
	</title>

	<!-- vendor css -->
	<link href="<?php echo base_url() . 'assets/lib/font-awesome/css/font-awesome.css' ;?>" rel="stylesheet">
	<link href="<?php echo base_url() . 'assets/lib/Ionicons/css/ionicons.css" rel="stylesheet' ;?>">
	<link href="<?php echo base_url() . 'assets/lib/perfect-scrollbar/css/perfect-scrollbar.css' ;?>" rel="stylesheet">

	

	<!-- AdditionalCSS -->
	<?php if(isset($additional_css)) : ?>
	<?php foreach($additional_css as $css): ?>
	<link rel="stylesheet" href="<?php echo base_url() . $css ;?>">
	<?php endforeach; ?>
	<?php endif; ?>

	<!-- Starlight CSS -->
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/css/starlight.css' ;?>">

</head>

<body>

	<!-- ########## START: LEFT PANEL ########## -->
	<div class="sl-logo"><a href="<?php echo base_url() . 'admin' ;?>">CDRRMO</a></div>
	<div class="sl-sideleft">

		<label class="sidebar-label">Navigation</label>
		<div class="sl-sideleft-menu">
			<a href="<?php echo base_url() . 'admin' ;?>" class="sl-menu-link">
				<div class="sl-menu-item">
					<i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
					<span class="menu-item-label">Dashboard</span>
				</div><!-- menu-item -->
			</a><!-- sl-menu-link -->
			<a href="<?php echo base_url() . 'admin/users' ;?>" class="sl-menu-link <?php echo ($this->uri->segment(2) == 'users') ? 'active' : '' ;?> ">
				<div class="sl-menu-item">
					<i class="menu-item-icon icon ion-person tx-20"></i>
					<span class="menu-item-label">Users</span>
				</div><!-- menu-item -->
			</a><!-- sl-menu-link -->
			<a href="mailbox.html" class="sl-menu-link">
				<div class="sl-menu-item">
					<i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
					<span class="menu-item-label">Messages</span>
				</div><!-- menu-item -->
			</a><!-- sl-menu-link -->
			<a href="#" class="sl-menu-link">
				<div class="sl-menu-item">
					<i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
					<span class="menu-item-label">Contents</span>
					<i class="menu-item-arrow fa fa-angle-down"></i>
				</div><!-- menu-item -->
			</a><!-- sl-menu-link -->
			<ul class="sl-menu-sub nav flex-column">
				<li class="nav-item"><a href="table-basic.html" class="nav-link">General</a></li>
				<li class="nav-item"><a href="table-datatable.html" class="nav-link">Page</a></li>
			</ul>
			<a href="#" class="sl-menu-link">
				<div class="sl-menu-item">
					<i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
					<span class="menu-item-label">Announcements</span>
					<i class="menu-item-arrow fa fa-angle-down"></i>
				</div><!-- menu-item -->
			</a><!-- sl-menu-link -->
		</div><!-- sl-sideleft-menu -->

		<br>
	</div><!-- sl-sideleft -->
	<!-- ########## END: LEFT PANEL ########## -->

	<!-- ########## START: HEAD PANEL ########## -->
	<div class="sl-header">
		<div class="sl-header-left">
			<div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
			<div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
		</div><!-- sl-header-left -->
		<div class="sl-header-right">
			<nav class="nav">
				<div class="dropdown">
					<a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
						<span class="logged-name">Jane<span class="hidden-md-down"> Doe</span></span>
						<img src="../img/img3.jpg" class="wd-32 rounded-circle" alt="">
					</a>
					<div class="dropdown-menu dropdown-menu-header wd-200">
						<ul class="list-unstyled user-profile-nav">
							<li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
							<li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
							<li><a href=""><i class="icon ion-ios-download-outline"></i> Downloads</a></li>
							<li><a href=""><i class="icon ion-ios-star-outline"></i> Favorites</a></li>
							<li><a href=""><i class="icon ion-ios-folder-outline"></i> Collections</a></li>
							<li><a href=""><i class="icon ion-power"></i> Sign Out</a></li>
						</ul>
					</div><!-- dropdown-menu -->
				</div><!-- dropdown -->
			</nav>
		</div><!-- sl-header-right -->
	</div><!-- sl-header -->
	<!-- ########## END: HEAD PANEL ########## -->

	<!-- ########## START: MAIN PANEL ########## -->
	<div class="sl-mainpanel">
        
        <?= $content ;?>

		<!-- <footer class="sl-footer" style="position:relative;bottom:0;">
			<div class="footer-left">
				<div class="mg-b-2">Copyright Rights &copy; 2018 All Rights Reserved </div>
				<div>CDRRMO of Balanga City Bataan</div>
			</div>
		</footer> -->
	</div><!-- sl-mainpanel -->
	<!-- ########## END: MAIN PANEL ########## -->

	<script src="<?php echo base_url() . 'assets/lib/jquery/jquery.js' ;?>"></script>
	<script src="<?php echo base_url() . 'assets/lib/popper.js/popper.js' ;?>"></script>
	<script src="<?php echo base_url() . 'assets/lib/bootstrap/bootstrap.js' ;?>"></script>
	<script src="<?php echo base_url() . 'assets/lib/jquery-ui/jquery-ui.js' ;?>"></script>
	<script src="<?php echo base_url() . 'assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js' ;?>"></script>
	<script src="<?php echo base_url() . 'assets/lib/jquery.sparkline.bower/jquery.sparkline.min.js' ;?>"></script>
	<script src="<?php echo base_url() . 'assets/lib/d3/d3.js' ;?>"></script>

	<script src="<?php echo base_url() . 'assets/js/ResizeSensor.js' ;?>"></script>
	<!-- <script src="<?php echo base_url() . 'assets/js/dashboard.js' ;?>"></script> -->

	<!-- Additional Scripts -->
	<?php if(isset($add_js)) : ?>
	<?php foreach($add_js as $js): ?>
	<script src="<?php echo base_url() . $js; ?>"></script>
	<?php endforeach; ?>
	<?php endif; ?>

	<?php if(isset($extra_js)) : ?>
	<script>
		<?php echo $extra_js; ?>

	</script>
	<?php endif; ?>

	<script src="<?php echo base_url() . 'assets/js/starlight.js' ;?>"></script>

</body>

</html>
