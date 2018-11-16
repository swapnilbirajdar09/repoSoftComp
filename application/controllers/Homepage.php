<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Homepage extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // load common model
        // $this->load->model('user/_model');
    }

    // main index function
    public function index() {
        $this->load->view('includes/user/header');
        $this->load->view('pages/user/home'); 
        $this->load->view('includes/user/footer');
    }
}