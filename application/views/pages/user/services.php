<section class="wow fadeIn bg-extra-dark-gray inset-35px-tb page-title-small top-space">
    <div class="container">
        <div class="row equalize">
            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table">
                <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                    <h1 class="text-font-sec text-white text-medium no-offset-bottom text-uppercase">Services</h1>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 display-table text-right xs-text-left xs-offset-10px-top">
                <div class="display-table-cell vertical-align-middle breadcrumb text-small text-font-sec">
                    <ul class="xs-text-center">
                        <li><a class="text-dark-gray" href="#">Elements</a></li>
                        <li><a class="text-dark-gray" href="#">Interactive elements</a></li>
                        <li class="text-dark-gray">Services</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="wow fadeIn" id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center offset-100px-bottom xs-offset-40px-bottom">
                <div class="position-relative overflow-hidden width-100"><span class="text-small text-outside-line-full text-font-sec text-medium text-uppercase">Services</span></div>
            </div>
        </div>        
        <div class="row">
            <?php
            if (!$services) {
                ?>
                <div class="col-md-12 col-sm-12 col-xs-12 xs-offset-30px-bottom wow fadeInUp xs-text-center">
                    <center><h6 class="text-light text-dark-gray"> No Service Available !</h6></center>
                </div>
                <?php
            } else {
                foreach ($services as $key) {
                    ?>
                    <div class="col-md-4 col-sm-4 col-xs-12 xs-offset-30px-bottom wow fadeInUp last-paragraph-no-margin xs-text-center">
                        <div class="offset-ten-bottom overflow-hidden image-hover-style-1 sm-offset-20px-bottom">
                            <img src="<?php echo base_url(); ?><?php echo $key['service_image']; ?>" alt="<?php echo $key['service_name']; ?> image" style="height: 250px;width: 100%">
                        </div>
                        <a class="text-font-sec offset-5px-bottom display-block text-extra-dark-gray text-medium text-uppercase text-small"><?php echo $key['service_name']; ?></a>
                        <p class="width-95 sm-width-100"><?php echo $key['service_description']; ?></p>
                        <div class="separator-line-horrizontal-full bg-medium-light-gray offset-20px-tb sm-offset-15px-tb"></div>
                    </div>      
                    <?php
                }
            }
            ?>
        </div>    
    </div>
</section>