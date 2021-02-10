<?php

namespace AFS;

class PostDeleteAndEdit
{
	public function __construct()
	{
		add_action( 'template_redirect', [ $this, 'deletePost' ] );
		add_action( 'template_redirect', [ $this, 'draftPost' ] );
		add_action( 'template_redirect', [ $this, 'publishPost' ] );
		add_action( 'before_delete_post', [ $this, 'deleteImageFromPost' ] );
	}

	public function deletePost()
	{

		if ( ! empty( $_POST['delete'] ) )
		{
			$post_id = $_POST['delete'];
			wp_trash_post( $post_id );
		}

	}

	public function draftPost()
	{
		if ( ! empty( $_POST['draft'] ) && $_POST['draft'] != '' )
		{
			$postID = $_POST['draft'];
			wp_update_post( [
				'ID'          => $postID,
				'post_status' => 'draft'
			] );
		}
	}

	public function publishPost()
	{
		if ( ! empty( $_POST['publish'] ) && $_POST['publish'] != '' )
		{
			$postID = $_POST['publish'];
			wp_update_post( [
				'ID'          => $postID,
				'post_status' => 'publish'
			] );
		}
	}

	public function deleteImageFromPost( $id )
	{
		$attachments = get_attached_media( '', $id );
		foreach ( $attachments as $attachment )
		{
			wp_delete_attachment( $attachment->ID, 'true' );
		}
	}
}
