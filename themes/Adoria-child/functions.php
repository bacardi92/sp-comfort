<?php 

if(file_exists(__DIR__.'/ext/Walker_Extend_Menu.php')){
	include_once __DIR__.'/ext/Walker_Extend_Menu.php';	
}
if(!function_exists('sp_load_scripts')){
    
    function sp_load_scripts(){
        wp_deregister_style( 'style' );
        wp_dequeue_style( 'style' );
        wp_register_style('style', get_stylesheet_directory_uri().'/css/style.min.css', array(), time(), false);

        wp_enqueue_style('style');
    }
    add_action('wp_enqueue_scripts', 'sp_load_scripts', 1);

}

if (!function_exists('add_redux_custom_fields')) {
	function add_redux_custom_fields($metaboxes){
		// $metaboxes = array();
		// echo "<pre>";
		// var_dump($metaboxes);
		// echo "</pre>";
		unset($metaboxes[3]);

		$front_page_options[] = array(
			'title' 		=> 'Slider',
			'icon_class'    => 'icon-large',
			'icon'          => 'el-icon-list-alt',
			'fields' 		=> array(
				array(
					'id' 	=> 'home_slider_shortcode',
					'type'	=> 'select',
					'data' 	=> 'posts',
					'args' 	=> array('post_type'=>'bc_slick_slider'),
					'title' => __('Slider')
				)
			),
		);
		$front_page_options[] = array(
			'title'			=> 'Основной Контент',
			'icon_class'    => 'icon-large',
			'icon'          => 'el-icon-list-alt',
			'fields' 		=> array(
				array(
					'id'       		=> 'home_categories_list',
				    'accordion'		=> true,
					'type'     		=> 'repeatable_list',
				    'title'    		=> __('Категории', THEME_OPT),				    
					'add_button' 	=> __( 'Добавить Категорию'),
					'remove_button' => __( 'Удалить Категорию'),
					'max'			=> 4,
					'fields' 		=> array(			
						array(
							'id'       => 'home_categories_price',
							'type'     => 'text',
						    'title'    => __('Цена', THEME_OPT)	
						),
						array(
							'id'		=>'home_categories_title',
							'type'     	=> 'select',
			    			'data'		=> 'terms',
			    			'args'		=> array( 'taxonomies'=>'category' ),
							'title'		=> __('Выбор Категории'),
							'subtitle'	=> __('Категория будет отображена, если в ней есть по крайней мере хотябы одна статья!'),
						),
						array(
							'id'		=> 'home_categories_img',
							'type'	 	=> 'media',
							'title' 	=> __('Картинка')
						)
					)
				),
				array(
					'id'       => 'home_excerpt_title',
					'type'     => 'text',
				    'title'    => __('Заглавие', THEME_OPT)	
				),
				array(
					'id'       => 'home_excerpt',
					'type'     => 'editor',
				    'title'    => __('Короткое описание', THEME_OPT)	
				)
			)
		);
		$front_page_options[] = array(
			'title'			=> 'Форма контактов',
			'icon_class'    => 'icon-large',
			'icon'          => 'el-icon-list-alt',
			'fields' 		=> array(
				array(
					'id'       => 'home_contact_form',
					'type'     => 'text',
				    'title'    => __('Шорткод Контактной формы', THEME_OPT)	
				),
				array(
					'id'       => 'home_contact_img',
					'type'     => 'media',
				    'title'    => __('Картинка', THEME_OPT)	
				),
				array(
					'id'	   => 'home_contact_img_secondary',
					'type'     => 'media',
				    'title'    => __('Вторичная Картинка', THEME_OPT)	
				),
				array(
					'id'       => 'home_contact_color',
					'type'     => 'color_rgba',
				    'title'    => __('Фоновый цвет', THEME_OPT)	
				),
			)
		);
		$front_page_options[] = array(
			'title'			=> 'Преимущества',
			'icon_class'    => 'icon-large',
			'icon'          => 'el-icon-list-alt',
			'fields' 		=> array(
				array(
					'id'       => 'home_previliges_section_title',
					'type'     => 'text',
				    'title'    => __('Заглавие Секции', THEME_OPT)	
				),
				array(
					'id'       => 'home_previliges',
					'accordion'		=> true,
					'type'     		=> 'repeatable_list',
				    'title'    		=> __('Преимущества', THEME_OPT),				    
					'add_button' 	=> __( 'Добавить Элемент'),
					'remove_button' => __( 'Удалить Элемент'),
					'max'			=> 4,
					'fields' 		=> array(			
						array(
							'id'       => 'home_previliges_title',
							'type'     => 'text',
						    'title'    => __('Заглавие', THEME_OPT)	
						),
						array(
							'id'       => 'home_previliges_excerpt',
							'type'     => 'textarea',
						    'title'    => __('Цитата', THEME_OPT)	
						),
						array(
							'id'		=> 'home_previliges_img',
							'type'	 	=> 'media',
							'title' 	=> __('Картинка')
						)
					)
				)
			)
		);
		$metaboxes[] = array(
			'id'            => 'front_page_options',
			'title'         => __( 'Front Page options', THEME_OPT ),
			'post_types'    => array( 'page' ),
			'position'      => 'normal', 
			'priority'      => 'high', 
			'sidebar'       => 1,  
			'sections'      => $front_page_options,
		);
		return $metaboxes;
	}
	add_filter('bc_custom_fields', 'add_redux_custom_fields');
}