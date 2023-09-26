<?php
/**
** Template Name: About Template
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
 <section dir="rtl" class="Material-contact-section section-padding section-dark about-page">
      <div class="container">
          
          <div class="row">
              <!-- Section Titile -->
              <div class="col-md-12  contact-widget-section2  wow animated fadeInLeft" data-wow-delay=".2s">
             
                  <?php the_content(); ?> 

           
              </div>
      
          </div>
      </div>
    </section>
      
<?php get_footer(); ?>