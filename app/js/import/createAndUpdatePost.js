import {cleaarErrorMessages, myError} from "./helpers";

Vue.component('createAndUpdatePost', {
	data()
	{
		return {
			errorMessages: '',
		}
	},
	mounted()
	{
		this.addCheckedDataToCheckbox()
	},
	methods: {

		sendCheckboxDate(e)
		{
			(e.target.checked) ? e.target.value = 1 : e.target.value = 0
		},

		addCheckedDataToCheckbox()
		{
			let myForm = document.forms.globalForm
			for (let i = 0; i < myForm.length; i++)
			{
				(myForm[i].type === 'checkbox' && myForm[i].value === '1') ?
					myForm[i].checked = true :
					myForm[i].checked = false
			}
		},

		showDateTime(e)
		{
			let value = e.target.value
			let target = e.target.id
			document.getElementById(target).classList.add('opacity-1')
		},

		async getFormData()
		{

			let images = document.querySelectorAll('#drop-zone img')
			let form = new FormData();
			let myForm = document.forms.globalForm
			let file = document.getElementById('customFile').files

			for (let i = 0; i < images.length; i++)
			{
				let temp = new File([await (await fetch(images[i].src)).blob()], images[i].name)
				form.append([i], temp)
			}

			for (let i = 1; i < myForm.length; i++)
			{
				let name = myForm.elements[i].name
				let value = myForm.elements[i].value
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
						cleaarErrorMessages()
						myError(responce, myForm, 6)

					}


					if (responce.data.success == true)
					{
						alert(responce.data.data)
						document.location.href = '/user?userposts'
					}
				})

		},

	}
})