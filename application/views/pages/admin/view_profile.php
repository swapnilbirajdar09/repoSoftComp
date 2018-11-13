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
    <title><?php echo $userDetails[0]['user_firstname'].' '.$userDetails[0]['user_lastname']; ?> - Full Profile</title>

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
                        <style type="text/css">
                        /* gallery images overlay opacity overlay */
                        .saved-image{
                          background: rgb(0, 0, 0);
                          background: rgba(0, 0, 0, 0.5); /* Black see-through */
                          transition: .1s ease;
                          opacity:0;
                          height: 150px;
                          padding: 30px 10px;
                      }
                      /* When you mouse over the gallery image div, fade in the overlay title */
                      .allImage:hover .saved-image {
                          opacity: 0.7;
                      }

                      /* all gallery images div */
                      .allImage-btn{
                          padding: 2px 5px 2px 5px;
                          margin: 0
                      }
                  </style>

                  <!-- <?php print_r($userDetails); ?> -->
                  <section class="slice sct-color-2">
                    <div class="profile" ng-app="profileSectionApp" ng-controller="profileSectionCtrl">
                        <div class="container">
                            <div class="row cols-md-space cols-sm-space cols-xs-space">
                                <!-- Alert for Ajax Profile Edit Section -->
                                <div class="col-lg-3 col-md-4" id="ajax_alert" style="display: none; position: fixed; top: 15px; right: 0; z-index: 9999">
                                    <div class="alert alert-success fade show" id="ajax_alert_message" role="alert">
                                        You Have Successfully Edited Your Profile!
                                    </div>
                                </div>
                                <!-- Alert for Ajax Profile Edit Section -->
                                <!-- Alert for Validating Ajax Profile Edit Section -->
                                <div class="col-lg-3 col-md-4 alert_message" id="ajax_validation_alert" style="display: none; position: fixed; top: 15px; right: 0; z-index: 9999">
                                    <div class="alert alert-warning  fade show alert-dismissible" role="alert">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                                        <span class="ajax_validation_alert"></span>
                                    </div>
                                </div>
                                <!-- Alert for Validating Ajax Profile Edit Section -->
                                <!-- Alerts for Member actions -->
                                <div class="col-lg-3 col-md-4 alert_message" id="ajax_success_alert" style="display: none; position: fixed; top: 15px; right: 0; z-index: 9999">
                                    <div class="alert alert-success  fade show alert-dismissible" role="alert">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <!-- Success Alert Content -->
                                        <span class="ajax_success_alert"></span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 alert_message" id="ajax_danger_alert" style="display: none; position: fixed; top: 15px; right: 0; z-index: 9999">
                                    <div class="alert alert-danger  fade show alert-dismissible" role="alert">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <!-- Success Alert Content -->
                                        <span class="ajax_danger_alert"></span>
                                    </div>
                                </div>
                                <!-- Alerts for Member actions -->

                                <!-- <div class="col-md-12 w3-margin-bottom">
                                    <div class="pull-right">
                                        <button type="button" class="btn btn-primary btn-icon-only btn-shadow"><i class="fa fa-download"></i> Download Profile</button>
                                    </div>
                                </div> -->
                                <?php 
                                if(isset($userDetails['status']) && isset($userDetails['status'])=='error'){ ?>
                                    <div class="col-md-12">
                                     <div class="col-md-12 alert alert-warning" role="alert">
                                        <p style="margin-bottom:0"><i class="fa fa-warning"></i> You dont have permission to access the information. Let the Member approve your request OR you might have not approved the Member's request </p>
                                    </div>
                                </div>
                            <?php }
                            else{
                                ?>
                                <div class="col-lg-4">
                                    <div class="sidebar sidebar-inverse sidebar--style-1 bg-base-1 z-depth-2-top">
                                        <div class="sidebar-object mb-0">
                                            <!-- Profile picture -->
                                            <div class="profile-picture profile-picture--style-2">
                                                <div style="border: 10px solid rgba(255, 255, 255, 0.1);width: 200px;border-radius: 50%;margin-top: 30px;">
                                                    <?php if($userDetails[0]['user_profile_image']!=''){ ?>
                                                        <div class="profile_img" id="show_img" style="background-image: url(<?php echo base_url(); ?><?php echo $userDetails[0]['user_profile_image']; ?>)"></div>
                                                    <?php }else { ?>
                                                        <div class="profile_img" id="show_img" style="background-image: url(<?php echo base_url(); ?>assets/images/user.png)"></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- Profile details -->
                                            <div class="profile-details">
                                                <h2 class="heading heading-3 strong-500 profile-name"><?php echo $userDetails[0]['user_firstname'].' '.$userDetails[0]['user_lastname']; ?></h2>
                                                <h3 class="heading heading-6 strong-400 profile-occupation mt-3"><?php if($userDetails[0]['user_designation']==''){echo '<User Designation>';}else{ echo $userDetails[0]['user_designation']; } ?></h3>

                                                    <div class="col-md-12 w3-margin-top w3-margin-bottom">
                                                        <a href="#" class="btn btn-styled btn-block btn-circle btn-sm btn-base-5">Add to Favourite</a>
                                                    </div>
                                                    <div class="profile-stats clearfix mt-2">
                                                        <div class="stats-entry" style="width: 100%">
                                                            <span class="stats-count"><?php echo $userDetails[0]['user_caste']; ?>
                                                        </span>
                                                        <span class="stats-label text-uppercase">Caste</span>
                                                    </div>
                                                </div>
                                                <div class="profile-stats clearfix mt-2">
                                                    <div class="stats-entry" style="width: 100%">
                                                        <span class="stats-count"><?php echo $userDetails[0]['user_email']; ?>

                                                    </span>
                                                    <span class="stats-label text-uppercase">Email ID</span>
                                                    <span class="">
                                                        <?php 
                                                        if($userDetails[0]['user_email_verified']=='1'){    ?>
                                                            <span id="verify_email_span" class="btn-base-1 btn-sm btn-icon-only btn-shadow mb-1 w3-green">
                                                                <i class="ion-checkmark"></i> Verified
                                                            </span>
                                                            <?php
                                                        }
                                                        else{
                                                            ?>
                                                            <span id="verify_email_span" class="btn-base-1 w3-text-white btn-sm btn-icon-only btn-shadow mb-1 w3-grey">
                                                                <i class="fa fa-times-circle"></i> Not Verified
                                                            </span>
                                                            <?php
                                                        }
                                                        ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="profile-stats clearfix mt-2">
                                                <div class="stats-entry" style="width: 100%">
                                                    <span class="stats-count"><?php echo $userDetails[0]['user_mobile_num']; ?>
                                                </span>
                                                <span class="stats-label text-uppercase">Mobile Number</span>
                                                <span class="">
                                                    <?php 
                                                    if($userDetails[0]['user_mobile_verified']=='1'){    ?>
                                                        <span id="verify_mobile_span" class="btn-base-1 btn-sm btn-icon-only btn-shadow mb-1 w3-green">
                                                            <i class="ion-checkmark"></i> Verified
                                                        </span>
                                                        <?php
                                                    }
                                                    else{
                                                        ?>
                                                        <span id="verify_mobile_span" class="btn-base-1 w3-text-white btn-sm btn-icon-only btn-shadow mb-1 w3-grey">
                                                            <i class="fa fa-times-circle"></i> Not Verified
                                                        </span>
                                                        <?php
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                        <?php 
                                        $doc_verified_count=0;
                                        $uploaded_doc=0;
                                        if($userDocuments){
                                            $uploaded_doc=count($userDocuments);
                                        }
                                        for ($i=0; $i < count($userDocuments) ; $i++) { 
                                            if($userDocuments[$i]['status']==1){
                                                $doc_verified_count++;
                                            }
                                        }
                                        ?>
                                        <div class="profile-stats clearfix mt-2">
                                            <div class="stats-entry" style="width: 100%">
                                                <span class="stats-count"><?php echo $uploaded_doc; ?></span>
                                                <span class="stats-label text-uppercase">Documents uploaded</span>
                                                <span class="">
                                                    <?php 
                                                    if($userDetails[0]['user_doc_verified']=='1'){    ?>
                                                        <span id="verify_doc_span" class="btn-base-1 btn-sm btn-icon-only btn-shadow mb-1 w3-green">
                                                            <i class="ion-checkmark"></i> Verified
                                                        </span>
                                                        <?php
                                                    }
                                                    else{
                                                        ?>
                                                        <span id="verify_doc_span" class="btn-base-1 w3-text-white btn-sm btn-icon-only btn-shadow mb-1 w3-grey">
                                                            <i class="fa fa-times-circle"></i> Not Verified
                                                        </span>
                                                        <?php
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="profile-stats clearfix mt-2">
                                            <div class="stats-entry">
                                                <span class="stats-count"><?php echo $userDetails[0]['self_favourite_count']; ?></span>
                                                <span class="stats-label text-uppercase">Favorited By</span>
                                            </div>
                                            <div class="stats-entry">
                                                <span class="stats-count">
                                                    <?php 
                                                    $incoming_int=0;
                                                    if($userDetails[0]['user_received_requests_approved']!='' && $userDetails[0]['user_received_requests_approved']!='[]'){
                                                        $recievedRequestArr=json_decode($userDetails[0]['user_received_requests_approved'],TRUE);
                                                        $incoming_int=count($recievedRequestArr);
                                                    }
                                                    echo $incoming_int;
                                                    ?>
                                                </span>
                                                <span class="stats-label text-uppercase">Request Approved</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Profile stats -->
                                    <div class="profile-useful-links clearfix">
                                        <div class="profile-connect mt-5">
                                            <hr>
                                            <h4 class="heading strong-400">Gallery</h4>
                                        </div>

                                        <div class="w3-container w3-margin-top w3-center no-padding">
                                            <div id="galleryImages">
                                                <?php 
                                                if($userDetails[0]['user_photos']!='' && $userDetails[0]['user_photos']!='[]'){
                                                    $img_Arr=json_decode($userDetails[0]['user_photos'],TRUE);
                                                    foreach ($img_Arr as $key) { ?>
                                                        <div class="w3-col l6 s6 m4" style="padding:4px 4px 4px 4px">
                                                            <div class="block-image relative">
                                                                <div class="view view-second view--rounded light-gallery">
                                                                    <img src="<?php echo base_url(); ?><?php echo $key; ?>" style="width: 100%;height: 150px;">
                                                                    <div class="mask mask-base-1--style-2">
                                                                        <div class="view-buttons text-center">
                                                                            <div class="view-buttons-inner text-center" style="padding: 5px">
                                                                                <a target="_blank" href="<?php echo base_url(); ?><?php echo $key; ?>" class="c-white mr-2 l-gallery" data-toggle="light-gallery">
                                                                                    <i class="fa fa-search"></i>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                                else{ ?>
                                                    <p class="w3-light-grey w3-center"> No Image found ! </p>
                                                    <?php    
                                                }
                                                ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>            
                        </div>
                        <div class="col-lg-8">
                            <div class="widget">
                                <div class="card z-depth-2-top" id="profile_load">
                                    <div class="card-title">
                                        <h3 class="heading heading-6 strong-500 pull-left">
                                            <b>Profile ID - </b><b class="c-base-1"><?php echo $userDetails[0]['user_profile_key']; ?></b>
                                        </h3>
                                    </div>
                                    <div class="card-body pt-2" style="padding: 1rem 0.5rem;">
                                        <!-- ABOUT ME -->
                                        <div id="section_about_me">
                                            <div class="feature feature--boxed-border feature--bg-1 pt-3 pb-0 pl-3 pr-3 mb-3 border_top2x">
                                                <!-- view about me -->
                                                <div id="view_about_me">
                                                    <div class="card-inner-title-wrapper pt-0">
                                                        <h3 class="card-inner-title pull-left">
                                                        About Me  </h3>
                                                    </div>
                                                    <div class="table-full-width">
                                                        <div class="table-full-width">
                                                            <table class="table table-profile table-responsive table-slick">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="">
                                                                            <?php 
                                                                            if($userDetails[0]['user_about_me']!=''){
                                                                                echo $userDetails[0]['user_about_me'];
                                                                            }
                                                                            else{
                                                                                echo '<label class="w3-medium"> Not Available. </label>';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- view about me ends -->
                                            </div>                           
                                        </div>
                                        <!-- ABOUT ME ENDS -->

                                        <!-- BASIC INFO -->
                                        <div id="section_basic_info">
                                            <div class="feature feature--boxed-border feature--bg-1 pt-3 pb-0 pl-3 pr-3 mb-3 border_top2x">
                                                <!-- view basic info div -->
                                                <div id="view_basic_info">
                                                    <div class="card-inner-title-wrapper pt-0">
                                                        <h3 class="card-inner-title pull-left">
                                                            Basic Information  
                                                        </h3>
                                                    </div>
                                                    <div class="table-full-width">
                                                        <div class="table-full-width">
                                                            <table class="table table-profile table-responsive table-striped table-bordered table-slick">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="td-label">
                                                                            <span>Full Name</span>
                                                                        </td>
                                                                        <td colspan="3">
                                                                            <?php echo $userDetails[0]['user_fullname']; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-label">
                                                                            <span>Profile created by</span>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $userDetails[0]['user_profile_created_by']; ?>
                                                                        </td>
                                                                        <td class="td-label">
                                                                            <span>Date Of Birth</span>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo date('d M Y',strtotime($userDetails[0]['user_dob'])); ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-label">
                                                                            <span>Marital Status</span>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $userDetails[0]['user_marital_status']; ?>
                                                                        </td>                                                                
                                                                        <td class="td-label">
                                                                            <span>Number of Children</span>
                                                                        </td>
                                                                        <td>
                                                                            <?php if($userDetails[0]['user_no_of_children']=='0'){ echo 'N/A';}else { echo $userDetails[0]['user_no_of_children']; } ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-label">
                                                                            <span>Height(In Feet)</span>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $userDetails[0]['user_height']; ?>
                                                                        </td>
                                                                        <td class="td-label">
                                                                            <span>Weight(In Kg)</span>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $userDetails[0]['user_weight']; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-label">
                                                                            <span>Body Type</span>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $userDetails[0]['user_body_type']; ?>
                                                                        </td>
                                                                        <td class="td-label">
                                                                            <span>Body Complexian</span>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $userDetails[0]['user_body_complexion']; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-label">
                                                                            <span>Blood Group</span>
                                                                        </td>
                                                                        <td>
                                                                         <?php echo $userDetails[0]['user_blood_grp']; ?>                          
                                                                     </td>
                                                                     <td class="td-label">
                                                                        <span>Mother Tongue</span>
                                                                    </td>
                                                                    <td><?php echo $userDetails[0]['user_mother_tongue']; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-label">
                                                                    <span>Hobbies</span>
                                                                </td>
                                                                <td colspan="3">
                                                                    <?php echo $userDetails[0]['user_hobbies']; ?>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- view basic info div ends -->
                                    </div>                        
                                </div>
                                <!-- BASIC INFO ENDS -->
                                <!-- EDUCATIONAL and PROFESSIONAL -->
                                <div id="section_edu_professional">
                                  <div class="feature feature--boxed-border feature--bg-1 pt-3 pb-0 pl-3 pr-3 mb-3 border_top2x">
                                    <!-- view education and professional div -->
                                    <div id="view_edu_professional">
                                        <div class="card-inner-title-wrapper pt-0">
                                            <h3 class="card-inner-title pull-left">
                                                Educational and Professional Information
                                            </h3>
                                        </div>
                                        <div class="table-full-width">
                                            <div class="table-full-width">
                                                <table class="table table-profile table-responsive table-striped table-bordered table-slick">
                                                    <tbody>
                                                        <tr>
                                                            <td class="td-label">
                                                                <span>Educational Field</span>
                                                            </td>
                                                            <td>
                                                                <?php echo $userDetails[0]['user_educational_field']; ?>
                                                            </td>
                                                            <td class="td-label">
                                                                <span>School/College Name</span>
                                                            </td>
                                                            <td>
                                                                <?php echo $userDetails[0]['user_school/clg_name']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="td-label">
                                                                <span>University Name</span>
                                                            </td>
                                                            <td>
                                                                <?php echo $userDetails[0]['user_university_name']; ?>
                                                            </td>
                                                            <td class="td-label">
                                                                <span>Additional Education</span>
                                                            </td>
                                                            <td>
                                                                <?php echo $userDetails[0]['user_additional_edu']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="td-label">
                                                                <span>Occupation Type</span>
                                                            </td>
                                                            <td>
                                                                <?php echo $userDetails[0]['user_occupation_type']; ?>
                                                            </td>
                                                            <td class="td-label">
                                                                <span>Working Field</span>
                                                            </td>
                                                            <td>
                                                             <?php echo $userDetails[0]['user_working_field']; ?>
                                                         </td>
                                                     </tr>
                                                     <tr>
                                                        <td class="td-label">
                                                            <span>Company Name</span>
                                                        </td>
                                                        <td>
                                                           <?php echo $userDetails[0]['user_company_name']; ?>
                                                       </td>
                                                       <td class="td-label">
                                                        <span>Designation</span>
                                                    </td>
                                                    <td>
                                                      <?php echo $userDetails[0]['user_designation']; ?>                    
                                                  </td>
                                              </tr>
                                              <tr>
                                                <td class="td-label">
                                                    <span>Workplace Address</span>
                                                </td>
                                                <td colspan="3"><?php echo $userDetails[0]['user_workplace_address']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="td-label">
                                                    <span>Monthly Income</span>
                                                </td>
                                                <td>
                                                   <?php echo $userDetails[0]['user_monthly_income']; ?>
                                               </td>
                                               <td class="td-label">
                                                <span>Annual Income</span>
                                            </td>
                                            <td>
                                             <?php echo $userDetails[0]['user_annual_income']; ?>                   
                                         </td>
                                     </tr>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
                 <!-- view eductaion and professional div ends -->

             </div>
         </div>
         <!-- EDU and PROFESSIONAL DIV ENDS -->
         <!-- FAMILY INFO DIV -->
         <div id="section_family_info">
            <div class="feature feature--boxed-border feature--bg-1 pt-3 pb-0 pl-3 pr-3 mb-3 border_top2x">
                <!-- view family info div -->
                <div id="view_family_info">
                    <div class="card-inner-title-wrapper pt-0">
                        <h3 class="card-inner-title pull-left">
                          Family Information          
                      </h3>
                  </div>
                  <div class="table-full-width">
                    <div class="table-full-width">
                        <table class="table table-profile table-responsive table-striped table-bordered table-slick">
                            <tbody>
                                <tr>
                                    <td class="td-label">
                                        <span>Father Name</span>
                                    </td>
                                    <td>
                                        <?php echo $userDetails[0]['user_father_name']; ?> 
                                    </td>
                                    <td class="td-label">
                                        <span>Father Occupation</span>
                                    </td>
                                    <td>
                                        <?php echo $userDetails[0]['user_father_occupation']; ?>                            
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-label">
                                        <span>Mother Name</span>
                                    </td>
                                    <td>
                                        <?php echo $userDetails[0]['user_mother_name']; ?>                           
                                    </td>
                                    <td class="td-label">
                                        <span>Mother Occupation</span>
                                    </td>
                                    <td>
                                        <?php echo $userDetails[0]['user_mother_occupation']; ?>                         
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-label">
                                        <span>Country</span>
                                    </td>
                                    <td>
                                        <?php echo ucfirst($userDetails[0]['user_country']); ?> 
                                    </td>
                                    <td class="td-label">
                                        State
                                    </td>
                                    <td><?php echo $userDetails[0]['user_state']; ?> 
                                </td>

                            </tr>
                            <tr>
                                <td class="td-label">
                                    <span>Native Place</span>
                                </td>
                                <td>
                                    <?php echo $userDetails[0]['user_city']; ?> 
                                </td>
                                <td class="td-label">
                                    Residential Address
                                </td>
                                <td>
                                    <?php echo $userDetails[0]['user_residential_address']; ?> 
                                </td>

                            </tr>
                            <tr>
                                <td class="td-label">
                                   Contact number 1
                               </td>
                               <td>
                                <?php echo $userDetails[0]['user_contact_no1']; ?> 
                            </td>
                            <td class="td-label">
                               Contact number 2
                           </td>
                           <td>
                            <?php echo $userDetails[0]['user_contact_no2']; ?> 
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- view family info div ends -->
</div>
</div>
<!-- FAMILY INFO DIV -->
<!-- LIFESTYLE DIV -->
<div id="section_life_style">
    <div class="feature feature--boxed-border feature--bg-1 pt-3 pb-0 pl-3 pr-3 mb-3 border_top2x">
        <!-- view lifestyle div -->
        <div id="view_life_style">
            <div class="card-inner-title-wrapper pt-0">
                <h3 class="card-inner-title pull-left">
                    Life Style            
                </h3>
            </div>
            <div class="table-full-width">
                <div class="table-full-width">
                    <table class="table table-profile table-responsive table-striped table-bordered table-slick">
                        <tbody>
                            <tr>
                                <td class="td-label">
                                    <span>Diet</span>
                                </td>
                                <td>
                                    <?php echo $userDetails[0]['user_diet']; ?>                           
                                </td>
                                <td class="td-label">
                                    <span>Drink</span>
                                </td>
                                <td>
                                    <?php echo $userDetails[0]['user_drink']; ?>                            
                                </td>
                            </tr>
                            <tr>
                                <td class="td-label">
                                    <span>Smoke</span>
                                </td>
                                <td>
                                    <?php echo $userDetails[0]['user_smoke']; ?>                            
                                </td>
                                <td class="td-label">
                                    <span>Living With</span>
                                </td>
                                <td>
                                    <?php echo $userDetails[0]['user_living_with']; ?>                            
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- view life style div ends -->
        
    </div>        
</div>
<!-- LIFESTYLE DIV ENDS -->
<!-- RELATIVES DIV -->
<div id="section_relatives_info">
    <div class="feature feature--boxed-border feature--bg-1 pt-3 pb-0 pl-3 pr-3 mb-3 border_top2x">
        <!-- view relatives info div -->
        <div id="view_relatives_info">
            <div class="card-inner-title-wrapper pt-0">
                <h3 class="card-inner-title pull-left">
                  Relatives Information          
              </h3>
          </div>
          <div class="table-full-width">
            <div class="table-full-width">
                <table class="table table-profile table-responsive table-striped table-bordered table-slick">
                    <tbody>
                        <?php 
                        if($userDetails[0]['user_relative_info']!='' && $userDetails[0]['user_relative_info']!='[]'){  
                            $relativeArr=json_decode($userDetails[0]['user_relative_info'],TRUE); 
                            for ($i=0; $i <count($relativeArr) ; $i++) { ?>
                                <tr>
                                    <td colspan="4" class="w3-text-white" style="background:#5E32E1">Relative No. <?php echo $i+1; ?> </td>
                                </tr>
                                <tr>
                                    <td class="td-label">
                                        <span>Relatives Name</span>
                                    </td>
                                    <td>
                                        <?php echo $relativeArr[$i]['relative_name']; ?>
                                    </td>
                                    <td class="td-label">
                                        <span>Relation with Me</span>
                                    </td>
                                    <td>
                                       <?php echo $relativeArr[$i]['relative_relation']; ?>
                                   </td>
                               </tr>
                               <tr>
                                <td class="td-label">
                                   Contact number
                               </td>
                               <td>
                                <?php echo $relativeArr[$i]['relative_contact']; ?>
                            </td>
                            <td class="td-label">
                                Residential Address
                            </td>
                            <td>
                                <?php echo $relativeArr[$i]['relative_address']; ?>
                            </td>

                        </tr>
                        <?php        
                    }
                }
                else{
                    echo '<tr><td colspan="4"><label class="w3-medium"> Not Available. </label></td></tr>';
                }
                ?>

            </tbody>
        </table>
    </div>
</div>
</div>
<!-- view relatives div ends -->

</div>
</div>
<!-- RELATIVES DIV -->
<!-- EXPECTATIONS DIV -->
<div class="feature feature--boxed-border feature--bg-1 pt-3 pb-0 pl-3 pr-3 mb-3 border_top2x">
    <!-- view expectations div -->
    <div id="view_expectations">
        <div class="card-inner-title-wrapper pt-0">
            <h3 class="card-inner-title pull-left">
                Expectations 
            </h3>
        </div>
        <div class="table-full-width">
            <div class="table-full-width">
                <table class="table table-profile table-responsive table-slick">
                    <tbody>
                        <tr>
                            <td class=""><?php echo $userDetails[0]['user_partner_expections']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- view expectations div ends -->
    
</div> 
<!-- EXPECTATIONS DIV ENDS -->
</div>
</div>
</div>
</div>
<?php } ?>
</div>
</div>
</div>
</section>
<script>
    $(document).ready(function(){
        setTimeout(function() {
            $('#success_lg_alert').fadeOut('fast');
            $('#danger_lg_alert').fadeOut('fast');
            }, 5000); // <-- time in milliseconds
    });
</script>
<script src="<?php echo base_url(); ?>assets/js/module/user/profile.js"></script>

<script></script>
<style type="text/css">
.xs_nav_item {
    text-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);
}
</style>                       
</div>
</div>
</div>
</div>
</div>
</div>
<!-- END: st-pusher -->
</div>
<!-- END: st-container -->
</div>
<!-- END: body-wrap --> <!-- SCRIPTS -->
<!-- Core -->
<script src="<?php echo base_url(); ?>assets/client/template/front/vendor/popper/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/client/template/front/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/client/template/front/js/vendor/jquery.easing.js"></script>
<script src="<?php echo base_url(); ?>assets/client/template/front/js/ie10-viewport-bug-workaround.js"></script>
<script src="<?php echo base_url(); ?>assets/client/template/front/js/slidebar/slidebar.js"></script>
<script src="<?php echo base_url(); ?>assets/client/template/front/js/classie.js"></script>
<!-- Bootstrap Extensions -->
<script src="<?php echo base_url(); ?>assets/client/template/front/vendor/bootstrap-dropdown-hover/js/bootstrap-dropdown-hover.js"></script>
<script src="<?php echo base_url(); ?>assets/client/template/front/vendor/bootstrap-notify/bootstrap-growl.min.js"></script>
<script src="<?php echo base_url(); ?>assets/client/template/front/vendor/scrollpos-styler/scrollpos-styler.js"></script>
<!-- Plugins -->
<script src="<?php echo base_url(); ?>assets/client/template/front/vendor/flatpickr/flatpickr.min.js"></script>
<script src="<?php echo base_url(); ?>assets/client/template/front/vendor/easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/client/template/front/vendor/footer-reveal/footer-reveal.min.js"></script>
<script src="<?php echo base_url(); ?>assets/client/template/front/vendor/sticky-kit/sticky-kit.min.js"></script>
<script src="<?php echo base_url(); ?>assets/client/template/front/vendor/swiper/js/swiper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/client/template/front/vendor/paraxify/paraxify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/client/template/front/vendor/viewport-checker/viewportchecker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/client/template/front/vendor/milestone-counter/jquery.countTo.js"></script>
<script src="<?php echo base_url(); ?>assets/client/template/front/vendor/countdown/js/jquery.countdown.min.js"></script>
<script src="<?php echo base_url(); ?>assets/client/template/front/vendor/typed/typed.min.js"></script>
<script src="<?php echo base_url(); ?>assets/client/template/front/vendor/instafeed/instafeed.js"></script>
<script src="<?php echo base_url(); ?>assets/client/template/front/vendor/gradientify/jquery.gradientify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/client/template/front/vendor/nouislider/js/nouislider.min.js"></script>
<!-- Isotope -->
<script src="<?php echo base_url(); ?>assets/client/template/front/vendor/isotope/isotope.min.js"></script>
<script src="<?php echo base_url(); ?>assets/client/template/front/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<!-- Light Gallery -->
<script src="<?php echo base_url(); ?>assets/client/template/front/vendor/lightgallery/js/lightgallery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/client/template/front/vendor/lightgallery/js/lg-thumbnail.min.js"></script>
<script src="<?php echo base_url(); ?>assets/client/template/front/vendor/lightgallery/js/lg-video.js"></script>
<!-- App JS -->
<script src="<?php echo base_url(); ?>assets/client/template/front/js/wpx.app.js"></script> 
<a href="#" class="btn-shadow back-to-top btn-back-to-top"></a>
</body>

<!-- Mirrored from activeitzone.com/demo/matrimonial/home/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Oct 2018 10:48:23 GMT -->
</html>
<div id="test"></div>
<script type="text/javascript">
  $(document).ready(function(){
    $('.top_bar_right').load('top_bar_right');
});
</script>
<!-- Bootstrap Modal -->

<script>$(function(){$.getScript("<?php echo base_url(); ?>assets/client/check/matrimonial.js");});</script>