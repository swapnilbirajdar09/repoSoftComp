<title><?php echo $portfolioDetail[0]['portfolio_name']; ?> | Portfolio Info</title>
<style type="text/css">
@media (min-width:993px){.w3-hide-large{display:none!important}}
@media (max-width:600px){.w3-hide-small{display:none!important}}
</style>
<section class="wow fadeIn bg-light-gray inset-35px-tb page-title-small top-space">
  <div class="container">
    <div class="row equalize xs-equalize-auto">
      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table">
        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
          <h1 class="text-font-sec text-extra-dark-gray text-medium no-offset-bottom text-uppercase">Portfolio Info: <span class="text-small"><?php echo $portfolioDetail[0]['portfolio_name']; ?></span></h1>
        </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12 right-sidebar sm-offset-60px-bottom xs-offset-40px-bottom no-inset-left sm-no-padding-right">
        <div class="col-md-12 col-sm-12 col-xs-12 blog-details-text last-paragraph-no-margin">
          <div class="blog-post-content offset-45px-bottom xs-offset-30px-bottom xs-text-center">
            <div class="swiper-full-screen swiper-container white-move">
              <div class="swiper-wrapper">
                <!-- <div class="fit-videos"> -->
                  <?php
                  if ($portfolioDetail[0]['portfolio_videos'] != '' && $portfolioDetail[0]['portfolio_videos'] != '[""]') {
                    foreach (json_decode($portfolioDetail[0]['portfolio_videos']) as $key) {
                      echo '<div class="swiper-slide">
                      <center>
                      <iframe style="width:100%;height:600px" class="w3-hide-small" src="' . $key . '" allowfullscreen=""></iframe>
                      <iframe style="width:100%;height:200px" class="w3-hide-large" src="' . $key . '" allowfullscreen=""></iframe>
                      </center>
                      </div>';
                    }
                  }
                  ?>
                  <!-- </div> -->
                  <?php
                  if ($portfolioDetail[0]['portfolio_images'] != '' && $portfolioDetail[0]['portfolio_images'] != '[""]') {
                    foreach (json_decode($portfolioDetail[0]['portfolio_images']) as $key) {
                      echo '<div class="swiper-slide">
                      <center>
                      <img src="' . base_url() . $key . '" alt="" class="w3-hide-small" style="height:600px">
                      <img src="' . base_url() . $key . '" alt="" class="w3-hide-large" style="height:200px">
                      </center>
                      </div>';
                    }
                  }
                  ?>

                </div>
                <div class="swiper-pagination swiper-pagination-square swiper-pagination-white"></div>
                <div class="swiper-button-next swiper-button-black-highlight"></div>
                <div class="swiper-button-prev swiper-button-black-highlight"></div>
              </div>
            </div>
            <!-- Main Layout-->
            <div class="row">
              <div class="col-md-6 sm-offset-50px-bottom xs-offset-30px-bottom wow fadeIn">
                <h5 class="text-font-sec text-extra-dark-gray"><?php echo $portfolioDetail[0]['portfolio_name']; ?></h5>
                <p><?php echo $portfolioDetail[0]['portfolio_description']; ?></p>
              </div>
              <div class="col-md-4 col-md-offset-2 wow fadeIn">
                <ul class="list-style-8">
                  <li class="text-uppercase text-extra-dark-gray"><span class="display-block text-extra-small text-medium-gray">Client</span><?php
                  if ($portfolioDetail[0]['client_name'] == '') {
                    echo '<span class="text-light-gray">Not Available</span>';
                  } else {
                    echo $portfolioDetail[0]['client_name'];
                  }
                  ?></li>
                  <li class="text-uppercase text-extra-dark-gray"><span class="display-block text-extra-small text-medium-gray">Category</span><?php echo $portfolioDetail[0]['cat_name']; ?></li>
                  <li class="text-uppercase text-extra-dark-gray">
                    <span class="display-block text-extra-small text-medium-gray">Useful Links</span>
                    <?php
                    if ($portfolioDetail[0]['portfolio_link'] != '' && $portfolioDetail[0]['portfolio_link'] != '[""]') {
                      foreach (json_decode($portfolioDetail[0]['portfolio_link']) as $key) {
                        echo '<a class="text-extra-dark-gray" href="' . $key . '">' . ucwords($key) . '</a>';
                      }
                    } else {
                      echo '<span class="text-light-gray">Not Available</span>';
                    }
                    ?>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="wow fadeIn bg-light-gray">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 center-col offset-eight-bottom text-center">
          <div class="text-font-sec text-medium-gray offset-10px-bottom text-uppercase text-small">FEATURED PROJECTS</div>
          <h5 class="text-font-sec text-extra-dark-gray">Take a look at our award-winning projects</h5>
        </div>
      </div>
    </div>
    <div class="container-fluid inset-five-lr">
      <div class="row no-margin">
        <?php
        if (!$featuredPortfolio) {
          ?>
          <div class="col-md-12 col-sm-12 col-xs-12 xs-offset-30px-bottom xs-text-center">yguiguhuh
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
                foreach ($featuredPortfolio as $key) {
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