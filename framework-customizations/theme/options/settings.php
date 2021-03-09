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
			'logo'          => array(
				'label' => esc_html__( 'Logo', 'lardi' ),
				'type'  => 'upload',
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
			'addBodyType'      => array(
				'type'            => 'addable-option',
				'value'           => [],
				'label'           => __( 'Добавить тип кузова', 'lardi' ),
				'desc'            => __( 'Добавить тип кузова', 'lardi' ),
				'add-button-text' => __( 'Добавить тип кузова', 'lardi' ),
				'sortable'        => true,
			),
			'addLoadingType'   => array(
				'type'            => 'addable-option',
				'value'           => [],
				'label'           => __( 'Добавить тип загрузки', 'lardi' ),
				'desc'            => __( 'Добавить тип загрузки', 'lardi' ),
				'add-button-text' => __( 'Добавить тип загрузки', 'lardi' ),
				'sortable'        => true,
			),
			'addCarModel'      => array(
				'type'            => 'addable-option',
				'value'           => [],
				'label'           => __( 'Добавить марку автомобиля', 'lardi' ),
				'desc'            => __( 'Добавить марку автомобиля', 'lardi' ),
				'add-button-text' => __( 'Добавить марку автомобиля', 'lardi' ),
				'sortable'        => true,
			),
			'addTransport'     => array(
				'type'            => 'addable-option',
				'value'           => [],
				'label'           => __( 'Добавить транспорт', 'lardi' ),
				'desc'            => __( 'Добавить транспорт', 'lardi' ),
				'add-button-text' => __( 'Добавить транспорт', 'lardi' ),
				'sortable'        => true,
			),
			'addCurrency'      => array(
				'type'            => 'addable-option',
				'value'           => [],
				'label'           => __( 'Добавить валюту', 'lardi' ),
				'desc'            => __( 'Добавить валюту', 'lardi' ),
				'add-button-text' => __( 'Добавить валюту', 'lardi' ),
				'sortable'        => true,
			),
			'addPaymentFrom'   => array(
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

	'user_adds_filters' => [
		'title'   => esc_html__( 'Настройки фильтров', 'lardi' ),
		'type'    => 'tab',
		'options' => array(

			'lenth_filter' => [
				'label'         => esc_html__( 'Длинна', 'workreap' ),
				'type'          => 'addable-popup',
				'value'         => array(),
				'desc'          => esc_html__( 'Длинна', 'workreap' ),
				'popup-options' => [
					'name' => array(
						'type'  => 'text',
						'label' => esc_html__( 'Длинна', 'workreap' ),
						'value' => '',
						'desc'  => esc_html__( 'Длинна', 'workreap' ),
					),
					'from' => array(
						'type'  => 'number',
						'label' => esc_html__( 'Длинна от', 'workreap' ),
						'value' => '',
						'desc'  => esc_html__( 'Длинна от', 'workreap' ),
					),
					'to'   => array(
						'type'  => 'number',
						'label' => esc_html__( 'Длинна до', 'workreap' ),
						'value' => '',
						'desc'  => esc_html__( 'Длинна до', 'workreap' ),
					),
				],

				'template' => "<div>Имя: {{-name}}</div>
									<div>От м: {{-from}}</div>
									<div>До м: {{-to}}</div>

									",
			],

			'width_filter' => [
				'label'         => esc_html__( 'Ширина', 'workreap' ),
				'type'          => 'addable-popup',
				'value'         => array(),
				'desc'          => esc_html__( 'Ширина', 'workreap' ),
				'popup-options' => [
					'name' => array(
						'type'  => 'text',
						'label' => esc_html__( 'Ширина', 'workreap' ),
						'value' => '',
						'desc'  => esc_html__( 'Ширина', 'workreap' ),
					),
					'from' => array(
						'type'  => 'number',
						'label' => esc_html__( 'Ширина от', 'workreap' ),
						'value' => '',
						'desc'  => esc_html__( 'Ширина от', 'workreap' ),
					),
					'to'   => array(
						'type'  => 'number',
						'label' => esc_html__( 'Ширина до', 'workreap' ),
						'value' => '',
						'desc'  => esc_html__( 'Ширина до', 'workreap' ),
					),
				],

				'template' => "<div>Имя: {{-name}}</div>
									<div>От м: {{-from}}</div>
									<div>До м: {{-to}}</div>

									",
			],

			'height_fiter' => [
				'label'         => esc_html__( 'Высота', 'workreap' ),
				'type'          => 'addable-popup',
				'value'         => array(),
				'desc'          => esc_html__( 'Высота', 'workreap' ),
				'popup-options' => [
					'name' => array(
						'type'  => 'text',
						'label' => esc_html__( 'Высота', 'workreap' ),
						'value' => '',
						'desc'  => esc_html__( 'Высота', 'workreap' ),
					),
					'from' => array(
						'type'  => 'number',
						'label' => esc_html__( 'Высота от', 'workreap' ),
						'value' => '',
						'desc'  => esc_html__( 'Высота от', 'workreap' ),
					),
					'to'   => array(
						'type'  => 'number',
						'label' => esc_html__( 'Высота до', 'workreap' ),
						'value' => '',
						'desc'  => esc_html__( 'Высота до', 'workreap' ),
					),
				],

				'template' => "<div>Имя: {{-name}}</div>
									<div>От м: {{-from}}</div>
									<div>До м: {{-to}}</div>

									",
			],

			'weight_fiter' => [
				'label'         => esc_html__( 'Масса', 'workreap' ),
				'type'          => 'addable-popup',
				'value'         => array(),
				'desc'          => esc_html__( 'Масса', 'workreap' ),
				'popup-options' => [
					'name' => array(
						'type'  => 'text',
						'label' => esc_html__( 'Масса', 'workreap' ),
						'value' => '',
						'desc'  => esc_html__( 'Масса', 'workreap' ),
					),
					'from' => array(
						'type'  => 'number',
						'label' => esc_html__( 'Масса от', 'workreap' ),
						'value' => '',
						'desc'  => esc_html__( 'Масса от', 'workreap' ),
					),
					'to'   => array(
						'type'  => 'number',
						'label' => esc_html__( 'Масса до', 'workreap' ),
						'value' => '',
						'desc'  => esc_html__( 'Масса до', 'workreap' ),
					),
				],

				'template' => "<div>Имя: {{-name}}</div>
									<div>От м: {{-from}}</div>
									<div>До м: {{-to}}</div>

									",
			],

			'volume_fiter' => [
				'label'         => esc_html__( 'Обьем', 'workreap' ),
				'type'          => 'addable-popup',
				'value'         => array(),
				'desc'          => esc_html__( 'Обьем', 'workreap' ),
				'popup-options' => [
					'name' => array(
						'type'  => 'text',
						'label' => esc_html__( 'Обьем', 'workreap' ),
						'value' => '',
						'desc'  => esc_html__( 'Обьем', 'workreap' ),
					),
					'from' => array(
						'type'  => 'number',
						'label' => esc_html__( 'Обьем от', 'workreap' ),
						'value' => '',
						'desc'  => esc_html__( 'Обьем от', 'workreap' ),
					),
					'to'   => array(
						'type'  => 'number',
						'label' => esc_html__( 'Обьем до', 'workreap' ),
						'value' => '',
						'desc'  => esc_html__( 'Обьем до', 'workreap' ),
					),
				],

				'template' => "<div>Имя: {{-name}}</div>
									<div>От м: {{-from}}</div>
									<div>До м: {{-to}}</div>

									",
			],


		),
	],

	'post_options' => [
		'title'   => esc_html__( 'Настройки постов', 'lardi' ),
		'type'    => 'tab',
		'options' => array(
			'postPerPage'     => array(
				'label' => esc_html__( 'Количество на странице', 'lardi' ),
				'type'  => 'number',
				'value' => ''
			),
			'postPerHomePage' => array(
				'label' => esc_html__( 'Количество на главной странице', 'lardi' ),
				'type'  => 'number',
				'value' => ''
			),
		),
	],

	'paypal_options' => [
		'title'   => esc_html__( 'Настройка подписки', 'lardi' ),
		'type'    => 'tab',
		'options' => array(
			'paypalID'       => array(
				'label' => esc_html__( 'Client ID', 'lardi' ),
				'type'  => 'text',
				'value' => '',
			),
			'subscribeOffOn' => array(
				'label' => esc_html__( 'Вклюить или выключить подписку', 'lardi' ),
				'type'  => 'switch',
				'value' => '',
			),
			'subscribeData'  => [
				'label'         => esc_html__( 'Подписка правила', 'lardi' ),
				'type'          => 'popup',
				'popup-options' => [
					'price'      => array(
						'label' => esc_html__( 'Цена', 'lardi' ),
						'type'  => 'text'
					),
					'priceSmall' => array(
						'label' => esc_html__( 'Дней', 'lardi' ),
						'type'  => 'text'
					),
					'priceTextarea' => array(
						'label' => esc_html__( 'Описание', 'lardi' ),
						'type'  => 'textarea'
					),

					'subscribeRules' => [
						'label'         => esc_html__( 'Правила подписки', 'lardi' ),
						'type'          => 'addable-popup',
						'popup-options' => [
							'name' => array(
								'type'  => 'text',
								'label' => esc_html__( 'Добавить правило', 'lardi' ),
								'value' => '',
								'desc'  => esc_html__( 'Добавить правило', 'lardi' ),
							),
						],
						'template'      => "<div>Имя: {{-name}}</div>",
					],

				]
			]
		),
	],

	'ads' => [
		'title'   => esc_html__( 'Настройка рекламмы', 'lardi' ),
		'type'    => 'tab',
		'options' => array(
			'adsGlobal' => [
				'type'    => 'group',
				'options' => array(

					'adsTopRight' => array(
						'label'         => esc_html__( 'Право верх', 'lardi' ),
						'desc'          => esc_html__( 'Добавить рекламму', 'lardi' ),
						'type'          => 'popup',
						'popup-options' => array(
							'link'   => array(
								'label' => esc_html__( 'Ссылка на ркламму', 'lardi' ),
								'type'  => 'text'
							),
							'text'   => array(
								'label' => esc_html__( 'Текст поверх рекламмы', 'lardi' ),
								'type'  => 'text'
							),
							'upload' => array(
								'label' => esc_html__( 'Картинка для рекламмы', 'lardi' ),
								'type'  => 'upload'
							),
						),
					),

					'adsBottomRight' => array(

						'desc'          => esc_html__( 'Добавить рекламму', 'lardi' ),
						'type'          => 'popup',
						'popup-options' => array(
							'link'   => array(
								'label' => esc_html__( 'Ссылка на ркламму', 'lardi' ),
								'type'  => 'text'
							),
							'text'   => array(
								'label' => esc_html__( 'Текст поверх рекламмы', 'lardi' ),
								'type'  => 'text'
							),
							'upload' => array(
								'label' => esc_html__( 'Картинка для рекламмы', 'lardi' ),
								'type'  => 'upload'
							),
						),
					),

					'adsSmallTop' => array(

						'desc'          => esc_html__( 'Добавить рекламму', 'lardi' ),
						'type'          => 'popup',
						'popup-options' => array(
							'link'   => array(
								'label' => esc_html__( 'Ссылка на ркламму', 'lardi' ),
								'type'  => 'text'
							),
							'text'   => array(
								'label' => esc_html__( 'Текст поверх рекламмы', 'lardi' ),
								'type'  => 'text'
							),
							'upload' => array(
								'label' => esc_html__( 'Картинка для рекламмы', 'lardi' ),
								'type'  => 'upload'
							),
						),
					),

				),
			],


		),
	],

];
