<div is="slick" inline-template>
	<Vue-slick-carousel v-bind="settings">
		<?php foreach ( $args['photo'] as $key => $value ): ?>
			<div>
				<img src="<?php echo $value['url'] ?>" class="w-100 object-fit-cover h-fit-content my-slick-dragging-off rounded my-slider-image">
			</div>
		<?php endforeach; ?>
	</Vue-slick-carousel>

</div>


