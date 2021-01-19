<h5 class="font-weight-bold mt-5 mb-4 col">Стоимость услуги</h5>
<div class="row">
	<?php get_template_part( 'afsThemeOptions/template/formPart/input', '', [
		'title'        => 'Введите цену',
		'type'         => 'number',
		'args'         => 'costInput',
		'value'        => $args['costInput'],
		'wrpper-class' => 'col-md-9 pr-1',
		'input-class'  => ''

	] ) ?>
	<?php get_template_part( 'afsThemeOptions/template/formPart/select', '', [
		'title'          => 'Валюта',
		'args'           => 'currency',
		'select-options' => fw_get_db_settings_option( 'addCurrency' ),
		'value'          => $args['currency'],
		'wrpper-class'   => 'col-md-3 pl-1',
		'input-class'    => ''

	] ) ?>
	<?php get_template_part( 'afsThemeOptions/template/formPart/select', '', [
		'title'          => 'Форма оплаты',
		'args'           => 'paymentFrom',
		'select-options' => fw_get_db_settings_option( 'addPaymentFrom' ),
		'value'          => $args['paymentFrom'],
		'wrpper-class'   => 'col-md-12',
		'input-class'    => ''
	] ) ?>
	<?php get_template_part( 'afsThemeOptions/template/formPart/select', '', [
		'title'          => 'Момент оплаты',
		'args'           => 'paymentMoment',
		'select-options' => fw_get_db_settings_option( 'addPaymentMoment' ),
		'value'          => $args['paymentMoment'],
		'wrpper-class'   => 'col-md-12',
		'input-class'    => ''
	] ) ?>
</div>