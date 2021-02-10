<?php
add_action( 'wp_ajax_transportCreatePost', 'transportCreatePost' );
add_action( 'wp_ajax_nopriv_transportCreatePost', 'transportCreatePost' );
require_once( ABSPATH . 'wp-admin/includes/image.php' );
require_once( ABSPATH . 'wp-admin/includes/file.php' );
require_once( ABSPATH . 'wp-admin/includes/media.php' );

function transportCreatePost()
{
	global $form_error;
//	dump( $_POST );
//	dump( $_FILES );
//	dump(fw_get_db_post_option( 1294, '', true ));
	$data = $_POST;
	$data = FormSanitize::sanitizeGoodsPage( $data );
	$data = FormValidation::validationGoddsPage( $data );


	if ( $_POST['action'] == 'transportCreatePost' )
	{


		if ( ! empty( $data['postID'] ) )
		{
			$postId = $data['postID'];
			wp_update_post( [
				'ID'         => $postId,
				'post_title' => $data['title']
			] );
		}else{

			$post = [
				'post_title'  => $_POST['title'],
				'post_status' => 'publish',
				'post_author' => get_current_user_id(),
				'post_type'   => 'transports',
			];

			$postId = wp_insert_post( $post );
		}

		$userCustomPost = fw_get_db_post_option( $postId, '', true );
		$userCustomPost = wp_parse_args( $data, $userCustomPost );
		update_post_meta( $postId, 'fw_options', $userCustomPost );


		if ( ! empty( $_FILES ) && isset( $_POST['key'] ) )
		{
			foreach ( $_POST['key'] as $key => $value )
			{

				$atId = media_handle_upload( $key, $postId );
				$link = wp_get_attachment_image_url( $atId );

				$photo[] = [
					'attachment_id' => $atId,
					'url'           => $link
				];


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
				$userCustomPost['photo'] = $photo;
				update_post_meta( $postId, 'fw_options', $userCustomPost );
			}


		} elseif ( empty( $_FILES ) && isset( $_POST['key'] ) )
		{
			$photo = $userCustomPost['photo'];
			foreach ( $_POST['key'] as $key => $value )
			{
				$newPhoto[ $key ] = $photo[ $value ];
			}

			$userCustomPost['photo'] = $newPhoto;
			update_post_meta( $postId, 'fw_options', $userCustomPost );

		} elseif ( ! empty( $_FILES ) )

		{

			foreach ( $_FILES as $key => $value )
			{
				$atId = media_handle_upload( $key, $postId );
				$link = wp_get_attachment_image_url( $atId );

				$photo[] = [
					'attachment_id' => $atId,
					'url'           => $link
				];


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

				$userCustomPost['photo'] = $photo;
				update_post_meta( $postId, 'fw_options', $userCustomPost );
			}


		}


	}

	wp_send_json_success( 'Ваше обьявление обновленно' );

}