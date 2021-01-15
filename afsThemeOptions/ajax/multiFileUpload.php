<?php
add_action( 'wp_ajax_multiFileUpload', 'multiFileUpload' );
add_action( 'wp_ajax_nopriv_multiFileUpload', 'multiFileUpload' );

function multiFileUpload()
{
	global $form_error;
	passwordValidation::multiUploadFileSize( $_FILES, 200000 );

	if ($form_error->has_errors()) {
	    wp_send_json_error(errorForVue::errorToArray($form_error->errors));
	}else{
		wp_send_json_success();
	}
}