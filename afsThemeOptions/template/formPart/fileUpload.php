
<div is="multiimageCreateUpdate" inline-template>
	<div>
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

			<input type="file" class="custom-file-input" id="customFile" name="multiImageUpload" @change="multipleImageUploadPreview" @click="reset" multiple>

			<div class="col-md-12 px-0 d-flex blockUpload" id="drop-zone" @mouseover="dragImage">

				<div v-for="(file, index) in files" :key="file.name" v-if="file.showLogo"
				     class="position-relative mx-0  col  overflow-hidden drag-el"
				     :class="customClass"
				     :id="index">
					<input type="text" name="key[]" :value="index" hidden>

					<i class="far fa-trash-alt trash-form-icon cursor-pointer trash-form-icon-file_upload" @click="deleteImage"></i>

					<img :src="file.logoPrev" :name="file.name" class="w-100 h-100 h-100 object-fit-cover rounded">

					<div v-if="file.error!=''" class="text-danger text-center image-error">{{file.error}}</div>
				</div>

			</div>
		</div>


	</div>

</div>