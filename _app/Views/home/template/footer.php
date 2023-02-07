        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-3">
                        <div class="footer-logo">
                            <img src="<?php echo base_url(); ?>/assets/front/images/logo.png" class="img-fluid" alt="America Local">
                        </div>
                        <p class="desc">Dubai Local is one of the leading online platforms having a sterling reputation in terms of data quality and accuracy. Our information is trusted by users, business owners, stakeholders, marketing experts & researchers who require reliable business details.</p>
                    </div>
                    <div class="col-lg-2 col-sm-6 mb-3">
                        <h4 class="title">Company</h4>
                        <ul class="list-unstyled quick-links">
                            <li><a href="/about-us">About Us</a></li>
                            <!-- <li><a href="#">Team</a></li> -->
                            <!-- <li><a href="#">Career</a></li> -->
                            <li><a href="/browse-business-directory">Browse Category</a></li>
                            <li><a href="/contact-us">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-3">
                        <h4 class="title">Quick Links</h4>
                        <ul class="list-unstyled quick-links">
                            <!--<li><a href="<?php echo base_url(); ?>/#popular-tab" id="popular_listing">Popular Listing</a></li>-->
                            <!-- <li><a href="/login" id="">List a Business</a></li> -->
                            <li><a href="#addbusiness" data-toggle="modal">List a Business</a></li>
                            <!-- <li><a href="#">Reviews</a></li> -->
                            <li><a href="<?php echo base_url(); ?>/#popular-categories" id="popular_categories">Popular Categories</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-3">
                        <h4 class="title">Our Newsletter</h4>
                        <p class="newsletter">Subscribe to our newsletter for latest updates in listing</p>
                        <div class="quick-connect mb-4">
                            <form id="subscribe_form">
                                <div class="form-group">
                                    <p id="thanks_subscribe">Thank you for subscribing</p>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email Address">
                                    <input type="submit" value="Subscribe">
                                    <!-- <a href="#" onclick="submit()" id=""><img src="<?php //echo base_url(); 
                                                                                        ?>/assets/front/images/next.png"
                                            alt=""></a> -->
                                </div>
                            </form>
                        </div>
                        <ul class="list-unstyled d-flex footer-social">
                            <li class="wow bounce" data-wow-delay="0s"><a target="_blank" href="https://www.facebook.com/dubailocaldirectory/"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a></li>
                            <li class="wow bounce" data-wow-delay="0.2s"><a target="_blank" href="https://www.youtube.com/channel/UCvtzJuu8QXg48f7oMwgwKRA"><i class="fa fa-youtube fa-2x" aria-hidden="true"></i></a></li>
                            <!--<li class="wow bounce" data-wow-delay="0.4s"><a href="#"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a></li>
                            <li class="wow bounce" data-wow-delay="0.6s"><a href="#"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a></li>
                            <!-- <li class="wow bounce" data-wow-delay="0.6s"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>-->
                        </ul>
                    </div>
                </div>
                <div class="copyright text-center">
                    <ul class="list-unstyled mb-3 d-flex justify-content-center">
                        <li><a href="<?= base_url(); ?>/contact-us">Contact Us</a></li>
                        <li><a href="<?= base_url(); ?>/privacy-policy">Privacy Policy</a></li>
                        <!-- <li><a href="#">Business Resources</a></li> -->
                    </ul>
                    <p>Copyright &#169; 2022 DubaiLocal</p>
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
                                        <div class="g-recaptcha" data-sitekey="6LfYycwhAAAAADfGTmZ76aHNBVcO2kXn_8uVWs0v" data-callback="recaptchaCallback"></div>
                                        <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
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
            setTimeout(function() { // allowing 3 secs to fade out loader
                $('.page-loader').fadeOut('slow');
            }, 1500);
            /* $(window).on('load', function() {
                setTimeout(function() { // allowing 3 secs to fade out loader
                    $('.page-loader').fadeOut('slow');
                }, 1500);
            }); */
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
        <script src="https://cdn.ckeditor.com/ckeditor5/35.2.0/classic/ckeditor.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>/assets/front/js/richtexteditor/rte.js"></script>
        <script type="text/javascript" src='<?php echo base_url(); ?>/assets/front/js/richtexteditor/all_plugins.js'></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBJ3PG910fsdxgGr_xpnExr-Cm53gBTn4Y"></script>

        <!-- Load More -->
        <script>
            $("#thanks_subscribe").hide();
            $("#thanks_contact").hide();
            $(document).ready(function() {
                /* $(document).ajaxStart(function() {
                    $('body').waitMe({
                        effect: 'pulse',
                    });
                }).ajaxStop(function() {
                    $('body').waitMe("hide");
                }); */
                var subcat_business_list_page = 0;
                $(".subcat_business_more").on("click", function(e) {
                    subcat_business_list_page++;
                    // debugger;
                    var url = window.location.pathname;
                    var id = url.substring(url.lastIndexOf('/') + 1);
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url(); ?>/front/subcat_business_list_more",
                        data: {
                            "page": subcat_business_list_page,
                            "id": id
                        },
                        success: function(res) {
                            $('#subcat_business_list').append(res);
                            // Success message
                            console.log(res);
                        },
                        error: function(err) {
                            //clear all fields
                        },
                        complete: function() {}
                    });
                });
                // $.ajax({
                //     type: "post",
                //     url: "<?php echo base_url(); ?>/front/servicelist",
                //     // data: {"id" : dataId },
                //     // cache: false,
                //     success: function(res) {
                //         $('#myTabContent').html(res);
                //         // Success message
                //         console.log(res);
                //     },
                //     error: function(err) {
                //         //clear all fields
                //         // $("#myTabContent li").trigger("reset");
                //     },
                //     complete: function() {
                //     }
                // });
                $(".categories-sec .sort-categories li a").click(function(e) {
                    e.preventDefault();
                    // console.log($(this).data('cat_id'));
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('/single-category-subcat'); ?>",
                        data: {
                            id: $(this).data('cat_id')
                        },
                        cache: false,
                        success: function(res) {
                            // Success message
                            // console.log(res);
                            $("#myTabContent").html(res);
                        },
                        error: function(err) {
                            console.log(res);
                        },
                        complete: function() {}
                    });
                });
                $("#myTab li").on("click", function() {
                    var dataId = $(this).attr("data-id");
                });
            });
        </script>
        <!-- End Load More -->
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
                var contact_form = document.getElementById('contact_form');
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
                }



                $("#contact_form").validate({
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
                                    'Your Enquiry has been Reveived!',
                                    '',
                                    'success'
                                );
                                $(form).trigger("reset");
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
                        }
                    },
                    submitHandler: function(form) {
                        event.preventDefault();
                        var response = grecaptcha.getResponse(1);
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
                                        'Your Message has been Received!',
                                        '',
                                        'success'
                                    );
                                    $(form).trigger("reset");
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
                        var response = grecaptcha.getResponse(2);
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
                                url: "<?php echo base_url('/send-enquiry-add-business'); ?>",
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
                                    $(form).trigger("reset");
                                    $('#addbusiness').modal('hide');
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
                });
            });
        </script>
        <script>
            /* if ($("#review_text").length) {
                var editor1cfg = {}
                editor1cfg.toolbar = "mytoolbar";
                editor1cfg.toolbar_mytoolbar = "{bold,italic}|{insertemoji}|removeformat" +
                    "#{undo,redo}";
                var editor1 = new RichTextEditor("#review_text", editor1cfg);
            } */
        </script>
        <!-- Set cookie when reviwing if not logged in  -->
        <script>
            $(document).ready(function() {
                function setCookie(name, value, days) {
                    var expires = "";
                    if (days) {
                        var date = new Date();
                        date.setTime(date.getTime() + (2 * 60 * 1000));
                        expires = "; expires=" + date.toUTCString();
                    }
                    document.cookie = name + "=" + (value || "") + expires + "; path=/";
                }

                function getCookie(name) {
                    var nameEQ = name + "=";
                    var ca = document.cookie.split(';');
                    for (var i = 0; i < ca.length; i++) {
                        var c = ca[i];
                        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
                    }
                    return null;
                }

                function eraseCookie(name) {
                    document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                }
                if (getCookie("current_business_url") != "") {
                    eraseCookie("current_business_url");
                }
                $("#submit_review_login").on("click", function() {
                    setCookie('current_business_url', window.location.href, 7);
                    sessionStorage.setItem("current_business_url", window.location.href);
                });
                $(document).on('click', '.review_box li.list-inline-item', function(e) {
                    $(this).addClass("active");
                    $(this).prevAll("li").addClass("active");
                    $(this).nextAll("li").removeClass("active");
                    var rating = $(this).attr('data-value');
                    $("#selected_rating").val(rating);
                });
                /* var sign_up = document.getElementById('submit-review-form-btn');
                if (sign_up) {
                    document.getElementById("submit-review-form-btn").addEventListener("submit", function(evt) {
                        var response = grecaptcha.getResponse();
                        if (response.length == 0) {
                            document.getElementById('g-recaptcha').innerHTML = '<span style="color:red;">Captcha is required.</span>';
                            event.preventDefault();
                            return false;
                        } else {

                            return true;
                        }
                    });
                } */
                $(".submit-review-form-btn").on("click", function(e) {
                    console.log($("#review_text").val());
                    if ($("#selected_rating").val() == "") {
                        console.log("Please select Rating");
                        Swal.fire(
                            'Please select Rating!',
                            '',
                            'error'
                        );
                        return false;
                    } else if ($("#review_text").val() == "") {
                        // console.log("Please Enter Review");
                        Swal.fire(
                            'Please Enter Review!',
                            '',
                            'error'
                        );
                        return false;
                    }
                    var response = grecaptcha.getResponse();
                    if (response.length != 0) {
                        $.ajax({
                            type: "post",
                            url: "<?php echo base_url('/save-review'); ?>",
                            data: $("#add_review_box").serialize(),
                            cache: false,
                            success: function(res) {
                                // Success message
                                // console.log("success");
                                // console.log(res);
                                // location.reload();
                                Swal.fire({
                                    title: 'Thank you for your valuable feedback!',
                                    showDenyButton: false,
                                    showCancelButton: false,
                                    confirmButtonText: 'OK',
                                }).then((result) => {
                                    // Read more about isConfirmed, isDenied below
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                });
                            },
                            error: function(err) {
                                console.log("error");
                                console.log(err);
                            },
                            complete: function() {}
                        });
                    } else {
                        // console.log("Please Fill Captcha");
                        Swal.fire(
                            'Please Fill Captcha!',
                            '',
                            'error'
                        );
                        return false;
                    }
                });
            });
        </script>
        <!-- End Set cookie when reviwing if not logged in  -->

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
                        '<?php echo getenv('BLOG_BASE_URL'); ?>' + '/wp-json/wp/v2/posts?_embed&categories=189',
                        function(data) {
                            // console.log(data);
                            $('#tips-articles').trigger('remove.owl.carousel', [0]).trigger('refresh.owl.carousel');
                            $('#tips-articles').trigger('remove.owl.carousel', [1]).trigger('refresh.owl.carousel');
                            $('#tips-articles').trigger('remove.owl.carousel', [2]).trigger('refresh.owl.carousel');
                            if (data.length != 0) {
                                $.each(data, function(index, value) {
                                    // console.log(value._embedded['wp:featuredmedia']);
                                    var img = value._embedded['wp:featuredmedia'][0].source_url;

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
                        '<?php echo getenv('BLOG_BASE_URL'); ?>' + '/wp-json/wp/v2/posts?_embed&categories=176',
                        function(data) {
                            if (data.length != 0) {
                                $(".exploredubai_main .col-md-8 .ed_cols").html('');
                                $.each(data, function(index, value) {
                                    var img = value._embedded['wp:featuredmedia'][0].source_url;

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
                        '<?php echo getenv('BLOG_BASE_URL'); ?>' + '/wp-json/wp/v2/posts?_embed&categories=176',
                        function(data) {
                            if (data.length != 0) {
                                $(".exploredubai_main .col-md-4 .ed_cols_right").html('');
                                $.each(data, function(index, value) {
                                    if (index == 0) {
                                        return true;
                                    }
                                    var img = value._embedded['wp:featuredmedia'][0].source_url;

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


        <!-- Explore dubai PAGE -->


        <script>
            $(document).ready(function() {


                // $(".all_cat").show();
                $(".first_cat").show();
                $(".second_cat").hide();
                $(".third_cat").hide();
                $(".fourth_cat").hide();
                $(".fifth_cat").hide();

                function dubai_explore(category_id, div_id) {
                    // $('#msg').html('Updating score..');
                    if (category_id != "") {
                        var url_category = '&categories=' + category_id;
                    } else {
                        var url_category = "";
                    }
                    $.getJSON(
                        '<?php echo getenv('BLOG_BASE_URL'); ?>' + '/wp-json/wp/v2/posts?_embed' + url_category,
                        function(data) {
                            // console.log(data);
                            $("." + div_id + " .row").html("");
                            if (data.length != 0) {
                                $.each(data, function(index, value) {
                                    // console.log(value._embedded['wp:featuredmedia']);
                                    var img = value._embedded['wp:featuredmedia'][0].source_url;

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

                                    // debugger;
                                    $("." + div_id + " .row").append('<div class="col-sm-4"><div class="custom_card dubai-explore-listing-card"> <div class = "dubai-explore-bl-img" style="background:none;animation:none;"><a target="_blank" href="' + value.link + '"><img src = "' + img + '" ></a> </div><div class = "dubai-explore-card-body" ><a target="_blank" href="' + value.link + '"><h5 class = "dubai-explore-card-title" style="background:none;animation:none;">' + title + '</h5></a> <div class ="dubai-explore-eta_infos " style="background:none;animation:none;><span style="background:none;animation:none;">' + description + ' </span> </div> </div> </div></div>');
                                    return index < 5;
                                });
                            } else {
                                $("." + div_id + " .row").append('<div class="col-sm-12"><div class="custom_card dubai-explore-listing-card"> <p>No results found</p> </div></div>');
                            }
                            /* $('.title').html(data['livedata']['title']);
                            $('.current').html(data['livedata']['status']);
                            $('#msg').html(''); */
                        }
                    );
                }
                setTimeout(function() {
                    dubai_explore("186", "first_cat");
                }, 1000);


                $(".explore_top.expo_sec .our-directory .theme-btn-green").on("click", function() {
                    console.log($(this).attr('id'));
                    $(".explore_top.expo_sec .our-directory .theme-btn-green").removeClass("active");
                    $(this).addClass("active");
                    var category_id = $(this).attr('id');
                    if (category_id == "all_cat") {
                        $(".all_cat").show();
                        $(".first_cat").hide();
                        $(".second_cat").hide();
                        $(".third_cat").hide();
                        $(".fourth_cat").hide();
                        $(".fifth_cat").hide();

                        setTimeout(function() {
                            dubai_explore("", "all_cat");
                        }, 1000);
                    } else if (category_id == "first_cat") {
                        $(".all_cat").hide();
                        $(".first_cat").show();
                        $(".second_cat").hide();
                        $(".third_cat").hide();
                        $(".fourth_cat").hide();
                        $(".fifth_cat").hide();

                        setTimeout(function() {
                            dubai_explore("186", "first_cat");
                        }, 1000);
                    } else if (category_id == "second_cat") {
                        $(".all_cat").hide();
                        $(".first_cat").hide();
                        $(".second_cat").show();
                        $(".third_cat").hide();
                        $(".fourth_cat").hide();
                        $(".fifth_cat").hide();

                        setTimeout(function() {
                            dubai_explore("185", "second_cat");
                        }, 1000);
                    } else if (category_id == "third_cat") {
                        $(".all_cat").hide();
                        $(".first_cat").hide();
                        $(".second_cat").hide();
                        $(".third_cat").show();
                        $(".fourth_cat").hide();
                        $(".fifth_cat").hide();

                        setTimeout(function() {
                            dubai_explore("187", "third_cat");
                        }, 1000);
                    } else if (category_id == "fourth_cat") {
                        $(".all_cat").hide();
                        $(".first_cat").hide();
                        $(".second_cat").hide();
                        $(".third_cat").hide();
                        $(".fourth_cat").show();
                        $(".fifth_cat").hide();

                        setTimeout(function() {
                            dubai_explore("181", "fourth_cat");
                        }, 1000);
                    } else if (category_id == "fifth_cat") {
                        $(".all_cat").hide();
                        $(".first_cat").hide();
                        $(".second_cat").hide();
                        $(".third_cat").hide();
                        $(".fourth_cat").hide();
                        $(".fifth_cat").show();

                        setTimeout(function() {
                            dubai_explore("176", "fifth_cat");
                        }, 1000);
                    }
                });
            });
        </script>
        <!-- End Explore dubai PAGE  -->

        <!-- Show maps on detail page -->
        <script>
            /* let mapcenter = {
                lat: 1,
                lng: 1
            };
            service = new google.maps.Geocoder;
            infowindow = new google.maps.InfoWindow;
            var business_name = $("#busi_name").val();
            map = new google.maps.Map(document.getElementById("business_detail_map"), {
                zoom: 16,
                center: mapcenter
            });
            let latlng = {
                lat: 30.3322825,
                lng: 76.8605537
            };
            service.geocode({
                    "location": latlng
                },
                function(response, status) {
                    if (status === "OK") {
                        if (response[0]) {
                            let marker = new google.maps.Marker({
                                position: latlng,
                                map: map
                            });
                            // infowindow.setContent(response[0].formatted_address);
                            infowindow.setContent('<h6>Test</h6>');
                            infowindow.open(map, marker);
                        } else {
                            alert("no results found");
                        }
                    } else {
                        // alert("Reverse Geocoder failed due to : "+status);
                    }
                }
            ); */
        </script>

        <!-- Load more in business listing/subcategory page -->
        <script>
            var getUrlParameter = function getUrlParameter(sParam) {
                var sPageURL = window.location.search.substring(1),
                    sURLVariables = sPageURL.split('&'),
                    sParameterName,
                    i;

                for (i = 0; i < sURLVariables.length; i++) {
                    sParameterName = sURLVariables[i].split('=');

                    if (sParameterName[0] === sParam) {
                        return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                    }
                }
                return false;
            };
            var SITEURL = "<?php echo base_url(); ?>";
            var page = 1;
            var pathName = window.location.pathname.split('/');
            var pageName = "";


            $("#load_more_business_listings").on("click", function() {
                $.ajax({
                    url: SITEURL + "/businesses/loadmore?page=" + page + '&slug=' + pathName[2],
                    type: "POST",
                    // dataType: "html",
                }).done(function(data) {
                    // console.log(data);
                    $('.subcategory-page-listing').append(data);
                    page++;
                }).fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('No response');
                    Swal.fire(
                        'No more records',
                        '',
                        'error'
                    );
                    $("#load_more_business_listings").hide();
                });
            });
            $("#load_more_business_search").on("click", function() {
                var z = getUrlParameter('z');
                var d = getUrlParameter('d');
                var query = getUrlParameter('query');

                $.ajax({
                    url: SITEURL + "/search/loadmore?page=" + page + '&z=' + z + '&d=' + d + '&query=' + query,
                    type: "POST",
                }).done(function(data) {
                    // console.log(data);
                    $('.search-page-listing').append(data);
                    page++;
                }).fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('No response');
                    Swal.fire(
                        'No more records',
                        '',
                        'error'
                    );
                    $("#load_more_business_search").hide();
                });

            });
        </script>
        </body>

        </html>