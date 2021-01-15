<?php

add_action( 'wp_ajax_createAndUpdatePost', 'createAndUpdatePost' );
add_action( 'wp_ajax_nopriv_createAndUpdatePost', 'createAndUpdatePost' );


function createAndUpdatePost()
{
	dump($_POST);
	$test = [
		'name' => 'Ошибка',
		'name1' => 'Ошибка',
	];
	wp_send_json_error($test);
}