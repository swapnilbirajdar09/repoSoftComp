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
        $user_name = $this->session->userdata('userName'); //----session variable
        if ($user_name == '') {
            redirect('admin_login');
        }
        $data['socials'] = $this->Setting_model->getSocials();
        $data['social_links'] = $this->Setting_model->getAllSocialLinks();
        $data['admin_details'] = $this->Setting_model->getAlladmin_details();
        $data['company_details'] = $this->Setting_model->getAllcompany_details();
        $this->load->view('includes/header');
        $this->load->view('pages/admin/admin_settings', $data);
        $this->load->view('includes/footer');
    }

    //------------------fun for save social links--------------------------//
    public function addSocialLinks() {
        extract($_POST);
        $data = $_POST;
        $result = $this->Setting_model->addSocialLinks($data);
        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> Social Links Added SuccessFully.
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
        <strong>Warning!</strong> Social Links Not Added Successfully.
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

    //----------this function to update admin email-----------------------------//
    public function updateEmail() {
        extract($_POST);
        // print_r($_POST);die();
        $data = $_POST;
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
    public function updateUname() {
        extract($_POST);
        // print_r($_POST);die();
        $data = $_POST;
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
    public function updatePass() {
        extract($_POST);
        // print_r($_POST);die();
        $data = $_POST;
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

    //----------this function to update Company Profile-----------------------------//
    public function add_companyProfile() {
        extract($_POST);
        //print_r($_POST); die();
        extract($_FILES);
        $data = $_POST;
        // print_r($data);die(); 

        $allowed_types = ['gif', 'jpg', 'png', 'jpeg', 'JPG', 'GIF', 'JPEG', 'PNG'];
        $imagePath = '';
        $image_name = $_FILES['company_logo']['name'];
        if (!empty(($_FILES['company_logo']['name']))) {
            $extension = pathinfo($_FILES['company_logo']['name'], PATHINFO_EXTENSION);

            $_FILES['userFile']['name'] = 'adminImage' . $company_name . '.' . $extension;
            $_FILES['userFile']['type'] = $_FILES['company_logo']['type'];
            $_FILES['userFile']['tmp_name'] = $_FILES['company_logo']['tmp_name'];
            $_FILES['userFile']['error'] = $_FILES['company_logo']['error'];
            $_FILES['userFile']['size'] = $_FILES['company_logo']['size'];

            $uploadPath = 'assets/images/admin/';  //upload images in images/desktop/ folder
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; //allowed types of images           

            $this->load->library('upload', $config);  //load upload file config.
            $this->upload->initialize($config);

            if ($this->upload->do_upload('userFile')) {
                $fileData = $this->upload->data();
                $imagePath = $uploadPath . $fileData['file_name'];
            }
        }

        $c_profile['company_name'] = $company_name;
        $c_profile['company_email'] = $company_email;
        $c_profile['company_logo'] = $imagePath;


        $result = $this->Setting_model->add_companyProfile($c_profile);

        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong>Company Profile Updated SuccessFully.
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
        <strong>Warning!</strong> Company Profile Updation failed.
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

    // ---------function to update office address
    public function add_officeaddress() {
        extract($_POST);
        //print_r($_POST);die();
        if ($office_type == '0') {
            echo '<div class="alert alert-danger alert-dismissible fade in alert-fixed w3-round">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warning!</strong> Please Select Valid Office Type.
        </div>
        <script>
                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove(); 
                        });
                        }, 5000);
                        </script>';
            die();
        }
        $office_details = array(
            'office_type' => $office_type,
            'office_number' => $office_number,
            'office_email' => $office_email,
            'office_address' => $office_address
        );
        $result = $this->Setting_model->add_officeaddress($office_details);
        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong>Company Address Updated SuccessFully.
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
        <strong>Warning!</strong> Company Address Updation failed.
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

    public function remove_officedetails() {
        extract($_POST);
        $result = $this->Setting_model->remove_officedetails($key);

        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success! </strong> Office Details Deleted SuccessFully.
        </div>
        <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
                });
                window.location.reload();
                }, 1500);                
                </script>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade in alert-fixed w3-round">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Warning! </strong> Office Details Not Deleted SuccessFully.
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
