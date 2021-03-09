<?php $args = getCusctomFieldFromUserPost(); ?>
<div class="nav position-fixed z-index-1 bg-primary my-menu-wrapper" :class="{'my-menu-show': show }">
	<div class="row col-12 mx-auto h-fit-content overflow-auto h-100 align-content-start">
		<div class="user mt-4 p-0 mx-auto col-12">
			<div class="user-logo d-flex justify-content-center">
				<?php if ( ! is_user_logged_in() ): ?>
					<i class="far fa-user rounded-circle bg-grey  ml-3 mr-2 logo-image justify-content-center align-items-center d-flex"></i>
				<?php endif; ?>

				<?php if ( isset( $args['userLogo']['url'] ) ): ?>
					<img src="<?php echo $args['userLogo']['url'] ?>" alt="" id="user-logo-header" class="rounded-circle my-dropdown-menu">
				<?php endif; ?>
			</div>

			<div class="user-menu mt-3 shadow-1">
				<div class="my-user-menu-dropdown p-2">
					<?php foreach ( linkInUserProfile() as $key => $value ): ?>
						<a href="<?php echo $value['link'] ?>" class="my-user-menu-dropdown-inner text-white"><?php echo $value['name'] ?></a>
					<?php endforeach; ?>
					<form action="" method="post">
						<button type="submit" class="border-0 bg-transparent my-logout-hover my-user-menu-dropdown-inner text-white" name="logoutBtn">
							<span><?php _e( 'Выйти', 'lardi' ); ?></span>
						</button>
					</form>
				</div>
			</div>
			<hr>
		</div>

		<div class="col-12 p-0">
			<div class="user-menu shadow-1 col-12 mx-auto text-white p-2">
				<p class="text-center text-uppercase">Категории</p>
				<ul class="list-style-none text-nowrap p-0">

					<?php foreach ( createCategoryBlock() as $key => $value ) : ?>
						<a href="<?php echo get_post_type_archive_link( $key ); ?>" class="nav-link text-white">
							<li><?php echo $value['name'] ?></li>
						</a>
					<?php endforeach; ?>
				</ul>
			</div>
			<hr>
		</div>
		<div class="addPosts col-12">
			<a href="<?php echo home_url() . '/user/?userposts' ?>" target="_blank" class="btn btn-outline-warning col-md-7 basic-font-size-small-2 py-2">
				<?php _e( 'Добавить обьявление', 'lardi' ); ?>
				<i class="fas fa-plus ml-3"></i>
			</a>
		</div>
	</div>
</div>

