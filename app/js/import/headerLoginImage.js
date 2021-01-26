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