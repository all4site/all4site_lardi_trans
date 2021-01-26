Vue.component('menuCategories', {
	data()
	{
		return {
			show: false,
		}

	},
	methods: {
		showCategories: function ()
		{
			this.show = true
		},

	}
})

Vue.component('headerLoginImage', {
	data()
	{
		return {
			show: false,
			url: '',
		}

	},
	created()
	{
		this.$eventBus.$on('logo-updat', this.logo)
	},
	beforeDestroy()
	{
		this.$eventBus.$off('logo-updat');
	},
	methods: {
		showCategories: function ()
		{
			this.show = true
		},
		logo(data)
		{
			this.url = data
			this.show = true

		}
	}
})

Vue.component('userData', {

	data()
	{
		return {
			firstName: '',
			lastName: '',
			nickName: '',
			userSity: '',
			userPhone: '',
			userEmail: '',
			userLogo: '',
			userLogoPreview: '',
			userLogoId: '',
			userLogoShowBlock: false,
			firstNameData: '',
			lastNameData: '',
			nickNameData: '',
			userSityData: '',
			userPhoneData: '',
			userEmailData: '',
			tempImage: '',
			spiner: false,
			firstNameError: '',
			lastNameError: '',
			nickNameError: '',
			userPhoneError: '',
			userEmailError: '',
		}
	},
	mounted()
	{
		this.updateData()
	},
	computed: {},

	methods: {
		updateData()
		{
			this.firstName = this.firstNameData
			this.lastName = this.lastNameData
			this.nickName = this.nickNameData
			this.userSity = this.userSityData
			this.userPhone = this.userPhoneData
			this.userEmail = this.userEmailData
		},
		submit()
		{
			var form = new FormData();
			form.append('firstName', this.firstName);
			form.append('lastName', this.lastName);
			form.append('nickName', this.nickName);
			form.append('userLogo', this.userLogo);
			form.append('userSity', this.userSity);
			form.append('userPhone', this.userPhone);
			form.append('userEmail', this.userEmail);
			form.append('action', 'userForm');
			this.deleteImage()
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
				if (response.data.success === false)
				{
					this.firstNameError = response.data.data.firstName
					this.lastNameError = response.data.data.lastName
					this.nickNameError = response.data.data.nickName
					this.userPhoneError = response.data.data.userPhone
					this.userEmailError = response.data.data.userEmail
				}
				if (response.data.success === true)
				{
					alert(response.data.data.alert)
					this.firstName = response.data.data.firstName
					this.lastName = response.data.data.lastName
					this.nickName = response.data.data.nickName
					this.userEmail = response.data.data.userEmail
					this.userPhone = response.data.data.userPhone

					this.tempImage = response.data.data.tempImage
					this.$eventBus.$emit('logo-updat', this.tempImage);
					this.$eventBus.$emit('userNickname', this.nickName);

					this.firstNameError = ''
					this.lastNameError = ''
					this.nickNameError = ''
					this.userPhoneError = ''
					this.userEmailError = ''
				}
			})


		},
		userLogoData(e)
		{
			var file = e.target.files[0]
			var form = new FormData();
			form.append('imageSize', this.userLogo)
			form.append('action', 'uploadLogo');

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
					alert(response.data.data)
				}

				if (response.data.success === true)
				{
					this.userLogoShowBlock = true
					this.userLogoPreview = URL.createObjectURL(file)
					this.userLogo = file
					this.userLogoId = e.target.id
				}
			})
		},

		deleteImage()
		{
			this.userLogoShowBlock = false
			this.userLogoPreview = ''
			this.userLogo = ''
		},

		reset(e)
		{
			e.target.value = ''
		},

	},

})

Vue.component('adsBlock', {
	data()
	{
		return {
			scrolling: '',
			data: 'position-fixed ads-width',
			dataCss: ''
		}
	},
	methods: {
		handleScroll()
		{
			let winFullHeight = document.documentElement.scrollHeight
			let winScreenHeight = document.documentElement.clientHeight
			let footerHeight = document.getElementById('footer').offsetHeight
			let point = winFullHeight - footerHeight - winScreenHeight + 119
			let scroll = window.scrollY
			this.scrolling = window.scrollY
			if (scroll >= point)
			{
				this.data = 'position-absolute'
				this.dataCss = point + 'px'
			} else
			{
				this.data = 'position-fixed ads-width'
				this.dataCss = ''
			}
		}
	},
	created()
	{
		document.addEventListener('scroll', this.handleScroll);
	},
	destroyed()
	{
		document.removeEventListener('scroll', this.handleScroll);
	},


})

Vue.component('reloadLogo', {
	data()
	{
		return {
			url: '',
			show: false,
			nickName: ''
		}
	},

	created()
	{
		this.$eventBus.$on('logo-updat', this.logo)
		this.$eventBus.$on('userNickname', this.nickNameData)
	},
	beforeDestroy()
	{
		this.$eventBus.$off('logo-updat');
		this.$eventBus.$off('userNickname');
	},
	methods: {
		logo(data)
		{
			this.url = data
			this.show = true

		},
		nickNameData(data)
		{
			this.nickName = data
		}
	}
})

Vue.component('contactFormFooter', {
	data()
	{
		return {
			name: '',
			email: '',
			text: '',
			spiner: false,
			nameError: '',
			emailError: '',
		}
	},
	methods: {
		cfFooter()
		{
			let form = new FormData();
			form.append('name', this.name)
			form.append('email', this.email)
			form.append('text', this.text)
			form.append('action', 'cfFooter')
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
				if (response.data.success === false)
				{
					this.nameError = response.data.data.nameRequire
					this.emailError = response.data.data.emailRequire
				}
				if (response.data.success === true)
				{
					alert(response.data.data)
					this.name = ''
					this.email = ''
					this.text = ''
					this.nameError = ''
					this.emailError = ''
				}
			})
		}
	}
})

Vue.component('chagePassword', {
	data()
	{
		return {
			oldPassword: '',
			newPassword: '',
			confirmNewPassword: '',
			spiner: false,
			newPasswordVal: '',
			confirmNewPasswordVal: '',
			oldPasswordVal: '',
			passwordNotMach: '',
			passwordWasChange: ''
		}
	},
	methods: {
		passwordChange()
		{
			let form = new FormData();
			form.append('oldPassword', this.oldPassword)
			form.append('newPassword', this.newPassword)
			form.append('confirmNewPassword', this.confirmNewPassword)
			form.append('action', 'passwordChange')
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

				if (response.data.success === false)
				{
					this.oldPasswordVal = response.data.data.currentPassowrd
					this.newPasswordVal = response.data.data.newPassword
					this.confirmNewPasswordVal = response.data.data.confirmPassword
					this.passwordNotMach = response.data.data.noEqual
				}

				if (response.data.success === true)
				{
					alert(response.data.data)
					this.oldPassword = ''
					this.newPassword = ''
					this.confirmNewPassword = ''
					this.oldPasswordVal = ''
					this.newPasswordVal = ''
					this.confirmNewPasswordVal = ''
					this.passwordNotMach = response.data.data.noEqual = ''
				}


			})
		}
	}
})

Vue.component('multiImageUpload', {
	data()
	{
		return {
			spiner: false,
			customCss: '',

			showLogo: {
				file_0: false,
				file_1: false,
				file_2: false,
			},
			logoPrev: {
				file_0: '',
				file_1: '',
				file_2: ''

			},
			error: {
				file_0: '',
				file_1: '',
				file_2: ''
			},
			name: {
				file_0: '',
				file_1: '',
				file_2: ''
			},
			finalImageArr: []


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

					let tempData = document.querySelectorAll('#drop-zone > div')

					for (var i = 0; i < tempData.length; i++)
					{
						let id = tempData[i].id
						let tempSrc = tempData[i].querySelector('img').src
						let src = new File([tempSrc], this.name['file_' + id])
						this.finalImageArr[i] = id

					}
					console.log(this.finalImageArr)
					this.$eventBus.$emit('multiImageArraySort', this.finalImageArr);
				},
			})

		},

		multipleImageUploadPreview(e)
		{
			var form = new FormData();
			let file = Object.values(e.target.files)

			file.forEach(function (value, key)
			{
				form.append('file_' + key, value);
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

						let error = response.data.data
						let errKey = Object.keys(error)
						let i = 0;

						for (key in this.error)
						{
							if (error[key] !== undefined)
							{
								this.error[key] = error[key]
								this.showLogo[key] = true
								this.customCss = 'height: 120px'
							}
							if (error[key] === undefined && file[i] !== undefined)
							{
								this.showLogo[key] = true
								this.logoPrev[key] = URL.createObjectURL(file[i])
							}
							i++
						}
					}

					if (response.data.success === true)
					{

						this.$eventBus.$emit('multiImageArray', file);

						file.forEach(function (value, key)
						{
							this.showLogo['file_' + key] = true
							this.logoPrev['file_' + key] = URL.createObjectURL(value)
							this.name['file_' + key] = value.name


						}, this);

					}
				}
			)
		},

		reset(e)
		{
			Object.values(this.logoPrev).forEach(function (value, key)
			{
				if (value !== '')
				{
					this.logoPrev['file_' + key] = ''
					this.showLogo['file_' + key] = false


				}
			}, this)

			for (key in this.error)
			{
				if (this.error[key] !== '')
				{
					this.error[key] = ''
					this.showLogo[key] = false
				}
			}
			e.target.value = ''
		},

		deleteImage(e)
		{
			let id = e.target.closest('div').id
			this.logoPrev['file_' + id] = ''
			this.showLogo['file_' + id] = false

		},

	},

})

Vue.component('goodsForm', {
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
					name: 'weight',
					type: 'number',
					label: '',
					placeholder: 'Масса в КГ',
					wrapperClass: 'col-md-6 pr-md-1',
					class: 'form-control',
					error: '',
					data: ''
				},
				{
					name: 'volume',
					type: 'number',
					label: '',
					placeholder: 'Объем в Л',
					wrapperClass: 'col-md-6 pl-md-1',
					class: 'form-control',
					error: '',
					data: ''
				},
				{
					name: 'bodyType',
					type: 'select',
					label: '',
					placeholder: 'Тип кузова',
					wrapperClass: 'col-md-12',
					class: 'custom-select',
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
	methods: {

		goodsForm()
		{

			let form = new FormData


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


			form.append('action', 'goodsForm')

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

				if (response.data.success === true){
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

Vue.prototype.$eventBus = new Vue();

new Vue({
	el: '#app',

});
