<?php 
/**
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *LOh
 *
 * @package WordPress
 * @subpackage Bacardi theme
 * @since Bacardi theme 1.0
 */
 
if(!defined('THEME_OPT')){
	define('THEME_OPT', 'bacardi');
}

/*includes*/

if(file_exists(get_template_directory().'/inc/theme_supports.php'))
	require_once get_template_directory().'/inc/theme_supports.php';

if(file_exists(get_template_directory().'/inc/bc_slider.php'))
	require_once get_template_directory().'/inc/bc_slider.php';

if(file_exists(get_template_directory().'/inc/redux/loader.php'))
	require_once get_template_directory().'/inc/redux/loader.php';

if(file_exists(get_template_directory().'/inc/bc_walker.php'))
	require_once get_template_directory().'/inc/bc_walker.php';

if(file_exists(get_template_directory().'/inc/category_custom_field.php'))
	require_once get_template_directory().'/inc/category_custom_field.php';

if(!function_exists('bc_load_scripts')){
	
	function bc_load_scripts(){
		
		wp_dequeue_script( 'select2-js' );
		wp_deregister_script("select2-js");

		wp_register_script('bc-bootstrap', get_template_directory_uri().'/js/lib/bootstrap.min.js', array('jquery'), time(), true);
		wp_register_script('bc-slick-slider', get_template_directory_uri().'/js/lib/slick.min.js', array('jquery'), time(), true);
		wp_register_script('bc-theme-script', get_template_directory_uri().'/js/theme_script.js', array('jquery', 'bc-bootstrap', 'bc-slick-slider'), time(), true);
		wp_enqueue_script('bc-theme-script');
		wp_enqueue_script('bc-bootstrap');
		wp_enqueue_script('bc-slick-slider');
		wp_register_style('style', get_template_directory_uri().'/css/style.min.css', array(), time(), false);

		wp_enqueue_style('style');

	}

	add_action('wp_enqueue_scripts', 'bc_load_scripts', 1);

}

if(!function_exists('bc_load_admin_scripts')){

	function bc_load_admin_scripts(){

		// wp_dequeue_style('select2-css');
		// wp_dequeue_script( 'redux-field-select-js' );
		// wp_deregister_script("redux-field-select-js");
		wp_register_script('tinymce-redux-options', includes_url()."js/tinymce/tinymce.min.js", array('jquery'), time());
		wp_register_script('select2-js',  "//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js", array('jquery'), time());
		wp_register_script('admin_select_ajax', get_stylesheet_directory_uri()."/js/admin.js", array('jquery', 'redux-select2-ajax'));

	}

	add_action('admin_enqueue_scripts', 'bc_load_admin_scripts', 10);

}

if(!function_exists('bc_admin_options_script')){
	
	function bc_admin_options_script(){

		wp_dequeue_style('select2-css');
		wp_enqueue_script('select2-js');
		wp_enqueue_script('tinymce-redux-options');
		wp_enqueue_script('redux-select2-ajax');
		wp_enqueue_script('admin_select_ajax');
		wp_enqueue_style('select2_v4', '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css');

	}

	add_action("admin_print_scripts-toplevel_page_theme_options", 'bc_admin_options_script');
}

if(!function_exists('bc_check_enabled_footer_widgets')){

	function bc_check_enabled_footer_widgets(){
		$widgets = array(); 
		if(is_active_sidebar('footer-widget-1'))
			$widgets[]='footer-widget-1';
		if(is_active_sidebar('footer-widget-2'))
			$widgets[]='footer-widget-2';
		if(is_active_sidebar('footer-widget-3'))
			$widgets[]='footer-widget-3';
		if(is_active_sidebar('footer-widget-4'))
			$widgets[]='footer-widget-4';
		return $widgets;
	}

}


if(!function_exists('bc_define_footer_widget_class')){

	function bc_define_footer_widget_class($count=0){
		
		switch ($count) {
			case '0':
				$class = 'col-md-12 col-sm-12 col-xs-12';
				break;
			case '1':
				$class = 'col-md-12 col-sm-12 col-xs-12';
				break;
			case '2':
				$class = 'col-md-6 col-sm-6 col-xs-12';
				break;
			case '3':
				$class = 'col-md-4 col-sm-4 col-xs-12';
				break;
			case '4':
				$class = 'col-md-3 col-sm-3 col-xs-12';
				break;
			default:
				$class = 'col-md-12 col-sm-12 col-xs-12';
				break;
		}

		return $class;

	}

} 