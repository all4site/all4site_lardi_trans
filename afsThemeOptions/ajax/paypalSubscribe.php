<?php
add_action( 'wp_ajax_paypalSubscribe', 'paypalSubscribe' );
add_action( 'wp_ajax_nopriv_paypalSubscribe', 'paypalSubscribe' );

function paypalSubscribe()
{
	$post = $_POST;
	if ( $post['status'] == 'COMPLETED' )
	{
		$subscribeFinishDate = getCusctomFieldFromUserPost()['subscribe'];
		$subscribeFinishDate = strtotime( '+30 day', strtotime( $subscribeFinishDate ) );
		$userPostSetup       = getPostIdFromUserPost();
		$newSubscribeDate    = wp_date( 'j-m-Y', $subscribeFinishDate );
		$update = update_post_meta( $userPostSetup, 'subscribe', $newSubscribeDate );
		if ($update) {
		    wp_send_json_success();
		}else{
			wp_send_json_error();
		}
	}
}