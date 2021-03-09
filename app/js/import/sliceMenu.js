Vue.component('sliceMenu', {
	data()
	{
		return {
			active: false,
			show: false
		}
	},
	methods: {
		hamburger()
		{
			this.active = !this.active
			this.show = !this.show
			document.body.classList.add('overlay-on')
			this.createOverlay()
		},

		createOverlay()
		{
			const target = document.getElementById('app')
			const overlayCleate = target.insertAdjacentHTML('afterbegin', `<div class="my-overlay" id="my-overlay"></div>`)
			const overlay = document.getElementById('my-overlay')
			overlay.addEventListener('click', () =>
			{
				document.getElementById('my-overlay').remove()
				this.active = false
				this.show = false
				document.body.classList.remove('overlay-on')

			})
		}
	}
})