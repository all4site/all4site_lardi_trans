<div class="conteiner-fluid bg-grey-light border border-bottom mb-5" id="header">
	<div class="wrapper m-auto">

		<div class="row py-4 align-items-center d-flex">

			<a class="text-dark col-md-1 text-decoration-none over" href="#"><h3 class="font-weight-bold">LOGO</h3></a>

			<?php get_template_part( 'afsThemeOptions/template/header/headerCategory')?>

			<form class="col-md-6">
				<input class="form-control mr-sm-2" type="search" placeholder="Найти" aria-label="Search">
			</form>


			<div class="rightColumnMenu d-flex align-items-center col-md-3">
				<?php get_template_part( 'afsThemeOptions/template/header/headerLogin');?>
			</div>
		</div>
	</div>
</div>


