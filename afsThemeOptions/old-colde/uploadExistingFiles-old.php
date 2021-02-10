<?php
add_action( 'wp_ajax_uploadExistingFiles', 'uploadExistingFiles' );
add_action( 'wp_ajax_nopriv_uploadExistingFiles', 'uploadExistingFiles' );

function uploadExistingFiles()
{

	$postId = $_POST['postID'];
	if ( ! empty( $postId ) )
	{
		$userCustomPost = fw_get_db_post_option( $postId, '', true );
		wp_send_json_success( $userCustomPost['photo'] );

	} else
	{
		wp_send_json_error();
	}

}
