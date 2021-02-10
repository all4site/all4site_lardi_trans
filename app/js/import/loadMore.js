Vue.component('loadMore', {
	data: () => ({
		currentPage: '',
		maxPage: '',
		show: true,
		archiveName: ''
	}),
	mounted()
	{
		this.archiveName = document.getElementById('postTypeName').value
		this.getWpQuery()
	},
	created()
	{
		this.$eventBus.$on('btnShow', this.btnShow)
		this.$eventBus.$on('currentPahe', this.curPage)
	},

	beforeDestroy()
	{
		this.$eventBus.$off('btnShow')
		this.$eventBus.$off('currentPahe')

	},
	methods: {
		getWpQuery()
		{

			let form = new FormData()
			form.append('action', 'getWpData')
			form.append('archiveName', this.archiveName)

			axios.post(myajax.url, form).then(response =>
			{
				this.currentPage = response.data.data.currentPage
			})
		},
		loadMoreBtn()
		{
			let form = new FormData()
			form.append('action', 'goodsFilters')
			form.append('archiveName', this.archiveName)
			form.append('currentPage', this.currentPage + 1)

			axios.post(myajax.url, form)
				.then(response =>
				{
					this.maxPage = response.data.data.maxPge
					this.currentPage = response.data.data.currentPage

					if (this.currentPage >= this.maxPage)
					{
						this.show = false
					} else
					{
						this.show = true
					}
					document.getElementById('posts').insertAdjacentHTML('beforeEnd', response.data.data.template)
				})

		},
		btnShow(data)
		{
			this.show = data
		},
		curPage(data){
			this.currentPage = data
		}
	}
})