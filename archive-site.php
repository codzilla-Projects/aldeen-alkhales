<?php 
/**
** Template Name: Site Template
**/
get_header(); ?>
<section id="subpage_top" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
    <div class="overlay">
        <div class="page_header">
            <div class="page">
                <div class="container">
                  <h3> دليل المواقع  </h3>
                    <ul class="bread_crumb list-unstyled">
                        <li>
                            <a title="الرئيسية" href="<?php bloginfo('url'); ?>">
                            الرئيسية
                            </a>
                        </li>
                        <li>
                            /
                        </li>
                        <li>
                         دليل المواقع 
                         </li>          
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<section id="site" style=" background: url(<?= get_option('sh_sixth_bg'); ?>) center bottom no-repeat;">
      <div class="container" data-aos="fade-up">
        <header dir="rtl" class="section-header">
          <div class="about-bg">
            <div class="row">
                <?php 
                  $no=get_option('sh_site_num');
                  $site_links = sh_get_site_directory_inner(16);
                  if($site_links->have_posts()) :    
                    while($site_links->have_posts()) : $site_links->the_post(); $site_id = get_the_ID();
                    $ha_site_link = get_post_meta($site_id, 'ha_site_link', true);?>
                      <div class="col-md-3 col-sm-6 mt-3 mb-3 sh_site_img">
                        <img class="img-fluid" src="<?php the_post_thumbnail_url();  ?>" >
                        <h4>
                            <a href="<?php echo $ha_site_link; ?>">
                              <span><?php the_title();?> </span>
                            </a>
                        </h4>
                      </div>                                            
                    <?php endwhile;?>
            </div>
            <div class="more mt-2">
             <div class="pagin">
                 <nav aria-label="Page navigation audio">
                  <?php    
                    $args = array(
                         'format'             => '?paged=%#%',
                         'current'            => max( 1, get_query_var('paged') ),
                         'total'              => $site_links->max_num_pages,
                         'show_all'           => true,
                         'end_size'           => 1,
                         'mid_size'           => 2,
                         'prev_next'          => true,
                         'next_text'          => 'التالي   »',
                                   'prev_text'          => '« السابق  ',
                         'type'               => 'list',
                        );
                  ?>
                  <?php echo paginate_links($args); ?>
                </nav>
              </div>
            </div>
          </div>
        </header>
      </div>
    </section>
    <?php wp_reset_query(); ?>
    <?php endif ?>
<?php get_footer(); ?>