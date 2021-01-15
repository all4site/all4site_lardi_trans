<?php


class formDataValidation
{


	public static function sanitizeTextInput( $data )
	{
		return sanitize_text_field( $data );
	}

	public static function sanitizeEmail( $data )
	{
		return sanitize_email( $data );
	}

	public static function sanitizeTextArea( $data )
	{
		return sanitize_textarea_field( $data );
	}

	public static function sanitizePhone( $data )
	{
		return intval( $data );
	}



}