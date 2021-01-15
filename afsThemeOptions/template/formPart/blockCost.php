<h5 class="font-weight-bold mt-5 mb-4 col">Стоимость услуги</h5>
<div class="row">
	<?php get_template_part( 'afsThemeOptions/template/formPart/input', '', [ 'Введите цену', 'number', 'costInput', 'col-md-9 pr-1' ] ) ?>
	<?php get_template_part( 'afsThemeOptions/template/formPart/select', '', [ 'Валюта', 'currency', fw_get_db_settings_option( 'addCurrency' ), 'col-md-3 pl-1' ] ) ?>
	<?php get_template_part( 'afsThemeOptions/template/formPart/select', '', [ 'Форма оплаты', 'paymentFrom', fw_get_db_settings_option( 'addPaymentFrom' ), 'col-md-12' ] ) ?>
	<?php get_template_part( 'afsThemeOptions/template/formPart/select', '', [ 'Момент оплаты', 'paymentMoment', fw_get_db_settings_option( 'addPaymentMoment' ), 'col-md-12' ] ) ?>
</div>