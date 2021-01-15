<div is="reloadLogo" inline-template>
	<div class="col-md-4 bg-viollet rounded-left-top p-4 mySetup" id="userLogoImage">
		<?php if ( ! empty( $args['userLogo']['attachment_id'] ) ) : ?>
			<?php echo wp_get_attachment_image( $args['userLogo']['attachment_id'], 'thumbnail', '', [
				'class' => 'img-fluid rounded',
				'v-if'  => '!show'
			] ); ?>
			<span v-html="url" v-if="show"></span>
		<?php else: ?>
			<img src="<?php echo get_template_directory_uri() . '/app/img/noLogo.png' ?>" alt=""
			     class="img-fluid rounded">
		<?php endif; ?>
		<h3 class="mt-3 font-weight-bold">
			<?php _e( 'Мой кабинет', 'lardi' ) ?>
		</h3>
		<p class="mt-3 text-capitalize  userName">
			<span v-if="nickName == '' "><?php echo $args['nickName'] ?></span>
			{{nickName}}
		</p>
		<p>
			<b><?php _e( 'До конца подписки:', 'lardi' ) ?></b>
			<span class="text-danger"><?php echo ( $args['subscribe'] ) ? $args['subscribe'] : 0 ?>
				<?php _e( 'дней', 'lardi' ) ?>
			</span>
		</p>
		<form action="" method="post">
			<button class="btn btn-block btn-outline-primary mt-5 mb-3"
			        name="logoutBtn"><?php _e( 'Выйти', 'lardi' ); ?></button>
		</form>
	</div>
</div>
