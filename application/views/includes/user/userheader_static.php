<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Sumon Rahman">
	<meta name="description" content="">
	<meta name="keywords" content="HTML,CSS,XML,JavaScript">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Title -->
	<title>Parinaay Matrimonials</title>
	<!-- Place favicon.ico in the root directory -->
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />
	<!-- Plugin-CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/demo/css/bootstrap.min.css">
	<link href="<?php echo base_url(); ?>assets/build/css/w3.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/demo/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/demo/css/linearicons.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/demo/css/magnific-popup.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/demo/css/animate.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/template/front/fonts/font-awesome/css/font-awesome.min.css" type="text/css">
	<!-- Main-Stylesheets -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/demo/css/normalize.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/demo/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/demo/css/responsive.css">
	<script src="<?php echo base_url(); ?>assets/demo/js/vendor/modernizr-2.8.3.min.js"></script>
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <!--Vendor-JS-->
    <!-- angular-->
    <script src="<?php echo base_url(); ?>assets/js/angular.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/angular-sanitize.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/const.js"></script>
    <script src="<?php echo base_url(); ?>assets/demo/js/vendor/jquery-ui.js"></script>
    <script src="<?php echo base_url(); ?>assets/demo/js/vendor/bootstrap.min.js"></script>

    <style type="text/css">
    body{
    	font-family: 'Montserrat', sans-serif;

    }
</style>

</head>

<body>
	<!-- Preloader-content -->
<div class="preloader">
	<span><i class="lnr lnr-sun"></i></span>
</div>
<!-- MainMenu-Area -->
<nav class="mainmenu-area affix" style="padding-bottom: 0;vertical-align: middle;opacity: 1">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary_menu">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url(); ?>"><h3 class="w3-text-white"><b><i>Buddhist Parinay</i></b></h3></a>
		</div>
		<?php 
		$url=$this->uri->segment(2);
		?>
		<div class="collapse navbar-collapse" id="primary_menu">
			<ul class="nav navbar-nav mainmenu">
				<li class="active">
					<li class="<?php if($url==''){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>#home_page">Home</a></li>
					<li class="<?php if($url=='about_us'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>user/about_us">About Parinaay</a></li>
					<li class="<?php if($url=='pillars'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>#pillars_page">Our Pillars</a></li>
					<li><a href="<?php echo base_url(); ?>#testimonial_page">Testimonials</a></li>
					<li class="<?php if($url=='contact_us'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>user/contact_us">Contact Us</a></li>
					<!-- <li><a href="<?php echo base_url(); ?>login">Log In</a></li> -->
                </ul><!-- 
                <div class="right-button hidden-xs">
                    <a href="#">Contact Us</a>
                    <a href="#">Log In</a>
                </div> -->
            </div>
        </div>
    </nav>
    <!-- MainMenu-Area-End -->