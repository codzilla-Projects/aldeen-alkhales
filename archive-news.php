<?php 
/**
** Template Name: News library Template
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
<section dir="rtl" id="audio">
    <div class="container-fluid p-0 m-0" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                      <div class="department_one margin_top_100 col-md-12">
                    	<?php 
							$news = sh_get_news_inner(3);
							if($news->have_posts()) : 
                        ?>
                        <div class="description">
                            <h3>الاخبار الجديدة </h3>
                            <div class="row row_padding">
                                <ul class="">
            						<?php	while($news->have_posts()) : $news->the_post(); ?>
                                    <li class="cat">
	                                    <h5>
	                                       <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(),10, ' ...' );?><i class="fa fa-newspaper-o"></i></a>
	                                    </h5>
                                        <ul class="news_data">
                                            <li class="date">
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                <span><?= get_the_date( 'j F Y', get_the_ID() );?></span>
                                            </li>
                                        </ul>
                                	</li>

                                    <?php endwhile; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="pagin">
                         <nav aria-label="Page navigation new">
                         	<?php    
					        	$args = array(
					               'format'             => '?paged=%#%',
					               'current'            => max( 1, get_query_var('paged') ),
					               'total'              => $news->max_num_pages,
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
                    <?php wp_reset_query(); ?>
                    <?php endif ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="department col-md-12 sidebar">
                        <h3>
                         أكثر الاخبار قراءة
                            <i class="fa fa-book" aria-hidden="true"></i>
                        </h3>
                        <?php
                            $mostnews = sh_most_viewed_news(5);
                            if($mostnews->have_posts()) : 
                            ?>
                        <ul class="list-group">
                                     
                                <?php while($mostnews->have_posts()) : $mostnews->the_post(); ?>
                            <li class="list-group-item">
                                <div class="post_content">
                                    <h5>
                                       <a href="<?php the_permalink();?>"><?php echo wp_trim_words( get_the_title(),5, ' ...' );?></a>
                                    </h5>
                                </div>
                            </li>                            
                        <?php endwhile; ?>
                        </ul>
                        <?php endif ?> 
                        <?php wp_reset_query(); ?>
                         
                        <?php get_sidebar(); ?>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>     
<!-- ==================================== -->
<?php get_footer(); ?>