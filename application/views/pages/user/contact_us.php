<title>Contact Us | <?php echo $company_details[0]['company_name']; ?></title>

<section class="wow fadeIn bg-light-gray inset-35px-tb page-title-small top-space">
        <div class="container">
          <div class="row equalize xs-equalize-auto">
            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table">
              <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                <h1 class="text-font-sec text-extra-dark-gray text-medium no-offset-bottom text-uppercase">Contact us</h1>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 display-table text-right xs-offset-15px-top">
              
            </div>
          </div>
        </div>
      </section>
    
      <section class="wow fadeIn big-section">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12 text-center center-col"><span class="text-font-sec text-small text-uppercase">Let's cooperate</span>
              <h2 class="text-font-sec text-semi-bold letter-spacing-minus-1 text-extra-dark-gray">We are ready to help you</h2>
              <p class="width-75 center-col xs-width-100">Cum zirbus ire, omnes nixes locus fidelis, camerarius liberies. Fidelis, secundus gloss virtualiter transferre de superbus, talis lapsus. Agripeta assimilants, tanquam regius diatria. Cur liberi studere? Varius idoleums ducunt ad orgia. Sunt absolutioes resuscitabo placidus, dexter genetrixes.</p><a class="btn btn-large btn-transparent-dark-gray offset-10px-top inner-link" href="#start-your-project">Get started</a>
            </div>
          </div>
        </div>
      </section>
      <!-- Contact info-->
      <section class="no-inset bg-extra-dark-gray">
        <div class="container-fluid">
          <div class="row equalize sm-equalize-auto">
         <!----- company address section -------->
        
           <div class="col-md-12 col-sm-12 no-inset wow fadeInRight" >
           	 <?php 
	          	 $office =''; 
	              foreach ($contact_email as $value) {
	             // print_r(json_decode($value['office_details'],true));die();
	             $office = json_decode($value['office_details'],TRUE);
	             //print_r($office);die();
	             if($office !='')
	             {
	             	$j = 1;
	             for ($i=0;$i<count($office);$i++) {   
	            ?>
              <div class="col-md-4 col-sm-6 col-xs-12 display-table bg-extra-dark-gray height-350px last-paragraph-no-margin">
                <div class="display-table-cell vertical-align-middle text-center"><i class="linearicons-map2 text-secondary icon-medium offset-25px-bottom"></i>
                  <div class="text-white text-uppercase text-font-sec text-medium offset-5px-bottom"><?php echo $office[$i]['office_type']; ?></div>
                  <p class="width-60 md-width-80 center-col text-medium" style="margin-bottom:0;"><?php echo $office[$i]['office_address']; ?></p>
                   <p class="center-col text-medium no-margin"><?php echo $office[$i]['office_email']; ?></p>
                   <p class="center-col text-medium no-margin"><?php echo $office[$i]['office_number']; ?></p>
                </div>
              </div>
             <?php $j++;
	           }
	        }
	         }
	          ?>
	         
            </div>
            
            <!----- company address section -------->
          </div>
        </div>
      </section>
      <section class="wow fadeIn" id="start-your-project">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 center-col offset-eight-bottom sm-offset-40px-bottom xs-offset-30px-bottom text-center last-paragraph-no-margin">
              <h5 class="text-font-sec text-semi-bold text-extra-dark-gray text-uppercase">Get in touch with us</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
            </div>
          </div>
          <div class="row">
          	<div class="col-md-6 text-center social-style-4 border round">
          		<form id="contact_us_form" class="rd-mailform text-left" data-form-output="form-output-global" data-form-type="contact" method="post" >
            <div class="row row-20">
              <div class="col-md-6">
              	  <div class="w3-col l12 w3-center" id="fpasswd_err"></div>
                <div class="form-wrap">
                  <label class="form-label" for="contact-name">Name</label>
                  <input class="form-input" id="contact-name" type="text" name="name" data-constraints="@Required" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-wrap">
                  <label class="form-label" for="contact-phone">Phone</label>
                  <input class="form-input" id="contact-phone" type="text" name="phone" data-constraints="@Required @Numeric" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-wrap">
                  <label class="form-label" for="contact-email">E-Mail</label>
                  <input class="form-input" id="contact-email" type="email" name="email" data-constraints="@Required @Email" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-wrap">
                  <div class="form-wrap">
                  <label class="form-label" for="contact-subject">Subject</label>
                  <input class="form-input" id="contact-subject" type="text" name="subject" data-constraints="@Required" required>
                </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-wrap">
                  <label class="form-label" for="contact-message">Message</label>
                  <textarea class="form-input" id="contact-message" name="message" data-constraints="@Required" required></textarea>
                </div>
              </div>
            </div>
            <div class="form-button group-sm text-center text-lg-left">
              <button class="btn btn-secondary btn-rounded btn-large offset-20px-top" id="submitbtn" type="submit">send message</button>
            </div>
          </form>
      </div>
      <div class="col-md-6 text-center social-style-4 border round">
      	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3783.525124457551!2d73.83154621436857!3d18.505157274476428!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bf8d90261449%3A0xbbb511df2afe0c9c!2sBizmo+Technologies!5e0!3m2!1sen!2sin!4v1542367197142" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
          	</div>
          
        </div>
      </section>
   

      <script>
    $(function () {
        $("#contact_us_form").submit(function () {
        	if ($('#contact-name').val() == '') {
                $('#contact-name').css('border-color', 'red');
                return false;
            } else {
                $('#contact-name').css('border-color', '');
            }
            if ($('#contact-phone').val() == '') {
                $('#contact-phone').css('border-color', 'red');
                return false;
            } else {
                $('#contact-phone').css('border-color', '');
            }
            if ($('#contact-email').val() == '') {
                $('#contact-email').css('border-color', 'red');
                return false;
            } else {
                $('#contact-email').css('border-color', '');
            }
            if ($('#contact-subject').val() == '') {
                $('#contact-subject').css('border-color', 'red');
                return false;
            } else {
                $('#contact-subject').css('border-color', '');
            }
            if ($('#contact-message').val() == '') {
                $('#contact-message').css('border-color', 'red');
                return false;
            } else {
                $('#contact-message').css('border-color', '');
            }
            dataString = $("#contact_us_form").serialize();
            	//alert(dataString);
            $("#submitbtn").html('<span class="w3-card w3-padding-small w3-margin-bottom w3-round"><i class="fa fa-spinner fa-spin w3-large"></i> <b>Sending Message. Hang on...</b></span>');
            $.ajax({
                type: "POST",
                url: BASE_URL + "contact_us/sendContactEmail",
                //dataType : 'text',
                data: dataString,
                return: false, //stop the actual form post !important!
                success: function (data) {
                    console.log(data);                    
                    $("#submitbtn").html('<span>Send Message</span>');
                    $("#fpasswd_err").html(data);
                    $('form :input').val('');
                }
            });
            return false;  //stop the actual form post !important!

        });
    });
</script>