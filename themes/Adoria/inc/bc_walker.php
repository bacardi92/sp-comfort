<?php 

class bc_walker extends Walker_Nav_Menu {

    function __construct(){
        add_image_size('nav-thumb', 280, 140, true);
    }
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){
        $args = (object) $args;    
        global $wp_query;
        if(!$args->menu) return;
        $indent = ( $depth ) ? str_repeat( "", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';

        $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        // get user defined attributes for thumbnail images
        $attr_defaults = array( 'class' => 'nav_thumb' , 'alt' => esc_attr( $item->attr_title ) , 'title' => esc_attr( $item->attr_title ) );
        $attr = isset( $args->thumbnail_attr ) ? $args->thumbnail_attr : '';
        $attr = wp_parse_args( $attr , $attr_defaults );

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';

        if($depth == 2){
            // thumbnail image output

            $item_output .= ( isset( $args->thumbnail_link ) && $args->thumbnail_link ) ? '<a' . $attributes . '>' : '';
            $item_output .= apply_filters( 'menu_item_thumbnail' , ( isset( $args->thumbnail ) && $args->thumbnail ) ? '<div class="nav-post-thumb" style="background: url(\'' . get_the_post_thumbnail_url( $item->object_id ) .'\');"></div>': '' , $item , $args , $depth );
            $item_output .= ( isset( $args->thumbnail_link ) && $args->thumbnail_link ) ? '</a>' : '';
            // var_dump($item_output); die;

        }
        // menu link output

        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

        // menu description output based on depth
        //$item_output .= ( $args->desc_depth >= $depth ) ? '<br /><span class="sub">' . $item->description . '</span>' : '';

        // close menu link anchor
        $item_output .= '</a>';
        $item_output .= $args->after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id);

    }
}

