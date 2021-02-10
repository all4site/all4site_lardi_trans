<?php
add_action( 'wp_ajax_userForm', 'userForm' );
add_action( 'wp_ajax_nopriv_userForm', 'userForm' );

function userForm ()
{
	global $form_error;
//	dump( $_POST );
//	dump( $_FILES );
	$data = $_POST;

	$data = FormSanitize::sanitizeGoodsPage( $data );
	$data = FormValidation::validationGoddsPage( $data );
	$userPost = getCusctomFieldFromUserPost();

	if ( $_POST['action'] == 'userForm' )
	{
		$userForm = [
			"firstName" => passwordValidation::isRequire( formDataValidation::sanitizeTextInput( $_POST['firstName'] ), 'firstName' ),
			"lastName"  => passwordValidation::isRequire( formDataValidation::sanitizeTextInput( $_POST['lastName'] ), 'lastName' ),
			"nickName"  => passwordValidation::isRequire( formDataValidation::sanitizeTextInput( $_POST['nickName'] ), 'nickName' ),
			"userSity"  => formDataValidation::sanitizeTextInput( $_POST['userSity'] ),
			"userPhone" => passwordValidation::isRequire( formDataValidation::sanitizePhone( $_POST['userPhone'] ), 'userPhone' ),
			"userEmail" => passwordValidation::isRequire( formDataValidation::sanitizeEmail( $_POST['userEmail'] ), 'userEmail' ),
			"action"    => $_POST['action'],
		];

		if ( ! empty( $_FILES['userLogo'] ) )
		{
			$atId = media_handle_upload( 'userLogo', getPostIdFromUserPost() );
			$link = wp_get_attachment_image_url( $atId );

			$userPost['userLogo'] = [
				'attachment_id' => $atId,
				'url'           => $link,
			];
			update_post_meta( getPostIdFromUserPost(), 'fw_options', $userPost );
		}

		if ( $form_error->has_errors() )
		{

			wp_send_json_error( errorForVue::errorToArray( $form_error->errors ) );

		} else
		{
			wp_update_user( [
				'ID'           => get_current_user_id(),
				'nickname'     => $userForm['nickName'],
				'first_name'   => $userForm['firstName'],
				'last_name'    => $userForm['lastName'],
				'user_email'   => $userForm['userEmail'],
				'display_name' => $userForm['nickName'],
			] );

			update_post_meta( getPostIdFromUserPost(), 'fw_options', wp_parse_args( $userForm, $userPost ) );
			wp_send_json_success();
		}

	}

}