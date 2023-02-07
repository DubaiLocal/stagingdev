<?php echo view('home/template/header'); ?>

<section class="business-detail-main detailmain_new">
    <div class="bd_bgnew">
        <div class="container">
            <div class="business_new">
                <div class="bd_leinfos">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="bd_leslide">
                                <img src="<?php echo base_url(); ?>/assets/logo/<?= $business_data->banner; ?>" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bd_lerightinfos">
                                <h3><?= $business_data->name; ?></h3>
                                <!-- <?php echo $business_data->num_rating . "<br/>"; //19 
                                        ?>
                                <?php echo $business_data->avg_rating . "<br/>"; //4.00000 
                                ?>
                                <?php echo $business_data->aeverage_rating . "<br/>"; //4.1 
                                ?>
                                <?php echo $business_data->count_rating . "<br/>"; //1 
                                ?>
                                <?php $total_aeverage = ($business_data->avg_rating + $business_data->aeverage_rating) / 2; //4.1 
                                ?>
                                <?php echo number_format((float)$total_aeverage, 1, '.', '') . "<br/>"; //4.1 
                                ?>
                                <?php echo $business_data->num_rating + $business_data->count_rating; //20 
                                ?> -->
                                <div class="bd_adrsinfos">
                                    <div class="ratings mb-2">
                                        <ul class="list-unstyled list-inline">
                                            <?php
                                            $flag_rating = 0;
                                            for ($k = 1; $k <= (int)number_format((float)$total_aeverage, 1, '.', ''); $k++) {
                                                echo '<li class="list-inline-item mr-0"><span class="fa fa-star checked"></span></li>';
                                                $flag_rating++;
                                            }
                                            if ($total_aeverage > $flag_rating) {
                                                $half_rating = $total_aeverage - $flag_rating;

                                                if ($half_rating > 0.5) {
                                                    echo '<li class="list-inline-item mr-0"><span class="fa fa-star-half checked"></span></li>';
                                                    echo '<li class="list-inline-item mr-0"><span class="fa fa-star-half"></span></li>';
                                                }
                                            }
                                            if ((5 - $total_aeverage) >= 0.5) {
                                                for ($j = 1; $j <= (5 - (int)number_format((float)$total_aeverage, 1, '.', '')); $j++) {
                                                    echo '<li class="list-inline-item mr-0"><span class="fa fa-star"></span></li>';
                                                }
                                            }
                                            ?>
                                            <li class="list-inline-item ml-3"><span class="badge badge-primary badge-pill"><?= number_format((float)$total_aeverage, 1, '.', ''); ?></span></li>
                                        </ul>
                                    </div>
                                    <?php if ($business_data->address != "") { ?>
                                        <p><img src="<?php echo base_url(); ?>/assets/front/images/bd_iconinfo1.png" alt=""> <?= $business_data->address; ?></p>
                                    <?php } ?>
                                    <?php if ($business_data->phone != "") { ?>
                                        <p><img src="<?php echo base_url(); ?>/assets/front/images/bd_iconinfo2.png" alt=""> <a href="tel:<?= $business_data->phone; ?>"><?= $business_data->phone; ?></a></p>
                                    <?php } ?>
                                    <!--<p><img src="<?php echo base_url(); ?>/assets/front/images/bd_iconinfo3.png" alt=""> 10:00am to 06:00pm</p>-->
                                    <?php if ($business_data->url != "") { ?>
                                        <p><img src="<?php echo base_url(); ?>/assets/front/images/bd_iconinfo4.png" alt=""> <a target="_blank" href="<?= $business_data->url ?>"><?= $business_data->url ?></a></p>
                                    <?php } ?>

                                </div>
                                <div class="bd_options">
                                    <?php if ($preview != "1") {  ?><a data-toggle="modal" data-target="#sendEnquiry"><img src="<?php echo base_url(); ?>/assets/front/images/bd_icon3.svg"> Send Inquiry</a><?php } ?>

                                    <!-- <a href=""><img src="<?php echo base_url(); ?>/assets/front/images/bd_icon4.svg"> Print</a>-->
                                    <?php if ($preview != "1") {  ?><a target="_blank" href="https://api.whatsapp.com/send?text=<?php echo base_url() . '/business/' . md5($business_data->id); ?>" data-action="share/whatsapp/share"><img src="<?php echo base_url(); ?>/assets/front/images/bd_icon2.svg"> Send to Friend</a><?php } ?>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ownbtn_visit">
            <div class="bd_dbtns">

                <?php if ($preview != "1") {  ?><a href="#" data-toggle="modal" data-target="#claimBusiness">Own This Business?</a> <?php } ?>
                <?php
                if ($business_data->url != "") { ?>

                    <a href="<?= $business_data->url ?>" target="_blank" class="visit_dbus">Visit Website</a>
                <?php }
                ?>


            </div>
        </div>
    </div>
    <div class="container">
        <div class="card business-info-sec" style="display:none;">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <div class="left">
                    <div class="profile-pic"> <img src="<?php echo base_url(); ?>/assets/logo/<?= $business_data->logo; ?>" class="img-fluid" alt=""> </div>
                </div>
                <div class="right">
                    <h4>
                        <?= $business_data->name; ?>
                    </h4>
                    <ul class="list-unstyled address-info">
                        <li><a><span class="icon"><img src="<?php echo base_url(); ?>/assets/front/images/location-icon-22x22.png" alt=""></span>
                                <?= $business_data->address; ?>
                            </a></li>
                        <?php if ($business_data->url != "") { ?>
                            <li><a href="<?= $business_data->url ?>" target="_blank"><span class="icon"><img src="<?php echo base_url(); ?>/assets/front/images/website-link-icon.png" alt=""></span>
                                    <?= $business_data->url; ?>
                                </a></li>
                        <?php } ?>
                    </ul>
                    <ul class="list-unstyled contact-info">
                        <?php if ($business_data->email != "") { ?>
                            <li><a href="mailto:<?= $business_data->email; ?>"><span class="icon"><img src="<?php echo base_url(); ?>/assets/front/images/mail-icon.png" alt=""></span>
                                    <?= $business_data->email; ?>
                                </a></li>
                        <?php } ?>
                        <li><a href="tel:<?= $business_data->phone; ?>"><span class="icon"><img src="<?php echo base_url(); ?>/assets/front/images/call-icon-22x22.png" alt=""></span>
                                <?= $business_data->phone; ?>
                            </a></li>
                    </ul>
                    <ul class="list-unstyled mt-2 button-group">
                        <li><a class="btn btn-primary rounded-0 theme-btn-red" data-toggle="modal" data-target="#claimBusiness">Own This Business</a></li>
                        <li><a target="_blank" href="https://api.whatsapp.com/send?text=<?php echo base_url() . '/business/' . $business_data->slug; ?>" data-action="share/whatsapp/share" class="btn btn-primary rounded-0 theme-btn-red">Send To Friend</a></li>
                        <li><a class="btn btn-primary rounded-0 theme-btn-red" data-toggle="modal" data-target="#sendEnquiry">Send Inquiry</a></li>
                        <!-- <li><a href="#" class="btn btn-primary rounded-0 theme-btn-red">Add To Favorites</a></li> -->
                        <!-- <li><a href="#" class="btn btn-primary rounded-0 theme-btn-red">Print</a></li> -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="description-sec mb-5">
                    <div class="title-5 123">Description</div>
                    <?php if ($business_data->description == "") { ?>
                        <p>No description</p>
                    <?php } else {
                        echo "<p>" . $business_data->description . "</p>";
                    } ?>
                    <?php if ($business_data->url != "") { ?>
                        <a href="<?= $business_data->url ?>" target="_blank" class="btn btn-primary rounded-0 mt-4 px-4 theme-btn-red">Visit Website</a>
                    <?php } ?>

                </div>
                <div class="gallery-main">
                    <div class="title-5">Gallery</div>
                    <div class="gallery mb-5">
                        <?php //print("<pre>" . print_r($business_data->more_images, true) . "</pre>"); 
                        ?>
                        <ul class="d-flex flex-wrap list-unstyled list-inline">
                            <?php if ($business_data->more_images != "") {
                                $more_image_array = explode(",", $business_data->more_images);
                                foreach ($more_image_array as $single_more_image) { ?>
                                    <li class="list-inline-item img-gallery-item">
                                        <div class="image-item">
                                            <a href="<?php echo base_url() . "/assets/more_images/" . $single_more_image; ?>" target="_blank" class="light-box-img">
                                                <img src="<?php echo base_url() . "/assets/more_images/" . $single_more_image; ?>" alt="">
                                            </a>
                                        </div>
                                    </li>
                                <?php }
                            } else { ?>
                                <li class="list-inline-item img-gallery-item">
                                    <div class="image-item">
                                        <a href="<?php echo base_url(); ?>/assets/images/cafe.png" class="light-box-img">
                                            <img src="<?php echo base_url(); ?>/assets/images/cafe.png" alt="">
                                        </a>
                                    </div>
                                </li>
                                <li class="list-inline-item img-gallery-item">
                                    <div class="image-item">
                                        <a href="<?php echo base_url(); ?>/assets/images/cafe1.png" class="light-box-img">
                                            <img src="<?php echo base_url(); ?>/assets/images/cafe1.png" alt="">
                                        </a>
                                    </div>
                                </li>
                                <li class="list-inline-item img-gallery-item add-gallery-img">
                                    <div class="image-item">
                                        <a class="add-image-btn" data-toggle="modal" data-target="#connectUs">
                                            <img src="<?php echo base_url(); ?>/assets/images/cafe3.png" alt="">
                                        </a>
                                    </div>
                                </li> <?php }
                                        ?>
                        </ul>
                    </div>
                </div>
                <?php if ($business_data->lat != NULL) { ?>
                    <div class="map_column" id="business_detail_map">
                        <?php
                        function encodeURIComponent($str)
                        {
                            $revert = array('%21' => '!', '%2A' => '*', '%27' => "'", '%28' => '(', '%29' => ')');
                            return strtr(rawurlencode($str), $revert);
                        }
                        ?>
                        <!-- <iframe src="https://maps.google.com/maps?&q=<?= encodeURIComponent($business_data->name); ?>&output=embed" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                        <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAGq0_bRV-SesoSb7tV39-qss63x7voh5g&q=<?= encodeURIComponent($business_data->address); ?>&zoom=14&center=<?= $business_data->lat ?>,<?= $business_data->lng ?>" width=" 100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>
                <?php } ?>
                <?php if ($reviews[0]['id'] != NULL) { ?>
                    <div class="comments-sec">
                        <div class="row">
                            <div class="col-md-12">
                                <?php //print_r($reviews); 
                                ?>
                                <?php
                                //if ($reviews[0]['id'] != NULL) {
                                foreach ($reviews as $single_review) { ?>
                                    <div class="media">
                                        <img class="mr-3 rounded-circle" alt="" src="<?php echo base_url(); ?>/assets/front/images/profile-img.jpg" width="60">
                                        <div class="media-body">
                                            <div class="row">
                                                <div class="col-8">
                                                    <input type="hidden" name="" value="<?= $single_review['score']; ?>">
                                                    <ul class="list-unstyled list-inline mb-2">
                                                        <?php for ($i = 1; $i <= (int)$single_review['score']; $i++) { ?>
                                                            <li class="list-inline-item mr-0"><span class="fa fa-star checked"></span></li>
                                                        <?php }
                                                        $remain_rating = 5 - (int)$single_review['score'];
                                                        for ($i = 1; $i <= $remain_rating; $i++) { ?>
                                                            <li class="list-inline-item mr-0"><span class="fa fa-star"></span></li>
                                                        <?php } ?>
                                                    </ul>
                                                    <div class="d-flex flex-wrap">
                                                        <h5 class="from-comment"><?= $single_review['user_name']; ?></h5>
                                                        <span class="date"><?php
                                                                            echo date('M j Y g:i A', strtotime($single_review['created']));
                                                                            ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <!-- <div class="pull-right reply"> <a href="#" class="reply-comment-btn">reply</a> </div> -->
                                                </div>
                                            </div>
                                            <div class="comment-text"> <?= $single_review['review']; ?></div>
                                        </div>
                                    </div>
                                <?php }
                                //} 
                                ?>
                                <!--end media-->
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>

            <div class="col-lg-4">
                <div class="working-hours-widget mb-5">
                    <div class="title-5">Working Hours</div> <?php
                                                                $decoded_timings =  json_decode($business_data->timings);
                                                                function convert_date_timings($input_date)
                                                                {
                                                                    $date = date_create($input_date);
                                                                    return date_format($date, "h:i A ");
                                                                }
                                                                ?> <ul class="list-unstyled">
                        <li> <span>Monday</span> <span><?php
                                                        if ($decoded_timings[0]->opening == '1969-12-31 18:00:00' || $decoded_timings[0]->opening == "" || $decoded_timings[0]->closing == '1969-12-31 18:00:00' || $decoded_timings[0]->closing == '') {
                                                            echo "Closed";
                                                        } else {
                                                            echo convert_date_timings($decoded_timings[0]->opening) . " - " . convert_date_timings($decoded_timings[0]->closing);
                                                        }
                                                        ?></span> </li>
                        <li> <span>Tuesday</span> <span><?php
                                                        if ($decoded_timings[1]->opening == '1969-12-31 18:00:00' || $decoded_timings[1]->opening == "" || $decoded_timings[1]->closing == '1969-12-31 18:00:00' || $decoded_timings[1]->closing == '') {
                                                            echo "Closed";
                                                        } else {
                                                            echo convert_date_timings($decoded_timings[1]->opening) . " - " . convert_date_timings($decoded_timings[1]->closing);
                                                        }
                                                        ?></span> </li>
                        <li> <span>Wednesday</span> <span><?php
                                                            if ($decoded_timings[2]->opening == '1969-12-31 18:00:00' || $decoded_timings[2]->opening == "" || $decoded_timings[2]->closing == '1969-12-31 18:00:00' || $decoded_timings[2]->closing == '') {
                                                                echo "Closed";
                                                            } else {
                                                                echo convert_date_timings($decoded_timings[2]->opening) . " - " . convert_date_timings($decoded_timings[2]->closing);
                                                            }
                                                            ?></span> </li>
                        <li> <span>Thursday</span> <span><?php
                                                            if ($decoded_timings[3]->opening == '1969-12-31 18:00:00' || $decoded_timings[3]->opening == "" || $decoded_timings[3]->closing == '1969-12-31 18:00:00' || $decoded_timings[3]->closing == '') {
                                                                echo "Closed";
                                                            } else {
                                                                echo convert_date_timings($decoded_timings[3]->opening) . " - " . convert_date_timings($decoded_timings[3]->closing);
                                                            }
                                                            ?></span> </li>
                        <li> <span>Friday</span> <span><?php
                                                        if ($decoded_timings[4]->opening == '1969-12-31 18:00:00' || $decoded_timings[4]->opening == "" || $decoded_timings[4]->closing == '1969-12-31 18:00:00' || $decoded_timings[4]->closing == '') {
                                                            echo "Closed";
                                                        } else {
                                                            echo convert_date_timings($decoded_timings[4]->opening) . " - " . convert_date_timings($decoded_timings[4]->closing);
                                                        }
                                                        ?></span> </li>
                        <li> <span>Saturday</span> <span><?php
                                                            if ($decoded_timings[5]->opening == '1969-12-31 18:00:00' || $decoded_timings[5]->opening == "" || $decoded_timings[5]->closing == '1969-12-31 18:00:00' || $decoded_timings[5]->closing == '') {
                                                                echo "Closed";
                                                            } else {
                                                                echo convert_date_timings($decoded_timings[5]->opening) . " - " . convert_date_timings($decoded_timings[5]->closing);
                                                            }
                                                            ?></span> </li>
                        <li> <span>Sunday</span> <span><?php
                                                        if ($decoded_timings[6]->opening == '1969-12-31 18:00:00' || $decoded_timings[6]->opening == "" || $decoded_timings[6]->closing == '1969-12-31 18:00:00' || $decoded_timings[6]->closing == '') {
                                                            echo "Closed";
                                                        } else {
                                                            echo convert_date_timings($decoded_timings[6]->opening) . " - " . convert_date_timings($decoded_timings[6]->closing);
                                                        }
                                                        ?></span> </li>
                    </ul>
                </div>

                <?php //if ($preview != "1") { 
                ?>
                <form id="add_review_box" method="POST" <?php echo ($preview == "1") ? "style='display:none;'" :  ""; ?>>
                    <div class="review_box" id="review_us">
                        <div class="add-review mb-5">
                            <!--<div class="title-5">Add Review</div>-->
                            <div class="review-ratings mb-5 d-flex flex-wrap align-items-center">
                                <div class="rating-count">
                                    <h3><?php $rating = number_format((float)$business_data->avg_rating, 1, '.', '');
                                        echo number_format((float)$business_data->avg_rating, 1, '.', '');
                                        ?></h3>
                                    <ul class="list-unstyled list-inline mb-2">
                                        <?php for ($j = 1; $j <= (int)number_format((float)$business_data->avg_rating, 1, '.', ''); $j++) {
                                            echo '<li class="list-inline-item mr-0"><span class="fa fa-star checked"></span></li>';
                                        }
                                        if ((5 - (int)$rating) != 0) {
                                            for ($j = 1; $j <= (5 - (int)number_format((float)$business_data->avg_rating, 1, '.', '')); $j++) {
                                                echo '<li class="list-inline-item mr-0"><span class="fa fa-star"></span></li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                    <!--<p>Superb Reviews</p>-->
                                    <!-- <p>Out of <?= $reviews[0]['count_rating'] ?> Reviews</p> -->
                                </div>
                                <div class="give-your-review text-center">

                                    <ul class="list-unstyled list-inline">
                                        <li class="list-inline-item mr-0 wow bounceIn" data-value="1" data-wow-delay="0.2s"><span class="fa fa-star"></span></li>
                                        <li class="list-inline-item mr-0 wow bounceIn" data-value="2" data-wow-delay="0.4s"><span class="fa fa-star"></span></li>
                                        <li class="list-inline-item mr-0 wow bounceIn" data-value="3" data-wow-delay="0.6s"><span class="fa fa-star"></span></li>
                                        <li class="list-inline-item mr-0 wow bounceIn" data-value="4" data-wow-delay="0.8s"><span class="fa fa-star"></span></li>
                                        <li class="list-inline-item mr-0 wow bounceIn" data-value="5" data-wow-delay="1s"><span class="fa fa-star"></span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-fields">
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" name="review_text" id="review_text" placeholder="Your Message*"></textarea>
                                </div>
                            </div>
                            <div class="form-fields">
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="6LfYycwhAAAAADfGTmZ76aHNBVcO2kXn_8uVWs0v">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="busi_id" name="busi_id" value="<?= $business_data->id; ?>">
                            <input type="hidden" id="busi_slug" name="busi_slug" value="<?= $business_data->slug; ?>">
                            <input type="hidden" id="busi_name" name="busi_name" value="<?= $business_data->name; ?>">
                            <input type="hidden" id="selected_rating" name="selected_rating">
                            <button type="button" id="submit-review-form-btn" class="btn btn-primary rounded-0 px-4 mt-3 theme-btn-red submit-review-form-btn">Submit Review</button>
                            <?php //if ($logged_in == 1) { 
                            ?>
                            <!-- <button type="button" class="btn btn-primary rounded-0 px-4 mt-3 theme-btn-red submit-review-form-btn">Submit Review</button> -->
                            <?php //} else { 
                            ?>
                            <!-- <p>Please <a id="submit_review_login" href="<?php echo base_url(); ?>/login">login</a> to Submit Review</p> -->
                            <?php // } 
                            ?>
                </form>
                <?php //} 
                ?>

                <?php //echo view('home/sections/find_by_category'); 
                ?>
                <div class="nearby-listing-widget mb-5" style="display:none;">
                    <div class="title-5">Nearby Listings</div>
                    <ul class="list-unstyled">
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="img mr-3"> <img src="<?php // echo base_url(); 
                                                                    ?>/assets/front/images/near-by-listing-img-1.jpg" alt=""> </div>
                                <div>
                                    <p class="fw-500 name">Hotel Imperial</p>
                                    <p>128 Pill Si New York, NY 100002</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="img mr-3"> <img src="<?php // echo base_url(); 
                                                                    ?>/assets/front/images/near-by-listing-img-2.jpg" alt=""> </div>
                                <div>
                                    <p class="fw-500 name">Roman Craft Hotel</p>
                                    <p>Miami Pill, New York, NY 122200</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="img mr-3"> <img src="<?php // echo base_url(); 
                                                                    ?>/assets/front/images/near-by-listing-img-1.jpg" alt=""> </div>
                                <div>
                                    <p class="fw-500 name">Hotel Imperial</p>
                                    <p>128 Pill Si New York, NY 100002</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    </div>
    </div>
</section>
<section class="business-det-share-exp share-your-exp">
    <div class="container">
        <div class="business-claim-block">
            <div class="headings mb-4 d-flex flex-wrap align-items-center justify-content-center">
                <h3>
                    <?= $business_data->name; ?>
                </h3>
                <div class="ratings">
                    <?php $rating = number_format((float)$business_data->avg_rating, 1, '.', '');
                    ?>
                    <ul class="list-unstyled list-inline">
                        <?php for ($i = 1; $i <= (int)number_format((float)$business_data->avg_rating, 1, '.', ''); $i++) {
                            echo '<li class="list-inline-item mr-0"><span class="fa fa-star checked"></span></li>';
                        }
                        if ((5 - (int)$rating) != 0) {
                            for ($j = 1; $j <= (5 - (int)number_format((float)$business_data->avg_rating, 1, '.', '')); $j++) {
                                echo '<li class="list-inline-item mr-0"><span class="fa fa-star"></span></li>';
                            }
                        }
                        ?>
                        <li class="list-inline-item mr-0">(<?= number_format((float)$business_data->avg_rating, 1, '.', ''); ?>)</span></li>
                    </ul>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <?php if ($business_data->address != "") { ?>
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon"> <img src="<?php echo base_url(); ?>/assets/front/images/location-icon.png" alt=""> </div>
                            <p class="para-text">
                                <?= $business_data->address ?>
                            </p>
                        </div>
                    <?php } ?>
                </div>
                <!-- <div class="col-lg-4">
                    
                </div>-->
                <div class="col-lg-6"> <?php if ($business_data->phone != "") { ?>
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon"> <img src="<?php echo base_url(); ?>/assets/front/images/call-icon-22x22.png" alt=""> </div>
                            <p class="para-text">
                                <a href="tel:<?= $business_data->phone; ?>"><?= $business_data->phone; ?></a>
                            </p>
                        </div>
                    <?php } ?> <?php if ($business_data->email != "") { ?>
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon"> <img src="<?php echo base_url(); ?>/assets/front/images/mail-icon.png" alt=""> </div>
                            <p class="para-text">
                                <a href="mailto:<?= $business_data->email; ?>"><?= $business_data->email; ?></a>
                            </p>
                        </div>
                    <?php } ?> <?php if ($business_data->url != "") { ?>
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon"> <img src="<?php echo base_url(); ?>/assets/front/images/website-link-icon.png" alt=""> </div>
                            <p class="para-text">
                                <a href="<?= $business_data->url ?>" target="_blank"><?= $business_data->url; ?></a>
                            </p>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="text-center mt-3">
                <?php if ($preview != "1") {  ?>
                    <a href="#" data-toggle="modal" data-target="#claimBusiness" class="btn btn-primary rounded-0 theme-btn-red">Claim This Business</a>
                <?php } ?>

            </div>
        </div>
    </div>
</section><!-- Modal -->
<div class="modal fade" id="sendEnquiry" tabindex="-1" role="dialog" aria-labelledby="sendEnquiryTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal_popde send_enquiry_pop" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Send Enquiry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="send_enquiry_form">
                    <div class="popform_infos">
                        <div class="formrow">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="custom">Name:</label>
                                        <input type="text" name="enq_name" id="enq_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="formrow">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="custom">Email:</label>
                                        <input type="text" name="email" id="enq_email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="custom">Phone No:</label>
                                        <input type="text" name="phone_no" id="enq_phone_no" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="custom">Message: <span>*</span></label>
                                        <textarea name="enquiry_text" id="enquiry_text" class="form-control" cols="30" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="g-recaptcha" data-sitekey="6LfYycwhAAAAADfGTmZ76aHNBVcO2kXn_8uVWs0v" data-callback="recaptchaCallback"></div>
                                        <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">

                                        <!-- <div id="g-recaptcha"></div> -->
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="popsend_btn">
                                        <input type="hidden" id="busi_id" name="busi_id" value="<?= $business_data->id; ?>">
                                        <button type="submit" name="submit" id="send_enquiry_btn" class="btn btn_custom">Send Enquiry</button>
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
</div>
<div class="modal fade" id="claimBusiness" tabindex="-1" role="dialog" aria-labelledby="claimBusinessTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal_popde claim_business_pop" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Claim This Business</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="claim_business_form" method="POST">
                    <div class="popform_infos">
                        <div class="formrow">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="custom">Name: <span>*</span></label>
                                        <input type="text" name="name" id="claim_business_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="custom">Email: <span>*</span></label>
                                        <input type="text" name="email" id="claim_business_email" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="formrow">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="custom">Phone No: <span>*</span></label>
                                        <input type="text" name="phone_no" id="claim_business_phone" class="form-control">
                                        <input type="hidden" id="busi_id" name="busi_id" value="<?= $business_data->id; ?>">
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="custom">Website Url: <span>*</span></label>
                                        <input type="text" name="website_url" id="enq_website_url" class="form-control">
                                    </div>
                                </div> -->
                                <div class="g-recaptcha" data-sitekey="6LfYycwhAAAAADfGTmZ76aHNBVcO2kXn_8uVWs0v" data-callback="recaptchaCallback"></div>
                                <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                            </div>
                        </div>
                        <div class="formrow">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="popsend_btn">

                                        <button type="submit" name="submit" id="claim_business_btn" class="btn btn_custom">Send</button>
                                        <!-- <input type="submit" id="claim_business_btn" class="btn btn_custom" value="Validate!"> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>-->
        </div>
    </div>
</div>
<?php echo view('home/template/footer'); ?>