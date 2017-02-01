<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
} 

if ( ! class_exists( 'ReduxFramework_select_ajax' ) ) {
    class ReduxFramework_select_ajax {

        /**
         * Field Constructor.
         * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
         *
         * @since ReduxFramework 1.0.0
         */
        public function __construct( $field = array(), $value = '', $parent ) {
            $this->parent = $parent;
            $this->field  = $field;
            $this->value  = $value;          
        }

        /**
         * Field Render Function.
         * Takes the vars and outputs the HTML for the field in the settings
         *
         * @since ReduxFramework 1.0.0
         */
        public function render() {
            if ( isset( $this->field['multi'] ) &&  $this->field['multi']) { // Dummy proofing  :P
                $multi = 'multiple';
                $name = "name='".$this->field["name"]."[]'";
            }else{
                $multi = '';
                $name = "name='".$this->field["name"]."'";
            }
            if ( isset( $this->field['class'] ) &&  $this->field['class']) { // Dummy proofing  :P
                if($multi)
                    $class = "class='".$this->field['class']." select_ajax multiple'";
                else
                    $class = "class='".$this->field['class']." select_ajax'";
            }else{
                if($multi)
                    $class = "class='select_ajax multiple'"; 
                else
                    $class = "class='select_ajax'";
            }
            if ( isset( $this->field['id'] ) &&  $this->field['id']) { // Dummy proofing  :P
                $id = "id='".$this->field['id']."'";
            }
            if(!isset($this->field['data']))
                $this->field['data'] = 'post';
            if(is_array($this->field['data']))
                $this->field['data'] = implode("|", $this->field['data']);
            $data = "data-type='".$this->field['data']."'";
            $output = "<select ".$multi." ".$class." ".$id." ".$name." ".$data." style='width:40%'>";
            if(is_array($this->value)){
                foreach ($this->value as $post_id) {
                    $output .='<option value="'.$post_id.'" selected="selected">'.get_the_title($post_id).'</option>';
                }
            }
            $output .="</select>"; 
            if(get_post_type()) 
                $output .="<input type='hidden' name='".THEME_OPT."_clear[".$this->field['id']."]'  value='".$this->field['id']."'>";         
            echo $output;

           
        } //function

        

        private function make_option($id, $value, $group_name = '') {
            if ( is_array( $this->value ) ) {
                $selected = ( is_array( $this->value ) && in_array( $id, $this->value ) ) ? ' selected="selected"' : '';
            } else {
                $selected = selected( $this->value, $id, false );
            }

            echo '<option value="' . $id . '"' . $selected . '>' . $value . '</option>';                
        }        

        /**
         * Enqueue Function.
         * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
         *
         * @since ReduxFramework 1.0.0
         */
        public function enqueue() {

            wp_enqueue_style('select2-style',  "//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css", array(), time());
            wp_enqueue_style('select2-style-custom', ReduxFramework::$_url . 'inc/fields/select_ajax/select' . Redux_Functions::isMin() . '.css', array(), time());
            wp_enqueue_script('select2-js');
            
            wp_enqueue_script(
                'select2-ajax',
                ReduxFramework::$_url . 'inc/fields/select_ajax/field_select_ajax' . Redux_Functions::isMin() . '.js',
                array( 'jquery', 'select2-js' ),
                time(),
                true
            );
     
        } //function
    } //class
}