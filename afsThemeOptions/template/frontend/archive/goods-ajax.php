<div class="col-md-12 d-flex h-fit-content flex-wrap p-0 justify-content-sm-center justify-content-md-start">
	<?php while ( $args->have_posts() ): $args->the_post(); ?>
		<?php 
			$postType = fw_get_db_post_option( $args->post->ID, '', true ); 
			$image = ( isset( $postType['photo'][0]['attachment_id'] ) ) ? $postType['photo'][0]['attachment_id'] : '';
			$imageDefault = get_template_directory_uri(). '/app/img/noLogo.png';
		?>
		<div class="w-50 col-lg-4 col-md-6 col-sm-5 col-12 pt-0 px-1 pb-2 d-flex">
			<div class="card shadow-1 border-0">
				<div class="my-image">
				<img class="card-img-top" 
				     src="<?php echo ( isset( wp_get_attachment_image_src($image)[0] ) ) ? wp_get_attachment_image_src($image)[0] : $imageDefault ?>">
				</div>
				<div class="card-body p-2">
					<h5 class="card-title basic-font-size-small-1 mb-1"><?php the_title() ?></h5>
					<p class="font-weight-bold mb-1"><?php echo currency( $postType['costInput'], $postType['currency'] ); ?></p>
					<p class="card-text basic-font-size-small-2 mb-1"><?php echo wp_trim_words( $postType['description'], '10', '...' ) ?></p>
					<div class="d-inline-flex basic-font-size-small-3">
						<span><?php echo ( isset( $postType['from'] ) ) ? $postType['from'] : '' ?></span>
						<hr class="hr-vertical mx-1 my-auto bg-grey">
						<span><?php echo ( isset( $postType['date'] ) ) ? $postType['date'] : '' ?></span>
					</div>

					<a href="<?php echo get_permalink() ?>" class="btn btn-outline-primary basic-font-size-small-3 ml-3">Смотреть</a>
				</div>
			</div>
		</div>
	<?php endwhile; ?>

	<?php wp_reset_postdata(); ?>

</div>