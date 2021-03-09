<?php get_header() ?>
<?php
$args          = getCusctomFieldFromUserPost();
$getString     = ( $_SERVER['QUERY_STRING'] ) ? $_SERVER['QUERY_STRING'] : '';
$userPostData  = getAllUserPosts();
?>
<div class="wrapper mb-5 m-auto">
	<div class="container-fluid col-md-9 float-left">
		<div class="row mb-1">
			<?php get_template_part( 'afsThemeOptions/template/user/user', 'logo', $args ) ?>
			<?php get_template_part( 'afsThemeOptions/template/user/user', 'archive', $args ) ?>
		</div>
		<div class="row">
			<?php get_template_part( 'afsThemeOptions/template/user/user', 'menu', $args ) ?>

			<?php if ( isset( $_GET['profile'] ) ): ?>
				<?php get_template_part( 'afsThemeOptions/template/user/user', 'data', $args ) ?>
			<?php endif; ?>

			<?php if ( $getString === 'subscribe' ): ?>
				<?php get_template_part( 'afsThemeOptions/template/user/user', 'subscribe' ); ?>
			<?php endif; ?>

			<?php if ( isset( $_GET['userposts'] ) ): ?>
				<?php get_template_part( 'afsThemeOptions/template/user/user', 'posts', $userPostData ); ?>
			<?php endif; ?>
		</div>
	</div>

	<?php get_template_part( 'afsThemeOptions/template/adds/ads', 'right' ) ?>

</div>

<?php get_footer() ?>
