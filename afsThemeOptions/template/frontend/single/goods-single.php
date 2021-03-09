<?php

//dump( $args );

$args = [
	'Дата услуги'       => $args['date'] ?? '',
	'Время услуги'      => $args['time'] ?? '',
	'Откуда?'           => $args['from'] ?? '',
	'Куда?'             => $args['where'] ?? '',
	'Транспорт'         => $args['transport'] ?? '',
	'Погрузка'          => $args['loading'] ?? '',
	'Разгрузка'         => $args['unloading'] ?? '',
	'Упаковка'          => $args['packaging'] ?? '',
	'Такелажные работы' => $args['riggingWorks'] ?? '',
	'Длинна'            => isset( $args['lenth'] ) ? $args['lenth'] . ' м' : '',
	'Ширина'            => isset( $args['width'] ) ? $args['width'] . ' м' : '',
	'Высота'            => isset( $args['height'] ) ? $args['height'] . ' м' : '',
	'Масса'             => isset( $args['weight'] ) ? $args['weight'] . ' кг' : '',
	'Обьем'             => isset( $args['volume'] ) ? $args['volume'] . ' л' : '',
	'Тип кузова'        => $args['bodyType'] ?? '',
	'Марка авто'        => $args['carModel'] ?? '',
	'Число пассажиров'  => $args['peopleCount'] ?? '',
	'Грузоподьемность'  => isset( $args['carrying'] ) ? $args['carrying'] . ' кг' : '',
	'Тип загрузки'      => $args['loadingType'] ?? '',
	'Дозагрузка'        => isset( $args['groupageCargo'] ) ? 'Да' : '',
	'Форма оплаты'      => $args['paymentFrom'] ?? '',
	'Момент оплаты'     => $args['paymentMoment'] ?? '',
];
?>


<?php foreach ( $args as $key => $value ): ?>
	<?php if ( ! $value )
		continue ?>
	<div class="data col-md-6 py-2 font-weight-bold my-border basic-font-size-small-3 text-nowrap"><?php echo $key ?></div>
	<div class="value col-md-6 py-2 my-border basic-font-size-small-3"><?php echo $value ?></div>
<?php endforeach; ?>

