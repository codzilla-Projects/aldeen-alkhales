<?php
/**
** Template Name: Article Library Template
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
                    <div class="department col-md-12">
                        <h3>
                            أقسام  مكتبة المقالات
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ul dir="rtl" class="breadcrumb">
                               <?php $categories = get_categories( array('taxonomy'   => 'category','hide_empty' => 1) );?>
                                        
                                <?php foreach($categories as $category){?>
                                    <li class="breadcrumb-item">
                                        <i class="fa fa-folder-open" aria-hidden="true"></i>
                                        <a href="<?= SH_BlogUrl.'/category/'.$category->slug; ?>" ><?php echo $category->name. ' '; ?></a>
                                    </li>
                                            
                                <?php } ?>
                            </ul>
                        </nav>
                      </div>
                      <div class="department_one col-md-12">
                        <div class="description">
                            <h3>جديد  مكتبة المقالات </h3>
                            <div class="row row_padding">
                                <?php
                                    $posts = sh_get_post_inner(3);
                                    if($posts->have_posts()) : 
                                ?>
                                <ul class="">
                                    <?php while($posts->have_posts()) : $posts->the_post();
                                        $fawead_title = get_the_title();
                                     ?>
                                    <li class="cat">
                                        <h5>
                                          <a href="<?php the_permalink(); ?>" title="<?= $fawead_title; ?>"><?php echo wp_trim_words( $fawead_title ,10, ' ...' );?><i class="fa fa-book"></i></a>
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
                            <nav aria-label="Page navigation fawaed">
                                <?php    
                                    $args = array(
                                       'format'             => '?paged=%#%',
                                       'current'            => max( 1, get_query_var('paged') ),
                                       'total'              => $posts->max_num_pages,
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
                        <h3>
                           أكثر المقالات قراءة
                            <i class="fa fa-book" aria-hidden="true"></i>
                        </h3>
                        <ul class="list-group">
                            <?php
                               $mostfawaed = sh_get_post(5);
                               if($mostfawaed->have_posts()) : 
                            ?>         
                            <?php while($mostfawaed->have_posts()) : $mostfawaed->the_post();
                            $fawead_title = get_the_title(); ?>
                            <li class="list-group-item">
                                <div class="post_content">
                                    <h5>
                                       <a href="<?php the_permalink(); ?>" title="<?= $fawead_title; ?>"><?php echo wp_trim_words( $fawead_title ,5, ' ...' );?></a>
                                    </h5>
                                    <ul>
                                        <li>
                                            
                                            <?php $post_terms = get_the_terms(get_the_ID(),'category');?>
                                                <i class="fa fa-archive" aria-hidden="true"></i>
                                                <?php foreach($post_terms as $post_term){ ?>
                                                <a href="<?= SH_BlogUrl.'/category/'.$post_term->slug; ?>" >
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