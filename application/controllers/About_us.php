<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About_us extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // load common model
        $this->load->model('admin/dashboard_model');
        $this->load->model('admin/Setting_model');
    }

    // main index function
    public function index() {
        $data['company_details'] = $this->Setting_model->getAllcompany_details();

        $data['social_logos'] = $this->Setting_model->getAllSocialLinks();
        $data['allTestimonials'] = $this->dashboard_model->getTestimonialDetails();
        $data['allTechnologies'] = $this->dashboard_model->getTechnologyDetails();
        $this->load->view('includes/user/header', $data);
        $this->load->view('pages/user/about_us', $data);
        $this->load->view('includes/user/footer', $data);
    }

}

?>