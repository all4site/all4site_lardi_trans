<?php

use Respect\Validation\Validator as v;


class passwordValidation
{

	public static function isRequire( $data, $errorName )
	{
		global $form_error;
		if ( $data == '' )
		{
			$form_error->add( $errorName, __( 'Это обязательное поле', 'lardi' ) );

			return $form_error;
		} else
		{
			return $data;
		}

	}

	public static function fileSize( $data, $size )
	{
		global $form_error;
		if ( $data > $size )
		{

			return $form_error->add( 'bigSize', __( 'Файл очень большой - ' . size_format( $data, 2 ), 'lardi' ) );
		} else
		{
			return true;
		}
	}

	public static function multiUploadFileSize( $data = [], $size )
	{
		global $form_error;

		foreach ( $data as $key => $value )
		{

			if ( $value['size'] > $size )
			{
				$form_error->add( $value['name'], __( 'Файл очень большой - ' . size_format( $value['size'], 2 ), 'lardi' ) );
			}
		}

		return $form_error;

	}

	public function checkAll( $currentPassword, $newPassword, $confirmNewPassword )
	{
		global $form_error;
		$data = [];

		$this->currentPasswordValidation( $currentPassword, 'currentPassowrd' );
		$this->newPasswordValidation( $newPassword, 'newPassword' );
		$this->newPasswordValidation( $confirmNewPassword, 'confirmPassword' );
		$this->isPasswordsEqual( $newPassword, $confirmNewPassword, 'noEqual' );

		foreach ( $form_error->errors as $key => $value )
		{
			if ( ! empty( $key ) )
			{
				$data[ $key ] = $value[0];
				break;
			}

		}

		return $data;
	}

	public function currentPasswordValidation( $data, $errorName )
	{
		global $form_error;
		$userData         = get_userdata( get_current_user_id() );
		$userHashPassword = $userData->user_pass;

		if ( ! v::notEmpty()->validate( $data ) )
		{
			$form_error->add( $errorName, __( 'Это обязательное для заполнения поле', 'lardi' ) );
		} elseif ( wp_check_password( $data, $userHashPassword ) == false )
		{
			$form_error->add( $errorName, __( 'Не верный пароль', 'lardi' ) );

		}

		return $form_error;
	}

	public function newPasswordValidation( $data, $errorName )
	{
		global $form_error;

		if ( ! v::notEmpty()->validate( $data ) )
		{
			$form_error->add( $errorName, __( 'Это обязательное для заполнения поле', 'lardi' ) );

		} elseif ( ! v::length( 6, null )->validate( $data ) )
		{

			$form_error->add( $errorName, __( 'Пароль слишком короткий', 'lardi' ) );

		} elseif ( ! v::regex( '/[A-Z][0-9]/' )->validate( $data ) )
		{
			$form_error->add( $errorName, __( 'Пароль должен содержать большие, маленькие буквы и цифры', 'lardi' ) );
		}


		return $form_error;
	}

	public function isPasswordsEqual( $one, $two, $errorName )
	{
		global $form_error;

		if ( $one !== $two )
		{
			$form_error->add( $errorName, __( 'Новые пароли не совпадают', 'lardi' ) );
		}

		return $form_error;
	}

}