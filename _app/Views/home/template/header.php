<!doctype html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-559SJ6KDDH"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-559SJ6KDDH');
    </script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?php echo base_url(); ?>/assets/front/images/favicon.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/waitme@1.19.0/waitMe.css">
    <title>Best Business Directory of Dubai - Updated List of Businesses in Dubai</title>
    <meta property="og:title" content="Best Business Directory of Dubai - Updated List of Businesses in Dubai" />
    <meta property="og:description" content="DubaiLocal is the largest business listing platform for businesses in Dubai. Find list of companies in Dubai with contact details, addresses, website and working hours etc." />
    <meta property="og:image" content="https://dubailocal.ae/assets/front/images/about_banner.jpg" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- External Font Css -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Latest compiled and minified css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
    <!-- Owl carsousel css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/front/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/front/css/animate.css">
    <!-- Text editor -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/front/css/rte_theme_default.css" />
    <!-- Custom css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/front/css/magnific-popup.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/front/css/style.css">
    <meta name="google-site-verification" content="mkn3UpbrKgA8k0Z0xE57PbETQTGvs_qSXviXBB5YfqI" />
</head>
<style>
    .page-loader {
        width: 100%;
        height: 100vh;
        position: fixed;
        background: url(<?= base_url(); ?>/assets/front/images/dubai_loader_bg.jpg);
        background-size: cover;
        z-index: 1000;
        top: 0;
    }

    .page-loader .txt {
        color: #666;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 0.3rem;
        font-weight: bold;
        line-height: 1.5;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>

<body onload='document.body.style.opacity="1"'>
    <div class="page-loader" style="display:none;">
        <div class="txt wow fadeInUp" data-wow-duration=".6s" data-wow-delay=".2s">
            <img src="<?= base_url(); ?>/assets/front/images/dubai_loader_logo.png" alt="" />
        </div>
    </div>
    <header class="site-nav-col">
        <div class="topbar">
            <div class="container">
                <div class="toplinks">
                    <div class="dub_datetemp">
                        <?php

                        use CodeIgniter\I18n\Time;

                        $xml = simplexml_load_file("https://api.openweathermap.org/data/2.5/weather?lat=25.7551&lon=52.7871&appid=fb563e9f3dd1081c4108daf670d5e0cc&units=metric&mode=xml");
                        $json = json_encode($xml);
                        $array = json_decode($json, TRUE);
                        $temperature =  $array['temperature']['@attributes']['value'];
                        $clouds =  $array['clouds']['@attributes']['name'];
                        $myTime = new Time('now', 'Asia/Dubai', 'en_US');
                        $date =  $myTime->format('D d M Y g:i a');
                        ?>
                        <span><?= $date ?></span>|<span> <?= $temperature ?>° <?= ucfirst($clouds) ?></span>
                    </div>
                    <div class="dub_top_rightlinks">
                        <a href="<?php echo base_url(); ?>/browse-business-directory">Businesses</a>
                        <span>|</span>
                        <a href="<?php echo base_url(); ?>/dubai-explore" target="_blank">Explore Dubai</a>
                        <span>|</span>
                        <a href="<?= getenv('BLOG_BASE_URL'); ?>" target="_blank">The Blog</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>/assets/front/images/logo.png" class="img-fluid" alt="America Local"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <?php


                            if (is_array($menu_categories) && count($menu_categories) > 0) {
                                $numItems = count($menu_categories);
                                $i = 0;
                                foreach ($menu_categories as $menuCategory) { ?>
                                    <li class="nav-item dropdown <?= (++$i === $numItems) ? "lastdrop" : ""; ?>">
                                        <a class="nav-link dropdown-toggle" href="<?php echo base_url(); ?>/category" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?= $menuCategory['name'] ?>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <ul>
                                                <?php
                                                foreach ($menu_sub_categories as $menu_sub_category) {
                                                    if ($menuCategory['id'] == $menu_sub_category['cat_id']) {
                                                ?>
                                                        <li><a href="<?php echo base_url() . "/businesses/" . $menu_sub_category['slug'] ?>" class="dropdown-item"><img src="<?php echo base_url(); ?>/assets/front/images/icons/<?= $menu_sub_category['sub_cat_name'] ?>.svg" class="img-fluid" alt=""> <?= $menu_sub_category['sub_cat_name'] ?></a></li>
                                                <?php }
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </li>
                            <?php }
                            } ?>
                            <li class="nav-item navlinkadd"><a class="nav-link" href="#addbusiness" data-toggle="modal">Add a Business</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>