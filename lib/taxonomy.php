<?php 

/************************

** create Custom Taxonomies for fatawa post type

************************/

add_action( 'init', 'sh_custom_tax', 0 );

function sh_custom_tax() 

{

    $my_taxonomies = array(

        array(

          'labels' => array(

            'name' => _x( 'تصنيف الفتاوى ', 'taxonomy general name' ),

            'singular_name' => _x( 'التصنيف', 'taxonomy singular name' ),

            'search_items' =>  __( 'بحث فى التصنيفات','aldeenalkhales' ),

            'popular_items' => __( 'التصنيفات الأكثر شهرة' ,'aldeenalkhales'),

            'all_items' => __( 'كل التصنيفات' ,'aldeenalkhales'),

            'parent_item' => __('الأب'),

            'parent_item_colon' => null,

            'edit_item' => __( 'تعديل التصنيف' ), 

            'update_item' => __( 'تحديث التصنيف' ),

            'add_new_item' => __( 'إضافة تصنيف جديد' ),

            'new_item_name' => __( 'تصنيف جديد' ),

            'separate_items_with_commas' => __( 'فصل التصنيفات بفاصلة' ),

            'add_or_remove_items' => __( 'إضافة أو حذف التصنيفات' ),

            'choose_from_most_used' => __( 'إختر من التصنيفات المستعملة' ),

            'menu_name' => __( 'تصنيف الفتاوي ' ),

          ),

          'tax_name' => 'fatwa_cat',

          'post_types' =>  array('fatwa'),

          'slug' => 'fatwa-category'          

        ),array(

          'labels' => array(

            'name' => _x( 'تصنيف الصوتيات ', 'taxonomy general name' ),

            'singular_name' => _x( 'التصنيف', 'taxonomy singular name' ),

            'search_items' =>  __( 'بحث فى التصنيفات','aldeenalkhales' ),

            'popular_items' => __( 'التصنيفات الأكثر شهرة' ,'aldeenalkhales'),

            'all_items' => __( 'كل التصنيفات' ,'aldeenalkhales'),

            'parent_item' => __('الأب'),

            'parent_item_colon' => null,

            'edit_item' => __( 'تعديل التصنيف' ), 

            'update_item' => __( 'تحديث التصنيف' ),

            'add_new_item' => __( 'إضافة تصنيف جديد' ),

            'new_item_name' => __( 'تصنيف جديد' ),

            'separate_items_with_commas' => __( 'فصل التصنيفات بفاصلة' ),

            'add_or_remove_items' => __( 'إضافة أو حذف التصنيفات' ),

            'choose_from_most_used' => __( 'إختر من التصنيفات المستعملة' ),

            'menu_name' => __( 'تصنيف الصوتيات' ),

          ),

          'tax_name' => 'audio_cat',

          'post_types' =>  array('audio'),

          'slug' => 'audio-category'          

        ),array(

          'labels' => array(

            'name' => _x( 'تصنيف  الكتب ', 'taxonomy general name' ),

            'singular_name' => _x( 'التصنيف', 'taxonomy singular name' ),

            'search_items' =>  __( 'بحث فى التصنيفات','aldeenalkhales' ),

            'popular_items' => __( 'التصنيفات الأكثر شهرة' ,'aldeenalkhales'),

            'all_items' => __( 'كل التصنيفات' ,'aldeenalkhales'),

            'parent_item' => __('الأب'),

            'parent_item_colon' => null,

            'edit_item' => __( 'تعديل التصنيف' ), 

            'update_item' => __( 'تحديث التصنيف' ),

            'add_new_item' => __( 'إضافة تصنيف جديد' ),

            'new_item_name' => __( 'تصنيف جديد' ),

            'separate_items_with_commas' => __( 'فصل التصنيفات بفاصلة' ),

            'add_or_remove_items' => __( 'إضافة أو حذف التصنيفات' ),

            'choose_from_most_used' => __( 'إختر من التصنيفات المستعملة' ),

            'menu_name' => __( 'تصنيف الكتب ' ),

          ),

          'tax_name' => 'book_cat',

          'post_types' =>  array('book'),

          'slug' => 'book-category'          

        ),array(

          'labels' => array(

            'name' => _x( 'تصنيف البطاقات ', 'taxonomy general name' ),

            'singular_name' => _x( 'التصنيف', 'taxonomy singular name' ),

            'search_items' =>  __( 'بحث فى التصنيفات','aldeenalkhales' ),

            'popular_items' => __( 'التصنيفات الأكثر شهرة' ,'aldeenalkhales'),

            'all_items' => __( 'كل التصنيفات' ,'aldeenalkhales'),

            'parent_item' => __('الأب'),

            'parent_item_colon' => null,

            'edit_item' => __( 'تعديل التصنيف' ), 

            'update_item' => __( 'تحديث التصنيف' ),

            'add_new_item' => __( 'إضافة تصنيف جديد' ),

            'new_item_name' => __( 'تصنيف جديد' ),

            'separate_items_with_commas' => __( 'فصل التصنيفات بفاصلة' ),

            'add_or_remove_items' => __( 'إضافة أو حذف التصنيفات' ),

            'choose_from_most_used' => __( 'إختر من التصنيفات المستعملة' ),

            'menu_name' => __( 'تصنيف البطاقات' ),

          ),

          'tax_name' => 'card_cat',

          'post_types' =>  array('cards'),

          'slug' => 'card-category'          

        )


    );



  // Add new taxonomy, NOT hierarchical (like tags)

    foreach ($my_taxonomies as $tax) {

      register_taxonomy($tax['tax_name'],$tax['post_types'],array(

        'hierarchical' => true,

        'labels' => $tax['labels'],

        'show_ui' => true,

        'update_count_callback' => '_update_post_term_count',

        'query_var' => true,

        'rewrite' => array( 'slug' => $tax['slug'] ),

      ));

    }

}
