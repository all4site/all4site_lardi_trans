<div class="bg-grey-light shadow-1 mb-5 py-2">
	<div class="row align-items-center col-sm-12 m-auto">
		<div class="col-sm-10 col-8">
			<?php echo do_shortcode( '[wpdreams_ajaxsearchlite]' ); ?>
		</div>

		<div class="arrow col-sm-2 col-2" >
			<div class="hamburger hamburger--spin d-flex" @click.prevent="hamburger" :class="{'is-active': active}">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</div>
		</div>
	</div>
</div>