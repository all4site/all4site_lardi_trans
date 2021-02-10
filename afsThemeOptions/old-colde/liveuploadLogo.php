<?php
add_action( 'wp_ajax_uploadLogo', 'uploadLogo' );
add_action( 'wp_ajax_nopriv_uploadLogo', 'uploadLogo' );

function uploadLogo()
{

	if ( passwordValidation::fileSize( $_POST['imageSize'], 180000 ) )
	{
		wp_send_json_success();
	} else
	{
		wp_send_json_error( __( 'Файл слишком большой', 'lardi' ) );
	}

}