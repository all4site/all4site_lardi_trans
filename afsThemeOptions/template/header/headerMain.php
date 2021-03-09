<div class="bg-viollet shadow-1 mb-5" id="header">
	<div class="wrapper m-auto">

		<div class="row py-4 align-items-center d-flex">

			<a class="text-dark col-md-1 text-decoration-none over" href="<?php echo home_url(); ?>">
<!--				<h3 class="font-weight-bold">LOGO</h3>-->
				<img src="<?php echo fw_get_db_settings_option('logo')['url']?>" alt="" class="w-100">
			</a>

			<?php get_template_part( 'afsThemeOptions/template/header/headerCategory' ) ?>

			<div class="col-md-6">
				<?php echo do_shortcode( '[wpdreams_ajaxsearchlite]' ); ?>

			</div>

			<div class="rightColumnMenu d-flex align-items-center col-md-3">
				<?php get_template_part( 'afsThemeOptions/template/header/headerLogin' ); ?>
			</div>
		</div>
	</div>
</div>


