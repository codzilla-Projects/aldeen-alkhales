<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $book_id = get_the_ID(); 
    $post_views = get_post_meta($book_id,'sh_post_views',true);
    $sh_breadcrumbs = get_post(59);
    $book_title = get_the_title();
?>           
<section id="subpage_top" class="ha-single-header"  style="background-image: url('http://deen.puffermedia.net/wp-content/uploads/2021/03/slider.png');" >
    <div class="overlay">
        <div class="page_header">
            <div class="page">
                <div class="container">
                    <h3><?php echo wp_trim_words( $book_title ,10, ' ...' ); ?></h3>
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
                            <?php echo wp_trim_words( $book_title ,5, ' ...' ); ?>
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
                        <div class="post single audio-single-page">
                            <h4 class="post_title">
								<?php the_title(); ?>
							</h4>
                            <ul dir="rtl" class="bread_crumb list-unstyled float-right">
                                <li class="category">
                                    <i class="fa fa-archive" aria-hidden="true"></i>
                                    <?php $post_terms = get_the_terms($book_id,'book_cat');?>
                                         <?php foreach($post_terms as $post_term){ ?>
                                         <a href="<?= SH_BlogUrl.'/book-category/'.$post_term->slug; ?>" ><?php 
                                            echo $post_term->name; 
                                            if(next($post_terms)==true) echo " / ";
                                        ?>
                                         </a>
                                        <?php } ?>
                                 </li>
                                <li class="date">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <span><?= get_the_date( 'j F Y', $book_id );?></span>
                                </li>
                                <li class="views">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    <span><?= $post_views; ?> زائر</span>
                                </li>
                                <li class="download">  
                                    <a class="more active  sounddownload" href="<?= get_post_meta($book_id , 'sh_book_link',true); ?>" download="<?php the_title(); ?>">تحميل  الكتاب <i class="fa fa-arrow-down" aria-hidden="true"></i></a>
                                </li>
                            </ul>
							
							<div class="sh_single_content">
								<?php the_content();?>
                                <br>
                            </div>
						</div>
					</div>
                    <div class="page_margin">
                        <div class="share_box clearfix">
                            <ul class="bread_crumb list-unstyled">
                                <li><label>مشاركة على مواقع التواصل الإجتماعى :</label></li>
                                <?php 
                                    $image= urlencode(get_option('sh_logo_img')); 
                                    $title = urlencode(get_the_title());
                                    $link = urlencode(get_the_permalink());
                                ?>
                                <li>
                                    <a onClick="window.open('https://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title; ?>&amp;p[url]=<?php echo $link; ?>&amp;&p[image][0]=<?php echo $image ?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)">
                                        <i class="fa fa-facebook-square" aria-hidden="true"></i>
                                    </a>
                                </li>
                               
                                <li>
                                    <a target="_parent" href="https://twitter.com/intent/tweet?text=<?php echo $title; ?>&url=<?php echo $link;?>">
                                        <i class="fa fa-twitter-square" aria-hidden="true"></i>
                                    </a>
                                </li>
                              
                                <li>
                                    <a target="_parent" href="https://t.me/share/url?url=<?php echo $link; ?>&text=<?php echo $title; ?>" title="telegram">
                                        <i class="fa fa-telegram" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>					
                <div class="col-md-4">
                    <div class="department  col-md-12 sidebar">
                        <?php
                            $books = sh_most_viewed_book(4);
                            if($books->have_posts()) : 
                        ?>
                        <h3>
                           أكثر الكتب قراءة 
                            <i class="fa fa-book" aria-hidden="true"></i>
                        </h3>
                        <ul class="list-group">
                            
                            <?php while($books->have_posts()) : $books->the_post();  
                                $book_title = get_the_title();?>
                            <li class="list-group-item">
                                <div class="post_content">
                                    <h5>
                                     <a href="<?php the_permalink();?>" title="<?= $book_title; ?>"><?php echo wp_trim_words( $book_title ,5, ' ...' ); ?></a>
                                    </h5>
                                    <ul>
                                        <li>
                                            <?php $post_terms = get_the_terms(get_the_ID(),'book_cat');?>
                                            <?php foreach($post_terms as $post_term){ ?>
                                                <i class="fa fa-archive" aria-hidden="true"></i>
                                                <a href="<?= SH_BlogUrl.'/book-category/'.$post_term->slug; ?>" ><?php 
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
        
<?php update_post_meta($book_id,'sh_post_views',++$post_views); ?> 

<?php endwhile; endif;?>

            
 <?php get_footer(); ?>