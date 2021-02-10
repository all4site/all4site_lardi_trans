Vue.component('createAndUpdatePost', {
	data()
	{
		return {
			errorMessages: '',
		}
	},
	methods: {

		checkboxCheck(e)
		{

			let value = e.target.value
			let target = e.target.id
			if (value == 1)
			{
				document.getElementById(target).value = 0

			} else
			{
				document.getElementById(target).value = 1
			}
		},

		showDateTime(e)
		{
			let value = e.target.value
			let target = e.target.id
			document.getElementById(target).classList.add('opacity-1')
		},

		checkbox()
		{
			var form = new FormData();
			var form = new FormData();
			let postID = document.getElementById('postID')
			form.append('postID', postID.value)
			form.append('action', 'updateCheckbox');

			axios.post(myajax.url,
				form, {
					headers: {
						'Content-Type': 'multipart/form-data'
					},
				})
				.then((responce) =>
				{
					if (responce.data.success == true)
					{
						this.checked = responce.data.data
						console.log(this.checked)

					} else
					{
						return false
					}


				})
		},

		getFormData()
		{




			for (let i = 0; i < images.length; i++)
			{
				let temp = new File([await (await fetch(images[i].src)).blob()], images[i].name)
				form.append([i], temp)

			}

			let images = document.querySelectorAll('#drop-zone img')
			let form = new FormData();
			let myForm = document.forms.globalForm
			let file = document.getElementById('customFile').files

			for (let i = 0; i < myForm.length; i++)
			{
				let name = myForm.elements[i].name
				let value = myForm.elements[i].value
				let type = myForm.elements[i].attributes.type.value

				if (type === 'file')
				{
					for (let i = 0; i < file.length; i++)
					{
						form.append([i], file[i])
					}
				}

				form.append(name, value)
			}


			form.append('action', 'createAndUpdatePost');


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

				})
				.then((responce) =>
				{
					if (responce.data.success == false)
					{

						let invalidClass = document.getElementsByClassName('is-invalid')
						let valisClass = document.getElementsByClassName('is-valid')

						while (invalidClass.length > 0)
						{
							invalidClass[0].classList.remove('is-invalid');
						}
						while (valisClass.length > 0)
						{
							valisClass[0].classList.remove('is-valid');
						}

						for (let i = 6; i < myForm.length; i++)
						{
							let name = myForm.elements[i].name

							if (name == 'formButton' || name == 'key[]')
							{
								continue
							} else
							{

								if (responce.data.data[name] != undefined)
								{
									let error = document.getElementById(name)
									error.classList.add('is-invalid')
									this.errorMessages = responce.data.data[name]
									return false
								} else
								{
									let error = document.getElementById(name)
									error.classList.add('is-valid')
								}
							}

						}
					}


					if (responce.data.success == true)
					{
						alert(responce.data.data)
						document.location.href = '/user?userposts'
					}
				})

		},

		async uploadImages()
		{
			let form = new FormData()
			form.append('action', 'uploadFileTest')

			let images = document.querySelectorAll('#drop-zone img')

			for (let i = 0; i < images.length; i++)
			{
				let temp = new File([await (await fetch(images[i].src)).blob()], images[i].name)
				form.append([i], temp)

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
			})
		}
	}
})