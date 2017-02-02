<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'ReduxFramework_icomoon_icons' ) ) {

    class ReduxFramework_icomoon_icons {

        /**
         * Field Constructor.
         * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
         *
         * @since ReduxFramework 1.0.0
         */
        function __construct( $field = array(), $value = '', $parent ) {
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
        function render() {
            $icons = array(
                'Cloud',
                'Complex',
                'Consulting',
                'Desktop',
                'Mobile',
                'QA',
                'Server',
                'UI',
                'Web'
            );
            // var_dump( $this->field,$this->value );
            if(!$this->value)
                $this->value = "icon-Cloud";

            $html = '';
            $html .= '<div class="icon-selector" >';
            foreach ($icons as $icon) {
            
                $html .=    '<div class="icomoonWrapper '.(($this->value == 'icon-'.$icon)? 'selected' : '').'" data-icon="icon-'.$icon.'">
                                <i class="icon-'.$icon.'"></i>
                            </div>';
            }
            $html .= '<input type="hidden" name="'.$this->field['name'].'" id="'.$this->field['id'].'" value="'.$this->value.'">';
            $html .= '</div>';
            echo $html;
        }

        /**
         * Enqueue Function.
         * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
         *
         * @since ReduxFramework 3.0.0
         */
        function enqueue() {
            
            wp_enqueue_style(
                    'redux-icomoon-icons-css',
                    ReduxFramework::$_url . 'inc/fields/icomoon_icons/icomoon.css',
                    array(),
                    time(),
                    'all'
                );

            wp_enqueue_script(
                'redux-icomoon-icons-js',
                ReduxFramework::$_url . 'inc/fields/icomoon_icons/icomoon.js',
                array( 'jquery' ),
                time(),
                true
            );
           
        }
    }
}