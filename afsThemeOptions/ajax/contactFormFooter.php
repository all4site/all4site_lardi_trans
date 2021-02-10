<?php

use AFS\FormSanitize;
use AFS\FormValidation;

add_action( 'wp_ajax_cfFooter', 'cfFooter' );
add_action( 'wp_ajax_nopriv_cfFooter', 'cfFooter' );

function cfFooter()
{
	global $form_error;
	$adminEmail = get_option( 'admin_email' );
	$data       = $_POST;
	$data       = FormSanitize::sanitizeGoodsPage( $data );
	$data       = FormValidation::validationGoddsPage( $data );

	if ( $_POST['action'] == 'cfFooter' )
	{
		$headers = [
			'From: My Name <myname@mydomain.com>',
			'content-type: text/html',
		];

		$message = 'Имя - ' . $data['name'] . ' <br>  Emal - ' . $data['email'] . ' <br>  Subject - ' . $data['footerDescription'] . '';
		$mail    = wp_mail( $adminEmail, 'Форма заполнена', $message, $headers );
		wp_send_json_success( __( 'Ваша заявка успешно отправленна', 'lardi' ) );


	}
}
