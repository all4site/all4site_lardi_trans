Vue.component('multiImageUpload', {
	data()
	{
		return {
			userLogoPreview: '',
			userLogoPreview_1: '',
			userLogoPreview_2: '',
			userLogoShowBlock: false,
			userLogoShowBlock_1: false,
			userLogoShowBlock_2: false,

			userLogoPreviewError: '',
			userLogoPreviewError_1: '',
			userLogoPreviewError_2: '',

			userLogo: '',
			userLogo_1: '',
			userLogo_2: '',
			userLogoId: '',

			spiner: false,

			customCss: '',

		}
	},

	methods: {

		dragImage()
		{
			let player = document.getElementById("drop-zone")
			var sort = Sortable.create(player, {
				group: '.drag-el',
				animation: 20,
				onEnd: (evt) =>
				{

					let arr = new Map([])
					let tempData = document.querySelectorAll('#drop-zone > div')
					for (var i = 0; i < tempData.length; i++)
					{
						let id = tempData[i].id
						let tempSrc = tempData[i].querySelector('img').src
						let src = new File([tempSrc], id + '_' + Date.parse(new Date))
						arr.set(id, src)

					}
					this.$eventBus.$emit('multiImge', arr);
				},
			})

		},

		multipleImageUploadPreview(e)
		{
			var f = e.target.files
			var form = new FormData();

			for (var i = 0; i < f.length; i++)
			{
				let file = e.target.files[i];
				if (i === 0)
				{
					this.userLogo = file.size
					form.append('imageSize', this.userLogo)
				}
				if (i === 1)
				{
					this.userLogo_1 = file.size
					form.append('imageSize_1', this.userLogo_1)

				}
				if (i === 2)
				{
					this.userLogo_2 = file.size
					form.append('imageSize_2', this.userLogo_2)

				}

			}

			let test = Object.values(f)

			test.forEach(function(value,key) {
				form.append('file_'+ key ,value);
			});



			form.append('action', 'multiFileUpload');
			axios.post(myajax.url,
				form, {
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

				let obj = response.data.data

				if (response.data.success === false)
				{

					if (obj.hasOwnProperty('imageSize'))
					{
						this.userLogoShowBlock = true
						this.userLogoPreviewError = response.data.data.imageSize
						this.customCss = 'height: 120px'
					} else if (f[0] !== undefined)
					{
						this.userLogoShowBlock = true
						this.userLogoPreview = URL.createObjectURL(f[0])
					}

					if (obj.hasOwnProperty('imageSize_1'))
					{
						this.userLogoShowBlock_1 = true
						this.userLogoPreviewError_1 = response.data.data.imageSize_1
						this.customCss = 'height: 120px'

					} else if (f[1] !== undefined)
					{
						this.userLogoShowBlock_1 = true
						this.userLogoPreview_1 = URL.createObjectURL(f[1])
					}

					if (obj.hasOwnProperty('imageSize_2'))
					{
						this.userLogoShowBlock_2 = true
						this.userLogoPreviewError_2 = response.data.data.imageSize_2
						this.customCss = 'height: 120px'
					} else if (f[2] !== undefined)
					{
						this.userLogoShowBlock_2 = true
						this.userLogoPreview_2 = URL.createObjectURL(f[2])
					}


				}

				if (response.data.success === true)
				{

					this.$eventBus.$emit('multiImageArray', f);

					if (f[0] !== undefined)
					{

						this.userLogoShowBlock = true
						this.userLogoPreview = URL.createObjectURL(f[0])
						this.$eventBus.$emit('multiImgeOne', f[0]);
					}
					if (f[1] !== undefined)
					{

						this.userLogoShowBlock_1 = true
						this.userLogoPreview_1 = URL.createObjectURL(f[1])
						this.$eventBus.$emit('multiImgeTwo', f[1]);

					}
					if (f[2] !== undefined)
					{

						this.userLogoShowBlock_2 = true
						this.userLogoPreview_2 = URL.createObjectURL(f[2])
						this.$eventBus.$emit('multiImgeTree', f[2]);
					}


				}
			})
		},

		reset(e)
		{
			e.target.value = ''
			this.deleteImage()
			this.deleteImage_1()
			this.deleteImage_2()
			this.userLogoPreviewError = ''
			this.userLogoPreviewError_1 = ''
			this.userLogoPreviewError_2 = ''
		},
		deleteImage(e)
		{
			this.userLogoShowBlock = false
			this.userLogoPreview = ''
			this.userLogo = ''
		},
		deleteImage_1(e)
		{
			this.userLogoShowBlock_1 = false
			this.userLogoPreview_1 = ''
			this.userLogo = ''
		},
		deleteImage_2(e)
		{
			this.userLogoShowBlock_2 = false
			this.userLogoPreview_2 = ''
			this.userLogo = ''
		},

	},

})