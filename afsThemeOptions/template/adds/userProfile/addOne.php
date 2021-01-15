<div class="col-md-12">
	<a href="<?php echo $args['userSetupTop']['adsRreferalLink'] ?>" class="text-dark text-decoration-none">
		<div class="card text-secondary border-0">
			<?php if ( ! empty( $args['userSetupTop']['adsImage']['attachment_id'] ) ) : ?>
				<?php echo wp_get_attachment_image(
					$args['userSetupTop']['adsImage']['attachment_id'],
					'thumbnail',
					'',
					[
						'class' => 'card-img img-fluid'
					] ) ?>
			<?php else: ?>
				<img class="card-img"
				     src="<?php echo get_template_directory_uri() . '/app/img/add.jpg' ?>"
				     alt="Card image">

				<div class="card-img-overlay align-items-center d-flex">
					<p class="card-title">Тут может быть ваша рекламма</p>
				</div>
			<?php endif; ?>

		</div>
	</a>
</div>
