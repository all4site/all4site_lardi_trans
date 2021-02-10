import VueSlickCarousel from 'vue-slick-carousel'
import 'vue-slick-carousel/dist/vue-slick-carousel.css'
// optional style for arrows & dots
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

Vue.component('slick', {
	components: {VueSlickCarousel},

	data: () => ({
		settings: {
			dots: true,
			arrows: false,
		},
	})
})