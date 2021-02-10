<?php get_header() ?>
<?php
$args = fw_get_db_post_option( $post->ID );
$cost = currency( $args['costInput'], $args['currency'] );
//dump( $args );
?>
	<div class="container-fluid d-flex flex-wrap wrapper justify-content-center">

		<div class="row col-md-3 mr-md-1 bg-grey-light text-secondary">

			<div class="col-md-12 text-center font-weight-bold basic-font-size-big-7 py-5 text-dark">
				<?php echo $cost ?>
			</div>

			<span class="col-12 text-center text-uppercase font-weight-bold mb-3 basic-font-size-small-2">Детали</span>

			<div class="row col-md-12 mx-auto mb-5">
				<?php get_template_part( 'afsThemeOptions/template/frontend/single/goods', 'single', $args ) ?>
			</div>

		</div>

		<div class="row col-md-6 h-fit-content">

			<div class="col-md-12 img-fluid">
				<?php get_template_part( 'afsThemeOptions/template/slider/slider', '', $args ) ?>
			</div>

			<div is="popup" inline-template>
				<div class="col-md-12 m-0 p-0 d-flex h-fit-content mt-7 position-relative">
					<?php get_template_part( 'afsThemeOptions/template/user/frontend/adds', 'userdata', $args ) ?>
				</div>
			</div>

			<div class="col-md-12 h-fit-content mt-4">
				<h2><?php echo $args['title'] ?></h2>
				<p><?php echo $args['description'] ?></p>
			</div>
		</div>

		<div class="col-md-3 ml-md-1 d-flex justify-content-center" id="adsBlock" is="adsBlock" inline-template>
			<div class="row position-relative">
				<div class="asd-wrapper" :class="data" :style="{top: dataCss}">
					<?php get_template_part( 'afsThemeOptions/template/adds/userProfile/add', 'one', $adsData ) ?>
					<?php get_template_part( 'afsThemeOptions/template/adds/userProfile/add', 'two', $adsData ) ?>

				</div>
			</div>
		</div>
	</div>

<?php get_footer() ?>