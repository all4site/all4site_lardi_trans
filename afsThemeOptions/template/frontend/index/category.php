<?php foreach ( createCategoryBlock() as $key => $value ) : ?>
	<a href="<?php echo home_url() . '/' . $key ?>" target="_blank" class="d-flex rounded flex-wrap my-card-width m-2 text-dark text-decoration-none shadow-1 hover-shadow-3">
		<div class="col-md-12 p-0">
			<div class="card border-0 shadow-sm bg-primary text-white">
				<div class="card-body text-center py-1">
					<div class="d-flex align-items-center mb-3">
						<div class="card-img w-25 mr-2 basic-font-size-big-7">
							<?php echo $value['icon'] ?>
						</div>
						<h6 class="text-nowrap p-0 m-0 font-weight-bold"><?php echo $value['name'] ?></h6>

					</div>
					<p class="text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, nobis.</p>
				</div>
			</div>
		</div>
	</a>

<?php endforeach; ?>

