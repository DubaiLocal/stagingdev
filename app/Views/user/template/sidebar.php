<li class="nav-item <?= ($dashboard_sidebar) ? $dashboard_sidebar : ""; ?>">
    <a class="nav-link" href="<?= base_url(); ?>/user/dashboard">
        <span class="pcoded-micon"><i class="fa fa-user"></i></span>
        <span class="nav-link-text">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?= base_url(); ?>/user/business">
        <span class="pcoded-micon"><i class="fa fa-building"></i></span>
        <span class="nav-link-text">My Bussiness</span>
    </a>
</li>
<li class="nav-item <?= ($pending_bussiness_sidebar) ? $pending_bussiness_sidebar : ""; ?>">
    <a class="nav-link" href="<?= base_url(); ?>/user/pending-business">
        <span class="pcoded-micon"><i class="fa fa-briefcase"></i></span>
        <span class="nav-link-text">All Pending bussiness</span>
    </a>
</li>
<li class="nav-item ">
    <a class="nav-link" href="<?= site_url('user/business/create') ?>">
        <span class="pcoded-micon"><i class="fa fa-plus-circle"></i></span>
        <span class="nav-link-text">Add Bussiness</span>
    </a>
</li>