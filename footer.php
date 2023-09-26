  <!-- ======= Footer ======= -->
  <footer dir="rtl" id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <img src="<?= get_option('sh_footer_logo'); ?>">
            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="fa fa-angle-up" aria-hidden="true"></i>اعلى الصفحة </a>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
              <?php wp_nav_menu( array( 'theme_location' => 'footer-menu-one','container' => false ) ); ?>
            
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <?php wp_nav_menu( array( 'theme_location' => 'footer-menu-second','container' => false ) ); ?>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>تابعنا عبر التواصل الاجتماعي</h4>

            <div class="social-links">
              <?php $youtube = get_option('sh_youtube');  
                if(!empty($youtube)) :
                ?>
					<a target="_blank" href="<?= $youtube; ?>" title="youtube">
						<i class="fa fa-youtube-play" aria-hidden="true"></i>
					</a>
                 <?php endif; ?>
                <?php $twitter = get_option('sh_twitter');  
                if(!empty($twitter)) :
                ?>
					<a target="_blank" href="<?= $twitter; ?>" title="twitter">
						<i class="fa fa-twitter" aria-hidden="true"></i>
					</a>
                <?php endif; ?>
                <?php $facebook = get_option('sh_fb');  
                if(!empty($facebook)) :
                ?>
					<a target="_blank" href="<?= $facebook; ?>" title="facebook">
						<i class="fa fa-facebook" aria-hidden="true"></i>
					</a>
                
                <?php endif; ?>
                <?php $insta = get_option('sh_insta');  
                if(!empty($insta)) :
                ?>
					<a target="_blank" href="<?= $insta; ?>" title="instagram">
						<i class="fa fa-instagram" aria-hidden="true"></i>
					</a>
                <?php endif; ?>
                <?php $telegram = get_option('sh_telegram');  
                if(!empty($telegram)) :
                ?>
					<a target="_blank" href="<?= $telegram; ?>" title="telegram">
						<i class="fa fa-telegram" aria-hidden="true"></i>
					</a>
                <?php endif; ?>
            </div>
             <h4 class="mt-4">تواصل معنا </h4>
             <p>
              <strong class="footer-contact-us"><a href="mailto:<?=get_option('sh_email'); ?>"><i class="fa fa-envelope" aria-hidden="true"></i><?=get_option('sh_email'); ?></a></strong>
            </p> 
            <p>
              <strong class="footer-contact-us"><a href="tel:<?=get_option('sh_phone'); ?>"><i class="fa fa-phone" aria-hidden="true"></i><?=get_option('sh_phone'); ?></a></strong>
            </p> 
          </div>

        </div>
      </div>
        <div class="container">
            <div class="border2"></div>
        </div>
    </div>
    
  </footer><!-- End Footer -->

  
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->
<script>
function openSearch() {
  document.getElementById("myOverlay").style.display = "block";
}

function closeSearch() {
  document.getElementById("myOverlay").style.display = "none";
}
</script>
<?php wp_footer(); ?>

</body>

</html>