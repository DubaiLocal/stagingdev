<?php //if (is_array($tips_explore) && count($tips_explore) > 0) { 
?>
<section class="tips-articles" id="amazing_tips_articles">
    <div class="container">
        <h3>Amazing Localized <span>Tips & Articles</span></h3>
        <div class="localized-slider text-center mt-4">
            <!--<a href="#" class="view-all">View All</a>-->
        </div>
        <div id="tips-articles" class="owl-carousel owl-theme">
            <?php $tips = 0;

            // foreach ($tips_explore as $tips_blog_explore) {
            for ($i = 0; $i <= 2; $i++) {
                $tips++;
            ?>
                <div class="item">
                    <div class="card article-card border-0 dubai_crousal_blur">
                        <!-- <div class="card article-card border-0"> -->
                        <div class="position-relative crbox">
                            <!-- <img class="card-img" src="<?= $tips_blog_explore['wpImageURL'] ?>" alt="<?= $single_blog_explore['wpTitle'] ?>"> -->
                            <img class="card-img" src="" alt="">
                        </div>
                        <div class="card-body px-0 pt-3">
                            <span class="article-types">
                                <a href="" target="_blank">

                                </a>
                                <!-- <a href="<?= $tips_blog_explore['wpLink']  ?>" target="_blank">
                                    <?= $tips_blog_explore['wpTitle'] ?>
                                </a> -->
                            </span>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>
</section>
<?php //} 
?>