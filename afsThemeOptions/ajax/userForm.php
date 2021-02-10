<?php

use AFS\FormSanitize;
use AFS\FormValidation;

add_action( 'wp_ajax_userForm', 'userForm' );
add_action( 'wp_ajax_nopriv_userForm', 'userForm' );

function userForm()
{
	global $form_error;
//	dump( $_POST );
//	dump( $_FILES );
	$data = $_POST;

	$data     = FormSanitize::sanitizeGoodsPage( $data );
	$data     = FormValidation::validationGoddsPage( $data );
	$userPost = getCusctomFieldFromUserPost();

	if ( $_POST['action'] == 'userForm' )
	{

		if ( ! empty( $_FILES ) )
		{
			$atId = media_handle_sideload( $_FILES['customFile'], getPostIdFromUserPost() );

			if ( is_wp_error( $atId ) )
			{
				wp_send_json_error( [ 'customFile' => $atId->get_error_messages()[0] ] );
			}

			$link                 = wp_get_attachment_image_url( $atId );

			$userPost['userLogo'] = [
				'attachment_id' => $atId,
				'url'           => $link,
			];
			update_post_meta( getPostIdFromUserPost(), 'fw_options', $userPost );
		}


		wp_update_user( [
			'ID'           => get_current_user_id(),
			'nickname'     => $data['nickName'],
			'first_name'   => $data['firstName'],
			'last_name'    => $data['lastName'],
			'user_email'   => $data['userEmail'],
			'display_name' => $data['nickName'],
		] );

		update_post_meta( getPostIdFromUserPost(), 'fw_options', wp_parse_args( $data, $userPost ) );
		wp_send_json_success();
	}
}