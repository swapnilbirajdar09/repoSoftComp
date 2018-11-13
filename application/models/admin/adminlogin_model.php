<?php

class adminlogin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // login function to authenticate user
    public function adminlogin($username, $password) {

     
        //---get admin details
        $sql = "SELECT * FROM admin_tab";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return false;
        } else {
            $Admin_username = '';
            $Admin_password = '';
            foreach ($result->result_array() as $key) {
                $Admin_username = $key['username'];
                $Admin_password = $key['password'];
            }
        }

        if ($Admin_username != $username) {
            echo '<p class="w3-red w3-padding-small">Invalid Key passed for username!</p>';
        }
        if ($Admin_password != $password) {
            echo '<p class="w3-red w3-padding-small">Invalid Key passed for password!</p>';
        }

        // check post values with db values
        if ($Admin_username == $username && $Admin_password == $password) {
            return TRUE;
        } else {
            return FALSE;
        }

    }

    // -----------------------GET ADMIN DETAILS----------------------//
    //-------------------------------------------------------------//
    public function getAdminDetails($name) {

        $query = "SELECT * FROM admin_details WHERE name='$name'";
        //echo $query;die();
        $result = $this->db->query($query);

        // handle db error
        if (!$result) {
            // Has keys 'code' and 'message'
            $error = $this->db->error();
            return $error;
            die();
        }

        // if no db errors
        if ($result->num_rows() <= 0) {
            return false;
        } else {
            $value = '';
            foreach ($result->result_array() as $key) {
                $value = $key['value'];
            }
            return $value;
        }
    }

        public function getAdminEmail() {
        $query = "SELECT * FROM `admin_tab` where admin_email = 'email'";
        //echo $query;die();
        $result = $this->db->query($query);

        // if no db errors
        if ($result->num_rows() <= 0) {
            return false;
        } else {
            $value = '';
            foreach ($result->result_array() as $key) {
                $value = $key['value'];
            }
            return $value;
        }
    }

    public function getAdminPassword() {
        $query = "SELECT * FROM `admin_tab` where password= 'password'";
        //echo $query;die();
        $result = $this->db->query($query);

        // if no db errors
        if ($result->num_rows() <= 0) {
            return false;
        } else {
            $value = '';
            foreach ($result->result_array() as $key) {
                $value = $key['value'];
            }
            return $value;
        }
    }

}
