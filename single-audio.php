<?php 
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $audio_id = get_the_ID(); 
    $post_views = get_post_meta($audio_id,'sh_post_views',true);
    $sh_breadcrumbs = get_post(54);
    $audio_title = get_the_title();
?>
<section id="subpage_top"  class="ha-single-header" style="background-image: url('http://deen.puffermedia.net/wp-content/uploads/2021/03/slider.png');" >
    <div class="overlay">
        <div class="page_header">
            <div class="page">
                <div class="container">
                    <h3><?php echo wp_trim_words( $audio_title ,10, ' ...' ); ?></h3>
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
                              <?php echo wp_trim_words( $audio_title ,5, ' ...' ); ?>
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
                    <div class="department bg-white col-md-12">
                    	<div class="post single audio-single-page">
                    <h4 class="post_title">
                        <?php the_title(); ?>
                    </h4>
                    <ul dir="rtl" class="bread_crumb list-unstyled float-right">
                        <li class="category">
                            <i class="fa fa-archive" aria-hidden="true"></i>
                            <?php $post_terms = get_the_terms($audio_id,'audio_cat');?>
                                 <?php foreach($post_terms as $post_term){ ?>
                                 <a href="<?= SH_BlogUrl.'/audio-category/'.$post_term->slug; ?>" >
                                  <?php 
                                    echo $post_term->name; 
                                    if(next($post_terms)==true) echo " / ";
                                  ?>  
 
                                 </a>
                                <?php } ?>
                         </li>
                        <li class="date">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <span><?= get_the_date( 'j F Y', $audio_id );?></span>
                        </li>
                        <li class="views">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            <span><?= $post_views; ?> زائر</span>
                        </li>
                        <li class="download">
                            
                            <a class="more active  sounddownload" href="<?= get_post_meta($audio_id , 'sh_audio_link',true); ?>" download="<?php the_title(); ?>">تحميل  الملف الصوتى <i class="fa fa-arrow-down" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                    <p class="margin_top_15">
                        
                    <?php the_content();?>
                    <br>
                    <audio controls>
                      <source src="<?= get_post_meta($audio_id , 'sh_audio_link',true); ?>" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                    </p>
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
                      <div class="department_one col-md-12">
                        <?php 
                             $audios = sh_get_audio(3);
                            if($audios->have_posts()) : 
                        ?>
                        <div class="description">
                            <h3>جديد مكتبة الصوتيات </h3>
                            <div class="row row_padding">
                                <ul class="">
                                    <?php while($audios->have_posts()) : $audios->the_post(); 
                                        $audio_title = get_the_title();
                                    ?>
                                    <li class="cat">
                                        <h5>
                                         <a href="<?php the_permalink(); ?>" title="<?= $audio_title; ?>"><?php echo wp_trim_words( $audio_title ,10, ' ...' ); ?><i class="fa fa-play-circle-o"></i></a>
                                        </h5>
                                        <ul class="">
                                           <li class="post">
                                                <?php $post_terms = get_the_terms(get_the_ID(),'audio_cat');?>
                                                <?php foreach($post_terms as $post_term){ ?>
                                                <a href="<?= SH_BlogUrl.'/audio-category/'.$post_term->slug; ?>" >
                                              <?php 
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
                    <?php wp_reset_query(); ?>
                    <?php endif ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="department  col-md-12 sidebar">
                        <?php
                           $audios = sh_most_viewed_audio(4);
                           if($audios->have_posts()) : 
                        ?>
                        <h3>
                           أكثر  الصوتيات استماعا
                            <i class="fa fa-volume-up" aria-hidden="true"></i>
                        </h3>
                        <ul class="list-group">             
                            <?php while($audios->have_posts()) : $audios->the_post(); 
                                $audio_title = get_the_title();
                            ?>
                            <li class="list-group-item">
                                <div class="post_content">
                                    <h5>
                                     <a href="<?php the_permalink();?>" title="<?= $audio_title; ?>"><?php echo wp_trim_words( $audio_title ,5, ' ...' ); ?></a>
                                    </h5>
                                    <ul>
                                        <li>
                                            <?php $post_terms = get_the_terms(get_the_ID(),'audio_cat');?>
                                            <?php foreach($post_terms as $post_term){ ?>
                                            <i class="fa fa-archive" aria-hidden="true"></i>
                                            <a href="<?= SH_BlogUrl.'/audio-category/'.$post_term->slug; ?>" ><?= $post_term->name; ?>  
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
<?php update_post_meta($audio_id,'sh_post_views',++$post_views);?> 
<?php endwhile; endif;?>
<?php get_footer(); ?>