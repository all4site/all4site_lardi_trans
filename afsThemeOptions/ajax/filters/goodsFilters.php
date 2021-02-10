<?php
use AFS\PostFilter;
add_action( 'wp_ajax_goodsFilters', 'goodsFilters' );
add_action( 'wp_ajax_nopriv_goodsFilters', 'goodsFilters' );

function goodsFilters()
{
//	dump($_POST);
	$data     = $_POST;
//	$dataMeta = metaDataParce( $_POST );
	$dataMeta = PostFilter::metaDataParce( $_POST );

	$args = [
		'post_type'      => $_POST['archiveName'],
		'posts_per_page' => fw_get_db_settings_option( 'postPerPage' ),
		'paged'          => $_POST['currentPage'],
		'meta_query'     => $dataMeta
//		'meta_query'     => [
//			[
//				"relation" => "OR",
//				[
//					'key'     => 'lenth',
//					'value'   => [ 1, 3 ],
//					'compare' => 'BETWEEN',
//					'type'    => 'numeric',
//				],
//
//				[
//					'key'     => 'lenth',
//					'value'   => 10,
//					'compare' => '>',
//					'type'    => 'numeric',
//				],
//			]
//		],
	];

	$wp_query = new WP_Query( $args );
//	dump($wp_query);
	ob_start();
	get_template_part( 'afsThemeOptions/template/frontend/archive/goods', 'ajax', $wp_query );
	$template = ob_get_clean();

	wp_send_json_success( [
		'currentPage' => $wp_query->query_vars['paged'] ?: 1,
		'maxPge'      => $wp_query->max_num_pages,
		'template'    => $template
	] );
}