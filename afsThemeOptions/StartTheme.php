<?php


namespace AFS;
use WP_Error;

class StartTheme
{
	public function __construct()
	{
		$this->requireAjax();
		$this->requireClasses();
		$this->requireFiles();
		$this->requreError();
	}

	public function requireAjax()
	{
		require_once get_template_directory() . '/afsThemeOptions/ajax/passwordChange.php';
		require_once get_template_directory() . '/afsThemeOptions/ajax/userForm.php';
		require_once get_template_directory() . '/afsThemeOptions/ajax/contactFormFooter.php';
		require_once get_template_directory() . '/afsThemeOptions/ajax/createAndUpdatePost.php';
		require_once get_template_directory() . '/afsThemeOptions/ajax/filters/getWpData.php';
		require_once get_template_directory() . '/afsThemeOptions/ajax/filters/goodsFilters.php';

	}

	public function requireClasses()
	{
		new \AFS\ThemeSetup();
		new \AFS\ThemeRoutes();
		new \AFS\ThemeScriptsAndStyles();
		new \AFS\UserSetup();
		new \AFS\PostDeleteAndEdit();
	}

	public function requireFiles()
	{
		require_once get_template_directory() . '/afsThemeOptions/helpers.php';
		require_once get_template_directory() . '/afsThemeOptions/passwordValidation.php';

	}

	public function requreError(  )
	{
		global $form_error;
		$form_error = new WP_Error();
	}
}