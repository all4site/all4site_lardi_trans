<?php
$wp_query = $args;
?>
<div class="col-md-12 d-flex h-fit-content flex-wrap p-0">
	<?php while ( $wp_query->have_posts() ): $wp_query->the_post(); ?>
		<?php $postType = fw_get_db_post_option( $wp_query->post->ID, '', true ); ?>
		<div class="col-md-3 col-sm-4 col-10 mx-auto pt-0 p-2 pb-2 d-flex">
			<div class="card shadow-1 border-0">
				<div class="my-image-index">
					<img class="card-img-top" src="<?php echo wp_get_attachment_image_src( $postType['photo'][0]['attachment_id'] )[0] ?>">
				</div>
				<div class="card-body p-2">
					<h5 class="card-title basic-font-size-small-1 mb-1"><?php the_title() ?></h5>
					<p class="font-weight-bold mb-1"><?php echo currency( $postType['costInput'], $postType['currency'] ); ?></p>
					<p class="card-text basic-font-size-small-2 my-2"><?php echo wp_trim_words( $postType['description'], '20', '...' ) ?></p>

					<div class="my-card-footer mb-2">
						<div class="d-inline-flex basic-font-size-small-3">
							<span><?php echo $postType['from'] ?? '' ?></span>
							<hr class="hr-vertical mx-1 my-auto bg-grey">
							<span><?php echo $postType['date'] ?></span>
						</div>
						<a href="<?php echo get_permalink() ?>" class="btn btn-outline-primary basic-font-size-small-3 ml-3">Смотреть</a>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
	<?php my_pagenavi() ?>

</div>