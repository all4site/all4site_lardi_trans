<?php get_header(); ?>
<?php
require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';
?>
<div class="container">
	<div class="row col-md-5">
<?php get_template_part('afsThemeOptions/template/formPart/fileUpload')?>

	</div>
</div>
<?php get_footer(); ?>