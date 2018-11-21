<section class="wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-image:url('<?php echo base_url();?>assets/images/service-simple-1-1600x639.jpg');padding:80px 0">
    <div class="opacity-medium bg-extra-dark-gray"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 extra-small-screen display-table page-title-large">
                <div class="display-table-cell vertical-align-middle text-center">
                    <!-- start page title-->
                    <h1 class="text-white text-font-sec text-medium letter-spacing-minus-1">Services</h1>
                 
                </div>
            </div>
        </div>
    </div>
</section>

<?php if ($services) { ?>
<section class="wow fadeIn" id="about">
    <div class="container">
               
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
<?php } ?>

<?php if ($allTechnologies) { ?>
    <section class="wow fadeIn bg-light-gray" style="padding:50px 0">
        <div class="container-fluid">
          <div class="row">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12 center-col sm-offset-10px-bottom xs-offset-10px-bottom text-center">
                    <div class="text-font-sec text-medium-gray offset-5px-bottom text-uppercase text-small">Our Offerings</div>
                    <h5 class="text-font-sec text-extra-dark-gray">Top-notch and affordable offerings</h5>
                </div>
            </div>
            <div class="col-md-12 hover-option4 offset-5px-bottom">
              <div class="swiper-multy-row-container overflow-hidden">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($allTechnologies as $key) {                                
                        ?>
                        <div class="swiper-slide grid-item">
                            <div class="row  last-paragraph-no-margin" style="padding: 12px">
                              <div class="col-md-12 col-sm-12 col-xs-12 feature-content bg-white box-shadow-light">

                                <?php if($key['tech_logo']==''){ ?>
                                    <div class="col-md-12 col-sm-12 col-xs-12 text-font-sec text-medium text-extra-dark-gray inset-5px-all">
                                        <p class="text-secondary offset-5px-right"><?php echo ucfirst($key['tech_name']); ?></p>
                                        <span class="text-small"><?php echo ucfirst($key['description']); ?></span>
                                    </div>
                                <?php } else { ?>
                                    <div class="col-md-4 col-sm-4 col-xs-4 inset-5px-all display-inline-block">
                                        <center>
                                            <img src="<?php echo base_url().$key['tech_logo']; ?>" alt="" data-no-retina="" style="width:auto;height: 100px" onerror="this.src='<?php echo base_url(); ?>assets/images/default.png'">
                                        </center>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-xs-8 text-font-sec text-medium text-extra-dark-gray inset-5px-all">
                                        <p class="text-secondary offset-5px-right"><?php echo ucfirst($key['tech_name']); ?></p>
                                        <span class="text-small"><?php echo ucfirst($key['description']); ?></span>
                                    </div>
                                    
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>
</section>
<?php } ?>
