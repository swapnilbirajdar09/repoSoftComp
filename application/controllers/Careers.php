<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Careers extends CI_Controller {

    public function __construct() {
        parent::__construct();
// load common model
        $this->load->model('admin/Postjob_model');
        $this->load->model('admin/Setting_model');
        $this->load->model('Careers_model');
    }

// main index function
    public function index() {
        $data['social_logos'] = $this->Setting_model->getAllSocialLinks();
        $data['company_details'] = $this->Setting_model->getAllcompany_details();
        $data['jobs'] = $this->Postjob_model->getAllJobs();
        $this->load->view('includes/user/header',$data);
        $this->load->view('pages/user/careers', $data);
        $this->load->view('includes/user/footer',$data);
    }

    public function applyJob() {
        extract($_POST);
        // print_r($_POST);die();
        extract($_FILES);
        $data = $_POST;

        if ($job_id == 0) {  //for prod images
            echo '<div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Warning! </strong> Please Select The Valid Job.
                </div>';
            die();
        }

        $imagePath = '';
        if (!empty(($_FILES['resume']['name']))) {
            $extension = pathinfo($_FILES['resume']['name'], PATHINFO_EXTENSION);

            $_FILES['userFile']['name'] = $candidateName . '_' . $job_id . '.' . $extension;
            $_FILES['userFile']['type'] = $_FILES['resume']['type'];
            $_FILES['userFile']['tmp_name'] = $_FILES['resume']['tmp_name'];
            $_FILES['userFile']['error'] = $_FILES['resume']['error'];
            $_FILES['userFile']['size'] = $_FILES['resume']['size'];

            $uploadPath = 'assets/images/candidate_resumes/';  //upload images in images/desktop/ folder
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = '*'; //allowed types of images           
            //$config['overwrite'] = TRUE;
// print_r($fileData = $this->upload->data());die();
            $this->load->library('upload', $config);  //load upload file config.
            $this->upload->initialize($config);

            if ($this->upload->do_upload('userFile')) {
                $fileData = $this->upload->data();
                $imagePath = $uploadPath . $fileData['file_name'];
            } else {
                $error = array('error' => $this->upload->display_errors());
            }
        }

        $data['imagePath'] = $imagePath;
// print_r($data);die();
        $result = $this->Careers_model->applyJob($data);
        // print_r($imagePath);
        // print_r($result);die();
//        die();
        if ($result == '200') {
            echo '<div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success! </strong> We Received Your Applicaion Successfully. We\'ll Get Back To You Very Soon..!
        </div>
        <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
                });
                window.location.reload();
                }, 1500);                
                </script>';
        } elseif ($result == '700') {
            echo '<div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Failure! </strong> You Have Already Applied For This Job..!
        </div>';
        } else {
            echo '<div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Failure! </strong> Something went wrong. Reload the page and Try again!
        </div>';
        }
    }

}
