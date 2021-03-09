<?php $args = getCusctomFieldFromUserPost(); ?>
<a href="<?php echo home_url() . '/user/?userposts' ?>" target="_blank" class="btn btn-primary col-md-7 basic-font-size-small-2 py-2">
	<?php _e( 'Добавить обьявление', 'lardi' ); ?>
	<i class="fas fa-plus ml-3"></i>
</a>

<?php get_template_part( 'afsThemeOptions/template/header/login/loginBotton' ); ?>
<?php if ( is_user_logged_in() )
{
	get_template_part( 'afsThemeOptions/template/header/login/logoutBotton', '', $args );
} ?>

