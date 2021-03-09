<?php get_header() ?>
<?php
foreach ( createCategoryBlock() as $key => $value )
{
	$data[] = $key;
}

$arg = [
	'post_type'      => $data,
	'posts_per_page' => fw_get_db_settings_option('postPerHomePage'),
	'paged'          => get_query_var( 'page' ) ? get_query_var( 'page' ) : 1,
];

$wp_query = new WP_Query( $arg );

//dump( get_post_meta(2147, 'photo', true) )
?>
<div class="wrapper m-auto">
	<div class="container-fluid m-0 p-0">
		<div class="row d-flex justify-content-center">
			<?php get_template_part( 'afsThemeOptions/template/frontend/index/category' ) ?>
		</div>
	</div>

	<?php get_template_part( 'afsThemeOptions/template/adds/center', 'top' ) ?>

	<h4 class="font-weight-bold basic-font-size-big-5 mt-5">Новые обьявления</h4>
	<hr class="mb-5">

	<?php get_template_part( 'afsThemeOptions/template/frontend/index/posts', '', $wp_query ) ?>
</div>

<?php get_footer() ?>
