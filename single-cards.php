<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $card_id = get_the_ID(); 
    $post_views = get_post_meta($card_id,'sh_post_views',true);
    $sh_breadcrumbs = get_post(80);
    $card_title = get_the_title();
?>           
<section id="subpage_top" class="ha-single-header" style="background-image: url('http://deen.puffermedia.net/wp-content/uploads/2021/03/slider.png');" >
    <div class="overlay">
        <div class="page_header">
            <div class="page">
                <div class="container">
                    <h3><?php echo wp_trim_words( $card_title ,10, ' ...' ); ?></h3>
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
                         <a href="<?= $sh_breadcrumbs->guid; ?>">
                                <?= $sh_breadcrumbs->post_title; ?>
                        </a>
                         </li>
                         <li>
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                        </li>  
                         <li>
                              <?php echo wp_trim_words( $card_title ,5, ' ...' ); ?>
                         </li>        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section dir="rtl" class="ha-cards-single" id="audio">
    <div class="container-fluid p-0 m-0" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="department col-md-12">
                        <div class="post single audio-single-page">
                        <h4 class="post_title">
                            <?php the_title(); ?>
                        </h4>
                        <ul dir="rtl" class="bread_crumb list-unstyled float-right">
                            <?php $post_terms = get_the_terms($card_id,'card_cat');
                            if(!empty($post_terms)){?>
                            <li class="category">
                                <i class="fa fa-archive" aria-hidden="true"></i>
                                 <?php foreach($post_terms as $post_term){ ?>
                                 <a href="<?= SH_BlogUrl.'/card-category/'.$post_term->slug; ?>" ><?= $post_term->name; ?>	
                                 </a>
                                <?php } ?>
                             </li>
                            <?php } ?>
                            <li class="date">
                                <i class="fa fa-archive" aria-hidden="true"></i>
                                    <span><?= get_the_date( 'j F Y', $card_id );?></span>
                                </li>
                                <li class="views">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    <span><?= $post_views; ?> زائر</span>
                                </li>
                                <li class="download">
                            
                                    <a class="more active " href="<?php the_post_thumbnail_url(); ?>" download="<?php the_title(); ?>">تحميل  البطاقة <i class="fa fa-arrow-down" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                            <div class="sh_single_content"> 
                                <img class="ha_single_card_img" src='<?php the_post_thumbnail_url();  ?>' alt='img'>
                                <?php the_content();?>
                            </div>
                        </div>
                    </div>
                </div>

    		    <div class="col-md-4">
                    <div class="department  col-md-12 sidebar">
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
        
<?php update_post_meta($card_id,'sh_post_views',++$post_views);?> 
<?php endwhile; endif;?>
<?php get_footer(); ?>