<?php
error_reporting('E_ALL');

defined('BASEPATH') OR exit('No direct script access allowed');
class Viewblog extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // load common model
        $this->load->model('admin/blog_model');
    }

    // main index function
    public function index() {
        $data['categories']=$this->blog_model->getAllCategories();
        $data['category_count']=$this->blog_model->getCategoriesCount();
        $data['allTags']=$this->blog_model->getAllTags();

        if(isset($_GET)){
            if(isset($_GET['tokId']) && isset($_GET['category'])){
                $data['all_blogs']=$this->blog_model->getAllBlogsByCategory($_GET['tokId']);
            }
            else if(isset($_GET['tag'])){
                $data['all_blogs']=$this->blog_model->getAllBlogsByTag($_GET['tag']);
            }
            else{
                $data['all_blogs']=$this->blog_model->getAllBlogs();
            }

        }
        else{
            $data['all_blogs']=$this->blog_model->getAllBlogs();
        }        
        $this->load->view('includes/user/header');
        $this->load->view('pages/user/blogs',$data); 
        $this->load->view('includes/user/footer');
    }

    // get blog detail on single page
    public function info($url='') {
        $str=base64_decode($url);
        $arr=explode('|',$str);
        $blog_id=$arr[1];

        $data['categories']=$this->blog_model->getAllCategories();
        $data['category_count']=$this->blog_model->getCategoriesCount();
        $data['allTags']=$this->blog_model->getAllTags();
        $data['blogDetail']=$this->blog_model->getBlogDetail($blog_id);
        $data['all_blogs']=$this->blog_model->getAllBlogs();
        $this->load->view('includes/user/header');
        $this->load->view('pages/user/blog_info',$data); 
        $this->load->view('includes/user/footer');
    }
}