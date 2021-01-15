<?php
$categoryes = get_categories( [
	'taxonomy'   => 'category',
	'hide_empty' => false,
	'exclude'    => '7'
] );
?>

<div is="menuCategories" inline-template>
<div class="col-md-2 position-relative" id="menuCategories" >

	<i class="fas fa-bars mr-2 cursor-pointer" @mouseenter="show=true"></i>

	<span>Категории</span>
	<transition name="fade">
		<ul class="
		list-style-none
		bg-grey-light
		userMenu
		user-menu-category
		position-absolute
		z-index-1
		shadow-1
		rounded-bottom
		py-3"
		    @mouseenter="show=true"
		    @mouseleave="show=false"
			v-show="show"

		>
			<?php foreach ( $categoryes as $key => $category ) : ?>
				<a href="
				<?php echo get_category_link( $category->cat_ID ); ?>"
				   class="nav-link text-dark">
					<li>
						<?php echo $category->name ?>
					</li>
				</a>
			<?php endforeach; ?>
		</ul>
	</transition>
</div>
</div>