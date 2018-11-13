<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register_user extends CI_Controller {

    // Login controller
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Registeruser_model');       
        $this->load->model('admin/dashboard_model');
    }

    // main index function
    public function index() {
       $data['package']=$this->dashboard_model->getAllPackages();
       $this->load->view('includes/header');
       $this->load->view('pages/admin/register_user',$data);
       $this->load->view('includes/footer');
   }

   public function register_user() {
      extract($_POST);
      $data=$_POST;
           //  $pac = $package;
           //  $package_select = explode("|", $pac);
           // // echo $package_select[0]."hii";

          //print_r($data);die();
      $result = $this->Registeruser_model->register_user($data);
         //print_r($result);die();
      if ($result == '200') {
        echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> user Details Saved SuccessFully.
        </div>
        <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
                });
                window.location.reload();
                }, 1000);
                
                </script>';
            } elseif($result == '700'){
                echo '<div class="alert alert-danger alert-dismissible fade in alert-fixed w3-round">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Warning!</strong> Email Id Already Exists.
                </div>
                <script>
                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove(); 
                        });
                        }, 5000);
                        </script>';
                    }
                    else{
                        echo '<div class="alert alert-danger alert-dismissible fade in alert-fixed w3-round">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Warning!</strong> user Details Not Saved SuccessFully.
                </div>
                 <script>
                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove(); 
                        });
                        }, 5000);
                        </script>';
                    }
        // return $response;
                }

            }