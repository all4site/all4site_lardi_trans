<?php
add_action( 'wp_ajax_userForm', 'updateUserProfileData' );
add_action( 'wp_ajax_nopriv_userForm', 'updateUserProfileData' );

function updateUserProfileData()
{
	global $form_error;
	$userPost = getCusctomFieldFromUserPost();

	if ( $_POST['action'] == 'userForm' )
	{
		$userForm = [
			"firstName" => passwordValidation::isRequire(formDataValidation::sanitizeTextInput( $_POST['firstName'] ), 'firstName' ),
			"lastName"  => passwordValidation::isRequire( formDataValidation::sanitizeTextInput( $_POST['lastName'] ), 'lastName' ),
			"nickName"  => passwordValidation::isRequire( formDataValidation::sanitizeTextInput( $_POST['nickName'] ), 'nickName' ),
			"userSity"  => formDataValidation::sanitizeTextInput( $_POST['userSity'] ),
			"userPhone" => passwordValidation::isRequire( formDataValidation::sanitizePhone( $_POST['userPhone'] ), 'userPhone' ),
			"userEmail" => passwordValidation::isRequire( formDataValidation::sanitizeEmail( $_POST['userEmail'] ), 'userEmail' ),
			"action"    => $_POST['action'],
		];

		if ( ! empty( $_FILES['userLogo'] ) )
		{
				$userPost['userLogo']['attachment_id'] = media_handle_upload( 'userLogo', getPostIdFromUserPost() );
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

			update_post_meta( getPostIdFromUserPost(), 'fw_options', wp_parse_args( $userForm, $userPost) );
			$userForm['tempImage'] = wp_get_attachment_image( $userPost['userLogo']['attachment_id'], 'thumbnail', '', [ 'class' => 'img-fluid rounded' ] );
			$userForm['alert']     = __( 'Ваши даныне успешно сохранены', 'lardi' );
			wp_send_json_success( $userForm );
		}

	}

}