<?php
/**
** Template Name: Contact Template
**/
get_header(); ?>
<section id="subpage_top"  style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');" >
    <div class="overlay">
        <div class="page_header">
            <div class="page">
                <div class="container">
                    <h3><?php the_title(); ?></h3>
                    <ul class="bread_crumb list-unstyled">
                        <li>
                            <a title="الرئيسية" href="<?php bloginfo('url'); ?>">
                            الرئيسية
                            </a>
                        </li>
                        <li>
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                        </li>
                        <li>
                            <?php the_title(); ?> 
                        </li>          
                    </ul> 
                </div>
            </div>
        </div>
    </div>
</section>
 <section dir="rtl" class="Material-contact-section section-padding section-dark">
      <div class="container">
<!--
          <div class="row ">
              <div class="col-md-12 wow animated  fadeInLeft" data-wow-delay=".2s">
                  <h1 class="section-title">تواصل معنا </h1>
              </div>
          </div>
-->
          <div class="row">
              <!-- Section Titile -->
              <div class="col-md-6  contact-widget-section2  wow animated fadeInLeft" data-wow-delay=".2s">
                  <h3 class="ha-contact-header">تواصل معنا </h3>
                <p class="mb-5"><?php the_content(); ?> </p>

                <h5 class="mt-4">بيانات التواصل </h5>
                <p>
                  <i class="fa fa-map-marker"></i><?php echo get_option('ha_address'); ?>
                </p>
                <p>
                  <i class="fa fa-whatsapp" aria-hidden="true"></i><?php echo get_option('sh_phone'); ?>
                </p>
                <p>
                  <i class="fa fa-envelope-o"></i><?php echo get_option('sh_email'); ?>
                </p>
                
            <div class="col-lg-12 col-md-6">
                <h5>تابعنا عبر التواصل الاجتماعي</h5>

            <div class="social-links contact-socail">
              <?php $youtube = get_option('sh_youtube');  
                if(!empty($youtube)) :
                ?>
					<a target="_blank" href="<?= $youtube; ?>" title="youtube">
						<i class="fa fa-youtube-play" aria-hidden="true"></i>
					</a>
                 <?php endif; ?>
                <?php $twitter = get_option('sh_twitter');  
                if(!empty($twitter)) :
                ?>
					<a target="_blank" href="<?= $twitter; ?>" title="twitter">
						<i class="fa fa-twitter" aria-hidden="true"></i>
					</a>
                <?php endif; ?>
                <?php $facebook = get_option('sh_fb');  
                if(!empty($facebook)) :
                ?>
					<a target="_blank" href="<?= $facebook; ?>" title="facebook">
						<i class="fa fa-facebook" aria-hidden="true"></i>
					</a>
                
                <?php endif; ?>
                <?php $insta = get_option('sh_insta');  
                if(!empty($insta)) :
                ?>
					<a target="_blank" href="<?= $insta; ?>" title="instagram">
						<i class="fa fa-instagram" aria-hidden="true"></i>
					</a>
                <?php endif; ?>
                <?php $telegram = get_option('sh_telegram');  
                if(!empty($telegram)) :
                ?>
					<a target="_blank" href="<?= $telegram; ?>" title="telegram">
						<i class="fa fa-telegram" aria-hidden="true"></i>
					</a>
                <?php endif; ?>
            </div>
             
          </div>
              </div>
              <!-- contact form -->
              <div class="col-md-6 wow animated fadeInRight" data-wow-delay=".2s">
                  <h3 class="ha-contact-header">إترك لنا رسالة  </h3>
                  <?php echo do_shortcode('[contact-form-7 id="233" title="contact us" html_id="contactForm" html_class="shake"]');?>
                  
              </div>
          </div>
      </div>
    </section>
      
<?php get_footer(); ?>