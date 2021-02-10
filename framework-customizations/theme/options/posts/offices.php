<?php
$options = [
	'goodsTop' => array(
		'title'   => esc_html__( 'Груз', 'workreap' ),
		'type'    => 'box',
		'options' => array(
			'photo'        => array(
				'label' => esc_html__( 'Фото', 'workreap' ),
				'type'  => 'multi-upload',
				'value' => ''
			),
			'title'        => array(
				'label'      => esc_html__( 'Заголовк', 'workreap' ),
				'type'       => 'text',
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'title',
				],
			),
			'date'         => array(
				'label'      => esc_html__( 'Выбрать дату услуги', 'workreap' ),
				'type'       => 'text',
				'desc'       => __( 'Формат 2021-01-07', 'lardi' ),
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'date',
				],
			),
			'time'         => array(
				'label'      => esc_html__( 'Выбрать время услуги', 'workreap' ),
				'type'       => 'text',
				'desc'       => __( 'Формат 18:36', 'lardi' ),
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'time',
				],
			),
			'transport'    => array(
				'label'      => esc_html__( 'Транспорт', 'workreap' ),
				'type'       => 'text',
				'desc'       => '',
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'transport',
				],
			),
			'loading'      => array(
				'label'      => esc_html__( 'Погрузка', 'workreap' ),
				'type'       => 'checkbox',
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'loading',
				],
			),
			'unloading'    => array(
				'label'      => esc_html__( 'Разгрузка', 'workreap' ),
				'type'       => 'checkbox',
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'unloading',
				],
			),
			'packaging'    => array(
				'label'      => esc_html__( 'Упаковка', 'workreap' ),
				'type'       => 'checkbox',
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'packaging',
				],
			),
			'riggingWorks' => array(
				'label'      => esc_html__( 'Такелажные работы', 'workreap' ),
				'type'       => 'checkbox',
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'riggingWorks',
				],
			),
			'description'  => array(
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
				'type'       => 'text',
				'value'      => '',
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'goodsCost',
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
