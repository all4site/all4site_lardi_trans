<?php $opacity = ! empty( $args['value'] ) ? 'opacity-1' : 'opacity-0' ?>
<div class="form-group position-relative <?php echo ( isset( $args['wrpper-class'] ) ) ? $args['wrpper-class'] : ''?>">

	<label for="date" class="labelData">

		<?php echo ( empty($args['title'])) ? 'Выбрать дату поезки' : $args['title']; ?>
		<i class="far fa-calendar-alt position-absolute icon-for-data-time"></i>
	</label>

	<input type="date"
	       name="date" id="date" class="form-control <?php echo $opacity ?>"
	       @click="showDateTime"
	       <?php echo ( isset( $args['vue-data'] ) ) ? $args['vue-data'] : ''?>
	       value="<?php echo $args['value'] ?>">

	<?php get_template_part( 'afsThemeOptions/template/formPart/formErrors' ) ?>
</div>
