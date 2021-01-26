<?php

$options = [
	'goodsTop' => array(
		'title'   => esc_html__( 'Груз', 'workreap' ),
		'type'    => 'box',
		'options' => array(
			'photo'       => array(
				'label' => esc_html__( 'Фото', 'workreap' ),
				'type'  => 'multi-upload',
				'value' => ''
			),
			'title'       => array(
				'label' => esc_html__( 'Заголовк', 'workreap' ),
				'type'  => 'text',
				'value' => ''
			),
			'from'        => array(
				'label' => esc_html__( 'Откуда', 'workreap' ),
				'type'  => 'text',
				'value' => ''
			),
			'where'       => array(
				'label' => esc_html__( 'Куда', 'workreap' ),
				'type'  => 'text',
				'value' => ''
			),
			'bodyType'    => array(
				'label' => esc_html__( 'Тип кузова', 'workreap' ),
				'type'  => 'text',
				'value' => '',

			),
			'carModel'    => array(
				'label' => esc_html__( 'Марка авто', 'workreap' ),
				'type'  => 'text',
				'value' => '',

			),
			'peopleCount' => array(
				'label' => esc_html__( 'Сколько пассажиров готов взять', 'workreap' ),
				'type'  => 'text',
				'value' => '',

			),
			'date'        => array(
				'label' => esc_html__( 'Выбрать дату услуги', 'workreap' ),
				'type'  => 'text',
				'desc'  => __( 'Формат 2021-01-07', 'lardi' ),
				'value' => ''
			),
			'time'        => array(
				'label' => esc_html__( 'Выбрать время услуги', 'workreap' ),
				'type'  => 'text',
				'desc'  => __( 'Формат 18:36', 'lardi' ),
				'value' => ''
			),
			'description' => array(
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