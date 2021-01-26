<?php
require_once get_template_directory() . '/vendor/autoload.php';
require_once get_template_directory() . '/afsThemeOptions/afslFunctionsInclude.php';
global $form_error;
$form_error = new WP_Error();


//add_filter( 'upload_mimes', 'upload_allow_types' );
//function upload_allow_types( $mimes ) {
//
//	// разрешаем новые типы
//	$mimes['blob']  = 'image/jpg';
//	$mimes['blob']  = 'image/png';
//
//	return $mimes;
//}
//
//add_filter( 'getimagesize_mimes_to_exts', 'more_mimes_to_exts' );
//function more_mimes_to_exts( $mime_to_ext ){
//	$mime_to_ext['image/jpeg'] = 'blob';
//	$mime_to_ext['image/png'] = 'blob';
//
//	return $mime_to_ext;
//}