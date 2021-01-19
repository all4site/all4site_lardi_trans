Vue.component('createAndUpdatePost', {
	data()
	{
		return {}
	},
	mounted()
	{

	},
	methods: {
		getFormData()
		{

			var form = new FormData();
			let myForm = document.forms.globalForm
			var file = document.getElementById('customFile').files

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


						let invalidBlock = document.getElementById('invalid-feedback')
						let validdBlock = document.querySelectorAll('.valid-feedback')

						for (let i = 0; i < validdBlock.length; i++)
						{
							console.log(validdBlock[i].remove())
						}

						if (invalidBlock !== null)
						{
							invalidBlock.remove()
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
									error.insertAdjacentHTML("afterend", '<div class="invalid-feedback" id="invalid-feedback">' + responce.data.data[name] + '</div>')
									return false
								} else
								{
									console.log(name)
									let error = document.getElementById(name)
									error.classList.add('is-valid')
									error.insertAdjacentHTML("afterend", '<div class="valid-feedback" id="valid-feedback">Все ок</div>')
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

		}
	}
})