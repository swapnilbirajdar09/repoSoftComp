<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class View_applied_candidate_list extends CI_Controller {

    // Login controller
    public function __construct() {
        parent::__construct();
        // load common model
        $this->load->model('admin/Postjob_model');
        $this->load->helper('file');
        $this->load->helper('download');
    }

    // main index function
    public function index($param = '') {
        // start session		
        $user_name = $this->session->userdata('userName'); //----session variable
        if ($user_name == '') {
            redirect('admin_login');
        }

        if ($param != '') {
            $job_id = base64_decode($param);
        }
        //print_r($job_id);die();
        $data['candidates'] = $this->Postjob_model->getAppliedCandidates($job_id);
        $this->load->view('includes/header');
        $this->load->view('pages/admin/viewAppliedCandidateList', $data); //------loading the admin All Services view
        $this->load->view('includes/footer');
    }

    //---------------download user resume----------------------//
    public function download($candidate_id = '') {
        $arr = base64_decode($candidate_id);
        $data = explode('|', $arr);
        $cand_id = $data[0];
        $candidate_name = $data[1];
        $result = $this->Postjob_model->getCandidateResume($cand_id);
        $file_name = $candidate_name;
        $file = base_url() . $result;
        $dataNew = file_get_contents($file);
        force_download($file_name, $dataNew);
    }

    // -----------------download function ends---------------//

    public function deleteCandidateData() {
        extract($_GET);
        //print_r($_GET);die();
        $result = $this->Postjob_model->deleteCandidateData($candidate_id);
        //print_r($result);die();
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
