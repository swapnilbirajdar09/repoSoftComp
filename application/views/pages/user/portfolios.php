<title>All Portfolio | SoftComp</title>
<section class="wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-image:url('<?php echo base_url();?>assets/images/portfolio-justify-18-975x650.jpg');">
    <div class="opacity-medium bg-extra-dark-gray"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 extra-small-screen display-table page-title-large">
                <div class="display-table-cell vertical-align-middle text-center">
                    <!-- start page title-->
                    <h1 class="text-white text-font-sec text-medium letter-spacing-minus-1 offset-10px-bottom">Our Portfolio</h1>
                    <!-- end page title-->
                    <!-- start sub title--><span class="text-white opacity6 text-font-sec">We design solutions for businesses small and large across a variety of sectors and industries. In our portfolio, you can find the best creative projects we have created since our establishment. Take a look at our latest projects</span>
                    <!-- end sub title-->
                </div>
            </div>
        </div>
    </div>
</section>
<?php if ($allPortfolios) { ?>
    <section class="wow fadeIn inset-90px-top sm-padding-50px-top xs-padding-30px-top" id="work">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="portfolio-filter nav nav-tabs border-none portfolio-filter-tab-1 text-medium text-font-sec text-uppercase text-center offset-80px-bottom text-small sm-offset-40px-bottom xs-offset-20px-bottom">
                        <li class="nav active"><a class="xs-display-inline light-gray-text-link text-very-small" href="#" data-filter="*">All</a></li>
                        <?php
                        if ($allCategories) {
                            foreach ($allCategories as $key) {
                                ?>
                                <li class="nav"><a class="xs-display-inline light-gray-text-link text-very-small" href="#" data-filter=".<?php echo $key['cat_id']; ?>"><?php echo strtoupper($key['cat_name']); ?></a></li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <?php
                if (!$allPortfolios) {
                    ?>
                    <div class="col-md-12 col-sm-12 col-xs-12 xs-offset-30px-bottom wow fadeInUp xs-text-center">
                        <center><h6 class="text-light text-dark-gray"> No Portfolio Available !</h6></center>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="col-md-12 no-inset xs-padding-15px-lr">
                        <div class="filter-content overflow-hidden">
                            <ul class="portfolio-grid work-4col gutter-medium hover-option7">
                                <li class="grid-sizer"></li>

                                <?php
                                foreach ($allPortfolios as $key) {
                                    $imgArr = json_decode($key['portfolio_images'], TRUE);
                                    ?>
                                    <li class="grid-item <?php echo $key['cat_id']; ?> wow fadeInUp">
                                        <a href="<?php echo base_url(); ?>viewportfolio/info/<?php echo base64_encode('PORTFOLIO|' . $key['portfolio_id']); ?>">
                                            <figure>
                                                <div class="portfolio-img"><img src="<?php echo base_url(); ?><?php echo $imgArr[0]; ?>" alt=""></div>
                                                <figcaption>
                                                    <div class="portfolio-hover-main text-center last-paragraph-no-margin">
                                                        <div class="portfolio-hover-box vertical-align-middle">
                                                            <div class="portfolio-hover-content position-relative"><span class="text-medium text-font-sec text-uppercase offset-one-bottom display-block text-extra-dark-gray"><?php echo $key['portfolio_name']; ?></span>
                                                                <p class="text-medium-gray text-uppercase text-extra-small"><?php echo $key['cat_name']; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
<?php } ?>
<section class="wow fadeIn inset-50px-tb border-top border-width-1 border-color-extra-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12 sm-offset-30px-bottom sm-text-center wow fadeInDown"><span class="text-font-sec text-extra-large text-extra-dark-gray offset-5px-top sm-no-offset-top display-inline-block width-100">We are ready to work on your next creative project</span></div>
            <div class="col-md-4 col-sm-12 col-xs-12 sm-text-center wow fadeInDown"><a class="btn btn-medium btn-rounded btn-transparent-dark-gray" href="<?php echo base_url(); ?>contact_us" data-wow-delay="0.4s">Contact Us<i class="ti-arrow-right" aria-hidden="true"></i></a></div>
        </div>
    </div>
</section>