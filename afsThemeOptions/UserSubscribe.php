<?php

namespace AFS;

class UserSubscribe
{
	public function __construct()
	{
		add_action( 'template_redirect', [ $this, 'checkSubsribeInit' ] );
	}

	public static function getSubscribePrice()
	{
		$data = fw_get_db_settings_option( 'subscribeData' );

		return $data['price'] ?? '';
	}

	public static function getSubscribePriceSmall()
	{
		$data = fw_get_db_settings_option( 'subscribeData' );

		return $data['priceSmall'] ?? '';
	}
	public static function getSubscribeTextarea()
	{
		$data = fw_get_db_settings_option( 'subscribeData' );

		return $data['priceTextarea'] ?? '';
	}

	public static function getSubscribeRules()
	{
		$data = fw_get_db_settings_option( 'subscribeData' );

		return $data['subscribeRules'] ?? '';
	}

	public function checkSubsribeInit()
	{
		$subscribeData  = subscribeDateToNumber();
		$subscribeOffOn = fw_get_db_settings_option( 'subscribeOffOn' );
		if ( $subscribeOffOn )
		{
			if ( is_user_logged_in() && ! $subscribeData && is_page( 'user' ) )
			{
				wp_redirect( 'subscribe' );
				exit();
			}
		}

	}
}