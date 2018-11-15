<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_setting extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // load common model
      
    }

    // main index function
    public function index() {
        $this->load->view('includes/header');
        $this->load->view('pages/admin/admin_settings'); 
         $this->load->view('includes/footer');
    }
}