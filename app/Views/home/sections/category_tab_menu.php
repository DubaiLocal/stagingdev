<section class="categories-sec">
    <div class="container">
        <h1 class="sec-title fw-600 mb-4">Categories</h1>
        <div class="row">
            <div class="col-lg-9">
                <div class="sort-categories">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link active" id="<?php echo strtolower($menu_priority_categories[0]['name']); ?>-tab" data-cat_id="<?php echo md5($menu_priority_categories[0]['id']); ?>" data-toggle="tab" href="#<?php echo strtolower($menu_priority_categories[0]['name']); ?>" role="tab" aria-controls="restaurent" aria-selected="false"><?php echo $menu_priority_categories[0]['name']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="<?php echo strtolower($menu_priority_categories[1]['name']); ?>-tab" data-cat_id="<?php echo md5($menu_priority_categories[1]['id']); ?>" data-toggle="tab" href="#<?php echo strtolower($menu_priority_categories[1]['name']); ?>" role="tab" aria-controls="villa" aria-selected="false"><?php echo $menu_priority_categories[1]['name']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="<?php echo strtolower($menu_priority_categories[2]['name']); ?>-tab" data-cat_id="<?php echo md5($menu_priority_categories[2]['id']); ?>" data-toggle="tab" href="#<?php echo strtolower($menu_priority_categories[2]['name']); ?>" role="tab" aria-controls="sport" aria-selected="false"><?php echo $menu_priority_categories[2]['name']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="<?php echo strtolower($menu_priority_categories[3]['name']); ?>-tab" data-cat_id="<?php echo md5($menu_priority_categories[3]['id']); ?>" data-toggle="tab" href="#<?php echo strtolower($menu_priority_categories[3]['name']); ?>" role="tab" aria-controls="hotel" aria-selected="false"><?php echo $menu_priority_categories[3]['name']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="<?php echo strtolower($menu_priority_categories[4]['name']); ?>-tab" data-cat_id="<?php echo md5($menu_priority_categories[4]['id']); ?>" data-toggle="tab" href="#<?php echo strtolower($menu_priority_categories[4]['name']); ?>" role="tab" aria-controls="education" aria-selected="false"><?php echo $menu_priority_categories[4]['name']; ?></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <!-- <div class="search-category">
                    <form>
                        <div class="form-group">
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Search by keywords">
                        </div>
                    </form>
                </div> -->
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-2 categories-listing">
                <div class="tab-content py-2" id="myTabContent">
                    <div class="tab-pane fade show active" id="<?php echo strtolower($single_category_subcat[0]['cat_name']); ?>" role="tabpanel" aria-labelledby="<?php echo strtolower($single_category_subcat[0]['cat_name']); ?>-tab">
                        <ul class="list-unstyled d-flex flex-wrap justify-content-around">
                            <?php foreach ($single_category_subcat as $single_cat) { ?>
                                <li>
                                    <a href="<?php echo base_url() . "/businesses/" . $single_cat['slug'] ?>" data-id="<?php echo $single_cat['sub_cat_id']; ?>">
                                        <div class="category-item">
                                            <div class="img">
                                                <img src="<?php echo base_url(); ?>/assets/sub_cat_img/<?= $single_cat['banner']; ?>" alt="">
                                            </div>
                                            <div class="category-info d-flex justify-content-between align-items-center">
                                                <div>
                                                    <p><?php echo $single_cat['sub_cat_name']; ?></p>
                                                    <span><?php echo $single_cat['list_count']; ?> Listing</span>
                                                </div>
                                                <a href="<?php echo base_url() . "/businesses/" . $single_cat['slug'] ?>" data-id="<?php echo $single_cat['sub_cat_id']; ?>" class="link-icon">
                                                    <img src="<?php echo base_url(); ?>/assets/front/images/circle-red.png" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <!-- <div class="text-center">
                    <a href="#" class="btn btn-primary btn-lg fs-16 px-4 rounded-0 mt-5 theme-btn-red">Load More</a>
                </div> -->
            </div>
        </div>
    </div>
</section>