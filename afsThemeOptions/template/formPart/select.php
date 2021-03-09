<div class="form-group position-relative <?php echo ( isset( $args['wrpper-class'] ) ) ? $args['wrpper-class'] : '' ?>">
	<select 
		name="<?php echo ( isset( $args['args'] ) ) ? $args['args'] : '' ?>" 
		id="<?php echo ( isset( $args['args'] ) ) ? $args['args'] : '' ?>" 
		class="form-control text-secondary" type="select" <?php echo ( isset( $args['vue-data'] ) ) ? $args['vue-data'] : ''?>>

		<option selected disabled value=""><?php echo $args['title'] ?></option>
		<?php foreach ( $args['select-options'] as $key => $value ): ?>

			<?php if ( ! empty( $args['value'] ) && $args['value'] == $value ): ?>
				<option selected value="<?php echo $value; ?>"><?php echo $value; ?></option>
			<?php else: ?>
				<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
			<?php endif; ?>

		<?php endforeach; ?>

	</select>
	<?php get_template_part('afsThemeOptions/template/formPart/formErrors')?>
</div>
