<?php
add_action( 'wp_ajax_getWpData', 'getWpData' );
add_action( 'wp_ajax_nopriv_getWpData', 'getWpData' );


function getWpData()
{
	$args = [
		'post_type'      => $_POST['archiveName'],
		'posts_per_page' => fw_get_db_settings_option( 'postPerPage' ),
		'paged'          => get_query_var( 'paged' ) ?: 1,
	];

	$wp_query = new WP_Query( $args );

	wp_send_json_success( [
		'currentPage' => $wp_query->query_vars['paged'],
		'maxPage'     => $wp_query->max_num_pages
	] );
}