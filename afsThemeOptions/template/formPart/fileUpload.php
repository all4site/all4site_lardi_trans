<div is="multiimageCreateUpdate" inline-template>

	<div class="custom-file mb-3 h-auto my-height-170">

		<label class="custom-file-label h-auto py-4 ustom-file-label-no-image form-control" for="customFile" id="multiImageUpload">
			<p class="m-0"><i class="fas fa-camera text-secondary"></i></p>
			<span class="border-bottom border-dark"><?php _e( 'Добавить фотографию', 'lardi' ) ?></span>
			<br>
			<span class="basic-font-size-small-3"><?php _e( 'Можно добавить до 3-х фото', 'lardi' ) ?></span>
			<br>
			<span class="basic-font-size-small-3"><?php _e( 'Первое фото - обложка', 'lardi' ) ?></span>
			<br>
			<span class="basic-font-size-small-3"><?php _e( 'Размер фото до 1mb', 'lardi' ) ?></span>
		</label>

		<input type="file" class="custom-file-input" id="customFile" name="multiImageUpload" @change="previewImages" @click="reset" multiple>
		<?php get_template_part( 'afsThemeOptions/template/formPart/formErrors' ) ?>
		<div class="col-md-12 px-0 d-flex blockUpload flex-wrap" id="drop-zone"></div>
	</div>

</div>