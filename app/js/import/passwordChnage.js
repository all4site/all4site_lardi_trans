Vue.component('chagePassword',{
	data()
	{
return{
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