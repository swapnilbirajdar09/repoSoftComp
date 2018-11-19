<?php

class Blog_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //----------------function to get all categories
    public function getAllCategories() {
        $sql = "SELECT * FROM category_tab";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return false;
        } else {
            return $result->result_array();
        }
    }

    //----------------function to get all tags
    public function getAllTags() {
        $sql = "SELECT * FROM tags_tab";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return false;
        } else {
            return $result->result_array();
        }
    }

    //----------------function to get all blog
    public function getAllBlogs() {
        $sql = "SELECT * FROM blogs_tab,category_tab WHERE blogs_tab.blog_category=category_tab.cat_id ORDER BY posted_date DESC";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return false;
        } else {
            return $result->result_array();
        }
    }

    //----------------function to get selected blog details
    public function getBlogDetail($blog_id) {
        $sql = "SELECT * FROM blogs_tab,category_tab WHERE blogs_tab.blog_category=category_tab.cat_id AND blog_id='$blog_id'";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return false;
        } else {
            return $result->result_array();
        }
    }

    // add new blog function
    public function addBlog($data){
        extract($data);
        $insert_data = array(
            'blog_title' => $blog_title,
            'blog_category' => $blog_category,
            'blog_message' => $blog_message,
            'blog_tags' => $tagAdded_field,
            'blog_images' => $blog_images,
            'blog_videos' => $blog_videos,
            'blog_links' => $blog_links,
            'posted_date' => date('Y-m-d')
        );
        // print_r($insert_data);die();
        $this->db->insert('blogs_tab',$insert_data);
        if($this->db->affected_rows()>0){
            foreach (json_decode($tagAdded_field) as $key) {
                // print_r($key);
                $this->db->where('tag_value',$key);
                $q = $this->db->get('tags_tab');
                if ( $q->num_rows() == 0 ) 
                {
                    $insert_tag = array(
                        'tag_value' => $key
                    );
                    $this->db->insert('tags_tab',$insert_tag);
                } 
            }
            return true;
        }
        else{
            return false;
        }
    }

    // update blog function
    public function editBlog($data,$blog_id){
        extract($data);
        $result = array(
            'blog_title' => $edit_blog_title,
            'blog_category' => $edit_blog_category,
            'blog_message' => $edit_blog_message,
            'blog_tags' => $edit_tagAdded_field,
            'blog_videos' => $edit_blog_videos,
            'blog_links' => $edit_blog_links
        );

        $this->db->where('blog_id', $blog_id);
        $this->db->update('blogs_tab', $result);
        if($this->db->affected_rows()==1){
            foreach (json_decode($edit_tagAdded_field) as $key) {
                // print_r($key);
                $this->db->where('tag_value',$key);
                $q = $this->db->get('tags_tab');
                if ( $q->num_rows() == 0 ) 
                {
                    $insert_tag = array(
                        'tag_value' => $key
                    );
                    $this->db->insert('tags_tab',$insert_tag);
                } 
            }
            return true;
        }
        else{
            return false;
        }
    }

    // upload blog image
    public function uploadImageBlog($data,$blog_id){
        extract($data);
        $currentImages='';
        $sql = "SELECT blog_images FROM blogs_tab WHERE blog_id='$blog_id'";
        $result_arr = $this->db->query($sql);
        foreach ($result_arr->result_array() as $key) {
            $currentImages = $key['blog_images'];
        }

        $imgArr=json_decode($currentImages);
        array_push($imgArr,$filepath);

        $result = array(
            'blog_images' => json_encode($imgArr)
        );

        $this->db->where('blog_id', $blog_id);
        $this->db->update('blogs_tab', $result);
        if($this->db->affected_rows()==1){
            return true;
        }
        else{
            return false;
        }
    }

    // delete the selected blog
    public function removeBlog($blog_id){
        $sql = "DELETE FROM blogs_tab WHERE blog_id='$blog_id'";
        $result = $this->db->query($sql);
        if($this->db->affected_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }

    // delete the selected blog image from gallery
    public function removeImage($key,$blog_id){
        $sql = "SELECT blog_images FROM blogs_tab WHERE blog_id='$blog_id'";
        $result_arr = $this->db->query($sql);
        foreach ($result_arr->result_array() as $row) {
            $currentImages = $row['blog_images'];
        }

        $imgArr=json_decode($currentImages);
        if(count($imgArr)==1){
            $response=array(
                'status'    =>  'false',
                'message'   =>  '<div class="alert alert-danger alert-dismissible fade in alert-fixed"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error-</strong> Cannot remove Image. Atleast one image should be uploaded.</div>'
            );
            return $response;
            die();
        }
        // unset key value
        unset($imgArr[$key]);
        $imgArr = array_values($imgArr);
        $result = array(
            'blog_images' => json_encode($imgArr)
        );

        $this->db->where('blog_id', $blog_id);
        $this->db->update('blogs_tab', $result);
        if($this->db->affected_rows()==1){
            $response=array(
                'status'    =>  'success',
                'message'   =>  '<div class="alert alert-success alert-dismissible fade in alert-fixed"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success-</strong> Image was successfully deleted.</div>'
            );
            return $response;
        }
        else{
            $response=array(
                'status'    =>  'failure',
                'message'   =>  '<div class="alert alert-danger alert-dismissible fade in alert-fixed"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error-</strong> Image was not deleted.</div>'
            );
            return $response;
        }
    }

}
