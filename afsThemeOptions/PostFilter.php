<?php

namespace AFS;

class PostFilter
{

	public static function metaDataParce( $data )
	{
		$dataMeta = [
			"relation" => "AND"
		];
//	dump( $data );

		foreach ( $data as $key => $value )
		{

			switch ( $value )
			{
				case '':
					continue 2;
				case '0':
					continue 2;
				case in_array( '', $value ):
					continue 2;
				case 'false':
					continue 2;
			}

			switch ( $key )
			{
				case 'action':
					continue 2;
				case 'costInput':
					$dataMeta[] = self::checkMultiInputInput( $key, $value, 'BETWEEN', 'UNSIGNED' );
					continue 2;
				case 'from':
					$dataMeta[] = self::checkMultiInputInput( $key, $value, '' );
					continue 2;
				case 'where':
					$dataMeta[] = self::checkMultiInputInput( $key, $value, '' );
					continue 2;
				case 'date':
					$dataMeta[] = self::checkMultiInputInput( $key, $value, '' );
					continue 2;
				case 'time':
					$dataMeta[] = self::checkMultiInputInput( $key, $value, '' );
					continue 2;
				case 'lenth':
					$dataMeta[] = self::checkMultiInputCheckbox( $key, $value, '' );
					continue 2;
				case 'width':
					$dataMeta[] = self::checkMultiInputCheckbox( $key, $value, '' );
					continue 2;
				case 'height':
					$dataMeta[] = self::checkMultiInputCheckbox( $key, $value, '' );
					continue 2;
				case 'weight':
					$dataMeta[] = self::checkMultiInputCheckbox( $key, $value, '' );
					continue 2;
				case 'volume':
					$dataMeta[] = self::checkMultiInputCheckbox( $key, $value, '' );
					continue 2;
				case 'groupageCargo':
					$dataMeta[] = self::checkMultiInputInput( $key, $value, '' );
					continue 2;
				case 'bodyType':
					$dataMeta[] = self::checkMultiInputInput( $key, $value, 'IN' );
					continue 2;
				case 'transport':
					$dataMeta[] = self::checkMultiInputInput( $key, $value, '' );
					continue 2;
				case 'loading':
					$dataMeta[] = self::checkMultiInputInput( $key, $value, '' );
					continue 2;
				case 'unloading':
					$dataMeta[] = self::checkMultiInputInput( $key, $value, '' );
					continue 2;
				case 'packaging':
					$dataMeta[] = self::checkMultiInputInput( $key, $value, '' );
					continue 2;
				case 'riggingWorks':
					$dataMeta[] = self::checkMultiInputInput( $key, $value, '' );
					continue 2;
				case 'peopleCount':
					$dataMeta[] = self::checkMultiInputInput( $key, $value, '' );
					continue 2;
			}


		}

//	dump( $dataMeta[0][0] );

		return $dataMeta;
	}

	public function checkMultiInputInput( $key, $value, $compare = '', $type = '' )
	{
		if ( ! in_array( '', $value ) )
		{
			$dataMeta[] = [
				'key'     => $key,
				'value'   => $value,
				'compare' => $compare,
				'type'    => $type
			];
		}

		return $dataMeta;
	}

	public function checkMultiInputCheckbox( $key, $value, $compare, $type = '' )
	{
		$dataMeta = [
			'relation' => 'OR'
		];

		foreach ( $value as $k => $v )
		{
			$arr[] = explode( '-', $v );

			if ( $arr[ $k ][1] == 0 )
			{
				$dataMeta[] = [
					'key'     => $key,
					'value'   => $arr[ $k ][0],
					'compare' => '>',
					'type'    => 'UNSIGNED'

				];
			} else
			{

				$dataMeta[] = [

					'key'     => $key,
					'value'   => $arr[ $k ],
					'compare' => 'BETWEEN',
					'type'    => 'UNSIGNED',

				];

			}

		}

		return $dataMeta;
	}

	public static function getFromCity( $posttype )
	{
		$query = get_posts( [
			'post_type'      => $posttype,
			'posts_per_page' => - 1,
		] );
		foreach ( $query as $key => $value )
		{
			$city   = get_post_meta( $value->ID, 'from', true );
			$form[] = $city;
		}

		return array_unique( $form );
	}

	public static function getWhereCity( $posttype )
	{
		$query = get_posts( [
			'post_type'      => $posttype,
			'posts_per_page' => - 1,
		] );
		foreach ( $query as $key => $value )
		{
			$city   = get_post_meta( $value->ID, 'where', true );
			$form[] = $city;
		}

		return array_unique( $form );
	}

	public function checkBoxName( $key, $value, $compare = '', $type = '' )
	{
		if ( is_array( $value ) )
		{
			foreach ( $value as $k => $v )
			{
				$dataMeta[] = [
					'key'     => $key,
					'value'   => $v,
					'compare' => $compare,
					'type'    => $type
				];
			}

			return $dataMeta;
		}
	}
}
