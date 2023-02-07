<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php echo view('home/template/header'); ?>
<input type="hidden" name="" value="<?php echo date_default_timezone_get(); ?>">
<section class="slider_main" style="display:none;">
    <div class="landing-banner-carousel d-sm-block d-lg-block">
        <div id="index-banner" class="owl-carousel owl-theme">
            <div class="item">
                <img src="<?php echo base_url(); ?>/assets/front/images/banner1.jpg">
                <div class="banner_infos">Bridging Gap btw Service Providers & Users in the Emirates</div>
            </div>
            <div class="item">
                <img src="<?php echo base_url(); ?>/assets/front/images/banner4.jpg">
                <div class="banner_infos">Rejuvenate, Unwind & Relax, Indulge in Leisure Activities</div>
            </div>
            <div class="item">
                <img src="<?php echo base_url(); ?>/assets/front/images/banner2.jpg">
                <div class="banner_infos">Discover a different world with the Best Tourist Places</div>
            </div>
            <div class="item">
                <img src="<?php echo base_url(); ?>/assets/front/images/banner3.jpg">
                <div class="banner_infos">Explore the Best Local Restaurants & Savor Delicacies</div>
            </div>
        </div>
        <div class="slider_form">
            <form action="<?= base_url(); ?>/search/?" method="get" autocomplete="false">
                <div class="select-wrap form-group"><select name="category" id="category" class="form-control form-item__element--select">
                        <?php
                        if (is_array($categories) && count($categories) > 0) {
                            foreach ($categories as $category) {  ?>
                                <option value="<?php echo md5($category['id']); ?>"><?php echo $category['name']; ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Search Business..." />
                </div>
                <div class="form-submit">
                    <!--<input type="submit" id="search_business" value="Search" />-->
                    <button type="submit" id="search_business"><img src="<?php echo base_url(); ?>/assets/front/images/submit_icon.png"></button>
                </div>
            </form>
        </div>
    </div>
</section>
<section class="slider_main">
    <div class="ray_pslider ">
        <div id="demo" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item ci_one active">
                    <div class="banner_infos">
                        <div class="b_map_mark"><img src="<?= base_url(); ?>/assets/front/images/map_mark.png" /></div>
                        Top-Rated Dubai Business Directory <b>Discover Popular Local Businesses in Your City</b>
                    </div>
                </div>
            </div>
            <!-- Left and right controls -->
        </div>
        <div class="slider_form live">
            <input type="hidden" name="category_keyword" id="category_keyword" value="<?= md5($categories[0]['id']); ?>" class="form-control" />
            <form method="get" action="<?= base_url(); ?>/search">
                <div class="select-wrap form-group"><select name="z" id="category" class="form-control form-item__element--select">
                        <!-- <option selected value="">Select Category</option> -->
                        <?php
                        if (is_array($categories) && count($categories) > 0) {
                            foreach ($categories as $category) {  ?>
                                <option value="<?= md5($category['id']); ?>"><?= $category['name']; ?></option>
                                <!-- <option value="<?= md5($category['id']); ?>" <?= ($category['id'] == "55") ? 'selected="selected"' : ""; ?>><?= $category['name']; ?></option> -->
                        <?php }
                        } ?>
                    </select>
                </div>

                <div class="form-group location_btn_set">
                    <div class="dist_pos">
                    
                        <select name="d" id="dist_id">
                            <option value="">In Dubai</option>
                            <option class="change_clr" value="location" onclick="getLocation()">&#xf041; Current Location</option>
                            <?php
                            if (is_array($districts) && count($districts) > 0) {
                                foreach ($districts as $district) {  ?>
                                    <option value="<?= md5($district['id']); ?>">In <?= $district['name']; ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                    <input type=" text" name="query" id="query" autocomplete="off" class="form-control" placeholder="Search Here..." />
                    <!-- <button onclick="getLocation()" type="button" class="btn btn-primaryy butn_position" id="search_business"><i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp; Current Location</button> -->
                    <div id="livesearch" style="display:none"></div>
                </div>

                <div class="form-submit">
                    <!--<input type="submit" id="search_business" value="Search" />-->
                    <button type="button" id="search_business"><img src="<?= base_url(); ?>/assets/front/images/submit_icon.png"></button>
                </div>
            </form>
        </div>
    </div>
</section>
<section class="our_features_grid feature_icon_blocks">
    <div class="container">
        <!--<div class="sec-title">Why Rely on <span>Dubai Local?</span></div>-->
        <div class="feature_iconouter">
            <div class="row">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration=".6s" data-wow-delay=".2s">
                    <a href="<?= base_url(); ?>/dubai-explore">
                        <div class="feature_main">
                            <div class="feature_img">
                                <img src="<?= base_url(); ?>/assets/front/images/du_icon1.svg">
                            </div>
                            <div class="feature_infos">
                                <h3>Explore</h3>
                                <!--<p>Reliable and detailed information that helps users make meaningful connections with the right business. </p>-->
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration=".6s" data-wow-delay=".2s">
                    <a href="<?= base_url(); ?>/browse-business-directory">
                        <div class="feature_main">
                            <div class="feature_img">
                                <img src="<?= base_url(); ?>/assets/front/images/du_icon2.svg">
                            </div>
                            <div class="feature_infos">
                                <h3> Business</h3>
                                <!--<p>Dubai Local business directory covers a broad spectrum of the business type being a one-stop solution for your requirements.</p>-->
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration=".6s" data-wow-delay=".2s">
                    <a href="<?= base_url(); ?>/category/restaurants">
                        <div class="feature_main">
                            <div class="feature_img">
                                <img src="<?= base_url(); ?>/assets/front/images/du_icon5.svg">
                            </div>
                            <div class="feature_infos">
                                <h3> Restaurants</h3>
                                <!--<p>Reliable and detailed information that helps users make meaningful connections with the right business. </p>-->
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration=".6s" data-wow-delay=".2s">
                    <a href="<?= base_url(); ?>/category/tour-travel">
                        <div class="feature_main">
                            <div class="feature_img">
                                <img src="<?= base_url(); ?>/assets/front/images/du_icon3.svg">
                            </div>
                            <div class="feature_infos">
                                <h3>Tour & Travel</h3>
                                <!--<p>We only list reliable businesses that you can completely trust. The Business Database we compile is verified quarterly.</p>-->
                            </div>
                        </div>
                    </a>
                </div>






            </div>
        </div>
        <div class="feature_iconouter">
            <div class="row">


                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration=".6s" data-wow-delay=".2s">
                    <a href="<?= base_url(); ?>/category/entertainment">
                        <div class="feature_main">
                            <div class="feature_img">
                                <img src="<?= base_url(); ?>/assets/front/images/entertainment-hm.svg">
                            </div>
                            <div class="feature_infos">
                                <h3>Entertainment</h3>
                                <!--<p>Our portal helps you save, time, effort, and money as you can add filters to narrow down your choice & find the right business.</p>-->
                                <!-- <div class="career_btn"><a href="#">Learn More</a></div> -->
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration=".6s" data-wow-delay=".2s">
                    <a href="<?= base_url(); ?>/category/automobile">
                        <div class="feature_main">
                            <div class="feature_img">
                                <img src="<?= base_url(); ?>/assets/front/images/automobile-hm.svg">
                            </div>
                            <div class="feature_infos">
                                <h3>Automobile</h3>
                                <!--<p>Our portal helps you save, time, effort, and money as you can add filters to narrow down your choice & find the right business.</p>-->
                                <!-- <div class="career_btn"><a href="#">Learn More</a></div> -->
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration=".6s" data-wow-delay=".2s">
                    <a href="<?= base_url(); ?>/category/beauty-spa">
                        <div class="feature_main">
                            <div class="feature_img">
                                <img src="<?= base_url(); ?>/assets/front/images/beauty-spa-hm.svg">
                            </div>
                            <div class="feature_infos">
                                <h3>Beauty & Spa </h3>
                                <!--<p>Dubai Local business directory covers a broad spectrum of the business type being a one-stop solution for your requirements.</p>-->
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration=".6s" data-wow-delay=".2s">
                    <a href="<?= base_url(); ?>/browse-business-directory">
                        <div class="feature_main">
                            <div class="feature_img">
                                <!-- <img src="<?= base_url(); ?>/assets/front/images/du_icon7.svg"> -->
                            </div>
                            <div class="feature_infos feature_more">
                                <h3>[<i class="fa fa-plus" aria-hidden="true"></i>] More</h3>
                                <!--<p>We only list reliable businesses that you can completely trust. The Business Database we compile is verified quarterly.</p>-->
                            </div>
                    </a>
                </div>
            </div>



        </div>
    </div>
    </div>
</section>
<?php echo view('home/sections/business_listing_grid');
?>
<section class="how-it-works">
    <div class="container">
        <div class="how_it_main">
            <div class="row">
                <div class="col-md-6">
                    <div class="left_midtitle">
                        <div class="sec-title">Let Your Businesses <span>Dominate Search Results</span></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="how_workgrid">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="hiw-inner wow fadeInUp">
                                    <div class="mb-2">
                                        <img src="<?= base_url(); ?>/assets/front/images/how-it-works-icon-1.png" class="img-fluid" alt="">
                                    </div>
                                    <h4>Customer Insights</h4>
                                    <p>Get insights into potential clients and the industry you serve. This will enhance your decision-making & business growth.</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="hiw-inner wow fadeInUp" data-wow-delay=".2s">
                                    <div class="mb-2">
                                        <img src="<?= base_url(); ?>/assets/front/images/how-it-works-icon-2.png" class="img-fluid" alt="">
                                    </div>
                                    <h4>Win-win situation</h4>
                                    <p>We help you Identify new leads that turn into your loyal customers. This saves your effort, time, and money</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="hiw-inner wow fadeInUp" data-wow-delay=".4s">
                                    <div class="mb-2">
                                        <img src="<?= base_url(); ?>/assets/front/images/how-it-works-icon-3.png" class="img-fluid" alt="">
                                    </div>
                                    <h4>Long-term Relationship</h4>
                                    <p>Listing with us is the simplest way to reach and engage with your target audience. Build long-term profitable customer relationships.</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="hiw-inner wow fadeInUp" data-wow-delay=".4s">
                                    <div class="mb-2">
                                        <img src="<?= base_url(); ?>/assets/front/images/online_lead.png" class="img-fluid" alt="">
                                    </div>
                                    <h4>Enhance Online Visibility & Gain More Leads</h4>
                                    <p>Partner with our smart online business directory to get noticed by your potential customers.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<?php echo view('home/sections/popular_categories'); ?>

<section class="tips-articles upcomingmain">
    <div class="container">
        <div class="sec-title">Upcoming Events in<span> Dubai</span></div>
        <div class="upcome_in">
            <div id="upcoming_events" class="owl-carousel owl-theme">

                <div class="item">
                    <div class="card article-card border-0">
                        <a href="<?= getenv('BLOG_BASE_URL'); ?>/iifa-rocks-2023-in-abu-dhabi-10-feb-2023//" target="_blank">
                            <div class="position-relative"> <img class="card-img" src="<?= getenv('BLOG_BASE_URL'); ?>/wp-content/uploads/2023/01/24.jpg" alt="Card image"> </div>
                            <div class="card-body px-0 pt-3"> <span class="article-types">IIFA Rocks 2023 in Abu Dhabi (10 Feb 2023)</span>
                                <!--<h5 class="card-title article-heading"><a href="#" class="btn-link text-reset fw-bold"><span class="ev_price">53.32 USD</span> <span class="ev_user"><i class="fa fa-user" aria-hidden="true"></i> 395</span> <span class="ev_views"><i class="fa fa-eye" aria-hidden="true"></i> 15 looking now</span></a></h5>-->
                                <!--<p class="article-date"><span>May 01st, 2022</span> by <span class="created-by">Admin</span></p>-->
                            </div>
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="card article-card border-0">
                        <a href="<?= getenv('BLOG_BASE_URL'); ?>kevin-hart-reality-check-at-etihad-arena-in-abu-dhabi-22-feb-2023/" target="_blank">
                            <div class="position-relative"> <img class="card-img" src="<?= getenv('BLOG_BASE_URL'); ?>/wp-content/uploads/2023/01/25.jpg" alt="Card image"> </div>
                            <div class="card-body px-0 pt-3"> <span class="article-types">Kevin Hart : Reality Check at Etihad Arena in Abu Dhabi (22 Feb 2023)</span>
                                <!-- <h5 class="card-title article-heading"><a href="#" class="btn-link text-reset fw-bold"><span class="ev_price">14.03 USD</span> <span class="ev_user"><i class="fa fa-user" aria-hidden="true"></i> 305</span> <span class="ev_views"><i class="fa fa-eye" aria-hidden="true"></i> 9 looking now</span></a></h5>-->
                                <!--<p class="article-date"><span>May 01st, 2022</span> by <span class="created-by">Admin</span></p>-->
                            </div>
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="card article-card border-0">
                        <a href="<?= getenv('BLOG_BASE_URL'); ?>the-gipsy-kings-by-tonino-baliardo-2023-at-dubai-opera-05-feb-2023/" target="_blank">
                            <div class="position-relative"> <img class="card-img" src="<?= getenv('BLOG_BASE_URL'); ?>/wp-content/uploads/2023/01/23.jpg" alt="Card image"> </div>
                            <div class="card-body px-0 pt-3"> <span class="article-types">The Gipsy Kings by Tonino Baliardo 2023 at Dubai Opera (05 Feb 2023)</span>
                                <!-- <h5 class="card-title article-heading"><a href="#" class="btn-link text-reset fw-bold"><span class="ev_price">14.03 USD</span> <span class="ev_user"><i class="fa fa-user" aria-hidden="true"></i> 305</span> <span class="ev_views"><i class="fa fa-eye" aria-hidden="true"></i> 9 looking now</span></a></h5>-->
                                <!--<p class="article-date"><span>May 01st, 2022</span> by <span class="created-by">Admin</span></p>-->
                            </div>
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="card article-card border-0">
                        <a href="<?= getenv('BLOG_BASE_URL'); ?>jackson-wang-magic-man-world-tour-2023-dubai-04-feb-2023/" target="_blank">
                            <div class="position-relative"> <img class="card-img" src="<?= getenv('BLOG_BASE_URL'); ?>/wp-content/uploads/2023/01/22.jpg" alt="Card image"> </div>
                            <div class="card-body px-0 pt-3"> <span class="article-types">Jackson Wang Magic Man World Tour 2023 Dubai (04 Feb 2023)</span>
                                <!-- <h5 class="card-title article-heading"><a href="#" class="btn-link text-reset fw-bold"><span class="ev_price">14.03 USD</span> <span class="ev_user"><i class="fa fa-user" aria-hidden="true"></i> 305</span> <span class="ev_views"><i class="fa fa-eye" aria-hidden="true"></i> 9 looking now</span></a></h5>-->
                                <!--<p class="article-date"><span>May 01st, 2022</span> by <span class="created-by">Admin</span></p>-->
                            </div>
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="card article-card border-0">
                        <a href="<?= getenv('BLOG_BASE_URL'); ?>tom-odell-in-dubai-04-feb-2023/" target="_blank">
                            <div class="position-relative"> <img class="card-img" src="<?= getenv('BLOG_BASE_URL'); ?>/wp-content/uploads/2023/01/21.jpg" alt="Card image"> </div>
                            <div class="card-body px-0 pt-3"> <span class="article-types">Tom Odell in Dubai (04 Feb 2023)</span>
                                <!-- <h5 class="card-title article-heading"><a href="#" class="btn-link text-reset fw-bold"><span class="ev_price">14.03 USD</span> <span class="ev_user"><i class="fa fa-user" aria-hidden="true"></i> 305</span> <span class="ev_views"><i class="fa fa-eye" aria-hidden="true"></i> 9 looking now</span></a></h5>-->
                                <!--<p class="article-date"><span>May 01st, 2022</span> by <span class="created-by">Admin</span></p>-->
                            </div>
                        </a>
                    </div>
                </div>



            </div>
        </div>
    </div>
</section>

<section class="our_features_grid our_features_grid_two">
    <div class="container">
        <div class="sec-title">Why Rely on <span>Dubai Local?</span></div>
        <div class="row">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration=".6s" data-wow-delay=".2s">
                <div class="feature_main">
                    <div class="feature_img">
                        <img src="<?= base_url(); ?>/assets/front/images/dubai-Authoritative.jpg">
                    </div>
                    <div class="feature_infos">
                        <h3>Authoritative</h3>
                        <p>Reliable and detailed information that helps users make meaningful connections with the right business. </p>
                        <!-- <div class="career_btn"><a href="#">Learn More</a></div> -->
                    </div>
                </div>
                <!--feature_main-->
            </div>
            <!--col-lg-3-->
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration=".6s" data-wow-delay=".2s">
                <div class="feature_main">
                    <div class="feature_img">
                        <img src="<?= base_url(); ?>/assets/front/images/dubai-Comprehensive.jpg">
                    </div>
                    <div class="feature_infos">
                        <h3>Comprehensive</h3>
                        <p>Dubai Local business directory covers a broad spectrum of the business type being a one-stop solution for your requirements.</p>
                        <!-- <div class="career_btn"><a href="#">Learn More</a></div> -->
                    </div>
                </div>
                <!--feature_main-->
            </div>
            <!--col-lg-3-->
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration=".6s" data-wow-delay=".2s">
                <div class="feature_main">
                    <div class="feature_img">
                        <img src="<?= base_url(); ?>/assets/front/images/dubai-accuracy.jpg">
                    </div>
                    <div class="feature_infos">
                        <h3>Accurate</h3>
                        <p>We only list reliable businesses that you can completely trust. The Business Database we compile is verified quarterly.</p>
                        <!-- <div class="career_btn"><a href="#">Learn More</a></div> -->
                    </div>
                </div>
                <!--feature_main-->
            </div>
            <!--col-lg-3-->
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration=".6s" data-wow-delay=".2s">
                <div class="feature_main">
                    <div class="feature_img">
                        <img src="<?= base_url(); ?>/assets/front/images/dubai-Save-time-&-effort.jpg">
                    </div>
                    <div class="feature_infos">
                        <h3>Save time & effort</h3>
                        <p>Our portal helps you save, time, effort, and money as you can add filters to narrow down your choice & find the right business.</p>
                        <!-- <div class="career_btn"><a href="#">Learn More</a></div> -->
                    </div>
                </div>
                <!--feature_main-->
            </div>
            <!--col-lg-3-->
        </div>

</section>
<?php //echo view('home/sections/latest_business'); 
?>
<?php //echo view('home/sections/browse_cities'); 
?>
<section class="our_features_grid our_features_grid_two exploredubai">
    <div class="container">

        <div class="sec-title">Explore <span> Dubai</span></div>
        <div class="exploredubai_main">
            <div class="row">
                <div class="col-md-8">
                    <div class="ed_cols">
                        <!-- <div id="random_quotes1">
                        </div> -->
                        <div class="expo_main dubai_blur">
                        <!-- <div class="expo_main"> -->
                            <a href="<?= $blog_explore[0]['wpLink']; ?>" target="_blank">
                                <div class="expo_img">
                                    <div class="img-wrapp">

                                        <img style="max-width: 100%; width: 100%; max-height: 500px; object-fit: cover;" src="<?= $blog_explore[0]['wpImageURL']; ?>" alt=<?= $blog_explore[0]['wpTitle']; ?>>

                                    </div>
                                </div>
                            </a>
                            <div class="expo_infos">
                                <h3>
                                    <a href="<?= $blog_explore[0]['wpLink']; ?>" target="_blank">
                                        <?= $blog_explore[0]['wpTitle']; ?>
                                    </a>
                                </h3>
                                <p><?= $blog_explore[0]['wpContent']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ed_cols_right">
                        <?php $j = 0;
                        // if (is_array($blog_explore) && count($blog_explore) > 0) {
                            // foreach ($blog_explore as $single_blog_explore) {
                                for ($i = 0; $i <= 1; $i++) { ?>
                                <div class="expo_main dubai_blur">
                                <!-- <div class="expo_main"> -->
                                    <a href="<?= $single_blog_explore['wpLink']  ?>" target="_blank">
                                        <div class="expo_img">
                                            <div class="img-wrapp">

                                                <img style="max-width: 100%; width: 100%; max-height: 500px; object-fit: cover;" src="<?= $single_blog_explore['wpImageURL'] ?>" alt=<?= $single_blog_explore['wpTitle'] ?>>

                                            </div>
                                        </div>
                                    </a>
                                    <div class="expo_infos">
                                        <h3>
                                            <a href="<?= $single_blog_explore['wpLink']  ?>" target="_blank">
                                                <?= $single_blog_explore['wpTitle'] ?>
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                        <?php }
                        // } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4"> <a href="<?= base_url(); ?>/dubai-explore" target="_blank" class="btn btn-primary rounded-0 theme-btn-red wow fadeInUp" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">Explore Dubai Now</a> </div>
    </div>
</section>
<?php echo view('home/sections/articles'); ?>
<?php echo view('home/sections/claim_business'); ?>
<?php echo view('home/template/footer'); ?>