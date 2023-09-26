<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
<section>
    <!--stert-section-main-->
    <main class=" type-main-next type--list">
    	<div class="container">
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1"></div>
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <?php the_content(); ?>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1"></div>
            </div>
    	</div>
    </main>
</section>
<?php endwhile; endif;?>
    <!--end-section-main-->
<?php get_footer(); ?>