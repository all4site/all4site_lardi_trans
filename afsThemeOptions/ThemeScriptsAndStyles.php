<?php


namespace AFS;


class ThemeScriptsAndStyles
{
	public function __construct()
	{
		add_action( 'wp_enqueue_scripts', [ $this, 'registerScripts' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'adminCss' ] );

	}

	public function registerScripts()
	{
		$paypalID = fw_get_db_settings_option('paypalID');
		wp_enqueue_script( 'vueDraggableJs', get_template_directory_uri() . '/app/js/vendor/Sortable.min.js', '', '', true );
		wp_enqueue_script( 'vueJs', get_template_directory_uri() . '/app/js/vendor/vue.js', [ 'axiosJs' ], '', true );
		wp_enqueue_script( 'axiosJs', get_template_directory_uri() . '/app/js/vendor/axios.js', '', '', true );
		wp_enqueue_script( 'mainJs', get_template_directory_uri() . '/app/js/main.min.js', [ 'vueJs' ], '', true );
		wp_enqueue_script( 'paypalJs', 'https://www.paypal.com/sdk/js?client-id='. $paypalID,  '', '', false );

		wp_enqueue_style( 'fontAwesomeCss', get_template_directory_uri() . '/app/css/all.css' );
		wp_enqueue_style( 'mainCss', get_template_directory_uri() . '/app/css/main.css' );
		wp_enqueue_style( 'hamburgerCss', get_template_directory_uri() . '/app/css/vendor/hamburgers.min.css' );

		if (is_rtl()) {
			wp_enqueue_style( 'bootstrapRtlCss', get_template_directory_uri() . '/app/css/vendor/bootstrap-rtl.min.css' );

		}else{
			wp_enqueue_style( 'bootstrapCss', get_template_directory_uri() . '/app/css/bootstrap.css' );

		}


	}

	public function adminCss()
	{
		wp_enqueue_style( 'adminCss', get_template_directory_uri() . '/app/css/admin/admin.css' );
	}
}