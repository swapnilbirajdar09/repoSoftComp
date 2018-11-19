<?php

class Setting_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //-------UPDATE ADMIN EMAIL FUNCTION--------------//
    public function updateEmail($email) {

        $sql = "UPDATE user_tab SET user_email='$email' WHERE user_id='1'";

        if ($this->db->query($sql)) {
            return true;
        } else {
            return false;
        }
        return $response;
    }

    //-------UPDATE ADMIN username FUNCTION--------------//
    public function updateUname($uname) {

        $sql = "UPDATE user_tab SET user_name='$uname' WHERE user_id='1'";

        if ($this->db->query($sql)) {
            return true;
        } else {
            return false;
        }
        return $response;
    }

    //-------UPDATE ADMIN PASSWORD FUNCTION--------------//
    public function updatePass($upass) {
        $password = base64_encode($upass);
        $sql = "UPDATE user_tab SET user_passwd='$password' WHERE user_id='1'";

        if ($this->db->query($sql)) {
            return true;
        } else {
            return false;
        }
        return $response;
    }

    //----------function to get all admin details-------//
    public function getAlladmin_details() {
        $sql = "SELECT * FROM user_tab";
        //echo $sql; die();
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return 500;
        } else {
            return $result->result_array();
        }
    }

//-------INSERT COMPANY DETAILS FUNCTION--------------//
    public function add_companyProfile($c_profile = array()) {
        $company_name = $c_profile['company_name'];
        $company_logo = $c_profile['company_logo'];
        $company_email = $c_profile['company_email'];
        //   $office_details = $c_profile['office_details'];       
        $sql = " UPDATE company_tab SET company_name='$company_name',company_logo='$company_logo',company_email='$company_email' WHERE company_id='1'";
        if ($this->db->query($sql)) {
            return true;
        } else {
            return false;
        }
        return $response;
    }

    //----------function to get all Company details-------//
    public function getAllcompany_details() {
        $sql = "SELECT * FROM company_tab";
        //echo $sql; die();
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return 500;
        } else {
            return $result->result_array();
        }
    }

    //-------update COMPANY address FUNCTION--------------//
    public function add_officeaddress($office_details) {
        $sqlselect = "SELECT * FROM company_tab WHERE company_id='1'";
        $resultnew = $this->db->query($sqlselect);
        if ($resultnew) {
            // return true;
            $office_newdetails = '';
            foreach ($resultnew->result_array() as $key) {

                $office_newdetails = json_decode($key['office_details']);
            }
            if ($office_newdetails != '' && $office_newdetails != '[]') {
                array_push($office_newdetails, $office_details);
            } else {
                $office_newdetails[] = $office_details;
            }
        }

        $jsonVal = json_encode($office_newdetails);
        //print_r($office_newdetails);die();
        $sql = " UPDATE company_tab SET office_details='$jsonVal' WHERE company_id='1'";
        if ($this->db->query($sql)) {
            return true;
        } else {
            return false;
        }
        //return $response;
    }

    public function remove_officedetails($key) {
        //echo $key;die();
        $sqlselect = "SELECT * FROM company_tab WHERE company_id='1'";
        $resultnew = $this->db->query($sqlselect);
        if ($resultnew) {
            // return true;
            $office_newdetails = '';
            foreach ($resultnew->result_array() as $row) {

                $office_newdetails = json_decode($row['office_details'], true);
            }
            //print_r($office_newdetails[1]);die();

            unset($office_newdetails[$key]);

            $json = json_encode($office_newdetails);
            $sql = " UPDATE company_tab SET office_details='$json' WHERE company_id='1'";
            if ($this->db->query($sql)) {
                return true;
            } else {
                return false;
            }
        }
    }

}
