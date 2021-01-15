<?php
add_action( 'wp_enqueue_scripts', 'registerScripts' );
add_action( 'admin_enqueue_scripts', 'adminCss' );

function registerScripts()
{
	wp_enqueue_script( 'mainData', get_template_directory_uri() . '/app/js/data.min.js', ['jquery'],'', true );
	wp_enqueue_script( 'mainJs', get_template_directory_uri() . '/app/js/old.min.js', [ 'vueJs' ], '', true );
	wp_enqueue_script( 'vueJs', get_template_directory_uri() . '/app/js/vendor/vue.js', [ 'axiosJs' ], '', true );
	wp_enqueue_script( 'axiosJs', get_template_directory_uri() . '/app/js/vendor/axios.js', '', '', true );
	wp_enqueue_script( 'vueDraggableJs', get_template_directory_uri() . '/app/js/vendor/Sortable.min.js', [ 'mainJs' ], '', true );
	wp_enqueue_style( 'bootstrapCss', get_template_directory_uri() . '/app/css/bootstrap.css' );
	wp_enqueue_style( 'fontAwesomeCss', get_template_directory_uri() . '/app/css/all.css' );
	wp_enqueue_style( 'mainCss', get_template_directory_uri() . '/app/css/main.css' );
}

function adminCss()
{
	wp_enqueue_style( 'adminCss', get_template_directory_uri() . '/app/css/admin/admin.css' );
}