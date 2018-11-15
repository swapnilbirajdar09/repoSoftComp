<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_setting extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // load common model
          $this->load->model('admin/Setting_model');
    }

    // main index function
    public function index() {
        $data['admin_details'] = $this->Setting_model->getAlladmin_details();
        $this->load->view('includes/header');
        $this->load->view('pages/admin/admin_settings',$data); 
         $this->load->view('includes/footer');
    }

         //----------this function to update admin email-----------------------------//
 public function updateEmail() { 
  extract($_POST);
 // print_r($_POST);die();
  $data=$_POST;
  $result = $this->Setting_model->updateEmail($admin_email);
    if ($result) {
      echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> Email Updated SuccessFully.
        </div>
         <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
                });
                window.location.reload();
                }, 2000);                
                </script>';
          } else {

              echo '<div class="alert alert-danger alert-dismissible fade in alert-fixed w3-round">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warning!</strong> Email Updation failed.
        </div>
        <script>
                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove(); 
                        });
                        }, 5000);
                        </script>';
          }
   }
 //----------this function to update admin username-----------------------------//
   public function updateUname()
  {
    extract($_POST);
    // print_r($_POST);die();
     $data=$_POST;
    $result = $this->Setting_model->updateUname($admin_uname);
    if ($result) {
      echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> UserName Updated SuccessFully.
        </div>
         <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
                });
                window.location.reload();
                }, 2000);                
                </script>';
          } else {

              echo '<div class="alert alert-danger alert-dismissible fade in alert-fixed w3-round">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warning!</strong>  UserName Updation failed.
        </div>
        <script>
                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove(); 
                        });
                        }, 5000);
                        </script>';
          }

   }

   //----------this function to update admin Password-----------------------------//
   public function updatePass()
  {
    extract($_POST);
    // print_r($_POST);die();
     $data=$_POST;
    $result = $this->Setting_model->updatePass($admin_pass);
    if ($result) {
      echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> Password Updated SuccessFully.
        </div>
         <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
                });
                window.location.reload();
                }, 2000);                
                </script>';
          } else {

              echo '<div class="alert alert-danger alert-dismissible fade in alert-fixed w3-round">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warning!</strong>  Password Updation failed.
        </div>
        <script>
                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove(); 
                        });
                        }, 5000);
                        </script>';
          }

   }
}