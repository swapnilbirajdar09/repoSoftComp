 <section class="wow fadeIn cover-background background-position-top top-space" style="background-image:url(<?php echo base_url(); ?>assets/user/images/about-us-simple-2-1000x700.jpg);">
                <div class="opacity-medium bg-extra-dark-gray opacity4"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 display-table page-title-large">
                            <div class="display-table-cell vertical-align-middle text-center inset-30px-tb">
                                <!-- start sub title--><span class="display-block text-white opacity6 text-font-sec offset-5px-bottom"></span>
                                <!-- end sub title-->
                                <!-- start page title-->
                                <h1 class="text-font-sec text-white text-medium no-offset-bottom"><b>Career</b></h1>
                                <!-- end page title-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
 <section class="wow fadeIn bg-light-gray">
        <div class="container">
          <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-8 col-xs-12 center-col offset-eight-bottom sm-offset-40px-bottom xs-offset-30px-bottom text-center" >
                <div class="position-relative overflow-hidden width-100">
                    <span class="text-small text-outside-line-full text-font-sec text-medium text-uppercase">
                        <h5 class="w3-black"><b>Open Positions</b></h5>
                    </span>
                </div>
            </div>
        </div>
          <div class="row">
          	 <?php
        if ($jobs != '500' && $jobs != []) {
            foreach ($jobs as $key) {
                ?>
                <!---div to bind --->
            <div class="col-md-4 col-sm-4 col-xs-12 xs-offset-15px-bottom last-paragraph-no-margin">
              <div class="feature-content inset-30px-all bg-white box-shadow-light">
                <a href="<?php echo base_url().'Careers_details?job_id='.base64_encode($key['job_id']);?>" target="_blank" class="text-font-sec text-medium text-extra-dark-gray offset-10px-bottom"><span class="text-secondary offset-5px-right"></span> <?php echo $key['job_name']; ?></b>
                </a>
                <p>Vacancies : <?php echo $key['vacancies']; ?> <br>
                Experience : <?php echo $key['req_exp']; ?></p>
                 
              </div>
            </div>
             <!---div to bind end --->
            <?php
            }
        } else {
            ?>
            <div class="col-md-12 col-sm-12 col-xs-12 xs-offset-30px-bottom wow fadeInUp xs-text-center">
                <center><h6 class="text-light text-dark-gray"> No Jobs Available..!</h6></center>
            </div>
        <?php }
        ?>
              
           
          </div>
        </div>
      </section>