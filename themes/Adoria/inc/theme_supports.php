<?php 
/**
 *
 *
 *
 * @package WordPress
 * @subpackage Bacardi theme
 * @since Bacardi theme 1.0
 */

if(!function_exists('bacardi_theme_setup')):

	function bacardi_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Sixteen, use a find and replace
		 * to change 'bacardi-theme' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'bacardi', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'bacardi-theme' ),
			'social'  => __( 'Social Links Menu', 'bacardi-theme' ),
			'footer'  => __( 'Footer Menu', 'bacardi-theme' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat',
		) );	
	}

	add_action( 'after_setup_theme', 'bacardi_theme_setup' );

endif; // bacardi_theme_setup


if(!function_exists('register_bc_widgets')):

	function register_bc_widgets(){

		register_sidebar( array(
			'name'          => 'sidebar-bacardi',
			'id'            => 'sidebar-bacardi',
			'description'   => '',
			'class'         => '',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => "</li>\n",
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => "</h2>\n",
		) );

		register_sidebar( array(
			'name'          => 'footer-widget-1',
			'id'            => 'footer-widget-1',
			'description'   => '',
			'class'         => '',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => "</li>\n",
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => "</h2>\n",
		) );

		register_sidebar( array(
			'name'          => 'footer-widget-2',
			'id'            => 'footer-widget-2',
			'description'   => '',
			'class'         => '',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => "</li>\n",
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => "</h2>\n",
		) );

		register_sidebar( array(
			'name'          => 'footer-widget-3',
			'id'            => 'footer-widget-3',
			'description'   => '',
			'class'         => '',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => "</li>\n",
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => "</h2>\n",
		) );

		register_sidebar( array(
			'name'          => 'footer-widget-4',
			'id'            => 'footer-widget-4',
			'description'   => '',
			'class'         => '',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => "</li>\n",
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => "</h2>\n",
		) );
	}

	add_action( 'widgets_init', 'register_bc_widgets' );

endif; // bacardi_theme_widgets