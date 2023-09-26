<?php
/**
** Template Name: Cards Library Template
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
                            /
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
<section dir="rtl" id="videos">
    <div class="container-fluid p-0 m-0" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                      <div class="department_one margin_top_100 col-md-12">
                        <?php
                            $cards = sh_get_cards_inner(8);
                            if($cards->have_posts()) : 
                        ?>
                        <div class="description">
                            <h3>جديد  البطاقات </h3>
                            <div class="row p-0 mt-3 row_padding">
                            <?php while($cards->have_posts()) : $cards->the_post(); 
                              $card_title = get_the_title();
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
                                    <?php $post_terms = get_the_terms(get_the_ID(),'card_cat');
                                    if(!empty($post_terms)){?>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                      <span>
                                        
                                        <i class="fa fa-tag" aria-hidden="true"></i>
                                        
                                        <?php foreach($post_terms as $post_term){ ?>
                                        <a href="<?= SH_BlogUrl.'/card-category/'.$post_term->slug; ?>" >
                                          <?php 
                                            echo $post_term->name; 
                                            if(next($post_terms)==true) echo " / ";
                                          ?>  
                                        </a>
                                        <?php } ?>
                                      </span>
                                    </div>
                                   <?php } ?>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <span>
                                          <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            <h6><?= get_the_date( 'd F Y', get_the_ID() );?></h6>
                                        </span> 
                                    </div>
                                </div>
                              </div>                                 
                            </div>                                 
                           <?php endwhile;?>
                            </div>
                        </div>
                        <div class="pagin">
                           <nav aria-label="Page navigation card">
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
    </div>
</section>  
<?php get_footer(); ?>