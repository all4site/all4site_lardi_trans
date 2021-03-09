<?php
$options = [
	'user_custom_fields' => array(
		'title'   => esc_html__( 'Данные пользователя', 'workreap' ),
		'type'    => 'box',
		'options' => array(
			'firstName' => array(
				'label' => esc_html__( 'Имя', 'workreap' ),
				'type'  => 'text',
				'value' => ''
			),
			'lastName'  => array(
				'label' => esc_html__( 'Фамилиля', 'workreap' ),
				'type'  => 'text',
				'value' => ''
			),
			'nickName'  => array(
				'label' => esc_html__( 'Никнейм', 'workreap' ),
				'type'  => 'text',
				'value' => ''
			),
			'userLogo'       => array(
				'label' => esc_html__( 'Выбрать фото профиля', 'workreap' ),
				'type'  => 'upload',
				'value' => []
			),

			'userSity'       => array(
				'label' => esc_html__( 'Город', 'workreap' ),
				'type'  => 'text',
				'value' => ''
			),
			'userPhone'      => array(
				'label' => esc_html__( 'Телефон', 'workreap' ),
				'type'  => 'text',
				'value' => ''
			),
			'userEmail'      => array(
				'label' => esc_html__( 'E-mail', 'workreap' ),
				'type'  => 'text',
				'value' => ''
			),
		),
	),
	'user_subscribe' => [
		'title' => esc_html__('User Subscribe', 'workreap'),
		'type' => 'box',
		'context' => 'side',
		'priority' => 'high',
		'options' =>[
			'subscribe' =>[
				'type' =>'date-picker',
				'label' => esc_html__( 'Subscribe', 'workreap' ),
					'desc'  => esc_html__( 'Дата окончания подписки', 'workreap' ),
				'fw-storage' => [
					'type'      => 'post-meta',
					'post-meta' => 'subscribe',
				],
			]
		]
	],
];