<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>Wisatawan &mdash; <?= $title; ?></title>
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <link rel="icon" href="<?= base_url('assets/'); ?>images/favicon.ico" type="image/x-icon">
  <!-- Stylesheets-->
  <link rel="stylesheet" type="<?= base_url('assets/'); ?>text/css" href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7CPoppins:400%7CTeko:300,400">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/fonts.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">
  <style>
    .ie-panel {
      display: none;
      background: #212121;
      padding: 10px 0;
      box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
      clear: both;
      text-align: center;
      position: relative;
      z-index: 1;
    }

    html.ie-10 .ie-panel,
    html.lt-ie-10 .ie-panel {
      display: block;
    }
  </style>
</head>

<body>
  <div class="preloader">
    <div class="preloader-body">
      <div class="cssload-container">
        <div class="cssload-speeding-wheel"></div>
      </div>
      <p>Loading...</p>
    </div>
  </div>
  <div class="page">
    <!-- Page Header--><a class="banner banner-top"></a>
    <header class="section page-header">
      <!-- RD Navbar-->
      <div class="rd-navbar-wrap">
        <nav class="rd-navbar rd-navbar-corporate" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="106px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
          <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
          <div class="rd-navbar-aside-outer">
            <div class="rd-navbar-aside">
              <!-- RD Navbar Panel-->
              <div class="rd-navbar-panel">
                <!-- RD Navbar Toggle-->
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <!-- RD Navbar Brand-->
                <div class="rd-navbar-brand">
                  <!--Brand--><a class="brand" href="index.html"><img src="<?= base_url('assets/'); ?>images/logo.png" alt="" width="225" height="18" /></a>
                </div>
              </div>
              <div class="rd-navbar-aside-right rd-navbar-collapse">
                <?php if ($this->session->userdata('is_login') == FALSE) : ?>
                  <a class="button button-md button-default-outline-2 button-ujarak" href="<?= base_url('home/login'); ?>">Login</a>
                  <a class="button button-md button-default-outline-2 button-ujarak" href="<?= base_url('home/register'); ?>">Register</a>
                <?php else : ?>
                  <a class="button button-md button-default-outline-2 button-ujarak" href="<?= base_url('home/logout/'); ?>">Logout</a>
                <?php endif ?>
              </div>
            </div>
          </div>
          <div class="rd-navbar-main-outer">
            <div class="rd-navbar-main">
              <div class="rd-navbar-nav-wrap">
                <!-- <ul class="list-inline list-inline-md rd-navbar-corporate-list-social">
                    <li><a class="icon fa fa-facebook" href="#"></a></li>
                    <li><a class="icon fa fa-twitter" href="#"></a></li>
                    <li><a class="icon fa fa-google-plus" href="#"></a></li>
                    <li><a class="icon fa fa-instagram" href="#"></a></li>
                  </ul> -->
                <!-- RD Navbar Nav-->
                <ul class="rd-navbar-nav">
                  <li class="rd-nav-item active"><a class="rd-nav-link" href="<?= base_url('/'); ?>">Home</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="about.html">About</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="typography.html">Typography</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="contact-us.html">Contact Us</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>