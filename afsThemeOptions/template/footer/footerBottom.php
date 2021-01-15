<div class="col-md-3 m-auto text-center">
	<h6 class="font-weight-bold text-uppercase text-secondary mb-2 basic-font-size-small-2"><?php _e( 'служба поддержки', 'lardi' ) ?></h6>
	<p class="text-white basic-font-size-big-4 mb-4"><?php echo fw_get_db_settings_option('userEmail')?></p>
	<h6 class="font-weight-bold text-uppercase text-secondary mb-3 basic-font-size-small-2"><?php _e( 'информация', 'lardi' ) ?></h6>
	<a href="<?php echo fw_get_db_settings_option( 'privacyPolicy' ) ?>"
	   class="basic-font-size-small-2 text-white d-block mb-3">
		<ins><?php _e( 'Пользовательсоке соглашение', 'lardi' ) ?></ins>
	</a>
	<a href="<?php echo fw_get_db_settings_option( 'userAagreement' ) ?>"
	   class="basic-font-size-small-2 text-white d-block mb-5">
		<ins><?php _e( 'Правила конфиденциальности', 'lardi' ) ?></ins>
	</a>
	<h6 class="font-weight-bold text-uppercase text-secondary mb-3 basic-font-size-small-2"><?php _e( 'мы в соцсетях', 'lardi' ) ?></h6>
	<a href="<?php echo fw_get_db_settings_option( 'fasebookLink' ) ?>"
	   class="text-decoration-none">
		<i class="fab fa-facebook footer-social	basic-font-size-big-4"></i>
	</a>
	<a href="<?php echo fw_get_db_settings_option( 'instagramLink' ) ?>"
	   class="text-decoration-none">
		<i class="fab fa-instagram footer-social basic-font-size-big-4 ml-3"></i>
	</a>

</div>
