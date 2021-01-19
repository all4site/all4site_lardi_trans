<?php
add_action( 'wp_ajax_updateCheckbox', 'updateCheckbox' );
add_action( 'wp_ajax_nopriv_updateCheckbox', 'updateCheckbox' );

function updateCheckbox()
{
	$postId = $_POST['postID'];
	if ( ! empty( $postId ) )
	{
		$userCustomPost = fw_get_db_post_option( $postId, '', true );
		wp_send_json_success( $userCustomPost['groupageCargo'] );

	} else
	{
		wp_send_json_error();
	}

}
