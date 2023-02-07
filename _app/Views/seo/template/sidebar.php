<li class="nav-item <?= ($dashboard_sidebar) ? $dashboard_sidebar : ""; ?>">
    <a class="nav-link" href="<?= base_url(); ?>/seo/dashboard">
        <span class="pcoded-micon"><i class="fa fa-user"></i></span>
        <span class="nav-link-text">Dashboard</span>
    </a>
</li>
<li class="nav-item <?= ($manage_category_seo_sidebar) ? $manage_category_seo_sidebar : ""; ?>">
    <a class="nav-link" href="<?= base_url(); ?>/seo/manage-category-seo">
        <span class="pcoded-micon"><i class="fa fa-building"></i></span>
        <span class="nav-link-text">Manage SEO</span>
    </a>
</li>