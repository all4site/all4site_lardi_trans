<?php get_header() ?>
<?php
$args = getCusctomFieldFromUserPostWithData( 'subscribes' );
?>
<div class="wrapper m-auto">
	<div class="container-fluid">
		<div class="col-md-6 bg-grey-light p-5 m-auto">
			<p class="text-center mb-5"><?php echo $args[0]['textareaSubscribe'] ?></p>

			<div class="col-md-9 py-3 m-auto rounded-lg">
				<div class="card border-0 shadow-4 rounded-lg">
					<div class="card-body text-center py-5">
						<h2 class="card-title text-nowrap font-weight-bold text-secondary text-left pl-3 basic-font-size-big-8">
							<?php echo $args['postTitle']; ?>
							<span class="basic-font-size-big-1">
						<?php _e( '/мес.', 'lardi' ) ?>
					</span>
						</h2>
						<ul class="list-style-none p-0">
							<?php foreach ( $args[0] as $key => $value ): ?>
								<?php if($key === 'textareaSubscribe') continue?>
								<li class="p-3 d-flex">
									<i class="fas fa-check-circle text-secondary basic-font-size-big-5 mr-3 mt-1"></i>
									<h5 class="text-left"><?php echo $value ?></h5>

								</li>
							<?php endforeach; ?>
						</ul>
						<div is="paypal" inline-template>
							<section>
								<span class="basic-font-size-big-6">Подписаться</span>
								<div id="paypal-button-container" class="mt-3"></div>
							</section>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<?php get_footer() ?>
