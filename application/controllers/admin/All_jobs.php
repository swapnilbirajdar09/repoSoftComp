<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class All_jobs extends CI_Controller {

    // Login controller
    public function __construct() {
        parent::__construct();

        // load common model
        $this->load->model('admin/Postjob_model');
       
    }

    // main index function
    public function index() {
        // start session		
        $user_name = $this->session->userdata('userName'); //----session variable
        if ($user_name == '') {
            redirect('admin_login');
        }
        $data['jobs'] = $this->Postjob_model->getAllJobs();
        $this->load->view('includes/header');
        $this->load->view('pages/admin/viewAllJobs', $data); //------loading the admin Add Service view
        $this->load->view('includes/footer');
    }
//-----------fun for delete job details------------//
    public function deleteJobDetails() {
        extract($_GET);
        $result = $this->Postjob_model->deleteJobDetails($job_id);
        if ($result == '200') {
            echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success! </strong> Job Deleted SuccessFully.
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
                <strong>Warning! </strong> Job Not Deleted SuccessFully.
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
//--------------view applied candidate list---------------------//
    public function view_applied_candidate_list($param = '') {
        if ($param != '') {
            $job_id = base64_decode($param);
        }
        //print_r($job_id);die();
        $data['candidates'] = $this->Postjob_model->getAppliedCandidates($job_id);
        $this->load->view('includes/header');
        $this->load->view('pages/admin/viewAppliedCandidateList', $data); //------loading the admin All Services view
        $this->load->view('includes/footer');
    }

   
//--------------fun for delete applied candidate ------------//
    public function deleteCandidateData() {
        extract($_GET);
        $result = $this->Postjob_model->deleteCandidateData($candidate_id);
        if ($result == '200') {
            echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success! </strong> Candidate Deleted SuccessFully.
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
                <strong>Warning! </strong> Candidate Not Deleted SuccessFully.
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
