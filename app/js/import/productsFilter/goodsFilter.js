Vue.component('goodsFilter', {
	data: () => ({
		maxPage: '',
		currentPage: '',
		show: '',
		spiner: false
	}),
	methods: {

		translateCheckbox()
		{
			let myForm = document.forms.goodsFilter
			for (let key of myForm)
			{
				if (key.type === 'checkbox')
				{
					let text = key.nextElementSibling.textContent.trim()
					key.value = text
				}
			}
		},

		sendChesckboxDataTrueOrFalse(e)
		{
			(e.target.checked) ? e.target.value = 1 : e.target.value = 0
			this.sendDataToServer()
		},
		sendDataToServerFunction()
		{
			this.sendDataToServer()
		},
		sendCheckboxDateWithTranslate()
		{
			this.translateCheckbox()
			this.sendDataToServer()
		},
		showDateTime(e)
		{
			let value = e.target.value
			let target = e.target.id
			document.getElementById(target).classList.add('opacity-1')
		},

		locationReset(e)
		{
			document.getElementById('from').options[0].selected = 'selected'
			document.getElementById('where').options[0].selected = 'selected'
			this.sendDataToServer()
		},

		dateReset()
		{
			document.getElementById('date').value = ''
			this.sendDataToServer()
		},

		sendDataToServer()
		{

			let myForm = document.forms.goodsFilter
			let form = new FormData()

			for (let i = 0; i < myForm.length; i++)
			{

				if (myForm.elements[i].type === 'checkbox' && myForm.elements[i].checked === false)
				{
					continue
				} else
				{
					form.append(myForm.elements[i].name, myForm.elements[i].value)
				}

			}

			form.append('action', 'goodsFilters')
			axios.post(myajax.url, form).then(response =>
			{
				this.maxPage = response.data.data.maxPge
				this.currentPage = response.data.data.currentPage

				if (this.currentPage >= this.maxPage || this.maxPage == 0)
				{
					this.$eventBus.$emit('btnShow', this.show = false)
					this.$eventBus.$emit('currentPahe', this.currentPage)

				} else
				{
					this.$eventBus.$emit('btnShow', this.show = true)
				}
				document.getElementById('posts').innerHTML = response.data.data.template
			})
		}
	}
})