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
            <div class="row">
                <!-- <div class="col-md-2"><button class="btn theme-btn-green active" id="all_cat">All</button></div> -->
                <div class="col-md-2"><button class="btn theme-btn-green" id="first_cat">Entertainment</button></div>
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
                            <img src="<?php echo base_url(); ?>/assets/front/images/Amplified-Music-Festival-in-Abu-Dhabi-with-OneRepublic-&-CAS.jpg">
                        </div>
                        <div class="use_infos">
                            <h5>Amplified Music Festival in Abu Dhabi with OneRepublic & CAS</h5>
                            <p>Live Nation's first live music festival, Amplified, will feature OneRepublic and CAS.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right_use">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="use_main">
                                    <div class="use_img">
                                        <img src="<?php echo base_url(); ?>/assets/front/images/Lewis-Capaldi-Live-in-Dubai.jpg">
                                    </div>
                                    <div class="use_infos">
                                        <h5>Lewis Capaldi Live in Dubai</h5>
                                        <p>Lewis Capaldi, the Scottish singer-songwriter, is back in the UAE after an extremely successful run previously.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="use_main">
                                    <div class="use_img">
                                        <img src="<?php echo base_url(); ?>/assets/front/images/Kizz-Daniel-in-Dubai.jpg">
                                    </div>
                                    <div class="use_infos">
                                        <h5>Kizz Daniel in Dubai</h5>
                                        <p>As a precursor to his World Cup performance, Kizz Daniel is scheduled to headline his first concert in Dubai on 4th November.</p>
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
                                        <img src="<?php echo base_url(); ?>/assets/front/images/GulfHost-2022.jpg">
                                    </div>
                                    <div class="use_infos">
                                        <h5>GulfHost 2022</h5>
                                        <p>A major hospitality trade show in Dubai World Trade Centre from 8 to 10 November 2022.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="use_main">
                                    <div class="use_img">
                                        <img src="<?php echo base_url(); ?>/assets/front/images/CLUB-SOCIAL-FESTIVAL.jpg">
                                    </div>
                                    <div class="use_infos">
                                        <h5><span>Travel & Tourism Guide</span> | <span>28-30 Oct, 2022</span> </h5>
                                        <p>CLUB SOCIAL FESTIVAL presents Liam Gallagher, Kaiser Chiefs, Clean Bandit (DJ Set) & Battle of the Bands</p>
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
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/blog/user-guide-to-explore-burj-khalifa-tallest-building-in-the-world/" target="_blank">
                                <h4>At The Top, Burj Khalifa 124th & 125th Floor
                                    <div class="thing_icon">
                                        <img src="<?php echo base_url(); ?>/assets/front/images/th_icon1.png">
                                    </div>

                                </h4>
                            </a>
                        </div>
                        <div class="thing_infos">
                            <p>Don't miss your chance to visit the world's tallest building by booking your tickets to Levels 124 & 125 in advance. Observe Dubai from one of the world's highest outdoor observation decks for a panoramic view that can't be found anywhere else <a href="<?= getenv('BLOG_BASE_URL'); ?>/blog/user-guide-to-explore-burj-khalifa-tallest-building-in-the-world/" target="_blank">[Explore Now]</a></p>

                        </div>
                    </div>
                    <div class="thingmain">
                        <div class="thing_iconinfos">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/blog/tips-to-make-most-of-dubai-desert-safari/" target="_blank">
                                <h4>Tips to Make Most of Dubai Dessert Safari
                                    <div class="thing_icon">
                                        <img src="<?php echo base_url(); ?>/assets/front/images/green-planet.svg">
                                    </div>
                                </h4>
                            </a>
                        </div>
                        <div class="thing_infos">
                            <p>Visit the indoor rainforest in Dubai with your kids, friends, and loved ones. Visit the largest indoor life-sustaining tree in the world as well as the epic wonders of our Green Earth! <a href="<?= getenv('BLOG_BASE_URL'); ?>/blog/tips-to-make-most-of-dubai-desert-safari/" target="_blank">[Explore Now]</a></p>

                        </div>
                    </div>
                    <div class="thingmain">
                        <div class="thing_iconinfos">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/blog/what-makes-dubai-dolphin-seal-show-unique/" target="_blank">
                                <h4>Dolphin & Seal Show - Dubai Dolphinarium
                                    <div class="thing_icon">
                                        <img src="<?php echo base_url(); ?>/assets/front/images/Dolphinarium.svg">
                                    </div>
                                </h4>
                            </a>
                        </div>
                        <div class="thing_infos">
                            <p>Be sure not to miss the most exciting dolphin show in Dubai. There is a large dolphinarium in Dubai that has advanced marine facilities and a modern air conditioning system. <a href="<?= getenv('BLOG_BASE_URL'); ?>/blog/what-makes-dubai-dolphin-seal-show-unique/" target="_blank">[Explore Now]</a></p>

                        </div>
                    </div>
                    <div class="thingmain">
                        <div class="thing_iconinfos">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/blog/fly-along-worlds-longest-zipline-jebel-jais/">
                                <h4>Jebel Jais Flight – World’s Longest Zipline
                                    <div class="thing_icon">
                                        <img src="<?php echo base_url(); ?>/assets/front/images/zipline.svg">
                                    </div>
                                </h4>
                            </a>
                        </div>
                        <div class="thing_infos">
                            <p>There is no longer a zip line in the world than the one in Jebel Jais. Embark on a thrilling ride that crosses Ras al Khaimah's Jebel Jais mountains and ends on a suspended platform at the highest point in the UAE. <a href="<?= getenv('BLOG_BASE_URL'); ?>/blog/fly-along-worlds-longest-zipline-jebel-jais/" target="_blank">[Explore Now]</a></p>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thing_centerimg">
                        <img src="<?php echo base_url(); ?>/assets/front/images/thing_center.png">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thingmain">
                        <div class="thing_iconinfos">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/blog/enjoy-your-day-at-atlantis-aquaventure-lost-chambers-aquarium/" target="_blank">
                                <h4>Atlantis Aquaventure And Lost Chambers Aquarium
                                    <div class="thing_icon">
                                        <img src="<?php echo base_url(); ?>/assets/front/images/th_icon5.png">
                                    </div>
                                </h4>
                            </a>
                        </div>
                        <div class="thing_infos">
                            <p>Enjoy an unforgettable water park adventure at Atlantis Aquaventure Park in Dubai. As the region's largest and best water park, Aquaventure offers some of the wildest and most enjoyable attractions.<a href="<?= getenv('BLOG_BASE_URL'); ?>/blog/enjoy-your-day-at-atlantis-aquaventure-lost-chambers-aquarium/" target="_blank">[Explore Now]</a></p>

                        </div>
                    </div>
                    <div class="thingmain">
                        <div class="thing_iconinfos">
                            <a href="<?= getenv('BLOG_BASE_URL'); ?>/blog/an-adventurous-guide-to-laguna-waterpark-la-mer/" target="_blank">
                                <h4>Laguna Waterpark La Mer
                                    <div class="thing_icon">
                                        <img src="<?php echo base_url(); ?>/assets/front/images/waterpark.svg">
                                    </div>
                                </h4>
                            </a>
                        </div>
                        <div class="thing_infos">
                            <p>There is no better way to cool off than at Laguna Waterpark La Mer, one of the newest and coolest waterparks in Dubai. Laguna's unbeatable fun makes the offer the perfect getaway after a long day at work or as a weekday treat for the kids! <a href="<?= getenv('BLOG_BASE_URL'); ?>/blog/an-adventurous-guide-to-laguna-waterpark-la-mer/" target="_blank">[Explore Now]</a></p>

                        </div>
                    </div>
                    <div class="thingmain">
                        <div class="thing_iconinfos">
                            <h4>Dubai Parks and Resorts - Motiongate, Legoland & Bollywood Parks Dubai
                                <div class="thing_icon">
                                    <img src="<?php echo base_url(); ?>/assets/front/images/Dubai-Parks-and-Resorts.svg">
                                </div>
                            </h4>
                        </div>
                        <div class="thing_infos">
                            <p>Dubai Parks and Resorts offers endless entertainment activities as the most comprehensive theme park in the Middle East. Ticket holders have access to a 25 million square foot area with more than a hundred rides, both outdoor and indoor.<a href="" target="_blank">[Explore Now]</a></p>

                        </div>
                    </div>
                    <div class="thingmain">
                        <div class="thing_iconinfos">
                            <h4>The Museum of Illusions, Dubai
                                <div class="thing_icon">
                                    <img src="<?php echo base_url(); ?>/assets/front/images/dubai-museum.svg">
                                </div>
                            </h4>
                        </div>
                        <div class="thing_infos">
                            <p>Get mind-blown by Dubai's visual experiences and experience the impossible. Here you will find over 80 mind-blowing exhibits, amazing illusions, and showpieces that will blow your mind <a href="" target="_blank">[Explore Now]</a></p>

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
                            <img src="<?php echo base_url(); ?>/assets/front/images/ae_img1.jpg">
                        </div>
                        <div class="arab_infos">
                            <h4>International Conference on Medical & Health Science</h4>
                            <h5><span>Nov 1</span> | <span><i class="fa fa-map-marker" aria-hidden="true"></i> Dubai</span> </h5>
                            <p>Students, Doctors, Researchers, and Academicians can share information and ideas about recent trends in Medical & Health Science.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="arab_main">
                        <div class="use_img">
                            <img src="<?php echo base_url(); ?>/assets/front/images/ae_img2.jpg">
                        </div>
                        <div class="arab_infos">
                            <h4>iDARE 7-Day Festival – Dubai 2022 </h4>
                            <h5><span>Nov 11</span> | <span><i class="fa fa-map-marker" aria-hidden="true"></i> Dubai</span> </h5>
                            <p>An immersive display of creativity and innovation.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="arab_main">
                        <div class="use_img">
                            <img src="<?php echo base_url(); ?>/assets/front/images/ae_img3.jpg">
                        </div>
                        <div class="arab_infos">
                            <h4>International Conference on Research in Life-Sciences & Healthcare</h4>
                            <h5><span>Nov 3</span> | <span><i class="fa fa-map-marker" aria-hidden="true"></i> Dubai</span> </h5>
                            <p>Health-related and life-science conferences</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="arab_main">
                        <div class="use_img">
                            <img src="<?php echo base_url(); ?>/assets/front/images/ae_img4.jpg">
                        </div>
                        <div class="arab_infos">
                            <h4>7th Pan Arab Endodontic Conference</h4>
                            <h5><span>Nov 17</span> | <span><i class="fa fa-map-marker" aria-hidden="true"></i> Dubai</span> </h5>
                            <p>Join the experts for a discussion on the latest advancements!</p>
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
                            <img src="<?php echo base_url(); ?>/assets/front/images/Udit-Narayan-in-Dubai.jpg">
                        </div>
                        <div class="arab_infos">
                            <h4>Udit Narayan in Dubai</h4>
                            <h5><span>Date and Timing - 20:00 Sat 12 Nov 2022</span> | <span><i class="fa fa-map-marker" aria-hidden="true"></i> Dubai</span> </h5>
                            <p>The Melody King- Padma Bhushan UDIT NARAYAN in concert!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="arab_main">
                        <div class="use_img">
                            <img src="<?php echo base_url(); ?>/assets/front/images/Jubin-Nautiyal-in-Dubai.jpg">
                        </div>
                        <div class="arab_infos">
                            <h4>Jubin Nautiyal in Dubai</h4>
                            <h5><span>Date and Timing - 20:00 Sun 27 Nov 2022</span> | <span><i class="fa fa-map-marker" aria-hidden="true"></i> Dubai</span> </h5>
                            <p>Jubin Nautiyal is set to captivate the audience with his electrifying performance</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="arab_main">
                        <div class="use_img">
                            <img src="<?php echo base_url(); ?>/assets/front/images/Rekha-Bhardwaj-&-Harshdeep-Kaur-in-Dubai.jpg">
                        </div>
                        <div class="arab_infos">
                            <h4>Rekha Bhardwaj & Harshdeep Kaur in Dubai</h4>
                            <h5><span>Date and Timing - 20:00 Fri 18 Nov 2022</span> | <span><i class="fa fa-map-marker" aria-hidden="true"></i> Dubai</span> </h5>
                            <p>Be happy with the best female voice from India!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="arab_main">
                        <div class="use_img">
                            <img src="<?php echo base_url(); ?>/assets/front/images/Armaan-Malik-in-Dubai.jpg">
                        </div>
                        <div class="arab_infos">
                            <h4>Armaan Malik in Dubai</h4>
                            <h5><span>Date and Timing - 20:00 Fri 25 Nov 2022</span> | <span><i class="fa fa-map-marker" aria-hidden="true"></i> Dubai</span> </h5>
                            <p>Experience Bollywood music at its best with Armaan Malik's unforgettable voice.</p>
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
                    <div class="use_main">
                        <div class="use_img">
                            <img src="<?php echo base_url(); ?>/assets/front/images/Kayak-in-Dubai-The-Palm.jpg">
                        </div>
                        <div class="use_infos">
                            <h5><span>Travel & Tourism Guide</span> | <span>28-30 Oct, 2022</span> </h5>
                            <p>Kayak in Dubai The Palm</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right_use">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="use_main">
                                    <div class="use_img">
                                        <img src="<?php echo base_url(); ?>/assets/front/images/Stand-Up-Paddle-Board-in-Dubai-The-Palm.jpg">
                                    </div>
                                    <div class="use_infos">
                                        <h5><span>Travel & Tourism Guide</span> | <span>28-30 Oct, 2022</span> </h5>
                                        <p>Stand Up Paddle Board in Dubai The Palm</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="use_main">
                                    <div class="use_img">
                                        <img src="<?php echo base_url(); ?>/assets/front/images/Dubai-Sail-Grand-Prix-Presented-By-P&O-Marinas-in-Dubai.jpg">
                                    </div>
                                    <div class="use_infos">
                                        <h5><span>Travel & Tourism Guide</span> | <span>28-30 Oct, 2022</span> </h5>
                                        <p>Dubai Sail Grand Prix Presented By P&O Marinas in Dubai</p>
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
                                        <img src="<?php echo base_url(); ?>/assets/front/images/Flyboard-Jetpack-or-Jetovator-Experience-at-The-Palm.jpg">
                                    </div>
                                    <div class="use_infos">
                                        <h5><span>Travel & Tourism Guide</span> | <span>28-30 Oct, 2022</span> </h5>
                                        <p>Flyboard, Jetpack, or Jetovator Experience at The Palm</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="use_main">
                                    <div class="use_img">
                                        <img src="<?php echo base_url(); ?>/assets/front/images/Fly-Fishing-in-JBR-Beach.jpg">
                                    </div>
                                    <div class="use_infos">
                                        <h5><span>Travel & Tourism Guide</span> | <span>28-30 Oct, 2022</span> </h5>
                                        <p>Fly Fishing in JBR Beach</p>
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
<?php echo view('home/template/footer'); ?>