<?php 
/**
 *
 *
 *
 * @package WordPress
 * @subpackage Bacardi theme
 * @since Bacardi theme 1.0
 */

/*Slider*/

class BC_Slider{
	
	private $theme_opt;


	public function __construct($redux_opt_name){		

		$this->theme_opt = $redux_opt_name;
		add_action( 'init', 										array( $this, 'bc_register_slider_post_type' ) );
		add_action( 'add_meta_boxes', 								array( $this, 'bc_add_slider_meta_box' ) );
		add_action( 'save_post', 									array( $this, 'bc_save_slider' ) );

		add_action( 'redux/metaboxes/'.$redux_opt_name.'/boxes', 	array( $this, 'redux_add_metaboxes' ) );

		add_filter( 'manage_edit-bc_slick_slider_columns', 			array( $this, 'bc_event_table_head') );
		add_filter( 'manage_bc_slick_slider_posts_custom_column', 	array( $this, 'fill_views_column' ), 5, 2); 
		
		add_shortcode( 'bc_slick_slider', 							array( $this, 'bc_slick_slider_shortcode' ) );


	}


	public function bc_register_slider_post_type(){
		
		register_post_type('bc_slick_slider',
			array(
				'label'  => 'BC Slick Slider',
				'labels' => array(
					'name'               => 'BC Slick Slider',
					'singular_name'      => 'Slider',
					'add_new'            => 'Add New Slider',
					'add_new_item'       => 'Add New',
					'edit_item'          => 'Edit Slider',
					'new_item'           => 'New Slider',  
					'view_item'          => 'View',
					'search_items'       => 'Search Sliders', 
					'not_found'          => 'Sliders Not Found', 
					'not_found_in_trash' => 'Sliders Not Found In Trash',
					'menu_name'          => 'BC Slick Slider', 
				),
				'public'              => 0,
				'publicly_queryable'  => 0,
				'exclude_from_search' => true,
				'show_ui'             => true,
				'show_in_menu'        => true, 
				'menu_position'       => 71,
				'menu_icon'           => get_template_directory_uri().'/slides-icon.png', 
				'hierarchical'        => false,
				'supports'            => array('title'), 
				'taxonomies'          => array(),
				'has_archive'         => false,
				'rewrite'             => true,
				'query_var'           => true,
			) 
		);

	}	


	public function bc_add_slider_meta_box(){

	
		add_meta_box(
			'bc_slider_shortcode'
			,__( 'Slider Shortcode', 'bacardi' )
			,array( $this, 'render_meta_box_content' )
			,'bc_slick_slider'
			,'advanced'
			,'low'
		);

	}


	public function render_meta_box_content($post){

		wp_nonce_field( 'bc_slider_shortcode', 'bc_slider_shortcode_nonce' );

		$value = get_post_meta( $post->ID, 'bc_slider_shortcode', true );

		echo '<label for="bc_slider_shortcode" style="font-size: 18px; line-height: 2em; margin-right:15px;">';
		_e( 'Use this shortcode for display slider', 'bacardi' );
		echo '</label> ';
		echo '<input type="text" id="bc_slider_shortcode" name="bc_slider_shortcode" value="[bc_slick_slider id='.$post->ID.']" style="padding: 5px 10px;min-width: 300px;font-size: 18px;display: inline-block;vertical-align: middle;"  readonly/>';

	}


	public function bc_save_slider($post_id){

		if ( ! isset( $_POST['bc_slider_shortcode_nonce'] ) )
			return $post_id;

		$nonce = $_POST['bc_slider_shortcode_nonce'];

		if ( ! wp_verify_nonce( $nonce, 'bc_slider_shortcode' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $post_id;

		if ( 'bc_slick_slider' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;

		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

		$mydata = sanitize_text_field( $_POST['bc_slider_shortcode'] );

		update_post_meta( $post_id, 'bc_slider_shortcode', $mydata );

	}


	public function bc_event_table_head( $columns ) {
	    $num = 2;
	    
	    $new_columns = array(
			'shortcode' => 'Shortcode',
		);

		return array_slice( $columns, 0, $num ) + $new_columns + array_slice( $columns, $num );
	 
	}


	public function fill_views_column( $colname, $post_id ){
		if( $colname === 'shortcode' ){
			echo "<span style='display: flex; height:100%; align-items:center;'>".get_post_meta($post_id, 'bc_slider_shortcode', 1)."</span>";   
		}
	}


	public function bc_slick_slider_shortcode( $atts ){

		extract($atts);
		if(!isset($id))	
			return false;
		if(get_post_type($id) != 'bc_slick_slider')
			return false;
		if( apply_filters('bc_customize_slider', $id) );
			return; 
		$slides = get_post_meta($id, 'opt-slides', 1);

		if(count($slides)>0): 
			
			$html = '<div class="slick">';
			foreach ($slides as $slide): 
			$html .= '<div class="slider_item_home" style="max-height:700px; min-height:600px; width:100%; background-image:url('.$slide['image'].');""></div>';
			endforeach; 
			$html .= '</div>';
			$html = apply_filters('bc_slider_content', $html);
			echo $html;
		endif; 

	}

	public function redux_add_metaboxes($metaboxes){


		$slider_options = array();

		$slider_options[] =array(
			'title' => 'Slides',
			'icon_class'    => 'icon-large',
			'icon'          => 'el-icon-list-alt',
			'fields' => array(
				array(
				    'id'        => 'opt-slides',
				    'type'      => 'slides',
				    'title'     => __('Slides Image', $this->theme_opt),
				    'subtitle'  => __('Unlimited slides with drag and drop sortings.',  $this->theme_opt),
				    'desc'      => __('This field will store all slides values into a multidimensional array to use into a foreach loop.',  $this->theme_opt)			    
				),
				array(
					'id'		=> 'opt-dots',
					'type'		=> 'switch',
					'title'    	=> __('Slider Nav Dots', $this->theme_opt),				    
					'default'  	=> true
				),
				array(
					'id'		=> 'opt-pause_on_hover',
					'type'		=> 'switch',
					'title'    	=> __('Pause On Hover', $this->theme_opt),				    
					'default'  	=> true
				),
				array(
					'id'		=> 'opt-autoplay',
					'type'		=> 'switch',
					'title'    	=> __('Slider Autoplay', $this->theme_opt),				    
					'default'  	=> true
				),
				array(
					'id'		=> 'opt-autoplay-time',
					'type'		=> 'number',
					'title'    	=> __('Slider Autoplay Delay', $this->theme_opt),				    
					'default'  	=> 3000,
					'min'		=> 1000,
					'step'		=> 500,
					'max'		=> 10000
				),
				array(
					'id'		=> 'opt-slider-height',
					'type'		=> 'number',
					'title'    	=> __('Slider Height', $this->theme_opt),				    
					'default'  	=> 500,
					'min'		=> 100,
					'step'		=> 1,					
				),
			)
		);

		$slider_options = apply_filters('bc_slider_setting_fields', $slider_options);

		$metaboxes[] = array(
			'id'			=> 'slider_options',
			'title'         => __( 'Slider Options', $this->theme_opt ),
			'post_types'    => array( 'bc_slick_slider' ),
			'position'      => 'normal', 
			'priority'      => 'high', 
			'sidebar'       => 1,  
			'sections'      => $slider_options,
		);

		return $metaboxes;
	}



}

new BC_Slider(THEME_OPT);
