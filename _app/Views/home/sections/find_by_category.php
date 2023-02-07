<div class="find-by-widget find-by-category-widget findby-category mb-4">
    <h6 class="search-by-heading title-5">Find By Category</h6>
    <ul class="list-unstyled">
        <?php
        if (is_array($sidebar_categories) && count($sidebar_categories) > 0) {
            foreach ($sidebar_categories as $sidebar_category) { ?>
                <li><a href='/businesses/<?= $sidebar_category['slug']; ?>'><span class="icon"><img src="<?php echo base_url(); ?>/assets/front/images/find-by-category-icon-1.png" alt=""></span><?= $sidebar_category['name'] . " " . "(" . $sidebar_category['count_business'] . ")" ?></a></li>
        <?php }
        } ?>
    </ul>
</div>