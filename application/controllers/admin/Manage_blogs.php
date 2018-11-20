<?php
error_reporting('E_ALL');
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_blogs extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // load common model
        $this->load->model('admin/blog_model');

    }

    // main index function
    public function index() {
        $data['categories']=$this->blog_model->getAllCategories();
        $data['allTags']=$this->blog_model->getAllTags();
        $data['all_blogs']=$this->blog_model->getAllBlogs();
        $this->load->view('includes/header');
        $this->load->view('pages/admin/manage_blogs',$data); 
        $this->load->view('includes/footer');
    }

    // add new Blog function
    public function addBlog(){
        extract($_POST);
        $data = $_POST;
        $count=0;
        $blogImage_Arr = array();    
        $blogVid_Arr = array();    
        $blogLink_Arr = array();    
        for ($i = 0; $i < count($_FILES['blog_image']['name']); $i++) {
            $count=$i+1;
            $imagePath = '';
            if (!empty(($_FILES['blog_image']['name'][$i]))) {
                if ($_FILES['blog_image']['size'][$i] > 10485760) {  
                //for prod images
                    echo '<div class="alert alert-warning alert-dismissible fade in alert-fixed"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Warning-</strong> Image no.'.$count.' size exceeds 10MB!</div>
                    <script>
                    window.setTimeout(function() {
                       $(".alert").fadeTo(500, 0).slideUp(500, function(){
                         $(this).remove(); 
                         });
                         }, 5000);
                         </script>
                         ';
                         die();
                     }
                     $extension = pathinfo($_FILES['blog_image']['name'][$i], PATHINFO_EXTENSION);

                     $_FILES['userFile']['name'] = $blog_title.'_0'.$blog_category.'_'.$i.'.' . $extension;
                     $_FILES['userFile']['type'] = $_FILES['blog_image']['type'][$i];
                     $_FILES['userFile']['tmp_name'] = $_FILES['blog_image']['tmp_name'][$i];
                     $_FILES['userFile']['error'] = $_FILES['blog_image']['error'][$i];
                     $_FILES['userFile']['size'] = $_FILES['blog_image']['size'][$i];

                     $uploadPath = 'assets/images/blogs/';  
                     $config['upload_path'] = $uploadPath;
                     $config['allowed_types'] = 'jpg|png|jpeg'; 
                //allowed types of images           
                     $config['overwrite'] = TRUE;
                     $this->load->library('upload', $config);  
                //load upload file config.
                     $this->upload->initialize($config);

                     if ($this->upload->do_upload('userFile')) {
                        $fileData = $this->upload->data();
                        $imagePath = 'assets/images/blogs/'.$fileData['file_name'];
                    }
                    else{

                        echo  $this->upload->display_errors('<div class="alert alert-warning alert-dismissible fade in alert-fixed"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Warning-</strong>', '</div>
                            <script>
                            window.setTimeout(function() {
                               $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                 $(this).remove(); 
                                 });
                                 }, 5000);
                                 </script>
                                 ');
                        die();
                    }
                }
                $blogImage_Arr[] = $imagePath;
            }

        // videos json arr
            if(!empty($blog_video)){
                foreach ($blog_video as $key) {
                    $blogVid_Arr[]=$key;
                }
                $data['blog_videos']=json_encode($blogVid_Arr);
            }else{
                $data['blog_videos']='';
            }

        // links josson array
            if(!empty($blog_link) && sizeof($blog_link)>0){
                foreach ($blog_link as $key) {
                    $blogLink_Arr[]=$key;
                }
                $data['blog_links']=json_encode($blogLink_Arr);
            }else{
                $data['blog_links']='';
            }

            $data['blog_images'] = json_encode($blogImage_Arr);

            $result = $this->blog_model->addBlog($data);
            if($result){
                echo '<div class="alert alert-success alert-dismissible fade in alert-fixed"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success-</strong> Portfolio was successfully added.</div>
                <script>
                window.setTimeout(function() {
                   $(".alert").fadeTo(500, 0).slideUp(500, function(){
                     $(this).remove(); 
                     });
                     window.location.reload();
                     }, 1000);
                     </script>';
                 }
                 else{
                    echo '<div class="alert alert-danger alert-dismissible fade in alert-fixed"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error-</strong> Portfolio was not added.</div>';
                } 
            }

    // edit blog function
            public function editBlog(){
                extract($_POST);
                $data = $_POST;
                $count=0;
                $blogVid_Arr = array();    
                $blogLink_Arr = array();    

        // videos json arr
                if(!empty($edit_blog_video)){
                    foreach ($edit_blog_video as $key) {
                        $blogVid_Arr[]=$key;
                    }
                    $data['blog_videos']=json_encode($blogVid_Arr);
                }else{
                    $data['blog_videos']='';
                }

        // links json array
                if(!empty($edit_blog_link) && sizeof($edit_blog_link)>0){
                    foreach ($edit_blog_link as $key) {
                        $blogLink_Arr[]=$key;
                    }
                    $data['blog_links']=json_encode($blogLink_Arr);
                }else{
                    $data['blog_links']='';
                }
        // print_r($data);die();
                $result = $this->blog_model->editBlog($data,$blog_id);
                if($result){
                    echo '<div class="alert alert-success alert-dismissible fade in alert-fixed"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success-</strong> Blog was successfully updated.</div>
                    <script>
                    window.setTimeout(function() {
                       $(".alert").fadeTo(500, 0).slideUp(500, function(){
                         $(this).remove(); 
                         });
                         window.location.reload();
                         }, 1000);
                         </script>
                         ';
                     }
                     else{
                        echo '<div class="alert alert-danger alert-dismissible fade in alert-fixed"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error-</strong> Perhaps you have not changed anything. Blog was not updated. </div>
                        <script>
                        window.setTimeout(function() {
                           $(".alert").fadeTo(500, 0).slideUp(500, function(){
                             $(this).remove(); 
                             });
                             }, 3000);
                             </script>
                             ';
                         } 
                     }

    // upload image in gallery blogs function
                     public function uploadImageBlog(){
                        extract($_POST);
                        $data = $_POST;        
                        $filepath = '';

                        $file_name = $_FILES['edit_blog_image']['name'];
                        if (!empty(($_FILES['edit_blog_image']['name']))) {
        //file validating---------------------------//
                            if ($_FILES['edit_blog_image']['size'] > 10485760) {  
                                echo '<div class="alert alert-warning alert-dismissible fade in alert-fixed"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Warning-</strong> Image size exceeds 10MB!</div>
                                <script>
                                window.setTimeout(function() {
                                   $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                     $(this).remove(); 
                                     });
                                     }, 5000);
                                     </script>
                                     ';
                                     die();
                                 }
                                 $i=$img_blog_count+1;
                                 $extension = pathinfo($_FILES['edit_blog_image']['name'], PATHINFO_EXTENSION);
                                 $_FILES['userFile']['name'] = $img_blog_name.'_0'.$img_blog_cat.'_'.time().'.'.$extension;
                                 $_FILES['userFile']['type'] = $_FILES['edit_blog_image']['type'];
                                 $_FILES['userFile']['tmp_name'] = $_FILES['edit_blog_image']['tmp_name'];
                                 $_FILES['userFile']['error'] = $_FILES['edit_blog_image']['error'];
                                 $_FILES['userFile']['size'] = $_FILES['edit_blog_image']['size'];

        $uploadPath = 'assets/images/blogs/';  //upload images in images/desktop/ folder

        $config['upload_path'] = $uploadPath;
        $config['overwrite'] = TRUE;
        $config['allowed_types'] = 'gif|jpg|png'; //allowed types of files
        $this->load->library('upload', $config);  //load upload file config.
        $this->upload->initialize($config);
        $image_path = '';

        if ($this->upload->do_upload('userFile')) {
            $fileData = $this->upload->data();
            $filepath = 'assets/images/blogs/'.$fileData['file_name'];
        }
        else{
           echo  $this->upload->display_errors('<div class="alert alert-warning alert-dismissible fade in alert-fixed"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Warning-</strong>', '</div>');
           die();
       }
   }

   $data['filepath'] = $filepath;
   $result = $this->blog_model->uploadImageBlog($data,$img_blog_id);

   if($result){
    echo '<div class="alert alert-success alert-dismissible fade in alert-fixed"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success-</strong> Image uploaded successfully.</div>
    <script>
    window.setTimeout(function() {
       $(".alert").fadeTo(500, 0).slideUp(500, function(){
         $(this).remove(); 
         });
         window.location.reload();
         }, 1000);
         </script>
         ';
     }
     else{
        echo '<div class="alert alert-danger alert-dismissible fade in alert-fixed"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error-</strong> Image was not uploaded. </div>
        <script>
        window.setTimeout(function() {
           $(".alert").fadeTo(500, 0).slideUp(500, function(){
             $(this).remove(); 
             });
             }, 5000);
             </script>
             ';
         } 
     }

    // function to delete portfolio
     public function removeBlog(){
        extract($_GET);
        if(isset($blog_id) && $blog_id!=''){
            $result = $this->blog_model->removeBlog($blog_id);

            if($result){
                echo '<div class="alert alert-success alert-dismissible fade in alert-fixed"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success-</strong> Blog post was successfully deleted.</div>';
            }
            else{
                echo '<div class="alert alert-danger alert-dismissible fade in alert-fixed"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error-</strong> Blog post was not deleted.</div>';
            } 
        }
        else{
            echo '<div class="alert alert-danger alert-dismissible fade in alert-fixed"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error-</strong> Blog post not found.</div>';
        } 
    }

    // function to delete portfolio image frim gallery
    public function removeImage(){
        extract($_GET);
        if(isset($blog_id) && $blog_id!=''){
            $result = $this->blog_model->removeImage($key,$blog_id);

            if($result['status']=='warning'){
                echo $result['message'];
                die();
            }
            if($result['status']=='success'){
                echo $result['message'];
            }
            else{
                echo $result['message'];
            } 
        }
        else{
            echo '<div class="alert alert-danger alert-dismissible fade in alert-fixed"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error-</strong> Blog Image not found.</div>
            <script>
            window.setTimeout(function() {
               $(".alert").fadeTo(500, 0).slideUp(500, function(){
                 $(this).remove(); 
                 });
                 }, 5000);
                 </script>
                 ';
             } 
         }

    // function to add more tag in blog
         public function addTag(){
            extract($_POST);
            // print_r($_POST);die();
            if(isset($tagblog_id) && $tagblog_id!=''){
                $result = $this->blog_model->addTag($tag_name,$tagblog_id);
                if($result['status']=='warning'){
                    echo $result['message'];
                    die();
                }
                if($result['status']=='success'){
                    echo $result['message'];
                }
                else{
                    echo $result['message'];
                } 
            }
            else{
                echo '<div class="alert alert-danger alert-dismissible fade in alert-fixed"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error-</strong> Blog not found.</div>
                <script>
                window.setTimeout(function() {
                   $(".alert").fadeTo(500, 0).slideUp(500, function(){
                     $(this).remove(); 
                     });
                     }, 5000);
                     </script>
                     ';
                 } 
             }

    // function to delete more tag in blog
         public function removeTag(){
            extract($_GET);
            if(isset($blog_id) && $blog_id!=''){
                $result = $this->blog_model->removeTag($key,$blog_id);

                if($result['status']=='warning'){
                    echo $result['message'];
                    die();
                }
                if($result['status']=='success'){
                    echo $result['message'];
                }
                else{
                    echo $result['message'];
                } 
            }
            else{
                echo '<div class="alert alert-danger alert-dismissible fade in alert-fixed"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error-</strong> Blog not found.</div>
                <script>
                window.setTimeout(function() {
                   $(".alert").fadeTo(500, 0).slideUp(500, function(){
                     $(this).remove(); 
                     });
                     }, 5000);
                     </script>
                     ';
                 } 
             }


    // function to redirect page to selected blog
             public function blog($url=''){
                $blog_id=base64_decode($url);
                $data['all_categories']=$this->blog_model->getAllCategories();
                $data['category_count']=$this->blog_model->getCategoriesCount();
                $data['allTags']=$this->blog_model->getAllTags();
                $data['blogDetail']=$this->blog_model->getBlogDetail($blog_id);
                $this->load->view('includes/header');
                $this->load->view('pages/admin/blog',$data); 
                $this->load->view('includes/footer');
            }
        }