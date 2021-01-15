<?php


class errorForVue
{
	public static function errorToArray( $errors )
	{
		$data = [];
		foreach ( $errors as $key => $value )
		{
			$data[ $key ] = $value[0];
		}

		return $data;
	}


}