<div class="form-group position-relative <?php echo $args['wrpper-class'] ?>">

	<input name="<?php echo $args['args'] ?>"
	       type="<?php echo $args['type'] ?>"
	       class="form-check-input my-checkbox <?php echo $args['input-class'] ?>"
	       id="checkbox"
	       v-model="checked" true-value="1" false-value="0"
	       :value="checked"	>

	<label for="checkbox" class="form-check-label">
		<?php echo $args['title'] ?>
		<span class="d-block check"></span>
	</label>

</div>

