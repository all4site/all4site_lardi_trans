<?php if ( is_user_logged_in() ) : ?>
	<?php if ( ! empty( $args ) ): ?>
		<img src="<?php echo $args['userLogo']['url'] ?>" alt="" id="user-logo-header" class="rounded-circle logo-image ml-3 mr-2">
	<?php else: ?>
		<i class="far fa-user rounded-circle bg-grey  ml-3 mr-2 logo-image justify-content-center align-items-center d-flex"></i>
	<?php endif; ?>

	<form action="" method="post">
		<button type="submit" class="border-0 bg-transparent my-logout-hover" name="logoutBtn">
			<span><?php _e( 'Выйти', 'lardi' ); ?></span>
		</button>
	</form>
<?php endif; ?>
