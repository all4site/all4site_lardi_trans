<?php $opacity = ! empty( $args['value'] ) ? 'opacity-1' : 'opacity-0' ?>
<div class="form-group position-relative">
	<label for="date" class="labelData">
		Выбрать дату поезки
		<i class="far fa-calendar-alt position-absolute icon-for-data-time"></i>
	</label>
	<input type="date" name="date" id="date" class="form-control <?php echo $opacity?>" value="<?php echo $args['value'] ?>">
</div>
