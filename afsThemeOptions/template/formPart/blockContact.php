<h5 class="font-weight-bold mt-5 mb-4 col">Контактные данные</h5>
<?php get_template_part( 'afsThemeOptions/template/formPart/input', '', [
	'title'        => 'Имя',
	'type'         => 'text',
	'args'         => 'name',
	'value'        => ( isset( $args['name'] ) ) ? $args['name'] : '',
	'wrpper-class' => '',
	'input-class'  => ''
] ) ?>
<?php get_template_part( 'afsThemeOptions/template/formPart/input', '', [
	'title'        => 'Телефон',
	'type'         => 'text',
	'args'         => 'phone',
	'value'        => ( isset( $args['phone'] ) ) ? $args['phone'] : '',
	'wrpper-class' => '',
	'input-class'  => ''
] ) ?>
<?php get_template_part( 'afsThemeOptions/template/formPart/input', '', [
	'title'        => 'Email',
	'type'         => 'text',
	'args'         => 'email',
	'value'        => ( isset( $args['email'] ) ) ? $args['email'] : '',
	'wrpper-class' => '',
	'input-class'  => ''
] ) ?>
