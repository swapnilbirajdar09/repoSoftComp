<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Verify_document extends CI_Controller {

    // Login controller
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/allusers_model');
        $this->load->model('user/user_model');
    }

    // main index function
    public function index($user_id='') {
        $data['userDetails'] = $this->user_model->getUserDetails(base64_decode($user_id));
        $data['userDocuments'] = $this->user_model->getUserDocuments(base64_decode($user_id));
        $this->load->view('includes/header');
        $this->load->view('pages/admin/verify_document',$data);
        $this->load->view('includes/footer');
    }

    // approve document function
    public function approveDocument(){
        extract($_POST);
        $result=$this->allusers_model->approveDocument($doc_id,$user_id);

        if($result){
            echo '<p class="w3-text-white w3-green w3-padding-small message"><strong>Success!</strong> Document Approved successfully.</p>';
        }
        else{
            echo '<p class="w3-text-grey w3-light-grey w3-padding-small message"><strong>Warning!</strong> Document Already Approved.</p>';
        }
    }

    // reject document function
    public function rejectDocument(){
        extract($_POST);
        $result=$this->allusers_model->rejectDocument($doc_id,$comments,$user_id);

        if($result){
            echo '<p class="w3-text-white w3-green w3-padding-small message"><strong>Success!</strong> Document Rejected successfully.</p>';
        }
        else{
            echo '<p class="w3-text-grey w3-light-grey w3-padding-small message"><strong>Warning!</strong> Document Already Rejected.</p>';
        }
    }

    // activate member function
    public function activate(){
        extract($_POST);
        $result=$this->allusers_model->activate($user_id);

        if($result){
            echo '<p class="w3-text-white w3-green w3-padding-small message"><strong>Success!</strong> Member Account Activated successfully.</p>';
        }
        else{
            echo '<p class="w3-text-grey w3-light-grey w3-padding-small message"><strong>Warning!</strong> Member Account already Activated.</p>';
        }
    }

    // deactivate member function
    public function deactivate(){
        extract($_POST);
        $result=$this->allusers_model->deactivate($user_id);

        if($result){
            echo '<p class="w3-text-white w3-green w3-padding-small message"><strong>Success!</strong> Member Account Deactivated successfully.</p>';
        }
        else{
            echo '<p class="w3-text-grey w3-light-grey w3-padding-small message"><strong>Warning!</strong> Member Account already Deactivated.</p>';
        }
    }
}