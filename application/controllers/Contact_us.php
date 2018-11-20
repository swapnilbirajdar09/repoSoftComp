<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // load common model
        $this->load->model('admin/Setting_model');
    }

    // main index function
    public function index() {
        $data['social_logos'] = $this->Setting_model->getAllSocialLinks();
        $data['contact_email'] = $this->Setting_model->getAllcompany_details();
        $this->load->view('includes/user/header',$data);
        $this->load->view('pages/user/Contact_us', $data);
        $this->load->view('includes/user/footer',$data);
    }

    public function sendContactEmail() {
        extract($_POST);
        // print_r($_POST);die();
        $admin_email = $this->Setting_model->getAllcompany_details();
        $adminEmail = $admin_email[0]['company_email'];
        $companyName = $admin_email[0]['company_name'];
        //print_r($companyName);die();
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mx1.hostinger.in',
            'smtp_port' => '587',
            'smtp_user' => 'support@jumlakuwait.com', // change it to yours
            'smtp_pass' => 'Descartes@1990', // change it to yours
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );
        $config['smtp_crypto'] = 'tls';

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('support@jumlakuwait.com', "Admin Team");
        $this->email->to($adminEmail, 'Admin Team');
        $this->email->subject('Message from ' . $name . ' (via website)');
        $this->email->message("<html>"
                . "<head>"
                . "</head>"
                . "<body>"
                . "<p><label><h3><b>Contact Form</label></b></h3></p>"
                . "<p><label>Contact form has been submitted by: Name:- " . $name . " </label></p>"
                . "<p><label>Email Id:- " . $email . " </label></p>"
                . "<p><label>Subject:- " . $subject . "</label></p>"
                . "<p><label>For The Purpose Of: " . $message . " </label></p>"
                . "</body>"
                . "</html>");
        if (!$this->email->send()) {
            echo '<div class="alert alert-danger" style="margin-bottom:5px">
            <strong>Message Sending Failed.</strong> 
            </div>
            <script>
            window.setTimeout(function() {
              $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
                 $(this).remove(); 
                 location.reload();
             });
            }, 100);
            </script>';
        } else {

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from('support@jumlakuwait.com', "Admin Team");
            $this->email->to($email, $name);
            $this->email->subject("Acknowlegdement from " . $companyName);
            $this->email->message('<html>
            <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="http://jobmandi.in/css/bootstrap/bootstrap.min.css">
            <script src="http://jobmandi.in/css/bootstrap/jquery.min.js"></script>
            <script src="http://jobmandi.in/css/bootstrap/bootstrap.min.js"></script>
            </head>
            <body>
            <div class="container col-lg-8" style="box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;margin:10px; font-family:Candara;">
            <h2 style="color:#4CAF50; font-size:30px">Customer Support</h2>
            <h3 style="font-size:15px;"> Your message was successfully sent!.<br><br>Thank you for contacting us, we will reply to your inquiry as soon as possible!</h3>
            <div class="col-lg-12">
            <div class="col-lg-4"></div>
            <div class="col-lg-4"></div>
            </div>
            <h4 style="font-size:15px;"><b>Thank You..!</b></h4>
            </div>
            </body></html>');

            if ($this->email->send()) {
                echo '<div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom:5px">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Message Sent Successfully..!</strong> 
            </div>';
            } else {
                echo '<div class="alert alert-danger alert-dismissible" style="margin-bottom:5px">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Message Sending Failed..!</strong> 
            </div>';
            }
        }
    }

}
