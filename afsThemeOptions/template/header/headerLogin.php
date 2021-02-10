<?php $args = getCusctomFieldFromUserPost(); ?>
<div class="btn btn-primary col-md-7 basic-font-size-small-2 py-2">
	<?php _e( 'Добавить обьявление', 'lardi' ); ?>
	<i class="fas fa-plus ml-3"></i>
</div>

<?php get_template_part( 'afsThemeOptions/template/header/login/loginBotton' ); ?>
<?php get_template_part( 'afsThemeOptions/template/header/login/logoutBotton', '', $args ); ?>

