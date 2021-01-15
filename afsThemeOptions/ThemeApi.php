<?php


class ThemeApi
{
	public function __construct()
	{
		add_action( 'rest_api_init', [ $this, 'add_custom_fields' ] );
	}

	public function add_custom_fields()
	{
		register_rest_field(
			['goods', 'transports'],
			'custom_fields', //New Field Name in JSON RESPONSEs
			array(
				'get_callback'    => [ $this, 'get_custom_fields' ], // custom function name
				'update_callback' => null,
				'schema'          => null,
			)
		);
	}


	public function get_custom_fields( $object, $field_name, $request )
	{

		if ( is_user_logged_in() && $object['author'] == get_current_user_id() )
		{
			$customfieldvalue = fw_get_db_post_option( $object['id'], '', true );

		} else
		{
			$customfieldvalue = 'Ошибка';
		}


		return $customfieldvalue;
	}

}

new ThemeApi();