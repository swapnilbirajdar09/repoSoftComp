   <section class="wow fadeIn cover-background background-position-top top-space" style="background-image:url(<?php echo base_url(); ?>assets/user/images/about-us-simple-2-1000x700.jpg);">
                <div class="opacity-medium bg-extra-dark-gray opacity4"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 display-table page-title-large">
                            <div class="display-table-cell vertical-align-middle text-center inset-30px-tb">
                                <!-- start sub title--><span class="display-block text-white opacity6 text-font-sec offset-5px-bottom"></span>
                                <!-- end sub title-->
                                <!-- start page title-->
                                <h4 class="text-font-sec text-white text-medium no-offset-bottom"><b>Career</b><br></h4><h3 class="text-center text-white"><?php echo $jobs[0]['job_name']; ?></h3>
                                <!-- end page title-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
   <section class="wow fadeIn">
        <div class="container">
          <div class="row">
  
          	<?php
	    if ($jobs != '500' && $jobs != []) {
	    foreach ($jobs as $key) {
	                ?>

            <div class="col-md-5 col-md-offset-1 text-line-height-28 last-paragraph-no-margin wow fadeInUp">
              <ul class="list-style-6">
                <li class="text-extra-small text-uppercase text-black text-medium text-line-height-22"><?php echo $key['job_name']; ?></li>
            </ul>
            <ul>
                <li><?php echo $key['job_description']; ?></li><br>
                <li ><b>Requirements : </b></li><?php
	        if ($key['req_list'] != '') {
	          foreach (json_decode($key['req_list'], TRUE) as $val) {
	        ?>
	         <p style="margin:0px;padding:0px;"><i>
	            <?php echo $val; ?>
	        </i> </p>
	            <?php
	                }
	                } else {
	             ?>
	          <center><span class="text-black text-font-sec offset-5px-bottom display-block text-extra-dark-gray text-small">No Requirements Available..!</span></center>
	     <?php } ?>
                 <li><b>Vacancies :</b> <?php echo $key['vacancies']; ?></li>
                 <li><b>Experience :</b> <?php echo $key['req_exp']; ?></li>
              </ul>
            
            </div>
             <?php
	            }
	        } else {
	            ?>
	            <div class="col-md-12 col-sm-12 col-xs-12 xs-offset-30px-bottom wow fadeInUp xs-text-center">
	                <center><h6 class="text-light text-dark-gray"> No Jobs Available..!</h6></center>
	            </div>
	        <?php }
	        ?>
            <div class="col-md-5 col-md-offset-1 text-line-height-28 last-paragraph-no-margin wow fadeInUp" data-wow-delay="0.2s">
            	<div id="career_err"></div>
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
	            <div class="form-button group-sm text-center text-lg-left">
	                <button class="btn btn-secondary btn-rounded btn-large offset-20px-top" id="btnsubmit" type="submit">Apply</button>
	            </div>
	        </form>
            </div>
          </div>
        </div>
      </section>
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