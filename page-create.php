<?php get_header();
foreach ( createCategoryBlock() as $key => $value )
{
	if ( isset( $_GET[ $key ] ) )
	{
		get_template_part( 'afsThemeOptions/template/category/' . $key );
	}
}
get_footer();
