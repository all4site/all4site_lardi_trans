<?php

use AFS\FormSanitize;
use AFS\FormValidation;

add_action( 'wp_ajax_createAndUpdatePost', 'createAndUpdatePost' );
add_action( 'wp_ajax_nopriv_createAndUpdatePost', 'createAndUpdatePost' );
require_once( ABSPATH . 'wp-admin/includes/image.php' );
require_once( ABSPATH . 'wp-admin/includes/file.php' );
require_once( ABSPATH . 'wp-admin/includes/media.php' );

function createAndUpdatePost()
{
	global $form_error;
//	dump( $_POST );
//	dump( $_FILES);
	$data = $_POST;
	$data = FormSanitize::sanitizeGoodsPage( $data );
	$data = FormValidation::validationGoddsPage( $data );

	if ( isset( $_POST['category'] ) )
	{
		$category = $_POST['category'];

		if ( ! empty( $data['postID'] ) )
		{
			$postId = $data['postID'];
			wp_update_post( [
				'ID'         => $postId,
				'post_title' => $data['title']
			] );

		} else
		{

			$post = [
				'post_title'  => $_POST['title'],
				'post_status' => 'publish',
				'post_author' => get_current_user_id(),
				'post_type'   => $category,
			];

			$postId = wp_insert_post( $post );

		}

		$userCustomPost = fw_get_db_post_option( $postId, '', true );
//		$userCustomPost = wp_parse_args( $data, $userCustomPost );
		foreach ( $data as $key => $value )
		{
			update_post_meta( $postId, $key, $value );
		}

//		update_post_meta( $postId, 'fw_options', $userCustomPost );


		if ( ! empty( $_FILES ) )

		{
			foreach ( $_FILES as $key => $value )
			{
				$atId = media_handle_sideload( $value, $postId );
				$link = wp_get_attachment_image_url( $atId );

				$photo[] = [
					'attachment_id' => $atId,
					'url'           => $link,
					'name'          => $value['name']
				];

				dump($value);
				if ( is_wp_error( $photo[ $key ]['attachment_id'] ) )
				{
					$form_error->add( 'upload', $photo[ $key ]['attachment_id']->get_error_messages() );
				}

			}

			if ( $form_error->has_errors() )
			{
				wp_send_json_error( 'Ошибка при загрузке файла' );
			} else
			{
				set_post_thumbnail($postId, $photo[0]['attachment_id']);
				$userCustomPost['photo'] = $photo;
				update_post_meta( $postId, 'fw_options', $userCustomPost );
			}


		}


	}

	wp_send_json_success( 'Ваше обьявление обновленно' );
}