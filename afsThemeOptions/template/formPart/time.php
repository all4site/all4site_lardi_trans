<?php $opacity = ! empty( $args['value'] ) ? 'opacity-1' : 'opacity-0' ?>
<div class="form-group position-relative <?php echo ( isset( $args['wrpper-class'] ) ) ? $args['wrpper-class'] : '' ?>">

	<label for="time" class="labelData">
		<?php echo ( isset( $args['title'] ) ) ? $args['title'] : 'Выбрать дату поезки' ?>

		<i class="far fa-clock position-absolute icon-for-data-time"></i>
	</label>

	<input type="time" name="time" id="time"
	       class="form-control <?php echo $opacity ?> <?php echo ( isset( $args['input-class'] ) ) ? $args['input-class'] : '' ?>"
	       @click="showDateTime"
		<?php echo ( isset( $args['vue-data'] ) ) ? $args['vue-data'] : '' ?>
		   value="<?php echo ( isset( $args['value'] ) ) ? $args['value'] : '' ?>">

	<?php get_template_part( 'afsThemeOptions/template/formPart/formErrors' ) ?>
</div>
