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
			<?php get_template_part( 'afsThemeOptions/template/user/user', 'logo', $args ) ?>
			<?php get_template_part( 'afsThemeOptions/template/user/user', 'category', $args ) ?>
		</div>
		<div class="row">
			<?php get_template_part( 'afsThemeOptions/template/user/user', 'menu', $args ) ?>

			<?php if ( isset( $_GET['profile'] ) ): ?>
				<?php get_template_part( 'afsThemeOptions/template/user/user', 'data', $args ) ?>
			<?php endif; ?>

			<?php if ( $getString === 'subscribe' ): ?>
				<?php get_template_part( 'afsThemeOptions/template/user/user', 'subscribe', $subscribeData ); ?>
			<?php endif; ?>

			<?php if ( isset( $_GET['userposts'] ) ): ?>
				<?php get_template_part( 'afsThemeOptions/template/user/user', 'posts', $userPostData ); ?>
			<?php endif; ?>
		</div>
	</div>

	<div class="container-fluid col-md-3 float-left" id="adsBlock" is="adsBlock" inline-template>
		<div class="row position-relative">
			<div class="asd-wrapper" :class="data" :style="{top: dataCss}">
				<?php get_template_part( 'afsThemeOptions/template/adds/userProfile/add', 'one', $adsData ) ?>
				<?php get_template_part( 'afsThemeOptions/template/adds/userProfile/add', 'two', $adsData ) ?>

			</div>
		</div>
	</div>

</div>

<?php get_footer() ?>
