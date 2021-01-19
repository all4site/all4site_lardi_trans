<?php get_header();
global $post;
$currentUserId       = get_current_user_id();
$currentPostAuthorId = get_post( $_GET['postid'] )->post_author;
$data                = [ 'error' => 'У вас нет досупа к этой странице' ];
$postData            = fw_get_db_post_option( $_GET['postid'], '', true );
if ( ! empty( $postData ) )
{
	$data = $postData;
} else
{
	$data = '';
}
if ( $currentUserId == $currentPostAuthorId )
{
	foreach ( createCategoryBlock() as $key => $value )
	{

		if ( $_GET['category'] == $key )
		{
			get_template_part( 'afsThemeOptions/template/category/' . $key, '', $data );
		}
	}
} else
{
	get_template_part( 'afsThemeOptions/template/error/errorPage', '', $data );
}

get_footer();
