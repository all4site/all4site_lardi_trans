<div class="form-group position-relative <?php echo $args[3]?>">
	<select name="<?php echo $args[1] ?>" id="<?php echo $args[1] ?>" class="form-control text-secondary">

		<option selected disabled value=""><?php echo $args[0] ?></option>
		<?php foreach ( $args[2] as $key => $value ): ?>
			<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
		<?php endforeach; ?>

	</select>
</div>
