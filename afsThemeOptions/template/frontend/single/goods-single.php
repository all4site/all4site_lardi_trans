<?php

//dump( $args );
$args = [
	'Дата услуги'      => ( $args['date'] ) ? $args['date'] : '',
	'Время услуги'     => ( $args['time'] ) ? $args['time'] : '',
	'Откуда?'          => ( $args['from'] ) ? $args['from'] : '',
	'Куда?'            => ( $args['where'] ) ? $args['where'] : '',
	'Длинна'           => ( $args['lenth'] ) ? $args['lenth'] . ' м' : '',
	'Ширина'           => ( $args['width'] ) ? $args['width'] . ' м' : '',
	'Высота'           => ( $args['height'] ) ? $args['height'] . ' м' : '',
	'Масса'            => ( $args['weight'] ) ? $args['weight'] . ' кг' : '',
	'Обьем'            => ( $args['volume'] ) ? $args['volume'] . ' л' : '',
	'Тип кузова'       => ( $args['bodyType'] ) ? $args['bodyType'] : '',
	'Грузоподьемность' => ( $args['carrying'] ) ? $args['carrying'] . ' кг' : '',
	'Тип загрузки'     => ( $args['loadingType'] ) ? $args['loadingType'] : '',
	'Дозагрузка'       => ( $args['groupageCargo'] == '' ) ? 'Нет' : 'Да',
	'Форма оплаты'     => ( $args['paymentFrom'] ) ? $args['paymentFrom'] : '',
	'Момент оплаты'    => ( $args['paymentMoment'] ) ? $args['paymentMoment'] : '',
];
?>


<?php foreach ( $args as $key => $value ): ?>
	<?php if ( ! $value )
		continue ?>
	<div class="data col-md-6 py-2 font-weight-bold my-border basic-font-size-small-2"><?php echo $key ?></div>
	<div class="value col-md-6 py-2 my-border basic-font-size-small-2"><?php echo $value ?></div>
<?php endforeach; ?>

