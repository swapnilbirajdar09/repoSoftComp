<!DOCTYPE html>
<html class="no-js wide wow-animation" lang="en"> 
    <head>
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/user/images/sailo_fav.jpg" type="image/jpeg">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:400,700%7CRaleway:400,500%7CLimelight">
        <!-- Stylesheets -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/bootstrap.min.css">
        <!-- <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/fonts.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/style.css">
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/const.js"></script>
    </head>
    <body> 
        <div class="preloader"> 
            <div class="preloader-body"> 
                <div class="cssload-container">
                    <div class="cssload-speeding-wheel"> </div>
                </div>
                <p>Loading...</p>
            </div>
        </div>
        <div class="page">
            <header>
                <?php //echo base_url() . $company_details[0]['company_logo']; ?>
                <!--<img class="logo-dark default" src="<?php// echo base_url(); ?>assets/user/images/logo.png" data-at2x="<?php echo base_url(); ?>assets/user/images/logo@2x.png" alt=""><img class="logo-light" src="<?php echo base_url(); ?>assets/user/images/logo-white.png" data-at2x="<?php echo base_url(); ?>assets/user/images/logo-white@2x.png" alt="">-->
                <nav class="navbar navbar-default bootsnav bg-transparent navbar-scroll-top nav-box-width header-light">
                    <div class="container-fluid nav-header-container">
                        <div class="row">
                            <div class="col-md-2 col-xs-5"><a class="logo" href="<?php echo base_url(); ?>" title="logo"><img class="logo-dark default" src="<?php echo base_url(); ?>assets/user/images/sailo_logo.jpg" data-at2x="<?php echo base_url(); ?>assets/user/images/sailo_logo.jpg" alt=""><img class="logo-light" src="<?php echo base_url(); ?>assets/user/images/sailo_logo.jpg" data-at2x="<?php echo base_url(); ?>assets/user/images/sailo_logo.jpg" alt=""></a></div>
                            <div class="col-md-9 col-xs-2 width-auto pull-right accordion-menu xs-no-padding-right">
                                <button class="navbar-toggle collapsed pull-right" type="button" data-toggle="collapse" data-target="#navbar-collapse-toggle-1"><span class="sr-only">toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                                <div class="navbar-collapse collapse pull-right" id="navbar-collapse-toggle-1">
                                    <ul class="nav navbar-nav navbar-left no-margin text-font-sec text-normal" id="accordion" data-in="fadeIn" data-out="fadeOut">
                                        <li class="dropdown simple-dropdown"><a href="<?php echo base_url(); ?>">Home</a></li>
                                        <li class="dropdown simple-dropdown"><a href="<?php echo base_url(); ?>about_us">About Us</a></li>
                                        <li class="dropdown simple-dropdown"><a href="<?php echo base_url(); ?>services">Services</a></li>
                                        <li class="dropdown simple-dropdown"><a href="<?php echo base_url(); ?>viewportfolio">Portfolio</a></li>
                                        <li class="dropdown simple-dropdown"> <a href="<?php echo base_url(); ?>careers">Careers</a></li>
                                        <li class="dropdown simple-dropdown"> <a href="<?php echo base_url(); ?>viewblog">Blogs</a></li>
                                        <li class="dropdown simple-dropdown"> <a href="<?php echo base_url(); ?>contact_us">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </nav>
            </header>