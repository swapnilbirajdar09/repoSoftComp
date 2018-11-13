
<title>Softcomp | Dashboard</title>
<!-- page content -->
<!--  -->
<div class="right_col" role="main" >
 <div class="w3-row">


  <!-- add brand div start -->
  <div class="w3-col l9 w3-padding-small">

    <div class="w3-col l12 w3-white w3-round w3-padding theme_text">
      <h4 class="theme_text"><i class="fa fa-first-order"></i> All Technology:</h4>

      <div class="w3-col l6 w3-margin-top">
        <form id="addBrandForm" action="" method="POST" enctype="multipart/form-data">
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
              <button class="btn w3-button theme_bg" id="addBrandbtn" type="submit"><i class="fa fa-plus"></i> Add Technology</button>
            </div>
          </div>

        </form>
        <div id="formOutput" class="w3-margin"></div>
      </div>

      <div class="w3-col l6 w3-padding w3-border-left">
        <label class="theme_text"> Technology list:</label>
        <div ng-html-bind=""></div>
        <div class="w3-col l12" style="height: 360px;overflow-y: auto;" id="brand_listDiv">
     
        <div class="col-lg-4 col-sm-6 col-xs-6 w3-margin-bottom">
          <div class="w3-col l3 theme_bg" style="z-index: 1;position: absolute;border-bottom-right-radius:100%;">
         
          
       
          </div>
          
          
        </div>
        <!-- Modal starts -->
        <div class="modal fade" id="" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-md ">
            <!-- Modal content starts -->
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h3 class="modal-title w3-center theme_text"> <u> Brand Info </u></h3>
              </div>
              <!-- Modal body starts -->
              <div class="modal-body">
                <div class="container">
                  <div class="w3-col l12">
                    <a ng-click="" title="Delete Brand" class="btn w3-right w3-red" style="padding:0 5px"><i class="fa fa-remove"></i> Delete</a>
                  </div>
                  <form id="" name="">
                    <div class="w3-col l12">
                      <div class="col-lg-5">
                        <div class="w3-col l12 w3-margin-bottom">
                          <label>Brand Image:</label>
                          <img src="" width="100%" id="brand_image_update" alt="logo" class=" w3-centerimg img-thumbnail">
                        </div>
                      </div>
                      <div class="col-lg-7">   
                        <div class="w3-col l12 w3-margin-bottom">
                          <label>Brand Name:</label>
                          <input type="text" name="update_brand_name" class="w3-input" value="" placeholder="Enter Brand name" required>
                        </div>
                        <div class="w3-col l12 w3-margin-bottom">
                          <label>Brand Catalog:</label>
                          <input type="file" name="update_catalog" id="update_catalog" class="w3-input" style="padding: 5px 2px 5px 5px">
                        
                            <label>Uploaded: </label>
                            <a class="w3-text-grey btn" target="_self" href="" style="padding:0"><b><i class="fa fa-download"></i>  </b></a>
                          
                          <input type="hidden" name="uploaded_catalog" id="uploaded_catalog" value="">

                        </div>                 
                      </div>                    
                    </div>

                    <div class="w3-col l12">
                      <div class="col-lg-12 w3-margin-bottom ">
                        <label>Brand Description:</label>
                        <textarea class="w3-input" name="update_description" placeholder="Type a short description about the Brand..." rows="4" required></textarea>
                      </div>
                    </div>
                    <input type="hidden" name="id" value="">
                    <input type="hidden" name="_token" id="" value="">
                    <div class="w3-col l12 w3-center">
                      <button type="submit" id="" class="btn theme_bg"> Save Changes </button>
                    </div>
                    <div class="col-lg-offset-3 col-lg-6 w3-center" id=""></div>
                  </form>
                </div>
                
              </div>
              <script type="text/javascript">
                $("#updateBrandForm_{{$br->brand_id}}").on('submit', function(e) {
                  e.preventDefault(); 
                  $.ajaxSetup({
                    headers: {
                      'X-CSRF-Token': $('#_token_{{$br->brand_id}}').val()
                    }
                  });
                  $.ajax({
                    url: "/updateBrand", 
                    // point to server-side PHP script
                    data: new FormData(this),
                    type: 'POST',
                    contentType: false, 
                    // The content type used when sending data to the server.
                    cache: false, 
                    // To unable request pages to be cached
                    processData: false,
                    beforeSend: function(){
                      $('#update_formOutput_{{$br->brand_id}}').html('<span class="w3-card w3-padding-small w3-margin-bottom w3-round"><i class="fa fa-spinner fa-spin w3-large"></i> <b>Updating Changes...</b></span>');
                    },
                    success: function(data){
                      $('#update_formOutput_{{$br->brand_id}}').html(data);
                      window.setTimeout(function() {
                        $(".alert").fadeTo(500, 0).slideUp(500, function(){
                          $(this).remove(); 
                        });
                        location.reload();
                      }, 3000);
                    },
                    error:function(data){
                      $('#update_formOutput_{{$br->brand_id}}').html('<div class="alert alert-warning alert-dismissible fade in alert-fixed w3-round"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Failure!</strong> Something went wrong. Please refresh the page and try once again.</div>');

                      window.setTimeout(function() {
                        $(".alert").fadeTo(500, 0).slideUp(500, function(){
                          $(this).remove(); 
                        });
                      }, 5000);
                    }
                  });
                  return false;
                });


              </script>
              <!-- modal body ends -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- add brand div ends -->

<!-- Add architects div -->


<div class="w3-col l12 w3-white w3-round w3-margin-top theme_text" style="padding: 16px">

  <div id="archOutput"></div>
  <!-- add architect form -->
  <div class="col-lg-12">
    <div class="col-lg-8">
      <div class="w3-col l12 w3-padding" style="border:1px dotted">
        <h4 class="theme_text"><i class="fa fa-building"></i> Add Testimonial:</h4>
        <form id="addArchitectForm">    
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
              <label>Architect Landline (optional):</label>
              <input type="number" name="arch_landline" class="w3-input" placeholder="Enter Architect Landline number">
            </div>
            <div class="col-lg-6 w3-margin-bottom">
              <label>Architect Mobile (optional):</label>
              <input type="number" name="arch_mobile" class="w3-input" placeholder="Enter Architect Mobile Number">
            </div>
          </div>
          <div class="w3-col l12">
            <div class="col-lg-12 w3-margin-bottom">
              <label>Architect Address:</label>
              <textarea class="w3-input" name="arch_address" placeholder="Enter Architect Address here..." rows="4"></textarea>
            </div>
            <div class="col-lg-12 w3-margin-bottom">
              <label>
                <input type="checkbox" name="addtoSubscriber" style="margin-top: 2px">
                Check this to add Architect to Subscriber's List.
              </label>
            </div>
          </div>
          <div class="col-lg-12 w3-center w3-margin-bottom" id="archSubmit">
            <button class="btn theme_bg w3-center" type="submit"><i class="fa fa-plus"></i>  Add Architect </button>
          </div>

        </form>

      </div>
    </div>
    
    <div class="col-lg-4">
      <div class="w3-col l12 w3-padding" style="border:1px dotted">
        <h4 class="theme_text"><i class="fa fa-users"></i> Subscribers List:</h4>

        <div class="w3-col l12 w3-padding-small" id="allSubscriberDiv">
          <div class="w3-col l12 w3-right">
            <?php 
            $countSubscriber=0;
            if(!empty($subscribers)){
            $countSubscriber=count($subscribers);
            }
            ?>
            <span class="w3-text-grey w3-right">Total subscribers: <b>{{$countSubscriber}}</b></span>
          </div>
            <div class="w3-col l12 w3-border" style="height: 215px;overflow-y: auto;">
              <ul style="list-style: none;padding: 0">


               @if(empty($subscribers))
               <li class="w3-border-bottom w3-padding w3-center w3-text-red">
                <span>
                  No Subscriber Found
                </span>
              </li>
              @else
              @foreach ($subscribers as $sub)
              <li class="w3-border-bottom" style="padding: 0 16px">
                <div class="w3-row">

                  <div class="w3-col l10 m10 s10">
                    <span>
                      {{$sub->subscriber_email}}
                    </span>
                  </div>
                  <div class="w3-col l2 m2 s2">
                    <a ng-click="delSubscriber('{{$sub->subscriber_id}}')" title="Delete Subscriber" class="btn w3-right" style="padding: 0"><i class="fa fa-close"></i></a>
                  </div>
                </div>
              </li>
              @endforeach

              @endif
            </ul>
          </div>
          <button class="theme_bg btn w3-small w3-margin-top" type="submit" id="SendSubscriberBtn" style="margin: 0"><i class="fa fa-paper-plane w3-medium"></i> Send Mail to Subscribers</button>
          <p id="SubcriberMailErrMsg"></p>
      </div>

      <!-- upload mail format -->

      <div class="w3-col l12 w3-padding-small">
        <hr style="margin-top: 0">
        <form id="subscriberMailForm">
          <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
          <label>Upload Subscription Mail File:</label>
          <div class="input-group">
            <input type="file" style="padding: 5px 2px 5px 5px" onchange="readMailFile(this)" name="mail_document" id="mail_document" class="w3-input" required>
            <div class="input-group-btn">
              <button class="btn w3-button theme_bg" id="addMailFormatBtn" type="submit">
                <i class="fa fa-upload"></i>
              </button>
            </div>
          </div>

          <div class="w3-text-red w3-col l12" id="errMailerMsg">
          </div>
        </form>
      </div>

    </div>
  </div>  
</div>

<div class="w3-col l12 w3-margin-top">
  <hr>
  <label class="theme_text"><i class="fa fa-database"></i> Architect List:</label>
  <form id="archListForm">
    <table id="datatable" class="table table-striped table-bordered">

      <thead>
        <tr>
          <!-- <th class="w3-center">#</th> -->
          <th class="w3-center">Name</th>
          <th class="w3-center">Address</th>
          <th class="w3-center">LandLine</th>
          <th class="w3-center">Mobile</th>
          <th class="w3-center">Email-Id</th>
          <th class="w3-center">Added-on</th>
          <th class="w3-center">Action</th>
        </tr>
      </thead>


      <tbody>
        @if($arch!='')
        @foreach($arch as $ar)
        <tr>
          <!-- <td><input type="checkbox" class="w3-input" value="{{$ar->arch_email}}" name="architect_list[]" id="arch_list_{{$ar->arch_id}}"></td> -->
          <td>{{$ar->arch_name}}</td>
          <td>{{$ar->arch_address}}</td>
          <td>@if($ar->arch_landline=='0')N/A @else{{$ar->arch_landline}}@endif</td>
          <td>@if($ar->arch_mobile=='0')N/A @else{{$ar->arch_mobile}}@endif</td>
          <td>{{$ar->arch_email}}</td>
          <td>{{date("d M Y", strtotime($ar->added_on))}}</td>
          <td class="w3-center"><a ng-click="removeArch('{{$ar->arch_id}}')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a></td>
        </tr>
        @endforeach
        @else
        <tr>
          <td colspan="7" class="w3-center theme_text">No Architect Available</td>
        </tr>
        @endif                        
      </tbody>
    </table>
    <!-- <button class="theme_bg btn w3-small" type="submit" id="SendMailBtn" style="margin: 0"><i class="fa fa-paper-plane w3-medium"></i> Send Mail to Marked</button> -->
    <span id="ArchMailErrMsg"></span>
  </form>

</div>

</div>


<!-- add architect div ends -->
</div>


</div>

<!-- /page content -->



