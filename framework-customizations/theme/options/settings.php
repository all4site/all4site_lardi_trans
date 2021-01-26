<?php
$options = [
	'user_custom_fields'     => [
		'title'   => esc_html__( 'Данные пользователя', 'lardi' ),
		'type'    => 'tab',
		'options' => array(
			'fasebookLink'  => array(
				'label' => esc_html__( 'Fasebook', 'lardi' ),
				'type'  => 'text',
				'value' => ''
			),
			'instagramLink' => array(
				'label' => esc_html__( 'Instagram', 'lardi' ),
				'type'  => 'text',
				'value' => ''
			),
			'userEmail'     => array(
				'label' => esc_html__( 'Email', 'lardi' ),
				'type'  => 'text',
				'value' => ''
			),

		),
	],
	'user_custom_fields_two' => [
		'title'   => esc_html__( 'Разные ссылки', 'lardi' ),
		'type'    => 'tab',
		'options' => array(
			'userAagreement' => array(
				'label' => esc_html__( 'Пользовательсоке соглашение', 'lardi' ),
				'type'  => 'text',
				'desc'  => __( 'Тут нужно вставить ссылку на стать с соглашением', 'lardi' ),
				'value' => ''
			),
			'privacyPolicy'  => array(
				'label' => esc_html__( 'Правила конфиденциальности', 'lardi' ),
				'desc'  => __( 'Тут нужно вставить ссылку на стать с правилами', 'lardi' ),
				'type'  => 'text',
				'value' => ''
			),

		),
	],
	'floating_size'          => [
		'title'   => esc_html__( 'Настройки обьявлений', 'workreap' ),
		'type'    => 'tab',
		'options' => array(
			'addBodyType' => array(
				'type'            => 'addable-option',
				'value'           => [],
				'label'           => __( 'Добавить тип кузова', 'lardi' ),
				'desc'            => __( 'Добавить тип кузова', 'lardi' ),
				'add-button-text' => __( 'Добавить тип кузова', 'lardi' ),
				'sortable'        => true,
			),
			'addLoadingType' => array(
				'type'            => 'addable-option',
				'value'           => [],
				'label'           => __( 'Добавить тип загрузки', 'lardi' ),
				'desc'            => __( 'Добавить тип загрузки', 'lardi' ),
				'add-button-text' => __( 'Добавить тип загрузки', 'lardi' ),
				'sortable'        => true,
			),
			'addCarModel' => array(
				'type'            => 'addable-option',
				'value'           => [],
				'label'           => __( 'Добавить марку автомобиля', 'lardi' ),
				'desc'            => __( 'Добавить марку автомобиля', 'lardi' ),
				'add-button-text' => __( 'Добавить марку автомобиля', 'lardi' ),
				'sortable'        => true,
			),
			'addTransport' => array(
				'type'            => 'addable-option',
				'value'           => [],
				'label'           => __( 'Добавить транспорт', 'lardi' ),
				'desc'            => __( 'Добавить транспорт', 'lardi' ),
				'add-button-text' => __( 'Добавить транспорт', 'lardi' ),
				'sortable'        => true,
			),
			'addCurrency' => array(
				'type'            => 'addable-option',
				'value'           => [],
				'label'           => __( 'Добавить валюту', 'lardi' ),
				'desc'            => __( 'Добавить валюту', 'lardi' ),
				'add-button-text' => __( 'Добавить валюту', 'lardi' ),
				'sortable'        => true,
			),
			'addPaymentFrom' => array(
				'type'            => 'addable-option',
				'value'           => [],
				'label'           => __( 'Форма оплаты', 'lardi' ),
				'desc'            => __( 'Форма оплаты', 'lardi' ),
				'add-button-text' => __( 'Форма оплаты', 'lardi' ),
				'sortable'        => true,
			),
			'addPaymentMoment' => array(
				'type'            => 'addable-option',
				'value'           => [],
				'label'           => __( 'Момент оплаты', 'lardi' ),
				'desc'            => __( 'Момент оплаты', 'lardi' ),
				'add-button-text' => __( 'Момент оплаты', 'lardi' ),
				'sortable'        => true,
			),
		),
	],


];
