<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?= $this->extend('home/layouts/app') ?>
<?= $this->section('content') ?>

<input type="hidden" name="" value="<?php echo date_default_timezone_get(); ?>">

<section class="slider_main">
    <div class="ray_pslider ">
        <div id="" class="carousel slide">

            <div class="carousel-inner">
                <div class="carousel-item ci_one active" style="background: url(<?= base_url(); ?>/assets/front/images/banner1.jpg) left top no-repeat;">
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
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration=".6s" data-wow-delay=".2s">
                    <a href="<?= base_url(); ?>/browse-business-directory">
                        <div class="feature_main">
                            <div class="feature_img">
                            </div>
                            <div class="feature_infos feature_more">
                                <h3>[<i class="fa fa-plus" aria-hidden="true"></i>] More</h3>
                            </div>
                    </a>
                </div>
            </div>



        </div>
    </div>
    </div>
</section>
<?= $this->include('home/sections/business_listing_grid') ?>
<section class="how-it-works">
    <div class="container">
        <div class="how_it_main">
            <div class="row">
                <div class="col-md-6">
                    <div class="left_midtitle">
                        <div class="sec-title">Let Your Business <span>Dominate Search Results</span></div>
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
                                    <h4>Win-Win Situation</h4>
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
<?= $this->include('home/sections/popular_categories') ?>
<section class="tips-articles upcomingmain">
    <div class="container">
        <div class="sec-title">Upcoming Events in<span> Dubai</span></div>
        <div class="upcome_in">
            <div id="upcoming_events" class="owl-carousel owl-theme">

                <div class="item">
                    <div class="card article-card border-0">
                        <a href="<?= getenv('BLOG_BASE_URL'); ?>/iifa-rocks-2023-in-abu-dhabi-10-feb-2023//" target="_blank">
                            <div class="position-relative"> <img class="card-img" src="<?= getenv('BLOG_BASE_URL'); ?>/wp-content/uploads/2023/01/24-440x248.jpg" alt="Card image"> </div>
                            <div class="card-body px-0 pt-3"> <span class="article-types">IIFA Rocks 2023 in Abu Dhabi (10 Feb 2023)</span>

                            </div>
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="card article-card border-0">
                        <a href="<?= getenv('BLOG_BASE_URL'); ?>/kevin-hart-reality-check-at-etihad-arena-in-abu-dhabi-22-feb-2023/" target="_blank">
                            <div class="position-relative"> <img class="card-img" src="<?= getenv('BLOG_BASE_URL'); ?>/wp-content/uploads/2023/01/25-440x248.jpg" alt="Card image"> </div>
                            <div class="card-body px-0 pt-3"> <span class="article-types">Kevin Hart : Reality Check at Etihad Arena in Abu Dhabi (22 Feb 2023)</span>

                            </div>
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="card article-card border-0">
                        <a href="<?= getenv('BLOG_BASE_URL'); ?>/the-gipsy-kings-by-tonino-baliardo-2023-at-dubai-opera-05-feb-2023/" target="_blank">
                            <div class="position-relative"> <img class="card-img" src="<?= getenv('BLOG_BASE_URL'); ?>/wp-content/uploads/2023/01/23-440x248.jpg" alt="Card image"> </div>
                            <div class="card-body px-0 pt-3"> <span class="article-types">The Gipsy Kings by Tonino Baliardo 2023 at Dubai Opera (05 Feb 2023)</span>

                            </div>
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="card article-card border-0">
                        <a href="<?= getenv('BLOG_BASE_URL'); ?>/jackson-wang-magic-man-world-tour-2023-dubai-04-feb-2023/" target="_blank">
                            <div class="position-relative"> <img class="card-img" src="<?= getenv('BLOG_BASE_URL'); ?>/wp-content/uploads/2023/01/22-440x248.jpg" alt="Card image"> </div>
                            <div class="card-body px-0 pt-3"> <span class="article-types">Jackson Wang Magic Man World Tour 2023 Dubai (04 Feb 2023)</span>

                            </div>
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="card article-card border-0">
                        <a href="<?= getenv('BLOG_BASE_URL'); ?>/tom-odell-in-dubai-04-feb-2023/" target="_blank">
                            <div class="position-relative"> <img class="card-img" src="<?= getenv('BLOG_BASE_URL'); ?>/wp-content/uploads/2023/01/21-440x248.jpg" alt="Card image"> </div>
                            <div class="card-body px-0 pt-3"> <span class="article-types">Tom Odell in Dubai (04 Feb 2023)</span>

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
                    </div>
                </div>
                <!--feature_main-->
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration=".6s" data-wow-delay=".2s">
                <div class="feature_main">
                    <div class="feature_img">
                        <img src="<?= base_url(); ?>/assets/front/images/dubai-Comprehensive.jpg">
                    </div>
                    <div class="feature_infos">
                        <h3>Comprehensive</h3>
                        <p>Dubai Local business directory covers a broad spectrum of the business type being a one-stop solution for your requirements.</p>
                    </div>
                </div>
                <!--feature_main-->
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration=".6s" data-wow-delay=".2s">
                <div class="feature_main">
                    <div class="feature_img">
                        <img src="<?= base_url(); ?>/assets/front/images/dubai-accuracy.jpg">
                    </div>
                    <div class="feature_infos">
                        <h3>Accurate</h3>
                        <p>We only list reliable businesses that you can completely trust. The Business Database we compile is verified quarterly.</p>
                    </div>
                </div>
                <!--feature_main-->
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration=".6s" data-wow-delay=".2s">
                <div class="feature_main">
                    <div class="feature_img">
                        <img src="<?= base_url(); ?>/assets/front/images/dubai-Save-time-&-effort.jpg">
                    </div>
                    <div class="feature_infos">
                        <h3>Save time & effort</h3>
                        <p>Our portal helps you save, time, effort, and money as you can add filters to narrow down your choice & find the right business.</p>
                    </div>
                </div>
                <!--feature_main-->
            </div>
        </div>

</section>

<section class="our_features_grid our_features_grid_two exploredubai">
    <div class="container">

        <div class="sec-title">Explore <span> Dubai</span></div>
        <div class="exploredubai_main">
            <div class="row">
                <div class="col-md-8">
                    <div class="ed_cols">

                        <div class="expo_main dubai_blur">
                            <a href="#" target="_blank">
                                <div class="expo_img">
                                    <div class="img-wrapp">

                                        <img style="max-width: 100%; width: 100%; max-height: 500px; object-fit: cover;" src="" alt="">

                                    </div>
                                </div>
                            </a>
                            <div class="expo_infos">
                                <h3>
                                    <a href="#" target="_blank">

                                    </a>
                                </h3>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ed_cols_right">
                        <?php $j = 0;
                        for ($i = 0; $i <= 1; $i++) { ?>
                            <div class="expo_main dubai_blur">
                                <a href="#" target="_blank">
                                    <div class="expo_img">
                                        <div class="img-wrapp">

                                            <img style="max-width: 100%; width: 100%; max-height: 500px; object-fit: cover;" src="" alt="">

                                        </div>
                                    </div>
                                </a>
                                <div class="expo_infos">
                                    <h3>
                                        <a href="#" target="_blank">

                                        </a>
                                    </h3>
                                </div>
                            </div>
                        <?php }
                        // } 
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4"> <a href="<?= base_url(); ?>/dubai-explore" target="_blank" class="btn btn-primary rounded-0 theme-btn-red wow fadeInUp" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">Explore Dubai Now</a> </div>
    </div>
</section>
<?= $this->include('home/sections/articles') ?>
<?= $this->include('home/sections/claim_business') ?>
<?= $this->section('javascript') ?>

<script>
    function recaptchaCallback() {
        $('#hiddenRecaptcha').valid();
    };


    $("#search").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "<?php echo base_url('front/index'); ?>",
            data: $("#Form").serialize(),
            cache: false,
            // headers: {"Accepts": "application/json; charset=utf-8"},
            success: function(res) {
                $('.table').html(res);
                // Success message
                console.log(res);
                // debugger;
            },
            error: function(err) {
                //clear all fields
                $("#Form").trigger("reset");
            },
            complete: function() {
                /* setTimeout(function() {
                    $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
                }, 1000); */
            }
        });
    });

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);

            // localStorage.setItem('Latitude', "25.185028");
            // localStorage.setItem('Longitude', "55.264052");
            // $('.ray_pslider #dist_id').after("<input type='hidden' name='latitude' value='" + localStorage.getItem("Latitude") + "'/><input type='hidden' name='longitude' value='" + localStorage.getItem("Longitude") + "'/>");
            return "1";
        } else {
            localStorage.setItem('Latitude', "");
            localStorage.setItem('Longitude', "");
        }
    }

    function showPosition(position) {
        // localStorage.setItem('Latitude', "25.185028");
        // localStorage.setItem('Longitude', "55.264052");
        localStorage.setItem('Latitude', position.coords.latitude);
        localStorage.setItem('Longitude', position.coords.longitude);
        $('.ray_pslider #dist_id').after("<input type='hidden' name='latitude' value='" + localStorage.getItem("Latitude") + "'/><input type='hidden' name='longitude' value='" + localStorage.getItem("Longitude") + "'/>");
        /* $.getJSON(
            'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + localStorage.getItem("Latitude") + ' , ' +
            localStorage.getItem("Longitude") +
            '&key=AIzaSyAGq0_bRV-SesoSb7tV39-qss63x7voh5g',
            function(data) {
                // console.log(data);
                if (data.length != 0) {
                    $('.ray_pslider form').after("<p class='user_location_address'>Your Location is " + data.results[0].formatted_address + "</p>");
                } else {
                    $("." + div_id + " .row").append('<div class="col-sm-12"><div class="custom_card dubai-explore-listing-card"> <p>No results found</p> </div></div>');
                }
            }
        ); */
    }

    $(".ray_pslider .test #query").on("keyup", function(e) {
        var length = $(this).val().length;
        var keyword = $(this).val();
        var category = $("#category_keyword").val();
        var dist = $("#dist_id").val();
        if (length >= 3) {
            $.ajax({
                type: "post",
                url: "<?php echo base_url(); ?>/get-all-subcategories-test",
                data: {
                    "category": category,
                    "dist": dist,
                    "keyword": $(this).val(),
                },
                success: function(res) {
                    $('#livesearch').html(res);
                    $('#livesearch').css("border", "1px solid #A5ACB2");
                    $('#livesearch').show();
                    // Success message
                    // console.log($.parseJSON(res));
                    // console.log(res);
                },
                error: function(err) {
                    //clear all fields
                },
                complete: function() {}
            });
        } else {
            $('#livesearch').hide();
        }

        if (localStorage.getItem("latitude") != "") {
            $('.livesearch').parent().parent().parent().find("form").attr('method', 'get');
            $('.livesearch').parent().parent().parent().find("form").attr('action', "<?= base_url(); ?>/search?query=" + keyword);

        } else {

        }

    });
    $(document).on("click", ".search_keyword", function() {
        console.log($(this).text());

        $('#livesearch').parent().find("#query").val($(this).text());
        /* $('#livesearch').parent().parent().parent().find("form").attr('action', "<?= base_url(); ?>/search?query=" + $(this).text() + '/&d=' + $("#dist_id").val() + "&z=" + $("#category_keyword").val()); */
        $('#livesearch').hide();
    });
    $(document).on("click", "#search_business", function() {
        $('#livesearch').parent().parent().parent().find("form").submit();

    });
    $(".ray_pslider .live #query").on("keyup", function(e) {
        var length = $(this).val().length;
        var keyword = $(this).val();
        var category = $("#category_keyword").val();
        var dist = $("#dist_id").val();
        if (length >= 3) {
            $.ajax({
                type: "post",
                url: "<?php echo base_url(); ?>/get-all-subcategories",
                data: {
                    "category": category,
                    "dist": dist,
                    "keyword": $(this).val(),
                },
                success: function(res) {
                    $('#livesearch').html(res);
                    $('#livesearch').css("border", "1px solid #A5ACB2");
                    $('#livesearch').show();
                    // Success message
                    // console.log($.parseJSON(res));
                    // console.log(res);
                },
                error: function(err) {
                    //clear all fields
                },
                complete: function() {}
            });
        } else {
            $('#livesearch').hide();
        }

        if (localStorage.getItem("latitude") != "") {
            $('.livesearch').parent().parent().parent().find("form").attr('method', 'get');
            $('.livesearch').parent().parent().parent().find("form").attr('action', "<?= base_url(); ?>/search?query=" + keyword);

        } else {

        }

    });

    $('.slider_main .ray_pslider #category').change(function() {
        var category = $(this).val();
        $("#category_keyword").val($(this).val());
    });
    /* if (localStorage.getItem("Latitude")) {

        $.getJSON(
            'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + localStorage.getItem("Latitude") + ' , ' +
            localStorage.getItem("Longitude") +
            '&key=AIzaSyAGq0_bRV-SesoSb7tV39-qss63x7voh5g',
            function(data) {
                if (data.length != 0) {
                    $('.ray_pslider form').after("<p class='user_location_address'>Your Location is " + data.results[0].formatted_address + '</p>');
                } else {

                }
            }
        );

    } */
    if (!localStorage.getItem("Latitude")) {

        $(".km_section .choice_btn").hide();

    }

    $('.slider_main .ray_pslider #dist_id').change(function() {
        var district = $(this).val();
        if (district == "location") {

            // getLocation();
            let getLocation_search = new Promise(function(myResolve, myReject) {
                // "Producing Code" (May take some time)
                getLocation();
                myResolve(); // when successful

            });
            getLocation_search.then(
                function(value) {

                },
                function(error) {
                    /* code if some error */
                }
            );
        }
        var latitude = "";
        if (location == "1") {
            latitude = localStorage.getItem("Latitude");
            console.log(latitude);

        }
        /* if (latitude != "") {
            console.log(localStorage.getItem("Latitude"));
            $('.ray_pslider #dist_id').after("<input type='hidden' name='latitude' value='" + localStorage.getItem("Latitude") + "'/><input type='hidden' name='longitude' value='" + localStorage.getItem("Longitude") + "'/>");
            $.getJSON(
                'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + localStorage.getItem("Latitude") + ' , ' +
                localStorage.getItem("Longitude") +
                '&key=AIzaSyAGq0_bRV-SesoSb7tV39-qss63x7voh5g',
                function(data) {
                    // console.log(data);
                    if (data.length != 0) {
                        $('.ray_pslider form').after("Your Location is" + data.results);
                    } else {
                        $("." + div_id + " .row").append('<div class="col-sm-12"><div class="custom_card dubai-explore-listing-card"> <p>No results found</p> </div></div>');
                    }
                }
            );

        } else {
            $('.ray_pslider #dist_id').val("");
        } */
    });
</script>

<!-- Get amazing localized tip & articles dubai blog  -->
<script>
    var tipsArticles = $("#tips-articles");

    tipsArticles.owlCarousel({
        nav: false,
        dots: false,
        mouseDrag: true,
        autoplayHoverPause: true,
        loop: true,
        margin: 30,
        autoplay: true,
        smartSpeed: 2000,
        autoplayTimeout: 5000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 3
            }
        }
    });
    $(document).ready(function() {

        if ($("#amazing_tips_articles").length > 0) {
            $.getJSON(
                '<?php echo getenv('BLOG_BASE_URL'); ?>' + '/wp-json/wp/v2/posts?_embed&categories=189&per_page=10',
                function(data) {
                    // console.log(data);
                    $('#tips-articles').trigger('remove.owl.carousel', [0]).trigger('refresh.owl.carousel');
                    $('#tips-articles').trigger('remove.owl.carousel', [1]).trigger('refresh.owl.carousel');
                    $('#tips-articles').trigger('remove.owl.carousel', [2]).trigger('refresh.owl.carousel');
                    if (data.length != 0) {
                        $.each(data, function(index, value) {
                            // console.log(value._embedded['wp:featuredmedia']);
                            // var img = value._embedded['wp:featuredmedia'][0].source_url;
                            var img = value._embedded['wp:featuredmedia'][0].media_details.sizes['blabber-thumb-med'].source_url;

                            if (value.title.rendered.length > 40) {
                                var title = value.title.rendered.substr(0, 40);
                                title += "...";
                            } else {
                                var title = value.title.rendered;
                            }
                            if (value.excerpt.rendered.length > 100) {
                                var description = value.excerpt.rendered.substr(0, 100);
                                description += "...";

                            } else {
                                var description = value.excerpt.rendered;
                            }

                            // $("#amazing_tips_articles #tips-articles").append('<div class="item"><div class="card article-card border-0"><div class="position-relative crbox"><img class="card-img" src="' + img + '" alt="' + img + '"></div><div class="card-body px-0 pt-3"><span class="article-types"><a href="' + value.link + '" target="_blank">' + title + '</a></span></div></div></div>');
                            $('#tips-articles').trigger('add.owl.carousel', [
                                '<div class="item"><div class="card article-card border-0"><div class="position-relative crbox"><img class="card-img" src="' + img + '" alt="' + img + '"></div><div class="card-body px-0 pt-3"><span class="article-types"><a href="' + value.link + '" target="_blank">' + title + '</a></span></div></div></div>',
                            ]).trigger('refresh.owl.carousel');
                            return index < 10;
                        });
                    } else {
                        $("." + div_id + " .row").append('<div class="col-sm-12"><div class="custom_card dubai-explore-listing-card"> <p>No results found</p> </div></div>');
                    }
                }
            );
        } else {
            console.log("Amazing tips does not exists");
        }
    });
</script>

<!-- END Get amazing localized tip & articles dubai blog  -->

<!-- Get Explore Dubai HOME PAGE blog  -->
<script>
    $(document).ready(function() {

        if ($(".our_features_grid_two .exploredubai_main").length > 0) {
            $.getJSON(
                '<?php echo getenv('BLOG_BASE_URL'); ?>' + '/wp-json/wp/v2/posts?_embed&categories=176&per_page=1',
                function(data) {
                    if (data.length != 0) {
                        $(".exploredubai_main .col-md-8 .ed_cols").html('');
                        $.each(data, function(index, value) {
                            var img = value._embedded['wp:featuredmedia'][0].source_url;
                            // var img = value._embedded['wp:featuredmedia'][0].media_details.sizes['blabber-thumb-med'].source_url;

                            if (value.title.rendered.length > 40) {
                                var title = value.title.rendered.substr(0, 40);
                                title += "...";
                            } else {
                                var title = value.title.rendered;
                            }
                            if (value.excerpt.rendered.length > 100) {
                                var description = value.excerpt.rendered.substr(0, 50);
                                description += "...";

                            } else {
                                var description = value.excerpt.rendered;
                            }

                            $(".exploredubai_main .col-md-8 .ed_cols").html('<div class="expo_main"><a href="' + value.link + '" target="_blank"><div class="expo_img"><div class="img-wrapp"><img style="max-width: 100%; width: 100%; max-height: 500px; object-fit: cover;" src="' + img + '" alt="' + title + '"></div></div></a><div class="expo_infos"><h3><a href="' + value.link + '" target="_blank">' + title + '</a></h3><p>' + description + '</p></div></div>');


                            return index < 0;
                        });
                    } else {
                        $("." + div_id + " .row").append('<div class="col-sm-12"><div class="custom_card dubai-explore-listing-card"> <p>No results found</p> </div></div>');
                    }
                }
            );
            $.getJSON(
                '<?php echo getenv('BLOG_BASE_URL'); ?>' + '/wp-json/wp/v2/posts?_embed&categories=176&per_page=5',
                function(data) {
                    if (data.length != 0) {
                        $(".exploredubai_main .col-md-4 .ed_cols_right").html('');
                        $.each(data, function(index, value) {
                            if (index == 0) {
                                return true;
                            }
                            // var img = value._embedded['wp:featuredmedia'][0].source_url;
                            var img = value._embedded['wp:featuredmedia'][0].media_details.sizes['blabber-thumb-med'].source_url;

                            if (value.title.rendered.length > 40) {
                                var title = value.title.rendered.substr(0, 40);
                                title += "...";
                            } else {
                                var title = value.title.rendered;
                            }
                            if (value.excerpt.rendered.length > 100) {
                                var description = value.excerpt.rendered.substr(0, 50);
                                description += "...";

                            } else {
                                var description = value.excerpt.rendered;
                            }


                            $(".exploredubai_main .col-md-4 .ed_cols_right").append('<div class="expo_main"><a href="' + value.link + '" target="_blank"><div class="expo_img"><div class="img-wrapp"><img style="max-width: 100%; width: 100%; max-height: 500px; object-fit: cover;" src="' + img + '" alt="' + title + '"></div></div></a><div class="expo_infos"><h3><a href="' + value.link + '" target="_blank">' + title + '</a></h3></div></div>');

                            return index < 2;
                        });
                    } else {
                        $("." + div_id + " .row").append('<div class="col-sm-12"><div class="custom_card dubai-explore-listing-card"> <p>No results found</p> </div></div>');
                    }
                }
            );
        } else {
            console.log("Amazing tips does not exists");
        }
    });
</script>

<!-- END Get Explore Dubai HOME PAGE blog  -->

<!-- Subscribe & Contact Forms -->
<script>
    $(document).ready(function() {
        $("#subscribe_form").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                email: {
                    required: "Enter Email",
                    email: "Enter correct email"
                }
            },
            submitHandler: function(form) {
                event.preventDefault();
                $("#thanks_subscribe").show().delay(2000).fadeOut();
            },
            invalidHandler: function(event, validator) {
                // 'this' refers to the form
                var errors = validator.numberOfInvalids();
                if (errors) {
                    var message = errors == 1 ?
                        'You missed 1 field. It has been highlighted' :
                        'You missed ' + errors + ' fields. They have been highlighted';
                    $("div.error span").html(message);
                    $("div.error").show();
                } else {
                    $("div.error").hide();
                }
            }
        });
        /* var contact_form = document.getElementById('contact_form');
        if (contact_form) {
            document.getElementById("contact_form").addEventListener("submit", function(evt) {
                var response = grecaptcha.getResponse();
                if (response.length == 0) {
                    document.getElementById('g-recaptcha').innerHTML = '<span style="color:red;">Captcha is required.</span>';
                    event.preventDefault();
                    return false;
                }
                return true;
            });
        } */



        $("#contact_form").validate({
            ignore: ".ignore",
            rules: {
                first_name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                comp_url: {
                    required: true,
                    url: true
                },
                query: {
                    required: true,
                },
                mobil_num: {
                    required: true
                },
                hiddenRecaptcha: {
                    required: function() {
                        if (grecaptcha.getResponse() == '') {
                            return true;
                        } else {
                            return false;
                        }
                    }
                }
            },
            messages: {
                first_name: {
                    required: "Enter First Name",
                },
                email: {
                    required: "Enter Email",
                    email: "Enter Correct Email"
                },
                comp_url: {
                    required: "Enter Company URL",
                    url: "Enter Correct URL",
                },
                query: {
                    required: "Enter Query",
                },
                mobil_num: {
                    required: "Enter Phone number"
                },
                hiddenRecaptcha: "Please Verify Captcha"
            },
            submitHandler: function(form) {
                event.preventDefault();
                $.ajax({
                    type: "post",
                    url: "<?= base_url(); ?>/contact_us",
                    data: $(form).serialize(),
                    cache: false,
                    headers: {
                        "Accepts": "application/json; charset=utf-8"
                    },
                    success: function(res) {
                        // Success message
                        console.log(res);
                        $("#thanks_contact").show().delay(2000).fadeOut();
                        $(form).trigger("reset");
                        grecaptcha.reset();
                    },
                    error: function(err) {
                        // alert(err);
                        console.log(err);
                        $('#confirmation-modal').modal('hide');
                    },
                    complete: function() {

                    }
                });
            },
            invalidHandler: function(event, validator) {
                // 'this' refers to the form
                var errors = validator.numberOfInvalids();
                if (errors) {
                    var message = errors == 1 ?
                        'You missed 1 field. It has been highlighted' :
                        'You missed ' + errors + ' fields. They have been highlighted';
                    $("div.error span").html(message);
                    $("div.error").show();
                } else {
                    $("div.error").hide();
                }
            }
        });
        $('a[data-scroll]').click(function(e) {
            e.preventDefault();
            //Set Offset Distance from top to account for fixed nav
            var offset = 10;
            var target = ('#' + $(this).data('scroll'));
            var $target = $(target);
            //Animate the scroll to, include easing lib if you want more fancypants easings
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top - offset
            }, 800, 'swing');
        });
    });
</script>
<!-- End Subscribe & Contact Forms -->
<script>
    /* $("#popular_categories").click(function(e) {
                e.preventDefault();
                var target = this.hash;
                var $target = $(".popular-categories");
                $('html, body').stop().animate({
                    'scrollTop': $target.offset().top
                }, 900, 'swing', function() {
                    window.location.hash = target;
                });
            });
            $("#popular_listing").click(function(e) {
                e.preventDefault();
                var target = this.hash;
                var $target = $(".our-directory");
                $('html, body').stop().animate({
                    'scrollTop': $target.offset().top
                }, 900, 'swing', function() {
                    window.location.hash = target;
                });
            }); */
</script>
<!-- Review Now -->
<script>
    $(document).ready(function() {
        /* $("#claim_business_form").validate({
            rules: {
                name: {
                    required: true,
                    lettersonly: true
                },
                email: {
                    required: true,
                    email: true
                },
                phone_no: {
                    required: true,
                    digits: true
                },
                website_url: {
                    required: true,
                    url: true,
                },
            },
            messages: {
                name: {
                    required: "Enter Name",
                    lettersonly: "Enter correct Name"
                },
                email: {
                    required: "Enter Email",
                    email: "Enter correct email"
                },
                phone_no: {
                    required: "Enter phone number",
                    digits: "Enter correct Phone number"
                },
                website_url: {
                    required: "Enter your Website URL",
                    url: "Please enter valid url",
                },
            },
            submitHandler: function(form) {
                event.preventDefault();
                var response = grecaptcha.getResponse();
                if (response.length == 0) {
                    //reCaptcha not verified
                    Swal.fire(
                        'Please verify you are human!',
                        '',
                        'error'
                    );
                    event.preventDefault();
                    return false;
                } else {
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('/claim-business'); ?>",
                        data: $(form).serialize(),
                        cache: false,
                        success: function(res) {
                            // Success message
                            console.log("success");
                            console.log(res);
                            Swal.fire(
                                'Your Message has been Reveived!',
                                '',
                                'success'
                            );
                        },
                        error: function(err) {
                            console.log("error");
                            console.log(err);
                        },
                        complete: function() {}
                    });
                }


            },
            invalidHandler: function(event, validator) {
                // 'this' refers to the form
                var errors = validator.numberOfInvalids();
                if (errors) {
                    var message = errors == 1 ?
                        'You missed 1 field. It has been highlighted' :
                        'You missed ' + errors + ' fields. They have been highlighted';
                    $("div.error span").html(message);
                    $("div.error").show();
                } else {
                    $("div.error").hide();
                }
            }
        }); */

        $(document).on('click', '#review_now', function(e) {
            // $("#send_enquiry_btn").on("click", function(e) {
            // debugger;
            if ($("#review_now_text").val() == "") {
                Swal.fire(
                    'Please enter your experience!',
                    '',
                    'error'
                );
                return false;
            }
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "<?php echo base_url('/review-now-text'); ?>",
                data: $("#share_experience_form").serialize(),
                cache: false,
                success: function(res) {
                    // Success message
                    console.log("success");
                    console.log(res);
                    Swal.fire(
                        'Your Experience has been Reveived!',
                        '',
                        'success'
                    );
                    $("#review_now_text").val("");
                },
                error: function(err) {
                    console.log("error");
                    console.log(err);
                },
                complete: function() {}
            });
        });
    });
</script>
<!-- End Review Now -->
<!-- Send Enquiry -->
<script>
    $(document).ready(function() {
        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z]+$/i.test(value);
        }, "Letters only please");
        $("#send_enquiry_form").validate({
            ignore: ".ignore",
            rules: {
                enq_name: {
                    required: true,
                    lettersonly: true
                },
                email: {
                    required: true,
                    email: true,
                },
                phone_no: {
                    required: true,
                },
                enquiry_text: {
                    required: true,
                },
                hiddenRecaptcha: {
                    required: function() {
                        if (grecaptcha.getResponse() == '') {
                            return true;
                        } else {
                            return false;
                        }
                    }
                }
            },
            messages: {
                enq_name: {
                    required: "Enter Name",
                    lettersonly: "Enter correct Name"
                },
                email: {
                    required: "Enter Email",
                    email: "Enter Correct Email"
                },
                phone_no: {
                    required: "Enter Phone Number",
                },
                enquiry_text: {
                    required: "Enter Query",
                },
                hiddenRecaptcha: "Please Verify Captcha"
            },
            submitHandler: function(form) {
                event.preventDefault();

                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('/send-enquiry'); ?>",
                    data: $(form).serialize(),
                    cache: false,
                    success: function(res) {
                        // Success message
                        console.log("success");
                        console.log(res);
                        Swal.fire(
                            'Your Enquiry has been Received!',
                            '',
                            'success'
                        );
                        $(form).trigger("reset");
                        grecaptcha.reset();
                    },
                    error: function(err) {
                        console.log("error");
                        console.log(err);
                    },
                    complete: function() {}
                });
            },
            invalidHandler: function(event, validator) {
                // 'this' refers to the form
                var errors = validator.numberOfInvalids();
                if (errors) {
                    var message = errors == 1 ?
                        'You missed 1 field. It has been highlighted' :
                        'You missed ' + errors + ' fields. They have been highlighted';
                    $("div.error span").html(message);
                    $("div.error").show();
                } else {
                    $("div.error").hide();
                }
            }
        });

        function validateEmail($email) {
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            return emailReg.test($email);
        }
        /* $(document).on('click', '#send_enquiry_btn', function(e) {
            // $("#send_enquiry_btn").on("click", function(e) {
            // debugger;
            if ($("#enq_name").val() == "" || $("#enq_email").val() == "" || $("#enq_phone_no").val() == "" || $("#enquiry_text").val() == "") {
                Swal.fire(
                    'Please enter details!',
                    '',
                    'error'
                );
                return false;
            } else if (!validateEmail($("#enq_email").val())) {
                Swal.fire(
                    'Please enter correct email!',
                    '',
                    'error'
                );
                return false;
            }
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "<?php echo base_url('/send-enquiry'); ?>",
                data: $("#send_enquiry_form").serialize(),
                cache: false,
                success: function(res) {
                    // Success message
                    console.log("success");
                    console.log(res);
                    Swal.fire(
                        'Your Enquiry has been Reveived!',
                        '',
                        'success'
                    );
                },
                error: function(err) {
                    console.log("error");
                    console.log(err);
                },
                complete: function() {}
            });
        }); */
    });
</script>
<!-- End Send Enquiry -->
<script>
    $(document).ready(function() {

        var correctCaptcha = function(response) {
            alert(response);
        };
        $(document).on('keypress', '#claim_business_phone', function(e) {
            if (this.value.length > 20) {
                // debugger;
                return false;
            }
        });
        $('#claim_business_phone').keypress(function CheckIsNumeric(e) {
            var charCode = (e.which) ? e.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 43 && charCode != 45)
                return false;
            else
                return true;
        });
        $("#claim_business_form").validate({
            ignore: ".ignore",
            rules: {
                name: {
                    required: true,
                    lettersonly: true
                },
                email: {
                    required: true,
                    email: true,
                },
                phone_no: {
                    required: true,
                },
                hiddenRecaptcha: {
                    required: function() {
                        if (grecaptcha.getResponse() == '') {
                            return true;
                        } else {
                            return false;
                        }
                    }
                }
            },
            messages: {
                name: {
                    required: "Enter Name",
                    lettersonly: "Enter name in characters only"
                },
                email: {
                    required: "Enter Email",
                    email: "Enter Correct Email"
                },
                phone_no: {
                    required: "Enter Phone Number",
                },
                hiddenRecaptcha: "Please Verify Captcha"
            },
            submitHandler: function(form) {
                event.preventDefault();
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('/claim-business'); ?>",
                    data: $(form).serialize(),
                    cache: false,
                    success: function(res) {
                        // Success message
                        console.log("success");
                        console.log(res);
                        Swal.fire(
                            'Your Message has been Received!',
                            '',
                            'success'
                        );
                        $(form).trigger("reset");
                        grecaptcha.reset();

                    },
                    error: function(err) {
                        console.log("error");
                        console.log(err);
                    },
                    complete: function() {}
                });
            },
            invalidHandler: function(event, validator) {
                // 'this' refers to the form
                var errors = validator.numberOfInvalids();
                if (errors) {
                    var message = errors == 1 ?
                        'You missed 1 field. It has been highlighted' :
                        'You missed ' + errors + ' fields. They have been highlighted';
                    $("div.error span").html(message);
                    $("div.error").show();
                } else {
                    $("div.error").hide();
                }
            }
        });
        /* $(document).on('click', '#claim_business_btn', function(e) {
            // $("#send_enquiry_btn").on("click", function(e) {
            // debugger;
            if ($("#claim_business_name").val() == "" || $("#claim_business_email").val() == "" || $("#claim_business_phone").val() == "") {
                Swal.fire(
                    'Please enter details!',
                    '',
                    'error'
                );
                return false;
            }
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "<?php echo base_url('/claim-business'); ?>",
                data: $("#claim_business_form").serialize(),
                cache: false,
                success: function(res) {
                    // Success message
                    console.log("success");
                    console.log(res);
                    Swal.fire(
                        'Your Message has been Reveived!',
                        '',
                        'success'
                    );
                },
                error: function(err) {
                    console.log("error");
                    console.log(err);
                },
                complete: function() {}
            });
        }); */
        $(document).on('keypress', '#enq_name_add_business', function(e) {
            if (this.value.length > 20) {
                // debugger;
                return false;
            }
        });
        /* $('#enq_name_add_business').keypress(function charlength() {
            if (this.value.length > 10) {
                debugger;
                return false;
            }
        }); */
        $('#enq_phone_no_add_business').keypress(function CheckIsNumeric(e) {
            var charCode = (e.which) ? e.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 43 && charCode != 45)
                return false;
            else
                return true;
        });

        $("#send_enquiry_form_add_business").validate({
            ignore: ".ignore",
            rules: {
                enq_name_add_business: {
                    required: true,
                    lettersonly: true
                },
                enq_email_add_business: {
                    required: true,
                    email: true
                },
                enq_phone_no_add_business: {
                    required: true,
                    digits: true
                },
                enq_website_url_add_business: {
                    required: true,
                    url: true,
                },
                enq_text_add_business: {
                    required: true
                },
                hiddenRecaptcha: {
                    required: function() {
                        if (grecaptcha.getResponse() == '') {
                            return true;
                        } else {
                            return false;
                        }
                    }
                }
            },
            messages: {
                enq_name_add_business: {
                    required: "Enter Name",
                    lettersonly: "Enter correct Name"
                },
                enq_email_add_business: {
                    required: "Enter Email",
                    email: "Enter correct email"
                },
                enq_phone_no_add_business: {
                    required: "Enter phone number",
                    digits: "Enter correct Phone number"
                },
                enq_website_url_add_business: {
                    required: "Enter your Website URL",
                    url: "Please enter valid url",
                },
                enq_text_add_business: "Enter your message",
                hiddenRecaptcha: "Please Verify Captcha"
            },
            submitHandler: function(form) {
                event.preventDefault();
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('/send-enquiry-add-business'); ?>",
                    data: $(form).serialize(),
                    cache: false,
                    success: function(res) {
                        // Success message
                        console.log("success");
                        console.log(res);
                        Swal.fire(
                            'Your Message has been Received!',
                            '',
                            'success'
                        );
                        $(form).trigger("reset");
                        grecaptcha.reset();
                        $('#addbusiness').modal('hide');
                    },
                    error: function(err) {
                        console.log("error");
                        console.log(err);
                    },
                    complete: function() {}
                });


            },
            invalidHandler: function(event, validator) {
                // 'this' refers to the form
                var errors = validator.numberOfInvalids();
                if (errors) {
                    var message = errors == 1 ?
                        'You missed 1 field. It has been highlighted' :
                        'You missed ' + errors + ' fields. They have been highlighted';
                    $("div.error span").html(message);
                    $("div.error").show();
                } else {
                    $("div.error").hide();
                }
            }
        });
    });
</script>


<?= $this->endSection() ?>
<?= $this->endSection() ?>