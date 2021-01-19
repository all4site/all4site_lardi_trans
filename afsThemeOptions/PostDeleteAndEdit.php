<?php


class PostDeleteAndEdit
{
	public function __construct()
	{
		add_action( 'template_redirect', [ $this, 'deletePost' ] );
		add_action( 'template_redirect', [ $this, 'draftPost' ] );
		add_action( 'template_redirect', [ $this, 'publishPost' ] );
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
}

new PostDeleteAndEdit();