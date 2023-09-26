<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="author" content="Codzilla - https://codzilla.net/">

  <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
  <meta content="<?= get_bloginfo('description'); ?>" name="description">
  <meta content="تفسير  , قرءان" name="keywords">

  <!-- Favicons -->
  <link href="<?= SH_URL; ?>favicon.png" rel="icon">
  <link href="<?= SH_URL; ?>favicon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

 <?php wp_head(); ?>
</head>

<body>

  <!-- ======= Header ======= -->
<header dir="rtl" id="header" class="fixed-top d-flex align-items-center Essam">
    <div class="container-fluid">
      <div class="row justify-content-center align-items-center">
            <div class="col-xl-12 d-flex align-items-center p-0 m-0">
                <div class="sidebar bg1">
                    <div class="container-fluid">
                        <div class="uni-header-top">
                            <div class="uni-header-top-left">
                                <p><?= sh_getHijriDate(); ?></p>
                            </div>
                            <div class="uni-header-top-right">
                                <ul dir="rtl">
                                    <li><span>تابعنا </span></li>
                                    <?php $twitter = get_option('sh_twitter');  
                                    if(!empty($twitter)) :
                                    ?>
                                    <li>
                                        <a target="_blank" href="<?= $twitter; ?>" title="twitter">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    <?php $facebook = get_option('sh_fb');  
                                    if(!empty($facebook)) :
                                    ?>
                                    <li>
                                        <a target="_blank" href="<?= $facebook; ?>" title="facebook">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                        <?php $youtube = get_option('sh_youtube');  
                                    if(!empty($youtube)) :
                                    ?>
                                    <li>
                                        <a target="_blank" href="<?= $youtube; ?>" title="youtube">
                                            <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                     <?php endif; ?>

                                    <?php $insta = get_option('sh_insta');  
                                    if(!empty($insta)) :
                                    ?>
                                    <li>
                                        <a target="_blank" href="<?= $insta; ?>" title="instagram">
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <?php endif; ?>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="col-xl-11 d-flex align-items-center">
            <a href="<?php bloginfo('url'); ?>" class="logo"><img src="<?= get_option('sh_logo_img'); ?>"></a>
            <!-- Uncomment below if you prefer to use an image logo -->
            <nav id="navbar" class="navbar" dir="rtl">
                <?php wp_nav_menu( array( 'theme_location' => 'main-menu','container' => false ) ); ?>
<!--
                <ul dir="rtl">
                    <li><a class="nav-link scrollto active" href="#hero">الرئيسية</a></li>
                    <li><a class="nav-link scrollto" href="#call-to-action">المرئيات</a></li>
                    <li><a class="nav-link scrollto" href="#audios">الصوتيات</a></li>
                    <li><a class="nav-link scrollto " href="#books">الكتب</a></li>
                    <li><a class="nav-link scrollto" href="#sites">دليل المواقع</a></li>
                    <li><a class="nav-link scrollto" href="#fatawa">الفتاوي</a></li>
                    <li><a class="nav-link scrollto" href="#news">مقالات</a></li>
                    <li><a class="nav-link scrollto" href="#">الاخبار</a></li>
                    <li><a class="nav-link scrollto" href="#fatawa">البطاقات</a></li>
                </ul>
-->
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar --> 
        </div>
      </div>
    </div>
</header><!-- End Header -->
