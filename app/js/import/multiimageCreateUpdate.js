Vue.component('multiimageCreateUpdate', {
	data()
	{
		return {
			spiner: false,
			customClass: '',
			finalImageArr: [],
			files: [
				{
					name: 'file-0',
					showLogo: false,
					logoPrev: null,
					error: ''
				},
				{
					name: 'file-1',
					showLogo: false,
					logoPrev: null,
					error: ''
				},
				{
					name: 'file-2',
					showLogo: false,
					logoPrev: null,
					error: ''
				},

			],

			photoListenerVar: [],
			temp: ''
		}
	},
	created()
	{
		this.$eventBus.$on('uploadPhotoFronCustomFields', this.photoListener);

	},
	beforeDestroy()
	{
		this.$eventBus.$on('uploadPhotoFronCustomFields');


	},
	mounted()
	{
		this.uploadFileAjax()
	},
	methods: {

		photoListener(data)
		{
			this.photoListenerVar = data
			for (let i = 0; i < data.length; i++)
			{
				this.files[i].logoPrev = data[i].url
				this.files[i].showLogo = true
			}
		},

		dragImage()
		{
			let player = document.getElementById("drop-zone")
			var sort = Sortable.create(player, {
				group: '.drag-el',
				animation: 20,
				onEnd: (evt) =>
				{

					let tempData = document.querySelectorAll('#drop-zone > div')

					for (var i = 0; i < tempData.length; i++)
					{
						let id = tempData[i].id
						this.finalImageArr[i] = id
					}
					this.$eventBus.$emit('multiImageArraySort', this.finalImageArr);
				},
			})

		},
		multipleImageUploadPreview(e)
		{
			var form = new FormData();
			let file = e.target.files

			for (let i = 0; i < file.length; i++)
			{
				form.append(this.files[i].name, file[i]);
			}

			form.append('action', 'multiimageCreateUpdate');


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
					if (response.data.success === false)
					{
						let error = response.data.data
						let errKey = Object.keys(error)
						let errValue = Object.values(error)
						let map = new Map(Object.entries(error))

						for (let i = 0; i < file.length; i++)
						{


							if (map.get(this.files[i].name))
							{
								this.files[i].showLogo = true
								this.files[i].error = error[this.files[i].name]
								this.customClass = 'empty-image'
							} else
							{

								this.files[i].showLogo = true
								this.files[i].logoPrev = URL.createObjectURL(file[i])
							}

							if (errKey.length < this.files.length)
							{
								this.customClass = ''
							}

						}
					}

					if (response.data.success === true)
					{

						this.$eventBus.$emit('multiImageArray', file);
						for (let i = 0; i < file.length; i++)
						{

							this.files[i].showLogo = true
							this.files[i].logoPrev = URL.createObjectURL(file[i])
							this.customClass = ''
						}

					}
				}
			)
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
					for (let i = 0; i < res.length; i++)
					{
						this.files[i].showLogo = true
						this.files[i].logoPrev = res[i].url
					}
				}else {
					return false
				}
			})
		},

		reset()
		{
			for (let i = 0; i < this.files.length; i++)
			{
				this.files[i].logoPrev = ''
				this.files[i].showLogo = false
				this.files[i].error = ''
			}

			document.getElementById('customFile').value = '';

		},

		deleteImage(e)
		{
			let id = e.target.closest('div').id
			this.files[id].logoPrev = ''
			this.files[id].showLogo = false

		},

	},

})