Vue.component('imageUpload', {

	data()
	{
		return {
			uploadVar: {},
		}
	},
	mounted()
	{
		this.upload()
		this.dropZone()

	},

	methods: {
		upload()
		{
			this.uploadVar = new FileUploadWithPreview('myUniqueUploadId', {
				images: {
					backgroundImage: false,
					baseImage: ''
				},
				maxFileCount: 2
			})
			let temp = this.uploadVar.addImagesFromPath(['http://larditrans.loc/wp-content/uploads/2021/01/img3-14.jpg']);
			// let temp1 = this.uploadVar.addImagesFromPath(['http://larditrans.loc/wp-content/uploads/2021/01/img3-14.jpg']);
			window.addEventListener("fileUploadWithPreview:imagesAdded", function (e)
			{
				if (e.detail.cachedFileArray[0].size > 0)
				{
					console.log('Файл очень большой')
				}
			});

		},
		dropZone()
		{
			let player = document.getElementById("sort")
			const sortable = new Sortable(player, {
				onChange:(e)=>{
		}
			})
		},
		uploadToSite()
		{
			let form = new FormData()
			let temp = this.uploadVar.cachedFileArray
			let file = new File([temp[0]], 'qwqwqw');

			form.append(0, temp[0])

			// form.append(1, this.uploadVar.cachedFileArray[1])
			form.append('action', 'uploadFileTest')
			axios.post(myajax.url,
				form,
				{
					headers: {
						'Content-Type': 'multipart/form-data'
					},
					onUploadProgress: ((progressEvent) =>
					{
						this.spiner = true
					}),
					onDownloadProgress: ((progressEvent) =>
					{
						this.spiner = false
					}),

				}
			).then((response) =>
			{
			})
		}
	}

})