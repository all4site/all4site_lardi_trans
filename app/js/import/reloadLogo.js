new Vue({
	el: '#userLogoImage',
	data:
		{
			url: '',
			show: false,
			nickName: ''
		},

	created()
	{
		this.$eventBus.$on('logo-updat', this.logo)
		this.$eventBus.$on('userNickname', this.nickNameData)
	},
	beforeDestroy()
	{
		this.$eventBus.$off('logo-updat');
		this.$eventBus.$off('userNickname');
	},
	methods: {
		logo(data)
		{
			this.url = data
			this.show = true

		},
		nickNameData(data)
		{
			this.nickName = data
		}
	}
})