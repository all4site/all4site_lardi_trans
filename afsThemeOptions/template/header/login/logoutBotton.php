<?php if ( is_user_logged_in() ) : ?>
<div is="headerLoginImage" inline-template>
	<form action="" method="post">
		<button type="submit" class="border-0 bg-transparent" name="logoutBtn">
			<a href="/" class="text-dark text-decoration-none	d-flex align-items-center ">
				<?php if ( ! empty( $args['userLogo'] ) ): ?>
					<?php echo $args['userLogo'] ?>
					<span v-html="url" class="rounded-circle logo-image ml-3 mr-2 overflow-hidden" v-if="show"></span>
				<?php else: ?>
					<i class="far fa-user rounded-circle bg-grey  ml-3 mr-2 logo-image justify-content-center align-items-center d-flex"></i>
				<?php endif; ?>

				<span><?php _e( 'Выйти', 'lardi' ); ?></span>
			</a>
		</button>
	</form>
</div>
<?php endif; ?>
