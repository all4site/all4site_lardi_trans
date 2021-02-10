<div class="form-group position-relative <?php echo $args['wrpper-class'] ?>">
	<i class="<?php echo $args['icon-class'] ?>"></i>
	<textarea name="<?php echo $args['name']?>" id="<?php echo $args['id']?>" rows="<?php echo ( $args['textarea-row'] ) ? $args['textarea-row'] : 4; ?>" class="form-control" placeholder="<?php echo $args['value'] ?>" type="textarea"></textarea>
	<?php get_template_part( 'afsThemeOptions/template/formPart/formErrors' ) ?>
</div>
