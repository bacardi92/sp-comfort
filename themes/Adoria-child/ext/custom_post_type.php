<?php 


if( !class_exists( 'CustomPostTypes' ) ) 
{ 

	class CustomPostTypes 
	{

		private $post_types;

		public function __construct( $post_types = array() )
		{

			$this->post_types = $post_types;

			add_action( 'init', array( $this, 'adoriaRegisterPostTypes' ) );

		}

		public function adoriaRegisterPostTypes()
		{
			if ( is_array( $this->post_types ) && count( $this->post_types ) ) {

				foreach ( $this->post_types as $post_type ) {

					if ( isset( $post_type['singular_name'] ) && isset( $post_type['name'] ) && isset( $post_type['type'] ) ) {

						if ( isset( $post_type['taxonomies'] ) ) {

							if( is_array( $post_type['taxonomies'] ) && count( $post_type['taxonomies'] ) ) {

								$taxonomies = array();

								foreach ($post_type['taxonomies'] as $taxonomy) {

									$taxonomies[] = $taxonomy['slug'];
									$this->adoriaRegisterCustomTaxonomies($taxonomy, $post_type['type']);

								}
							}

						}

						register_post_type(	
							$post_type['type'],
							array(
								'label'  => $post_type['name'],
								'labels' => array(
									'name'               => $post_type['name'],  
									'singular_name'      => $post_type['singular_name'],  
									'add_new'            => 'Add '.$post_type['singular_name'],  
									'add_new_item'       => 'Add '.$post_type['singular_name'], 
									'edit_item'          => 'Edit '.$post_type['singular_name'],  
									'new_item'           => 'New '.$post_type['singular_name'],  
									'view_item'          => 'View '.$post_type['singular_name'],  
									'search_items'       => 'Search '.$post_type['singular_name'],  
									'not_found'          => $post_type['singular_name'].' not found',  
									'not_found_in_trash' => $post_type['singular_name'].' not found in trash',  
									'menu_name'          => $post_type['singular_name'], 
								),
								'public'              => ( ( isset( $post_type['public'] ) )? $post_type['public'] : true ),
								'publicly_queryable'  => ( ( isset( $post_type['public'] ) )? $post_type['public'] : true ),
								'exclude_from_search' => ( ( isset( $post_type['exclude'] ) )? $post_type['exclude'] : false ),
								'show_ui'             => ( ( isset( $post_type['public'] ) )? $post_type['public'] : true ),
								'show_in_menu'        => ( ( isset( $post_type['public'] ) )? $post_type['public'] : true ), 
								'menu_position'       => ( ( isset( $post_type['menu_position'] ) )? $post_type['menu_position'] : null ),
								'menu_icon'           => ( ( isset( $post_type['menu_icon'] ) )? $post_type['menu_icon'] : null ), 
								'supports'            => ( ( isset( $post_type['supports'] ) )? $post_type['supports'] : array( 'title', 'editor', 'thumbnail') ),
								'taxonomies'          => ( ( isset( $taxonomies ) )? $taxonomies : null ),
								'has_archive'         => true,
								'rewrite'             => ( ( isset($post_type['rewrite'] ) )? $post_type['rewrite'] : true ),
								'query_var'           => true,

							)
						);

					}

				}
			
			}

		}


		private function adoriaRegisterCustomTaxonomies($taxonomy, $post_type)
		{

			extract($taxonomy);
			$labels = array(
				'name' => _x( $name, 'taxonomy general name' ),
				'singular_name' => _x( $singular_name, 'taxonomy singular name' ),
				'search_items' =>  __( 'Search '.$name ),
				'all_items' => __( 'All '.$name ),
				'parent_item' => __( 'Parent '.$singular_name ),
				'parent_item_colon' => __( 'Parent '.$singular_name ),
				'edit_item' => __( 'Edit '.$singular_name ),
				'update_item' => __( 'Update '.$singular_name ),
				'add_new_item' => __( 'Add New '.$singular_name ),
				'new_item_name' => __( 'New '.$singular_name.' Name' ),
				'menu_name' => __( $name ),
			);

			 
			register_taxonomy( $slug, array($post_type), array(
				'hierarchical' => true,
				'labels' => $labels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => $slug ),
			));


		}

	}

}