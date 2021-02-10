<?php
$arg = [
	'post_type'      => $args,
	'posts_per_page' => fw_get_db_settings_option( 'postPerPage' ),
	'paged'          => get_query_var( 'paged' ) ?: 1,
];

$wp_query = new WP_Query( $arg );
//dump($postType)
?>
<div id="posts" class="col-md-12">
	<?php get_template_part( 'afsThemeOptions/template/frontend/archive/goods', 'ajax', $wp_query ) ?>
</div>

<div is="loadMore" inline-template>
	<div class="col-md-12 text-center mt-5">
		<div class="btn btn-primary" @click.prevent="loadMoreBtn" id="loadMore" v-if="show" data-page="1">Загрузить еще посты</div>
	</div>
</div>
