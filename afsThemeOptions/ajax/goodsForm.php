<?php
add_action( 'wp_ajax_goodsForm', 'goodsForm' );
add_action( 'wp_ajax_nopriv_goodsForm', 'goodsForm' );
require_once( ABSPATH . 'wp-admin/includes/image.php' );
require_once( ABSPATH . 'wp-admin/includes/file.php' );
require_once( ABSPATH . 'wp-admin/includes/media.php' );

function goodsForm()
{
	global $form_error;
	$data = $_POST;
	$data = FormSanitize::sanitizeGoodsPage( $data );
	$data = FormValidation::validationGoddsPage( $data );


	if ( $_POST['action'] == 'goodsForm' )
	{
		$post = [
			'post_title'  => $_POST['title'],
			'post_status' => 'publish',
			'post_author' => get_current_user_id(),
			'post_type'   => 'goods',
		];

		$postId         = wp_insert_post( $post );
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


		} else
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

	wp_send_json_success( 'Ваше обьявление добалвенно' );

}