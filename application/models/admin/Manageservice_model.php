<?php

class Manageservice_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function addServices($data) {
        extract($data);

        $sql = "INSERT INTO service_tab(service_name,service_description,service_image,is_featured)"
                . "VALUES ('" . addslashes($service_name) . "','" . addslashes($serviceDescription) . "',"
                . "'$imagePath','0')";
        //print_r($sql);die();
        $result = $this->db->query($sql);
        if ($result) {
            return 200;
        } else {
            return 500;
        }
    }

    public function getAllServices() {
        $sql = "SELECT * FROM service_tab";
        $result = $this->db->query($sql);
        if ($result->num_rows() <= 0) {
            return 500;
        } else {
            return $result->result_array();
        }
    }

    public function updateServiceDetails($data) {
        extract($data);
        //print_r($data);die();
        $sql = "UPDATE service_tab SET service_image='$imagePath',service_name = '$service_name',service_description = '$serviceDescription' WHERE service_id = '$service_id'";
        // echo $sql; die();
        $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return 200;
        } else {
            return 500;
        }
    }

    public function deleteServiceDetails($service_id) {
        //extract($data);
        //print_r($data);die();
        $sql = "DELETE FROM service_tab WHERE service_id = '$service_id'";
        // echo $sql; die();
        $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return 200;
        } else {
            return 500;
        }
    }

    public function featuredService($service_id) {
        //extract($data);
        //print_r($data);die();
        $sql = "UPDATE service_tab SET is_featured = '1' WHERE service_id = '$service_id'";
        // echo $sql; die();
        $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return 200;
        } else {
            return 500;
        }
    }

    public function unFeaturedService($service_id) {
        $sql = "UPDATE service_tab SET is_featured = '0' WHERE service_id = '$service_id'";
        // echo $sql; die();
        $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            return 200;
        } else {
            return 500;
        }
    }

}
