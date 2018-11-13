<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class All_users extends CI_Controller {

    // Login controller
    public function __construct() {
        parent::__construct();

        // load common model
        $this->load->model('admin/Allusers_model');
        $this->load->helper('file');
        $this->load->helper('url');
        $this->load->helper('download');
    }

    // main index function
    public function index() {
        // start session		
      
       if(isset($_GET['search_byID']) || isset($_GET['search_byName']) || isset($_GET['valid']) && $_GET['valid']=='true'){
      extract($_GET);
      //echo "check if";
            $data['all_users'] = $this->Allusers_model->filtermember($_GET['search_byID'],$_GET['search_byName'],$sortbyGender); //------------fun for get all users on filter search
        }
        else{
              //echo "check else";
           $data['all_users'] = $this->Allusers_model->getAllUsers();
        }
          
          // print_r($data);die();
           $this->load->view('includes/header');
        $this->load->view('pages/admin/all_users',$data);
         $this->load->view('includes/footer');
    }

  

   //-----------------fun for Delete user details------------------------------------------//

    public function deleteUserDetails() {
        extract($_POST);
        $result = $this->Allusers_model->deleteUserDetails($user_id);
        //print_r($result);die();
        if ($result == 200) {
    
            echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Success!</strong> Member Details Deleted SuccessFully.
      </div>
      <script>
      window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove();
      });
      }, 5000);
      location.reload();

      </script>';
        } else {

            echo '<div class="alert alert-danger alert-dismissible fade in alert-fixed w3-round">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Warning!</strong> Member Details Not Deleted SuccessFully.
      </div>
      <script>
      window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
      });
      }, 5000);
      </script>';
        }
    }

    //------------fun for activate user-----------------------//
      public function activeuser() {
        extract($_POST);
        $result = $this->Allusers_model->activeuser($user_id);
        //print_r($result);die();
        if ($result['status'] == 200) {
                echo "check if";
            echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Success!</strong> Member active  SuccessFully.
      </div>
      <script>
      window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove();
      });
      }, 5000);
      location.reload();

      </script>';
        } else {
           echo "check else";
            echo '<div class="alert alert-danger alert-dismissible fade in alert-fixed w3-round">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Warning!</strong> Member active Not Deleted SuccessFully.
      </div>
      <script>
      window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
      });
      }, 5000);
      </script>';
        }
    }

    //------------fun for deactivate user-----------------------//
      public function deactiveuser() {
        extract($_POST);
        $result = $this->Allusers_model->deactiveuser($user_id);
        //print_r($result);die();
        if ($result['status'] == 200) {
               // echo "check if";
            echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Success!</strong> Member deactive  SuccessFully.
      </div>
      <script>
      window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove();
      });
      }, 5000);
      location.reload();

      </script>';
        } else {
          // echo "check else";
            echo '<div class="alert alert-danger alert-dismissible fade in alert-fixed w3-round">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Warning!</strong> Member deactive Not Deleted SuccessFully.
      </div>
      <script>
      window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
      });
      }, 5000);
      </script>';
        }
    }
//---------function for view user -------------//
       public function viewuser() {
        $response = $this->Allusers_model->viewuser();
        return $response;
    }

    //---------function for filter user -------------//
       public function filtermember() {
        $response = $this->Allusers_model->filtermember();
        return $response;
    }

    //-------download user list csv
    public function downloadAllUsers() {
        extract($_GET);
        $result = $this->Allusers_model->downloadAllUsers();
        //print_r(json_encode($result));
        $filename = 'All_User_list_' . date('Y-m-d') . '.csv';
        header("Content-Type: application/csv; ");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
// get data 
        $usersData = $result;
// file creation 
        $file = fopen('php://output', 'w');
        $header = array("Profile ID","Full Name", "Gender", "Registration Date", "City", "Marital Status");
        fputcsv($file, $header);
        if ($result) {
            foreach ($usersData as $key => $line) {
                fputcsv($file, $line);
            }
        } else {
            fputcsv($file, array('------------No data available-----------'));
        }
        fclose($file);
        //force_download($file);
        exit;
    }
  // -----------------------------code to download profile in pdf format
  public function DownloadPdf(){

    // fetch data from db
  //  $this->load->model('admin');
   $result = $this->Allusers_model->getAllUsers();
    //print_r($result);die();
    $this->load->library('Pdf');
    // create new PDF document
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    // $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Bizmo Technologies');
    $pdf->SetTitle('Member Profile');
    $pdf->SetSubject('Member Metromanial Profile');
    $pdf->SetKeywords('MEA, Dakshata Wagh, Bizmo Technologies, Ranjeet Wagh');

    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
      require_once(dirname(__FILE__).'/lang/eng.php');
      $pdf->setLanguageArray($l);
    }

    // ---------------------------------------------------------

    // set font
    $pdf->SetFont('helvetica', '', 12);

    // add a page
    $pdf->AddPage();
     $fullname='';
     $dob='';
     $marrital_status='';
    $height='';
    $weight='';
    $bgroup='';
    $education_field ='';
    $occupation_type ='';
    $company_name ='';
     $Monthly_income ='';
     $annual_income ='';
     $father_name='';
     $father_occupation ='';
     $mother_name='';
     $mother_occupation='';
     $country='';
     $state='';
     $city='';
     $address='';
     $number1='';
     $number2='';
     $diet='';
     $drink='';
     $smoke='';
     $living_with='';
     $expections='';
    foreach($result['status_message'] as $row){
    // print_r($row);die();
      $fullname = $row['user_fullname'];
      $dob = $row['user_dob'];
      $marrital_status = $row['user_marital_status'];
      $height =$row['user_height'];
      $weight =$row['user_weight'];
      $bgroup =$row['user_blood_grp'];
      $education_field =$row['user_educational_field'];
      $occupation_type =$row['user_occupation_type'];
      $company_name=$row['user_company_name'];
      $Monthly_income =$row['user_monthly_income'];
      $annual_income=$row['user_annual_income'];
      $father_name =$row['user_father_name'];
      $father_occupation =$row['user_father_occupation'];
      $mother_name =$row['user_mother_name'];
      $mother_occupation =$row['user_mother_occupation'];
      $country =$row['user_country'];
      $state =$row['user_state'];
      $city =$row['user_city'];
      $address =$row['user_residential_address'];
      $number1 =$row['user_contact_no1'];
      $number2 =$row['user_contact_no2'];
      $diet =$row['user_diet'];
      $drink=$row['user_drink'];
      $smoke =$row['user_smoke'];
      $living_with =$row['user_living_with'];
      $expections =$row['user_partner_expections'];

     
    
    // Set some content to print
    $html = 
    '<h3>User Profile:</h3>
    <p>
    <label>Full Name:</label> <span>'.$fullname.'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Date Of Birth:</label> <span>'.$dob.'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Marital status:<span>'.$marrital_status.'</span>
   </p>
   <p>
    <label>Height:</label> <span>'.$height.'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Weight:</label> <span>'.$weight.'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <label>Blood Group:</label> <span>'.$bgroup.'</span>
    </p>
    <p>
    <label>Educational Field:</label> <span>'.$education_field.'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Occupation Type:</label> <span>'.$occupation_type.'</span>
    </p>
    <p>
   <label>Company Name:</label> <span>'.$company_name.'</span>
    </p>
    ';
 } 
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    // column titles
    $header = array('Sr.no', 'Member Name', 'Count', 'Mobile No.' , 'Gender' , 'Time');

    // Colors, line width and bold font
    $pdf->SetFillColor(255, 0, 0);
    $pdf->SetTextColor(255);
    $pdf->SetDrawColor(128, 0, 0);
    $pdf->SetLineWidth(0.3);
    $pdf->SetFont('', 'B');
    // Header
    $w = array(15, 70, 15, 35, 25, 25);
    $num_headers = count($header);
    // for($i = 0; $i < $num_headers; ++$i) {
    //   $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
    // }
    $pdf->Ln();
    // Color and font restoration
    $pdf->SetFillColor(224, 235, 255);
    $pdf->SetTextColor(0);
    $pdf->SetFont('');
    // Data
    $fill = 0;
    $count=1;
  //   if($result['status']=='500'){
  //     //print_r($row);
  //     $pdf->Cell($w[0], 6, 'N/A', 'LR', 0, 'C', $fill);
  //     $pdf->Cell($w[1], 6, 'N/A', 'LR', 0, 'C', $fill);
  //     $pdf->Cell($w[2], 6, 'N/A', 'LR', 0, 'C', $fill);
  //     $pdf->Cell($w[3], 6, 'N/A', 'LR', 0, 'C', $fill);
  //     $pdf->Cell($w[4], 6, 'N/A', 'LR', 0, 'C', $fill);
  //     $pdf->Cell($w[5], 6, 'N/A', 'LR', 0, 'C', $fill);
  //     $pdf->Ln();
  //     $fill=!$fill;
  //   }
  //   else{
  //     foreach($result['status_message'] as $row) {
  //       $valid_date = date( 'd M, Y', strtotime($row['dated']));
  //       $valid_time = date( 'h:i a', strtotime($row['time']));
  
  // //now do borders and fill
  // //cell height is 6 times the max number of cells
  //       $pdf->Cell($w[0],6,$count.'.','LR', 0, 'C', $fill);
  //       $pdf->Cell($w[1],6,$row['member_name'],'LR', 0, 'C', $fill);
  //       $pdf->Cell($w[2],6,$row['accomp_count'],'LR', 0, 'C', $fill);
  //       $pdf->Cell($w[3],6,$row['mobile_no'],'LR', 0, 'C', $fill);
  //       $pdf->Cell($w[4],6,$row['gender'],'LR', 0, 'C', $fill);
  //       $pdf->Cell($w[5],6,$valid_time,'LR', 0, 'C', $fill);

  //       $pdf->Ln();
  //     //print_r($row);
        
  //       $fill=!$fill;

  //       $count++;
  //     } 
  //   }
    
    $pdf->Cell(array_sum($w), 0, '', 'T');
    // ---------------------------------------------------------

    // close and output PDF document
    
    $tarikh = date('Ydm h:i:s a', time());
    $pdf->Output('MEAEventList_'.$tarikh.'.pdf', 'I');
   }
  // --------------------------------------download pdf file code ends
}