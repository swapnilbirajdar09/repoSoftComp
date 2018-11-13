<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Show_user extends CI_Controller {

    // Login controller
    public function __construct() {
        parent::__construct();
        $this->load->model('user/search/Advancesearch_model');
        $this->load->model('user/user_model');
    }

    // main index function
    public function index($param='') {
        if($param!=''){
            $user_id=base64_decode($param);
            $data['userDetails'] = $this->user_model->getUserDetails($user_id);
            $data['userDocuments'] = $this->user_model->getUserDocuments($user_id);
        }
        else{
        // echo 'bii';
        $data['userDetails']=array(
            'status'    =>  'error',
            'message'   =>  'User not found!'
        );
    }          
        $this->load->view('includes/user/userheader.php'); //------user header page
        $this->load->view('pages/admin/show',$data); //------user profile page
        $this->load->view('includes/user/userfooter.php'); //------user footer page
    }
        
}