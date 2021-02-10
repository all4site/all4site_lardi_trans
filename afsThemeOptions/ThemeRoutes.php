<?php

namespace AFS;

class ThemeRoutes
{
	public function __construct()
	{
		$this->init();
	}

	public function init()
	{
		add_action( 'template_redirect', [ $this, 'userRoutes' ] );
	}

	public function userRoutes()
	{
		$data = ( $_SERVER['REQUEST_URI'] ) ? str_replace( '/', '', $_SERVER['REQUEST_URI'] ) : '';

		if ( $data === 'user' && is_user_logged_in() )
		{
			wp_redirect( '/user?profile' );
		}

		if ( is_page( 'user' ) && ! is_user_logged_in() )
		{
			wp_redirect( '/login/' );
		}
		if ( is_page( 'create' ) && ! is_user_logged_in() )
		{
			wp_redirect( '/login/' );
		}
		if ( is_page( 'update' ) && ! is_user_logged_in() )
		{
			wp_redirect( '/login/' );
		}

	}

}
