<?php


class FormSanitize
{

	public static function sanitizeGoodsPage( $data )
	{
		foreach ( $data as $key => $value )
		{
			$data[ $key ] = sanitize_text_field( $value );
			if ( $key == 'description' )
			{

				$data[ $key ] = sanitize_textarea_field( $value );
			}
			if ( $key == 'lenth' || $key == 'width' || $key == 'height' || $key == 'weight' || $key == 'volume' || $key == 'costInput' )
			{
				$data[ $key ] = absint( $value );
			}

			if ( $key == 'email' )
			{
				$data[ $key ] = sanitize_email( $value );
			}
			if ( $key == 'name' )
			{
				$data[ $key ] = sanitize_user( $value );
			}


		}

		return $data;
	}
}