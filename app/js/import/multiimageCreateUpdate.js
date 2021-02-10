Vue.component('multiimageCreateUpdate', {
	data()
	{
		return {
			spiner: false,
			count: 3,
			size: 2000000,
			sizeMessage: 'Файл очень большой',
			countMessage: 'Очень много файлов'
		}
	},

	mounted()
	{
		this.uploadFileAjax()
		this.deleteImage()
		this.dragImage()
	},

	methods: {

		dragImage()
		{
			let player = document.getElementById("drop-zone")
			var sort = Sortable.create(player, {
				group: '.drag-el',
				animation: 20,
			})

		},

		previewImages(e)
		{
			let file = e.target.files
			const preview = document.querySelector('#drop-zone');

			if (file.length > this.count)
			{
				alert(this.countMessage)
				return false
			}


			for (let i = 0; i < file.length; i++)
			{


				if (file[i].size > this.size)
				{
					let size = (file[i].size / 1024 / 1024).toFixed(2)
					let reader = new FileReader();

					reader.onload = () =>
					{
						preview.insertAdjacentHTML('afterbegin', `
													<div class="position-relative col-md-4 overflow-hidden drag-el mt-1 p-1">
														<div class="position-relative w-100 h-100 my-image-error-bg">
															<i class="far fa-trash-alt cursor-pointer trash-form-icon-file_upload delete-image z-index-1" ></i>
															<img src="http://larditrans.loc/wp-content/themes/all4site_lardi_trans/app/img/noLogo.png" name="` + file[i].name + `" class="w-100 h-100 h-100 object-fit-cover rounded test ">
															<span class="my-image-name-error">` + file[i].name + `</span>
															<span class="my-image-error">` + this.sizeMessage + ` - ` + size + ` МБ</span>
															<span class="my-image-error-bg rounded"></span>
														</div>
													</div>`)
					};

					if (this.totalImages() == false)
					{
						break
					}
					reader.readAsDataURL(file[i]);
				} else
				{
					let reader = new FileReader();

					reader.onload = () =>
					{

						preview.insertAdjacentHTML('afterbegin', `
													<div class="position-relative col-md-4 overflow-hidden drag-el w-100 mt-1 p-1">
														<div class="position-relative w-100 h-100">
															<i class="far fa-trash-alt cursor-pointer trash-form-icon-file_upload delete-image z-index-1" ></i>
															<img src="` + reader.result + `" name="` + file[i].name + `" class="w-100 h-100 h-100 object-fit-cover rounded test ">
															<span class="my-image-name rounded-top ">` + file[i].name + `</span>
														</div>
													</div>`)


					};

					if (this.totalImages() == false)
					{
						break;
					}


					reader.readAsDataURL(file[i]);
				}

			}
		},

		totalImages()
		{
			let images = document.querySelectorAll('#drop-zone img')
			for (let i = 0; i < images.length; i++)
			{
				if (i > 1)
				{
					alert(this.countMessage)
					return false
				}
			}
		},

		uploadFileAjax()
		{
			var form = new FormData();
			let postID = document.getElementById('postID')
			form.append('action', 'uploadExistingFiles')
			form.append('postID', postID.value)

			axios.post(myajax.url,
				form, {
					headers: {
						'Content-Type': 'multipart/form-data'
					},
				}).then((response) =>
			{
				if (response.data.success == true)
				{
					let res = response.data.data

					const preview = document.querySelector('#drop-zone');
					for (let i = 0; i < res.length; i++)
					{

						preview.insertAdjacentHTML('afterbegin', `
													<div class="position-relative col-md-4 overflow-hidden drag-el w-100 mt-1 p-1">
														<div class="position-relative w-100 h-100">
															<i class="far fa-trash-alt cursor-pointer trash-form-icon-file_upload delete-image z-index-1" ></i>
															<img src="` + res[i].url + `" name="` + res[i].name + `" class="w-100 h-100 h-100 object-fit-cover rounded test ">
															<span class="my-image-name rounded-top ">` + res[i].name + `</span>
														</div>
													</div>`)
					}

				} else
				{
					return false
				}
			})
		},

		reset(e)
		{
			e.target.value = ''
		},

		deleteImage()
		{
			document.addEventListener('click', function (e)
			{
				if (e.target.classList.contains('delete-image'))
				{
					e.preventDefault()
					e.stopImmediatePropagation()
					let removeDiv = e.target.parentNode.parentNode
					removeDiv.remove()
				}
			})


		},

		// async uploadImages()
		// {
		// 	let form = new FormData()
		// 	form.append('action', 'uploadFileTest')
		//
		// 	let images = document.querySelectorAll('#drop-zone img')
		//
		// 	for (let i = 0; i < images.length; i++)
		// 	{
		// 		let temp = new File([await (await fetch(images[i].src)).blob()], images[i].name)
		// 		form.append([i], temp)
		//
		// 	}
		//
		// 	axios.post(myajax.url,
		// 		form, {
		// 			headers: {
		// 				'Content-Type': 'multipart/form-data'
		// 			},
		// 			onUploadProgress: ((progressEvent) =>
		// 			{
		// 				this.spiner = true
		// 			}),
		// 			onDownloadProgress: ((progressEvent) =>
		// 			{
		// 				this.spiner = false
		// 			}),
		//
		// 		}
		// 	).then((response) =>
		// 	{
		// 	})
		// },
		//
		// multipleImageUploadPreview(e)
		// {
		// 	let file = e.target.files
		// 	var form = new FormData();
		// 	for (let i = 0; i < file.length; i++)
		// 	{
		// 		form.append([i], file[i]);
		// 	}
		//
		// 	form.append('action', 'multiimageCreateUpdate');
		//
		// 	axios.post(myajax.url,
		// 		form, {
		// 			headers: {
		// 				'Content-Type': 'multipart/form-data'
		// 			},
		// 			onUploadProgress: ((progressEvent) =>
		// 			{
		// 				this.spiner = true
		// 			}),
		// 			onDownloadProgress: ((progressEvent) =>
		// 			{
		// 				this.spiner = false
		// 			}),
		//
		// 		}
		// 	).then((response) =>
		// 		{
		// 			if (response.data.success === false)
		// 			{
		// 				let error = response.data.data
		// 				if (error.hasOwnProperty('images'))
		// 				{
		// 					alert(response.data.data['images'])
		// 				} else
		// 				{
		// 					console.log(error)
		// 					this.previewImages(e, error)
		// 				}
		// 			}
		//
		// 			if (response.data.success === true)
		// 			{
		// 				this.previewImages(e)
		//
		// 			}
		// 		}
		// 	)
		// },
	},

})