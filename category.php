<?php 
get_header(); 
$sh_breadcrumbs = get_post(47);
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
                            $category = get_category( get_query_var( 'cat' ) );
                            $cat_id = $category->cat_ID;
                            $fawaeds = sh_get_fawaed_with_tax(1,$cat_id);
                            if($fawaeds->have_posts()) :
                         ?>
                        <div class="description">
                            <h3>جديد <?= single_cat_title(); ?></h3>
                            <div class="row row_padding">
                                <ul class="">
                                <?php 
                                    while($fawaeds->have_posts()) : $fawaeds->the_post(); 
                                    $fawaed_title = get_the_title();
                                ?>
                                     <li class="cat">
                                        <h5>
                                         <a href="<?php the_permalink(); ?>" title="<?= $fawaed_title; ?>"><?php echo wp_trim_words( $fawaed_title, 10, ' ...' );?><i class="fa fa-book"></i></a>
                                        </h5>
                                        <ul class="">
                                            <li class="post">
                                                   <?php $categories = get_the_category();?>
                                                <?php foreach($categories as $category){?>
                                                    <a href="<?= SH_BlogUrl.'/category/'.$category->slug; ?>" >
                                                    <?php 
                                                    echo $category->name; 
                                                    if(next($categories)==true) echo " / ";
                                                    ?>
                                                </a> 
                                                 <?php }?>
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
                                       'format'             => 'page/%#%',
                                       'current'            => max( 1, get_query_var('paged') ),
                                       'total'              => $fawaeds->max_num_pages,
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
                            $fawaedsmost = sh_most_viewed_fawaed(3);
                            if($fawaedsmost->have_posts()) : 
                        ?>
                        <h3>
                            أكثر المقالات قراءة
                            <i class="fa fa-volume-up" aria-hidden="true"></i>
                        </h3>
                        <ul class="list-group">
                            <?php while($fawaedsmost->have_posts()) : $fawaedsmost->the_post(); 
                             $fawaed_title = get_the_title();?>
                            <li class="list-group-item">
                                <div class="post_content">
                                    <h5>
                                       <a href="<?php the_permalink(); ?>" title="<?= $fawaed_title; ?>"><?php echo wp_trim_words( $fawaed_title, 5, ' ...' );?></a>
                                    </h5>
                                    <ul>
                                        <li>
                                            <i class="fa fa-archive" aria-hidden="true"></i>
                                            <?php $post_terms = get_the_terms(get_the_ID(),'video_cat');?>
                                                <?php foreach($post_terms as $post_term){ ?>
                                                <a href="<?= SH_BlogUrl.'/video-category/'.$post_term->slug; ?>" >
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