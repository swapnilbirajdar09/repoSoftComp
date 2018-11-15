
  <title>Softcomp | Dashboard</title>
  <!-- page content -->
  <!--  -->
  <div class="right_col" role="main" >
   <div class="w3-row">
    <div id="msgdiv"></div>
     <!-- add category div start -->
      <div class="w3-col l3 w3-padding-small" ng-app="CatApp" ng-controller="CatController">
        <div class="w3-col l12 w3-white w3-round w3-padding theme_text">
          <h4 class="theme_text"><i class="fa fa-database"></i> All Categories:</h4>

          <div id="skill" class="w3-col l12 w3-margin-top" >
            <form ng-submit="submit()" method="POST">
              <div class="input-group">
              <input type="text" name="catname" id="catname" ng-model="catname" class="w3-input" placeholder="Enter Category Here" required>
                <div class="input-group-btn">
                  <button class="btn w3-button theme_bg" id="addCatBtn" type="submit">
                    <i class="fa fa-plus"></i>
                  </button>
                </div>
              </div>
              
              <div class="w3-text-red w3-col l12" id="errCategoryMsg">
              </div>
            </form>
          </div>

          <div class="w3-col l12 w3-padding-small" id="allCategoryDiv">
            <div class="w3-col l12 w3-border" style="height: 325px;overflow-y: auto;">
              <ul style="list-style: none;padding: 0">
             <li class=" w3-padding">
                <div class="w3-row">

                  <div class="col-lg-10 col-xs-10 col-md-10 w3-padding" ng-repeat='skill in skills'>
                          <span>{{skill.cat_name}} </span>
                          <a type="btn" ng-click="delskill(skill.cat_id)" class="w3-right" ><i class="fa fa-times w3-text-black"></i>
                          </a>
                      </div>
             
                </div>
              </li>
        
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- add Technology div start -->
    <div class="w3-col l9 w3-padding-small">

      <div class="w3-col l12 w3-white w3-round w3-padding theme_text">
        <h4 class="theme_text"><i class="fa fa-first-order"></i> All Technology:</h4>

        <div class="w3-col l6 w3-margin-top">
          <form id="addtechnologyForm" action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="_token" value="">
            <div class="w3-col l12">
              <div class="w3-col l12">
                <div class="col-lg-6 col-xs-12 col-sm-12 w3-margin-bottom">
                  <label>Technology Name:</label>
                  <input type="text" name="technology_name" class="w3-input" placeholder="Enter Technology name" required>
                </div>
                
                <div class="col-lg-6 w3-margin-bottom">
                  <label>Technology Logo:</label>
                  <input type="file" name="logo_image" onchange="" id="logo_image" class="w3-input" style="padding: 5px 2px 5px 5px" required>
                  <div id="image_error" class="w3-text-red"></div>
                </div>
              </div>
              <div class="col-lg-12 w3-center" id="btnsubmit">
                <button class="btn w3-button theme_bg" id="addtechnologybtn" type="submit"><i class="fa fa-plus"></i> Add Technology</button>
              </div>
            </div>

          </form>
          <div id="formOutput" class="w3-margin"></div>
        </div>

        <div class="w3-col l6 w3-padding w3-border-left">
          <label class="theme_text"> Technology list:</label>
          <div ng-html-bind=""></div>
          <div class="w3-col l12" style="height: 360px;overflow-y: auto;" id="brand_listDiv">
   
      <?php foreach ($tech as $key) {
      
        ?>
     
          <div class="w3-border col-lg-4 col-sm-6 col-xs-6 w3-margin-bottom" style="background-image: url(<?php echo base_url().$key['tech_logo']; ?>); height: 80px;background-position: center;background-size: contain;background-repeat: no-repeat;">
            <div class="w3-col l3 theme_bg" style="z-index: 1;position: absolute;border-bottom-right-radius:100%;">
        </div>
         <a id="deltech" onclick="Removetech(<?php echo $key['tech_id']; ?>);" class=" w3-large w3-text-red btn" style="padding: 5px;" title="Delete Post"><i class="fa fa-times"></i></a>
    
         
            </div>
          <?php   }
      ?>
            
          </div>
     
         
        </div>
      </div>
    </div>

  </div>
  <!-- add technology div ends -->

  <!-- Add Testimonial div -->
  <div class="w3-col l12 w3-white w3-round w3-margin-top theme_text" style="padding: 16px">

    <div id="archOutput"></div>
    <!-- add Testimonial form -->
    <div class="col-lg-12">
      <div class="col-lg-12">
        <div class="w3-col l12 w3-padding" style="border:1px dotted">
          <h4 class="theme_text"><i class="fa fa-building"></i> Add Testimonial:</h4>
          <form id="add_testimonial_Form">    
            <input type="hidden" name="_token" id="_token" value="">          
            <div class="w3-col l12 w3-margin-top">
              <div class="col-lg-6 w3-margin-bottom">
                <label> Name:</label>
                <input type="text" name="client_name" class="w3-input" placeholder="Enter Client Name Here" required>
              </div>
              <div class="col-lg-6 w3-margin-bottom">
                <label>Designation:</label>
                <input type="text" name="client_desig" class="w3-input" placeholder="Enter Client Designation Here" required>
              </div>
            </div>
            <div class="w3-col l12">
              <div class="col-lg-6 w3-margin-bottom">
                  <label>Image(optional):</label>
                  <input type="file" name="client_image" onchange="" id="logo_image" class="w3-input" style="padding: 5px 2px 5px 5px" required>
                  <div id="image_error" class="w3-text-red"></div>
                </div>
              <div class="col-lg-6 w3-margin-bottom">
                <label>Comments:</label>
                <textarea class="w3-input" name="client_comment" placeholder="Enter Client Comments Here..." rows="4"></textarea>
              </div>
            </div>
           
            <div class="col-lg-12 w3-center w3-margin-bottom" id="archSubmit">
              <button class="btn theme_bg w3-center" id="addtestimonial" type="submit"><i class="fa fa-plus"></i>  Add Testimonial</button>
            </div>

          </form>

        </div>
      </div>
    </div>

  <div class="w3-col l12 w3-margin-top">
    <hr>
    <label class="theme_text"><i class="fa fa-database"></i> Testimonial List:</label>
    <form id="archListForm">
      <table id="datatable" class="table table-striped table-bordered">

        <thead>
          <tr>
          
            <th class="w3-center">Image</th>
            <th class="w3-center">Name</th>
            <th class="w3-center">Designation</th>
            <th class="w3-center">Comment</th>
             <th class="w3-center">Action</th>
          </tr>
        </thead>
          <tbody>
          <?php  if($testimonial !='')
          {
              foreach ($testimonial as $value) {
              
             
            ?>
            <tr>
              <td class="text-center">  
                              
                    <img src="<?php echo base_url().$value['client_image']; ?>" onerror="this.src='<?php echo base_url(); ?>assets/images/user.png'" alt="<?php echo $value['client_name'];?>profile image" class="img img-circle img-thumbnail w3-center" style="width: 100px;height: 100px"></td>
                <td class="text-center"> 
                  <?php echo $value['client_name']; ?>
                </td>
                 <td class="text-center"> 
                  <?php echo $value['client_designation']; ?>
                </td>
                 <td class="text-center"> 
                  <?php echo $value['client_comment']; ?>
                </td>
                <td class="text-center">
                  <a onclick="deletClientDetails(<?php echo $value['testimonial_id']; ?>)" id="deltest" class=" w3-large w3-text-red btn" style="padding: 5px;" title="Delete Post"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
          <?php }
        }
        

         else{
            ?>
            <tr>
              <td colspan="8" class="w3-center">
                <span> No Testimonial Found </span>
              </td>              
            </tr>
            <?php
          }
          ?>
          </tbody>

      
      </table>
     
      <span id="ArchMailErrMsg"></span>
    </form>

  </div>

  </div>



  </div>


  </div>

  <!-- /page content -->

  <!--  script to add technology details -->
  <script>
      $(function () {
          $("#addtechnologyForm").submit(function () {
              dataString = $("#addtechnologyForm").serialize();
              //alert(dataString);
               $('#addtechnologybtn').html('<span class="w3-card w3-padding-small w3-margin-bottom w3-round"><i class="fa fa-spinner fa-spin w3-large"></i> <b>Technology Add. Please wait...</b></span>');
              $.ajax({
                  type: "POST",
                  url: "<?php echo base_url(); ?>admin/admin_dashboard/addtechnology",
                  data: new FormData(this),
                  contentType: false,
                  cache: false,
                  processData: false,
                  success: function (data)
                  {
                      //alert(data);
                     // $.alert(data);
                       $('#msgdiv').html(data);
                      location.reload();
                  }
              });
              return false;  //stop the actual form post !important!

          });
      });

  </script>
  <!-- script ends here -->
  <script>
          //--------------fun for remove product from product table-------------------------------//
          function Removetech(tech_id) {
            $.confirm({
              title: '<h4 class="w3-text-red"><i class="fa fa-warning"></i> Are you sure you want to delete this Technology.!</h4>',
              content: '',
              type: 'red',
              buttons: {
                confirm: function () {
                    $.ajax({
                    url: "<?php echo base_url(); ?>admin/admin_dashboard/remove_technology",
                  type: "POST",
              data: {
                tech_id: tech_id
              },
              cache: false,
              success: function (data) {
              // alert(data);
              // $.alert(data);
               $('#msgdiv').html(data);
                location.reload();
            }
          });
          },
          cancel: function () {
          }
        }
      });
    }
  </script>
  <script>
      $(function () {
          $("#add_testimonial_Form").submit(function () {
              dataString = $("#add_testimonial_Form").serialize();
             // alert(dataString);
               $('#addtestimonial').html('<span class="w3-card w3-padding-small w3-margin-bottom w3-round"><i class="fa fa-spinner fa-spin w3-large"></i> <b>Testimonial Add. Please wait...</b></span>');
              $.ajax({
                  type: "POST",
                  url: "<?php echo base_url(); ?>admin/admin_dashboard/add_testimonial",
                  data: new FormData(this),
                  contentType: false,
                  cache: false,
                  processData: false,
                  success: function (data)
                  {
                    //  alert(data);
                     // $.alert(data);
                       $('#msgdiv').html(data);
                      location.reload();
                  }
              });
              return false;  //stop the actual form post !important!

          });
      });

  </script>

  <!-------script for delete user-->
  <script type="text/javascript">
    function deletClientDetails(testimonial_id) {
      $.confirm({
        title: '<h4 class="w3-text-red"><i class="fa fa-warning"></i> Are you sure you want to delete this Testimonial Details?</h4>',
        content: '',
        type: 'red',
        buttons: {
          confirm: function () {
            $.ajax({
              url: "<?php echo base_url(); ?>admin/admin_dashboard/deletClientDetails",
              type: "POST",
              data: {
                testimonial_id: testimonial_id
              },
              cache: false,
              success: function (data) {
              // alert(data);
               //$.alert(data);
               $('#msgdiv').html(data);
                location.reload();
            }
          });
          },
          cancel: function () {
          }
        }
      });
    }
  </script>
  <script>
      var skill = angular.module('CatApp', ['ngSanitize']);
      skill.controller('CatController', function($scope, $http){


      $scope.submit = function ()    {  
     // alert($scope.catname);         // POST form data to controller
      $http({
      method: 'POST',
              url: BASE_URL+'admin/admin_dashboard/addcategory',
              headers: {'Content-Type': 'application/json'},
              data: JSON.stringify({catname: $scope.catname})
      }).then(function (data) {
       //alert(data);
      console.log(data);
      $scope.catname = '';
      $scope.getUsers();
      });
      };
      
      //---------show all category
      $scope.getUsers = function(){
      $http({
      method: 'get',
              url: BASE_URL+'admin/admin_dashboard/getAllCategory'
      }).then(function successCallback(response) {
      // Assign response to skills object
      console.log(response);
      $scope.skills = response.data;
      // $scope.mes=response;
      });
      };
       $scope.getUsers();
      // //---del skill
     $scope.delskill = function(catid){

      $http({
      method: 'get',
              url: BASE_URL+'admin/admin_dashboard/delCategory?catid=' + catid
      }).then(function successCallback(response) {
     
      // Assign response to skills object
      console.log(response);
      $scope.getUsers();
      });
      };
      });
      angular.bootstrap(document.getElementById("skill"), ['CatApp']);
  </script>

  <!-- <script>
      // ----function to preview selected image for profile------//
      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#profile_imagePreview').attr('src', e.target.result);
              }
              reader.readAsDataURL(input.files[0]);
          }
      }
  // ------------function preview image end------------------//
  </script> -->

