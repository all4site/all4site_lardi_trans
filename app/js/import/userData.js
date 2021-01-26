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
		// let src = document.getElementById('user-logo').src

	},
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
					let src = document.getElementById('user-logo').src='/1.png'

					// document.location.href = '/user?profile'
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