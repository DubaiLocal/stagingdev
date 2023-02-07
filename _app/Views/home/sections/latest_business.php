<section class="latest-business-listing">
    <div class="container">
        <h1 class="sec-title">Latest Business <span>Listings</span></h1>
        <div id="latest-business-listing" class="owl-carousel owl-theme">
            <div class="item">
                <div class="row">
                    <?php foreach ($latest_businesses as $latest_business) { ?>

                        <div class="col-lg-4 col-sm-4 mb-5">
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-5 col-sm-12">
                                    <img src="<?php echo base_url(); ?>/assets/front/images/bl-img-2.jpg" class="img-fluid" alt="">
                                    <!-- <img src="<?php //echo base_url()."/assets/assets/logo/".$latest_business['logo']; 
                                                    ?> class="img-fluid" alt=""> -->
                                </div>
                                <div class="col-7 col-lg-7 col-sm-12">
                                    <h5><?= $latest_business['name'] ?></h5>
                                    <p>donec ligula nulla, euismod in finibus eu, ornare quis diam.</p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- <div class="col-lg-4 col-sm-4 mb-5">
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-5 col-sm-12">
                                    <img src="<?php echo base_url(); ?>/assets/front/images/bl-img-2.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-7 col-lg-7 col-sm-12">
                                    <h5>Rallye Coach Works</h5>
                                    <p>At Rallye coach Works, our goal is to provide first class service for every</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 mb-5">
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-5 col-sm-12">
                                    <img src="<?php echo base_url(); ?>/assets/front/images/bl-img-3.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-7 col-lg-7 col-sm-12">
                                    <h5>Wesley Automotives</h5>
                                    <p>Curabitur facillsis, nunc vitae maximus posuere, velit justo ultricies dolor, a consequat urus ex quis nibh.</p>
                                </div>
                            </div>
                        </div> -->
                </div>
                <!-- <div class="row">
                        <div class="col-lg-4 col-sm-4 mb-5">
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-5 col-sm-12">
                                    <img src="<?php echo base_url(); ?>/assets/front/images/bl-img-4.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-7 col-lg-7 col-sm-12">
                                    <h5>McCormick Auto Care</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cars porttitor dictum faucibus.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 mb-5">
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-5 col-sm-12">
                                    <img src="<?php echo base_url(); ?>/assets/front/images/bl-img-5.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-7 col-lg-7 col-sm-12">
                                    <h5>Sanctified Systems</h5>
                                    <p>Maecenas convallis sed lorem a commodo. Curabitur lacus diam, hendrerit nec lacinia</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 mb-5">
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-5 col-sm-12">
                                    <img src="<?php echo base_url(); ?>/assets/front/images/bl-img-6.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-7 col-lg-7 col-sm-12">
                                    <h5>Moola ATM</h5>
                                    <p>Morbi venenatis posuere augue, non ornare nisl facilisis eget. Etiam ut turpis id ipsum gravida mollis in eget nunc.</p>
                                </div>
                            </div>
                        </div>
                    </div> -->
            </div>
            <!-- <div class="item">
                    <div class="row">
                        <div class="col-lg-4 col-sm-4 mb-5">
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-5 col-sm-12">
                                    <img src="<?php echo base_url(); ?>/assets/front/images/bl-img-1.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-7 col-lg-7 col-sm-12">
                                    <h5>Blue Valley Heating & Coolers</h5>
                                    <p>donec ligula nulla, euismod in finibus eu, ornare quis diam.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 mb-5">
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-5 col-sm-12">
                                    <img src="<?php echo base_url(); ?>/assets/front/images/bl-img-2.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-7 col-lg-7 col-sm-12">
                                    <h5>Rallye Coach Works</h5>
                                    <p>At Rallye coach Works, our goal is to provide first class service for every</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 mb-5">
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-5 col-sm-12">
                                    <img src="<?php echo base_url(); ?>/assets/front/images/bl-img-3.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-7 col-lg-7 col-sm-12">
                                    <h5>Wesley Automotives</h5>
                                    <p>Curabitur facillsis, nunc vitae maximus posuere, velit justo ultricies dolor, a consequat urus ex quis nibh.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-4 mb-5">
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-5 col-sm-12">
                                    <img src="<?php echo base_url(); ?>/assets/front/images/bl-img-4.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-7 col-lg-7 col-sm-12">
                                    <h5>McCormick Auto Care</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cars porttitor dictum faucibus.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 mb-5">
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-5 col-sm-12">
                                    <img src="<?php echo base_url(); ?>/assets/front/images/bl-img-5.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-7 col-lg-7 col-sm-12">
                                    <h5>Sanctified Systems</h5>
                                    <p>Maecenas convallis sed lorem a commodo. Curabitur lacus diam, hendrerit nec lacinia</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 mb-5">
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-5 col-sm-12">
                                    <img src="<?php echo base_url(); ?>/assets/front/images/bl-img-6.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-7 col-lg-7 col-sm-12">
                                    <h5>Moola ATM</h5>
                                    <p>Morbi venenatis posuere augue, non ornare nisl facilisis eget. Etiam ut turpis id ipsum gravida mollis in eget nunc.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-lg-4 col-sm-4 mb-5">
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-5 col-sm-12">
                                    <img src="<?php echo base_url(); ?>/assets/front/images/bl-img-1.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-7 col-lg-7 col-sm-12">
                                    <h5>Blue Valley Heating & Coolers</h5>
                                    <p>donec ligula nulla, euismod in finibus eu, ornare quis diam.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 mb-5">
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-5 col-sm-12">
                                    <img src="<?php echo base_url(); ?>/assets/front/images/bl-img-2.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-7 col-lg-7 col-sm-12">
                                    <h5>Rallye Coach Works</h5>
                                    <p>At Rallye coach Works, our goal is to provide first class service for every</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 mb-5">
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-5 col-sm-12">
                                    <img src="<?php echo base_url(); ?>/assets/front/images/bl-img-3.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-7 col-lg-7 col-sm-12">
                                    <h5>Wesley Automotives</h5>
                                    <p>Curabitur facillsis, nunc vitae maximus posuere, velit justo ultricies dolor, a consequat urus ex quis nibh.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-4 mb-5">
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-5 col-sm-12">
                                    <img src="<?php echo base_url(); ?>/assets/front/images/bl-img-4.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-7 col-lg-7 col-sm-12">
                                    <h5>McCormick Auto Care</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cars porttitor dictum faucibus.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 mb-5">
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-5 col-sm-12">
                                    <img src="<?php echo base_url(); ?>/assets/front/images/bl-img-5.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-7 col-lg-7 col-sm-12">
                                    <h5>Sanctified Systems</h5>
                                    <p>Maecenas convallis sed lorem a commodo. Curabitur lacus diam, hendrerit nec lacinia</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 mb-5">
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-5 col-sm-12">
                                    <img src="<?php echo base_url(); ?>/assets/front/images/bl-img-6.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-7 col-lg-7 col-sm-12">
                                    <h5>Moola ATM</h5>
                                    <p>Morbi venenatis posuere augue, non ornare nisl facilisis eget. Etiam ut turpis id ipsum gravida mollis in eget nunc.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
        </div>
    </div>
</section>