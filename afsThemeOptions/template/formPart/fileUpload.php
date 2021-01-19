<div class="custom-file mb-3 my-drop-file">
	<div class="text-label custom-file-label h-auto py-4 ustom-file-label-no-image">
		<p class="m-0"><i class="fas fa-camera text-secondary"></i></p>
		<span class="border-bottom border-dark"><?php _e( 'Добавить фотографию', 'lardi' ) ?></span>
		<br>
		<span class="basic-font-size-small-3"><?php _e( 'Можно добавить до 3-х фото', 'lardi' ) ?></span>
		<br>
		<span class="basic-font-size-small-3"><?php _e( 'Первое фото - обложка', 'lardi' ) ?></span>
		<br>
		<span class="basic-font-size-small-3"><?php _e( 'Размер фото до 1mb', 'lardi' ) ?></span>
	</div>
	<div class="z-index-1 position-absolute opacity-0 w-100 h-100 dropzone">
	</div>

	<div class="my-dropzone row col-md-12 m-auto z-index-1 "  id="drop-zone">
	</div>


	<div id="template-preview" class="d-none">
		<div class="w-35 p-0 m-0 position-relative d-flex flex-column object-fit-cover h-fit-content drag-el">
			<div class="position-relative col m-0 p-1 w-100 test-image">
				<img class="w-100 h-100 object-fit-cover img-fluid img-thumbnail rounded" data-dz-thumbnail>
				<i class="far fa-trash-alt trash-form-icon cursor-pointer trash-form-icon-file_upload z-index-1" data-dz-remove></i>

			</div>

			<div class="data-image  position-absolute">
				<div class="data-dz-name" data-dz-name></div>
				<div class="data-dz-size" data-dz-size></div>
				<div class="dz-error-message" ><span data-dz-errormessage></span></div>
			</div>

		</div>
	</div>
</div>

