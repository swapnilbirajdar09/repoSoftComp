<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Add_services extends CI_Controller {

    // Login controller
    public function __construct() {
        parent::__construct();

        // load common model
        $this->load->model('admin/Manageservice_model');
    }

    // main index function
    public function index() {
        // start session		
        $user_name = $this->session->userdata('userName'); //----session variable
        if ($user_name == '') {
            redirect('admin_login');
        }
        $this->load->view('includes/header');
        $this->load->view('pages/admin/addService'); //------loading the admin Add Service view
        $this->load->view('includes/footer');
    }

    public function addServices() {
        extract($_POST);
        extract($_FILES);
        $data = $_POST;
        $allowed_types = ['gif', 'jpg', 'png', 'jpeg', 'JPG', 'GIF', 'JPEG', 'PNG'];

        if (!empty(($_FILES['serviceImage']['name']))) {
            $extension_img = pathinfo($_FILES['serviceImage']['name'], PATHINFO_EXTENSION); //get prod image file extension 
            //image validating---------------------------//
            //check whether image size is less than 10 mb or not
            if ($_FILES['serviceImage']['size'] > 10485760) {  //for prod images
                echo '<label class="w3-small w3-label w3-text-red"><i class="fa fa-warning w3-large"></i> Image size exceeds size limit of 10MB. Upload image having size less than 10MB</label>';
                die();
            }
            //check file is an image or not by checking extensions
            if (!in_array($extension_img, $allowed_types)) {  //for prod images
                echo '<label class="w3-small w3-label w3-text-red"><i class="fa fa-warning w3-large"></i> File is not an image file. Upload image having type gif, jpg, jpeg OR png</label>';
                die();
            }
        }

        $imagePath = '';
        if (!empty(($_FILES['serviceImage']['name']))) {
            $extension = pathinfo($_FILES['serviceImage']['name'], PATHINFO_EXTENSION);

            $_FILES['userFile']['name'] = $service_name . '.' . $extension;
            $_FILES['userFile']['type'] = $_FILES['serviceImage']['type'];
            $_FILES['userFile']['tmp_name'] = $_FILES['serviceImage']['tmp_name'];
            $_FILES['userFile']['error'] = $_FILES['serviceImage']['error'];
            $_FILES['userFile']['size'] = $_FILES['serviceImage']['size'];

            $uploadPath = 'assets/images/services/';  //upload images in images/desktop/ folder
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; //allowed types of images           
            $config['overwrite'] = TRUE;
            // print_r($fileData = $this->upload->data());die();
            $this->load->library('upload', $config);  //load upload file config.
            $this->upload->initialize($config);

            if ($this->upload->do_upload('userFile')) {
                $fileData = $this->upload->data();
                $imagePath = $fileData['file_name'];
            }
        }

        $data['imagePath'] = $uploadPath . $imagePath;

        $result = $this->Manageservice_model->addServices($data);
        //print_r($result);die();
        if ($result == '200') {
            echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success! </strong> Service Added SuccessFully.
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
                <strong>Warning! </strong> Service Not Added SuccessFully.
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
