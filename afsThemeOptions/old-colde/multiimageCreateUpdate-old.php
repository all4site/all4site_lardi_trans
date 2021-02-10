<?php
add_action( 'wp_ajax_multiimageCreateUpdate', 'multiimageCreateUpdate' );
add_action( 'wp_ajax_nopriv_multiimageCreateUpdate', 'multiimageCreateUpdate' );
require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';

function multiimageCreateUpdate()
{
	global $form_error;
//	dump( $_FILES );
//	dump( $_POST );

	if ( count( $_FILES ) > 3 )
	{
		wp_send_json_error( [ 'images' => 'Очень много файлов' ] );
	} else
	{
		passwordValidation::multiUploadFileSize( $_FILES, 200000 );
		if ( $form_error->has_errors() )
		{
			wp_send_json_error( errorForVue::errorToArray( $form_error->errors ) );
		} else
		{
			wp_send_json_success();
		}
	}
}