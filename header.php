<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php bloginfo(); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php get_template_part( 'afsThemeOptions/template/preloader/spinner' ) ?>

<div id="app">
	<div class="d-none d-md-block"><?php get_template_part( 'afsThemeOptions/template/header/headerMain' ); ?></div>
	<div is="sliceMenu" inline-template>
		<div class="d-md-none "><?php get_template_part( 'afsThemeOptions/template/header/mobile/header-mobile' ); ?></div>
	</div>