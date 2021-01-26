<?php
$options = [
	'goodsTop' => array(
		'title'   => esc_html__( 'Груз', 'workreap' ),
		'type'    => 'box',
		'options' => array(
			'photo'         => array(
				'label' => esc_html__( 'Фото', 'workreap' ),
				'type'  => 'multi-upload',
				'value' => ''
			),
			'title'         => array(
				'label' => esc_html__( 'Заголовк', 'workreap' ),
				'type'  => 'text',
				'value' => ''
			),
			'date'          => array(
				'label' => esc_html__( 'Выбрать дату услуги', 'workreap' ),
				'type'  => 'text',
				'desc'  => __( 'Формат 2021-01-07', 'lardi' ),
				'value' => ''
			),
			'time'          => array(
				'label' => esc_html__( 'Выбрать время услуги', 'workreap' ),
				'type'  => 'text',
				'desc'  => __( 'Формат 18:36', 'lardi' ),
				'value' => ''
			),
			'transport'     => array(
				'label' => esc_html__( 'Транспорт', 'workreap' ),
				'type'  => 'text',
				'desc'  => '',
				'value' => ''
			),
			'loading' => array(
				'label' => esc_html__( 'Погрузка', 'workreap' ),
				'type'  => 'checkbox',
				'value' => ''
			),
			'unloading' => array(
				'label' => esc_html__( 'Разгрузка', 'workreap' ),
				'type'  => 'checkbox',
				'value' => ''
			),
			'packaging' => array(
				'label' => esc_html__( 'Упаковка', 'workreap' ),
				'type'  => 'checkbox',
				'value' => ''
			),
			'riggingWorks' => array(
				'label' => esc_html__( 'Такелажные работы', 'workreap' ),
				'type'  => 'checkbox',
				'value' => ''
			),
			'description'   => array(
				'label' => esc_html__( 'Описание', 'workreap' ),
				'type'  => 'textarea',
				'value' => ''
			),

		),
	),

	'goodsCost' => array(
		'title'   => esc_html__( 'Стоимость услуги', 'workreap' ),
		'type'    => 'box',
		'options' => array(
			'costInput'     => array(
				'label' => esc_html__( 'Введите цену', 'workreap' ),
				'type'  => 'text',
				'value' => ''
			),
			'currency'      => array(
				'label' => esc_html__( 'Выбор валюты', 'workreap' ),
				'type'  => 'text',
				'value' => '',

			),
			'paymentFrom'   => array(
				'label' => esc_html__( 'Форма оплаты', 'workreap' ),
				'type'  => 'text',
				'value' => '',

			),
			'paymentMoment' => array(
				'label' => esc_html__( 'Момент оплаты', 'workreap' ),
				'type'  => 'text',
				'value' => '',

			),

		),
	),

	'goodsContacts' => array(
		'title'   => esc_html__( 'Контактные данные', 'workreap' ),
		'type'    => 'box',
		'options' => array(
			'name'  => array(
				'label' => esc_html__( 'Имя', 'workreap' ),
				'type'  => 'text',
				'value' => ''
			),
			'phone' => array(
				'label' => esc_html__( 'Телефон', 'workreap' ),
				'type'  => 'text',
				'value' => ''
			),
			'email' => array(
				'label' => esc_html__( 'Email', 'workreap' ),
				'type'  => 'text',
				'value' => ''
			),


		),
	),

];
