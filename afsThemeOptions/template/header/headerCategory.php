<div is="menuCategories" inline-template>
	<div class="col-md-2 position-relative text-white" id="menuCategories">

		<i class="fas fa-bars mr-2 cursor-pointer" @mouseenter="show=true"></i>
		<span>Категории</span>
		<transition name="fade">
			<ul class="list-style-none bg-viollet userMenu user-menu-category position-absolute	z-index-1 shadow-1 rounded-bottom py-3 text-nowrap" v-cloak @mouseleave="show=!show" v-show="show">
				<?php foreach (createCategoryBlock() as $key => $value) : ?>
					<a href="<?php echo get_post_type_archive_link($key); ?>" class="nav-link text-white">
						<li><?php echo $value['name'] ?? '' ?></li>
					</a>
				<?php endforeach; ?>
			</ul>
		</transition>
	</div>
</div>