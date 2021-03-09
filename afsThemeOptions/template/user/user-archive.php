<div class="col-md-8 bg-grey-light rounded-right-top">
	<h4 class="text-center mt-5 font-weight-bold"><?php _e('Добавить обьявление', 'lardi')?></h4>
	<p class="text-center pl-5 pr-5"><?php _e('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi culpa deserunt dolore error itaque, nostrum officia officiis unde veritatis.', 'lardi')?></p>
	<div class="row p-sm-5">
		<?php foreach ( createCategoryBlock() as $key => $value ) : ?>
			<div class="col-lg-4 col-md-12 col-sm-6 user-category-setup">
				<div class="card border-0 shadow-sm">
					<div class="card-body text-center">
						<h6 class="card-title text-nowrap"><?php echo $value['name'] ?></h6>
						<div class="basic-font-size-big-7">
							<?php echo $value['icon']?>
						</div>
						<a href="<?php echo ( isset( $value['link'] ) ) ? $value['link'] : '' ?>" target="_blank" class="btn btn-primary btn-block mt-3">Добавить</a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>

</div>

