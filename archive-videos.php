<?php 
/**
** Template Name: Video library Template
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
<section dir="rtl" id="videos">
    <div class="container-fluid p-0 m-0" data-aos="fade-up">
        <div class="container">
            <div class="row row_padding">
                <div class="col-md-8">
                    <div class="department col-md-12">
                        <h3>
                            أقسام  مكتبة المرئيات 
                        </h3>
                        <nav aria-label="breadcrumb ">
                            <ul dir="rtl" class="breadcrumb ha_category_list">
                                <?php $terms = get_terms( array('taxonomy' => 'videos','hide_empty' => false,) ); ?>
                                        <?php foreach ($terms as $term) { ?>
                                <li class="breadcrumb-item">
                                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                                    <a href="<?= SH_BlogUrl.'/video_cat/'.$term->slug; ?>" title="<?= $term->name;?>"><?php echo $term->name; ?></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </nav>
                      </div>
                      <div class="department_one col-md-12">
                        <div class="description">
                            <h3>جديد  مكتبة المرئيات </h3>
                            <div class="row row_padding p-0 mt-3 mr-0 ml-0">
                                <?php
                                  $videos = sh_get_videos_inner(10);
                                  if($videos->have_posts()) : 
                                ?>
                            <?php while($videos->have_posts()) : $videos->the_post(); 
                                  $video_title = get_the_title(); ?>
                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3 single_video">
                              <a href="<?php the_permalink(); ?>">
                                <i class="fa fa-play" aria-hidden="true"></i>
                                <img src="<?php the_post_thumbnail_url('full'); ?>" class="img-fluid" alt="<?php the_title();?>">
                              </a>
                              <div class="video_content">    

                                <div class="row">
                                  <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h4><a href="<?php the_permalink();?>" title="<?= $video_title; ?>"><?php echo wp_trim_words( $video_title ,15, ' ...' );?></a></h4>
                                  </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                      <span>
                                        
                                        <i class="fa fa-tag" aria-hidden="true"></i>
                                        <?php $post_terms = get_the_terms(get_the_ID(),'videos');?>
                                        <?php foreach($post_terms as $post_term){ ?>
                                        <a href="<?= SH_BlogUrl.'/video_cat/'.$post_term->slug; ?>" >
                                          <?php 
                                            echo $post_term->name; 
                                            if(next($post_terms)==true) echo " / ";
                                          ?>  
                                        </a>
                                        <?php } ?>
                                      </span>
                                    </div>
                                   
                                    <div class="col-lg-12 col-md-12 col-sm-12">
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
                                   'total'              => $videos->max_num_pages,
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
                    </div>
                    <?php wp_reset_query(); ?>
                    <?php endif ?>
                </div>
                <div class="col-md-4">
                    <div class="department col-md-12 sidebar">
                        <h3>
                           أكثر المرئيات مشاهدة 
                            <i class="fa fa-youtube-play" aria-hidden="true"></i>
                        </h3>
                            <?php
                               $mostvideos = sh_most_viewed_video(4);
                               if($mostvideos->have_posts()) : 
                            ?>  
                        <ul class="list-group"> 
                            <?php while($mostvideos->have_posts()) : $mostvideos->the_post(); 
                              $video_title = get_the_title();
                            ?>
                            <li class="list-group-item">
                                <div class="post_content">
                                    <h5>
                                       <a href="<?php the_permalink();?>" title="<?= $video_title; ?>"><?php echo wp_trim_words( $video_title ,5, ' ...' );?></a>
                                    </h5>
                                    <ul>
                                        <li>
                                            <?php $post_terms = get_the_terms(get_the_ID(),'videos');?>
                                                <i class="fa fa-archive" aria-hidden="true"></i>
                                                <?php foreach($post_terms as $post_term){ ?>
                                                <a href="<?= SH_BlogUrl.'/video_cat/'.$post_term->slug; ?>" >
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
<!-- ==================================== -->
<?php get_footer(); ?>