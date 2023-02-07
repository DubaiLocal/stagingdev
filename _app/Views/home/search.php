<?php echo view('home/template/header'); ?>
<section class="categories-banner" style="background: url(/assets/front/images/restaurants-banner.jpg) no-repeat bottom center">
    <div class="container">
        <div class="col-12 text-center">
            <h1 class="fw-600">Search Results</h1>
        </div>
    </div>
</section>
<section class="km_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="choice_btn">
                    <h4>Results From Your Location</h4>
                    <div class="radio-toolbar">
                        <input type="radio" id="radio1" name="radioFruit" value="0 to 5km" checked>
                        <label for="radio1">0 to 5km</label>

                        <input type="radio" id="radio2" name="radioFruit" value="0 to 10km">
                        <label for="radio2">0 to 10km</label>

                        <input type="radio" id="radio3" name="radioFruit" value="Everywhere">
                        <label for="radio3">Everywhere</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="most-popular-listing">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="find-by-widget findby-category mb-4">
                    <h6 class="search-by-heading 123">Find By Category</h6>
                    <ul class="list-unstyled">
                        <?php
                        if (is_array($sidebar_categories) && count($sidebar_categories) > 0) {
                            foreach ($sidebar_categories as $sidebar_category) { ?>
                                <li><a href='/businesses/<?= $sidebar_category['slug']; ?>'><span class="icon"><img src="<?php echo base_url(); ?>/assets/front/images/icons/<?= $sidebar_category['name'] ?>.svg" alt=""></span><?= $sidebar_category['name'] . " " . "(" . $sidebar_category['count_business'] . ")" ?></a></li>
                        <?php }
                        } ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="header-sec mb-4 d-flex justify-content-between">
                    <h6 class="title">Most Popular Listing</h6>
                    <!-- <form class="form-inline">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search by keywords">
                        </div>
                        <div class="form-group">
                            <select class="custom-select" id="inlineFormCustomSelectPref">
                                <option selected>Short list by</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </form> -->
                </div>
                <div class="most-popular-listing-content search-page-listing">
                    <?php
                    $i = 0;
                    if (is_array($businesses) && count($businesses) > 0) {
                        foreach ($businesses as $business) {
                            $i += 0.2;
                    ?>
                            <div class="card list-item wow fadeInUp" data-wow-delay=<?= $i ?>>
                                <div class="row align-items-center">
                                    <div class="col-lg-3 col-sm-3">
                                        <div class="business_list_img">
                                            <a href="<?php echo base_url(); ?>/business/<?= $business['slug']; ?>"> <img src="<?php echo base_url(); ?>/assets/logo/<?= $business['banner'] ?>" class="img-fluid" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-sm-9">
                                        <div class="row align-items-center">
                                            <div class="col-lg-8">
                                                <div class="ratings mb-2">
                                                    <ul class="list-unstyled list-inline">
                                                        <?php for ($k = 1; $k <= (int)number_format((float)$business['avg_rating'], 1, '.', ''); $k++) {
                                                            echo '<li class="list-inline-item mr-0"><span class="fa fa-star checked"></span></li>';
                                                        }
                                                        if ((5 - (int)$rating) != 0) {
                                                            for ($j = 1; $j <= (5 - (int)number_format((float)$business['avg_rating'], 1, '.', '')); $j++) {
                                                                echo '<li class="list-inline-item mr-0"><span class="fa fa-star"></span></li>';
                                                            }
                                                        }
                                                        ?>
                                                        <li class="list-inline-item ml-3"><span class="badge badge-primary badge-pill"><?= number_format((float)$business['avg_rating'], 1, '.', ''); ?></span></li>
                                                    </ul>
                                                </div>
                                                <div class="listing-content">
                                                    <h6 class="menu-title">
                                                        <a href="<?php echo base_url(); ?>/business/<?= $business['slug']; ?>"> <?= $business['name']; ?></a>

                                                    </h6>
                                                    <!-- <p>Luxury Villa Cafe in Your City</p> -->
                                                </div>
                                                <ul class="list-unstyled contact-det">
                                                    <?php if ($business['address'] != "") { ?>
                                                        <li><span><img src="<?php echo base_url(); ?>/assets/front/images/location-icon.png" alt=""></span><?= $business['address'] ?></li>
                                                    <?php }
                                                    if ($business['phone'] == "" || $business['phone'] == "-" || $business['phone'] == " - ") { ?>

                                                    <?php } else { ?>
                                                        <li><span><img src="<?php echo base_url(); ?>/assets/front/images/call-icon.png" alt=""></span><a href="tel:<?= $business['phone'] ?>"><?= $business['phone'] ?></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="card-bottom-btn text-center">
                                                    <a href="<?php echo base_url(); ?>/business/<?= $business['slug']; ?>" class="btn btn-primary theme-btn-red view-det-btn"> View Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>
                <!-- <div class="text-center mt-5">
                    <a href="#" class="btn btn-primary rounded-0 theme-btn-red wow bounceInUp"> View More Listing</a>
                </div> -->
                <div class="text-center mt-5">
                    <!-- <a href="#" class="btn btn-primary rounded-0 theme-btn-red wow bounceInUp load_more_business_listings">Load more</a> -->
                    <p class="btn btn-primary rounded-0 theme-btn-red wow bounceInUp" id="load_more_business_search">Load more</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo view('home/template/footer'); ?>