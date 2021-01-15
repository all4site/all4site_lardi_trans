<?php

$userImage = wp_get_attachment_image(
	getCusctomFieldFromUserPost()['userLogo']['attachment_id'],
	'thumbnail',
	'', [
	'class' => 'rounded-circle logo-image ml-3 mr-2',
	'v-if'  => '!show'
] );
$args      = [
	'userLogo' => $userImage
];
?>
<div class="btn btn-primary col-md-7 basic-font-size-small-2 py-2">
	<?php _e( 'Добавить обьявление', 'lardi' ); ?>
	<i class="fas fa-plus ml-3"></i>
</div>

<?php get_template_part( 'afsThemeOptions/template/header/login/loginBotton' ); ?>
<?php get_template_part( 'afsThemeOptions/template/header/login/logoutBotton', '', $args ); ?>

