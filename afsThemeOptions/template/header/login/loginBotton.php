<?php if ( ! is_user_logged_in() ) : ?>

	<a href="<?php echo home_url() . '/avtorizovatsya' ?>" class="text-dark text-decoration-none d-flex align-items-center">
		<i class="far fa-user rounded-circle bg-grey  ml-3 mr-2 logo-image justify-content-center align-items-center d-flex"></i>
		<span><?php _e( 'Войти', 'lardi' ); ?></span>
	</a>

<?php endif; ?>
