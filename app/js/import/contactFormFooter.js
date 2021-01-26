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