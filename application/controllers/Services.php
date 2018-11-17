<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

    public function __construct() {
        parent::__construct();
// load common model
        $this->load->model('admin/Manageservice_model');
    }

// main index function
    public function index() {
        $data['services'] = $this->Manageservice_model->allServices();
        $this->load->view('includes/user/header');
        $this->load->view('pages/user/services', $data);
        $this->load->view('includes/user/footer');
    }
}