import {cleaarErrorMessages, myError} from './helpers'
import {HTTP} from './helpers/axiosBase'

Vue.component('userData', {
	methods: {
		submit(e)
		{
			let form = new FormData();
			let myForm = document.forms.userData

			for (let i = 0; i < myForm.length; i++)
			{
				if (myForm[i].name === 'userDataBtn')
				{
					continue
				} else if (myForm[i].name === 'customFile')
				{
					let file = document.getElementById(myForm[i].name).files
					form.append('customFile', file[0])
				} else
				{
					form.append(myForm[i].name, myForm[i].value);
				}

			}
			form.append('action', 'userForm');

			HTTP.post('', form)
				.then((response) =>
				{

					if (response.data.success === false)
					{
						cleaarErrorMessages()
						myError(response, myForm)
						return false
					}
					alert('Ваши данные сохранены')
					document.getElementById('userNameLeft').textContent = document.getElementById('nickName').value
					cleaarErrorMessages()

				})

		},

	},

})