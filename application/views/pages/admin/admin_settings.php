<title>Softcomp | Dashboard</title>
<!-- page content -->
<!--  -->
<div class="right_col" role="main" >
 <div class="w3-row">

<div class="w3-main w3-padding-small" style="margin-left:120px;">

    <!-- Header -->
    <header class="w3-container" >
      <h5><b><i class="fa fa-cog"></i> Settings</b></h5>
    </header>
    <div class="w3-margin-bottom">
      <div class="w3-col l12">
        <!-- div for update email id -->
        <div class="col-lg-6 w3-padding-small ">
          <div class="w3-col l12 w3-small w3-round w3-margin-bottom w3-border w3-padding-small">
            <label><i class="fa fa-envelope"></i> SetUp Email-ID</label><br>
            <form id="updateEmail">
              <div class="w3-col l8 w3-padding-right w3-margin-bottom">
                <input type="email" name="admin_email" value="" placeholder="Enter Email-ID here..." id="admin_email" class="w3-input" required>
              </div>
              <div class="w3-col l4">
                <button type="submit" class="w3-button w3-red">Update Email-ID</button>
              </div>
            </form>
          </div>
        </div>

        <!-- div for update user name -->
        <div class="col-lg-6 w3-padding-small w3-small w3-margin-bottom">
          <div class="w3-col l12 w3-small w3-round w3-margin-bottom w3-border w3-padding-small">
            <label><i class="fa fa-users"></i> Update Username</label><br>
            <form id="updateUname">
              <div class="w3-col l8 w3-padding-right w3-margin-bottom">
                <input type="text" name="admin_uname" value="" placeholder="Enter Username Here..." id="admin_uname" class="w3-input" required>
              </div>
              <div class="w3-col l4">
                <button type="submit" class="w3-button w3-red">Update Username</button>
              </div>
            </form>
          </div>

          <div class="w3-col l12 w3-round w3-margin-bottom w3-border w3-padding-small">
            <label><i class="fa fa-lock"></i> Update Password</label><br>

            <form id="updatePass">
              <div class="w3-col l8 w3-padding-right w3-margin-bottom">
                <input type="text" name="admin_pass" value="" placeholder="Enter Password here..." id="admin_email" class="w3-input" required>
              </div>
              <div class="w3-col l4">
                <button type="submit" class="w3-button w3-red">Update Password</button>
              </div>
            </form>
          </div>
        </div>

      </div>
      
    </div>
  </div>
</div>
</div>