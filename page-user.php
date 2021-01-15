<?php get_header() ?>
<?php
$args          = getCusctomFieldFromUserPost();
$adsData       = getCusctomFieldFromUserPostWithData( 'ads' );
$subscribeData = getCusctomFieldFromUserPostWithData( 'subscribe' );
$getString     = ( $_SERVER['QUERY_STRING'] ) ? $_SERVER['QUERY_STRING'] : '';
$userPostData  = getAllUserPosts();

?>
<div class="wrapper mb-5 m-auto">
	<div class="container-fluid col-md-9 float-left">
		<div class="row mb-1">
			<?php get_template_part( 'afsThemeOptions/template/user/userLogo', '', $args ) ?>
			<?php get_template_part( 'afsThemeOptions/template/user/userCategory', '', $args ) ?>
		</div>
		<div class="row">
			<?php get_template_part( 'afsThemeOptions/template/user/userMenu', '', $args ) ?>

			<?php if ( isset( $_GET['profile'] ) ): ?>
				<?php get_template_part( 'afsThemeOptions/template/user/userContent', '', $args ) ?>
			<?php endif; ?>

			<?php if ( $getString === 'subscribe' ): ?>
				<?php get_template_part( 'afsThemeOptions/template/user/userSubscribe', '', $subscribeData ); ?>
			<?php endif; ?>

			<?php if ( isset( $_GET['userposts'] ) ): ?>
				<?php get_template_part( 'afsThemeOptions/template/user/userPosts', '', $userPostData ); ?>
			<?php endif; ?>
		</div>
	</div>

	<div is="adsBlock" inline-template class="container-fluid col-md-3 float-left" id="adsBlock">
		<div class="row position-relative">
			<div class="asd-wrapper" :class="data" :style="{top: dataCss}">
				<?php get_template_part( 'afsThemeOptions/template/adds/userProfile/addOne', '', $adsData ) ?>
				<?php get_template_part( 'afsThemeOptions/template/adds/userProfile/addTwo', '', $adsData ) ?>

			</div>
		</div>
	</div>

</div>

<?php get_footer() ?>
