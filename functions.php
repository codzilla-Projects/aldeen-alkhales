<?php 

error_reporting(1);

define('SH_ROOT', get_template_directory() . '/');

define('SH_URL', get_template_directory_uri() . '/');

define('SH_ADMIN', admin_url());

define('SH_BlogUrl', get_bloginfo('url'));


add_theme_support( 'post-thumbnails' );



require_once ( SH_ROOT . 'lib/theme_initialization.php');

require_once ( SH_ROOT . 'lib/meta.php');

require_once ( SH_ROOT . 'lib/taxonomy.php');

require_once ( SH_ROOT . 'lib/enqueue_scripts.php');

require_once ( SH_ROOT . 'lib/ajax_functions.php');

require_once ( SH_ROOT . 'lib/sh_functions.php');



add_action( 'after_setup_theme', 'sh_load_theme_textdomain' );

function sh_load_theme_textdomain() {

    load_theme_textdomain( 'aldeen', get_template_directory() . '/languages' );

}
  

remove_filter( 'the_excerpt', 'wpautop' );
remove_filter( 'the_content', 'wpautop' );



function sh_getHijriDate()
{
	$end_point = 'http://api.aladhan.com/v1/gToH?date='.date('d-m-Y');

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $end_point);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    $hijri_date = json_decode($result);
    $hijri_date = $hijri_date->data->hijri;
    $day = $hijri_date->day; 
    $weekday = $hijri_date->weekday->ar; 
    $month = $hijri_date->month->ar;
    $year = $hijri_date->year; 
    
    return '<span>'.$weekday.'</span> / '.$day.' '.$month.' '.$year;
}
