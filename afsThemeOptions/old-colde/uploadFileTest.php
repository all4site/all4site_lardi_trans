<?php
add_action( 'wp_ajax_uploadFileTest', 'uploadFileTest' );
add_action( 'wp_ajax_nopriv_uploadFileTest', 'uploadFileTest' );

function uploadFileTest()
{
	require_once ABSPATH . 'wp-admin/includes/image.php';
	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';
//	dump( $_FILES );
//	dump( $_POST );
	$file = $_FILES;

	foreach ( $file as $key => $value )
	{
		dump( $value );
		$atId = media_handle_sideload( $value, 1897 );
		if ( is_wp_error( $atId ) )
		{
			dump( $atId->get_error_messages() );
		} else
		{
			dump( $atId );
		}
	}


}
