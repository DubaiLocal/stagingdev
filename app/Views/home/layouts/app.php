<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?php echo base_url(); ?>/assets/front/images/favicon.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/waitme@1.19.0/waitMe.css">
    <title>
        <?php if (isset($title) && $title != "") {
            echo $title;
        } else {
            echo "Best Business Directory of Dubai - Updated List of Businesses in Dubai";
        } ?>
    </title>

    <meta property="og:title" content="<?php if (isset($meta_title) && $meta_title != "") {
                                            echo $meta_title;
                                        } else {
                                            echo "Best Business Directory of Dubai - Updated List of Businesses in Dubai";
                                        } ?>" />

    <meta property="og:description" content="<?php
                                                if (isset($meta_desc) || $meta_desc != "") {
                                                    echo $meta_desc;
                                                } else {
                                                    echo "Best Business Directory of Dubai - Updated List of Businesses in Dubai";
                                                }
                                                ?>" />
    <meta property="og:image" content="https://dubailocal.ae/assets/front/images/about_banner.jpg" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- External Font Css -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Latest compiled and minified css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
    <!-- Owl carsousel css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/front/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/front/css/animate.css">
    <!-- Text editor -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/front/css/rte_theme_default.css" />
    <!-- Custom css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/front/css/magnific-popup.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/front/css/style.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/front/css/dubai_home.css"> -->
    <link rel="preload" href="<?= base_url(); ?>/assets/front/images/banner1.jpg" as="image">

    <meta name="google-site-verification" content="yVmhh_-peh9q1Fxb6p4YmFQrFvd0RDRYcK2YIaudHRo" />
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-EEJ9TGZQR4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-EEJ9TGZQR4');
    </script>
    <!-- Required meta tags -->
</head>
<style>
    .page-loader {
        width: 100%;
        height: 100vh;
        position: fixed;
        background: url(<?= base_url(); ?>/assets/front/images/dubai_loader_bg.jpg);
        background-size: cover;
        z-index: 1000;
        top: 0;
    }

    .page-loader .txt {
        color: #666;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 0.3rem;
        font-weight: bold;
        line-height: 1.5;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>

<body class="">
    <!-- <div class="waitMe_container working" style="background:#fff">
        <div style="background:#000"></div>
    </div> -->
    <header class="site-nav-col">
        <div class="topbar">
            <div class="container">
                <div class="toplinks">
                    <div class="dub_datetemp">
                        <?php

                        use CodeIgniter\I18n\Time;

                        $xml = simplexml_load_file("https://api.openweathermap.org/data/2.5/weather?lat=25.7551&lon=52.7871&appid=fb563e9f3dd1081c4108daf670d5e0cc&units=metric&mode=xml");
                        $json = json_encode($xml);
                        $array = json_decode($json, TRUE);
                        $temperature =  $array['temperature']['@attributes']['value'];
                        $clouds =  $array['clouds']['@attributes']['name'];
                        $myTime = new Time('now', 'Asia/Dubai', 'en_US');
                        $date =  $myTime->format('D d M Y g:i a');
                        ?>
                        <span><?= $date ?></span>|<span> <?= $temperature ?>° <?= ucfirst($clouds) ?></span>
                    </div>
                    <div class="dub_top_rightlinks">
                        <a href="<?php echo base_url(); ?>/browse-business-directory">Businesses</a>
                        <span>|</span>
                        <a href="<?php echo base_url(); ?>/dubai-explore" target="_blank">Explore Dubai</a>
                        <span>|</span>
                        <a href="<?= getenv('BLOG_BASE_URL'); ?>" target="_blank">The Blog</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <?php if ($app_data->logo_path != "") { ?>
                        <a class="navbar-brand" href="<?= base_url(); ?>"><img src="<?= $app_data->logo_path; ?>" class="img-fluid" alt="Dubai Local"></a>
                    <?php } ?>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <?php


                            if (is_array($menu_categories) && count($menu_categories) > 0) {
                                $numItems = count($menu_categories);
                                $i = 0;
                                foreach ($menu_categories as $menuCategory) { ?>
                                    <li class="nav-item dropdown <?= (++$i === $numItems) ? "lastdrop" : ""; ?>">
                                        <a class="nav-link dropdown-toggle" href="<?= base_url() . '/category/' . $menuCategory['slug']; ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?= $menuCategory['name'] ?>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <ul>
                                                <?php
                                                $i = 0;
                                                foreach ($menu_sub_categories as $menu_sub_category) {
                                                    if ($menuCategory['id'] == $menu_sub_category['cat_id']) {
                                                        $i++;
                                                        if ($i >= 12) { ?>
                                                            <li class="view-all-sub-categories"><a href="<?php echo base_url() . "/category/" . $menuCategory['slug'] ?>" class="dropdown-item">[+] View all </a></li>
                                                        <?php
                                                            break;
                                                        } else {
                                                        ?>
                                                            <li><a href="<?php echo base_url() . "/businesses/" . $menu_sub_category['slug'] ?>" class="dropdown-item"><span><img src="<?php echo base_url(); ?>/assets/front/images/icons/<?= $menu_sub_category['sub_cat_name'] ?>.svg" class="img-fluid" alt=""> <?= $menu_sub_category['sub_cat_name'] ?></span></a></li>
                                                <?php }
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </li>
                            <?php }
                            } ?>
                            <li class="nav-item navlinkadd"><a class="nav-link" href="#addbusiness" data-toggle="modal">Add a Business</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <?= $this->renderSection('content') ?>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-3">
                    <div class="footer-logo">
                        <?php if ($app_data->logo_path != "") { ?>
                            <img src="<?= $app_data->logo_path; ?>" class="img-fluid" alt="Dubai Local">
                        <?php } ?>

                    </div>
                    <p class="desc">Dubai Local is one of the leading online platforms having a sterling reputation in terms of data quality and accuracy. Our information is trusted by users, business owners, stakeholders, marketing experts & researchers who require reliable business details.</p>
                </div>
                <div class="col-lg-2 col-sm-6 mb-3">
                    <h4 class="title">Company</h4>
                    <ul class="list-unstyled quick-links">
                        <li><a href="<?php echo base_url(); ?>/about-us">About Us</a></li>
                        <!-- <li><a href="#">Team</a></li> -->
                        <!-- <li><a href="#">Career</a></li> -->
                        <li><a href="<?php echo base_url(); ?>/browse-business-directory">Browse Category</a></li>
                        <li><a href="<?php echo base_url(); ?>/contact-us">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-sm-6 mb-3">
                    <h4 class="title">Quick Links</h4>
                    <ul class="list-unstyled quick-links">
                        <!--<li><a href="<?php echo base_url(); ?>/#popular-tab" id="popular_listing">Popular Listing</a></li>-->
                        <!-- <li><a href="/login" id="">List a Business</a></li> -->
                        <li><a href="#addbusiness" data-toggle="modal">List a Business</a></li>
                        <li><a href="#addbusiness" data-toggle="modal">Claim Your Business</a></li>
                        <!-- <li><a href="#">Reviews</a></li> -->
                        <li><a href="<?php echo base_url(); ?>/#popular-categories" id="popular_categories">Popular Categories</a></li>
                        <li><a href="<?= base_url(); ?>/privacy-policy">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-sm-6 mb-3">
                    <h4 class="title">Our Newsletter</h4>
                    <p class="newsletter">Subscribe to our newsletter for latest updates in listing</p>
                    <div class="quick-connect mb-4">
                        <form id="subscribe_form">
                            <div class="form-group">
                                <p style="display:none" id="thanks_subscribe">Thank you for subscribing</p>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email Address">
                                <input type="submit" value="Subscribe">
                                <!-- <a href="#" onclick="submit()" id=""><img src="<?php //echo base_url(); 
                                                                                    ?>/assets/front/images/next.png"
                                            alt=""></a> -->
                            </div>
                        </form>
                    </div>
                    <ul class="list-unstyled d-flex footer-social">
                        <?php if ($app_data->facebook_url != "") { ?>
                            <li class="wow bounce" data-wow-delay="0s"><a target="_blank" href="<?= $app_data->facebook_url ?>"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a></li>
                        <?php } ?>
                        <?php if ($app_data->instagram_url != "") { ?>
                            <li class="wow bounce" data-wow-delay="0.2s"><a target="_blank" href="<?= $app_data->instagram_url ?>"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a></li>
                        <?php } ?>
                        <?php if ($app_data->youtube_url != "") { ?>
                            <li class="wow bounce" data-wow-delay="0.2s"><a target="_blank" href="<?= $app_data->youtube_url ?>"><i class="fa fa-youtube fa-2x" aria-hidden="true"></i></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

        </div>
        <div class="copyright text-center">
            <div class="container">
                <p>Copyright &#169; 2023 Dubai Local</p>
            </div>
        </div>

    </footer>
    <!-- Modal -->
    <div class="modal fade" id="addbusiness" tabindex="-1" role="dialog" aria-labelledby="sendEnquiryTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal_popde send_enquiry_pop" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add a Business</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="send_enquiry_form_add_business">
                        <div class="popform_infos">
                            <div class="formrow">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="custom">Name: <span>*</span></label>
                                            <input type="text" name="enq_name_add_business" id="enq_name_add_business" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="custom">Email: <span>*</span></label>
                                            <input type="text" name="enq_email_add_business" id="enq_email_add_business" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="formrow">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="custom">Phone No: <span>*</span></label>
                                            <input type="text" name="enq_phone_no_add_business" id="enq_phone_no_add_business" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="custom">Website Url: <span>*</span></label>
                                            <input type="text" name="enq_website_url_add_business" id="enq_website_url_add_business" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="custom">Message: <span>*</span></label>
                                            <textarea name="enq_text_add_business" id="enq_text_add_business" class="form-control" cols="30" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="g-recaptcha" data-sitekey="6LfYycwhAAAAADfGTmZ76aHNBVcO2kXn_8uVWs0v" data-callback="recaptchaCallback"></div>
                                            <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="popsend_btn">
                                            <button type="submit" name="submit" id="send_enquiry_btn_add_business" class="btn btn_custom">Request Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!--<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>-->
            </div>
        </div>
    </div> <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/front/js/jquery.magnific-popup.js"></script>
    <script src="<?php echo base_url(); ?>/assets/front/js/classie.js"></script>
    <script src="<?php echo base_url(); ?>/assets/front/js/cbpAnimatedHeader.min.js"></script> <!-- Latest compiled and minified JavaScript -->
    <script src="<?php echo base_url(); ?>/assets/front/js/bootstrap.min.js"></script>
    <!-- Bootstrap Select JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="<?php echo base_url(); ?>/assets/front/js/owl.carousel.min.js"></script>
    <!-- Css3 Annimate It JavaScript -->
    <script src="<?php echo base_url(); ?>/assets/front/js/wow.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/front/js/scrollspy.js"></script>
    <!-- Custom JavaScript -->
    <script src="<?php echo base_url(); ?>/assets/front/js/main.js"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/waitme@1.19.0/waitMe.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <?= $this->renderSection('javascript') ?>
</body>

</html>