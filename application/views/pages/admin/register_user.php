<title>Parinaay Matrimony | Register User</title>
<!-- page content -->
<div class="right_col" role="main" id="editPkgApp">
  <div class="">
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-user-cirlce"></i> Register User</h2>
            <a class="btn btn-primary btn-sm pull-right" href="<?php echo base_url(); ?>admin/dashboard" ><i class="fa fa-chevron-left"></i> Back to Dashboard</a>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">

              <div class="col-md-12">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                 
                  <form id="registeruser" name="registeruser" enctype="multipart/form">
                    <div class="col-md-12">
                     <div class="w3-col l12">
                      <div class="col-md-4 w3-margin-bottom">
                        <label>Gender: </label>
                        <span class="hidden-xs"> <input type="radio" name="gender" value="Male" class="w3-radio w3-small" required> Male</span>
                        <span class="hidden-xs"> <input type="radio" name="gender"  value="Female" class="w3-radio
                          w3-small" required> Female</span>
                        <div class="w3-col l12 hidden-sm hidden-lg hidden-md">
                          <span> <input type="radio" name="gender" value="Male" class="w3-radio" required checked> Male</span>
                          <span> <input type="radio" name="gender" value="Female" class="w3-radio" style="margin-left: 15px" required> Female</span>
                        </div>
                      </div>
                    </div>
                    <div class="w3-col l12">
                      <div class="col-md-6 w3-margin-bottom">
                        <label>First Name: </label>
                        <input type="text" name="fname" value="" class="form-control w3-small" placeholder="Enter First Name Here" required>
                      </div>
                      <div class="col-md-6 w3-margin-bottom">
                        <label>Last Name: </label>
                        <input type="text" name="lname" value="" class="form-control w3-small" placeholder="Enter Last Name Here" required>
                      </div>
                    </div>
                    <div class="w3-col l12">
                     <div class="col-md-6 w3-margin-bottom">
                      <label>Email-Id: </label>
                      <input type="email" name="eMail" value="" class="form-control w3-small" placeholder="Enter email here" required>
                      
                    </div>
                    <div class="col-md-6 w3-margin-bottom">
                      <label>Password: </label>
                      <input type="text" name="password" value="" id="password" class="form-control w3-small" placeholder="Enter password here" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                 <div class="w3-col l12">
                  <div class="col-md-6 w3-margin-bottom">
                    <label>Caste: </label>
                    <select class="w3-input w3-border control w3-text-grey" name="caste" id="mc-caste" required>
                      <option value="0" class="w3-light-grey" selected>Select your Caste*</option>
                      <option value="Hindu Mahar">Hindu Mahar</option>                      
                      <option value="Mahayana">Mahayana</option>                      
                      <option value="Nichiren Buddhism">Nichiren Buddhism</option>                      
                      <option value="Pure Land Buddhism">Pure Land Buddhism</option>                      
                      <option value="Tantrayana (Vajrayana Tibetan)">Tantrayana (Vajrayana Tibetan)</option>                      
                      <option value="Theravada (Hinayana)">Theravada (Hinayana)</option>                      
                      <option value="Tendai Buddhism (Japanese)">Tendai Buddhism (Japanese)</option>                      
                      <option value="Zen Buddhism (China)">Zen Buddhism (China)</option>                      
                      <option value="Others">Others</option>                      
                    </select>
                  </div>

                  <div class="col-md-6 w3-margin-bottom">
                    <label>Package: </label>
                    <select class="w3-input w3-border control w3-text-grey" name="package" id="package" required>
                      <option value="0" class="w3-light-grey" selected>Select your Package*</option>
                      <?php
                     // print_r($package);die();
                      foreach ($package as $key) {
                        ?>
                        <option value="<?php echo $key['package_title'].'|'.$key['package_period'].'|'.$key['package_validity']; ?>"><?php echo $key['package_title']; ?></option>
                      <?php } ?>                      
                      
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-12 w3-margin-bottom">
                <div class="col-md-6">
                  <label>Phone Number: </label>
                  <input type="number" name="number" value="" class="form-control w3-small" placeholder="Enter Number here" required>
                </div>
              </div>
              <div class="col-md-12 w3-center w3-margin-top">
                <!-- <button type="reset" class="btn btn-default">Reset</button> -->
                <button type="submit" id="registeruser" class="btn btn-primary">Submit</button>                      
              </div>
            </form>
            <p id="message" class="w3-padding"></p>
            
            
            
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>

<!-- /page content -->
<!-- function for submit hospital form details -->
<script>
  $(function () {
    $("#registeruser").submit(function () {
      dataString = $("#registeruser").serialize();
           // alert(dataString);
           $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>admin/register_user/register_user",
            data: dataString,
                return: false, //stop the actual form post !important!

                success: function (data)
                {
                   // alert(data);
                   $('#message').html(data);
                 }

               });

            return false;  //stop the actual form post !important!

          });
  });
</script>