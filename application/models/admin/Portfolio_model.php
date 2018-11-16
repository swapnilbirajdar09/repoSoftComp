<?php

class Portfolio_model extends CI_Model {

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

    //----------------function to get all portfolios
    public function getAllPortfolios() {
        $sql = "SELECT * FROM portfolio_tab,category_tab WHERE portfolio_tab.portfolio_category=category_tab.cat_id";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return false;
        } else {
            return $result->result_array();
        }
    }

    //----------------function to get selected portfolio details
    public function getPortfolioDetail($portfolio_id) {
        $sql = "SELECT * FROM portfolio_tab WHERE portfolio_id='$portfolio_id'";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return false;
        } else {
            return $result->result_array();
        }
    }

    // add new portfolio function
    public function addPortfolio($data){
        extract($data);
        $insert_data = array(
            'portfolio_name' => $portfolio_name,
            'portfolio_category' => $portfolio_category,
            'client_name' => $client_name,
            'portfolio_description' => $portfolio_description,
            'portfolio_images' => $port_images,
            'portfolio_videos' => $port_videos,
            'portfolio_link' => $port_links
        );
        // print_r($insert_data);die();
        $this->db->insert('portfolio_tab',$insert_data);
        if($this->db->affected_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }

    // delete the selected portfolio
    public function removePortfolio($portfolio_id){
        $sql = "DELETE FROM portfolio_tab WHERE portfolio_id='$portfolio_id'";
        $result = $this->db->query($sql);
        if($this->db->affected_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }

    // function to mark portfolio as featured
    public function markPortfolio($portfolio_id) {
        $sql = "UPDATE portfolio_tab SET is_featured='1' WHERE portfolio_id='$portfolio_id'";
        $result = $this->db->query($sql);
        if ($this->db->affected_rows()>0) {
            return true;
        } else {
            return false;
        }
    }

    // function to unmark portfolio as featured
    public function unmarkPortfolio($portfolio_id) {
        $sql = "UPDATE portfolio_tab SET is_featured='0' WHERE portfolio_id='$portfolio_id'";
        $result = $this->db->query($sql);
        if ($this->db->affected_rows()>0) {
            return true;
        } else {
            return false;
        }
    }

}
