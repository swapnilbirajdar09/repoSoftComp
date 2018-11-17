<?php
// error_reporting('E_ALL');

defined('BASEPATH') OR exit('No direct script access allowed');
class Viewportfolio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // load common model
        $this->load->model('admin/portfolio_model');
    }

    // main index function
    public function index() {
        $data['allCategories']=$this->portfolio_model->getAllCategories();
        $data['allPortfolios']=$this->portfolio_model->getAllPortfolios();
        $this->load->view('includes/user/header');
        $this->load->view('pages/user/portfolios',$data); 
        $this->load->view('includes/user/footer');
    }

    // get portfolo detail on single page
    public function info($url='') {
        $str=base64_decode($url);
        $arr=explode('|',$str);
        $portfolio_id=$arr[1];

        $data['featuredPortfolio']=$this->portfolio_model->getFeaturedPortfolios();
        $data['portfolioDetail']=$this->portfolio_model->getPortfolioDetail($portfolio_id);
        $this->load->view('includes/user/header');
        $this->load->view('pages/user/portfolio_info',$data); 
        $this->load->view('includes/user/footer');
    }
}