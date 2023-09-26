<?php
function sh_admin_scripts_styles($hook) {
	wp_enqueue_style( 'sh-main', SH_URL . 'assets/admin/css/main-style.css');

	$sh_pages = ['toplevel_page_content-area','%d8%a5%d8%b9%d8%af%d8%a7%d8%af%d8%aa-%d8%a7%d9%84%d9%85%d9%88%d9%82%d8%b9_page_home-page-content'];

	if( in_array($hook, $sh_pages) ) {
		wp_enqueue_style( 'sh-bootsrtap', SH_URL . 'assets/admin/css/bootstrap.min.css');
		wp_enqueue_style( 'sh-style', SH_URL . 'assets/admin/css/style.css');
		wp_enqueue_style( 'sh-style-sub', SH_URL . 'assets/admin/css/style-sub.css');
		wp_enqueue_script( 'sh-bootsrtap', SH_URL .'assets/admin/js/bootstrap.min.js', array() ,false, true );
		wp_enqueue_script( 'sh-script', SH_URL .'assets/admin/js/script.js', array() ,false, true );
		if(function_exists( 'wp_enqueue_media' )){
			wp_enqueue_media();
		}else{
			wp_enqueue_style('thickbox');
			wp_enqueue_script('media-upload');
			wp_enqueue_script('thickbox');
		}
	}

}
 
add_action('admin_enqueue_scripts', 'sh_admin_scripts_styles');


function ha_scripts_styles() {

    /* Vendor CSS Files */      
	wp_enqueue_style( 'ha-animate', SH_URL . 'assets/vendor/animate.css/animate.min.css' );
	wp_enqueue_style( 'first-font', 'https://fonts.googleapis.com/earlyaccess/droidarabickufi.css' );
	wp_enqueue_style( 'second-font', 'https://fonts.googleapis.com/earlyaccess/droidarabicnaskh.css' );
    wp_enqueue_style( 'ha-font-awesome', SH_URL . 'assets/vendor/fonts/font-awesome/css/font-awesome.min.css' );
    wp_enqueue_style( 'ha-aos-css', SH_URL . 'assets/vendor/aos/aos.css' );
    wp_enqueue_style( 'ha-bootstrap-css', SH_URL . 'assets/vendor/bootstrap/css/bootstrap.min.css' );
    wp_enqueue_style( 'ha-bootstrap-icons', SH_URL . 'assets/vendor/bootstrap-icons/bootstrap-icons.css' );
    wp_enqueue_style( 'ha-glightbox', SH_URL . 'assets/vendor/glightbox/css/glightbox.min.css' );
    wp_enqueue_style( 'ha-swiper-bundle', SH_URL . 'assets/vendor/swiper/swiper-bundle.min.css' );
     


     /* Vendor Js Files */  
	wp_enqueue_script( 'ha-aos-js',  SH_URL . 'assets/vendor/aos/aos.js' , array() ,false, true );
    wp_enqueue_script( 'ha-bootstrap-bundle-js',  SH_URL . 'assets/vendor/bootstrap/js/bootstrap.bundle.min.js' , array() ,false, true );
    wp_enqueue_script( 'ha-glightbox-js',  SH_URL . 'assets/vendor/glightbox/js/glightbox.min.js' , array() ,false, true );
    /*wp_enqueue_script( 'ha-isotope-js',  SH_URL . 'assets/vendor/isotope-layout/isotope.pkgd.min.js' , array() ,false, true );
    wp_enqueue_script( 'ha-validate-js',  SH_URL . 'assets/vendor/php-email-form/validate.js' , array() ,false, true );
    wp_enqueue_script( 'ha-purecounter-js',  SH_URL . 'assets/vendor/purecounter/purecounter.js' , array() ,false, true );*/
    
    wp_enqueue_script( 'ha-swiper-bundle-js',  SH_URL . 'assets/vendor/swiper/swiper-bundle.min.js' , array() ,false, true );
//    wp_enqueue_script( 'ha-noframework-js',  SH_URL . 'assets/vendor/waypoints/noframework.waypoints.js' , array() ,false, true );
     /* Template Main JS File */ 
    
        wp_enqueue_script( 'ha-main-js',  SH_URL . 'assets/js/main.js' , array() ,false, true );
     /* Template Main CSS File */     
    if( is_front_page()){
    	wp_enqueue_style( 'ha-style-css', SH_URL . 'assets/css/style.css' );

    }else{
    	wp_enqueue_style( 'ha-style-sub-css', SH_URL . 'assets/css/style-sub.css' );

    }

    if ( wp_is_mobile() && is_front_page()) { 
     wp_enqueue_style( 'ha-mobile-home', SH_URL . 'assets/css/responsive.css'); 
   } elseif( wp_is_mobile() && !is_front_page()){
      wp_enqueue_style( 'ha-mobile-pages', SH_URL . 'assets/css/responsive-sub.css');
     }
}
add_action( 'wp_enqueue_scripts', 'ha_scripts_styles' );

if( is_404() ) echo '404 message goes here | ';
else wp_title( '|', true, 'right' );