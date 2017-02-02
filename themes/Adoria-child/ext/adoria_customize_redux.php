<?php 
/*

1. Front Page Options
2. Portfolio Options

*/

add_filter('bc_custom_fields', 'adoria_custom_fields');

function adoria_custom_fields($metaboxes){

/* 	Front Page Options 	*/  

    $front_page_options[] = array(
		'title' 		=> 'Slider',
		'icon_class'    => 'icon-large',
		'icon'          => 'el-icon-list-alt',
		'fields' 		=> array(
			array(
				'id' 	=> 'adoria_slider_shortcode',
				'type'	=> 'select',
				'data' 	=> 'posts',
				'args' 	=> array('post_type'=>'bc_slick_slider'),
				'title' => __('Slider')
			)
		),
	);

	$front_page_options[] = array(
		'title' 		=> 'Direction Icons',
		'icon_class'    => 'icon-large',
		'icon'          => 'el-icon-list-alt',
		'fields' 		=> array(
			array(
				'id'       		=> 'adoria_directions',
				'type'     		=> 'repeatable_list',
			    'accordion' 	=> true,
			    'title'    		=> __('Directions', THEME_OPT),				    
				'add_button' 	=> __( 'Add Direction'),
				'remove_button' => __( 'Delete Direction'),
				'fields' 		=> array(			
					array(
						'id'		=>'adoria_direction_title',
						'type'	 	=> 'text',
						'title'		=> __('Direction Title'),
						),
					array(
						'id'		=> 'adoria_direction_icon',
						'type'	 	=> 'icomoon_icons',
						'title' 	=> __('Direction  Icon')
					)
				)
			)
		),
	);

	$front_page_options[] = array(
		'title'			=> 'Information Section',
		'icon_class'    => 'icon-large',
		'icon'          => 'el-icon-list-alt',
		'fields' 		=> array(
			array(
				'id'       	=> 'adoria_info_title',
				'type'		=> 'text',
			    'title'    	=> __('Title', THEME_OPT),				    
			),
			array(
				'id'       	=> 'adoria_info_subtitle',
				'type'      => 'text',
			    'title'     => __('Subtitle', THEME_OPT),				    
			),
			array(
				'id'       	=> 'adoria_info_text',
				'type'     	=> 'editor',
			    'title'    	=> __('Text Information', THEME_OPT),	
			    'args'   	=> array(
					'teeny'            => 0,
					'textarea_rows'    => 10
				)
						    
			),
			array(
				'id'       	=> 'adoria_employees_phd',
				'type'     	=> 'number',
				'min'      	=> 0,
				'max'     	=> 100,
				'step'     	=> 1,
			    'title'    	=> __('Employees with PhD in Computer Science', THEME_OPT),				    
			),
			array(
				'id'       	=> 'adoria_employees_fluent_english',
				'type'     	=> 'number',
				'min'      	=> 0,
				'max'      	=> 100,
				'step'     	=> 1,
			    'title'    	=> __('Employees with Fluent English', THEME_OPT),				    
			),
			array(
				'id'       	=> 'adoria_clients_europe',
				'type'     	=> 'number',
				'min'      	=> 0,
				'max'      	=> 100,
				'step'     	=> 1,
			    'title'    	=> __('Clients Location Europe', THEME_OPT),				    
			),
			array(
				'id'       	=> 'adoria_clients_australia',
				'type'     	=> 'number',
				'min'      	=> 0,
				'max'      	=> 100,
				'step'     	=> 1,
			    'title'    	=> __('Clients Location Australia', THEME_OPT),				    
			),
			array(
				'id'       	=> 'adoria_clients_usa',
				'type'     	=> 'number',
				'min'      	=> 0,
				'max'      	=> 100,
				'step'     	=> 1,
			    'title'    	=> __('Clients Location USA', THEME_OPT),				    
			),
			array(
				'id'       	=> 'adoria_people_per_hour_link',
				'type'     	=> 'text',
			    'title'    	=> __('People per hour link', THEME_OPT),				    
			),
			array(
				'id'       	=> 'adoria_upwork_link',
				'type'     	=> 'text',
			    'title'    	=> __('Upwork link', THEME_OPT),				    
			),
			array(
				'id'       	=> 'adoria_learn_more_link',
				'type'     	=> 'text',
			    'title'    	=> __('Learn more link', THEME_OPT),				    
			),
		)
	);

	$front_page_options[] = array(
		'title'			=> 'Testimonials Section',
		'icon_class'    => 'icon-large',
		'icon'          => 'el-icon-list-alt',
		'fields' 		=> array(
			array(
				'id'       	=> 'adoria_project_count',
				'type'     	=> 'number',
				'min'	   	=> 0,
			    'title'    	=> __('Project Count', THEME_OPT),				    
			),
			array(
				'id'       		=> 'adoria_testimonials_left_list',
				'type'     		=> 'multi_text',
			    'title'    		=> __( 'Left Side Item List', THEME_OPT),				    	
			),
			array(
				'id'       	=> 'adoria_read_all_link',
				'type'     	=> 'text',
			    'title'    	=> __('Read all success stories page link', THEME_OPT),				    
			),
			array(
				'id'       		=> 'adoria_testimonials',
			    'accordion'		=> true,
				'type'     		=> 'repeatable_list',
			    'title'    		=> __('Testimonials', THEME_OPT),				    
				'add_button' 	=> __( 'Add Testimonial'),
				'remove_button' => __( 'Delete Testimonial'),
				'fields' 		=> array(			
					array(
						'id'		=>'adoria_testimonial_title',
						'type'	 	=> 'text',
						'title'		=> __('Testimonial Title'),
					),
					array(
						'id'		=> 'adoria_testimonial_icon',
						'type'	 	=> 'media',
						'title' 	=> __('Testimonial Icon')
					),
					array(
						'id'       => 'adoria_testimonial_text',
						'type'     => 'editor',
					    'title'    => __('Text Information', THEME_OPT),				    
						'args'   	=> array(
					        'teeny'            => 0,
					        'textarea_rows'    => 10
						)
					),
				)
			)
		)
	);

	$front_page_options[] = array(
		'title' 		=> 'Latest Works',
		'icon_class'    => 'icon-large',
		'icon'          => 'el-icon-list-alt',
		'fields' 		=> array(
			array(
				'id'		=> 'adoria_latest_works_title',
				'type'	 	=> 'text',
				'title'		=> __('Section Title'),
			),
			array(
				'id' 		=> 'adoria_latest_work',
				'type' 		=> 'select_ajax',
				'data' 		=> array('portfolio'),
				'title'		=> __('Latest Works'),
				'multi' 	=> true
			),
			array(
				'id'		=> 'adoria_latest_works_link',
				'type'	 	=> 'text',
				'title'		=> __('Success Stories Page Link'),
			),
		)
	);

	$metaboxes[] = array(
		'id'            => 'home_page_options',
		'title'         => __( 'Home Page Options', THEME_OPT ),
		'post_types'    => array( 'page' ),
		'page_template' => array('front-page.php'),
		'position'      => 'normal', 
		'priority'      => 'high',
		'sidebar'       => true,  
		'sections'      => $front_page_options,
	);


/*	Portfolio Options	*/
	
	$portfolio_page_options[] = array(
		'title' 		=> 'Project Main Image',
		'icon_class'    => 'icon-large',
		'icon'          => 'el-icon-list-alt',
		'fields' 		=> array(
			array(
				'id'       	=> 'adoria_portfolio_main_img',
				'type'     	=> 'media',
				'title'		=> __('Portfolio Main Image', THEME_OPT),
			),
		)
	);

	$portfolio_page_options[] = array(
		'title' 		=> 'Project Description',
		'icon_class'    => 'icon-large',
		'icon'          => 'el-icon-list-alt',
		'fields' 		=> array(
			array(
				'id'       	=> 'adoria_portfolio_description',
				'type'     	=> 'editor',
				'title'		=> __('Portfolio Description', THEME_OPT),
				'args'   	=> array(
			        'teeny'            => 0,
			        'textarea_rows'    => 10
				)
			),
		)
	);


	$portfolio_page_options[] = array(
		'title' 		=> 'Project Additional Description',
		'icon_class'    => 'icon-large',
		'icon'          => 'el-icon-list-alt',
		'fields' 		=> array(
			array(
				'id'       	=> 'adoria_additional_portfolio_description',
				'type'     	=> 'repeatable_list',
				'title'		=> __('Additional Portfolio Description', THEME_OPT),
				'accordion' 	=> true,
				'add_button' 	=> __( 'Add New Description', THEME_OPT),
				'remove_button' => __( 'Delete Description', THEME_OPT),
				'fields' 		=> array(
					array(
						'id'		=> 'adoria_additional_title',
						'type'	 	=> 'text',
						'title' 	=> __('Portfolio Title', THEME_OPT)
					),			
					array(
						'id'		=>'adoria_additional_description',
						'type'     	=> 'editor',
						'title'		=> __('Portfolio Description', THEME_OPT),
						'args'   	=> array(
					        'teeny'            => 0,
					        'textarea_rows'    => 10
						    )
						),
					array(
						'id'		=> 'adoria_screenshot',
						'type'	 	=> 'media',
						'title' 	=> __('Screenshot', THEME_OPT)
					)
				)
			),
		)
	);

	$portfolio_page_options[] = array(
		'title' 		=> 'Project Testimonials',
		'icon_class'    => 'icon-large',
		'icon'          => 'el-icon-list-alt',
		'fields' 		=> array(
			array(
				'id'       	=> 'adoria_project_testimonials',
				'type'     	=> 'repeatable_list',
				'accordion' 	=> true,
				'add_button' 	=> __( 'Add New Testimonial', THEME_OPT),
				'remove_button' => __( 'Delete Testimonial', THEME_OPT),
				'fields' 		=> array(			
					array(
						'id'		=>'adoria_project_testimonial',
						'type'     	=> 'editor',
						'title'		=> __('Testimonial text', THEME_OPT),
						'args'   	=> array(
					        'teeny'            => 0,
					        'textarea_rows'    => 10
						    )
						),
					array(
						'id'		=> 'adoria_project_testimonial_icon',
						'type'	 	=> 'media',
						'title' 	=> __('Testimonial Icon', THEME_OPT)
					),
					array(
						'id'		=> 'adoria_project_testimonial_author',
						'type'	 	=> 'text',
						'title' 	=> __('Testimonial Author', THEME_OPT)
					)
				)
			),
		)
	);

	$metaboxes[] = array(
		'id'            => 'portfolio_page_options',
		'title'         => __( 'Portfolio Options', THEME_OPT ),
		'post_types'    => array( 'portfolio' ),
		'page_template' => array('single-portfolio.php'),
		'position'      => 'normal', 
		'priority'      => 'high',
		'sidebar'       => true,  
		'sections'      => $portfolio_page_options,
	);

	$about_page_options[] = array(
		'title' 		=> 'Members Section',
		'icon_class'    => 'icon-large',
		'icon'          => 'el-icon-list-alt',
		'fields' 		=> array(
			array(
				'id'       	=> 'adoria_team_members_title',
				'type'		=> 'text',
				'title'		=> __('Members Section Title', THEME_OPT)
			),
			array(
				'id'       	=> 'adoria_team_members_description',
				'type'		=> 'editor',
				'title'		=> __('Members Section Description', THEME_OPT),
				'args'  	=> array(
						        'teeny'            => 0,
						        'textarea_rows'    => 10
								)	
			),
			array(
				'id'       	=> 'adoria_team_members_section',
				'type'     	=> 'select_ajax',
				'data' 		=> array('team_members'),
				'title'		=> __('Members'),
				'multi' 	=> true
			),
		)
	);

	$about_page_options[] = array(
		'title' 		=> 'Values Section',
		'icon_class'    => 'icon-large',
		'icon'          => 'el-icon-list-alt',
		'fields' 		=> array(
			array(
				'id'       	=> 'adoria_values_title',
				'type'		=> 'text',
				'title'		=> __('Values Section Title', THEME_OPT)
			),
			array(
				'id'       	=> 'adoria_values_description',
				'type'		=> 'editor',
				'title'		=> __('Values Section Description', THEME_OPT),
				'args'  	=> array(
						        'teeny'            => 0,
						        'textarea_rows'    => 10
								)	
			),
			array(
				'id'       	=> 'adoria_values_section',
				'type'     	=> 'repeatable_list',
				'accordion' 	=> true,
				'add_button' 	=> __( 'Add New Value', THEME_OPT),
				'remove_button' => __( 'Delete Value', THEME_OPT),
				'fields' 		=> array(			
					array(
						'id'		=>'adoria_value_text',
						'type'     	=> 'editor',
						'title'		=> __('Value text', THEME_OPT),
						'args'   	=> array(
					        'teeny'            => 0,
					        'textarea_rows'    => 10
						    )
						),
					array(
						'id'		=> 'adoria_value_icon',
						'type'	 	=> 'media',
						'title' 	=> __('Value Icon', THEME_OPT)
					),
					array(
						'id'		=> 'adoria_value_title',
						'type'	 	=> 'text',
						'title' 	=> __('Value title', THEME_OPT)
					)
				)
			)
		)
	);
	

	$about_page_options[] = array(
		'title' 		=> 'Key Benefits Section',
		'icon_class'    => 'icon-large',
		'icon'          => 'el-icon-list-alt',
		'fields' 		=> array(
			array(
				'id'		=> 'adoria_key_benefits_title',
				'type'	 	=> 'text',
				'title' 	=> __('Key Benefits title', THEME_OPT)
			),
			array(
				'id'       	=> 'adoria_key_benefits_description',
				'type'		=> 'editor',
				'title'		=> __('Key Benefits Section Description', THEME_OPT),
				'args'  	=> array(
						        'teeny'            => 0,
						        'textarea_rows'    => 10
								)	
			),
			array(
				'id'       	=> 'adoria_keys_benefits_section',
				'type'     	=> 'repeatable_list',
				'accordion' 	=> true,
				'add_button' 	=> __( 'Add', THEME_OPT),
				'remove_button' => __( 'Delete', THEME_OPT),
				'max'			=> 4,
				'fields' 		=> array(			
					array(
						'id'		=> 'adoria_key_benefits_count',
						'type'	 	=> 'text',
						'title' 	=> __('Count', THEME_OPT)
					),
					array(
						'id'		=> 'adoria_key_benefits_titles',
						'type'     	=> 'multi_text',
						'title' 	=> __('Titles', THEME_OPT)
					),
				)
			)	
		)
	);

	$about_page_options[] = array(
		'title' 		=> 'Timeline Section',
		'icon_class'    => 'icon-large',
		'icon'          => 'el-icon-list-alt',
		'fields' 		=> array(
			array(
				'id'		=> 'adoria_timeline_title',
				'type'	 	=> 'text',
				'title' 	=> __('Timeline title', THEME_OPT)
			),
			array(
				'id'       	=> 'adoria_timeline_description',
				'type'		=> 'editor',
				'title'		=> __('Timeline Section Description', THEME_OPT),
				'args'  	=> array(
						        'teeny'            => 0,
						        'textarea_rows'    => 10
								)	
			),
			array(
				'id'       	=> 'adoria_timeline_options',
				'type'     	=> 'repeatable_list',
				'accordion' 	=> true,
				'add_button' 	=> __( 'Add Date', THEME_OPT),
				'remove_button' => __( 'Delete Date', THEME_OPT),
				'fields' 		=> array(			
					array(
						'id'		=>'adoria_timeline_text',
						'type'     	=> 'editor',
						'title'		=> __('Date Description', THEME_OPT),
						'args'   	=> array(
					        'teeny'            => 0,
					        'textarea_rows'    => 10
						    )
					),
					array(
						'id'		=> 'adoria_timeline_title',
						'type'	 	=> 'text',
						'title' 	=> __('Date', THEME_OPT)
					)
				)
			)
		)
	);

	$about_page_options[] = array(
		'title' 		=> 'See Us at Work Section',
		'icon_class'    => 'icon-large',
		'icon'          => 'el-icon-list-alt',
		'fields' 		=> array(
			array(
				'id'		=> 'adoria_see_us_title',
				'type'	 	=> 'text',
				'default'	=> 'See Us at Work',
				'title' 	=> __('Section title', THEME_OPT)
			),
			array(
				'id'       	=> 'adoria_see_us_description',
				'type'		=> 'editor',
				'title'		=> __('Section Description', THEME_OPT),
				'args'  	=> array(
						        'teeny'            => 0,
						        'textarea_rows'    => 10
								)	
			),
			array(
				'id'		=> 'adoria_video_link_title',
				'type'	 	=> 'text',
				'title' 	=> __('Video Link', THEME_OPT)
			)
			
		)
	);

	$metaboxes[] = array(
		'id'            => 'about_page_options',
		'title'         => __( 'About Page Option', THEME_OPT ),
		'post_types'    => array( 'page' ),
		'page_template' => array('about.php'),
		'position'      => 'normal', 
		'priority'      => 'high',
		'sidebar'       => true,  
		'sections'      => $about_page_options,
	);

	$contact_page_options[] = array(
		'title' 		=> 'Contact Form ',
		'icon_class'    => 'icon-large',
		'icon'          => 'el-icon-list-alt',
		'fields' 		=> array(
			array(
				'id'		=> 'adoria_cf_title',
				'type'	 	=> 'text',
				'title' 	=> __('Contact Form title', THEME_OPT)
			),
			array(
				'id'		=> 'adoria_cf_shtcd',
				'type'	 	=> 'text',
				'title' 	=> __('CF7 Shortcode ', THEME_OPT)
			)
		)
	);

	$contact_page_options[] = array(
		'title' 		=> 'Contact Emails ',
		'icon_class'    => 'icon-large',
		'icon'          => 'el-icon-list-alt',
		'fields' 		=> array(
			array(
					'id'		=> 'adoria_contact_emails_section_title',
					'type'	 	=> 'text',
					'title' 	=> __('Section Title', THEME_OPT)
			),
			array(
				'id'       	=> 'adoria_contact_emails',
				'type'	   	=> 'repeatable_list',
				'accordion' => true,
				'max'		=> 3,
				'add_button' 	=> __( 'Add Contact block', THEME_OPT),
				'remove_button' => __( 'Delete Contact block', THEME_OPT),
				'fields' 		=> array(	
					array(
						'id'		=> 'adoria_contact_email_icon',
						'type'	 	=> 'media',
						'title' 	=> __('Box Icon', THEME_OPT)
					),		
					array(
						'id'		=> 'adoria_contact_email_title',
						'type'	 	=> 'text',
						'title' 	=> __('Title', THEME_OPT)
					),
					array(
						'id'		=> 'adoria_contact_email',
						'type'	 	=> 'text',
						'title' 	=> __('Contact Email', THEME_OPT)
					)
				)
			),
		)
	);

	$contact_page_options[] = array(
		'title' 		=> 'Contact Location ',
		'icon_class'    => 'icon-large',
		'icon'          => 'el-icon-list-alt',
		'fields' 		=> array(
			array(
				'id'		=> 'adoria_location_title',
				'type'	 	=> 'text',
				'title' 	=> __('Location title', THEME_OPT)
			),
			array(
				'id'		=> 'adoria_location_lat',
				'type'	 	=> 'text',
				'title' 	=> __('Lat', THEME_OPT)
			),
			array(
				'id'		=> 'adoria_location_leng',
				'type'	 	=> 'text',
				'title' 	=> __('Leng', THEME_OPT)
			),
			array(
				'id'		=> 'adoria_location_address',
				'type'	 	=> 'text',
				'title' 	=> __('Address', THEME_OPT)
			)
		)
	);


	$metaboxes[] = array(
		'id'            => 'contact_page_options',
		'title'         => __( 'Contact Page Option', THEME_OPT ),
		'post_types'    => array( 'page' ),
		'page_template' => array('contacts.php'),
		'position'      => 'normal', 
		'priority'      => 'high',
		'sidebar'       => true,  
		'sections'      => $contact_page_options,
	);

	
	unset($metaboxes[1], $metaboxes[3]);
	return $metaboxes;

}

add_filter('bc_theme_options_sections', 'adoria_theme_options_sections');

function adoria_theme_options_sections($sections){
	$sections = array();

	/* Set header fields */
	$header_fields = array(
		array(
			'id'    => 'header_logo',
            'type'  => 'media',
            'title' => 'Site Header Logo'
		),
		array(
			'id'    => 'header_additional_button_text',
            'type'  => 'text',
            'title' => 'Header Button text'
		),
		array(
			'id'    => 'header_additional_button_link',
            'type'  => 'text',
            'title' => 'Header Button Link'
		)
	);

	/* Set sections */
	$sections[] = array(
		'title'  => __( 'Header', THEME_OPT ),
		'icon'   => 'el-icon-cog',
		'fields' => $header_fields
	);

	/* Set fields */
	$footer_fields = array(
		array(
			'id'		=> 'adoria_contact_section_title',
			'type'	 	=> 'text',
			'title'		=> __('Contact Section Title'),
		),
		array(
			'id'		=> 'adoria_contact_section_subtitle',
			'type'	 	=> 'text',
			'title'		=> __('Contact Section Subtitle'),
		),
		array(
			'id'		=> 'adoria_contact_section_link',
			'type'	 	=> 'text',
			'title'		=> __('Contact Section Link'),
		),
		array(
			'id'       	=> 'copyright_footer',
		    'type'     	=> 'editor', 
		    'title'    	=> __('©Copyright', THEME_OPT),
		    'rows'	   	=> 6,
		    'args'  	=> array(
				        'teeny'            => 0,
				        'textarea_rows'    => 10
						)			
		),
		array(
			'id'       	=> 'skype_contact_footer',
			'type'	   	=> 'repeatable_list',
			'accordion' 	=> true,
			'add_button' 	=> __( 'Add New Skype Contact', THEME_OPT),
			'remove_button' => __( 'Delete Skype Contact', THEME_OPT),
			'fields' 		=> array(			
				array(
					'id'		=> 'skype_contact_footer_link',
					'type'	 	=> 'text',
					'title' 	=> __('Skype Contact link', THEME_OPT)
				),
				array(
					'id'		=> 'skype_contact_footer_name',
					'type'	 	=> 'text',
					'title' 	=> __('Skype Contact name', THEME_OPT)
				)
			)
		),
		array(
			'id'       	=> 'email_contact_footer',
			'type'	   	=> 'repeatable_list',
			'accordion' 	=> true,
			'add_button' 	=> __( 'Add New Email Contact', THEME_OPT),
			'remove_button' => __( 'Delete Email Contact', THEME_OPT),
			'fields' 		=> array(			
				array(
					'id'		=> 'email_contact_footer_link',
					'type'	 	=> 'text',
					'title' 	=> __('Contact Email', THEME_OPT)
				),
			)
		),
		array(
			'id'       	=> 'phone_contact_footer',
			'type'	   	=> 'repeatable_list',
			'accordion' 	=> true,
			'add_button' 	=> __( 'Add New Phone Contact', THEME_OPT),
			'remove_button' => __( 'Delete Phone Contact', THEME_OPT),
			'fields' 		=> array(			
				array(
					'id'		=> 'phone_contact_footer_link',
					'type'	 	=> 'text',
					'title' 	=> __('Contact Phone', THEME_OPT)
				),
			)
		),
	);

	/* Set sections */
	$sections[] = array(
		'title'  => __( 'Footer', THEME_OPT ),
		'icon'   => 'el-icon-cog',
		'fields' => $footer_fields
	);


	/* Set fields */
	$social_fields = array(
		array(
			'id'    => 'link_to_facebook',
            'type'  => 'text',
            'title' => 'Facebook Social Account'
		),
		array(
			'id'    => 'link_to_twitter',
            'type'  => 'text',
            'title' => 'Twitter Social Account'
		),
		array(
			'id'    => 'link_to_rss',
            'type'  => 'text',
            'title' => 'RSS Social Account'
		),
		array(
			'id'    => 'link_to_gplus',
            'type'  => 'text',
            'title' => 'Google + Social Account'
		),
		array(
			'id'    => 'link_to_linkedin',
            'type'  => 'text',
            'title' => 'Linked In Social Account'
		),
	);

	/* Set sections */
	$sections[] = array(
		'title'  => __( 'Social Media', THEME_OPT ),
		'icon'   => 'el-icon-cog',
		'fields' => $social_fields
	);

	$blog_page_options = array(
		array(
			'id'		=> 'adoria_blog_title',
			'type'	 	=> 'text',
			'title' 	=> __('Section title', THEME_OPT)
		),
		array(
			'id'       	=> 'adoria_blog_description',
			'type'		=> 'text',
			'title'		=> __('Section Subtitle', THEME_OPT),
			
		)
	);

	
	/* Set sections */
	$sections[] = array(
		'title'  => __( 'Blog', THEME_OPT ),
		'icon'   => 'el-icon-cog',
		'fields' => $blog_page_options
	);

	$success_stories = array(
		array(
			'id'       	=> 'success_stories_description',
		    'type'     	=> 'editor', 
		    'title'    	=> __('Success Stories Description', THEME_OPT),
		    'rows'	   	=> 6,
		    'args'  	=> array(
				        'teeny'            => 0,
				        'textarea_rows'    => 10
						)			
		),
		array(
			'id'       	=> 'success_stories_technology_filter',
		    'type'     	=> 'select', 
		    'multi'		=> 1,
		    'data'		=> 'terms',
		    'args'		=> array( 'taxonomies'=>'portfolio_technology' ),
		    'title'    	=> __('Technology Filter', THEME_OPT),
		),
		array(
			'id'       	=> 'success_stories_industry_filter',
		    'type'     	=> 'select',
		    'data'		=> 'terms',
		    'args'		=> array( 'taxonomies'=>'portfolio_industries' ), 
		    'multi'		=> 1,
		    'title'    	=> __('Industry Filter', THEME_OPT),
		),
		array(
			'id'       	=> 'success_stories_testimonial_title',
		    'type'     	=> 'text', 
		    'title'    	=> __('Testimonial Section Title', THEME_OPT),
		),
		array(
			'id'       	=> 'success_stories_testimonial_subtitle',
		    'type'     	=> 'text', 
		    'title'    	=> __('Testimonial Section SubTitle', THEME_OPT),
		),
		array(
			'id'       	=> 'success_stories_testimonials_list',
		    'type'     	=> 'repeatable_list', 
		    'title'    	=> __('Testimonials List', THEME_OPT),
		    'accordion' 	=> true,
			'add_button' 	=> __( 'Add New Testimonial', THEME_OPT),
			'remove_button' => __( 'Delete Testimonial', THEME_OPT),
			'fields' 		=> array(			
				array(
					'id'		=> 'success_stories_testimonial_author',
					'type'	 	=> 'text',
					'title' 	=> __('Testimonial Author', THEME_OPT)
				),
				array(
					'id'		=> 'success_stories_testimonial_author_logo',
					'type'	 	=> 'media',
					'title' 	=> __('Testimonial Author Logo', THEME_OPT)
				),
				array(
					'id'		=> 'success_stories_testimonial_description',
					'type'     	=> 'editor', 
				    'title'    	=> __('Success Stories Testimonial Text', THEME_OPT),
				    'rows'	   	=> 6,
				    'args'  	=> array(
						        'teeny'            => 0,
						        'textarea_rows'    => 10
								)			
				)
			)
		),
		
	);

	/* Set sections */
	$sections[] = array(
		'title'  => __( 'Success Stories', THEME_OPT ),
		'icon'   => 'el-icon-cog',
		'fields' => $success_stories
	);

	return $sections;


}





















