<?php echo view('home/template/header'); ?>
<?php //print("<pre>" . print_r($subcat_business_data, true) . "</pre>");
?>
<section class="categories-banner" style="background: url(/assets/front/images/<?= $cat_name[0]['cat_slug'] ?>-banner.jpg) no-repeat bottom center">
    <div class="container">
        <div class="col-12 text-center">
            <h1 class="fw-600"><?= $cat_name[0]['name'] . " - " . $cat_name[0]['subcat_name']; ?></h1>
        </div>
    </div>
</section>

<?php if (is_array($subcat_business_data) && count($subcat_business_data) > 0) { ?>
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
                    <div class="most-popular-listing-content subcategory-page-listing">
                        <?php
                        $i = 0;
                        foreach ($subcat_business_data as $business) {
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
                        <?php } ?>
                    </div>
                    <div class="text-center mt-5">
                        <!-- <a href="#" class="btn btn-primary rounded-0 theme-btn-red wow bounceInUp load_more_business_listings">Load more</a> -->
                        <p class="btn btn-primary rounded-0 theme-btn-red wow bounceInUp" id="load_more_business_listings">Load more</p>
                    </div>

                </div>
            </div>
        </div>
    </section>
<?php } else { ?>
    <div class="col-lg-12">
        <div class="text-center my-2">
            <p>No records found</p>
        </div>
    </div>
<?php } ?>
<?php echo view('home/template/footer'); ?>