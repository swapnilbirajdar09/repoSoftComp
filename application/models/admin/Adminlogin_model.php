<?php

class Adminlogin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // login function to authenticate user
    public function adminlogin($login_username, $login_password) {
        //---get admin details
        $login_passwordNew = base64_encode($login_password);
        $sql = "SELECT * FROM user_tab";
        $result = $this->db->query($sql);
        $username = '';
        $password = '';
        $user_id = '';
        $user_role = '';
        $role_name = '';
        if ($result->num_rows() <= 0) {
            return false;
        } else {
            foreach ($result->result_array() as $key) {
                $user_id = $key['user_id'];
                $username = $key['user_name'];
                $password = $key['user_passwd'];
                $user_role = $key['role_id'];
            }
        }

        if ($login_username != $username) {
            echo '<p class="w3-red w3-padding-small">Invalid Key passed for username!</p>';
        }
        if ($login_passwordNew != $password) {
            echo '<p class="w3-red w3-padding-small">Invalid Key passed for password!</p>';
        }

        // check post values with db values
        if ($login_username == $username && $login_passwordNew == $password) {
            $response = array(
                'status' => 200,
                'user_id' => $user_id,
                'role' => $user_role
            );
        } else {
            $response = array(
                'status' => 500
            );
        }
        return $response;
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

    public function getAdminInfo($forget_email) {
        //extract($data);
        //echo $forget_email;
        //die();
        $query = "SELECT * FROM user_tab WHERE user_email='$forget_email'";
        //echo $query;        die();
        $result = $this->db->query($query);

        if ($result->num_rows() <= 0) {
            $response = array(
                'status' => 412,
                'status_message' => 'Email ID not registered.!'
            );
        } else {
            $password = '';
            foreach ($result->result_array() as $row) {
                $password = base64_decode($row['user_passwd']);
            }
            //echo $password . '' . $forget_email;
            // die();
            $emailSend = Adminlogin_model::sendPasswordByMail($forget_email, $password);
            
            if ($emailSend['status'] == 200) {
                $response = array(
                    'status' => 200,
                    'status_message' => 'Password has been sent to your Email ID.'
                );
            } else {
                $response = array(
                    'status' => 500,
                    'status_message' => 'Email Error. Password sending failed.'
                );
            }
        }
        return $response;
    }

    // -----------------------PASSWORD EMAIL MODEL----------------------//
    public function sendPasswordByMail($email_id, $password) {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mx1.hostinger.in',
            'smtp_port' => '587',
            'smtp_user' => 'support@jumlakuwait.com', // change it to yours
            'smtp_pass' => 'Descartes@1990', // change it to yours
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );
        $config['smtp_crypto'] = 'tls';
        //return ($config);die();

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('support@jumlakuwait.com', "Admin Team");
        $this->email->to($email_id);
        $this->email->subject("Password Request");
        $this->email->message('<html>
        <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
        <body>
        <div class="container col-lg-8" style="box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;margin:10px; font-family:Candara;">
        <h2 style="color:blue; font-size:25px">Password for Software Company!</h2>
        <h3 style="font-size:15px;">Hello User,<br></h3>
        <h3 style="font-size:15px;">We have recieved a request to have your password for Software Company Admin Login.</h3>
        <h3 style="font-size:15px;">Following is the requested password for ' . $email_id . '</h3>
        <h3>Password: ' . $password . '</h3>
        <br><br>
        <h5>Note: If you did not make this request, then kindly ignore this message.</h5>
        <div class="col-lg-12">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
        </div>
        </body></html>');
//print_r($this->email->print_debugger());die();
        if ($this->email->send()) {
            $response = array(
                'status' => 200, //---------email sending succesfully 
                'status_message' => 'Email Sent Successfully.',
            );
        } else {
            //print_r($this->email->print_debugger());die();
            $response = array(
                'status' => 500, //---------email send failed
                'status_message' => 'Email Sending Failed.'
            );
        }
        return $response;
    }

}
