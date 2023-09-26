<?php 
function sh_get_cards($no){
    $args = array(
        'post_type'       => 'cards',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'orderby'         => 'date',
        'order'           => 'DESC'
    );
    return $posts = get_posts( $args );    
}
function sh_get_cards_inner($no){
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $args = array(
        'post_type'       => 'cards',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'paged'           =>  $paged,
        'orderby'         => 'date',
        'order'           => 'DESC'
    );
    return $posts = new WP_Query( $args );    
}
function sh_most_viewed_card($no){
    $args = array(
        'post_type'       => 'cards',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'orderby'         => 'meta_value_num',
        'meta_key'        => 'sh_post_views',
        'order'           => 'DESC',
    );
    return $posts = new WP_Query( $args );    
}
function sh_get_card_with_tax($no,$term_id){
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
        'post_type'       => 'cards',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'paged'           => $paged,
        'orderby'         => 'date',
        'order'           => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'card_cat',
                'field' => 'term_id',
                'terms' => $term_id,
            ),
        ),
    );
    return $posts = new WP_Query( $args );    
}
/*===========================================================*/
function sh_get_news($no){
    $args = array(
        'post_type'       => 'news',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'orderby'         => 'date',
        'order'           => 'DESC'
    );
    return $posts = new WP_Query( $args );    
}
/*===========================================================*/
function sh_get_news_inner($no){
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $args = array(
        'post_type'       => 'news',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'paged'           =>  $paged,
        'orderby'         => 'date',
        'order'           => 'DESC'
    );
    return $posts = new WP_Query( $args );    
}

function sh_most_viewed_news($no){
    $args = array(
        'post_type'       => 'news',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'orderby'         => 'meta_value_num',
        'meta_key'        => 'sh_post_views',
        'order'           => 'DESC',
    );
    return $posts = new WP_Query( $args );    
}

/*===========================================================*/
function sh_get_site_directory($no){
    $args = array(
        'post_type'       => 'sites-directory',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'orderby'         => 'date',
        'meta_key'        => 'ha_site_link',
        'order'           => 'DESC'
    );
    return $posts = new WP_Query( $args );    
}
function sh_get_site_directory_inner($no){
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $args = array(
        'post_type'       => 'sites-directory',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'paged'           =>  $paged,
        'orderby'         => 'date',
        'meta_key'        => 'ha_site_link',
        'order'           => 'ASC'
    );
    return $posts = new WP_Query( $args );    
}
/*===========================================================*/
function sh_get_book($no){
    $args = array(
        'post_type'       => 'book',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'orderby'         => 'date',
        'order'           => 'DESC'
    );
    return $posts = new WP_Query( $args );    
}

function sh_get_book_inner($no){
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $args = array(
        'post_type'       => 'book',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'paged'           =>  $paged,
        'orderby'         => 'date',
        'order'           => 'DESC'
    );
    return $posts = new WP_Query( $args );    
}

function sh_get_book_with_tax($no,$term_id){
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
        'post_type'       => 'book',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'paged'           => $paged,
        'orderby'         => 'date',
        'order'           => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'book_cat',
                'field' => 'term_id',
                'terms' => $term_id,
            ),
        ),
    );
    return $posts = new WP_Query( $args );    
}
function sh_most_viewed_book($no){
    $args = array(
        'post_type'       => 'book',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'orderby'         => 'meta_value_num',
        'meta_key'        => 'sh_post_views',
        'order'           => 'DESC',
    );
    return $posts = new WP_Query( $args );    
}
/*===========================================================*/
function sh_get_videos($no){
    $args = array(
        'post_type'       => 'video',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'orderby'         => 'date',
        'order'           => 'DESC'
    );
    return $posts = new WP_Query( $args );    
}
function sh_get_videos_inner($no){
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $args = array(
        'post_type'       => 'video',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'paged'           =>  $paged,
        'orderby'         => 'date',
        'order'           => 'DESC'
    );
    return $posts = new WP_Query( $args );    
}
function sh_get_video_with_tax($no,$term_id){
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
        'post_type'       => 'video',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'paged'           => $paged,
        'orderby'         => 'date',
        'order'           => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'videos',
                'field' => 'term_id',
                'terms' => $term_id,
            ),
        ),
    );
    return $posts = new WP_Query( $args );    
}

function sh_most_viewed_video($no){
    $args = array(
        'post_type'       => 'video',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'orderby'         => 'meta_value_num',
        'meta_key'        => 'sh_post_views',
        'order'           => 'DESC',
    );
    return $posts = new WP_Query( $args );    
}
/*===========================================================*/
function sh_get_audio($no){
    $args = array(
        'post_type'       => 'audio',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'orderby'         => 'date',
        'order'           => 'DESC'
    );
    return $posts = new WP_Query( $args );    
}

function sh_get_audio_inner($no){
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $args = array(
        'post_type'       => 'audio',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'paged'           => $paged,
        'orderby'         => 'date',
        'order'           => 'DESC'
    );
    return $posts = new WP_Query( $args );    
}
function sh_get_audio_with_tax($no,$term_id){
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
        'post_type'       => 'audio',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'paged'           => $paged,
        'orderby'         => 'date',
        'order'           => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'audio_cat',
                'field' => 'term_id',
                'terms' => $term_id,
            ),
        ),
    );
    return $posts = new WP_Query( $args );    
}
function sh_most_viewed_audio($no){
    $args = array(
        'post_type'       => 'audio',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'orderby'         => 'meta_value_num',
        'meta_key'        => 'sh_post_views',
        'order'           => 'DESC',
    );
    return $posts = new WP_Query( $args );    
}
/*===========================================================*/
function sh_get_fatwa($no){
    $args = array(
        'post_type'       => 'fatwa',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'orderby'         => 'date',
        'order'           => 'DESC'
    );
    return $posts = new WP_Query( $args );    
}
function sh_get_fatwa_inner($no){
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
        'post_type'       => 'fatwa',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'paged'           => $paged,
        'orderby'         => 'date',
        'order'           => 'DESC'
    );
    return $posts = new WP_Query( $args );    
}
function sh_get_fatwa_with_tax($no,$term_id){
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
        'post_type'       => 'fatwa',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'paged'           => $paged,
        'orderby'         => 'date',
        'order'           => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'fatwa_cat',
                'field' => 'term_id',
                'terms' => $term_id,
            ),
        ),
    );
    return $posts = new WP_Query( $args );    
}
function sh_most_viewed_fatwa($no){
    $args = array(
        'post_type'       => 'fatwa',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'orderby'         => 'meta_value_num',
        'meta_key'        => 'sh_post_views',
        'order'           => 'DESC',
    );
    return $posts = new WP_Query( $args );    
}
/*===========================================================*/
function sh_get_slides($no){
    $args = array(
        'post_type'       => 'home-slide',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'orderby'         => 'date',
        'order'           => 'DESC'
    );
    return $posts = new WP_Query( $args );    
}
/*===========================================================*/
function sh_get_post($no){
    $args = array(
        'post_type'       => 'post',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'orderby'         => 'date',
        'order'           => 'DESC'
    );
    return $posts = new WP_Query( $args );    
}
function sh_get_post_inner($no){
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
        'post_type'       => 'post',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'paged'           => $paged,
        'orderby'         => 'date',
        'order'           => 'DESC'
    );
    return $posts = new WP_Query( $args );    
}
function sh_get_fawaed_with_tax($no,$term_id){
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
        'post_type'       => 'post',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'paged'           => $paged,
        'orderby'         => 'date',
        'order'           => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $term_id,
            ),
        ),
    );
    return $posts = new WP_Query( $args );    
}
function sh_most_viewed_fawaed($no){
    $args = array(
        'post_type'       => 'post',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'orderby'         => 'meta_value_num',
        'meta_key'        => 'sh_post_views',
        'order'           => 'DESC',
    );
    return $posts = new WP_Query( $args );    
}
/*===========================================================*/
function sh_set_post_views() {
    $key = 'sh_post_views';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}

function sh_get_post_views() {
    $count = get_post_meta( get_the_ID(), 'sh_post_views', true );
    return $count;
}
/*===========================================================*/
function get_search_results($no){
    $args = array(
        'post_type'       => array('post','audio','video','fatwa','book','cards','news'),
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'orderby'         => 'date',
        'order'           => 'DESC'
    );
    return $posts = new WP_Query( $args );    
}
/*===========================================================*/
function mySearchFilter($articleQuery) {
    if ($articleQuery->is_search ) {
        $articleQuery->set('post_type', array('post','audio','video','fatwa','book','cards','news') );
    };
    return $articleQuery;
};

add_filter('pre_get_posts','mySearchFilter');