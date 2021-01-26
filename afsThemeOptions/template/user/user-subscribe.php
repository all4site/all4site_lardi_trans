<div class="col-md-8 bg-grey-light p-5 rounded-right-bottom">
	<p class="text-center mb-5"><?php _e( 'Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Donec sollicitudin molestie malesuada. Donec sollicitudin molestie malesuada.', 'lardi' ) ?></p>

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
						<li class="p-3 d-flex">
							<i class="fas fa-check-circle text-secondary basic-font-size-big-5 mr-3 mt-1"></i>
							<h5 class="text-left"><?php echo $value ?></h5>

						</li>
					<?php endforeach; ?>
				</ul>
				<a href="#" class="btn btn-primary btn-block mt-3 py-3 basic-font-size-big-5 font-weight-bold"><?php _e('Подписаться', 'lardi')?></a>
			</div>
		</div>
	</div>
</div>


