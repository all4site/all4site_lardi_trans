<?php
add_action( 'wp_ajax_cfFooter', 'cfFooter' );
add_action( 'wp_ajax_nopriv_cfFooter', 'cfFooter' );

function cfFooter()
{
	global $form_error;
	$adminEmail = get_option( 'admin_email' );

	if ( $_POST['action'] == 'cfFooter' )
	{
		$headers = [
			'From: My Name <myname@mydomain.com>',
			'content-type: text/html',
		];
		$name    = passwordValidation::isRequire( formDataValidation::sanitizeTextInput( $_POST['name'] ), 'nameRequire' );
		$email   = passwordValidation::isRequire( formDataValidation::sanitizeEmail( $_POST['email'] ), 'emailRequire' );
		$text    = formDataValidation::sanitizeTextArea( $_POST['text'] );
		if ( $form_error->has_errors() )
		{
			wp_send_json_error( errorForVue::errorToArray( $form_error->errors ) );

		} else
		{
			$message = 'Имя - ' . $name . ' <br>  Emal - ' . $email . ' <br>  Subject - ' . $text . '';
			$mail    = wp_mail( $adminEmail, 'Форма заполнена', $message, $headers );
			wp_send_json_success( __( 'Ваша заявка успешно отправленна', 'lardi' ) );
		}

	}
}
