<?php $session = session(); ?>
<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Dubai Local Net</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/main.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/main-style.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">
   <link rel="icon" href="<?php echo base_url(); ?>/assets/front/images/favicon.png" type="image/x-icon">
   <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/fonts/fontawesome/css/fontawesome-all.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
</head>

<body>
   <nav class="pcoded-navbar menupos-fixed menu-light brand-blue ">
      <div class="navbar-wrapper ">
         <div class="navbar-brand header-logo">
            <a href="<?php echo base_url(); ?>" class="b-brand">
               <!-- <h3 style="color:#fff" class="logo images">Local Directory</h3> -->
               <img src="<?php echo base_url(); ?>/assets/front/images/logo.png" alt="" class="logo images">
               <img src="<?php echo base_url(); ?>/assets/front/images/logo.png" alt="" class="logo-thumb images">
               <!-- <h3 class="logo-thumb images">Local Directory</h3>
               <img src="./assets/images/logo.svg" alt="" class="logo images">
               <img src="./assets/images/logo-icon.svg" alt="" class="logo-thumb images"> -->
            </a>
            <!-- <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a> -->
         </div>
         <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">
               <!--  <li class="nav-item">
                     <a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                  </li> -->
               <?php echo view('seo/template/sidebar'); ?>
               <!--    <li class="nav-item pcoded-hasmenu">
                     <a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Componant</span></a>
                     <ul class="pcoded-submenu">
							<li class=""><a href="bc_button.html" class="">Button</a></li>
						</ul>
                  </li>
                  <li class="nav-item">
                     <a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Form elements</span></a>
                  </li>
                  <li class="nav-item">
                     <a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Bootstrap table</span></a>
                  </li> -->
            </ul>
         </div>
      </div>
   </nav>
   <header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed">
      <div class="m-header">
         <a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
         <a href="index.html" class="b-brand">
            <!-- <h4 style="color:#fff" class="logo images">Local Directory</h4> -->
            <img src="<?php echo base_url(); ?>/assets/images/america-logo.png" alt="" class="logo images">
            <img src="<?php echo base_url(); ?>/assets/images/america-logo.png" alt="" class="logo-thumb images">
         </a>
      </div>
      <a class="mobile-menu" id="mobile-header" href="#!">
         <i class="feather icon-more-horizontal"></i>
      </a>
      <div class="collapse navbar-collapse">
         <a href="#!" class="mob-toggler"></a>
         <ul class="navbar-nav mr-auto">
            <li class="nav-item">
               <!-- <div class="main-search open">
                  <div class="input-group">
                     <input type="text" id="m-search" class="form-control" placeholder="Search . . .">
                     <a href="#!" class="input-group-append search-close">
                     <i class="feather icon-x input-group-text"></i>
                     </a>
                     <span class="input-group-append search-btn btn btn-primary">
                     <i class="feather icon-search input-group-text"></i>
                     </span>
                   </div> 
               </div> -->
            </li>
         </ul>
         <ul class="navbar-nav ml-auto">
            <li>
               <div class="dropdown drp-user">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <!-- <i class="icon feather icon-settings"></i> -->
                     <img height="25px" src="<?php echo base_url(); ?>/assets/images/user/avatar.png" class="img-radius" alt="User-Profile-Image">
                  </a>
                  <div class="dropdown-menu dropdown-menu-right profile-notification">
                     <div class="pro-head">
                        <img src="<?php echo base_url(); ?>/assets/images/user/avatar.png" class="img-radius" alt="User-Profile-Image">
                        <span><?php echo $session->get('name'); ?></span>
                     </div>
                     <ul class="pro-body">
                        <li><a href="#!" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                        <!-- <li><a href="<?= base_url(); ?>/user/change-password" class="dropdown-item"><i class="feather icon-lock"></i> Change Password</a></li> -->
                        <li><a href="<?= base_url(); ?>/seo/logout" class="dropdown-item"><i class="feather icon-log-out"></i> Log Out</a></li>
                     </ul>
                  </div>
               </div>
            </li>
         </ul>
      </div>
   </header>
   <div class="pcoded-main-container">
      <div class="pcoded-wrapper">
         <div class="pcoded-content">
            <div class="pcoded-inner-content">