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
		'goods'      => [
			'name'  => __( 'Груз', 'lardi' ),
			'image' => 'good',
			'link'  => home_url() . '/create/?goods'
		],
		'transports' => [
			'name'  => __( 'Транспорт', 'lardi' ),
			'image' => 'transport',
			'link'  => home_url() . '/create/?transports'
		],
		'offices'    => [
			'name'  => __( 'Перевозка офиса', 'lardi' ),
			'image' => 'officeTransportation',
			'link'  => home_url() . '/create/?offices'
		],
		'cars'       => [
			'name'  => __( 'Попутное авто', 'lardi' ),
			'image' => 'passingCar',
			'link'  => home_url() . '/create/?cars'
		],
		'companions' => [
			'name'  => __( 'Попутчик', 'lardi' ),
			'image' => 'companion',
			'link'  => home_url() . '/create/?companions'
		],
	];

	return $dataCreate;
}

function linkInUserProfile()
{
	$data = [
		'myAnnouncements' => [
			'name' => __( 'Мои обьявления', 'lardi' ),
			'link' => home_url() . '/user/?userposts',
		],
		'subscribe'       => [
			'name' => __( 'Подписка', 'lardi' ),
			'link' => home_url() . '/user/?subscribe',
		],
		'profileSetup'    => [
			'name' => __( 'Настройка профиля', 'lardi' ),
			'link' => home_url() . '/user/?profile',
		],

	];

	return $data;
}

function getCusctomFieldFromUserPost()
{
	$arg               = [
		'post_type' => 'users',
		'author'    => get_current_user_id()
	];
	$postCurrentAuthor = new WP_Query( $arg );

	return fw_get_db_post_option( $postCurrentAuthor->post->ID, '', false );

}

function getPostIdFromUserPost()
{
	$arg  = [
		'post_type' => 'users',
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
	$currentUser = get_current_user_id();
	$arg         = [
		'post_type'      => 'any',
		'author'         => $currentUser,
		'post_status'    => [ 'draft ', 'publish ' ],
		'posts_per_page' => 4,
		'paged'          => get_query_var( 'paged' ) ?: 1
	];
	$wp_query    = new WP_Query( $arg );

	return $wp_query;
}

function my_pagenavi()
{
	global $wp_query;
//	dump($wp_query);
	$big = 999999999; // уникальное число для замены

	$args = array(
		'base'      => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
		'format'    => '',
		'current'   => max( 1, get_query_var( 'paged' ) ),
		'total'     => $wp_query->max_num_pages,
		'type'      => 'plain',
		'next_text' => 'Далее',
		'prev_text' => 'Ранее'


	);

	$result = paginate_links( $args );

	// удаляем добавку к пагинации для первой страницы
	$result = preg_replace( '~/page/1/?([\'"])~', '\1', $result ); ?>

	<div class="row col-md-12 mx-auto d-flex justify-content-center mt-4">
		<?php echo $result ?>
	</div>

<?php }

function currency( $costs, $currensy )
{
	switch ( $currensy )
	{
		case 'USD':
			$cost = '$' . $costs;
			break;
		case 'UA':
			$cost = $costs . 'грн.';
			break;
		default:
			$cost = $costs . 'грн.';

	}


	return $cost;
}








