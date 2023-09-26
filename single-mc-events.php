<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $event_id = get_the_ID(); 
	$post_views = get_post_meta($event_id,'sh_post_views',true);
    $sh_breadcrumbs = get_post(192);
    $event_title = get_the_title();
?>           
<section id="subpage_top"  class="ha-single-header" style="background-image: url('http://deen.puffermedia.net/wp-content/uploads/2021/03/slider.png');" >
    <div class="overlay">
        <div class="page_header">
            <div class="page">
                <div class="container">
                    <h3><?php echo wp_trim_words( $event_title ,10, ' ...' ); ?></h3>
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
                         <a href="<?= $sh_breadcrumbs->guid; ?>">
                                <?= $sh_breadcrumbs->post_title; ?>
                        </a>
                         </li>
                         <li>
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                        </li>  
                         <li>
                              <?php echo wp_trim_words( $event_title ,5, ' ...' ); ?>
                         </li>        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section dir="rtl" id="audio" >
    <div class="container-fluid p-0 m-0" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="department bg-white col-md-12">
                        <div class="post single audio-single-page">
                            <h4 class="post_title">
								<?php the_title(); ?>
							</h4>
							<div class="sh_single_content">     
                                <?php the_content();?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="department  col-md-12 sidebar">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>     
<?php update_post_meta($event_id,'sh_post_views',++$post_views);?> 
<?php endwhile; endif;?>
<?php get_footer(); ?>