import './import/multiimageCreateUpdate'
import './import/createAndUpdatePost'
// import './import/transportCreateUpdatePost'
// import './import/goodsCreateUpdatePost'


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




Vue.prototype.$eventBus = new Vue();

new Vue({
	el: '#app',

});


