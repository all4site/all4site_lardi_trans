<?php

class Theme_Activation
{
	public $postType = [
		'users'             => 'Пользователи',
		'ads'               => 'Рекламма',
		'subscribes'        => 'Подписка',
		'goods'             => 'Груз',
		'transports'        => 'Транспорт',
		'ofTransportations' => 'Перевозка офиса',
		'cars'              => 'Попутное авто',
		'companions'        => 'Попутчик',
	];

	public $page = [
		'home'                 => 'Главная',
		'user'                 => 'Пользователи',
		'ad'                   => 'Рекламма',
		'subscribe'            => 'Подписка',
		'good'                 => 'Груз',
		'transport'            => 'Транспорт',
		'officeTransportation' => 'Перевозка офиса',
		'car'                  => 'Попутное авто',
		'companion'            => 'Попутчик',
		'create'               => 'Создать',
		'update'               => 'Обновить',
	];

	public function __construct()
	{
		$this->init();
	}

	public function init()
	{
		add_action( 'init', [ $this, 'createCustomPostType' ] );
		add_action( 'after_switch_theme', [ $this, 'createPages' ] );
		add_action( 'switch_theme', [ $this, 'deletePagesAndCustomPostType' ] );
		add_action( 'wp_logout', [ $this, 'logoutRedirect' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'addAjaxUrlForFrontend' ], 99 );
		add_action( 'admin_menu', [ $this, 'removeMenu' ], 99 );
		add_filter( 'login_redirect', [ $this, 'filter_function_name_7309' ], 10, 3 );
		//TODO Отключил скрытие технических страниц для разработки - НАДО ВКЛЮЧИТЬ
//		add_action( 'pre_get_posts', [ $this, 'hideServicePage' ] );
//		add_action( 'wp_loaded', [ $this, 'errorLoad' ] );
	}

	public function createCustomPostType()
	{

		foreach ( $this->postType as $key => $value )
		{

			register_post_type( $key, array(
				'labels'             => array(
					'name'              => $value, // Основное название типа записи
					'parent_item_colon' => '',
					'menu_name'         => $value,

				),
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => true,
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => 20,
				'supports'           => array( 'title', 'author' ),
//			'taxonomies'         => array( 'category' ),
				'show_in_rest'       => true
			) );
		}
	}

	public function createPages()
	{

		foreach ( $this->page as $key => $value )
		{
			$post = [
				'post_title'  => $key,
				'post_status' => 'publish',
				'post_author' => 1,
				'post_type'   => 'page',
			];

			wp_insert_post( $post );
		}

	}

	public function deletePagesAndCustomPostType()
	{
		foreach ( $this->postType as $key => $value )
		{
			unregister_post_type( $key );
		}

		foreach ( $this->page as $key => $value )
		{
			$postID = get_page_by_title( $key )->ID;
			wp_delete_post( $postID );
		}
	}

	public function logoutRedirect()
	{
		header( 'Location: /' );
		exit;
	}

	public function addAjaxUrlForFrontend()
	{
		wp_localize_script( 'mainData', 'myajax',
			array(
				'url' => admin_url( 'admin-ajax.php' )
			)
		);
	}

	public function errorLoad()
	{
		//TODO Убрал загрузку через хук так как конфликтует с плагином
		global $form_error;
		$form_error = new WP_Error();
	}

	public function removeMenu()
	{
		remove_menu_page( 'edit-comments.php' );
	}

	public function hideServicePage( $query )
	{
		foreach ( $this->page as $key => $value )
		{
			if ( $key == 'subscribe' )
			{
				continue;
			} else
			{
				$pageId[] = get_page_by_title( $key )->ID;
			}
		}
		global $pagenow;
		if ( ! is_admin() )
		{

			return $query;
		}

		if ( 'edit.php' == $pagenow && ( get_query_var( 'post_type' ) && 'page' == get_query_var( 'post_type' ) ) )
		{
			$query->set( 'post__not_in', $pageId );
		}

		return $query;
	}

}

new Theme_Activation();