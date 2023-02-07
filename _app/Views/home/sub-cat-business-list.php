<?php echo view('home/template/header'); ?>
<section class="categories-banner restu_banner" style="background: url(/assets/front/images/<?= $category[0]['slug']?>-banner.jpg) no-repeat bottom center">
    <div class="container">
        <div class="col-12 text-center">

            <h1 class="fw-600"><?php echo $category[0]['name']; ?></h1>
        </div>
    </div>
</section>
<?php //echo view('front/sections/category_tab_menu'); 
?>
<section class="categories-sec subcat">
    <div class="container">
        <!-- <h1 class="sec-title fw-600 mb-4">Categories</h1> -->
        <div class="row">
            <div class="col-12 mt-2 categories-listing">
                <div class="py-2">
                    <ul class="list-unstyled d-flex flex-wrap justify-content-around" id="subcat_business_list">
                        <?php foreach ($subcat_business_data as $single_business_data) { ?>
                            <li>
                                <a href="<?= base_url() . "/businesses/" . $single_business_data['slug']; ?>">
                                    <div class="category-item">
                                        <div class="img">
                                            <img src="<?php echo base_url(); ?>/assets/sub_cat_img/<?= $single_business_data['banner'] ?>" alt="">
                                        </div>
                                        <div class="category-info d-flex justify-content-between align-items-center">
                                            <div>
                                                <p><?php echo $single_business_data['sub_cat_name']; ?></p>
                                                <span><?php echo $single_business_data['list_count']; ?> Listing</span>
                                            </div>
                                            <a href="<?= base_url() . "/businesses/" . $single_business_data['slug']; ?>" class="link-icon">
                                                <img src="<?php echo base_url(); ?>/assets/front/images/circle-red.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <!-- <div class="text-center">
                    <button class="btn btn-primary btn-lg fs-16 px-4 rounded-0 mt-5 theme-btn-red subcat_business_more">Load More</button>
                </div> -->
            </div>
        </div>
    </div>
</section>

<?php echo view('home/sections/articles'); ?>
<?php echo view('home/template/footer'); ?>