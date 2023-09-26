<?php get_header(); ?>
   <section id="subpage_top" class="ha-single-header" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');" >
    <div class="overlay">
        <div class="page_header">
            <div class="page">
                <div class="container">
                   <h3>نتائج البحث عن :  <?php echo $_GET['s']; ?></h3>
                    <ul class="bread_crumb list-unstyled">
                        <li>
                            <a title="الرئيسية" href="<?php bloginfo('url'); ?>">
                                الرئيسية
                            </a>
                        </li>
                        <li >
                            /
                        </li>
                        <li >
                            نتائج البحث عن :  <?php echo $_GET['s']; ?>
                        </li>         
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section dir="rtl" class="audio" id="audio">
    <div class="container-fluid p-0 m-0" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="audio_h3">نتائج البحث عن :  <?php echo $_GET['s']; ?></h3>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <div class="department_one col-md-12">
                        <div class="description">                            
                            <div class="row row_padding">
                                <ul class="">
                                    
                                    <li class="fawaedpost">
                                        <h5>
                                            <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                        </h5>
                                          
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
                                       'total'              => $wp_query->max_num_pages,
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
                    <?php else: echo "
                                    <div class='department_one col-md-12'>
                                        <div class='description'>                            
                                            <div class='row row_padding'>
                                                <ul class=''>
                                                    <li class='fawaedpost'>
                                                        <h5>لا توجد بيانات للبحث </h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    "; ?>
                    <?php wp_reset_query(); ?>
                        <?php endif ?>
                </div>
                
                <div class="col-md-4">
                    <div class="department col-md-12 sidebar">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>