<style type="text/css">
    @media (min-width:993px){.w3-hide-large{display:none!important}}
    @media (max-width:600px){.w3-hide-small{display:none!important}}
</style>
<title>All Blogs | <?php echo $company_details[0]['company_name']; ?></title>

<section class="wow fadeIn bg-light-gray inset-35px-tb page-title-small top-space">
    <div class="container">
        <div class="row equalize xs-equalize-auto">
            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table">
                <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                    <h1 class="text-font-sec text-extra-dark-gray text-medium no-offset-bottom text-uppercase"><?php echo $blogDetail[0]['blog_title']; ?></h1>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 display-table text-right xs-text-left xs-offset-10px-top">
                <div class="display-table-cell vertical-align-middle breadcrumb text-small text-font-sec">
                    <ul class="xs-text-center text-uppercase">
                        <li><a class="text-dark-gray" href="#"><?php echo date('M d, Y', strtotime($blogDetail[0]['posted_date'])); ?></a></li>
                        <li class="text-dark-gray"><a href="<?php base_url(); ?>viewblog?category=<?php echo $blogDetail[0]['cat_name']; ?>&tokId=<?php echo base64_encode($blogDetail[0]['cat_id']); ?>#megaDiv"><?php echo $blogDetail[0]['cat_name']; ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12 col-xs-12 right-sidebar sm-offset-60px-bottom xs-offset-20px-bottom no-inset-left sm-no-padding-right">
                <!-- Blog-->
                <div class="wow fadeIn half-section last-paragraph-no-margin blog-post-style5" id="blog">       
                    <div class="container-fluid">
                        <?php
                        if (!$blogDetail) {
                            ?>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 xs-offset-30px-bottom wow fadeInUp xs-text-center">
                                    <center><h6 class="text-light text-dark-gray"> No Data Found for this post !</h6></center>
                                </div>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="row">            
                                <div class="col-md-12 col-sm-12 col-xs-12 blog-details-text last-paragraph-no-margin">
                                    <div class="blog-post-content offset-45px-bottom xs-offset-30px-bottom xs-text-center">
                                        <div class="swiper-full-screen swiper-container white-move">
                                            <div class="swiper-wrapper">
                                                <?php
                                                if ($blogDetail[0]['blog_videos'] != '' && $blogDetail[0]['blog_videos'] != '[""]') {
                                                    foreach (json_decode($blogDetail[0]['blog_videos']) as $key) {
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
                                                if ($blogDetail[0]['blog_images'] != '' && $blogDetail[0]['blog_images'] != '[""]') {
                                                    foreach (json_decode($blogDetail[0]['blog_images']) as $key) {
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
                                    <div class="col-md-12 col-sm-12 col-xs-12 sm-text-center">
                                        <div class="tag-cloud offset-20px-bottom">
                                            <?php
                                            if ($blogDetail[0]['blog_tags'] != '' && $blogDetail[0]['blog_tags'] != '[]') {
                                                foreach (json_decode($blogDetail[0]['blog_tags'], TRUE) as $key) {
                                                    ?>
                                                    <a href="<?php base_url(); ?>viewblog?tag=<?php echo $key; ?>#megaDiv"><?php echo $key; ?></a>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div>
                                        <?php echo $blogDetail[0]['blog_message']; ?>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="divider-full bg-medium-light-gray"></div>
                                    </div>

                                </div>
                            </div>         
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <aside class="col-md-3 col-sm-12 col-xs-12 pull-right">
                <div class="offset-45px-bottom xs-offset-25px-bottom">
                    <div class="text-extra-dark-gray offset-20px-bottom text-font-sec text-uppercase text-medium text-small aside-title"><span>CATEGORIES</span></div>
                    <ul class="list-style-6 offset-50px-bottom text-small">
                        <li><a href="<?php base_url(); ?>viewblog#megaDiv">All</a></li>
                        <?php
                        if ($category_count) {
                            foreach ($category_count as $key) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>viewblog?category=<?php echo $key['category']; ?>&tokId=<?php echo base64_encode($key['cat_id']); ?>#megaDiv"><?php echo $key['category']; ?></a><span><?php echo $key['count']; ?></span></li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
                <!-- Tag Cloud-->
                <div class="offset-45px-bottom xs-offset-25px-bottom">
                    <div class="text-extra-dark-gray offset-25px-bottom text-font-sec text-uppercase text-medium text-small aside-title"><span>Tag cloud</span></div>
                    <div class="tag-cloud">
                        <a href="<?php base_url(); ?>viewblog#megaDiv">All</a>
                        <?php
                        if ($allTags) {
                            foreach ($allTags as $key) {
                                ?>
                                <a href="<?php echo base_url(); ?>viewblog?tag=<?php echo $key['tag_value']; ?>#megaDiv"><?php echo $key['tag_value']; ?></a>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <!-- Popular posts-->
                <div class="offset-45px-bottom xs-offset-25px-bottom">
                    <div class="text-extra-dark-gray offset-25px-bottom text-font-sec text-uppercase text-medium text-small aside-title"><span>Latest posts</span></div>
                    <ul class="latest-post position-relative">
                        <?php
                        if ($all_blogs) {
                            $limit = 5;
                            foreach ($all_blogs as $key) {
                                if ($limit == 0) {
                                    break;
                                }
                                $imgArr = json_decode($key['blog_images'], TRUE);
                                ?>
                                <li>
                                    <figure>
                                        <a href="<?php echo base_url(); ?>viewblog/info/<?php echo base64_encode('BLOGDETAIL|' . $key['blog_id']); ?>">
                                            <img src="<?php echo base_url(); ?><?php echo $imgArr[0]; ?>" style="width: 100%;height: 45px;" alt="">
                                        </a>
                                    </figure>
                                    <div class="display-table-cell vertical-align-top text-small">
                                        <a class="text-extra-dark-gray" href="<?php echo base_url(); ?>viewblog/info/<?php echo base64_encode('BLOGDETAIL|' . $key['blog_id']); ?>"><span class="display-inline-block offset-5px-bottom"><?php echo $key['blog_title']; ?></span></a>
                                        <span class="clearfix text-medium-gray text-small"><?php echo date('M d, Y', strtotime($key['posted_date'])); ?></span></div>
                                </li>
                                <?php
                                $limit--;
                            }
                        }
                        ?>
                    </ul>
                </div>
                <!-- Follow me-->
                <div class="offset-50px-bottom">
                    <?php if ($social_logos != '500') { ?>
                        <div class="text-extra-dark-gray offset-20px-bottom text-font-sec text-uppercase text-medium text-small aside-title"><span>Follow me</span></div>
                        <div class="social-icon-style-1 text-center">
                            <ul class="extra-small-icon">
                                <?php foreach ($social_logos as $row) { ?>  
                                    <li>
                                        <a class="facebook" target="_blank" href="<?php echo $row['social_url']; ?>" title="<?php echo $row['social_link_name']; ?>"><i class="fa <?php echo $row['social_symbole'] ?>"></i></a>
                                    </li>
                                <?php } ?>                      
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            </aside>
        </div>
    </div>
</section>