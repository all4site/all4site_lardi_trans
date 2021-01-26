Vue.component('adsBlock',{
	data()
		{
			return{
			scrolling: '',
			data: 'position-fixed ads-width',
			dataCss: ''
			}
		},
	methods: {
		handleScroll()
		{
			let winFullHeight = document.documentElement.scrollHeight
			let winScreenHeight = document.documentElement.clientHeight
			let footerHeight = document.getElementById('footer').offsetHeight
			let point = winFullHeight - footerHeight - winScreenHeight + 119
			let scroll = window.scrollY
			this.scrolling = window.scrollY
			if (scroll >= point)
			{
				this.data = 'position-absolute'
				this.dataCss = point + 'px'
			} else
			{
				this.data = 'position-fixed ads-width'
				this.dataCss = ''
			}
		}
	},
	created()
	{
		document.addEventListener('scroll', this.handleScroll);
	},
	destroyed()
	{
		document.removeEventListener('scroll', this.handleScroll);
	},


})