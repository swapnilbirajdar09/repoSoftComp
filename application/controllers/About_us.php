<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class About_us extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // load common model
    
    }

    // main index function
    public function index() {
        $this->load->view('includes/user/header');
        $this->load->view('pages/user/about_us'); 
        $this->load->view('includes/user/footer');
    }
  }
 ?>