<div is="oneImageUpload" inline-template>
	<div>
		<div class="custom-file mb-3 <?php echo $args['wrpper-class'] ?>">

			<label class="custom-file-label" for="<?php echo $args['args'] ?>"><?php echo $args['title'] ?></label>

			<input type="<?php echo $args['type'] ?>" class="custom-file-input" id="<?php echo $args['args'] ?>" name="<?php echo $args['args'] ?>" @change="userLogoData" @click="reset">
			<?php get_template_part( 'afsThemeOptions/template/formPart/formErrors' ) ?>

		</div>
		<div id="preview"></div>
	</div>
</div>

