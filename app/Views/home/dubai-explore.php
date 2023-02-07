<?php echo view('home/template/header'); ?>
<section class="categories-banner about_banner explore_banner">
    <div class="container">
        <div class="col-12 text-center">
            <h1 class="fw-600">Explore Dubai</h1>
            <p>Travel to the any corner of Dubai, without going around in circles.</p>
        </div>
    </div>
</section>
<section class="explore_top expo_sec">
    <div class="container">
        <div class="sec-title">Explore <span>Top Attractions</span></div>
    </div>
    <div class="our-directory b_listing">
        <div class="container">
            <div class="row tab_btn_center">
                <!-- <div class="col-md-2"><button class="btn theme-btn-green active" id="all_cat">All</button></div> -->
                <div class="col-md-2"><button class="btn theme-btn-green active" id="first_cat">Entertainment</button></div>
                <div class="col-md-2"><button class="btn theme-btn-green" id="second_cat">Shopping</button> </div>
                <div class="col-md-2"><button class="btn theme-btn-green" id="third_cat">Tour & Travels</button> </div>
                <div class="col-md-2"><button class="btn theme-btn-green" id="fourth_cat">Food & Delicacy</button> </div>
                <div class="col-md-2"><button class="btn theme-btn-green" id="fifth_cat">Top Attractions</button> </div>
            </div>
        </div>
        <!-- <div class="dubai-explore-listing-card-container all_cat">
            <div class="container">
                <div class="row">
                    <?php for ($i = 0; $i <= 2; $i++) { ?>
                        <div class="col-sm-4">
                            <div class="custom_card dubai-explore-listing-card">
                                <div class="dubai-explore-bl-img"><img src=""></div>
                                <div class="dubai-explore-card-body">
                                    <h5 class="dubai-explore-card-title"></h5>
                                    <div class="dubai-explore-eta_infos">
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div> -->
        <div class="dubai-explore-listing-card-container first_cat">
            <div class="container">
                <div class="row">
                    <?php for ($j = 0; $j <= 2; $j++) { ?>
                        <div class="col-sm-4">
                            <div class="custom_card dubai-explore-listing-card">
                                <div class="dubai-explore-bl-img"><img src=""></div>
                                <div class="dubai-explore-card-body">
                                    <h5 class="dubai-explore-card-title"></h5>
                                    <div class="dubai-explore-eta_infos">
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="dubai-explore-listing-card-container second_cat" style="display:none">
            <div class="container">
                <div class="row">
                    <?php for ($i = 0; $i <= 2; $i++) { ?>
                        <div class="col-sm-4">
                            <div class="custom_card dubai-explore-listing-card">
                                <div class="dubai-explore-bl-img"><img src=""></div>
                                <div class="dubai-explore-card-body">
                                    <h5 class="dubai-explore-card-title"></h5>
                                    <div class="dubai-explore-eta_infos">
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="dubai-explore-listing-card-container third_cat" style="display:none">
            <div class="container">
                <div class="row">
                    <?php for ($i = 0; $i <= 2; $i++) { ?>
                        <div class="col-sm-4">
                            <div class="custom_card dubai-explore-listing-card">
                                <div class="dubai-explore-bl-img"><img src=""></div>
                                <div class="dubai-explore-card-body">
                                    <h5 class="dubai-explore-card-title"></h5>
                                    <div class="dubai-explore-eta_infos">
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="dubai-explore-listing-card-container fourth_cat" style="display:none">
            <div class="container">
                <div class="row">
                    <?php for ($i = 0; $i <= 2; $i++) { ?>
                        <div class="col-sm-4">
                            <div class="custom_card dubai-explore-listing-card">
                                <div class="dubai-explore-bl-img"><img src=""></div>
                                <div class="dubai-explore-card-body">
                                    <h5 class="dubai-explore-card-title"></h5>
                                    <div class="dubai-explore-eta_infos">
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="dubai-explore-listing-card-container fifth_cat" style="display:none">
            <div class="container">
                <div class="row">
                    <?php for ($i = 0; $i <= 2; $i++) { ?>
                        <div class="col-sm-4">
                            <div class="custom_card dubai-explore-listing-card">
                                <div class="dubai-explore-bl-img"><img src=""></div>
                                <div class="dubai-explore-card-body">
                                    <h5 class="dubai-explore-card-title"></h5>
                                    <div class="dubai-explore-eta_infos">
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- <div class="sort-by" style="display:none;">
            <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">Latest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="featured-tab" data-toggle="tab" href="#featured" role="tab" aria-controls="featured" aria-selected="false">Tourist Places</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="best-rate-tab" data-toggle="tab" href="#best-rate" role="tab" aria-controls="best-rate" aria-selected="false">Clubs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="most-view-tab" data-toggle="tab" href="#most-view" role="tab" aria-controls="most-view" aria-selected="false">Malls</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="popular-tab" data-toggle="tab" href="#popular" role="tab" aria-controls="popular" aria-selected="false">Hotels</a>
                </li>
            </ul>
        </div> -->
        <!-- <div class="tab-content py-2" id="myTabContent">
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                <div id="our-directory" class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="card">
                            <div class="bl_img"><img src="<?php echo base_url(); ?>/assets/front/images/Burj-Khalifa-At-The-Top-In-Dubai.jpg"></div>
                            <div class="card-body">
                                <h5 class="card-title">Burj Khalifa At The Top In Dubai</h5>
                                <div class="eta_infos">
                                    <p>Take in the breathtaking view from the top of the Burj Khalifa, and feel the adrenaline rush.</p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="about-info">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <div class="bl_img"><img src="<?php echo base_url(); ?>/assets/front/images/Dubai-Aquarium-And-Underwater-Zoo-in-Dubai.jpg"></div>
                            <div class="card-body">
                                <h5 class="card-title">Dubai Aquarium And Underwater Zoo in Dubai</h5>
                                <div class="eta_infos">
                                    <p>Explore the underwater world at Dubai Aquarium & Underwater Zoo, home to marine life.</p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="about-info">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <div class="bl_img"><img src="<?php echo base_url(); ?>/assets/front/images/The-Dubai-Mall2.jpg"></div>
                            <div class="card-body">
                                <h5 class="card-title">Img Worlds Of Adventure In Dubai</h5>
                                <div class="eta_infos">
                                    <p>Enjoy more than 1.5 million square feet of playground space with 4 epic adventure zones!</p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="about-info">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <div class="bl_img"><img src="<?php echo base_url(); ?>/assets/front/images/Cavalli-Club.jpg"></div>
                            <div class="card-body">
                                <h5 class="card-title">Museum of the Future</h5>
                                <div class="eta_infos">
                                    <p>A seven-story hollow elliptical structure designed from stainless steel, the museum takes the visitors on a new experiential journey. </p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="about-info">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <div class="bl_img"><img src="<?php echo base_url(); ?>/assets/front/images/Museum-of-the-Future.jpg"></div>
                            <div class="card-body">
                                <h5 class="card-title">Cavalli Club</h5>
                                <div class="eta_infos">
                                    <p>Have fun in the oldest running club in Dubai as the atmosphere, ambiance, and hospitality is worth experiencing. </p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="about-info">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                <div id="our-directory1" class="owl-carousel owl-theme">

                    <div class="item">
                        <div class="card">
                            <div class="bl_img"><img src="<?php echo base_url(); ?>/assets/front/images/eta_img3.jpg"></div>
                            <div class="card-body">
                                <h5 class="card-title">Laguna Waterpark La Mer</h5>
                                <ul class="card-rating">
                                    <li><span class="rating">4.0</span>4 ratings</li>
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i> Dubai</li>
                                </ul>
                                <div class="eta_infos">
                                    <p>Laguna Waterpark La Mer is one of the newest and coolest places to chill out in Dubai.</p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="about-info">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="best-rate" role="tabpanel" aria-labelledby="best-rate-tab">
                <div id="our-directory2" class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="card">
                            <div class="bl_img"><img src="<?php echo base_url(); ?>/assets/front/images/eta_img3.jpg"></div>
                            <div class="card-body">
                                <h5 class="card-title">Laguna Waterpark La Mer</h5>
                                <ul class="card-rating">
                                    <li><span class="rating">4.0</span>4 ratings</li>
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i> Dubai</li>
                                </ul>
                                <div class="eta_infos">
                                    <p>Laguna Waterpark La Mer is one of the newest and coolest places to chill out in Dubai.</p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="about-info">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="most-view" role="tabpanel" aria-labelledby="most-view-tab">
                <div id="our-directory3" class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="card">
                            <div class="bl_img"><img src="<?php echo base_url(); ?>/assets/front/images/eta_img2.jpg"></div>
                            <div class="card-body">
                                <h5 class="card-title">The Green Planet Dubai</h5>
                                <ul class="card-rating">
                                    <li><span class="rating">4.0</span>4 ratings</li>
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i> Dubai</li>
                                </ul>
                                <div class="eta_infos">
                                    <p>Explore The Green Planet Dubai, a fascinating tropical rainforest with a unique ecosystem and 3000 flora</p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="about-info">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="popular" role="tabpanel" aria-labelledby="popular-tab">
                <div id="our-directory4" class="owl-carousel owl-theme">
                    <div class="card">
                        <div class="bl_img"><img src="<?php echo base_url(); ?>/assets/front/images/eta_img1.jpg"></div>
                        <div class="card-body">
                            <h5 class="card-title">Dubai Parks and Resorts</h5>
                            <ul class="card-rating">
                                <li><span class="rating">4.0</span>4 ratings</li>
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i> Dubai</li>
                            </ul>
                            <div class="eta_infos">
                                <p>Dubai Parks and Resorts - Motiongate, Legoland & Bollywood Parks Dubai</p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="about-info">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    </div>
</section>
<section class="upcoming_con expo_sec">
    <div class="container">
        <div class="sec-title">Upcoming <span>Concerts/Events</span></div>
        <div class="use_grid">
            <div class="row">
                
                <div class="col-md-6">
                                <div class="use_main">
                                    <div class="use_img">
                                        <a href="<?= getenv('BLOG_BASE_URL'); ?>/60ft-dubai-traditional-dhow-sailing-race-15-january-2023/" rel="bookmark" target="_blank">
                                            <img src="<?php echo base_url(); ?>/assets/front/images/sailing-race.jpg"> </a>
                                    </div>
                                    <div class="use_infos">
                                        <a href="<?= getenv('BLOG_BASE_URL'); ?>/60ft-dubai-traditional-dhow-sailing-race-15-january-2023/" rel="bookmark" target="_blank">
                                            <h5>60ft Dubai Traditional Dhow Sailing Race (15 JANUARY 2023) </h5>
                                        </a>
                                        <p>Enjoy a wonderful experience at the 60ft Dubai Traditional Dhow Sailing Race as you witness the majestic ships from the shore.This amazing event is being organized by the Dubai International Marine Club (DIMC). The winter calendar has already been booked for these water sports tournament. The events are taking the ideal advantage of the city’s perfect water and weather.This event is loved not only by the natives of UAE but also by international tourists.  You will witness diverse spots like sailing, rowing, and kitesurfing. The dhows are crewed exclusively by Emiratis, calling upon their skill, endurance, and memories of ancestral heritage during this high-speed race.</p>
                                    </div>
                                </div>
                            </div>

                <div class="col-md-6">
                    <div class="right_use">
                        <div class="row">
                        <div class="col-md-6">
                                <div class="use_main">
                                    <div class="use_img">
                                        <a href="<?= getenv('BLOG_BASE_URL'); ?>/dubai-kayak-boats-fishing-tournament-20-january-2023/" rel="bookmark" target="_blank">
                                            <img src="<?php echo base_url(); ?>/assets/front/images/kayak-boats.jpg"></a>
                                    </div>
                                    <div class="use_infos">
                                        <a href="<?= getenv('BLOG_BASE_URL'); ?>/dubai-kayak-boats-fishing-tournament-20-january-2023/" rel="bookmark" target="_blank">
                                            <h5>Dubai Kayak Boats Fishing Tournament (20 JANUARY 2023)</h5>
                                        </a>
                                        <p>Dubai Kayak Boats Fishing Tournament will held on 20th January 2023. This event is undoubtedly a beautiful yet action-packed adventure that you may experience once in your lifetime. Be a part of this amzaing event.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="use_main">
                                    <div class="use_img">
                                        <a href="<?= getenv('BLOG_BASE_URL'); ?>/havasi-drum-and-piano-concert-14-january-2023/" rel="bookmark" target="_blank">
                                            <img src="<?php echo base_url(); ?>/assets/front/images/Havasi.jpg"> </a>
                                    </div>
                                    <div class="use_infos">
                                        <a href="<?= getenv('BLOG_BASE_URL'); ?>/havasi-drum-and-piano-concert-14-january-2023/" rel="bookmark" target="_blank">
                                            <h5>Havasi Drum and Piano Concert (14 JANUARY 2023)</h5>
                                        </a>
                                        <p>Havasi Drum and Piano concerts have performed sold-out shows at venues like Carnegie Hall and the Sydney Opera House.It is a special event featuring the first-ever musical battle between him and a wild rock drummer.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="right_use">
                        <div class="row">
                        <div class="col-md-6">
                                <div class="use_main">
                                    <div class="use_img">
                                        <a href="<?= getenv('BLOG_BASE_URL'); ?>/khalid-abdulrahman-live-13-january-2023/" rel="bookmark" target="_blank">
                                            <img src="<?php echo base_url(); ?>/assets/front/images/Khalid.jpg"> </a>
                                    </div>
                                    <div class="use_infos">
                                        <a href="<?= getenv('BLOG_BASE_URL'); ?>/khalid-abdulrahman-live-13-january-2023/" rel="bookmark" target="_blank">
                                            <h5>Khalid Abdulrahman Live (13 JANUARY 2023)</h5>
                                        </a>
                                        <p>Experience nostalgia as you head back to the 90s with the iconic voice of Khalid Abdulrahman on 13 January at Sheikh Mohammed Bin Rashid, Downtown Dubai</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                    <div class="use_main">
                        <div class="use_img">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/rahma-riad-live-11-january-2023/" rel="bookmark" target="_blank">
                                <img src="<?php echo base_url(); ?>/assets/front/images/Rahma.jpg"> </a>
                        </div>
                        <div class="use_infos">

                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/rahma-riad-live-11-january-2023/" rel="bookmark" target="_blank">
                                <h5>Rahma Riad Live (11 January 2023)</h5>
                            </a>
                            <p>Iraqi singing sensation, Rahma Riad is all set to grab all the spotlight on 11 January 2023 as she performs her hits at the beginning of her year.</p>
                        </div>
                    </div>
                </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="thingsdo expo_sec">
    <div class="container">
        <div class="sec-title">Things to do in <span>Dubai</span></div>
        <div class="thinggrid">
            <div class="row">
                <div class="col-md-4">
                    <div class="thingmain">
                        <div class="thing_iconinfos">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/user-guide-to-explore-burj-khalifa-tallest-building-in-the-world/" target="_blank">
                                <h4>User Guide to Explore Burj Khalifa: Tallest Building in the World
                                    <div class="thing_icon">
                                        <img src="<?php echo base_url(); ?>/assets/front/images/th_icon1.png">
                                    </div>

                                </h4>
                            </a>
                        </div>
                        <div class="thing_infos">
                            <p>Burj Khalifa stands at a height of nearly 828 meters, making it one of the tallest skyscrapers in the world. As part of the construction of this massive structure, Dubai wanted to build a reputation for being a victorious entity around the world. <a href="<?= getenv('BLOG_BASE_URL'); ?>/user-guide-to-explore-burj-khalifa-tallest-building-in-the-world/" target="_blank">[Explore Now]</a></p>

                        </div>
                    </div>
                    <div class="thingmain">
                        <div class="thing_iconinfos">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/tips-to-make-most-of-dubai-desert-safari/" target="_blank">
                                <h4>Tips to Make Most of Dubai Dessert Safari
                                    <div class="thing_icon">
                                        <img src="<?php echo base_url(); ?>/assets/front/images/green-planet.svg">
                                    </div>
                                </h4>
                            </a>
                        </div>
                        <div class="thing_infos">
                            <p>The Dubai Emirate is home to gleaming skyscrapers, cutting-edge architectural marvels, a stunning skyline, a rich cultural heritage, and wonderful traditions that are evident across Dubai. The best experiences of Dubai are to be expected... <a href="<?= getenv('BLOG_BASE_URL'); ?>/tips-to-make-most-of-dubai-desert-safari/" target="_blank">[Explore Now]</a></p>

                        </div>
                    </div>
                    <div class="thingmain">
                        <div class="thing_iconinfos">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/what-makes-dubai-dolphin-seal-show-unique/" target="_blank">
                                <h4>What Makes Dubai Dolphin & Seal Show Unique?
                                    <div class="thing_icon">
                                        <img src="<?php echo base_url(); ?>/assets/front/images/Dolphinarium.svg">
                                    </div>
                                </h4>
                            </a>
                        </div>
                        <div class="thing_infos">
                            <p>Dubai’s opulent nature makes it an exhilarating location to visit. One of the best places to visit while you are on a trip to Dubai is- The Dubai Dolphinarium. The Dubai Dolphinarium is one such attraction. <a href="<?= getenv('BLOG_BASE_URL'); ?>/what-makes-dubai-dolphin-seal-show-unique/" target="_blank">[Explore Now]</a></p>

                        </div>
                    </div>
                    <div class="thingmain">
                        <div class="thing_iconinfos">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/fly-along-worlds-longest-zipline-jebel-jais/"  target="_blank">
                                <h4>Fly Along World’s Longest Zipline: Jebel Jais
                                    <div class="thing_icon">
                                        <img src="<?php echo base_url(); ?>/assets/front/images/zipline.svg">
                                    </div>
                                </h4>
                            </a>
                        </div>
                        <div class="thing_infos">
                            <p>Hey thrill seekers and adventure junkies, do you want an extra dose of fun while you are on a trip to UAE? Ras Al Khaimah’s Jebel Jais is here to give you adventurous lifetime memories. <a href="<?= getenv('BLOG_BASE_URL'); ?>/fly-along-worlds-longest-zipline-jebel-jais/" target="_blank">[Explore Now]</a></p>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thing_centerimg">
                        <img src="<?php echo base_url(); ?>/assets/front/images/thing_center.png">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thingmain thing_right">
                        <div class="thing_iconinfos">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/enjoy-your-day-at-atlantis-aquaventure-lost-chambers-aquarium/" target="_blank">
                                <h4>Enjoy your day at Atlantis Aquaventure & Lost Chambers Aquarium
                                    <div class="thing_icon">
                                        <img src="<?php echo base_url(); ?>/assets/front/images/th_icon5.png">
                                    </div>
                                </h4>
                            </a>
                        </div>
                        <div class="thing_infos">
                            <p>Atlantis, The Palm is one of the most recognizable buildings in Dubai. The Aquaventure and Lost Chambers Aquarium are two distinct attractions in the city’s iconic landmark. <a href="<?= getenv('BLOG_BASE_URL'); ?>/enjoy-your-day-at-atlantis-aquaventure-lost-chambers-aquarium/" target="_blank">[Explore Now]</a></p>

                        </div>
                    </div>
                    <div class="thingmain">
                        <div class="thing_iconinfos">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/an-adventurous-guide-to-laguna-waterpark-la-mer/" target="_blank">
                                <h4>An Adventurous Guide to Laguna Waterpark La Mer
                                    <div class="thing_icon">
                                        <img src="<?php echo base_url(); ?>/assets/front/images/waterpark.svg">
                                    </div>
                                </h4>
                            </a>
                        </div>
                        <div class="thing_infos">
                            <p>La Mer, one of Dubai’s hottest shopping and entertainment destinations, offers a wide range of services, including excellent dining, a beachside waterpark, and retail therapy. <a href="<?= getenv('BLOG_BASE_URL'); ?>/an-adventurous-guide-to-laguna-waterpark-la-mer/" target="_blank">[Explore Now]</a></p>

                        </div>
                    </div>
                    <div class="thingmain">
                        <div class="thing_iconinfos">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/global-village-dubai-complete-guide-on-the-biggest-dubai-festival/" target="_blank">
                                <h4>Global Village Dubai: Complete Guide on the Biggest Dubai Festival
                                    <div class="thing_icon">
                                        <img src="<?php echo base_url(); ?>/assets/front/images/Dubai-Parks-and-Resorts.svg">
                                    </div>
                                </h4>
                            </a>
                        </div>
                        <div class="thing_infos">
                            <p>Commenced on October 25, 2022, this is Dubai’s 27th edition of Global Village Dubai. Global Village is the annual event offering the best entertainment, shopping, dining, and diverse attractions that Dubai offers all in one place. <a href="<?= getenv('BLOG_BASE_URL'); ?>/global-village-dubai-complete-guide-on-the-biggest-dubai-festival/" target="_blank">[Explore Now]</a></p>

                        </div>
                    </div>
                    <div class="thingmain">
                        <div class="thing_iconinfos">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/top-10-must-visit-places-to-explore-in-dubai/" target="_blank">
                                <h4>Top 10 Must-Visit Places to Explore in Dubai
                                    <div class="thing_icon">
                                        <img src="<?php echo base_url(); ?>/assets/front/images/de_camel.svg">
                                    </div>
                                </h4>
                            </a>
                        </div>
                        <div class="thing_infos">
                            <p>The lavish architecture, stunning beaches, fine dining restaurants, and much more that dot Dubai promises a memorable experience for every tourist. The city is sure to offer you plenty of enjoyable experiences throughout your stay, no matter when you come.  <a href="<?= getenv('BLOG_BASE_URL'); ?>/top-10-must-visit-places-to-explore-in-dubai/" target="_blank">[Explore Now]</a></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="arabic_eve arabic_eve1 expo_sec">
    <div class="container">
        <div class="sec-title">Arabic <span>Events</span></div>
        <div class="arab_grid">
            <div class="row">
                
                <div class="col-md-3">
                    <div class="arab_main">
                        <div class="use_img">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/nabil-shuail-mutref-al-mutref-in-concert-khorfakkan-amphitheatre/" rel="bookmark" target="_blank">
                                <img src="<?php echo base_url(); ?>/assets/front/images/nabil.jpg"> </a>
                        </div>
                        <div class="arab_infos">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>nabil-shuail-mutref-al-mutref-in-concert-khorfakkan-amphitheatre/" rel="bookmark" target="_blank">
                                <h4>Nabil Shuail & Mutref Al-Mutref In Concert, Khorfakkan Amphitheatre</h4>
                            </a>
                            <h5><span>Jan 28</span> | <span><i class="fa fa-map-marker" aria-hidden="true"></i> Sharja</span> </h5>
                            <p>Kuwaiti artist Nabil Shuail known as the ‘Gulf Nightingale’ is coming together with the talented Mutref Al Mutref for a special Khaleeji night at Khorfakkan Amphitheatre</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="arab_main">
                        <div class="use_img">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/national-arab-orchestra/" rel="bookmark" target="_blank">
                                <img src="<?php echo base_url(); ?>/assets/front/images/national.jpg"> </a>
                        </div>
                        <div class="arab_infos">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/national-arab-orchestra/" rel="bookmark" target="_blank">
                                <h4>National Arab Orchestra</h4>
                            </a>
                            <h5><span>Jan 20-21</span> | <span><i class="fa fa-map-marker" aria-hidden="true"></i> Dubai</span> </h5>
                            <p>Al Majaz Amphitheatre in collaboration with the National Arab Orchestra present to you Night of Tarab
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="arab_main">
                        <div class="use_img">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/abdallah-al-rowaished-khalid-almulla-in-concert-khorfakkan-amphitheatre/" rel="bookmark" target="_blank">
                                <img src="<?php echo base_url(); ?>/assets/front/images/abdallah.jpg"></a>
                        </div>
                        <div class="arab_infos">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/abdallah-al-rowaished-khalid-almulla-in-concert-khorfakkan-amphitheatre/" rel="bookmark" target="_blank">
                                <h4>SAbdallah Al Rowaished & Khalid AlMulla In Concert, Khorfakkan Amphitheatre</h4>
                            </a>
                            <h5><span>Jan 14</span> | <span><i class="fa fa-map-marker" aria-hidden="true"></i> Dubai</span> </h5>
                            <p>Abdullah Al Ruwaished and Khaled Al Mulla Khorfakkan Amphitheatre is bringing together two stars that shine on with the Khaleeji song
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="arab_main">
                        <div class="use_img">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/lyali-al-najoom-3-mohamed-elamin-ensaf-fathi-live-in-dubai/" rel="bookmark" target="_blank">
                                <img src="<?php echo base_url(); ?>/assets/front/images/njoom.jpg"></a>
                        </div>
                        <div class="arab_infos">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/lyali-al-najoom-3-mohamed-elamin-ensaf-fathi-live-in-dubai/" rel="bookmark" target="_blank">
                                <h4>Lyali Al Najoom 3 – Mohamed Elamin & Ensaf Fathi – Live in Dubai</h4>
                            </a>
                            <h5><span>Jan 7</span> | <span><i class="fa fa-map-marker" aria-hidden="true"></i> Dubai</span> </h5>
                            <p>Njoom Alnail Events invite’s all of you to one of the wonderful night of Amazing Sudanese song party with two of the famous Sudanese singers.</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
<section class="arabic_eve expo_sec">
    <div class="container">
        <div class="sec-title">Desi <span>Events</span></div>
        <div class="arab_grid">
            <div class="row">
                
                <div class="col-md-3">
                    <div class="arab_main">
                        <div class="use_img">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/na-mukammal-in-dubai/" rel="bookmark" target="_blank">
                                <img src="<?php echo base_url(); ?>/assets/front/images/na_mukammal.jpg"> </a>
                        </div>
                        <div class="arab_infos">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/na-mukammal-in-dubai/" rel="bookmark" target="_blank">
                                <h4>Na Mukammal in Dubai</h4>
                            </a>
                            <h5><span>Date and Time - Sat 07-08 Jan 2023</span> | <span><i class="fa fa-map-marker" aria-hidden="true"></i> Dubai</span> </h5>
                            <p>This tale of passion, emotions, and human connections is set to stir your soul and make you ask questions of yourself.</p>
                        </div>
                    </div>
                </div>
               <div class="col-md-3">
                    <div class="arab_main">
                        <div class="use_img">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/live-shows-south-indian-music-festival-13-january-2023/" rel="bookmark" target="_blank">
                                <img src="<?php echo base_url(); ?>/assets/front/images/South.jpg">
                        </div> </a>
                        <div class="arab_infos">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/live-shows-south-indian-music-festival-13-january-2023/" rel="bookmark" target="_blank">
                                <h4>South Indian Music Festival</h4>
                            </a>
                            <h5><span>Date and Time - 20:30 Fri 13 Jan 2023</span> | <span><i class="fa fa-map-marker" aria-hidden="true"></i> Dubai</span> </h5>
                            <p>Attending music festivals allow you to stay around music and also connect with like-minded people while having fun.</p>
                        </div>
                    </div>
                </div>
				<div class="col-md-3">
                    <div class="arab_main">
                        <div class="use_img">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/colors-laughter-night-ft-gaurav-gupta-in-dubai-22-january-2023/" rel="bookmark" target="_blank">
                                <img src="<?php echo base_url(); ?>/assets/front/images/gaurav.jpg"> </a>
                        </div>
                        <div class="arab_infos">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/colors-laughter-night-ft-gaurav-gupta-in-dubai-22-january-2023/" rel="bookmark" target="_blank">
                                <h4>Colors Laughter Night ft. Gaurav Gupta in Dubai</h4>
                            </a>
                            <h5><span>Date and Time - 18:00 Sun 22 Jan 2023</span> | <span><i class="fa fa-map-marker" aria-hidden="true"></i> Dubai</span> </h5>
                            <p>We are back with the most popular millennial ‘Baniya’ Gaurav Gupta on 22nd Jan who is known to tickle your funny-bones with anecdotes about all your emotions.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="arab_main">
                        <div class="use_img">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/iifa-rocks-2023-in-abu-dhabi-10-feb-2023/" rel="bookmark" target="_blank">
                                <img src="<?php echo base_url(); ?>/assets/front/images/iifa.jpg"> </a>
                        </div>
						
                        <div class="arab_infos">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/iifa-rocks-2023-in-abu-dhabi-10-feb-2023/" rel="bookmark" target="_blank">
                                <h4>IIFA Rocks 2023 in Abu Dhabi</h4>
                            </a>
                            <h5><span>Date and Time - 18:30 Sun 10 Feb 2023</span> | <span><i class="fa fa-map-marker" aria-hidden="true"></i> Dubai</span> </h5>
                            <p>Enjoy the hair raising performances, rib tickling humor and the celebration of India Bollywood Music and Dance.  </p>
                        </div>
                    </div>
                </div>
            
                
                
                
            </div>
        </div>
    </div>
</section>
<!--<section class="abuad expo_sec">
    <div class="container">
        <div class="abuad_banner">
            <img src="<?php echo base_url(); ?>/assets/front/images/abu_dubai_ad.jpg">
        </div>
    </div>
</section>-->
<section class="upcoming_con water_sport expo_sec">
    <div class="container">
        <div class="sec-title">Water Sports <span>in Dubai</span></div>
        <div class="use_grid">
            <div class="row">
                <div class="col-md-6">
                <a class="url_link" href="https://blog.dubailocal.ae/wild-wadi-waterpark-all-you-need-to-know/" target="_blank">
                    <div class="use_main">
                        <div class="use_img">
                            <img src="<?php echo base_url(); ?>/assets/front/images/water-park-1.jpg">
                        </div>
                        <div class="use_infos">
                            <h5><span>Water Sports & Fun</span> <!--| <span>28-30 Oct, 2022</span>--> </h5>
                            <p>Wild Wadi Waterpark: All You Need to Know</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="right_use">
                        <div class="row">
                            <div class="col-md-6">
                            <a class="url_link" href="https://blog.dubailocal.ae/conquer-the-worlds-largest-waterpark-atlantis-aquaventure/" target="_blank">
                                <div class="use_main">
                                    <div class="use_img">
                                        <img src="<?php echo base_url(); ?>/assets/front/images/water-park-2.jpg">
                                    </div>
                                    <div class="use_infos">
                                        <h5><span>Water Sports & Fun</span> <!--| <span>28-30 Oct, 2022</span>--> </h5>
                                        <p>Conquer the World’s Largest Waterpark: Atlantis Aquaventure</p>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                            <a class="url_link" href="https://blog.dubailocal.ae/enjoy-your-day-at-aquafun-dubai/" target="_blank">
                                <div class="use_main">
                                    <div class="use_img">
                                        <img src="<?php echo base_url(); ?>/assets/front/images/water-park-3.jpg">
                                    </div>
                                    <div class="use_infos">
                                        <h5><span>Water Sports & Fun</span> <!--| <span>28-30 Oct, 2022</span>--> </h5>
                                        <p>Enjoy Your Day at Aquafun Dubai</p>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="right_use">
                        <div class="row">
                            <div class="col-md-6">
                            <a class="url_link" href="https://blog.dubailocal.ae/5-dubai-cruises-for-a-luxury-voyage/" target="_blank">
                                <div class="use_main">
                                    <div class="use_img">
                                        <img src="<?php echo base_url(); ?>/assets/front/images/water-park-4.jpg">
                                    </div>
                                    <div class="use_infos">
                                        <h5><span>Water Sports & Fun</span> <!--| <span>28-30 Oct, 2022</span>--> </h5>
                                        <p>5 Dubai Cruises for a Luxury Voyage</p>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                            <a class="url_link" href="https://blog.dubailocal.ae/top-water-activities-you-shouldnt-miss-in-dubai/" target="_blank">
                                <div class="use_main">
                                    <div class="use_img">
                                        <img src="<?php echo base_url(); ?>/assets/front/images/water-park-5.jpg">
                                    </div>
                                    <div class="use_infos">
                                        <h5><span>Water Sports & Fun</span> <!--| <span>28-30 Oct, 2022</span>--> </h5>
                                        <p>Top Water Activities You Shouldn’t Miss in Dubai</p>
                                    </div>
                                </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo view('home/template/footer'); ?>