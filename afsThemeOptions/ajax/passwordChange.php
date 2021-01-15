<?php
add_action( 'wp_ajax_passwordChange', 'passwordChange' );
add_action( 'wp_ajax_nopriv_passwordChange', 'passwordChange' );

function passwordChange()
{

	$validetion = new passwordValidation();

	if ( $_POST['action'] == 'passwordChange' )
	{
		$oldPassword        = $_POST['oldPassword'];
		$newPassword        = $_POST['newPassword'];
		$confirmNewPassword = $_POST['confirmNewPassword'];
		$errors             = $validetion->checkAll( $oldPassword, $newPassword, $confirmNewPassword );

		if ( ! empty( $errors ) )
		{
			wp_send_json_error( $errors );
		} else
		{
			//TODO Раскоментировать смену пароля
//			wp_set_password( $confirmNewPassword, get_current_user_id() );
			wp_send_json_success( __( 'Пароль изменен', 'lardi' ) );
		}

	}
}