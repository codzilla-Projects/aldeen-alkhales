<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $new_id = get_the_ID(); 
    $post_views = get_post_meta($new_id,'sh_post_views',true);
?>           
            <div class="page_header ha-single-header clearfix">
                <div class="page">
                    <ul class="bread_crumb">
                        <li>
                            <a title="الرئيسية" href="<?php bloginfo('url'); ?>">
                                 الرئيسية
                            </a>
                        </li>
                        <li >
                            /
                        </li>
                        <li >
                            <a title="الرئيسية" href="<?php bloginfo('url'); ?>/المكتبة-المقروءة/">
                                مكتبة البطاقات 
                            </a>
                        </li>
                        <li >
                            /
                        </li>
                        <li >
                            <?= $title_trimmed; ?>
                        </li>
                        
                    </ul>
                    <h3><?php echo wp_trim_words( get_the_title(),8, ' ...' );?></h3>
                </div>
            </div>
            <div class="page sh_main_inner ha_page_inner">
                <div class="page_layout clearfix">
                    <div class="row">
                        <div class="column column_2_3">
                             <div class="row">
                                <div class="post single single-page single-news-page single-new-page">
                                    <h1 class="post_title">
                                        <?php the_title(); ?>
                                    </h1>
                                    <ul class="singlepost_details">
                                        <li class="date">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            <span><?= get_the_date( 'j F Y', get_the_ID() );?></span>
                                        </li>
                                        <li class="views">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                            <span><?= $post_views; ?> زائر</span>
                                        </li>
                                    </ul>
                                    
                                    <div class="post_content  clearfix">
                                        <div class="content_box">
                                            
                                            <div class="text">
                                                <?php the_content();?>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="row page_margin_top">
                                <div class="share_box clearfix">
                                    <label>مشاركة على مواقع التواصل الإجتماعى :</label>
                                       <ul class="social_icons ha-social-single clearfix">
                                                    <?php 
                                                    $image= urlencode("https://falahmndkar.puffermedia.net/wp-content/themes/falah/assets/images/logo-dark.png"); 
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

                        <div class="column column_1_3 sidebar-sound sidebar-ticker">
                           <div class="row">
                              
                                <h4 class="box_header social_header margin_top_0">تابعنا على فيسبوك  <img src="<?= SH_URL; ?>assets/images/fb.png"></h4>
                                <div class="fb-page" data-href="https://www.facebook.com/%D9%81%D9%88%D8%A7%D8%A6%D8%AF-%D8%A7%D9%84%D8%B4%D9%8A%D8%AE-%D9%81%D9%84%D8%A7%D8%AD-%D9%85%D9%86%D8%AF%D9%83%D8%A7%D8%B1-%D8%B1%D8%AD%D9%85%D9%87-%D8%A7%D9%84%D9%84%D9%87-118120126761920" data-tabs="timeline" data-width="330" data-height="350" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" style="height:350px!important;"><blockquote cite="https://www.facebook.com/%D9%81%D9%88%D8%A7%D8%A6%D8%AF-%D8%A7%D9%84%D8%B4%D9%8A%D8%AE-%D9%81%D9%84%D8%A7%D8%AD-%D9%85%D9%86%D8%AF%D9%83%D8%A7%D8%B1-%D8%B1%D8%AD%D9%85%D9%87-%D8%A7%D9%84%D9%84%D9%87-118120126761920" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/%D9%81%D9%88%D8%A7%D8%A6%D8%AF-%D8%A7%D9%84%D8%B4%D9%8A%D8%AE-%D9%81%D9%84%D8%A7%D8%AD-%D9%85%D9%86%D8%AF%D9%83%D8%A7%D8%B1-%D8%B1%D8%AD%D9%85%D9%87-%D8%A7%D9%84%D9%84%D9%87-118120126761920">‎فوائد الشيخ فلاح مندكار رحمه الله‎</a></blockquote></div>

                                <h4 class="box_header social_header">أخر التويتات  <img src="<?= SH_URL; ?>assets/images/tw.png"></h4>
                                <a class="twitter-timeline" href="https://twitter.com/dr_falahmndkar?ref_src=twsrc%5Etfw" data-height="400"></a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </div>
                    </div>
                </div>
            </div>
    </div>
        
<?php update_post_meta($new_id,'sh_post_views',++$post_views);?> 

<?php endwhile; endif;?>

            
 <?php get_footer(); ?>