<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();


        // load common model
        $this->load->model('admin/Dashboard_model');
    }

    // main index function
    public function index() {
        $user_name = $this->session->userdata('userName'); //----session variable
        if ($user_name == '') {
            redirect('admin_login');
        }
        $data['tech'] = $this->Dashboard_model->getTechnologyDetails();
        $data['testimonial'] = $this->Dashboard_model->getTestimonialDetails();
        // print_r($data);
        $this->load->view('includes/header');
        $this->load->view('pages/admin/dashboard', $data);
        $this->load->view('includes/footer');
    }

    // -----function to add category in db
    public function addCategory() {
        // get data passed through ANGULAR AJAX
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata, TRUE);
        print_r($request['catname']);
        // call to model function to add skills from db
        $result = $this->Dashboard_model->AddCategory($request['catname']);

        echo json_encode($result);
    }

    //---function for show all category
    public function getAllCategory() {
        // call to model function to get all skills from db
        $result = $this->Dashboard_model->getAllCategory();

        echo json_encode($result);
    }

    //---function for del category
    public function delCategory() {
        extract($_GET);
        //print_r($_GET);die();
        // call to model function to del  skills from db
        $result = $this->Dashboard_model->delCat($catid);

        echo json_encode($result);
    }

    // ----function to add technology
    public function addtechnology() {
        extract($_POST);
        extract($_FILES);

        $data = $_POST;

        $allowed_types = ['gif', 'jpg', 'png', 'jpeg', 'JPG', 'GIF', 'JPEG', 'PNG'];
        $imagePath = '';

        $image_name = $_FILES['logo_image']['name'];
        if ($image_name == '') {
            $imagePath = '';
        } else {

            if (!empty(($_FILES['logo_image']['name']))) {
                $extension = pathinfo($_FILES['logo_image']['name'], PATHINFO_EXTENSION);

                $_FILES['userFile']['name'] = 'adminImage' . $technology_name . '.' . $extension;
                $_FILES['userFile']['type'] = $_FILES['logo_image']['type'];
                $_FILES['userFile']['tmp_name'] = $_FILES['logo_image']['tmp_name'];
                $_FILES['userFile']['error'] = $_FILES['logo_image']['error'];
                $_FILES['userFile']['size'] = $_FILES['logo_image']['size'];

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
        }
        //validating image ends---------------------------//

        $data['imagePath'] = $imagePath;

        // call to model function to add technology
        $result = $this->Dashboard_model->add_technology($data);
        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success! </strong> Technology Added SuccessFully.
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
                <strong>Warning! </strong> Technology Not Added SuccessFully.
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

    //------------fun for remove technology-----------------------//
    public function remove_technology() {
        extract($_POST);

        $result = $this->Dashboard_model->remove_technology($tech_id);
        if ($result == 200) {

            echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> Technology Deleted SuccessFully.
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
        <strong>Warning!</strong> Technology Not Deleted SuccessFully.
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

    //------------fun for add testimonial details-----------------------//

    public function add_testimonial() {
        extract($_POST);
        extract($_FILES);

        $data = $_POST;

        $allowed_types = ['gif', 'jpg', 'png', 'jpeg', 'JPG', 'GIF', 'JPEG', 'PNG'];
        $imagePath = '';

        $image_name = $_FILES['client_image']['name'];


        if (!empty(($_FILES['client_image']['name']))) {
            $extension = pathinfo($_FILES['client_image']['name'], PATHINFO_EXTENSION);

            $_FILES['userFile']['name'] = 'testimonial' . $client_name . '.' . $extension;
            $_FILES['userFile']['type'] = $_FILES['client_image']['type'];
            $_FILES['userFile']['tmp_name'] = $_FILES['client_image']['tmp_name'];
            $_FILES['userFile']['error'] = $_FILES['client_image']['error'];
            $_FILES['userFile']['size'] = $_FILES['client_image']['size'];

            $uploadPath = 'assets/images/admin/testimonial/';  //upload images in images/desktop/ folder
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; //allowed types of images           

            $this->load->library('upload', $config);  //load upload file config.
            $this->upload->initialize($config);

            if ($this->upload->do_upload('userFile')) {
                $fileData = $this->upload->data();
                $imagePath = $uploadPath . $fileData['file_name'];
            }
        }


        //validating image ends---------------------------//

        $data['imagePath'] = $imagePath;

        // call to model function to add testimonial
        $result = $this->Dashboard_model->add_testimonial($data);
        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> Testimonial Details Added SuccessFully.
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
        <strong>Warning!</strong> Testimonial Details Addition Failed.
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

    // ----------function to delete testimonial details
    public function deletClientDetails() {
        extract($_POST);
        $result = $this->Dashboard_model->deletClientDetails($testimonial_id);
        //print_r($result);die();
        if ($result == 200) {

            echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> Testimonial Details Deleted SuccessFully.
        </div>
        <script>
        window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
        });
        }, 5000);
        location.reload();

        </script>';
        } else {

            echo '<div class="alert alert-danger alert-dismissible fade in alert-fixed w3-round">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warning!</strong> Testimonial Details Not Deleted SuccessFully.
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
