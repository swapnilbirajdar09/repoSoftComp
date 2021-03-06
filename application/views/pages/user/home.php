<!-- Site Title-->
<title><?php echo $company_details[0]['company_name']; ?></title>
<section class="swiper-wrap-custom fadeIn position-relative wow fadeIn section">
    <div class="swiper-container swiper-slider swiper-slider-1" data-loop="true" data-autoplay="4200" data-simulate-touch="false">
        <div class="swiper-wrapper text-center">
            <div class="swiper-slide context-dark" data-slide-bg="<?php echo base_url(); ?>assets/user/images/home-corporate-slider-02.jpg">
                <div class="swiper-slide-caption section-md">
                    <div class="container">
                        <div class="row"> 
                            <div class="col-lg-8 col-lg-offset-2">
                                <p class="lead text-white" data-caption-animate="fadeInUp" data-caption-delay="200">Provider of high-quality business services</p>
                                <h1 class="text-white offset-30px-top" data-caption-animate="fadeInUp" data-caption-delay="800">Welcome to Sailo Technosoft</h1><a class="btn btn-rounded btn-small offset-20px-lr xs-offset-5px-top btn-transparent-white offset-15px-top" href="#" data-caption-animate="fadeInUp" data-caption-delay="1400">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide context-dark" data-slide-bg="<?php echo base_url(); ?>assets/user/images/home-corporate-slider-01.jpg">
                <div class="swiper-slide-caption section-md">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <p class="lead text-white" data-caption-animate="fadeInUp" data-caption-delay="200">Dedicated team of professionals</p>
                                <h1 class="text-white offset-30px-top" data-caption-animate="fadeInUp" data-caption-delay="800">Helping your business achieve more</h1><a class="btn btn-rounded btn-small offset-20px-lr xs-offset-5px-top btn-transparent-white offset-15px-top" href="#" data-caption-animate="fadeInUp" data-caption-delay="1400">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide context-dark" data-slide-bg="<?php echo base_url(); ?>assets/user/images/home-corporate-slider-03.jpg">
                <div class="swiper-slide-caption section-md">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2"> 
                                <p class="lead text-white" data-caption-animate="fadeInUp" data-caption-delay="200">Sustainable business solutions for you</p>
                                <h1 class="text-white offset-30px-top" data-caption-animate="fadeInUp" data-caption-delay="800">Offering what your company needs</h1><a class="btn btn-rounded btn-small offset-20px-lr xs-offset-5px-top btn-transparent-white offset-15px-top" href="#" data-caption-animate="fadeInUp" data-caption-delay="1400">Read more </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"> </div>
    </div>
</section>
<section class="wow fadeIn" id="about">
    <div class="container">
        <div class="row equalize sm-equalize-auto">
            <div class="col-md-5 col-sm-12 sm-text-center col-md-offset-1 sm-padding-50px-all xs-padding-15px-lr pull-right">
                <div class="display-table width-100 height-100">
                    <div class="display-table-cell vertical-align-middle"><i class="fa fa-quote-left text-secondary icon-medium offset-15px-bottom"></i>
                        <h5 class="text-extra-dark-gray text-font-sec text-uppercase text-semi-bold">OUR TEAM IS DEDICATED TO THE FINAL RESULT AND SUCCESS OF OUR CLIENTS.</h5>
                        <p class="width-90 sm-width-100">The approach of MService assumes that a perfect design can only be delivered by people with a deep social and cultural understanding of the communities they designing for. As a Co-Founder, I make sure all our clients receive the designs their need for their corporate needs.</p><img class="offset-15px-top" src="images/signature-dark.png" alt=""><span class="text-extra-dark-gray text-large display-block offset-30px-top text-font-sec text-medium">Siddhi Lohokare<br>Yogiraj Lohokare</span>Director </span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 text-center">
                <div class="display-table width-100 height-100">
                    <div class="display-table-cell vertical-align-bottom"><img src="<?php echo base_url(); ?>assets/user/images/about-us-classic-4-600x741.jpg" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="no-inset wow fadeIn bg-extra-dark-gray">
    <div class="container-fluid no-inset">
        <div class="row equalize no-margin">
            <div class="col-md-6 col-sm-12 col-xs-12 display-table wow fadeInLeft last-paragraph-no-margin sm-text-center">
                <div class="display-table-cell vertical-align-middle inset-fifteen-all md-padding-ten-all sm-padding-90px-all xs-text-center xs-no-padding-lr xs-padding-40px-tb"><span class="text-medium offset-10px-bottom display-block text-font-sec">Offering creative services of the highest quality</span>
                    <h4 class="text-font-sec text-light-gray">The leading provider of worthy digital experiences since 1999</h4>
                    <p class="text-extra-large width-85 md-width-100">Our team delivers top-notch digital solutions for our clients to maintain their competitive advantage online.</p>
                    <p class="width-85 md-width-100">
                        All kinds of companies worldwide have been gaining the advantage of collaborating with us since our establishment. We work with owners and entrepreneurs to help them build a sustainable business through data-driven creative marketing, branding, web design, and development that are all aimed at moving the revenue needle. We’re a true business partner and our dedicated industry practice can help you define and meet specific business goals.</p><a class="btn btn-small offset-35px-top btn-white" href="<?php echo base_url(); ?>about_us">Read more</a>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 position-relative sm-height-500px xs-height-350px cover-background wow fadeInRight" style="background-image: url('<?php echo base_url(); ?>assets/user/images/home-classic-one-page-bg-03.jpg');"></div>
        </div>
    </div>
</section>
<?php if ($allServices) { ?>
    <section class="wow fadeIn" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 text-center center-col offset-eight-bottom xs-offset-30px-bottom"><span class="text-font-sec text-secondary text-medium offset-5px-bottom display-block">Solutions your business needs</span>
                    <h5 class="text-light text-extra-dark-gray">MService offers top quality services for all kinds of companies</h5>
                </div>
            </div>
            <div class="row">
                <?php
                if (!$allServices) {
                    ?>
                    <div class="col-md-12 col-sm-12 col-xs-12 xs-offset-30px-bottom wow fadeInUp xs-text-center">
                        <center><h6 class="text-light text-dark-gray"> No Service Available !</h6></center>
                    </div>
                    <?php
                } else {
                    foreach ($allServices as $key) {
                        ?>
                        <div class="col-md-4 col-sm-4 col-xs-12 xs-offset-30px-bottom wow fadeInUp last-paragraph-no-margin xs-text-center">
                            <div class="offset-ten-bottom overflow-hidden image-hover-style-1 sm-offset-20px-bottom"><img src="<?php echo base_url(); ?><?php echo $key['service_image']; ?>" alt="<?php echo $key['service_name']; ?> image" onerror="this.src='<?php echo base_url(); ?>assets/images/default.png'" style="height: 250px;width: 100%"></div><a class="text-font-sec offset-5px-bottom display-block text-extra-dark-gray text-medium text-uppercase text-small"><?php echo $key['service_name']; ?></a>
                            <p class="width-95 sm-width-100"><?php echo $key['service_description']; ?></p>
                            <div class="separator-line-horrizontal-full bg-medium-light-gray offset-20px-tb sm-offset-15px-tb"></div>
                        </div>      
                        <?php
                    }
                    echo '<div class="col-md-12"><a class="btn btn-dark-gray wow fadeInUp btn-medium text-small pull-right" href="' . base_url() . 'services" style="">View all Services <i class="fa fa-chevron-right"></i></a></div>';
                }
                ?>
            </div>    
        </div>
    </section>
<?php } ?> 
<section class="section parallax-container bg-extra-dark-gray text-center" data-parallax-img="<?php echo base_url(); ?>assets/user/images/home-corporate-bg-02.jpg">
    <div class="parallax-content">
        <div class="container-fluid position-relative">
            <div class="row equalize sm-equalize-auto">
                <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 display-table wow fadeIn" data-wow-delay="0.2s">
                    <div class="display-table-cell vertical-align-middle">
                        <div class="width-75 md-width-100 inset-three-lr xs-no-padding-lr xs-no-padding-bottom" style="margin-left: auto; margin-right: auto">
                            <h4 class="text-font-sec text-white">We create websites that improve your business</h4>
                            <p class="text-white">Our team regularly works on designing responsive websites for our clients to present their products the best way. From responsive landing pages to complex eCommerce solutions, we can handle anything and we guarantee that you will be satisfied with the result.</p><a class="btn btn-white btn-small text-extra-small border-radius-4 offset-20px-tb sm-no-offset-bottom" href="<?php echo base_url(); ?>about_us">Learn more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if ($allPortfolios) { ?>
    <section class="wow fadeIn inset-90px-top sm-padding-50px-top xs-padding-30px-top" id="work">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 center-col offset-eight-bottom text-center last-paragraph-no-margin sm-offset-40px-bottom xs-offset-30px-bottom">
                    <h5 class="text-font-sec text-semi-bold text-extra-dark-gray text-uppercase offset-15px-bottom">Latest Works</h5>
                    <p class="no-offset-bottom">MService team creates diverse products and offers highly creative services. We design solutions for businesses small and large across a variety of sectors and industries. In our portfolio, you can find the best creative projects we have created since our establishment.</p>
                </div>
            </div>
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
                                                <div class="portfolio-img"><img src="<?php echo base_url(); ?><?php echo $imgArr[0]; ?>" onerror="this.src='<?php echo base_url(); ?>assets/images/default.png'" alt=""></div>
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
                    <div class="col-md-12">
                        <a class="btn btn-dark-gray wow fadeInUp btn-medium text-small pull-right" href="<?php echo base_url(); ?>viewportfolio" style="margin: 40px 0 0 0">View all Portfolios<i class="fa fa-chevron-right"></i></a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
<?php } ?>
<?php if ($allTestimonials) { ?>
    <section class="bg-light-gray wow fadeIn" id="people">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12 center-col offset-eight-bottom sm-offset-40px-bottom xs-offset-30px-bottom text-center">
                    <div class="text-font-sec text-medium-gray offset-5px-bottom text-uppercase text-small">Testimonials</div>
                    <h5 class="text-font-sec text-extra-dark-gray">Take a look at what our clients say</h5>
                </div>
            </div>
            <div class="row position-relative">
                <?php
                if (!$allTestimonials) {
                    ?>
                    <div class="col-md-12 col-sm-12 col-xs-12 xs-offset-30px-bottom wow fadeInUp xs-text-center">
                        <center><h6 class="text-light text-dark-gray"> No Testimonials Available </h6></center>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="swiper-container swiper-pagination-bottom black-move blog-slider swiper-three-slides">
                        <div class="swiper-wrapper">
                            <?php
                            foreach ($allTestimonials as $key) {
                                ?>
                                <div class="col-md-4 col-sm-6 col-xs-12 swiper-slide sm-offset-four-bottom">
                                    <div class="offset-half-all bg-white box-shadow-light text-center inset-fourteen-all xs-padding-30px-all"><img class="border-radius-100 width-40 offset-25px-bottom sm-offset-15px-bottom" src="<?php echo base_url(); ?><?php echo $key['client_image']; ?>" alt="" onerror="this.src='<?php echo base_url(); ?>assets/images/user.png'">
                                        <p class="sm-offset-15px-bottom xs-offset-20px-bottom"><?php echo $key['client_comment']; ?></p><span class="text-extra-dark-gray text-small text-uppercase display-block text-line-height-10 text-font-sec text-medium"><?php echo $key['client_name']; ?></span><span class="text-light-gray2 text-extra-small text-uppercase text-medium-gray"><?php echo $key['client_designation']; ?></span>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="swiper-pagination swiper-pagination-three-slides height-auto"></div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
<?php } ?>

<?php if ($all_blogs) { ?>
    <section class="wow fadeIn" style="padding-bottom:0">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12 center-col sm-offset-40px-bottom xs-offset-30px-bottom text-center">
                    <div class="text-font-sec text-medium-gray offset-5px-bottom text-uppercase text-small">Our Blog</div>
                    <h5 class="text-font-sec text-extra-dark-gray">Here are the latest posts by our admin</h5>
                </div>
            </div>
            <div class="row equalize xs-equalize-auto">
                <?php 
                $limit=4;
                foreach ($all_blogs as $key) {
                    if($limit==0){break;}
                    $imgArr=json_decode($key['blog_images'],TRUE);
                    ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 offset-40px-bottom sm-offset-50px-bottom xs-offset-30px-bottom wow fadeInUp">
                        <article class="blog-post blog-post-style2">
                            <div class="blog-post-images overflow-hidden xs-offset-15px-bottom"><a href="<?php echo base_url(); ?>viewblog/info/<?php echo base64_encode('BLOGDETAIL|'.$key['blog_id']); ?>" style="background-color: black">
                                <center><img src="<?php echo base_url(); ?><?php echo $imgArr[0]; ?>" alt="" onerror="this.src='<?php echo base_url(); ?>assets/images/default.png'" style="height: 200px"></center>
                            </a>
                        </div>
                        <div class="post-details">
                            <a class="post-title text-medium text-extra-dark-gray width-90 display-block md-width-100" href="<?php echo base_url(); ?>viewblog/info/<?php echo base64_encode('BLOGDETAIL|'.$key['blog_id']); ?>"  style="padding: 10px 0 0 0"><?php echo $key['blog_title']; ?></a>                            
                            <div class="author"><span  style="padding: 0" class="text-medium-gray text-uppercase text-extra-small display-inline-block"> on <a class="text-medium-gray"><?php echo date('d M Y',strtotime($key['posted_date'])); ?></a></span></div>
                            <div class="separator-line-horrizontal-full bg-medium-light-gray xs-offset-15px-tb"></div>
                        </div>
                    </article>
                </div>
                <?php
                $limit--;
            }
            ?>
            <div class="col-md-12" style="margin-top:0px">
                <a class="btn btn-dark-gray wow fadeInUp btn-medium text-small pull-right" href="<?php echo base_url(); ?>viewblog">View more posts<i class="fa fa-chevron-right"></i></a>
            </div>
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

<section class="section parallax-container wow fadeIn bg-black" data-parallax-img="images/home-classic-start-up-slider-04.jpg" id="contact">
    <div class="parallax-content">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center offset-40x-bottom">
                    <div class="position-relative overflow-hidden width-100">
                        <div class="text-white text-font-sec text-small text-uppercase offset-5px-bottom xs-offset-three-bottom">Complete the form below to find out more about our services </div>
                        <h5 class="offset-55px-bottom text-white text-font-sec text-medium text-uppercase">Request a quote</h5>
                    </div>
                </div>
            </div>
            <form class="rd-mailform text-left" id="contact_us_form" >
                <div class="row row-20">
                    <div class="col-md-6">
                        <div class="form-wrap">
                            <label class="form-label" for="contact-name-3">Name</label>
                            <input class="form-input" id="contact-name-3" type="text" name="name" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-wrap">
                            <label class="form-label" for="contact-phone-3">Phone</label>
                            <input class="form-input" id="contact-phone-3" type="text" name="phone">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-wrap">
                            <label class="form-label" for="contact-email-3">E-Mail</label>
                            <input class="form-input" id="contact-email-3" type="email" name="email" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-wrap">
                            <select class="form-input select select-inline" name="service" data-placeholder="Choose service" data-dropdown-class="select-inline-dropdown">
                                <option value="0" label="placeholder">Choose service</option>
                                <?php
                                if ($allServices) {
                                    foreach ($allServices as $key) {
                                        echo '<option value="' . $key['service_name'] . '">' . ucwords($key['service_name']) . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-wrap">
                            <label class="form-label" for="contact-message-3">Message</label>
                            <textarea class="form-input" id="contact-message-3" name="message" ></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-button group-sm text-center text-lg-left" id="submitContact">
                    <button class="btn btn-secondary btn-rounded btn-large offset-20px-top" type="submit">send message</button>
                </div>
            </form>
            <div id="errMsgContact">
            </div>
        </div>
    </div>
</section>
<script>
    $(function () {
        $("#contact_us_form").submit(function () {
            dataString = $("#contact_us_form").serialize();
            $.ajax({
                type: "POST",
                url: BASE_URL + "homepage/sendContactEmail",
                data: dataString,
                return: false,
                beforeSend: function () {
                    $('#submitContact').html('<span><i class="fa fa-circle-o-notch fa-spin w3-large"></i> Sending message...</span>');
                },
                success: function (data) {
                    $('#errMsgContact').html(data);
                    $('#submitContact').html('<button class="btn btn-secondary btn-rounded btn-large offset-20px-top" type="submit">send message</button>');
                },
                error: function (data) {
                    $('#errMsgContact').html('<p style="background-color: red;margin: 10px;padding: 5px 10px;color: white"><b>Server Error:</b> Something went wrong. Please refresh the page and try again!</p>');
                    $('#submitContact').html('<button class="btn btn-secondary btn-rounded btn-large offset-20px-top" type="submit">send message</button>');
                }
            });
            return false;
        });
    });
</script>
