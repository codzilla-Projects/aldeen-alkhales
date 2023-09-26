<?php 
get_header(); 
$sh_breadcrumbs = get_post(82);
?>
   <section id="subpage_top"  style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');" >
    <div class="overlay">
        <div class="page_header">
            <div class="page">
                <div class="container">
                     <h3><?= single_cat_title(); ?></h3>
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
                            <a href="<?= $sh_breadcrumbs->guid; ?>">     
                             <?= $sh_breadcrumbs->post_title; ?>
                            </a>
                         </li>          
                          <li>
                            /
                        </li>
                        <li>
                         <?= single_cat_title(); ?>
                         </li>  
                    </ul>      
                </div>
            </div>
        </div>
    </div>
</section>
<section dir="rtl" id="audio">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                      <div class="department_one margin_top_100 col-md-12">
                    	<?php 
    						$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
    						$fatwas = sh_get_fatwa_with_tax(3,$term->term_id);
    						if($fatwas->have_posts()) : 
                        ?>
                        <div class="description">
                            <h3>جديد <?= single_cat_title(); ?></h3>
                            <div class="row row_padding">
                                <ul class="">
								<?php while($fatwas->have_posts()) : $fatwas->the_post();
                                    $fatwa_title = get_the_title();
                                ?>
                                    <li class="cat">
	                                    <h5>
	                                     <a href="<?php the_permalink(); ?>" title="<?= $fatwa_title; ?>"><?php echo wp_trim_words( $fatwa_title, 10, ' ...' );?><i class="fa fa-book"></i></a>
	                                    </h5>
	                                    <ul class="">
	                                        <li class="post">
		                                        
		                                            <?php $post_terms = get_the_terms(get_the_ID(),'fatwa_cat');?>
		                                        	<?php foreach($post_terms as $post_term){ ?>
		                                            <a href="<?= SH_BlogUrl.'/fatwa-category/'.$post_term->slug; ?>" ><?php 
                                                        echo $post_term->name; 
                                                        if(next($post_terms)==true) echo " / ";
                                                        ?>	
		                                        	</a>
		                                        <?php } ?>
	                                    	</li>
	                                    </ul>
                                	</li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="pagin">
                         <nav aria-label="Page navigation example">
                         	<?php    
					        	$args = array(
					               'format'             => '?paged=%#%',
					               'current'            => max( 1, get_query_var('paged') ),
					               'total'              => $fatwas->max_num_pages,
					               'show_all'           => false,
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
                    <?php wp_reset_query(); ?>
                    <?php endif ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="department col-md-12 sidebar">
                    	<?php
                           $mostfatwas = sh_most_viewed_fatwa(5);
                           if($mostfatwas->have_posts()) : 
                        ?>         
                        <h3>
                           أكثر الفتاوي قراءة
                            <i class="fa fa-book" aria-hidden="true"></i>
                        </h3>
                        <ul class="list-group">
                            <?php while($mostfatwas->have_posts()) : $mostfatwas->the_post(); 
                                $fatwa_title = get_the_title();
                            ?>
                            <li class="list-group-item">
                                <div class="post_content">
                                    <h5>
                                       <a href="<?php the_permalink();?>" title="<?= $fatwa_title; ?>"><?php echo wp_trim_words( $fatwa_title,5, ' ...' );?></a>
                                    </h5>
                                    <ul>
                                        <li>
                                            
                                            <?php $post_terms = get_the_terms(get_the_ID(),'fatwa_cat');?>
                                            	<i class="fa fa-archive" aria-hidden="true"></i>
                                                <?php foreach($post_terms as $post_term){ ?>
                                                <a href="<?= SH_BlogUrl.'/fatwa-category/'.$post_term->slug; ?>" ><?php 
                                                    echo $post_term->name; 
                                                    if(next($post_terms)==true) echo " / ";
                                                ?>	
                                                </a>
                                            <?php } ?>
                                                                                                                            
                                        </li>
                                    </ul>
                                </div>
                            </li>                            
                        <?php endwhile; ?>
                        </ul>             
                    <?php wp_reset_query(); ?>
                    <?php endif ?>
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>     
<!-- ==================================== -->
<?php get_footer(); ?>