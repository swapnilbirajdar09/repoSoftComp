<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    // Dashboard controller
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/dashboard_model');
    }

    // main index function
    public function index() {
        
        // start session        
        $admin_name = $this->session->userdata('admin_name'); //----session variable
        if ($admin_name == '') {
            redirect('admin/admin_login');
        }
        $this->load->view('includes/header');
        $this->load->view('pages/admin/dashboard');
        $this->load->view('includes/footer');
    }

    // get all statistics report for dashboard
    public function getAllStatistics(){
        $result=$this->dashboard_model->getAllStatistics();
        //print_r($result);die();
        if($result!=''){
            echo json_encode($result);
        }
        else{
            return false;
        }
    }

    // get all membership packages 
    public function getAllPackages(){
        $result=$this->dashboard_model->getAllPackages();
        //print_r($result);die();
        if($result!=''){
            echo json_encode($result);
        }
        else{
            return false;
        }
    }

    // add new package
    public function addNewPackage(){
        // print_r($_POST);
        $data=$_POST;

        $result=$this->dashboard_model->addNewPackage($data);

        if($result){
            echo '<p class="w3-text-white w3-green w3-padding-small message"><strong>Success!</strong> "'.$data['pkg_name'].'" added successfully.</p>';
        }
        else{
            echo '<p class="w3-text-white w3-red w3-padding-small message"><strong>Failure!</strong> Package addition failed!</p>';
        }
    }

    // add new package
    public function delPackage($id=''){
        $result=$this->dashboard_model->delPackage($id);

        if($result){
            echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success-</strong> Membership Package deleted successfully.</div>';
        }
        else{
            echo '<div class="alert alert-danger alert-dismissible fade in alert-fixed w3-round"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Failure!</strong> Package deletion failed!</div>';
        }
    }

    // edit package view
    public function editpackage($id=''){
        $admin_name = $this->session->userdata('admin_name'); //----session variable
        if ($admin_name == '') {
            redirect('admin/admin_login');
        }
        $result['pkg_details']=$this->dashboard_model->getPackageDetail($id);
        $this->load->view('includes/header');
        $this->load->view('pages/admin/editpackage',$result);
        $this->load->view('includes/footer');
    }

    // edit package function
    public function editPackageChanges(){
        $data=$_POST;
        $result=$this->dashboard_model->editPackageChanges($data);

        if($result){
            echo '<p class="w3-text-white w3-green w3-padding-small message"><strong>Success!</strong> "'.$data['pkg_name'].'" updated successfully.</p>';
        }
        else{
            echo '<p class="w3-text-white w3-red w3-padding-small message"><strong>Failure!</strong> None of the fields were changed. Package updation failed!</p>';
        }
    }
}
