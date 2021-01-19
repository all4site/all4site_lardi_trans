<?php $opacity = ! empty( $args['value'] ) ? 'opacity-1' : 'opacity-0' ?>
<div class="form-group position-relative">
	<label for="time" class="labelData">
		Выбрать дату поезки
		<i class="far fa-clock position-absolute icon-for-data-time"></i>
	</label>
	<input type="time" name="time" id="time" class="form-control <?php echo $opacity ?>" value="<?php echo $args['value'] ?>">
</div>
