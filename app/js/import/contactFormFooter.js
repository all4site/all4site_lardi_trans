import {HTTP} from './helpers/axiosBase'
import {cleaarErrorMessages, myError, addDataToForm} from './helpers'

Vue.component('contactFormFooter', {
	methods: {
		cfFooter(e)
		{
			let form = addDataToForm(e.target, ['submit'], 'cfFooter')

			HTTP.post('', form)
				.then(response =>
				{
					if (response.data.success === false)
					{
						cleaarErrorMessages()
						myError(response, e.target)
						return false
					}

					alert(response.data.data)
					cleaarErrorMessages()
					e.target.reset()

				})
		}
	}
})