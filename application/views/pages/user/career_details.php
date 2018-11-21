<title><?php echo $jobs[0]['job_name']; ?> | <?php echo $company_details[0]['company_name']; ?></title>
<section class="wow fadeIn cover-background background-position-top top-space" style="background-image:url(<?php echo base_url(); ?>assets/user/images/about-us-simple-2-1000x700.jpg);">
    <div class="opacity-medium bg-extra-dark-gray opacity4"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 display-table page-title-large">
                <div class="display-table-cell vertical-align-middle text-center inset-30px-tb">
                    <!-- start page title-->
                    <span class="display-block text-white opacity6 text-font-sec offset-5px-bottom">Career</span>
                    <h4 class="text-font-sec text-white text-medium no-offset-bottom"><?php echo $jobs[0]['job_name']; ?></h4>
                    <!-- end page title-->
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container" style="padding: 50px 20px 0 0">
<div class="col-md-12">
                <a class="btn btn-dark-gray btn-medium text-small pull-right" href="<?php echo base_url(); ?>careers"><i class="fa fa-chevron-left"></i> View all Openings</a>
            </div>
        </section>
<?php
if ($jobs != '500' && $jobs != []) {
    ?>
    <section class="wow fadeIn">
        <div class="container">
            <div class="col-md-7" style="margin-bottom: 20px">            
              <div class="row">
                <div class="col-md-12">
                  <h6 class="text-uppercase text-font-sec text-light-gray text-medium offset-four-bottom">Position <span class="text-medium text-extra-dark-gray display-inline-block"><?php echo $jobs[0]['job_name']; ?> <span class="text-gray text-small text-lowercase">(<?php echo $jobs[0]['vacancies']; ?> openings)</span></span></h6>
              </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12 center-col">
              <div class="panel-group accordion-style1" id="accordion-one">
                <div class="panel active-accordion">
                  <div class="panel-heading">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion-one" href="#accordion-one-link1" aria-expanded="false">
                      <div class="panel-title text-medium text-uppercase position-relative inset-20px-right">What will you do ?<span class="pull-right position-absolute right-0 top-0"><i class="ti-minus"></i></span>
                      </div>
                  </a>
              </div>
              <div class="panel-collapse collapse in" id="accordion-one-link1">
                <div class="panel-body">
                  <p><?php echo $jobs[0]['job_description']; ?></p>
              </div>
          </div>
      </div>
      <div class="panel">
          <div class="panel-heading"><a class="collapsed" data-toggle="collapse" data-parent="#accordion-one" href="#accordion-one-link2" aria-expanded="false">
              <div class="panel-title text-medium text-uppercase position-relative inset-20px-right">What do we expect from you ?<span class="pull-right position-absolute right-0 top-0"><i class="ti-plus"></i></span></div></a></div>
              <div class="panel-collapse collapse" id="accordion-one-link2">
                <div class="panel-body">
                    <ul class="no-inset list-style-5">
                        <li style="border: none;"><span><b>Experience:</b> </span><?php echo $jobs[0]['req_exp']; ?></li>
                        <?php
                        if ($jobs[0]['req_list'] != '') {
                         foreach (json_decode($jobs[0]['req_list'], TRUE) as $val) {
                           ?>
                           <li style="border: none;"><?php echo ucfirst($val); ?></li>
                           <?php
                       }
                   }
                   ?>
               </ul>
           </div>
       </div>
   </div>
</div>
</div>
</div>
</div>
<div class="col-md-5">
    <div class="row">
        <div class="col-md-12">
          <h6 class="text-uppercase text-font-sec text-extra-dark-gray text-medium offset-four-bottom">Apply Here</h6>
      </div>
  </div>
  
  <form class="rd-mailform text-left" id="applyJobForm" name="applyJobForm" data-form-output="form-output-global" data-form-type="" method="post" enctype="multipart/form-data">
   <div class="row row-20">
     <div class="col-md-12">
        <div class="form-wrap">
          <label class="form-label" for="contact-name-re">Name</label>
          <input class="form-input" id="contact-name-re" type="text" name="candidateName" data-constraints="@Required">
      </div>
  </div>
  <div class="col-md-12">
   <div class="form-wrap">
       <label class="form-label" for="contact-phone-re">Phone</label>
       <input class="form-input" id="contact-phone-re" type="number" maxlength="10" name="candidate_phone" data-constraints="@Required @Numeric">
   </div>
</div>
<div class="col-md-12">
   <div class="form-wrap">
       <label class="form-label" for="contact-email-re">E-Mail</label>
       <input class="form-input" id="contact-email-re" type="email" name="candidate_email" data-constraints="@Required @Email">
   </div>
</div>
<div class="col-md-12">
   <div class="form-wrap">
       <select class="form-input select select-inline" id="selectBox" data-placeholder="Select The Job From Job List" name="job_id" data-constraints="@Required" data-dropdown-class="select-inline-dropdown">
           <option label="placeholder"></option>
           <?php
           if ($jobs != '' && $jobs != []) {
               foreach ($jobs as $val) {
                   ?>
                   <option value="<?php echo $val['job_id']; ?>"><?php echo $val['job_name']; ?></option>
                   <?php
               }
           } else {
               ?>
               <option value="0">No Jobs Available</option>
           <?php }
           ?>
       </select>
   </div>
</div>
<div class="col-md-12">
   <div class="form-wrap">
       <label class="form-label" for="contact-message-re">Message</label>
       <textarea class="form-input" id="contact-message-re" name="message" data-constraints="@Required" style="resize: none;"></textarea>
   </div>
</div>
<div class="col-md-12">
   <div class="form-wrap">
       <!--                        <label class="form-label" for="contact-email-re"></label>-->
       <input type="file" class="form-input" id="resume" name="resume" data-constraints="@Required" required/> 
       <!--                        <input class="form-input" id="contact-email-re" type="email" name="email" data-constraints="@Required @Email">-->
   </div>
</div>
</div>
<div class="col-md-12" id="career_err" style="padding: 10px 0"></div>
<div class="form-button group-sm text-center text-lg-left">
   <button class="btn btn-secondary btn-rounded btn-large offset-20px-top" id="btnsubmit" type="submit">Apply</button>
</div>

</form>
</div>
</div>
</section>

<?php
} else {
   ?>
   <div class="container offset-30px-all wow fadeInUp text-center">
       <center><h6 class="text-light text-dark-gray"> No Data Available !</h6></center>
   </div>
<?php }
?>
<script>
    //-----------fun for apply to the job----------------------//
    $(function () {
        $("#applyJobForm").submit(function () {

            if ($('#contact-name-re').val() == '') {
                $('#contact-name-re').css('border-color', 'red');
                return false;
            } else {
                $('#contact-name-re').css('border-color', '');
            }
            if ($('#contact-phone-re').val() == '') {
                $('#contact-phone-re').css('border-color', 'red');
                return false;
            } else {
                $('#contact-phone-re').css('border-color', '');
            }
            if ($('#contact-email-re').val() == '') {
                $('#contact-email-re').css('border-color', 'red');
                return false;
            } else {
                $('#contact-email-re').css('border-color', '');
            }

            if ($('#contact-message-re').val() == '') {
                $('#contact-message-re').css('border-color', 'red');
                return false;
            } else {
                $('#contact-message-re').css('border-color', '');
            }
            if ($('#resume').val() == '') {
                $('#resume').css('border-color', 'red');
                return false;
            } else {
                $('#resume').css('border-color', '');
            }
            //alert(resume);
            dataString = $("#applyJobForm").serialize();
            $('#btnsubmit').html('<span class="w3-card w3-padding-small w3-margin-bottom w3-round"><i class="fa fa-spinner fa-spin w3-large"></i> <b>Appling Job. Hang on...</b></span>');
            $.ajax({
                type: "POST",
                url: BASE_URL + "careers/applyJob",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data)
                {

                    $('#career_err').html(data);
                    $('#btnsubmit').html('<span>Apply</span>');
                }
            });
            return false;  //stop the actual form post !important!
        });
    });
</script>
<script>
    $("#apply").click(function () {
        $('html,body').animate({
            scrollTop: $("#applyfor").offset().top},
            'slow');
    });
</script>