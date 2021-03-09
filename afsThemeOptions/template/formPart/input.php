<div class="form-group position-relative <?php echo ( isset( $args['wrpper-class'] ) ) ? $args['wrpper-class'] : '' ?>">
	<input
		type="<?php echo ( isset( $args['type'] ) ) ? $args['type'] : '' ?>"
		placeholder="<?php echo ( isset( $args['title'] ) ) ? $args['title'] : '' ?>"
		name="<?php echo ( isset( $args['args'] ) ) ? $args['args'] : '' ?>"
		id="<?php echo ( isset( $args['args'] ) ) ? $args['args'] : '' ?>"
		value="<?php echo ( isset( $args['value'] ) ) ? $args['value'] : '' ?>"
		<?php echo ( isset( $args['vue-data'] ) ) ? $args['vue-data'] : ''; ?>
		class="form-control <?php echo ( isset( $args['input-class'] ) ) ? $args['input-class'] : '' ?>">
	<?php get_template_part( 'afsThemeOptions/template/formPart/formErrors' ) ?>
</div>
