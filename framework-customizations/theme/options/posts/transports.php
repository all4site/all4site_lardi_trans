<?php
$options = [
	'goodsTop' => array(
		'title'   => esc_html__( 'Груз', 'workreap' ),
		'type'    => 'box',
		'options' => array(
			'photo'    => array(
				'label' => esc_html__( 'Фото', 'workreap' ),
				'type'  => 'multi-upload',
				'value' => ''
			),
			'title'    => array(
				'label'      => esc_html__( 'Заголовк', 'workreap' ),
				'type'       => 'text',
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'title',
				],
			),
			'from'     => array(
				'label'      => esc_html__( 'Откуда', 'workreap' ),
				'type'       => 'text',
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'from',
				],
			),
			'where'    => array(
				'label'      => esc_html__( 'Куда', 'workreap' ),
				'type'       => 'text',
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'where',
				],
			),
			'date'     => array(
				'label'      => esc_html__( 'Выбрать дату услуги', 'workreap' ),
				'type'       => 'text',
				'desc'       => __( 'Формат 2021-01-07', 'lardi' ),
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'date',
				],
			),
			'time'     => array(
				'label'      => esc_html__( 'Выбрать время услуги', 'workreap' ),
				'type'       => 'text',
				'desc'       => __( 'Формат 18:36', 'lardi' ),
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'time',
				],
			),
			'bodyType' => array(
				'label'      => esc_html__( 'Тип кузова', 'workreap' ),
				'type'       => 'text',
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'bodyType',
				],

			),

		),
	),

	'goodSize' => array(
		'title'   => esc_html__( 'Размер', 'workreap' ),
		'type'    => 'box',
		'options' => array(
			'lenth'       => array(
				'label'      => esc_html__( 'Длинна', 'workreap' ),
				'type'       => 'number',
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'lenth',
				],
			),
			'width'       => array(
				'label'      => esc_html__( 'Ширина', 'workreap' ),
				'type'       => 'number',
				'value'      => '',
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'width',
				],
			),
			'height'      => array(
				'label'      => esc_html__( 'Высота', 'workreap' ),
				'type'       => 'number',
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'height',
				],
			),
			'carrying'    => array(
				'label'      => esc_html__( 'Грузоподьемность', 'workreap' ),
				'type'       => 'number',
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'carrying',
				],
			),
			'loadingType' => array(
				'label'      => esc_html__( 'Тип загрузки', 'workreap' ),
				'type'       => 'text',
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'loadingType',
				],
			),
			'volume'      => array(
				'label'      => esc_html__( 'Обьем', 'workreap' ),
				'type'       => 'number',
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'volume',
				],
			),

			'groupageCargo' => array(
				'label'      => esc_html__( 'Согласен с составе сборного груза', 'workreap' ),
				'type'       => 'checkbox',
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'groupageCargo',
				],
			),
			'description'   => array(
				'label'      => esc_html__( 'Описание', 'workreap' ),
				'type'       => 'textarea',
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'description',
				],
			),

		),
	),

	'goodsCost' => array(
		'title'   => esc_html__( 'Стоимость услуги', 'workreap' ),
		'type'    => 'box',
		'options' => array(
			'costInput'     => array(
				'label'      => esc_html__( 'Введите цену', 'workreap' ),
				'type'       => 'number',
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'costInput',
				],
			),
			'currency'      => array(
				'label'      => esc_html__( 'Выбор валюты', 'workreap' ),
				'type'       => 'text',
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'currency',
				],

			),
			'paymentFrom'   => array(
				'label'      => esc_html__( 'Форма оплаты', 'workreap' ),
				'type'       => 'text',
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'paymentFrom',
				],

			),
			'paymentMoment' => array(
				'label'      => esc_html__( 'Момент оплаты', 'workreap' ),
				'type'       => 'text',
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'paymentMoment',
				],

			),

		),
	),

	'goodsContacts' => array(
		'title'   => esc_html__( 'Контактные данные', 'workreap' ),
		'type'    => 'box',
		'options' => array(
			'name'  => array(
				'label'      => esc_html__( 'Имя', 'workreap' ),
				'type'       => 'text',
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'name',
				],
			),
			'phone' => array(
				'label'      => esc_html__( 'Телефон', 'workreap' ),
				'type'       => 'text',
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'phone',
				],
			),
			'email' => array(
				'label'      => esc_html__( 'Email', 'workreap' ),
				'type'       => 'text',
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'email',
				],
			),


		),
	),

];