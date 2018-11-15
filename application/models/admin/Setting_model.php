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

        $sql = "UPDATE user_tab SET user_passwd='$upass' WHERE user_id='1'";

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
}