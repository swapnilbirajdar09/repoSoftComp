<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title></title>

        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo base_url(); ?>assets/fa/css/font-awesome.min.css" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/build/css/animate.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/build/css/w3.css" rel="stylesheet">
        <!-- angular-->
        <script src="<?php echo base_url(); ?>assets/js/angular.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/angular-sanitize.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/const.js"></script>
        <style>
            .center {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 30%;
                padding-top: 100px;

            }
        </style>
    </head>

    <body class="login" style="background-image: url(<?php echo base_url(); ?>assets/images/login-bg1.jpg); background-position: center;">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>
            <section id="logo" class="w3-center" style="margin-top: 26px">
                     <!-- <a href="#"><img src="<?php echo base_url(); ?>assets/client/uploads/header_logo/logo.jpeg" class="center" alt=""  /></a> -->
                <h1 class=""><b><i></i></b></h1>
            </section>
            <div class="login_wrapper" ng-app="loginApp" ng-controller="loginController">

                <div class="animate form login_form w3-padding">
                    <section class="login_content w3-padding w3-white w3-text-grey w3-card-2">
                        <form ng-submit="submit()" method="POST">
                            <h1>Login Form</h1>
                            <div ng-bind-html="message"></div>
                            <div>
                                <input type="text" ng-model="username" class="form-control w3-small" placeholder="Enter username here..." required>
                            </div>
                            <div>
                                <input type="password" ng-model="password" class="form-control w3-small" placeholder="Enter password here..." required>
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block" type="submit">
                                    <span ng-show="loginButtonText == 'Authenticating user. Please wait...'"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                                    {{ loginButtonText}}
                                </button>
                            </div>
                            <div class="clearfix"></div>
                            <div class="separator">
                                <p class="change_link">
                                    <a href="#signup" class="to_register" >Lost your password?</a>
                                </p>
                                <div class="clearfix"></div>
                                <br />
                            </div>
                        </form>
                    </section>
                </div>

                <div id="forgotpassword" class="animate form registration_form w3-padding">
                    <section class="login_content w3-padding w3-white w3-text-grey w3-card-2">
                        <div class="w3-padding" ng-bind-html="messageinfo"></div>
                        <form >
                            <h1>Get Password</h1>
                            <h6>Don't remember your password? Please enter valid email-id to get your password!</h6>
                            <div>
                                <input type="email" ng-model="email_id" class="form-control" placeholder="Enter email-ID here..." required>
                            </div>              
                            <div>
                                <button id="subBtn" class="btn btn-primary btn-block" ng-click="forgetPassword()">Get Password</button>
                            </div>
                            <div class="clearfix"></div>
                            <div class="separator">
                                <p class="change_link">I have a password ?
                                    <a href="#signin" class="to_register"> Log in </a>
                                </p>
                                <div class="clearfix"></div>
                                <br />
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
        <?php // echo base64_encode('admin1234'); ?>
        <!-- Authenticate user script  -->
        <script>
            var loginApp = angular.module('loginApp', ['ngSanitize']);
            loginApp.controller('loginController', function ($scope, $http, $timeout, $window) {
                $scope.loginButtonText = "Log in as Administrator";
                $scope.test = "false";
                $scope.submit = function ()
                {
                    $scope.message = '';
                    // spinner on button
                    $scope.test = "true";
                    $scope.loginButtonText = "Authenticating user. Please wait...";
                    // Do login here        
                    $timeout(function () {
                        // POST form data to controller
                        $http({
                            method: 'POST',
                            url: '<?php echo base_url(); ?>admin_login/adminlogin',
                            headers: {'Content-Type': 'application/json'},
                            data: JSON.stringify({username: $scope.username, password: $scope.password})
                        }).then(function (data) {
                            //$scope.message = data.data;
                            if (data.data == '200') {
                                //alert('got');
                                $scope.message = '<p class="w3-green w3-padding-small">Login Successfull! Welcome Admin.</p>';
                                $window.location.href = BASE_URL + 'admin/admin_dashboard';
                            } else {
                                $scope.message = data.data;
                            }
                        });
                        $scope.loginButtonText = "Log in as Administrator";
                    }, 2000);
                };

                $scope.forgetPassword = function () {
                    //$.alert();
                    $('#subBtn').html('<span class="w3-card w3-padding-small w3-margin-bottom w3-round"><i class="fa fa-spinner fa-spin w3-large"></i> <b>Getting Password. Hang on...</b></span>');
                    $http({
                        method: 'POST',
                        url: '<?php echo base_url(); ?>admin_login/forgetPassword',
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify({email_id: $scope.email_id})
                    }).then(function (data) {
                        //alert(data.data);
                        $('#subBtn').html('<span>Get Password</span>');
                        $scope.messageinfo = data.data;
                    });
                };
            });
        </script>
    </body>
</html>
