<?php

namespace AFS;

class FormSanitize
{

	public static function sanitizeGoodsPage( $data )
	{
		foreach ( $data as $key => $value )
		{
			switch ($key){
				case 'description':
					$data[ $key ] = sanitize_textarea_field( $value );
					continue 2;
				case 'lenth':
					$data[ $key ] = absint( $value );
					continue 2;
				case 'width':
					$data[ $key ] = absint( $value );
					continue 2;
				case 'height':
					$data[ $key ] = absint( $value );
					continue 2;
				case 'weight':
					$data[ $key ] = absint( $value );
					continue 2;
				case 'volume':
					$data[ $key ] = absint( $value );
					continue 2;
				case 'costInput':
					$data[ $key ] = absint( $value );
					continue 2;
				case 'email':
					$data[ $key ] = sanitize_email( $value );
					continue 2;
				case 'name':
					$data[ $key ] = sanitize_user( $value );
					continue 2;
				default:
					$data[ $key ] = sanitize_text_field( $value );

			}

		}

		return $data;
	}
}