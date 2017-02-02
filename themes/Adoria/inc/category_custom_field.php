<?php
/**
 *
 *
 *
 * @package WordPress
 * @subpackage Bacardi theme
 * @since Bacardi theme 1.0
 */

/*Category Thumbs*/

if(!function_exists('add_color_picker_script')){

	function add_color_picker_script($hook) {		 
	    if ( 'edit-tags.php' == $hook || 'term.php' == $hook) { //set your plugin page
	    	wp_enqueue_script( 'wp-color-picker-alpha', get_template_directory_uri().'/js/lib/alpha-color-picker.js' , array( 'jquery', 'wp-color-picker' ), '1.0.0' );
	        wp_enqueue_style( 'wp-color-picker-alpha', get_template_directory_uri().'/css/lib/alpha-color-picker.css', array('wp-color-picker') );
	    }   
	    
	}
	add_action( 'admin_enqueue_scripts',  'add_color_picker_script' );

}


if(!function_exists('category_add_form_fields')){

	function category_add_form_fields(){

		wp_enqueue_media();
		?>
		<div class="form-field">
           
            <label for="catpic"><?php _e('Picture of the category', ''); ?></label>
        	
           	<div>
                <img src='' id="cat_img_prev" width='200' style="display:none; margin: 10px 0;"> 
			    <input type="hidden" name="category_image_url" id="image_url" class="regular-text">
			</div>
			<div>
			    <input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Upload Image">
			</div>
			<div style="display:block; margin: 10px 0;"">
				<label for="taxonomy_overlay">Taxonomy Page Title Overlay</label> 
				<input type="text" class="alpha-color-picker" value="rgba(0,0,0,0.5)" name="taxonomy_overlay" id="taxonomy_overlay">
			</div>
            
        </div>
        <script type="text/javascript">
			jQuery(document).ready(function($){
				$( 'input.alpha-color-picker' ).alphaColorPicker();
				$('#cat_img_prev').attr('src', $('#image_url').val());
			    $('#upload-btn').click(function(e) {
			        e.preventDefault();
			        var image = wp.media({ 
			            title: 'Upload Image',			           
			            multiple: false
			        }).open()
			        .on('select', function(e){			          
			            var uploaded_image = image.state().get('selection').first();			           
			            var image_url = uploaded_image.toJSON().url;			          
			            $('#image_url').val(image_url);
			            $('#cat_img_prev').attr('src', $('#image_url').val());
			            $('#cat_img_prev').show();
			        });
			    });
			    $("#addtag").on('submit', function(){
			    	$('#image_url').val('');
			    	$('#cat_img_prev').attr('src', '');
			    	$('#cat_img_prev').hide();
			    })
			});
		</script>
		<?php 
	}

	add_action('category_add_form_fields','category_add_form_fields');
}

if(!function_exists('category_edit_form_fields')){


	function category_edit_form_fields(){

		wp_enqueue_media();
		$tag_id = (isset($_GET['tag_ID'])? $_GET['tag_ID']: '');
		$thumb = get_term_meta($tag_id, 'taxonomy_thumb', 1);
		$overlay = get_term_meta($tag_id, 'taxonomy_overlay', 1);
		?>

		<tr class="form-field">
            <th valign="top" scope="row">
                <label for="catpic"><?php _e('Picture of the category', ''); ?></label>
            </th>
            <td>
                <div>	
                	<?php
                	if($thumb): 
                		$style = 'style="display:block; margin: 10px 0;"';
                	else:
                		$style = 'style="display:none; margin: 10px 0;"';
                	endif; ?>
                	<img src='<?=$thumb?>' <?=$style?>id="cat_img_prev" width='200'> 
                </div>
                <div style="display:block; margin: 10px 0;"">				    
				    <input type="hidden" name="category_image_url"  value='<?=$thumb?>' id="image_url" class="regular-text">
				    <input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Upload Image">
				    <input type="button" name="upload-btn" id="remove-btn" class="button-secondary" style="color:#f00;" value="Remove Image">
				</div>
				<div style="display:block; margin: 10px 0;"">
					<label for="taxonomy_overlay">Taxonomy Page Title Overlay</label> 
					<input type="text" class="alpha-color-picker" value="<?=$overlay?>" name="taxonomy_overlay" id="taxonomy_overlay">
				</div>

            </td>
        </tr>
         <script type="text/javascript">
			jQuery(document).ready(function($){
				$( 'input.alpha-color-picker' ).alphaColorPicker();
				$('#cat_img_prev').attr('src', $('#image_url').val());
			    $('#upload-btn').click(function(e) {
			        e.preventDefault();
			        var image = wp.media({ 
			            title: 'Upload Image',			          
			            multiple: false
			        }).open()
			        .on('select', function(e){			          
			            var uploaded_image = image.state().get('selection').first();			           
			            var image_url = uploaded_image.toJSON().url;			           
			            $('#image_url').val(image_url);
			            $('#cat_img_prev').attr('src', $('#image_url').val());
			            $('#cat_img_prev').show();
			        });
			    });
			    $("#remove-btn").click(function(){
			    	$('#image_url').val('');
			    	$('#cat_img_prev').attr('src', '');
			    	$('#cat_img_prev').hide();	
			    })
			});
		</script>
		<?php
	}

	add_action('category_edit_form_fields','category_edit_form_fields');
}



if(!function_exists('create_term_thumbnail')){

	function create_term_thumbnail($term_id, $tt_id, $taxonomy){

		if(isset($_POST['category_image_url'])){
			update_term_meta($term_id, 'taxonomy_thumb', $_POST['category_image_url']);
		}else{
			delete_term_meta($term_id, 'taxonomy_thumb');
		}

		if(isset($_POST['taxonomy_overlay'])){
			update_term_meta($term_id, 'taxonomy_overlay', $_POST['taxonomy_overlay']);
		}else{
			delete_term_meta($term_id, 'taxonomy_overlay');
		}

	}

	add_action( 'create_term', 'create_term_thumbnail', 10, 3 );
	add_action( 'edit_term', 'create_term_thumbnail', 10, 3 );

}

if(!function_exists('cat_description')){

	remove_filter( 'pre_term_description', 'wp_filter_kses' );
	remove_filter( 'term_description', 'wp_kses_data' );
	add_filter('edit_category_form_fields', 'cat_description');
	function cat_description($tag)
	{
	    ?>
	        <table class="form-table">
	            <tr class="form-field">
	                <th scope="row" valign="top"><label for="description"><?php _ex('Description', 'Taxonomy Description'); ?></label></th>
	                <td>
	                <?php
	                    $settings = array('wpautop' => true, 'media_buttons' => true, 'quicktags' => true, 'textarea_rows' => '15', 'textarea_name' => 'description' );
	                    wp_editor(wp_kses_post($tag->description , ENT_QUOTES, 'UTF-8'), 'cat_description', $settings);
	                ?>
	                <br />
	                <span class="description"><?php _e('The description is not prominent by default; however, some themes may show it.'); ?></span>
	                </td>
	            </tr>
	        </table>
	    <?php
	}
}

if(!function_exists('remove_default_category_description')){
	add_action('admin_head', 'remove_default_category_description');
	function remove_default_category_description()
	{
	    global $current_screen;
	    if ( $current_screen->id == 'edit-category' )
	    {
	    ?>
	        <script type="text/javascript">
	        jQuery(function($) {
	            $('textarea#description').closest('tr.form-field').remove();
	        });
	        </script>
	    <?php
	    }
	}
}