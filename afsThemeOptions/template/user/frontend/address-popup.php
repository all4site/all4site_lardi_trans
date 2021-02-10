<transition name="fade">
<div class="box position-absolute rounded" v-if="showPopup">
	<div class="bg-white w-75 py-2 mx-auto my-2 rounded mt-4">
		<span class="pl-3 text-secondary"><?php echo $args['firstName'] ?></span>
	</div>
	<div class="bg-white w-75 py-2 mx-auto my-2 rounded">
		<span class="pl-3 font-weight-bold text-secondary"><?php echo $args['userPhone'] ?></span>
	</div>
	<div class="bg-white w-75 py-2 mx-auto my-2 rounded">
		<span class="pl-3 font-weight-bold text-secondary"><?php echo $args['userEmail'] ?></span>
	</div>

	<div class="text-center mt-4 cursor-pointer" @click.prevent="showPopup = !showPopup">
		<i class="fas fa-times text-white basic-font-size-big-2"></i>
	</div>
</div>
</transition>
