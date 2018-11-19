<?php

class Careers_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function applyJob($data) {
//print_r($data);die();
        extract($data);

        $exist = Careers_model::checkEmailExist($candidate_email, $job_id);
       // print_r($exist);die();
        if ($exist == 0) {
            $sql = "INSERT INTO candidate_tab(candidate_name,application_message,candidate_email,"
                    . "candidate_mobile,candidate_cv,applied_job, application_status,applied_date)"
                    . "VALUES ('" . addslashes($candidateName) . "','" . addslashes($message) . "',"
                    . "'$candidate_email','$candidate_phone','$imagePath',"
                    . "'$job_id','1',now())";
//print_r($sql);die();
            $result = $this->db->query($sql);
            if ($result) {
                return 200;
            } else {
                return 500;
            }
        } else {
            return 700;
        }
    }

    public function checkEmailExist($candidate_email, $job_id) {
        $query = null;
// ------------ check email exist 
        $query = $this->db->get_where('candidate_tab', array(//making selection
            'candidate_email' => $candidate_email,
            'applied_job' => $job_id
        ));

        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

}
