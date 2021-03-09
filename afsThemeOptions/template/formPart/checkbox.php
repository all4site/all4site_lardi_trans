<div class="form-group position-relative <?php echo ( isset( $args['wrpper-class'] ) ) ? $args['wrpper-class'] : '' ?>">
	<input name="<?php echo ( isset( $args['name'] ) ) ? $args['name'] : '' ?>"
	       type="<?php echo ( isset( $args['name'] ) ) ? $args['name'] : '' ?>"
	       class="form-check-input my-checkbox <?php echo $args['input-class'] ?>"
	       id="<?php echo ( isset( $args['id'] ) ) ? $args['id'] : '' ?>"
	       value='<?php echo ( isset( $args['id'] ) ) ? $args['id'] : '' ?>'
	       <?php echo ( isset( $args['id'] ) ) ? $args['id'] : ''?>>

	<label for="<?php echo ( isset( $args['id'] ) ) ? $args['id'] : '' ?>" class="form-check-label <?php echo ( isset( $args['label-span-class'] ) ) ? $args['label-span-class'] : '' ?>">
		<?php echo ( isset( $args['title'] ) ) ? $args['title'] : '' ?>
		<span class="d-block check"></span>
	</label>
	<?php get_template_part( 'afsThemeOptions/template/formPart/formErrors' ) ?>
</div>

