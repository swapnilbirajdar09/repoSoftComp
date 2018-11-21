<title>All Blogs | SoftComp</title>
<section class="wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-image:url('<?php echo base_url();?>assets/images/blog-post-layout-04-header-01.jpg');padding:80px 0">
    <div class="opacity-medium bg-extra-dark-gray"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 extra-small-screen display-table page-title-large">
                <div class="display-table-cell vertical-align-middle text-center">
                    <!-- start page title-->
                    <h1 class="text-white text-font-sec text-medium letter-spacing-minus-1">Blogs</h1>
                 <span class="text-white opacity6 text-font-sec">Read the latest news from our admin</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section>

    <div class="container" id="megaDiv">
        <div class="row">
            <div class="col-md-9 col-sm-12 col-xs-12 right-sidebar sm-offset-60px-bottom xs-offset-40px-bottom no-inset-left sm-no-padding-right">
                <!-- Blog-->
                <div class="wow fadeIn half-section last-paragraph-no-margin blog-post-style5" id="blog">       
                    <div class="container-fluid">
                        <?php
                        if (!$all_blogs) {
                            ?>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 xs-offset-30px-bottom wow fadeInUp xs-text-center">
                                    <center><h6 class="text-light text-dark-gray"> No Blogs Available !</h6></center>
                                </div>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="row">            
                                <div class="col-md-12 no-inset xs-padding-15px-lr">
                                    <ul class="blog-grid blog-3col gutter-large">
                                        <li class="grid-sizer"></li>
                                        <?php
                                        foreach ($all_blogs as $key) {
                                            $imgArr = json_decode($key['blog_images'], TRUE);
                                            ?>
                                            <li class="grid-item wow fadeInUp last-paragraph-no-margin">
                                                <article class="blog-post">
                                                    <div class="blog-post-images overflow-hidden"><a href="<?php echo base_url(); ?>viewblog/info/<?php echo base64_encode('BLOGDETAIL|' . $key['blog_id']); ?>"><img src="<?php echo base_url(); ?><?php echo $imgArr[0]; ?>" alt=""/></a>
                                                        <div class="blog-categories bg-white text-uppercase text-extra-small text-font-sec"><a href="<?php base_url(); ?>viewblog?category=<?php echo $key['cat_name']; ?>&tokId=<?php echo base64_encode($key['cat_id']); ?>#megaDiv"><?php echo $key['cat_name']; ?></a></div>
                                                    </div>
                                                    <div class="post-details inset-20px-all bg-white sm-padding-20px-all">
                                                        <div class="blog-hover-color"></div><a class="text-font-sec post-title text-medium text-extra-dark-gray width-90 display-block md-width-100 offset-5px-bottom" href="<?php echo base_url(); ?>viewblog/info/<?php echo base64_encode('BLOGDETAIL|' . $key['blog_id']); ?>"><?php echo $key['blog_title']; ?></a>
                                                        <div class="author"><span class="text-medium-gray text-uppercase text-extra-small display-inline-block"><?php echo date("d M Y", strtotime($key['posted_date'])); ?></span></div>
                                                        <div class="separator-line-horrizontal-full bg-medium-gray offset-seven-tb md-offset-four-tb"></div>
                                                    </div>
                                                </article>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <!-- <div class="text-center offset-100px-top sm-offset-50px-top wow fadeInUp">
                                  <div class="pagination text-small text-uppercase text-extra-dark-gray">
                                    <ul>
                                      <li><a href="#"><i class="fa fa-long-arrow-left offset-5px-right xs-display-none"></i> Prev</a></li>
                                      <li class="active"><a href="#">1</a></li>
                                      <li><a href="#">2</a></li>
                                      <li><a href="#">3</a></li>
                                      <li><a href="#">Next<i class="fa fa-long-arrow-right offset-5px-left xs-display-none"></i></a></li>
                                    </ul>
                                  </div>
                                </div> -->
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
                        <a href="<?php echo base_url(); ?>viewblog#megaDiv">All</a>
                        <?php
                        if ($allTags) {
                            foreach ($allTags as $key) {
                                ?>
                                <a href="<?php base_url(); ?>viewblog?tag=<?php echo $key['tag_value']; ?>#megaDiv"><?php echo $key['tag_value']; ?></a>
                                <?php
                            }
                        }
                        ?>
                    </div>
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