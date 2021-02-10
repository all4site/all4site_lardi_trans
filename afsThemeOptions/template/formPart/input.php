<div class="form-group position-relative <?php echo $args['wrpper-class'] ?>">
	<input
		type="<?php echo $args['type'] ?>"
		placeholder="<?php echo $args['title'] ?>"
		name="<?php echo $args['args'] ?>"
		id="<?php echo $args['args'] ?>"
		value="<?php echo $args['value']?>"
		<?php echo $args['vue-data']?>
		class="form-control <?php echo $args['input-class']?>">
	<?php get_template_part('afsThemeOptions/template/formPart/formErrors')?>
</div>
