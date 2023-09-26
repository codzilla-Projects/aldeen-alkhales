<?php 
get_header(); 
$sh_breadcrumbs = get_post(80);
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
<section dir="rtl" id="videos">
        <div class="container">
            <div class="row row_padding">
                <div class="col-md-8">
                    <?php 
                        $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
                        $cards = sh_get_card_with_tax(12,$term->term_id);
                        if($cards->have_posts()) : 
                     ?>
                      <div class="department_one margin_top_100 col-md-12">
                        <div class="description">
                            <h3>جديد <?= single_cat_title(); ?></h3>
                            <div class="row row_padding p-0 mt-3 mr-0 ml-0">
                                <?php                     								
                    				while($cards->have_posts()) : $cards->the_post(); 
                                ?>
                                 <div class="col-lg-6 col-md-6 col-sm-6 mb-3 single_video">
                              <a href="<?php the_permalink(); ?>">
                                <img src="<?php the_post_thumbnail_url('full'); ?>" class="img-fluid" alt="<?php the_title();?>">
                              </a>
                              <div class="video_content">   

                                <div class="row card_data">
                                  <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h4><a href="<?php the_permalink();?>" title="<?= $card_title; ?>"><?php echo wp_trim_words( $card_title ,5, ' ...' );?></a></h4>
                                  </div>
                                    
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <span>
                                          <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            <h6><?= get_the_date( 'd F Y', get_the_ID() );?></h6>
                                        </span> 
                                    </div>
                                </div>
                              </div>                                 
                            </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <div class="pagin">
                           <nav aria-label="Page navigation example">
                           	<?php    
      					        	      $args = array(
      					               'format'             => '?paged=%#%',
      					               'current'            => max( 1, get_query_var('paged') ),
      					               'total'              => $cards->max_num_pages,
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
                                $cards = sh_most_viewed_card(4);
                                if($cards->have_posts()) : 
                            ?>
                            <h3>
                               أكثر البطاقات مشاهدة
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </h3>
                            <ul class="list-group">
                                
                                <?php while($cards->have_posts()) : $cards->the_post();  
                                    $card_title = get_the_title();?>
                                <li class="list-group-item">
                                    <div class="post_content">
                                        <h5>
                                         <a href="<?php the_permalink();?>" title="<?= $card_title; ?>"><?php echo wp_trim_words( $card_title ,5, ' ...' ); ?></a>
                                        </h5>
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
</section>     
<!-- ==================================== -->
<?php get_footer(); ?>