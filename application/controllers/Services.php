<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

    public function __construct() {
        parent::__construct();
// load common model
        $this->load->model('admin/Manageservice_model');
        $this->load->model('admin/Setting_model');
        $this->load->model('admin/dashboard_model');
    }

// main index function
    public function index() {
        $data['allTechnologies'] = $this->dashboard_model->getTechnologyDetails();
        $data['social_logos'] = $this->Setting_model->getAllSocialLinks();
        $data['company_details'] = $this->Setting_model->getAllcompany_details();
        $data['services'] = $this->Manageservice_model->allServices();
        $this->load->view('includes/user/header',$data);
        $this->load->view('pages/user/services', $data);
        $this->load->view('includes/user/footer',$data);
    }

}
