<input
	type="<?php echo $args['type'] ?>"
	placeholder="<?php echo $args['placeholder'] ?>"
	name="<?php echo $args['name'] ?>"
	id="<?php echo $args['id'] ?>"
	value="<?php echo $args['value'] ?>"
	<?php echo ( isset( $args['vue-data'] ) ) ? $args['vue-data'] : '' ?>
	class="form-control <?php echo $args['input-class'] ?>">
<?php get_template_part( 'afsThemeOptions/template/formPart/formErrors' ) ?>
