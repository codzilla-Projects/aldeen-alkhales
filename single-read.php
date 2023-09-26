<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
         
            <div class="page_header clearfix">
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
								مكتبة الفوائد
							</a>
						</li>
                        <li >
                            /
				        </li>
                        <li >
                            <?php the_title(); ?>
				        </li>
                        
					</ul>
					<h3><?php the_title(); ?></h3>
				</div>
			</div>
            <div class="page sh_main_inner">
				<div class="page_layout clearfix">
					<div class="row">
						<div class="column column_2_3">
							 <div class="row">
								<div class="post single single-fatwa-page">
									<h1 class="post_title">
										<?php the_title(); ?>
									</h1>
                                    <ul class="videopost_details">
										<li class="category">
                                            <i class="fa fa-archive" aria-hidden="true"></i>
                                            <?php $post_terms = get_the_terms(get_the_ID(),'category');?>
                                                 <?php foreach($post_terms as $post_term){ ?>
                                                 <a href="<?= SH_BlogUrl.'/fawaed-category/'.$post_term->slug; ?>" ><?= $post_term->name; ?>	
                                                 </a>
                                                <?php } ?>
                                         </li>
										<li class="date">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
		                                    <span><?= get_the_date( 'j F Y', get_the_ID() );?></span>
                                        </li>
                                        <li class="author">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                            بواسطة<span><?= get_the_author();?></span>
                                        </li>
									</ul>
									
<!--
								    <blockquote class="page_margin_top">
										هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة
									</blockquote>							
-->
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
									<label>مشاركة على مواقع التواصل الإجتماعى:</label>
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
							<div class="row fawaed_archive">
								<h4 class="sh_read_header">جديد مكتبة الفوائد</h4>
                                    <div class="row row_padding">
                                        <ul class="fawaedblog">
                                             <?php
                                                $items = sh_get_post(3);
                                                if($items->have_posts()) : 
                                                ?>

                                                <?php while($items->have_posts()) : $items->the_post(); ?>
                                                    <li class="fawaedpost">
                                                        <h5>
                                                            <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                                        </h5>
                                                        <ul class="fawaedpost_details">
                                                            <li class="category">
                                                                <i class="fa fa-archive" aria-hidden="true"></i>
                                                                <?php $ha_categories = get_the_category();?>
                                                                <?php foreach($ha_categories as $ha_category){?>
                                                                <a href="<?= SH_BlogUrl.'/fawaed-category/'.$ha_category->slug; ?>" ><?php echo $ha_category->name. ' '; ?></a>
                                                                <?php }?>
                                                            </li>
                                                        </ul>
                                                    </li>
                                               <?php endwhile; ?>
                                                </ul>
                                                </div>
                                                
                                            <?php wp_reset_query(); ?>
                                            <?php endif ?>
                                    </div>


                                </div>

                		<div class="column column_1_3 sidebar-sound">
					       <div class="row">
                                <h4 class="box_header">أكثر الفوائد قراءة<i class="fa fa-file"></i></h4>
                                <ul class="blog small fawaed_sidebar clearfix">
                                    <li class="post fatwapost">
                                            <div class="post_content full-width">
                                                <h6>
                                                    <a href="post.html" title="Study Linking Illnes and Salt Leaves Researchers Doubtful">الاعتقاد الواجب نحو الصحابة رضى الله عنهم</a>
                                                </h6>
                                                <ul class="fatwapost_details">
                                                    <li class="category">
                                                        <i class="fa fa-archive" aria-hidden="true"></i>
                                                        <a href="category_world.html" title="WORLD">تصنيف</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    <li class="post fatwapost">
                                            <div class="post_content full-width">
                                                <h6>
                                                    <a href="post.html" title="Study Linking Illnes and Salt Leaves Researchers Doubtful">الاعتقاد الواجب نحو الصحابة رضى الله عنهم</a>
                                                </h6>
                                                <ul class="fatwapost_details">
                                                    <li class="category">
                                                        <i class="fa fa-archive" aria-hidden="true"></i>
                                                        <a href="category_world.html" title="WORLD">تصنيف</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    <li class="post fatwapost">
                                            <div class="post_content full-width">
                                                <h6>
                                                    <a href="post.html" title="Study Linking Illnes and Salt Leaves Researchers Doubtful">الاعتقاد الواجب نحو الصحابة رضى الله عنهم</a>
                                                </h6>
                                                <ul class="fatwapost_details">
                                                    <li class="category">
                                                        <i class="fa fa-archive" aria-hidden="true"></i>
                                                        <a href="category_world.html" title="WORLD">تصنيف</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    <li class="post fatwapost">
                                            <div class="post_content full-width">
                                                <h6>
                                                    <a href="post.html" title="Study Linking Illnes and Salt Leaves Researchers Doubtful">الاعتقاد الواجب نحو الصحابة رضى الله عنهم</a>
                                                </h6>
                                                <ul class="fatwapost_details">
                                                    <li class="category">
                                                        <i class="fa fa-archive" aria-hidden="true"></i>
                                                        <a href="category_world.html" title="WORLD">تصنيف</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    <li class="post fatwapost">
                                            <div class="post_content full-width">
                                                <h6>
                                                    <a href="post.html" title="Study Linking Illnes and Salt Leaves Researchers Doubtful">الاعتقاد الواجب نحو الصحابة رضى الله عنهم</a>
                                                </h6>
                                                <ul class="fatwapost_details">
                                                    <li class="category">
                                                        <i class="fa fa-archive" aria-hidden="true"></i>
                                                        <a href="category_world.html" title="WORLD">تصنيف</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                </ul>
                                <h4 class="box_header social_header">تابعنا على فيسبوك  <img src="<?= SH_URL; ?>assets/images/fb.png"></h4>
                                <div class="fb-page" data-href="https://www.facebook.com/%D9%81%D9%88%D8%A7%D8%A6%D8%AF-%D8%A7%D9%84%D8%B4%D9%8A%D8%AE-%D9%81%D9%84%D8%A7%D8%AD-%D9%85%D9%86%D8%AF%D9%83%D8%A7%D8%B1-%D8%B1%D8%AD%D9%85%D9%87-%D8%A7%D9%84%D9%84%D9%87-118120126761920" data-tabs="timeline" data-width="330" data-height="350" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" style="height:350px!important;"><blockquote cite="https://www.facebook.com/%D9%81%D9%88%D8%A7%D8%A6%D8%AF-%D8%A7%D9%84%D8%B4%D9%8A%D8%AE-%D9%81%D9%84%D8%A7%D8%AD-%D9%85%D9%86%D8%AF%D9%83%D8%A7%D8%B1-%D8%B1%D8%AD%D9%85%D9%87-%D8%A7%D9%84%D9%84%D9%87-118120126761920" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/%D9%81%D9%88%D8%A7%D8%A6%D8%AF-%D8%A7%D9%84%D8%B4%D9%8A%D8%AE-%D9%81%D9%84%D8%A7%D8%AD-%D9%85%D9%86%D8%AF%D9%83%D8%A7%D8%B1-%D8%B1%D8%AD%D9%85%D9%87-%D8%A7%D9%84%D9%84%D9%87-118120126761920">‎فوائد الشيخ فلاح مندكار رحمه الله‎</a></blockquote></div>

                                <h4 class="box_header social_header">أخر التويتات  <img src="<?= SH_URL; ?>assets/images/tw.png"></h4>
                                <a class="twitter-timeline" href="https://twitter.com/dr_falahmndkar?ref_src=twsrc%5Etfw" data-height="400"></a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </div>
					</div>
				</div>
            </div>
    </div>
        

<?php endwhile; endif;?>

            
 <?php get_footer(); ?>