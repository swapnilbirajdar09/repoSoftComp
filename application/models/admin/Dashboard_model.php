<?php

class Dashboard_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

//------get all statistics records--------------//
    public function getAllStatistics() {
        $sql1 = "SELECT * FROM user_tab WHERE user_status=1";
        $result1 = $this->db->query($sql1);
        $totcount=$result1->num_rows();

        $sql2 = "SELECT * FROM user_tab WHERE user_gender='Male'";
        $result2 = $this->db->query($sql2);
        $malecount=$result2->num_rows();

        $sql3 = "SELECT * FROM user_tab WHERE user_gender='Female'";
        $result3 = $this->db->query($sql3);
        $femalecount=$result3->num_rows();

        $response=array(
            'total_mem' => $totcount,
            'male_count' => $malecount,
            'female_count' => $femalecount
        );
        return $response;
    }

// get all membership[ packages]
    public function getAllPackages(){
        $sql = "SELECT * FROM package_tab WHERE package_status=1";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return false;
        } else {
            return $result->result_array();
        }
    }

    // get membership package details
    public function getPackageDetail($id){
        $sql = "SELECT * FROM package_tab WHERE package_id='$id'";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return false;
        } else {
            return $result->result_array();
        }
    }


    //------add new package--------------//
    public function addNewPackage($data) {
        extract($data);
        $result = array(
            'package_title' => $pkg_name,
            'package_price' => $pkg_price,
            'package_validity' => $pkg_validity,
            'package_period' => $pkg_period,
            'package_benefits' => $benefitAddedField,
            'package_status' => '1'
        );

        // $sql = $this->db->set($result)->get_compiled_insert('package_tab'); // to check the query by echoing
        if($this->db->insert('package_tab', $result)){
            return true;
        }else{
            return false;
        }
    }

    //------delete package--------------//
    public function delPackage($id) {        
        if($this->db->delete('package_tab', array('package_id' => $id))){
            return true;
        }else{
            return false;
        }
    }

    // edit package changes
    public function editPackageChanges($data){
        extract($data);

        $result = array(
            'package_title' => $pkg_name,
            'package_price' => $pkg_price,
            'package_period' => $pkg_period,
            'package_validity' => $pkg_validity,
            'package_benefits' => $benefitAddedField
        );

        $this->db->where('package_id', $pkg_id);
        $this->db->update('package_tab', $result);

        if($this->db->affected_rows()==1){
            return true;
        }
        else{
            return false;
        }
    }
}
