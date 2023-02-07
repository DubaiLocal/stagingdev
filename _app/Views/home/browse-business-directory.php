<?php echo view('home/template/header'); ?>

<section class="categories-banner">
    <div class="container">
        <div class="col-12 text-center">
            <h1 class="fw-600">Businesses In Dubai</h1>

        </div>
    </div>
</section>


<div class="bb_directory_infos">
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">

                <div class="browse-title">
                    <h1 class="sec-title">Popular <span>Business Categories</span></h1>
                </div>
                <!--<p>Dubai Business Directory integrates all the best companies in Dubai into an easy-to-use, searchable database with a user-friendly and stylish interface. Not just any boring business directory, Dubai Local helps you look into the Dubai business world with confidence and style including 1125 categories for better browsing.</p>-->

            </div>
        </div>
    </div>
</div>
<div class="bb_directory_lists new_bbdesign">
    <div class="container py-2">
        <div class="row">
            <?php foreach ($categories as $single_category) { ?>
                <div class="col-md-6 py-3">
                    <div class="bb_listing_newbg">
                        <div class="bb_listing_title">
                            <h4><img src="<?php echo base_url(); ?>/assets/front/images/<?= $single_category['name'] ?>.svg" /> <?= $single_category['name'] ?></h4>
                        </div>
                        <div class="bb_listing">
                            <div class="row py-2">
                                <?php foreach ($directory as $single_directory) {
                                    if ($single_category['id'] == $single_directory['id']) { ?>
                                        <div class="col-md-6">
                                            <p>
                                                <a href="<?php echo base_url() . "/businesses/" . $single_directory['subcat_slug'] ?>">
                                                    <?= $single_directory['subcat_name'] ?>
                                                  <span>(<?= $single_directory['count_business'] ?>)</span> 
                                                </a>
                                            </p>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php echo view('home/template/footer'); ?>