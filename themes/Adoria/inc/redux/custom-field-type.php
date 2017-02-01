<?php 
/**
 *  
 *
 *  Add custom field types in redux
 *
 * @package Bacardi theme 
 */


if(!function_exists('bc_add_custom_redux_field')){

	function bc_add_custom_redux_field_number(){
		return __DIR__.'inc/redux/ReduxFramework/ReduxCore/inc/fields/number';
	}

	apply_filters('redux/'.THEME_OPT.'/field/class/number', 'bc_add_custom_redux_field_number', 'number');

}


if(!function_exists('bc_add_custom_redux_field')){

	function bc_add_custom_redux_field(){
		return __DIR__.'inc/redux/ReduxFramework/ReduxCore/inc/fields/select_ajax';
	}

	apply_filters('redux/'.THEME_OPT.'/field/class/select_ajax', 'bc_add_custom_redux_field', 'select_ajax');

}

if(!function_exists('adoria_icomoon_package_init')){
	
	function adoria_icomoon_package_init(){
		return __DIR__.'inc/redux/ReduxFramework/ReduxCore/inc/fields/icomoon_icons';
	}
	
	apply_filters('redux/'.THEME_OPT.'/field/class/icomoon_icons', 'adoria_icomoon_package_init', 'icomoon_icons');
}

/* AJAX callback for custom redux field */
if(!function_exists('_bc_redux_load_data')){

	add_action("wp_ajax__bc_redux_load_data", '_bc_redux_load_data');
	add_action("wp_ajax_nopriv_bc_redux_load_data", '_bc_redux_load_data'); 

	function _bc_redux_load_data(){

		global $wpdb;

		$post_type = $_GET['type'];	
		if(strpos($post_type, "|"))
			$post_type = explode('|', $post_type);


		if(is_array($post_type)){
			$query_str = '';
			foreach ($post_type as $k => $type) {
				if(count($post_type)-1 ==$k)
					$query_str .= "`post_type`='".$type."'";
				else
					$query_str .= "`post_type`='".$type."' OR "; 
			}
		}else{
			$query_str = "`post_type`='".$post_type."'";
		}
		$query = $wpdb->get_results("SELECT `ID`, `post_title` FROM ".$wpdb->posts." WHERE `post_status`='publish' AND (".$query_str.") AND  `post_title` LIKE '".$_GET['q']."%'  LIMIT 0, 20");
		$data = array();
		if(is_array($query)){
			foreach ($query as $key => $value) {
				$data[$key]['id']=$value->ID;
				$data[$key]['text']=$value->post_title;

			}
		}
		echo json_encode($data);
		die;
	}

}

if(!function_exists('_bc_redux_save_meta')){

	function _bc_redux_save_meta($post_id){

		if(isset($_POST[THEME_OPT."_clear"])){
		 	foreach ($_POST[THEME_OPT."_clear"] as $key => $value) {
		 		if(!isset($_POST[THEME_OPT][$value]))
		 		 	delete_post_meta($post_id, $value);
		 	}
		}

	}

	add_action('save_post', '_bc_redux_save_meta');

}