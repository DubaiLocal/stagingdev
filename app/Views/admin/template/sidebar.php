<ul>
    <li class="nav-item <?php echo ($contacts_sidebar) ? $contacts_sidebar : ""; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>/admin/dashboard">
            <!--<i class="ion ion-md-contact"></i>-->
            <span class="pcoded-micon"><i class="fa fa-user"></i></span>
            <span class="nav-link-text">Dashboard</span>
        </a>
    </li>
</ul>
<li class="nav-item <?php echo ($contacts_sidebar) ? $contacts_sidebar : ""; ?>">
    <a class="nav-link" href="<?php echo base_url(); ?>/admin/business/listing">
        <!--<i class="ion ion-md-contact"></i>-->
        <span class="pcoded-micon"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
        <span class="nav-link-text">All Businesses</span>
    </a>
</li>
<li class="nav-item pcoded-hasmenu">
    <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="fa fa-cogs" aria-hidden="true"></i></span><span class="pcoded-mtext">Manage Master</span></a>
    <ul class="pcoded-submenu">
        <li class="nav-item <?php echo ($category_sidebar) ? $category_sidebar : ""; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>/admin/category">
                <!--<i class="ion ion-md-contact"></i>-->
                <!-- <span class="pcoded-micon"><i class="fa fa-th-large" aria-hidden="true"></i></span> -->
                <span class="nav-link-text">All Categories</span>
            </a>
        </li>
        <li class="nav-item <?php echo ($featured_sidebar) ? $featured_sidebar : ""; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>/admin/featured">
                <!--<i class="ion ion-md-contact"></i>-->
                <!-- <span class="pcoded-micon"><i class="fa fa-th-large" aria-hidden="true"></i></span> -->
                <span class="nav-link-text">All Featured</span>
            </a>
        </li>
        <!-- <li class="nav-item <?php echo ($header_menu_sidebar) ? $header_menu_sidebar : ""; ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>/admin/menu-front">
                    <span class="nav-link-text">Front Menu Categories</span>
                </a>
            </li> -->
        <li class="nav-item <?php echo ($pending_bussiness_sidebar) ? $pending_bussiness : ""; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>/admin/business/pending-business">
                <!--<i class="ion ion-md-contact"></i>-->
                <!-- <span class="pcoded-micon"><i class="fa fa-th-large" aria-hidden="true"></i></span> -->
                <span class="nav-link-text">All Pending bussiness</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item <?php echo ($pending_claims_sidebar) ? $pending_claims_sidebar : ""; ?>">
    <a class="nav-link" href="<?php echo base_url(); ?>/admin/pending-claims">
        <!--<i class="ion ion-md-contact"></i>-->
        <span class="pcoded-micon"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
        <span class="nav-link-text">Pending Claims</span>
    </a>
</li>
<li class="nav-item <?php echo ($move_business_sidebar) ? $move_business_sidebar : ""; ?>">
    <a class="nav-link" href="<?php echo base_url(); ?>/admin/move-subcategory-business">
        <!--<i class="ion ion-md-contact"></i>-->
        <span class="pcoded-micon"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
        <span class="nav-link-text">Move Business</span>
    </a>
</li>
<li class="nav-item <?php echo ($move_keywords_sidebar) ? $move_keywords_sidebar : ""; ?>">
    <a class="nav-link" href="<?php echo base_url(); ?>/admin/move-subcategory-keywords">
        <!--<i class="ion ion-md-contact"></i>-->
        <span class="pcoded-micon"><i class="fa fa-code-fork" aria-hidden="true"></i></span>
        <span class="nav-link-text">Move Keywords</span>
    </a>
</li>
<li class="nav-item <?php echo ($add_multiple_business_category_sidebar) ? $add_multiple_business_category_sidebar : ""; ?>">
    <a class="nav-link" href="<?php echo base_url(); ?>/admin/add-multiple-business-category">
        <!--<i class="ion ion-md-contact"></i>-->
        <span class="pcoded-micon"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
        <span class="nav-link-text">Add Multiple Business Category</span>
    </a>
</li>
</ul>