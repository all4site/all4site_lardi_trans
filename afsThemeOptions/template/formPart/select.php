<div class="form-group position-relative <?php echo $args['wrpper-class'] ?>">
	<select name="<?php echo $args['args'] ?>" id="<?php echo $args['args'] ?>" class="form-control text-secondary" type="select">

		<option selected disabled value="false"><?php echo $args['title'] ?></option>
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
