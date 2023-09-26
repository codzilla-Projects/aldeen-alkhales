<?php 
function home_page_content_callback(){
	$wp_editor_settings = array( 
		'quicktags' => array( 'buttons' => 'strong,em,del,ul,ol,li,close' ), // note that spaces in this list seem to cause an issue
		'textarea_rows'=> 2
	);    
	if( isset( $_POST['sh_save'] ) && !empty( $_POST['sh_save']) ){
		foreach ($_POST as $key => $value) {
			if(in_array($key,['sh_youtube_life_link','sh_top_head_txt'])){
				$value = stripcslashes($value);
			}			
			update_option( $key, $value);
		}
	}
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- Top Navigation -->
			<header class="codrops-header">
				<br>
				<h1 class="text-center sh-title">إعدادات الصفحة الرئيسية</h1>
				<br>
			</header>
		</div>
	</div>
		<div class="row">

		<div class="col-sm-3">

			<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

				<a class="nav-link active" id="v-pills-firstsection-tab" data-toggle="pill" href="#v-pills-firstsection" role="tab" aria-controls="v-pills-firstsection" aria-selected="true">محتوى الصفحة الرئيسية</a>

				

			</div>

		</div>

		<div class="col-sm-9 gray_back">

	  		<form class="form-horizontal" method="post" action="#">

			    <div class="tab-content" id="v-pills-tabContent">

			        <div class="tab-pane fade show active" id="v-pills-firstsection" role="tabpanel" aria-labelledby="v-pills-firstsection-tab">			        

                        <div class="form-group">
							<label for="sh_slides_num" class="col-sm-6 control-label">عدد السلايد التى تظهر فى الصفحة الرئيسية</label>
							<div class="col-sm-12">

								<input type="number" class="form-control" id="sh_slides_num" name="sh_slides_num" value="<?php echo get_option('sh_slides_num'); ?>">
							</div>
						</div>
                        
						<div class="form-group">
							<label for="sh_top_head_txt" class="col-sm-6 control-label">محتوى من نحن</label>
							<div class="col-sm-12">
                                <?php wp_editor( get_option('sh_top_head_txt'), 'sh_top_head_txt',  array('textarea_rows'=>5,'textarea_name'=> 'sh_top_head_txt', 'drag_drop_upload'=> true, 'wpautop' => false, 'media_buttons'=> true,'id'=>'sh_top_head_txt','class'=>'form-control',) );  ?>
							</div>
						</div>
                        
                        <div class="form-group"> 
                              <label for="sh_footer_logo" class="col-sm-6 control-label">صورة الخلفية فى الجزء الاول(من نحن)</label>
                              <div class="col-sm-12">
                                <img class="first_img" src="<?php echo get_option('sh_first_bg'); ?>" height="100" style="max-width:100%" />
                                <input class="first_img_url sh_half" type="text" name="sh_first_bg" size="60" value="<?php echo get_option('sh_first_bg'); ?>">
                                <a href="#" class="first_img_upload btn btn-info">إختيار</a>
                              </div>
                        </div>

						<!-- <div class="form-group">

							<label for="sh_flink_value" class="col-sm-6 control-label">لينك الخاص بمقدمة الشيخ</label>

							<div class="col-sm-12">

								<input type="text" class="form-control" id="sh_flink_value" name="sh_flink_value" value="<?php // echo get_option('sh_flink_value'); ?>">

							</div>

						</div>	 -->

                        <div class="form-group">
							<label for="sh_video_num" class="col-sm-6 control-label">عدد الاخبار التى تظهر فى الصفحة الرئيسية</label>
							<div class="col-sm-12">

								<input type="number" class="form-control" id="sh_news_num" name="sh_news_num" value="<?php echo get_option('sh_news_num'); ?>">
							</div>
						</div>
                        <div class="form-group">
							<label for="sh_article_num" class="col-sm-6 control-label">عدد المقالات التى تظهر فى الصفحة الرئيسية</label>
							<div class="col-sm-12">
								<input type="number" class="form-control" id="sh_article_num" name="sh_article_num" value="<?php echo get_option('sh_article_num'); ?>">
							</div>
						</div>
                         <div class="form-group"> 
                              <label for="sh_second_bg" class="col-sm-6 control-label">صورة الخلفية التى تظهر فى الجزء الخاص بالمقالات والاخبار</label>
                              <div class="col-sm-12">
                                <img class="second_img" src="<?php echo get_option('sh_second_bg'); ?>" height="100" style="max-width:100%" />
                                <input class="second_img_url sh_half" type="text" name="sh_second_bg" size="60" value="<?php echo get_option('sh_second_bg'); ?>">
                                <a href="#" class="second_img_upload btn btn-info">إختيار</a>
                              </div>
                        </div>
                         <div class="form-group">
							<label for="sh_audio_num" class="col-sm-6 control-label">عدد المقالات الصوتية التى تظهر فى الصفحة الرئيسية</label>
							<div class="col-sm-12">
								<input type="number" class="form-control" id="sh_audio_num" name="sh_audio_num" value="<?php echo get_option('sh_audio_num'); ?>">
							</div>
						</div>
                        
                        <div class="form-group"> 
                              <label for="sh_third_bg" class="col-sm-6 control-label">صورة الخلفية التى تظهر فى الجزء الخاص بالصوتيات</label>
                              <div class="col-sm-12">
                                <img class="third_img" src="<?php echo get_option('sh_third_bg'); ?>" height="100" style="max-width:100%" />
                                <input class="third_img_url sh_half" type="text" name="sh_third_bg" size="60" value="<?php echo get_option('sh_third_bg'); ?>">
                                <a href="#" class="third_img_upload btn btn-info">إختيار</a>
                              </div>
                        </div>
						<div class="form-group">
							<label for="sh_video_num" class="col-sm-6 control-label">عدد الفيديوهات التى تظهر فى الصفحة الرئيسية</label>
							<div class="col-sm-12">
								<input type="number" class="form-control" id="sh_video_num" name="sh_video_num" value="<?php echo get_option('sh_video_num'); ?>">
							</div>
						</div>
                        
                        <div class="form-group"> 
                              <label for="sh_fourth_bg" class="col-sm-6 control-label">صورة الخلفية التى تظهر فى الجزء الخاص بالمرئيات</label>
                              <div class="col-sm-12">
                                <img class="fourth_img" src="<?php echo get_option('sh_fourth_bg'); ?>" height="100" style="max-width:100%" />
                                <input class="fourth_img_url sh_half" type="text" name="sh_fourth_bg" size="60" value="<?php echo get_option('sh_fourth_bg'); ?>">
                                <a href="#" class="fourth_img_upload btn btn-info">إختيار</a>
                              </div>
                        </div>
                        <div class="form-group">
							<label for="sh_book_num" class="col-sm-6 control-label">عدد الكتب التى تظهر فى الصفحة الرئيسية</label>
							<div class="col-sm-12">
								<input type="number" class="form-control" id="sh_book_num" name="sh_book_num" value="<?php echo get_option('sh_book_num'); ?>">
							</div>
						</div>
                        
						 <div class="form-group">
							<label for="sh_fatwa_num" class="col-sm-6 control-label">عدد الفتاوى التى تظهر فى الصفحة الرئيسية</label>
							<div class="col-sm-12">
								<input type="number" class="form-control" id="sh_fatwa_num" name="sh_fatwa_num" value="<?php echo get_option('sh_fatwa_num'); ?>">
							</div>
						</div>

                        <div class="form-group">
                                <label for="sh_card_num" class="col-sm-6 control-label">عدد البطاقات التى تظهر فى الصفحة الرئيسية</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="sh_card_num" name="sh_card_num" value="<?php echo get_option('sh_card_num'); ?>">
                                </div>
                          </div>
     
                        <div class="form-group"> 
                              <label for="sh_fifth_bg" class="col-sm-8 control-label">صورة الخلفية التى تظهر فى الجزء الخاص بالفتاوى والبطاقات</label>
                              <div class="col-sm-12">
                                <img class="fifth_img" src="<?php echo get_option('sh_fifth_bg'); ?>" height="100" style="max-width:100%" />
                                <input class="fifth_img_url sh_half" type="text" name="sh_fifth_bg" size="60" value="<?php echo get_option('sh_fifth_bg'); ?>">
                                <a href="#" class="fifth_img_upload btn btn-info">إختيار</a>
                              </div>
                        </div>
                        
                          <div class="form-group">
                                <label for="sh_card_num" class="col-sm-6 control-label">عدد المواقع التى تظهر فى دليل المواقع فى الصفحة الرئيسية</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="sh_site_num" name="sh_site_num" value="<?php echo get_option('sh_site_num'); ?>">
                                </div>
						    </div>
                            <div class="form-group"> 
                              <label for="sh_sixth_bg" class="col-sm-8 control-label">صورة الخلفية التى تظهر فى الجزء الخاص ب دليل المواقع</label>
                              <div class="col-sm-12">
                                <img class="sixth_img" src="<?php echo get_option('sh_sixth_bg'); ?>" height="100" style="max-width:100%" />
                                <input class="sixth_img_url sh_half" type="text" name="sh_sixth_bg" size="60" value="<?php echo get_option('sh_sixth_bg'); ?>">
                                <a href="#" class="sixth_img_upload btn btn-info">إختيار</a>
                              </div>
                        </div>
                        
					</div>

			    </div>

				<div class="form-group">

					<div class="col-sm-12">

					<input type="submit" class="btn btn-default btn-block btn-lg sh_save_route" name="sh_save" value="حفظ الإعدادات">

					</div>

				</div>

			</form>

	 	</div>

	</div>
</div><!-- /container -->
<?php
}