<?php get_header(); ?>
<header>
   <section id="subpage_top"  style="background-image: url('http://deen.puffermedia.net/wp-content/uploads/2021/03/slider.png');" >
    <div class="overlay">
        <div class="page_header">
            <div class="page">
                <div class="container">
                    <h3>
						<?php wp_title( '', true, 'right','' ); ?>
					</h3>
                    <ul class="bread_crumb list-unstyled">
                        <li>
                            <a href="<?php bloginfo('url'); ?>" title="الرئيسية">
                            الرئيسية
                            </a>
                        </li>
                        <li>
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                        </li>
                        <li>
                            <?php wp_title( '', true, 'right' ,''); ?> 
                        </li>          
                    </ul> 
                </div>
            </div>
        </div>
    </div>
</section>
</header>
<!--stert-section-main-->
<main id="page_404" class=" type-main-next type--list">
	<div class="container2" style="text-align: center;">
      <div class="s-head col-xs-12">
      	<img src="http://deen.puffermedia.net/wp-content/uploads/2021/04/404.png">
	      	<h3>
	      		<a href="<?php bloginfo('url'); ?>">العودة إلي الصفحة الرئيسية</a>
	      	
	      	</h3>
        </div>
	</div>
</main>
<!--end-section-main-->
<?php get_footer(); ?>