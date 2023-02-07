 <a href="javascript:;" href="#g-map" data-scroll="g-map">
     <section class="our-directory b_listing">
         <div class="">
             <!-- <p class="sec-sub-title">Lorem lpsum is simply dummy text</p> -->
             <h1 class="sec-title">Business <span>Listings</span></h1>
             <div class="sort-by" style="display:none;">
                 <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                     <li class="nav-item">
                         <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" id="featured-tab" data-toggle="tab" href="#featured" role="tab" aria-controls="featured" aria-selected="false">Featured</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" id="best-rate-tab" data-toggle="tab" href="#best-rate" role="tab" aria-controls="best-rate" aria-selected="false">Best Rated</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" id="most-view-tab" data-toggle="tab" href="#most-view" role="tab" aria-controls="most-view" aria-selected="false">Most Viewed</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" id="popular-tab" data-toggle="tab" href="#popular" role="tab" aria-controls="popular" aria-selected="false">Popular</a>
                     </li>
                 </ul>
             </div>
             <div class="tab-content py-2" id="myTabContent">
                 <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                     <div id="our-directory" class="owl-carousel owl-theme">
                         <?php $all_feature_business_ten = 0;

                            if (is_array($all_feature_business) && count($all_feature_business) > 0) {
                                foreach ($all_feature_business as $business) {
                                    $all_feature_business_ten++;
                                    if ($all_feature_business_ten > 10) {
                                        break;
                                    }
                                    $total_aeverage = 0;
                                    if ($business['aeverage_rating'] != "") {
                                        $total_aeverage = ($business['avg_rating'] + $business['aeverage_rating']) / 2;
                                    } else {
                                        $total_aeverage = $business['avg_rating'];
                                    }
                                    // $total_aeverage = ($business['avg_rating'] + $business['aeverage_rating']) / 2;

                            ?>
                                 <div class="item">
                                     <div class="card">
                                         <div class="bl_img">
                                             <a href="<?php echo base_url() . "/business/" . $business['slug'];
                                                        ?>"><img height="480px" width="680px" class="card-img-top" src="<?php echo base_url(); ?>/assets/logo/<?php echo $business['banner'] ?>" alt="<?= $business['slug'] ?>"></a>
                                         </div>
                                         <div class="card-body">
                                             <!-- <h5 class="card-title"><?php echo $business['name'] ?></h5> -->
                                             <h5 class="card-title"><a href="<?php echo base_url() . "/business/" . $business['slug'];
                                                                                ?>"><?php echo $business['name']
                                                                                    ?></a></h5>
                                             <ul class="card-rating" style="display:none;">
                                                 <li><span class="rating"><?= ($business['ratings'] == "") ? "0" : $business['ratings']; ?></span><?= ($business['ratings'] == "") ? "0" : $business['ratings']; ?> ratings</li>
                                                 <!-- <li>From <span class="amount">$56.00</span></li> -->
                                                 <li><i class="fa fa-bed" aria-hidden="true"></i> <?php echo $business['sub_cat_name'] ?></li>
                                             </ul>
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
                                             <!-- <div class="users-review d-flex align-items-center">
                                             <div class="profile">
                                                 <img src="<?php echo base_url(); ?>/assets/front/images/user.png" alt="">
                                             </div>
                                             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                         </div> -->
                                         </div>
                                         <!--<div class="card-footer">
                                         <div class="about-info">
                                             <ul>
                                                 <li><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $business['city_name'] ?></li>
                                                 <li><a href="#" class="status-link open-now">Open Now!</a></li>
                                             </ul>
                                         </div>
                                     </div>-->
                                     </div>
                                 </div>
                         <?php }
                            } ?>
                     </div>
                 </div>
                 <div class="tab-pane fade" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                     <div id="our-directory-1" class="owl-carousel owl-theme">
                         <?php $all_featured_business_ten = 0;
                            if (is_array($all_featured_business) && count($all_featured_business) > 0) {
                                foreach ($all_featured_business as $business) {
                                    $all_featured_business_ten++;
                                    if ($all_featured_business_ten > 10) {
                                        break;
                                    } ?>
                                 <div class="item">
                                     <div class="card">
                                         <div class="bl_img">
                                             <a href="<?php echo base_url() . "/business/" . $business['slug'];
                                                        ?>"><img class="card-img-top" src="<?php echo base_url(); ?>/assets/logo/<?php echo $business['banner'] ?>" alt="Card image cap"></a>
                                         </div>
                                         <div class="card-body">
                                             <!-- <h5 class="card-title"><?php //echo $business['name'] 
                                                                            ?></h5> -->
                                             <h5 class="card-title"><a href="<?php echo base_url() . "/business/" . $business['slug'];
                                                                                ?>"><?php echo $business['name']
                                                                                    ?></a></h5>
                                             <ul class="card-rating" style="display:none;">
                                                 <li><span class="rating"><?= ($business['ratings'] == "") ? "0" : $business['ratings']; ?></span><?= ($business['ratings'] == "") ? "0" : $business['ratings']; ?> ratings</li>
                                                 <!-- <li>From <span class="amount">$56.00</span></li> -->
                                                 <li><i class="fa fa-bed" aria-hidden="true"></i> <?php echo $business['sub_cat_name'] ?></li>
                                             </ul>
                                             <!--  <div class="users-review d-flex align-items-center">
                                             <div class="profile">
                                                 <img src="<?php echo base_url(); ?>/assets/front/images/user.png" alt="">
                                             </div>
                                             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                         </div> -->
                                         </div>
                                         <!--<div class="card-footer">
                                         <div class="about-info">
                                             <ul>
                                                 <li><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $business['city_name'] ?></li>
                                                 <li><a href="#" class="status-link open-now">Open Now!</a></li>
                                             </ul>
                                         </div>
                                     </div>-->
                                     </div>
                                 </div>
                         <?php }
                            } ?>
                     </div>
                 </div>
                 <div class="tab-pane fade" id="best-rate" role="tabpanel" aria-labelledby="best-rate-tab">
                     <div id="our-directory-2" class="owl-carousel owl-theme">
                         <?php $all_best_rate_business_ten = 0;
                            if (is_array($all_best_rate_business) && count($all_best_rate_business) > 0) {
                                foreach ($all_best_rate_business as $business) {
                                    $all_best_rate_business_ten++;
                                    if ($all_best_rate_business_ten > 10) {
                                        break;
                                    }
                            ?>
                                 <div class="item">
                                     <div class="card">
                                         <div class="bl_img">
                                             <a href="<?php echo base_url() . "/business/" . $business['slug'];
                                                        ?>"><img class="card-img-top" src="<?php echo base_url(); ?>/assets/logo/<?php echo $business['banner'] ?>" alt="Card image cap"></a>
                                         </div>
                                         <div class="card-body">
                                             <!-- <h5 class="card-title"><?php //echo $business['name'] 
                                                                            ?></h5> -->
                                             <h5 class="card-title"><a href="<?php echo base_url() . "/business/" . $business['slug'];
                                                                                ?>"><?php echo $business['name']
                                                                                    ?></a></h5>
                                             <ul class="card-rating" style="display:none;">
                                                 <li><span class="rating"><?= ($business['ratings'] == "") ? "0" : $business['ratings']; ?></span><?= ($business['ratings'] == "") ? "0" : $business['ratings']; ?> ratings</li>
                                                 <!-- <li>From <span class="amount">$56.00</span></li> -->
                                                 <li><i class="fa fa-bed" aria-hidden="true"></i> <?php echo $business['sub_cat_name'] ?></li>
                                             </ul>
                                             <!-- <div class="users-review d-flex align-items-center">
                                             <div class="profile">
                                                 <img src="<?php echo base_url(); ?>/assets/front/images/user.png" alt="">
                                             </div>
                                             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                         </div> -->
                                         </div>
                                         <!--<div class="card-footer">
                                         <div class="about-info">
                                             <ul>
                                                 <li><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $business['city_name'] ?></li>
                                                 <li><a href="#" class="status-link open-now">Open Now!</a></li>
                                             </ul>
                                         </div>
                                     </div>-->
                                     </div>
                                 </div>
                         <?php }
                            } ?>
                     </div>
                 </div>
                 <div class="tab-pane fade" id="most-view" role="tabpanel" aria-labelledby="most-view-tab">
                     <div id="our-directory-3" class="owl-carousel owl-theme">
                         <?php $all_most_view_business_ten = 0;
                            if (is_array($all_most_view_business) && count($all_most_view_business) > 0) {
                                foreach ($all_most_view_business as $business) {
                                    $all_most_view_business_ten++;
                                    if ($all_most_view_business_ten > 10) {
                                        break;
                                    }
                            ?>
                                 <div class="item">
                                     <div class="card">
                                         <div class="bl_img">
                                             <a href="<?php echo base_url() . "/business/" . $business['slug'];
                                                        ?>"><img class="card-img-top" src="<?php echo base_url(); ?>/assets/logo/<?php echo $business['banner'] ?>" alt="Card image cap"></a>
                                         </div>
                                         <div class="card-body">
                                             <!-- <h5 class="card-title"><?php //echo $business['name'] 
                                                                            ?></h5> -->
                                             <h5 class="card-title"><a href="<?php echo base_url() . "/business/" . $business['slug'];
                                                                                ?>"><?php echo $business['name']
                                                                                    ?></a></h5>
                                             <ul class="card-rating" style="display:none;">
                                                 <li><span class="rating"><?= ($business['ratings'] == "") ? "0" : $business['ratings']; ?></span><?= ($business['ratings'] == "") ? "0" : $business['ratings']; ?> ratings</li>
                                                 <!-- <li>From <span class="amount">$56.00</span></li> -->
                                                 <li><i class="fa fa-bed" aria-hidden="true"></i> <?php echo $business['sub_cat_name'] ?></li>
                                             </ul>
                                             <!-- <div class="users-review d-flex align-items-center">
                                             <div class="profile">
                                                 <img src="<?php echo base_url(); ?>/assets/front/images/user.png" alt="">
                                             </div>
                                             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                         </div> -->
                                         </div>
                                         <!--<div class="card-footer">
                                         <div class="about-info">
                                             <ul>
                                                 <li><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $business['city_name'] ?></li>
                                                 <li><a href="#" class="status-link open-now">Open Now!</a></li>
                                             </ul>
                                         </div>
                                     </div>-->
                                     </div>
                                 </div>
                         <?php }
                            } ?>
                     </div>
                 </div>
                 <div class="tab-pane fade" id="popular" role="tabpanel" aria-labelledby="popular-tab">
                     <div id="our-directory-4" class="owl-carousel owl-theme">
                         <?php $all_popular_business_ten = 0;
                            if (is_array($all_popular_business) && count($all_popular_business) > 0) {
                                foreach ($all_popular_business as $business) {
                                    $all_popular_business_ten++;
                                    if ($all_popular_business_ten > 10) {
                                        break;
                                    }
                            ?>
                                 <div class="item">
                                     <div class="card">
                                         <div class="bl_img">
                                             <a href="<?php echo base_url() . "/business/" . $business['slug'];
                                                        ?>"><img class="card-img-top" src="<?php echo base_url(); ?>/assets/logo/<?php echo $business['banner'] ?>" alt="Card image cap"></a>
                                         </div>
                                         <div class="card-body">
                                             <!-- <h5 class="card-title"><?php //echo $business['name'] 
                                                                            ?></h5> -->
                                             <h5 class="card-title"><a href="<?php echo base_url() . "/business/" . $business['slug'];
                                                                                ?>"><?php echo $business['name']
                                                                                    ?></a></h5>
                                             <ul class="card-rating" style="display:none;">
                                                 <li><span class="rating"><?= ($business['ratings'] == "") ? "0" : $business['ratings']; ?></span><?= ($business['ratings'] == "") ? "0" : $business['ratings']; ?> ratings</li>
                                                 <!-- <li>From <span class="amount">$56.00</span></li> -->
                                                 <li><i class="fa fa-bed" aria-hidden="true"></i> <?php echo $business['sub_cat_name'] ?></li>
                                             </ul>
                                             <!-- <div class="users-review d-flex align-items-center">
                                             <div class="profile">
                                                 <img src="<?php echo base_url(); ?>/assets/front/images/user.png" alt="">
                                             </div>
                                             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                         </div> -->
                                         </div>
                                         <!--<div class="card-footer">
                                         <div class="about-info">
                                             <ul>
                                                 <li><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $business['city_name'] ?></li>
                                                 <li><a href="#" class="status-link open-now">Open Now!</a></li>
                                             </ul>
                                         </div>
                                     </div>-->
                                     </div>
                                 </div>
                         <?php }
                            } ?>
                     </div>
                 </div>
             </div>
         </div>
     </section>