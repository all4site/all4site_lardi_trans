import {HTTP} from './helpers/axiosBase'

Vue.component("paypal", {
	mounted()
	{

		this.initPayPalButton()
	},

	methods: {
		initPayPalButton()
		{
			paypal.Buttons({
				style: {
					shape: 'rect',
					color: 'blue',
					layout: 'vertical',
					label: 'paypal',
					tagline: false,
					fundingicons: true
				},

				createOrder: function (data, actions)
				{
					return actions.order.create({
						purchase_units: [{
							// description: '111',
							amount: {
								currency_code: 'USD',
								value: '1'
							},

							// custom_id: $this.data,
						}],
						application_context:
							{
								shipping_preference: 'NO_SHIPPING',
							},
					})
				},

				onApprove: function (data, actions)
				{
					return actions.order.capture()
						.then(details =>
						{
							// console.log(details.purchase_units[0].custom_id)
							// alert('Transaction completed by ' + details.payer.name.given_name + '!');
							if (details.status === 'COMPLETED')
							{
								let form = new FormData()
								form.append('action', 'paypalSubscribe')
								form.append('status', 'COMPLETED')
								HTTP.post('', form).then(res =>
								{
									if (res.data.success === true)
									{
										alert('Ваша подписка продленна на 30 дней')
										location.reload();
									}
									if (res.data.success === false) alert('Что то пошло не так, обратитесь к администрации')
								})
							}
						});
				},

				onError: function (err)
				{
					alert('Что то пошло не так, попробуйте позже')
				}
			}).render('#paypal-button-container');
		},
	}

})