<?php
class Walker_Extend_Menu extends Walker_Nav_Menu {

 /**
 * @see Walker::start_lvl()
 * @since 3.0.0
 *
 * @param string $output Passed by reference. Used to append additional content.
 * @param int $depth Depth of page. Used for padding.
 */
function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
}

/**
 * @see Walker::end_lvl()
 * @since 3.0.0
 *
 * @param string $output Passed by reference. Used to append additional content.
 * @param int $depth Depth of page. Used for padding.
 */
function end_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul></li>\n";
}

/**
 * @see Walker::start_el()
 * @since 3.0.0
 *
 * @param string $output Passed by reference. Used to append additional content.
 * @param object $item Menu item data object.
 * @param int $depth Depth of menu item. Used for padding.
 * @param int $current_page Menu item ID.
 * @param object $args
 */
function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    $class_names = $value = '';
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $classes[] = 'menu-item-' . $item->ID;

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
            /*
    // values of depth
    echo $item->title.' - ';
    echo $depth.'<br />';
    echo $class_names;

    if ($depth == 0) 
    {
        if( check for subpage )
        {
            $class_names = $class_names ? ' class="menu-enable"' : '';
        }
        else
        {
            $class_names = $class_names ? '' : '';
        }
    }
    else
    {
        $class_names = $class_names ? ' class="sub-menu-enable"' : '';
    }*/

    $output .= $indent . '<li' . $class_names . '>';
    $class = '';
    $data_atts ='';
    if($args->walker->has_children){
        $data_atts = "data-toggle=\"dropdown\"";
        $class = 'class="dropdown-toggle"';
    }

    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

    $item_output = $args->before;
    $item_output .= '<a'. $attributes . $data_atts . $class.'> ';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
}
/**
 * @see Walker::end_el()
 * @since 3.0.0
 *
 * @param string $output Passed by reference. Used to append additional content.
 * @param object $item Page data object. Not used.
 * @param int $depth Depth of page. Not Used.
 */
function end_el( &$output, $item, $depth = 0, $args = array() ) {
    $output .= "</li>\n";
}
}