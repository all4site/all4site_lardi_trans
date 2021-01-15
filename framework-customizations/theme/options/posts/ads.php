<?php
$options = [
	'user_custom_fields' => array(
		'title'   => esc_html__( 'Данные рекламмы', 'workreap' ),
		'type'    => 'box',
		'options' => array(
			'adsRreferalLink' => array(
				'label' => esc_html__( 'Реферальная ссылка', 'workreap' ),
				'type'  => 'text',
				'value' => ''
			),
			'adsImage' => array(
				'label' => esc_html__( 'Картинка', 'workreap' ),
				'type'  => 'upload',
				'value' => ''
			),
			'adsSlug' => array(
				'label' => esc_html__( 'Ads unic id', 'workreap' ),
				'type'  => 'text',
				'value' => ''
			),
		),
	)
];