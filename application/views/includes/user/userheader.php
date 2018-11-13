<!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?php echo base_url(); ?>assets/client/template/front/vendor/pace/js/pace.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/template/front/vendor/pace/css/pace-minimal.css" type="text/css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/template/front/vendor/bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900" rel="stylesheet"> -->

    <!-- Plugins -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/template/front/vendor/swiper/css/swiper.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/template/front/vendor/hamburgers/hamburgers.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/template/front/vendor/animate/animate.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/template/front/vendor/lightgallery/css/lightgallery.min.css">
    <!-- Icons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/template/front/fonts/font-awesome/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/template/front/fonts/ionicons/css/ionicons.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/template/front/fonts/line-icons/line-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/template/front/fonts/line-icons-pro/line-icons-pro.css" type="text/css">
    <!-- Linea Icons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/template/front/fonts/linea/arrows/linea-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/template/front/fonts/linea/basic/linea-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/template/front/fonts/linea/ecommerce/linea-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/client/template/front/fonts/linea/software/linea-icons.css" type="text/css">
    <!-- Global style (main) -->
    <link id="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/client/template/front/css/global-style.css" rel="stylesheet" media="screen">
    <!-- Custom style - Remove if not necessary -->
    <link type="text/css" href="<?php echo base_url(); ?>assets/client/template/front/css/custom-style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/build/css/w3.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kodchasan:400,500,600,700" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/alert/jquery-confirm.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>assets/js/const.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/angular.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/angular-sanitize.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dirPaginate.js"></script>
    <!-- Core -->
    <script src="<?php echo base_url(); ?>assets/client/template/front/vendor/jquery/jquery.min.js"></script>    <!-- Favicon -->
    <script src="<?php echo base_url(); ?>assets/alert/jquery-confirm.js"></script>

    <link href="<?php echo base_url(); ?>assets/client/uploads/favicon/favicon_1515409281.png" rel="icon" type="image/png">

</head>
<body>
    <style>
    body{
        font-family: 'Kodchasan', sans-serif;
    }
    .modal-backdrop {
        z-index: -1;
    }
    #loading-center{
        width: 100%;
        height: 100%;
        position: relative;
    }
    #loading-center-absolute {
        position: absolute;
        left: 50%;
        top: 50%;
        height: 50px;
        width: 150px;
        margin-top: -25px;
        margin-left: -75px;

    }
    .object{
        width: 8px;
        height: 50px;
        margin-right:5px;
        background-color: white;
        -webkit-animation: animate 1s infinite;
        animation: animate 1s infinite;
        float: left;
    }

    .object:last-child {
        margin-right: 0px;
    }

    .object:nth-child(10){
        -webkit-animation-delay: 0.9s;
        animation-delay: 0.9s;  
    }
    .object:nth-child(9){
        -webkit-animation-delay: 0.8s;
        animation-delay: 0.8s;  
    } 
    .object:nth-child(8){
        -webkit-animation-delay: 0.7s;
        animation-delay: 0.7s;  
    }
    .object:nth-child(7){
        -webkit-animation-delay: 0.6s;
        animation-delay: 0.6s;  
    }
    .object:nth-child(6){
        -webkit-animation-delay: 0.5s;
        animation-delay: 0.5s;  
    }
    .object:nth-child(5){
        -webkit-animation-delay: 0.4s;
        animation-delay: 0.4s;
    }
    .object:nth-child(4){
        -webkit-animation-delay: 0.3s;
        animation-delay: 0.3s;    
    }
    .object:nth-child(3){
        -webkit-animation-delay: 0.2s;
        animation-delay: 0.2s;  
    }
    .object:nth-child(2){
        -webkit-animation-delay: 0.1s;
        animation-delay: 0.1s;
    }           
    @-webkit-keyframes animate {

        50% {
            -ms-transform: scaleY(0); 
            -webkit-transform: scaleY(0);
            transform: scaleY(0); 
        }
    }
    @keyframes animate {
        50% {
            -ms-transform: scaleY(0); 
            -webkit-transform: scaleY(0);
            transform: scaleY(0);
        }
    }
    #loading{
        background-color: #5E32E1;
        height: 100%;
        width: 100%;
        position: fixed;
        z-index: 1050;
        margin-top: 0px;
        top: 0px;
    }
    .alert-fixed {
        position:fixed; 
        top: 0px; 
        right: 0px; 
        margin: 10px;
        width: 100px;
        z-index:9999; 
        float: right;
        border-radius:0px
    }
</style>
<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
            //$(window).load(function() {
                $(document).ready(function (e) {
                    $("#loading").delay(500).fadeOut(500);
                    $("#loading-center").click(function () {
                        $("#loading").fadeOut(500);
                    });
                });
            </script>    <div class="container">
                <div class="row">
                    <!-- Alerts for Member actions -->
                    <div class="col-lg-3 col-md-4" id="success_alert" style="display: none; position: fixed; top: 15px; right: 0; z-index: 9999">
                        <div class="alert alert-success fade show" role="alert">
                            <!-- Success Alert Content -->
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4" id="danger_alert" style="display: none; position: fixed; top: 15px; right: 0; z-index: 9999">
                        <div class="alert alert-danger fade show" role="alert">
                            <!-- Danger Alert Content -->
                        </div>
                    </div>
                    <!-- Alerts for Member actions -->
                </div>
            </div>
            <!-- MAIN WRAPPER -->
            <div class="body-wrap">
                <div id="st-container" class="st-container">
                    <div class="st-pusher">
                        <div class="st-content">
                            <div class="st-content-inner">
                                <nav class="navbar navbar-expand-lg navbar-fixed-top navbar--link-arrow navbar--uppercase" style="background: linear-gradient(45deg, rgba(72, 44, 191, 1) 0%, rgba(106, 198, 240, 1) 100%);padding:14px 0 14px 0;vertical-align: middle;">
                                    <div class="container navbar-container">
                                        <!-- Brand/Logo -->
                                        <a class="navbar-brand" href="<?php echo base_url(); ?>user/dashboard" style="padding-bottom: 0"><h3 class="w3-text-white"><b><i>Buddhist Parinay</i></b></h3></a>
                                        <div class="d-inline-block">
                                            <!-- Navbar toggler  -->
                                            <button class="navbar-toggler hamburger hamburger-js hamburger--spring " type="button" data-toggle="collapse" data-target="#navbar_main" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                                                <span class="hamburger-box">
                                                    <span class="hamburger-inner"></span>
                                                </span>
                                            </button>
                                        </div>
                                        <?php 
                                        $url=$this->uri->segment(2);
                                        ?>
                                        <div class="collapse navbar-collapse align-items-center justify-content-end" id="navbar_main">
                                            <!-- Navbar links -->
                                            <ul class="navbar-nav" data-hover="dropdown">
                                                <li class="custom-nav">
                                                    <a class="nav-link <?php if($url=='dashboard'){ echo 'nav_active'; } ?>" href="<?php echo base_url(); ?>user/dashboard" aria-haspopup="true" aria-expanded="false" style="margin-right: 5px">
                                                    Dashboard</a>
                                                </li>
                                                <li class="custom-nav">
                                                    <a class="nav-link <?php if($url=='user_profile'){ echo 'nav_active'; } ?>" href="<?php echo base_url(); ?>user/user_profile" aria-haspopup="true" aria-expanded="false" style="margin-right: 5px">
                                                    My Profile</a>
                                                </li>
                                                <li class="custom-nav dropdown">
                                                    <a class="nav-link <?php if($url=='search'){ echo 'nav_active'; } ?>" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-right: 5px">
                                                    Search Profiles</a>
                                                    <ul class="dropdown-menu" style="border: 1px solid #f1f1f1 !important;">
                                                        <li class="dropdown dropdown-submenu">
                                                            <li>
                                                                <a class="dropdown-item " href="<?php echo base_url(); ?>user/search/profilesearch_byid">
                                                                Search Profile by ID</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item " href="<?php echo base_url(); ?>user/search/quick_search">
                                                                Quick Search</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item " href="<?php echo base_url(); ?>user/search/regular_search">
                                                                Regular Search</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item " href="<?php echo base_url(); ?>user/search/advance_search">
                                                                Advance Search</a>
                                                            </li>                                                    
                                                        </ul>
                                                    </li>
                                                    <li class="custom-nav">
                                                        <a class="nav-link <?php if($url=='requests'){ echo 'nav_active'; } ?>" href="<?php echo base_url(); ?>user/requests/my_requests" aria-haspopup="true" aria-expanded="false" style="margin-right: 5px">
                                                        My Requests</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </nav>
                                    <!-- Navbar -->
                                    <?php
                                    $encodedkey = $this->session->userdata('PariKey_session');
                                    if ($encodedkey != '') {
                                        ?>
                                        <div class="top-navbar align-items-center" style="z-index: 0">
                                            <div class="container">
                                                <div class="row align-items-center py-1" style="padding-bottom: 0px !important">
                                                    <div class="col-md-4"></div>
                                                    <div class="col-md-4 text-center" style="padding: 0px"></div>
                                                    <div class="col-md-4">
                                                        <nav class="top-navbar-menu">
                                                            <ul class="float-right top_bar_right">    
                                                                <li class="float-left pb-1">
                                                                    <a class="c-base-1" href="<?php echo base_url(); ?>user/user_profile">
                                                                        <?php if($userDetails[0]['user_profile_image']!=''){ ?>
                                                                            <div class="top_nav_img" style="background-image: url(<?php echo base_url(); ?><?php echo $userDetails[0]['user_profile_image']; ?>)"></div>
                                                                        <?php }else { ?>
                                                                            <div class="top_nav_img" style="background-image: url(<?php echo base_url(); ?>assets/images/user.png)"></div>
                                                                        <?php } ?>                                                                
                                                                        &nbsp;<span class="strong-500 d-none d-lg-inline-block d-xl-inline-block" style="margin-top: 5px"><?php echo $userDetails[0]['user_firstname'].' '.$userDetails[0]['user_lastname']; ?></span>
                                                                    </a>
                                                                </li>                                                                    
                                                                <li class="float-left pb-1">
                                                                    <a href="<?php echo base_url(); ?>user/login/logoutUser" class="btn btn-styled btn-xs btn-base-1 btn-shadow w3-margin-left"><i class="fa fa-power-off"></i> Log out</a>
                                                                </li>
                                                            </ul>
                                                        </nav>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $('.set_langs').on('click', function () {
                                                var lang_url = $(this).data('href');
                                                $.ajax({url: lang_url, success: function (result) {
                                                    location.reload();
                                                }});
                                            });
                                        });
                                    </script>
                                    <style>
                                    .navbar-brand {
                                        display: inline-block;
                                        padding-top: 0px; 
                                        padding-bottom: 0px; 
                                        margin-right: 0px; 
                                        font-size: 1.25rem;
                                        line-height: inherit;
                                        white-space: nowrap;
                                    }
                                    .top-navbar .top-navbar-menu > ul.top-menu > li.dropdown > a:after {float: none;}
                                    .blink_me {
                                        animation: blinker 1.5s linear infinite;
                                    }
                                    @keyframes blinker {
                                        50% {
                                            opacity: 0;
                                        }
                                    }
                                </style>
                                <style type="text/css">
                                @media (max-width: 991px) {
                                    .hidden_xs { display: none !important; }
                                }
                                @media (min-width: 992px) {
                                    .visible_xs { display: none !important; }
                                }
                            </style>