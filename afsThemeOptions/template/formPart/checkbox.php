<div class="form-group position-relative <?php echo $args['wrpper-class'] ?>">
	<input name="<?php echo $args['name'] ?>"
	       type="<?php echo $args['type'] ?>"
	       class="form-check-input my-checkbox <?php echo $args['input-class'] ?>"
	       id="<?php echo $args['id'] ?>"
	       value='<?php echo $args['value'] ?>'
	       <?php echo $args['vue-data']?>>

	<label for="<?php echo $args['id'] ?>" class="form-check-label <?php echo $args['label-span-class'] ?>">
		<?php echo $args['title'] ?>
		<span class="d-block check"></span>
	</label>
	<?php get_template_part( 'afsThemeOptions/template/formPart/formErrors' ) ?>
</div>

