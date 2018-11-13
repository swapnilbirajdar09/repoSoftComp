    <title>All Members</title>
    <style type="text/css">
      .diag {
    -webkit-transform:rotate(45deg);
       -moz-transform:rotate(45deg);
            transform:rotate(45deg);

    left: 50px;
    top: 30px
}
    </style>
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="container page_title" style="margin-top: 0px;margin-bottom: 0px;" >
        <div id="err_message"></div>
        <div class="row x_title">
          <div class="w3-padding">
            <h3><i class="fa fa-cubes"></i> All Member List</h3>
          </div>
        </div>
        <div class="container x_title" style=" margin-top: 5px;">

          <table id="datatable" class="table">
            <thead>
              <tr class="theme_bg">
               <th class="w3-center"><span>User Photo</span></th>
               <th class="w3-center"><span>Profile ID</span></th>
               <th class="w3-center"><span>Name</span></th>
               <th class="w3-center"><span>Package</span></th>
               <th class="w3-center"><span>Registration Date</span></th>
               <th class="w3-center"><span>City</span></th>
               <th class="w3-center"><span>Verification</span></th>
               <th class="w3-center"><span>Marital Status</span></th>
               <th class="w3-center"><span>Action</span></th>
             </tr>
           </thead>
           <tbody>                    
            <?php 
            if($all_users!='' && $all_users['status']=='200'){
             $count=1;
             foreach ($all_users['status_message'] as $key) {  
              ?>
              <tr <?php if($key['user_doc_verified']=='0'){ echo 'class="w3-light-grey"';} ?>>
                <td class="text-center">                  
                  <img src="<?php echo base_url(); ?><?php echo $key['user_profile_image']; ?>" onerror="this.src='<?php echo base_url(); ?>assets/images/user.png'" alt="<?php echo $key['user_firstname'];?> <?php echo $key['user_lastname'];?> profile image" class="img img-circle img-thumbnail w3-center" style="width: 100px;height: 100px">
                  <?php 
                  if($key['user_doc_verified']=='0'){
                  ?>
                  <div style="position: relative;margin-top: -10px">
                    <span class="w3-red badge">Documents<br>not Verified</span>
                  </div>
                  <?php 
                }else{
                  ?>
                  <div style="position: relative;margin-top: -10px">
                    <span class="w3-green badge">Documents<br>Verified</span>
                  </div>
                  <?php
                }
                ?>
                </td>
                <td class="w3-center" style="vertical-align: middle;">
                 <span class=""><b><?php echo $key['user_profile_key'];?></b></span>
               </td>
               <td class="w3-center" style="vertical-align: middle;">
                <span class=""><b><?php echo $key['user_firstname'];?> <?php echo $key['user_lastname'];?></b><br><i><?php echo $key['user_gender']; ?></i></span>
              </td>
              <td class="w3-center" style="vertical-align: middle;">
                <span class=""><b><?php echo strtoupper($key['user_package']);?></b></span>
              </td>
              <td class="w3-center" style="vertical-align: middle;"><?php echo date('d M Y',strtotime($key['user_reg_date'])); ?></td>
              <td class="w3-center" style="vertical-align: middle;"><?php echo $key['user_city']; ?></td>
              <td class="" style="vertical-align: middle;">
                <div><i class="fa fa-at"></i> Email <?php if($key['user_email_verified']=='1'){ ?><i class="fa fa-check w3-text-green"></i> <?php }else{ ?><i class="fa fa-times w3-text-red"></i> <?php } ?></div>
                <div><i class="fa fa-phone"></i> Mobile No. <?php if($key['user_mobile_verified']=='1'){ ?><i class="fa fa-check w3-text-green"></i> <?php }else{ ?><i class="fa fa-times w3-text-red"></i> <?php } ?></div>
                <div><i class="fa fa-file"></i> Documents <?php if($key['user_doc_verified']=='1'){ ?><i class="fa fa-check w3-text-green"></i> <?php }else{ ?><i class="fa fa-times w3-text-red"></i> <?php } ?></div>
              </td>
              <td class="w3-center" style="vertical-align: middle;"><span class="badge w3-text-white"><?php echo $key['user_marital_status']; ?></span></td>
              <td class="w3-center" style="vertical-align: middle;">
                <div class="btn-group">
                  <button data-toggle="dropdown" class="btn btn-default btn-sm dropdown-toggle" type="button" aria-expanded="true">Action <span class="caret"></span>
                  </button>
                  <ul role="menu" class="dropdown-menu pull-right">
                    <li><a target="_blank" href="<?php echo base_url(); ?>admin/all_users/downloadPdf" >Download Profile</a>
                    </li>
                  
                    <li><a href="<?php echo base_url(); ?>admin/verify_document/profile/<?php echo base64_encode($key['user_id']); ?>">Verify Documents</a>
                    </li>
                    <li><a onclick="deletUserDetails(<?php echo $key['user_id']; ?>)" title="Delete Member">Delete Profile</a>
                    </li>
                    <li class="divider"></li>
                    <?php if($key['user_status']=='1') 
                    { ?>
                      <li class="w3-center"><span class="badge w3-green" style="margin: 0 0 5px 0">Account Activated</span></li>
                    <?php } else
                    { ?>
                      <li class="w3-center"><span class="badge w3-red" style="margin: 0 0 5px 0">Account Deactivated</span></li>
                    <?php } ?>
                  </ul>
                </div>
              </td>
            </tr>
            <?php 
            $count++;
          }
        }
        else{
          ?>
          <tr>
            <td colspan="8" class="w3-center">
              <span> No User Found </span>
            </td>              
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
</div>
<!-------script for delete user-->
<script type="text/javascript">
  function deletUserDetails(user_id) {
    $.confirm({
      title: '<h4 class="w3-text-red"><i class="fa fa-warning"></i> Are you sure you want to delete this Member?</h4>',
      content: '',
      type: 'red',
      buttons: {
        confirm: function () {
          $.ajax({
            url: "<?php echo base_url(); ?>admin/all_users/deleteUserDetails",
            type: "POST",
            data: {
              user_id: user_id
            },
            cache: false,
            success: function (data) {
            // alert(data);
            $('#messageinfo').html(data);
          }
        });
        },
        cancel: function () {
        }
      }
    });
  }
</script>
<!-- function to deactive user  -->
<script type="text/javascript">
  function deactiveuser(user_id) {
   $.confirm({
    title: '<h4 class="w3-text-red"><i class="fa fa-warning"></i> Are you sure you want to Deactivate this member?</h4>',
    content: '',
    type: 'red',
    buttons: {
     confirm: function () {
      $.ajax({
        url: "<?php echo base_url(); ?>admin/all_users/deactiveuser",
        type: "POST",
        data: {
          user_id: user_id
        },
        cache: false,
        success: function (data) {
                                                       //alert(data);
                                                       $('#messageinfo').html(data);
                                                     }
                                                   });
    },
    cancel: function () {
    }
  }
});
 }
</script> 

<!-- function to active user  -->
<script type="text/javascript">
  function activeuser(user_id) {
    $.confirm({
      title: '<h4 class="w3-text-red"><i class="fa fa-warning"></i> Are you sure you want to Activate this Member?</h4>',
      content: '',
      type: 'red',
      buttons: {
        confirm: function () {
          $.ajax({
            url: "<?php echo base_url(); ?>admin/all_users/activeuser",
            type: "POST",
            data: {
              user_id: user_id
            },
            cache: false,
            success: function (data) {
                                                      // alert(data);
                                                      $('#messageinfo').html(data);
                                                    }
                                                  });
        },

        cancel: function () {
        }
      }
    });
  }
</script> 