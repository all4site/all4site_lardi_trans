<?php

use Respect\Validation\Validator as v;

class FormValidation
{
	public static function errorForJson( $data, $message, $key )
	{
		global $form_error;

		if ( $data === false )
		{
			$form_error->add( 'error', $message );
			$result = [
				$key => $form_error->get_error_message()
			];
			wp_send_json_error( $result );
		} else
		{
			$result = $data;
		}

		return $result;
	}

	public static function validationGoddsPage( $data )
	{
		foreach ( $data as $key => $value )
		{
			if ( $key == 'description' )
			{
				self::errorForJson( v::length( 50, null )->validate( $value ), 'Минимум 50 символов', $key );
			}
			if ( $key == 'currency' )
			{
				self::errorForJson( v::notEmpty()->validate( $value ), 'Выберите валюту', $key );
			}
			if ( $key == 'paymentFrom' )
			{
				self::errorForJson( v::notEmpty()->validate( $value ), 'Выберите форму оплаты', $key );
			}
			if ( $key == 'paymentMoment' )
			{
				self::errorForJson( v::notEmpty()->validate( $value ), 'Выберите момент оплаты', $key );
			}

			if ( $key == 'groupageCargo' || $key == 'key' )
			{
				continue;
			} else
			{
				self::errorForJson( v::notEmpty()->validate( $value ), 'Поле не длжно быть пустым', $key );
			}
		}

		return $data;
	}
}