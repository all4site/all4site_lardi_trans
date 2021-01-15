<?php
$adsData       = getCusctomFieldFromUserPostWithData( 'ads' );
$data = $adsData['createGoodsButtom'];
?>
<div class="col-md-8 mx-auto mb-5 mt-8">
	<a href="<?php echo $data['adsRreferalLink'] ?>" class="text-dark text-decoration-none">
		<div class="card text-secondary border-0">
			<?php if ( ! empty( $data['adsImage']['attachment_id'] ) ) : ?>
				<?php echo wp_get_attachment_image(
					$data['adsImage']['attachment_id'],
					'thumbnail',
					'',
					[
						'class' => 'card-img img-fluid whide-ads'
					] ) ?>
			<?php else: ?>
				<img class="card-img whide-ads"
				     src="<?php echo get_template_directory_uri() . '/app/img/whideAdd.jpg' ?>"
				     alt="Card image">

				<div class="card-img-overlay align-items-center d-flex justify-content-center">
					<p class="card-title">Тут может быть ваша рекламма</p>
				</div>
			<?php endif; ?>

		</div>
	</a>
</div>