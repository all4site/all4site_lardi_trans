<?php

namespace AFS;
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

			switch ( $key )
			{
				case 'currency':
					self::errorForJson( ! v::falseVal()->validate( $value ), 'Выберите валюту', $key );
					break;
				case 'paymentFrom':
					self::errorForJson( ! v::falseVal()->validate( $value ), 'Выберите форму оплаты', $key );
					break;
				case 'paymentMoment':
					self::errorForJson( ! v::falseVal()->validate( $value ), 'Выберите момент оплаты', $key );
					break;
				case 'description':
					self::errorForJson( v::length( 50, null )->validate( $value ), 'Минимум 50 символов', $key );
					break;
				case  'groupageCargo':
					continue 2;
				case  '_wp_http_referer':
					continue 2;
				case 'key':
					continue 2;
				case 'postID':
					continue 2;
				case 'multiImageUpload':
					continue 2;
				case 'formButton':
					continue 2;
				case 'loading':
					continue 2;
				case 'unloading':
					continue 2;
				case 'packaging':
					continue 2;
				case 'riggingWorks':
					continue 2;
				default:
					self::errorForJson( v::notEmpty()->validate( $value ), 'Поле не длжно быть пустым', $key );
			}

		}

		return $data;
	}
}