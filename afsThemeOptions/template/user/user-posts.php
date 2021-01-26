<?php
/**
 * @var $args WP_Query
 */
$countPosts = count_user_posts( get_current_user_id(), [ 'goods', 'transports', 'cars', 'companions', 'oftransportations' ] );

?>

<div class="col-md-8 bg-grey-light pt-5 pb-5 rounded-right-bottom">
	<?php if ( is_object( $args ) ): ?>

	<span class="text-center d-block mb-4">Всего обьявлений: <?php echo $countPosts ?> </span>
	<?php while ( $args->have_posts() ):
	$args->the_post() ?>
	<?php
	$postID         = $args->post->ID;
	$data           = fw_get_db_post_option( $postID, '', true );
	$photo          = fw_get_db_post_option( $postID, 'photo', true );
	$postTypeLabel  = get_post_type_object( get_post_type() )->label;
	$postStatus     = $args->post->post_status;
	$updatePostLink = home_url() . '/update?category=' . get_post_type() . '&postid=' . $postID . '?_wpnonce=' . wp_create_nonce( 'wp_rest' );
	if ( $data['currency'] == 'UA' )
	{
		$currency = $data['costInput'] . ' грн.';
	} else
	{
		$currency = '$' . $data['costInput'];
	}
	?>

	<?php if ( $postStatus == 'draft' ): ?>
	<div class="col-md-10 bg-grey mt-3 mx-auto rounded draft-post">
		<?php else: ?>

		<div class="col-md-10 bg-white mt-3 mx-auto rounded shadow-1">
			<?php endif; ?>

			<div class="row py-3">
				<div class="col-md-4 pr-0">
					<?php echo wp_get_attachment_image( $photo[0]['attachment_id'], 'thumbnail', '', [ 'class' => 'img-fluid rounded' ] ) ?>
				</div>
				<div class="col-md-8">

					<h5 class="basic-font-size-small-3">Категория: <?php echo $postTypeLabel ?></h5>
					<h5 class="font-weight-bold basic-font-size-big-1"><?php echo $currency; ?></h5>
					<span class="font-weight-bold d-block basic-font-size-small-1"><?php echo $data['title'] ?></span>
					<span class="basic-font-size-small-1"><?php echo wp_trim_words( $data['description'], 13, '...' ) ?></span>

					<div class="col-sm-12 text-secondary mt-2 basic-font-size-small-3">
						<div class="row">
							<span><?php echo $data['from'] ?></span>
							<hr class="hr-vertical mx-1 my-auto bg-grey">
							<span><?php echo $data['date'] ?></span>
						</div>
					</div>

					<div class="col-sm-12 text-secondary font-weight-bold mt-3 basic-font-size-small-2">
						<div class="row">

							<a href="<?php echo get_permalink() ?>" target="_blank" class="text-decoration-none">Посмотреть</a>

							<hr class="hr-vertical mx-1 my-auto bg-grey">

							<a href="<?php echo $updatePostLink ?>" target="_blank" class="text-decoration-none">Редактировать</a>

							<hr class="hr-vertical mx-1 my-auto bg-grey">

							<?php if ( $postStatus == 'draft' ): ?>
								<form action="<?php echo fw_current_url() ?>" method="post" id="publish">
									<button class="text-decoration-none button-as-href">Возобновить</button>
									<input type="text" name="publish" value="<?php echo $postID ?>" hidden>
								</form>
							<?php else: ?>
								<form action="<?php echo fw_current_url() ?>" method="post" id="draft">
									<button class="text-decoration-none button-as-href">Остановить</button>
									<input type="text" name="draft" value="<?php echo $postID ?>" hidden>
								</form>
							<?php endif; ?>

							<hr class="hr-vertical mx-1 my-auto bg-grey">

							<form action="<?php echo fw_current_url() ?>" method="post" id="delete">
								<button class="text-decoration-none button-as-href">Удалить</button>
								<input type="text" name="delete" value="<?php echo $postID ?>" hidden>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>

		<?php endwhile; ?>
		<?php wp_reset_query() ?>
		<?php endif; ?>



		<?php if ( ! is_object( $args ) ): ?>
			<h2><?php _e( 'У вас пока нет обьявлений', 'lardi' ) ?></h2>
		<?php endif; ?>
	</div>
