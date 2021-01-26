<div class="input-group form-group position-relative <?php echo $args['wrpper-class'] ?>">
	<input
		type="<?php echo $args['type'] ?>"
		placeholder="<?php echo $args['title'] ?>"
		name="<?php echo $args['args'] ?>"
		id="<?php echo $args['args'] ?>"
		value="<?php echo $args['value'] ?>"
		class="form-control <?php echo $args['input-class'] ?>">
	<div class="input-group-append">
		<span class="input-group-text <?php echo $args['label-span-class']?>" id="basic-addon2"><?php echo $args['label-text']?></span>
	</div>
<?php get_template_part('afsThemeOptions/template/formPart/formErrors')?>
</div>
