Vue.component('transportCreateUpdatePost', {
	data()
	{
		return {

			multiImageArreyData: [],
			multiImageArreyDataSort: [],
			spiner: false,
			inputs:
				[
					{
						name: 'title',
						placeholder: 'Заголовок',
						label: '',
						labelClass: '',
						class: 'upload-foto-margin-top',
						data: '',
						type: 'text',
						error: ''
					},
					{
						name: 'from',
						placeholder: 'Откуда?',
						label: '',
						labelClass: '',
						data: '',
						type: 'text',
						error: ''
					},
					{
						name: 'where',
						placeholder: 'Куда?',
						label: '',
						labelClass: '',
						data: '',
						type: 'text',
						error: ''
					},
					{
						name: 'date',
						placeholder: 'Выбрать дату услуги',
						label: 'Выбрать дату услуги',
						labelClass: 'labelData',
						class: 'opacity-0',
						icon: 'far fa-calendar-alt position-absolute icon-for-data-time',
						data: '',
						type: 'date',
						error: ''
					},
					{
						name: 'time',
						placeholder: 'Выбрать время услуги',
						label: 'Выбрать время услуги',
						labelClass: 'labelData',
						class: 'opacity-0',
						icon: 'far fa-clock position-absolute icon-for-data-time',
						data: '',
						type: 'time',
						error: ''
					},
					{
						name: 'bodyType',
						type: 'select',
						label: '',
						placeholder: 'Тип кузова',
						wrapperClass: '',
						class: '',
						error: '',
						data: ''
					},

				],

			sizes: [
				{
					name: 'lenth',
					type: 'number',
					placeholder: 'длинна в М',
					label: '',
					class: '',
					wrapperClass: 'col-md-4 pr-md-1',
					error: '',
					data: ''
				},
				{
					name: 'width',
					type: 'number',
					label: '',
					placeholder: 'ширина в М',
					class: '',
					wrapperClass: 'col-md-4 px-md-1',
					error: '',
					data: ''
				},
				{
					name: 'height',
					type: 'number',
					label: '',
					placeholder: 'высота в М',
					class: '',
					wrapperClass: 'col-md-4 pl-md-1',
					error: '',
					data: ''
				},
				{
					name: 'carrying',
					type: 'number',
					label: '',
					placeholder: 'Грузоподьемнсть',
					wrapperClass: 'col-md-12',
					class: 'form-control',
					error: '',
					data: ''
				},
				{
					name: 'loadingType',
					type: 'select',
					label: '',
					placeholder: 'Тип загрузки',
					wrapperClass: 'col-md-12',
					class: 'form-control',
					error: '',
					data: ''
				},
				{
					name: 'volume',
					type: 'number',
					label: '',
					placeholder: 'Объем',
					wrapperClass: 'col-md-12',
					class: 'form-control',
					error: '',
					data: ''
				},

				{
					name: 'groupageCargo',
					type: 'checkbox',
					placeholder: '',
					wrapperClass: 'col-md-12',
					class: 'form-check-input my-checkbox',
					labelClass: 'form-check-label',
					label: 'Согласен в составе сборного груза',
					error: '',
					data: ''
				},
				{
					name: 'description',
					type: 'textarea',
					label: '',
					placeholder: 'Описание...',
					wrapperClass: 'col-md-12',
					class: '',
					error: '',
					data: ''
				},
			],

			coast:
				[
					{
						name: 'costInput',
						type: 'number',
						label: '',
						data: '',
						placeholder: 'Введите цену',
						wrapperClass: 'col-md-9 pr-md-1',
						error: '',
					},
					{
						name: 'currency',
						type: 'select',
						label: '',
						data: '',
						placeholder: 'Валюта',
						class: 'custom-select',
						wrapperClass: 'col-md-3 pl-md-1',
						error: '',
					},
					{
						name: 'paymentFrom',
						type: 'select',
						label: '',
						data: '',
						class: 'custom-select',
						placeholder: 'Форма оплаты',
						wrapperClass: 'col-md-12',
						error: '',
					},
					{
						name: 'paymentMoment',
						type: 'select',
						label: '',
						data: '',
						class: 'custom-select',
						placeholder: 'Моменты оплаты',
						wrapperClass: 'col-md-12',
						error: '',
					},
				],

			contacts: [
				{
					name: 'name',
					type: 'text',
					data: '',
					placeholder: 'Имя',
					label: '',
					error: '',
				},
				{
					name: 'phone',
					type: 'tel',
					data: '',
					placeholder: 'Телефон',
					label: '',
					error: '',
				},
				{
					name: 'email',
					type: 'email',
					data: '',
					placeholder: 'Email',
					label: '',
					error: '',
				},
			],
			button:

				{
					name: 'button',
					placeholder: 'Опубликовать',
					data: 'createGood'
				},

		}
	},

	created()
	{
		this.$eventBus.$on('multiImageArray', this.multiImageArray)
		this.$eventBus.$on('multiImageArraySort', this.multiImageArraySort)

	},
	beforeDestroy()
	{
		this.$eventBus.$on('multiImageArray')
		this.$eventBus.$on('multiImageArraySort')


	},
	mounted()
	{
		this.getCurrentPostDataApi()
	},
	methods: {
		getCurrentPostDataApi()
		{
			let postId = new URLSearchParams(window.location.search).get('postid')
			let postCategory = new URLSearchParams(window.location.search).get('category') + '/'
			let ApiLink = 'http://larditrans.loc/wp-json/wp/v2/'

			axios
				.get(ApiLink + postCategory + postId)

				.then((response) =>
				{
					this.photo = response.data.custom_fields.photo
					this.$eventBus.$emit('uploadPhotoFronCustomFields', this.photo);

					this.info = response.data.custom_fields
					let lenth = Object.keys(this.info).length
					let globalArray = this.inputs.concat(this.sizes).concat(this.coast).concat(this.contacts)

					for (let i = 0; i < lenth; i++)
					{

						globalArray[i].data = Object.values(this.info)[i + 1]

					}
				})
				.catch((error) =>
				{
					if (error.response)
					{
						if (error.response.status === 401)
						{
							alert('У вас нет доступа')

						}
					}
				});
		},
		goodsForm()
		{

			let form = new FormData

			if (this.multiImageArreyData.length == 0)
			{
				for (let i = 0; i < this.multiImageArreyDataSort.length; i++)
				{
					form.append('key[]', this.multiImageArreyDataSort[i])
				}
			}

			for (let i = 0; i < this.multiImageArreyData.length; i++)
			{
				form.append(i, this.multiImageArreyData[i])

				if (this.multiImageArreyDataSort[i] !== undefined)
				{
					form.append('key[]', this.multiImageArreyDataSort[i])
				}
			}
			for (let i = 0; i < this.inputs.length; i++)
			{
				form.append(this.inputs[i].name, this.inputs[i].data)
			}

			for (let i = 0; i < this.sizes.length; i++)
			{
				form.append(this.sizes[i].name, this.sizes[i].data)
			}

			for (let i = 0; i < this.coast.length; i++)
			{
				form.append(this.coast[i].name, this.coast[i].data)
			}

			for (let i = 0; i < this.contacts.length; i++)
			{
				form.append(this.contacts[i].name, this.contacts[i].data)
			}


			form.append('action', 'transportCreatePost')

			if (new URLSearchParams(window.location.search).get('postid') !== null)
			{
				let onlyPostId = new URLSearchParams(window.location.search).get('postid').replace(/\?.+/, '')
				form.append('postID', onlyPostId)

			}

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

					let res = Object.keys(response.data.data)[0]

					for (let i = 0; i < this.inputs.length; i++)
					{
						if (this.inputs[i].name == res)
						{
							this.inputs[i].error = response.data.data[res]
						} else
						{
							this.inputs[i].error = ''

						}
					}
					for (let i = 0; i < this.sizes.length; i++)
					{
						if (this.sizes[i].name == res)
						{
							this.sizes[i].error = response.data.data[res]
						} else
						{
							this.sizes[i].error = ''

						}
					}
					for (let i = 0; i < this.coast.length; i++)
					{
						if (this.coast[i].name == res)
						{
							this.coast[i].error = response.data.data[res]
						} else
						{
							this.coast[i].error = ''

						}
					}
					for (let i = 0; i < this.contacts.length; i++)
					{
						if (this.contacts[i].name == res)
						{
							this.contacts[i].error = response.data.data[res]
						} else
						{
							this.contacts[i].error = ''

						}
					}

				}

				if (response.data.success === true)
				{
					alert(response.data.data)
					document.location.href = '/user?userposts'
				}
			})
		},

		multiImageArray(data)
		{
			this.multiImageArreyData = data
		},
		multiImageArraySort(data)
		{
			this.multiImageArreyDataSort = data
		},
		labelCkick(e)
		{
			e.target.classList.add('opacity-1')
		}

	}
})