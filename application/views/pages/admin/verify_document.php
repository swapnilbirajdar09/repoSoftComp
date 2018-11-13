  
  <title>Verify Profile</title>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="container page_title" style="margin-top: 0px;margin-bottom: 0px;" >
      <div id="err_message"></div>
      <div class="row x_title">
        <div class="w3-padding">
          <h3><i class="fa fa-file"></i> Profile Verification </h3>
        </div>
      </div>
      <div class="x_panel">
        <?php if(!$userDetails){ ?>
          <p class="w3-center w3-medium"> Invalid key! User Not Found. </p>
        <?php } 
        else
        {
          ?>
          <div class="x_title">
            <h2>Uploaded Documents <small><b><?php echo $userDetails[0]['user_firstname'].' '.$userDetails[0]['user_lastname']; ?></b> has submitted following documents</small></h2>
            <a class="btn btn-primary btn-sm pull-right" href="<?php echo base_url(); ?>admin/all_users" ><i class="fa fa-chevron-left"></i> Back to All Members</a>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
              <div class="profile_img">
                <div id="crop-avatar">
                  <!-- Current avatar -->
                  <img class="img img-thumbnail img-responsive avatar-view" onerror="this.src='<?php echo base_url(); ?>assets/images/user.png'" src="<?php echo base_url(); ?><?php echo $userDetails[0]['user_profile_image']; ?>" alt="Avatar" title="Change the avatar">
                </div>
              </div>
              <h3><?php echo $userDetails[0]['user_firstname'].' '.$userDetails[0]['user_lastname']; ?></h3>

              <ul class="list-unstyled user_data">
                <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $userDetails[0]['user_city'].', '.$userDetails[0]['user_state'].', '.$userDetails[0]['user_country']; ?>
              </li>

              <li>
                <i class="fa fa-briefcase user-profile-icon"></i> <?php echo $userDetails[0]['user_designation']; ?>
              </li>
              <li>
                <i class="fa fa-at user-profile-icon"></i> <?php echo $userDetails[0]['user_email']; ?> 
                <?php 
                $color1='w3-grey';
                $text1='not verified';
                if($userDetails[0]['user_email_verified']=='1'){ $color1='w3-green'; $text1='verified'; }?><span class="badge <?php echo $color1; ?> w3-text-white"><?php echo $text1; ?></span>
              </li>
              <li>
                <i class="fa fa-phone user-profile-icon"></i> <?php echo $userDetails[0]['user_mobile_num']; ?> 
                <?php 
                $color2='w3-grey';
                $text2='not verified';
                if($userDetails[0]['user_mobile_verified']=='1'){$color2='w3-green'; $text2='verified'; } ?><span class="badge <?php echo $color2; ?> w3-text-white"><?php echo $text2; ?></span>
              </li>
            </ul>
            <br>
          </div>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <p id="doc_message" class="w3-padding"></p>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Document Type</th>
                  <th>Document File</th>
                  <th>Document Status</th>
                  <th>Comments</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                
                  <?php 
                  if(!$userDocuments){
                    echo '<tr>';
                    echo '<td colspan="6" class="w3-center" style="vertical-align:middle"> No Documents submitted</td>';
                    echo '</tr>';
                  }
                  else{
                    $count=1;
                    foreach ($userDocuments as $key) {
                      $status='';
                      $status_color='';
                      $arr=explode('/', $key['document_path']);
                      switch ($key['document_status']) {
                        case 'pending':
                        $status='In Progress';
                        $status_color='w3-grey';
                        break;
                        case 'approved':
                        $status='Approved';
                        $status_color='w3-green';
                        break;
                        case 'rejected':
                        $status='Rejected';
                        $status_color='w3-red';
                        break;
                      }
                      ?>
                      <tr>
                      <th scope="row"><?php echo $count; ?></th>
                      <td><?php echo strtoupper($key['document_type']); ?></td>
                      <td>
                        <label class="w3-small w3-text-grey"><i class="fa fa-paperclip"></i> <?php echo $arr[3]; ?></label><br>
                        <a target="_blank" href="<?php echo base_url(); ?><?php echo $key['document_path']; ?>" style="padding:0"><u>view</u></a>&nbsp;
                        <a target="_self" download href="<?php echo base_url(); ?><?php echo $key['document_path']; ?>" style="padding:0"><u>download</u></a>
                      </td>
                      <td><span class="badge w3-text-white <?php echo $status_color; ?>"><?php echo $status; ?></span></td>
                      <td><i><?php if($key['comments']==''){ echo 'N/A';}else{ echo $key['comments'];} ?></i></td>
                      <td>
                        <div class="btn-group">
                          <button id="action_<?php echo $key['document_id']; ?>" data-toggle="dropdown" class="btn btn-defaul btn-sm dropdown-toggle" type="button" aria-expanded="true">Action <span class="caret"></span>
                          </button>
                          <ul role="menu" class="dropdown-menu">
                            <li><a onclick="approveDocument(<?php echo $key['document_id']; ?>)" title="Approve Document">Approve Document</a>
                            </li>
                            <li><a onclick="rejectDocument(<?php echo $key['document_id']; ?>)" title="Reject Document">Reject Document</a>
                            </li>
                          </ul>
                        </div>
                      </td>
                      </tr>
                      <?php
                      $count++;
                    }
                  } ?>
                
              </tbody>
            </table>
            <hr>
            <?php if($userDetails[0]['user_status']=='1') 
            { ?>
              <a class="btn btn-danger btn-md pull-right" id="deactivateBtn" onclick="deactivate(<?php echo $userDetails[0]['user_id']; ?>)" ><i class="fa fa-user-times"></i> Deactivate Acccount</a>
            <?php } else
            { ?>
              <a class="btn btn-success btn-md pull-right" id="activateBtn" onclick="activate(<?php echo $userDetails[0]['user_id']; ?>)" ><i class="fa fa-user-plus"></i> Activate Acccount</a>
            <?php } ?>
          </div>
          <br>

        </div>
      <?php } ?>

    </div>
  </div>
</div>

<!-- Approve/ Reject Document -->
<script type="text/javascript">
  function approveDocument(doc_id)
  {   
    $.confirm({
      title: '<h5 class="w3-text-green w3-medium"><i class="fa fa-check-circle w3-large"></i> Are you sure you want to approve this document?</h5>',
      content: '',
      type: 'green',
      buttons: {
        confirm: function () {
          var dataS = {doc_id: doc_id,user_id:'<?php echo $userDetails[0]['user_id'] ?>'};
          $.ajax({
            type: "POST",
            url: BASE_URL + "admin/verify_document/approveDocument",
            dataType: 'text',
            data: dataS,
            return: false, //stop the actual form post !important!
            beforeSend: function () {
              $("#action_"+doc_id).attr("disabled", true);
              $('#action_'+doc_id).html(' <i class="fa fa-circle-o-notch fa-spin w3-large"></i> Approving');
            },
            success: function (data) {
                //$.alert(data);
                $('#doc_message').html(data);
                $("#action_"+doc_id).removeAttr("disabled");
                $("#action_"+doc_id).html('Action <span class="caret"></span>');
                window.setTimeout(function() {
                  location.reload();
                }, 1000);
              },
              error: function (data) {
                $("#action_"+doc_id).removeAttr("disabled");
                $('#doc_message').html('<p class="w3-text-white w3-red w3-padding-small"><strong>Failure!</strong> Something went wrong. Please refresh the page and try once again.</p>');
                $("#action_"+doc_id).html('Action <span class="caret"></span>');
                
              }
            });
        },
        cancel: function () {
        }
      }
    });
  }

  function rejectDocument(doc_id)
  {   
    $.confirm({
      title: '<h5 class="w3-text-red w3-medium"><i class="fa fa-times-circle w3-large"></i> Are you sure you want to reject this document?</h5>',
      content: '' +
      '<form action="" class="formName">' +
      '<div class="form-group">' +
      '<label class="w3-text-grey">Reason/ Comment:</label>' +
      '<input type="text" placeholder="Enter reason to Reject this document" class="comments form-control" required>' +
      '</div>' +
      '</form>',
      type: 'red',
      buttons: {
        formSubmit: {
          text: 'Submit',
          btnClass: 'btn-blue',
          action: function () {
            var comments = this.$content.find('.comments').val();
            if(!comments){
              $.alert('Provide a Valid Reason / Comment');
              return false;
            }
            var dataS = {doc_id: doc_id,comments: comments,user_id:'<?php echo $userDetails[0]['user_id'] ?>'};
            $.ajax({
              type: "POST",
              url: BASE_URL + "admin/verify_document/rejectDocument",
              dataType: 'text',
              data: dataS,
            return: false, //stop the actual form post !important!
            beforeSend: function () {
              $("#action_"+doc_id).attr("disabled", true);
              $('#action_'+doc_id).html(' <i class="fa fa-circle-o-notch fa-spin w3-large"></i> Rejecting');
            },
            success: function (data) {
                // $.alert(data);return false;
                $('#doc_message').html(data);
                $("#action_"+doc_id).removeAttr("disabled");
                $("#action_"+doc_id).html('Action <span class="caret"></span>');
                window.setTimeout(function() {
                  location.reload();
                }, 1000);
              },
              error: function (data) {
                $("#action_"+doc_id).removeAttr("disabled");
                $('#doc_message').html('<p class="w3-text-white w3-red w3-padding-small"><strong>Failure!</strong> Something went wrong. Please refresh the page and try once again.</p>');
                $("#action_"+doc_id).html('Action <span class="caret"></span>');
                
              }
            });
          }
        },
        cancel: function () {
        }
      }
    });
  }
</script>

<!-- script function to activate/ deactivate user -->
<script type="text/javascript">
  function activate(user_id)
  {   
    $.confirm({
      title: '<h5 class="w3-text-green w3-medium"><i class="fa fa-check-circle w3-large"></i> Are you sure you want to Activate this Member Account?</h5>',
      content: '',
      type: 'green',
      buttons: {
        confirm: function () {
          var dataS = 'user_id=' + user_id;
          $.ajax({
            type: "POST",
            url: BASE_URL + "admin/verify_document/activate",
            dataType: 'text',
            data: dataS,
            return: false, //stop the actual form post !important!
            beforeSend: function () {
              $("#activateBtn").attr("disabled", true);
              $('#activateBtn').html('<i class="fa fa-circle-o-notch fa-spin w3-large"></i> Activating Account');
            },
            success: function (data) {
                //$.alert(data);
                $('#doc_message').html(data);
                $("#activateBtn").removeAttr("disabled");
                $("#activateBtn").html('<i class="fa fa-user-plus"></i> Activate Acccount');
                window.setTimeout(function() {
                  location.reload();
                }, 1000);
              },
              error: function (data) {
                $("#activateBtn").removeAttr("disabled");
                $('#doc_message').html('<p class="w3-text-white w3-red w3-padding-small"><strong>Failure!</strong> Something went wrong. Please refresh the page and try once again.</p>');
                $("#activateBtn").html('<i class="fa fa-user-plus"></i> Activate Acccount');
                
              }
            });
        },
        cancel: function () {
        }
      }
    });
  }


function deactivate(user_id)
  {   
    $.confirm({
      title: '<h5 class="w3-text-red w3-medium"><i class="fa fa-times-circle w3-large"></i> Are you sure you want to Deactivate this Member Account?</h5>',
      content: '',
      type: 'red',
      buttons: {
        confirm: function () {
          var dataS = 'user_id=' + user_id;
          $.ajax({
            type: "POST",
            url: BASE_URL + "admin/verify_document/deactivate",
            dataType: 'text',
            data: dataS,
            return: false, //stop the actual form post !important!
            beforeSend: function () {
              $("#deactivateBtn").attr("disabled", true);
              $('#deactivateBtn').html(' <i class="fa fa-circle-o-notch fa-spin w3-large"></i> Deactivating Account');
            },
            success: function (data) {
                //$.alert(data);
                $('#doc_message').html(data);
                $("#deactivateBtn").removeAttr("disabled");
                $("#deactivateBtn").html('<i class="fa fa-user-times"></i> Deactivate Acccount');
                window.setTimeout(function() {
                  location.reload();
                }, 1000);
              },
              error: function (data) {
                $("#deactivateBtn").removeAttr("disabled");
                $('#doc_message').html('<p class="w3-text-white w3-red w3-padding-small"><strong>Failure!</strong> Something went wrong. Please refresh the page and try once again.</p>');
                $("#deactivateBtn").html('<i class="fa fa-user-times"></i> Deactivate Acccount');
                
              }
            });
        },
        cancel: function () {
        }
      }
    });
  }

</script>