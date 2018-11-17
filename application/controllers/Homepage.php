<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Homepage extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // load common model
        $this->load->model('admin/manageservice_model');
        $this->load->model('admin/dashboard_model');
        $this->load->model('admin/portfolio_model');
    }

    // main index function
    public function index() {
        $data['allServices']=$this->manageservice_model->getAllFeaturedServices();
        $data['allTestimonials']=$this->dashboard_model->getTestimonialDetails();
        $data['allTechnologies']=$this->dashboard_model->getTechnologyDetails();
        $data['allCategories']=$this->portfolio_model->getAllCategories();
        $data['allPortfolios']=$this->portfolio_model->getAllPortfolios();
        $this->load->view('includes/user/header');
        $this->load->view('pages/user/home',$data); 
        $this->load->view('includes/user/footer');
    }
}