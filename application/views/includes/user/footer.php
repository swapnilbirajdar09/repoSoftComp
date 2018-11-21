<footer class="footer-standard-dark bg-extra-dark-gray">  
    <div class="footer-widget-area inset-five-tb xs-padding-30px-tb">
        <div class="container">
            <div class="row equalize xs-equalize-auto">
                <div class="col-md-4 col-sm-12 col-xs-12 widget border-right border-color-medium-dark-gray sm-no-border-right sm-offset-30px-bottom xs-text-center"><a class="offset-20px-bottom display-inline-block" href="index.html"><img class="footer-logo" src="<?php echo base_url(); ?>assets/user/images/logo-white.png" alt=""></a>
                    <p class="text-small width-95 xs-width-100">We are a team of creative specialists offering businesses and individuals high-quality services of web design, development, brand identity and more.</p>
                    <div class="social-icon-style-8 display-inline-block vertical-align-middle">
                        <?php if ($social_logos != '500') {
                            ?>
                            <ul class="small-icon no-offset-bottom">
                                <?php
                                foreach ($social_logos as $row) {
                                    ?>  
                                    <li><a class="text-white" target="_blank" href="<?php echo $row['social_url']; ?>" title="<?php echo $row['social_link_name']; ?>"><i class="fa <?php echo $row['social_symbole'] ?>" aria-hidden="true"></i></a></li>
                                <?php }
                                ?>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12 widget border-right border-color-medium-dark-gray inset-45px-left sm-padding-15px-left sm-no-border-right sm-offset-30px-bottom xs-text-center">
                    <div class="widget-title text-font-sec text-small text-medium-gray text-uppercase offset-10px-bottom text-medium">Quick Links</div>
                    <div class="col-md-6" style=" padding-left:0; ">
                        <ul class="list-unstyled">
                            <li><a class="text-small" href="<?php echo base_url(); ?>">Home</a></li>
                            <li><a class="text-small" href="<?php echo base_url(); ?>about_us">About Us</a></li>
                            <li><a class="text-small" href="<?php echo base_url(); ?>services">Services</a></li>
                            <li><a class="text-small" href="<?php echo base_url(); ?>viewportfolio">Portfolio</a></li>
                            
                        </ul>
                    </div>
                    <div class="col-md-6" style=" padding-left:0; ">
                        <ul class="list-unstyled">
                            <li><a class="text-small" href="<?php echo base_url(); ?>careers">Careers</a></li>
                            <li><a class="text-small" href="<?php echo base_url(); ?>viewblog">Blogs</a></li>
                            <li><a class="text-small" href="<?php echo base_url(); ?>contact_us">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12 col-xs-12 widget border-color-medium-dark-gray inset-45px-left sm-padding-15px-left sm-clear-both sm-no-border-right xs-offset-30px-bottom xs-text-center">
                    <div class="widget-title text-font-sec text-small text-medium-gray text-uppercase offset-10px-bottom text-medium">Contact Info</div>
                    <p class="text-small display-block offset-15px-bottom width-80 xs-center-col"><?php echo $company_details[0]['hq_address']; ?></p>
                    <div class="text-small"><b>Email:</b><a href="mailto:#"> <?php echo $company_details[0]['company_email']; ?></a></div>
                    <!--                    <div class="text-small">Phone: +1 (0) 213-283-3723</div><a class="text-small text-uppercase text-decoration-underline" href="contact-us-classic.html">VIEW DIRECTIONS</a>-->
                </div>
            </div>
        </div>
    </div>
    <div class="bg-dark-footer inset-50px-tb text-center xs-padding-30px-tb">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 text-left text-small xs-text-center">@ <?php echo $company_details[0]['company_name']; ?>. is Proudly Powered by<a class="text-dark-gray" href="https://bizmo-tech.com/"> Bizmo Technologies</a></div>
                <!--                <div class="col-md-6 col-sm-6 col-xs-12 text-right text-small xs-text-center"><a class="text-dark-gray" href="#">Term and Condition</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a class="text-dark-gray" href="#">Privacy Policy</a></div>-->
            </div>
        </div>
    </div>

</footer>
</div>
<!-- Global Mailform Output-->
<div class="snackbars" id="form-output-global"> </div>
<!-- Javascript-->
<!-- javascript core scripts-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/user/js/core.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/user/js/scripts.js"></script>
</body>
</html>