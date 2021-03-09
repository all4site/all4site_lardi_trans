<?php

namespace AFS;

class Ads
{
	static string $topRight;
	static string $bottomRight;
	static string $smallCenter;
	static string $emptyImageBig;
	static string $emptyImageSmall;

	public function __construct()
	{
		self::$topRight        = 'adsTopRight';
		self::$bottomRight     = 'adsBottomRight';
		self::$smallCenter     = 'adsSmallTop';
		self::$emptyImageBig   = get_template_directory_uri() . '/app/img/add.jpg';
		self::$emptyImageSmall = get_template_directory_uri() . '/app/img/whideAdd.jpg';
	}

	/*
	 * Ads Top Right
	 */
	public static function getAdsTopRightLink()
	{

		$link = fw_get_db_settings_option( self::$topRight )['link'];

		return ( ! empty( $link ) ) ? $link : '#!';

	}

	public static function getAdsTopRightUrl()
	{
		$url = fw_get_db_settings_option( self::$topRight )['upload']['url'];

		return ( ! empty( $url ) ) ? $url : self::$emptyImageBig;
	}

	public static function getAdsTopRightUrlId()
	{
		$attachmentId = fw_get_db_settings_option( self::$topRight )['upload']['attachment_id'];

		return ( ! empty( $attachmentId ) ) ? $attachmentId : '';
	}

	public static function getAdsTopRightText()
	{
		$text = fw_get_db_settings_option( self::$topRight )['text'];

		return ( ! empty( $text ) ) ? $text : '';
	}

	/*
	 * AdsBottom Right
	 */
	public static function getAdsBottomRightLink()
	{
		$link = fw_get_db_settings_option( self::$bottomRight )['link'];

		return ( ! empty( $link ) ) ? $link : '#!';
	}

	public static function getAdsBottomRightUrl()
	{
		$url = fw_get_db_settings_option( self::$bottomRight )['upload']['url'];

		return ( ! empty( $url ) ) ? $url : self::$emptyImageBig;
	}

	public static function getAdsBottomRightUrlId()
	{
		$attachmentId = fw_get_db_settings_option( self::$bottomRight )['upload']['attachment_id'];

		return ( ! empty( $attachmentId ) ) ? $attachmentId : '';
	}

	public static function getAdsBottomRightText()
	{
		$text = fw_get_db_settings_option( self::$bottomRight )['text'];

		return ( ! empty( $text ) ) ? $text : '';
	}

	/*
	 * Ads center
	 */
	public static function getAdsCenterLink()
	{
		$link = fw_get_db_settings_option( self::$smallCenter )['link'];

		return ( ! empty( $link ) ) ? $link : '#!';
	}

	public static function getAdsCenterUrl()
	{
		$url = fw_get_db_settings_option( self::$smallCenter )['upload']['url'];

		return ( ! empty( $url ) ) ? $url : self::$emptyImageSmall;
	}

	public static function getAdsCenterUrlId()
	{
		$attachmentId = fw_get_db_settings_option( self::$smallCenter )['upload']['attachment_id'];

		return ( ! empty( $attachmentId ) ) ? $attachmentId : '';
	}

	public static function getAdsCenterText()
	{
		$text = fw_get_db_settings_option( self::$smallCenter )['text'];

		return ( ! empty( $text ) ) ? $text : '';
	}
}