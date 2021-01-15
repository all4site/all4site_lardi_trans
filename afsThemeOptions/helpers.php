<?php
add_action( 'user_register', 'addPostWhenUserIsRegistering' );
function addPostWhenUserIsRegistering( $user_id )
{
	global $post;
	$post_data = array(
		'post_title'  => get_userdata( $user_id )->nickname,
		'post_status' => 'publish',
		'post_author' => $user_id,
		'post_type'   => 'user',
		'meta_input'  => [ 'user_id' => $user_id ],
	);

	$post_id = wp_insert_post( $post_data );

}

function createCategoryBlock()
{
	$dataCreate = [
		'goods'                 => [
			'name'  => __( 'Груз', 'lardi' ),
			'image' => 'good',
			'link'  => '/create?goods'
		],
		'transports'            => [
			'name'  => __( 'Транспорт', 'lardi' ),
			'image' => 'transport',
			'link'  => '/create?transports'
		],
		'officeTransportations' => [
			'name'  => __( 'Перевозка офиса', 'lardi' ),
			'image' => 'officeTransportation',
			'link'  => '/create?officeTransportations'
		],
		'passingCars'           => [
			'name'  => __( 'Попутное авто', 'lardi' ),
			'image' => 'passingCar',
			'link'  => '/create?cars'
		],
		'companions'            => [
			'name'  => __( 'Попутчик', 'lardi' ),
			'image' => 'companion',
			'link'  => '/create?companions'
		],
	];

	return $dataCreate;
}

function linkInUserProfile()
{
	$data = [
		'myAnnouncements' => [
			'name' => __( 'Мои обьявления', 'lardi' ),
			'link' => '?userposts',
		],
		'subscribe'       => [
			'name' => __( 'Подписка', 'lardi' ),
			'link' => '?subscribe',
		],
		'profileSetup'    => [
			'name' => __( 'Настройка профиля', 'lardi' ),
			'link' => '?profile',
		],

	];

	return $data;
}

function getCusctomFieldFromUserPost()
{
	$arg               = [
		'post_type' => 'user',
		'author'    => get_current_user_id()
	];
	$postCurrentAuthor = new WP_Query( $arg );

	return fw_get_db_post_option( $postCurrentAuthor->post->ID, '', false );

}

function getPostIdFromUserPost()
{
	$arg  = [
		'post_type' => 'user',
		'author'    => get_current_user_id()
	];
	$post = new WP_Query( $arg );

	return $post->post->ID;

}

function getCusctomFieldFromUserPostWithData( $postType )
{
	$data = [];
	$arg  = [
		'post_type' => $postType,
	];
	$post = new WP_Query( $arg );
	while ( $post->have_posts() ) :$post->the_post();
		$title             = fw_get_db_post_option( $post->post->ID, 'adsSlug', false );
		$data[ $title ]    = fw_get_db_post_option( $post->post->ID, '', false );
		$data['postTitle'] = get_the_title();
	endwhile;

	return $data;

}

function getAllUserPosts()
{
	//TODO Доделать вывод постов. Сейчас их нет
	$currentUser = get_current_user_id();
	$arg         = [
		'post_type' => any,
		'author'    => $currentUser,
		'post_status' => ['draft ', 'publish ']
	];
	$posts       = new WP_Query( $arg );

	return $posts;
}
