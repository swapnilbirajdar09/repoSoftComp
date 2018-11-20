<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Careers_details extends CI_Controller {

    public function __construct() {
        parent::__construct();
// load common model
        $this->load->model('admin/Postjob_model');
        $this->load->model('Careers_model');
    }

// main index function
    public function index() {
    	extract($_GET);
    	//print_r($_GET);die();
    	$job_id = base64_decode($job_id);
        $data['jobs'] = $this->Postjob_model->getAllJobsById($job_id);
        $this->load->view('includes/user/header');
        $this->load->view('pages/user/career_details', $data);
        $this->load->view('includes/user/footer');
    }
  }