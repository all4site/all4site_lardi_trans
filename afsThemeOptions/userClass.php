<?php


class userClass
{

	public function __construct()
	{
		add_action( 'user_register', [ $this, 'registerCustomPostTypeAfterUserRegistration' ] );
		add_action( 'wp_logout', [ $this, 'logOutRedirect' ] );
		add_action( 'init', [ $this, 'logOut' ] );
	}

	public function registerCustomPostTypeAfterUserRegistration( $user_id )
	{

		$userData = get_userdata( $user_id );
		$post     = [
			'post_title'  => $userData->nickname,
			'post_status' => 'publish',
			'post_author' => $userData->ID,
			'post_type'   => 'users',
		];

		$posID       = wp_insert_post( $post );
		$getPostMeta = fw_get_db_post_option( $posID, '', true );
		$getPostMeta = [
			'nickName'  => $userData->nickname,
			'userEmail' => $userData->user_email
		];
		update_post_meta( $posID, 'fw_options', $getPostMeta );
		update_user_meta( $userData->ID, 'show_admin_bar_front', '' );
	}
	public function logOut()
	{
		if ( isset( $_POST['logoutBtn'] ) )
		{
			wp_logout();
		}
	}

	public function logOutRedirect()
	{
		wp_safe_redirect( home_url() );
		exit;
	}

}

new userClass();