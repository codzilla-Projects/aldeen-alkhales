<?php 
/********************

Add Date Meta Box To Audio CPT

********************/

function sh_add_extra_data_meta() {

    add_meta_box( "audio_extra_data","بيانات إضافية" , "sh_audio_data_callback", array('audio'), "normal" );

    add_meta_box( "slider_extra_data","إخفاء محتوى الشريحة" , "sh_slide_data_callback", array('home-slide'), "normal" );
    add_meta_box( "slider_extra_data","محتوى الزر الخاص بالسلايدر" , "sh_slide_btn_callback", array('home-slide'), "normal" );

}

add_action( 'add_meta_boxes', 'sh_add_extra_data_meta' );



/* Display the post meta box. */

function sh_audio_data_callback( $object, $box ) { 

    $sh_audio_link = esc_attr( get_post_meta( $object->ID, 'sh_audio_link', true ) );
?>

    <div class="form-group">

        <label for="sh_audio_link"><?php _e('رابط الصوت : ','aldeenalkhales'); ?></label>

        <input type="text"  name="sh_audio_link" class="form-control full-wdith" value="<?php echo $sh_audio_link; ?>"><br>

    </div>

<?php

}

/********************

Add Date Meta Box To sites-directory CPT

********************/

function ha_add_site_data_meta() {

    add_meta_box( "audio_extra_data","رابط الموقع" , "ha_site_data_callback", array('sites-directory'), "normal" );

}

add_action( 'add_meta_boxes', 'ha_add_site_data_meta' );



/* Display the post meta box. */

function ha_site_data_callback( $object, $box ) { 

    $ha_site_link = esc_attr( get_post_meta( $object->ID, 'ha_site_link', true ) );
?>

    <div class="form-group">

        <label for="ha_site_link"><?php _e('رابط الموقع : ','aldeenalkhales'); ?></label>

        <input type="text"  name="ha_site_link" class="form-control full-wdith" value="<?php echo $ha_site_link; ?>"><br>

    </div>

<?php

}
/********************

Add Date Meta Box To Book CPT

********************/

function sh_add_book_data_meta() {

    add_meta_box( "book_extra_data","بيانات إضافية" , "sh_book_data_callback", array('book'), "normal" );

}

add_action( 'add_meta_boxes', 'sh_add_book_data_meta' );



/* Display the post meta box. */

function sh_book_data_callback( $object, $box ) { 

    $sh_book_link = esc_attr( get_post_meta( $object->ID, 'sh_book_link', true ) );
?>

    <div class="form-group">

        <label for="sh_book_link"><?php _e('رابط تحميل الكتاب','aldeenalkhales'); ?></label>

        <input type="text"  name="sh_book_link" class="form-control full-wdith" value="<?php echo $sh_book_link; ?>"><br>

    </div>

<?php

}
/********************

Add Date Meta Box To Slide CPT

********************/
function sh_slide_btn_callback( $object, $box ) { 

    $sh_btn_link = esc_attr( get_post_meta( $object->ID, 'sh_btn_link', true ) );
    $sh_btn_txt = esc_attr( get_post_meta( $object->ID, 'sh_btn_txt', true ) );
?>

    <div class="form-group">

        <label for="sh_btn_txt"><?php _e('النص الخاص ب الزر : ','aldeenalkhales'); ?></label>

        <input type="text"  name="sh_btn_txt" class="form-control full-wdith" value="<?php echo $sh_btn_txt; ?>"><br>

    </div>
    <br><br>
    <div class="form-group">

        <label for="sh_btn_link"><?php _e('اللينك الخاص ب الزر : ','aldeenalkhales'); ?></label>

        <input type="text"  name="sh_btn_link" class="form-control full-wdith" value="<?php echo $sh_btn_link; ?>"><br>

    </div>

<?php

}

/* Save post meta on the 'save_post' hook. */

add_action( 'save_post', 'sh_save_custom_meta', 10, 2 );

function sh_save_custom_meta($post_id){

    
    if( isset($_POST['sh_audio_link']) ){

        update_post_meta($post_id, 'sh_audio_link', $_POST['sh_audio_link']);

    }

    else

        delete_post_meta($post_id,'sh_audio_link');


    if( isset($_POST['sh_book_link']) ){

        update_post_meta($post_id, 'sh_book_link', $_POST['sh_book_link']);

    }

    else

        delete_post_meta($post_id,'sh_book_link');
    
    
    
     if( isset($_POST['ha_site_link']) ){

        update_post_meta($post_id, 'ha_site_link', $_POST['ha_site_link']);

    }

    else

        delete_post_meta($post_id,'ha_site_link');
    
    
    if( isset($_POST['sh_btn_link']) ){

        update_post_meta($post_id, 'sh_btn_link', $_POST['sh_btn_link']);

    }

    else

        delete_post_meta($post_id,'sh_btn_link');
    
    
    if( isset($_POST['sh_btn_txt']) ){

        update_post_meta($post_id, 'sh_btn_txt', $_POST['sh_btn_txt']);

    }

    else

        delete_post_meta($post_id,'sh_btn_txt');

}






function sh_slide_data_callback( $object, $box ) { 
    $data_hide = get_post_meta( $object->ID, 'sh_slide_hide_data', true );
?>
    <div class="form-group">
        <label >إخفاء بيانات الشريحة (قم  بتعليمها إذا كنت تريد إخفاء البيانات )</label>
        <input type="checkbox" name="sh_slide_hide_data" value="1" <?= $data_hide == '1' ?'checked': ''; ?> >
    </div>
<?php
}

/* Save post meta on the 'save_post' hook. */
add_action( 'save_post', 'sh_save_slide_extra_meta', 10, 2 );
function sh_save_slide_extra_meta($post_id){
    if( isset($_POST['sh_slide_hide_data']) ){
        update_post_meta($post_id, 'sh_slide_hide_data', $_POST['sh_slide_hide_data']);
    }
    else
        delete_post_meta($post_id,'sh_slide_hide_data');
}