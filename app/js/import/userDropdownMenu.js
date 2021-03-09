Vue.component('userDropdownMenu', {
	data()
	{
		return {
			show: false
		}
	},
	methods:{
		showDropdownMenu(){
			this.show = true
		}
	}
})