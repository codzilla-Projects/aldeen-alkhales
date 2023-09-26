<?php
/**
** Template Name: Book Library Template
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
                    <?php
                      $book = sh_get_book_inner(3);
                      if($book->have_posts()) : 
                    ?>
                      <div class="department_one margin_top_100 col-md-12">
                        <div class="description">
                            <h3>جديد  الكتب </h3>
                            <div class="row row_padding p-0 mt-3 mr-0 ml-0">
                                
                                <?php while($book->have_posts()) : $book->the_post(); 
                                  $book_title = get_the_title();
                                ?>
                            <div class="col-lg-4 col-md-4 col-sm-6 mb-3 single_video single_book">
                              <a href="<?php the_permalink(); ?>">
                                <img src="<?php the_post_thumbnail_url('full'); ?>" class="img-fluid" alt="<?php the_title();?>">
                              </a>
                              <div class="video_content sh_single_book">   

                                <div class="row">
                                  <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h4><a href="<?php the_permalink();?>" title="<?= $book_title; ?>"><?php echo wp_trim_words( $book_title ,8, ' ...' );?></a></h4>
                                  </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                      <span>
                                        
                                        <i class="fa fa-tag" aria-hidden="true"></i>
                                        <?php $post_terms = get_the_terms(get_the_ID(),'book_cat');?>
                                        <?php foreach($post_terms as $post_term){ ?>
                                        <a href="<?= SH_BlogUrl.'/book-category/'.$post_term->slug; ?>" >
                                        <?php 
                                            echo $post_term->name; 
                                            if(next($post_terms)==true) echo " / ";
                                        ?>  
                                        </a>
                                        <?php } ?>
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
                                   'total'              => $book->max_num_pages,
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
                    <?php wp_reset_query(); ?>
                    <?php endif ?>
                </div>
                <div class="col-md-4">
                    <div class="department col-md-12 sidebar">
                        <h3>
                           أكثر الكتب قراءة
                            <i class="fa fa-book" aria-hidden="true"></i>
                        </h3>
                        <ul class="list-group">
                            <?php
                               $mostbooks = sh_most_viewed_book(5);
                               if($mostbooks->have_posts()) : 
                                ?>         
                                <?php while($mostbooks->have_posts()) : $mostbooks->the_post(); ?>
                            <li class="list-group-item">
                                <div class="post_content">
                                    <h5>
                                       <a href="<?php the_permalink();?>"><?php echo wp_trim_words( get_the_title(),5, ' ...' );?></a>
                                    </h5>
                                    <ul>
                                        <li>
                                          <?php $post_terms = get_the_terms(get_the_ID(),'book_cat');?>
                                              <?php foreach($post_terms as $post_term){ ?>
                                                  <i class="fa fa-archive" aria-hidden="true"></i>
                                                  <a href="<?= SH_BlogUrl.'/book-category/'.$post_term->slug; ?>" >
                                                  <?php 
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
<?php get_footer(); ?>