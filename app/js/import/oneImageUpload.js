Vue.component('oneImageUpload', {
	data()
	{
		return {
			size: 2000000,
			sizeMessage: 'Файл очень большой',
		}
	},
	methods: {
		userLogoData(e)
		{

			let file = e.target.files
			const preview = document.querySelector('#preview');

			if (file[0].size > this.size)
			{
				let size = (file[0].size / 1024 / 1024).toFixed(2)
				let reader = new FileReader();

				reader.onload = () =>
				{
					preview.insertAdjacentHTML('afterbegin', `
									<div class="position-relative mb-3 w-50">
										<i class="far fa-trash-alt cursor-pointer trash-form-icon-file_upload delete-image z-index-1" id="deletImage"></i>
										<img src="http://larditrans.loc/wp-content/themes/all4site_lardi_trans/app/img/noLogo.png" name="${file[0].name}"  class="img-fluid img-thumbnail">
										<span class="my-image-name-error">${file[0].name}</span>
										<span class="my-image-error">${this.sizeMessage - size} МБ</span>
										<span class="my-image-error-bg rounded"></span>
									</div>`)
					this.deleteImage()
				};

				reader.readAsDataURL(file[0]);

			} else
			{
				let reader = new FileReader();

				reader.onload = () =>
				{

					preview.insertAdjacentHTML('afterbegin', `
										<div class="position-relative mb-3 w-50">
												<i class="far fa-trash-alt cursor-pointer trash-form-icon-file_upload delete-image z-index-1" id="deletImage"></i>
												<img src="${reader.result}" name="${file[0].name}"  id="${file[0].name}" class="img-fluid img-thumbnail">
												<span class="my-image-name rounded-top">${file[0].name}</span>
												<div id="errorMesages"></div>
										</div>`)

					document.getElementById('user-logo').src = reader.result
					document.getElementById('user-logo-header').src = reader.result
					this.deleteImage()
				};

				reader.readAsDataURL(file[0]);
			}

		},

		deleteImage()
		{
			let target = document.getElementById('deletImage')
			target.addEventListener('click', function (e)
			{
				e.target.parentNode.remove()
			})

		},

		reset(e)
		{
			let target = document.getElementById('preview').firstElementChild
			if (target !== null)
			{
				target.remove()
			}
			e.target.value = ''
		},
	}
})