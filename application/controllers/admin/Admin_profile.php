<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_profile extends CI_Controller {

    // Login controller
    public function __construct() {
        parent::__construct();
        // load common model
        $this->load->model('admin/Adminprofile_model');
    }

    // main index function
    public function index() {
        // start session		
        $admin_name = $this->session->userdata('admin_name'); //----session variable
        if ($admin_name == '') {
            redirect('admin/admin_login');
        }
        $data['adminInfo'] = $this->Adminprofile_model->getAdminDetails();
        // print_r($data['adminInfo']);die();
        $this->load->view('includes/header');
        $this->load->view('pages/admin/admin_profile', $data); //------loading the admin login view
        $this->load->view('includes/footer');
    }

    public function updateAdminDetails() {
        extract($_POST);
        extract($_FILES);
        $data = $_POST;

        $allowed_types = ['gif', 'jpg', 'png', 'jpeg', 'JPG', 'GIF', 'JPEG', 'PNG'];
        $imagePath = '';

        $image_name = $_FILES['profile_image']['name'];
        if ($profile_imageEdit == '') {
            $imagePath = '';
        } else {
            $imagePath = $profile_imageEdit;
        }

        if (!empty(($_FILES['profile_image']['name']))) {
            $extension = pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION);

            $_FILES['userFile']['name'] = 'adminImage.' . $extension;
            $_FILES['userFile']['type'] = $_FILES['profile_image']['type'];
            $_FILES['userFile']['tmp_name'] = $_FILES['profile_image']['tmp_name'];
            $_FILES['userFile']['error'] = $_FILES['profile_image']['error'];
            $_FILES['userFile']['size'] = $_FILES['profile_image']['size'];

            $uploadPath = 'assets/images/admin/';  //upload images in images/desktop/ folder
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; //allowed types of images           
            $config['overwrite'] = TRUE;
            // print_r($fileData = $this->upload->data());die();
            $this->load->library('upload', $config);  //load upload file config.
            $this->upload->initialize($config);

            if ($this->upload->do_upload('userFile')) {
                $fileData = $this->upload->data();
                $imagePath = $uploadPath . $fileData['file_name'];
            }
        }

        //echo $imagePath;die();
        //validating image ends---------------------------//
        //print_r($data);die();
        $data['imagePath'] = $imagePath;
//        print_r($data);
//        die();
        // call to model function to update AdminDetails
        $result = $this->Adminprofile_model->updateAdminDetails($data);
        if ($result) {
            echo '<p class="w3-text-white w3-green w3-padding-small message"><strong>Success!</strong> Admin Profile updated successfully.</p>';
        } else {
            echo '<p class="w3-text-white w3-red w3-padding-small message"><strong>Failure!</strong> None of the fields were changed. Admin Profile updation failed!</p>';
        }
    }

}
