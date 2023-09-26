<?php get_header(); ?>
<?php 
    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 ?>
     <!-- ======= hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">
            <?php $no=get_option('sh_slides_num');
                $i = 0; $slides = sh_get_slides($no);
                if($slides->have_posts()) : 
                
            ?>
                <?php while($slides->have_posts()) : $slides->the_post(); ?>
                    <?php $id=get_the_ID();?>
                    <div class="carousel-item <?= $i == 0 ? 'active' : ''; ?>" style="background-image: url(<?php the_post_thumbnail_url();  ?>)">
                    <div class="overlay"></div>
                    <div class="carousel-container">
                    <?php if(get_post_meta($id,'sh_slide_hide_data',true) != '1') : ?>
                      <div class="container">
                        <h2 class="animate__animated animate__fadeInDown"><?php the_title(); ?></h2>
                        <p class="animate__animated animate__fadeInUp"><?php the_content(); ?></p>
                         <?php $sh_btn_txt = esc_attr( get_post_meta($id, 'sh_btn_txt', true ) ); 
                          if($sh_btn_txt !=null || $sh_btn_txt!=''){
                          $sh_btn_link = esc_attr( get_post_meta( $id, 'sh_btn_link', true ) );
                          ?>
                        <a href="<?= $sh_btn_link;?>" class="btn-get-started scrollto animate__animated animate__fadeInUp"><?= $sh_btn_txt;?></a>
                          
                          <?php } ?>
                      </div>
                    <?php endif; ?>
                    </div>
                  </div>
                 <?php $i++; endwhile;?>
                 <?php wp_reset_query(); ?>
            <?php endif ?>
        </div>

        <a class="carousel-control-prev-1" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" style=" background: url(<?= get_option('sh_first_bg'); ?>) center bottom no-repeat;">
      <div class="container" data-aos="fade-up">
        <header dir="rtl" class="section-header">
          <div class="about-bg">
            <h3>مقدمة</h3>
            <h4> من نحن  !</h4>
            <h6>تعرف على الشبكة </h6>
                <?php $about_txt = get_option('sh_top_head_txt');  
                    if(!empty($about_txt)) :
                ?>
                <?= $about_txt; ?>
                <?php endif; ?>
            <div class="more">
              <a href="<?php echo get_permalink(29); ?>" class="btn-get-started">إقرأ المزيد</a>
            </div>
          </div>
        </header>
      </div>
    </section>
    <!-- End About Us Section -->
    <!-- Start News Section -->
    <section dir="rtl" id="news" style=" background: url(<?= get_option('sh_second_bg'); ?>) center bottom no-repeat;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row"> 
                <div class="col-md-12 pr-5 pl-5 mr-5 ml-5">  
                    <div class="row news-cols">
                      
                      <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="news-col">
                            <div class="row bg m-0">
                                <h3 class="col-md-6">أخر الأخبار</h3>
                                <div class="col-md-6 img"></div>
                            </div>
                            <?php 
                                $no=get_option('sh_news_num');
                                $news = sh_get_news($no);
                                if($news->have_posts()) : 
                            ?>
                            <ul>
                               <?php while($news->have_posts()) : $news->the_post(); ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php echo wp_trim_words( get_the_title(),15, ' ...' ); ?>
                                    </a>
                                </li>
                                <?php endwhile; ?>
                            </ul>
                            <?php wp_reset_query(); ?>
                            <?php endif ?>
                        </div>
                        <a class="cta-btn" href="<?php echo get_permalink(31); ?>">المزيد</a>
                      </div>

                      <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="news-col">
                            <div class="row bg m-0">
                                <h3 class="col-md-6">المقالات</h3>
                                <div class="col-md-6 img"></div>
                            </div>
                            <?php 
                                $no=get_option('sh_article_num');
                                $articles = sh_get_post($no);
                                if($articles->have_posts()) : 
                            ?>
                            <ul dir="rtl">
                               <?php while($articles->have_posts()) : $articles->the_post(); ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2">
                                                <img class="img-fluid" src="<?php the_post_thumbnail_url();  ?>">
                                            </div>
                                        
                                             <div class="col-md-10 col-sm-10">  
                                                <?php echo wp_trim_words( get_the_title(),15, ' ...' ); ?>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <?php endwhile; ?>
                            </ul>
                            <?php wp_reset_query(); ?>
                            <?php endif ?>                            
                        </div>
                        <a class="cta-btn" href="<?php echo get_permalink(47); ?>">المزيد</a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section  id="audios" style=" background: url(<?= get_option('sh_third_bg'); ?>) center center no-repeat ;">
        <div class="container-fluid p-0 m-0" data-aos="fade-up">
            <div class="container">
                <header class="section-header wow fadeInUp">
                  <h3>الصوتيات </h3>
                </header>

                <div dir="rtl" class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 box border-bottom" data-aos="fade-up" data-aos-delay="100">
                        <h4 class="title sounds_header_right">قائمة الصوتيات / الالبوم</h4>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 box border-bottom" data-aos="fade-up" data-aos-delay="200">
                        <h4 class="title  sounds_header_left">استماع</h4>
                    </div>
                    <div class="col-lg-12 col-md-12 box" data-aos="fade-up" data-aos-delay="300">  
                        <?php 
                            $no=get_option('sh_audio_num');
                            $audios = sh_get_audio($no);
                            if($audios->have_posts()) : 
                            $i=1;
                        ?>
                        <div class="play-list">                                    
                            <?php while($audios->have_posts()) : $audios->the_post(); ?>
                            <div class="play-list-row" data-track-row="<?=$i; ?>">
                                <div class="small-toggle-btn">
                                    <i class="small-play-btn"><span class="screen-reader-text">Small toggle button</span></i>
                                </div>
                                <div class="track-number">
                                </div>
                                <div class="track-title">
                                    <a class="playlist-track" href="<?php the_permalink();?>" data-play-track="1"><?php the_title();?></a>
                                </div>
                            </div>
                            <?php $i++;  endwhile;?>
                            <audio id="audio" preload="none" tabindex="0">
                            <?php while($audios->have_posts()) : $audios->the_post(); ?>
                                <source src="<?= get_post_meta(get_the_ID(),'sh_audio_link',true);  ?>" data-track-number="<?= $i; ?>" />  
                                Your browser does not support HTML5 audio.
                            <?php $i++;  endwhile;?>
                            </audio>
                        </div>
                        <?php wp_reset_query(); ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="audio-width">
                <div dir="rtl" class="player">
                    <div class="large-toggle-btn">
                        <i class="large-play-btn"><span class="screen-reader-text">Large toggle button</span></i>
                    </div>
                    <!-- /.play-box -->
                    <div class="info-box">
                        <div class="track-info-box">
                            <div class="track-title-text"></div>
                            <div class="audio-time">
                                <span class="current-time">00:00</span> /
                                <span class="duration">00:00</span>
                            </div>
                        </div>
                            <!-- /.info-box -->
                        <div class="progress-box">
                            <div class="progress-cell">
                                <div class="progress">
                                    <div class="progress-buffer"></div>
                                    <div class="progress-indicator"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.progress-box -->
                    <div class="controls-box">
                        <i class="next-track-btn"><span class="screen-reader-text">Next track button</span></i>
                        <i class="previous-track-btn disabled"><span class="screen-reader-text">Previous track button</span></i>
                    </div>
                    <!-- /.controls-box -->
                </div>
                <!-- /.player -->
            </div>
        </div>
    </section><!-- End Audios Section -->

    <!-- ======= Videos Section ======= -->
    <section id="call-to-action" style=" background: linear-gradient(rgba(0, 0, 0, 0.9), rgba(110, 16, 62, 0.4)), url(<?= get_option('sh_fourth_bg'); ?>) fixed center center;">
      <div class="container text-center" data-aos="zoom-in">
       <h3>قائمة المرئيات </h3>
          <?php 
                $no=get_option('sh_video_num');
                $videos = sh_get_videos(4);
                if($videos->have_posts()) : $k=0; 
            ?>
          <div class="row " >
            <?php while($videos->have_posts()) : $videos->the_post(); ?>
              <?php if($k==0){?>
                  <div class="row mt-5">
                    <div class="col-md-8 offset-md-2">
                        <?php the_content();?>
                    </div>

                  </div>
            <?php }elseif($k >0){?>
              
                <div class="col-md-2 my-5 align-middle">
                    <div>
                        <h5>
                        <a href="<?php echo the_permalink(); ?>"><?php the_title();?></a>
                        </h5>
                    </div>
                </div> 
                <div class="col-md-2 my-5">
                    <a href="<?php echo the_permalink(); ?>" class="video_img">
                        <i class="fa fa-play-circle-o"></i>
                        <img class="img-fluid" src="<?php the_post_thumbnail_url();  ?>">
                    </a>
                </div>
              <?php }?>
                <?php $k++;?>
                <?php endwhile;?>
                <?php wp_reset_query(); ?>
            </div>
            <?php endif ?>      
        
        <a class="cta-btn" href="<?php echo get_permalink(57); ?>">عرض المزيد</a>
      </div>
    </section><!-- End Videos Section -->

    <!-- ======= Books Section ======= -->
    <section id="books">
      <div class="container" data-aos="zoom-in">

        <header class="section-header">
          <h3>الكتب</h3>
        </header>

        <div class="books-slider swiper-container">
          <div class="swiper-wrapper align-items-center">
              <?php $no=get_option('sh_book_num');?>
                <?php
                $books = sh_get_book($no);
                if($books->have_posts()) : 
                ?>
                    <?php while($books->have_posts()) : $books->the_post(); ?>
                        <div class="swiper-slide text-center"><a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><img src="<?php the_post_thumbnail_url();  ?>" class="img-fluid" alt="<?php the_title();?>"></a></div>
                    <?php endwhile;?>
                 <?php wp_reset_query(); ?>
                 <?php endif ?>
            
          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
        <a class="cta-btn" href="<?php echo get_permalink(59); ?>">عرض المزيد</a>
      </div>
    </section><!-- End Our books Section -->
    <!-- Start Fatawa Section -->
    <section dir="rtl" id="fatawa" style=" background: url(<?= get_option('sh_fifth_bg'); ?>) center center no-repeat fixed;">
        <div class="overlay"></div>
        <div class="container-fluid">
            <div class="row"> 
                <div class="col-md-12 pr-5 pl-5 mr-5 ml-5">  
                    <div class="row fatawa-cols">
                      <div class="col-md-6 border2" data-aos="fade-up" data-aos-delay="100">
                        <h3>
                            <img class="img-fluid" src="<?= SH_URL;?>assets/img/shape-9.png"> الفتاوي
                        </h3>
                        <div class="fatawa-col">
                            <ul dir="rtl">
                                <?php 
                                    $no=get_option('sh_fatwa_num');
                                    $fatwa = sh_get_fatwa($no);
                                    if($fatwa->have_posts()) : 
                                ?>
                                <?php while($fatwa->have_posts()) : $fatwa->the_post(); ?>
                                <li>
                                    <a href="<?php the_permalink();?>">
                                        <?= wp_trim_words( get_the_title() ,15, ' ...' );?>
                                    </a>
                                    <div class="border-2">
                                        <div class="float-right">
                                            <i class="fa fa-folder-open" aria-hidden="true"></i>
                                            <?php $post_terms = get_the_terms(get_the_ID(),'fatwa_cat');?>
                                            <?php foreach($post_terms as $post_term){ ?>
                                                <a href="<?= SH_BlogUrl.'/video-category/'.$post_term->slug; ?>" ><?= $post_term->name; ?></a> 
                                            <?php } ?>
                                        </div>
                                        <div class="float-right pad_right_15">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            <?= get_the_date( 'j F Y', get_the_ID() );?>
                                        </div>
                                    </div>
                                </li>
                                <?php endwhile;?>
                                <?php wp_reset_query(); ?>
                                <?php endif ?>
                            </ul>
                        </div>
                        <a class="cta-btn" href="<?php echo get_permalink(82); ?>">المزيد</a>
                      </div>

                      <div class="col-md-6 border1" data-aos="fade-up" data-aos-delay="100">
                        <h3>
                          <img class="img-fluid" src="<?= SH_URL;?>assets/img/shape-10.png">  البطاقات
                        </h3>
                        <div class="fatawa-col">
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                
                                <div class="carousel-inner">
                                <?php $no=get_option('sh_card_num');?>
                                <?php $j=0; $cards = sh_get_cards($no);?> 
                                    <?php if( ! empty( $cards )) :  ?>
                                    <?php foreach($cards as $card) :?>
                                	<div class="carousel-item <?= $j == 0 ? 'active' : ''; ?>">
                                        <img src="<?php echo get_the_post_thumbnail_url($card->ID); ?>" class="img-fluid" alt="<?= $card->post_title; ?>">
                                    </div>
                                    <?php $j++; endforeach; ?>
                                <?php $j=0; endif ?>

                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">السابق</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">التالى</span>
                                </button>
                                <div class="carousel-indicators">
                                <?php if( ! empty( $cards )) :  ?>
                                    <?php foreach($cards as $card) :?>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $j; ?>" class="<?= $j == 0 ? 'active' : ''; ?>" aria-current="true" style="background:url('<?= get_the_post_thumbnail_url($card->ID); ?>') center center no-repeat;"></button>
                                    <?php $j++; endforeach; ?>
                                <?php endif ?>
                                </div>
                            </div>
                        </div>
                        <a class="cta-btn" href="<?php echo get_permalink(80); ?>">المزيد</a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section><!-- End Fatawa Section -->
    <!-- ======= Sites Section ======= -->
    <section id="sites" style=" background: url(<?= get_option('sh_sixth_bg'); ?>) center bottom no-repeat;">
      <div class="container" data-aos="fade-up">
        <header dir="rtl" class="section-header">
          <div class="about-bg">
            <h3>دليل المواقع </h3>
            <div class="row mt-5">
                <?php 
                    $no=get_option('sh_site_num');
                    $site_links = sh_get_site_directory($no);
                    if($site_links->have_posts()) : 
                ?>                    
                <?php while($site_links->have_posts()) : $site_links->the_post(); ?>
                <div class="col-md-3 col-sm-6 sh_sites_img">
                    <img class="img-fluid " src="<?php the_post_thumbnail_url();  ?>">
                    <h4>
                        <a href="<?= get_post_meta(get_the_ID(),'ha_site_link',true); ?>"><?php the_title();?></a>
                    </h4>
                </div>                                            
                <?php endwhile;?>
                <?php wp_reset_query(); ?>
                <?php endif ?>
            </div>
            <div class="more mt-5">
              <a href="<?php echo get_permalink(92); ?>" class="btn-get-started">عرض المزيد</a>
            </div>
          </div>
        </header>
      </div>
    </section>
    <!-- End Sites Section -->
  </main><!-- End #main -->
<?php get_footer(); ?>