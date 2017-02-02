<?php
/**
 * Template for displaying search forms in Bacardi theme
 *
 * @package WordPress
 * @subpackage Bacardi theme
 * @since Bacardi theme 1.0
 */
?>

<form role="search" method="get" class="search-form form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	
	<div class="form-group form-group-lg search-form-container">

		<input type="search" class="search-field form-control search-string" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'bacardi' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />	
		<input type="hidden" name="post_type" value="post">
		<button type="submit" class="btn btn-lg search-submit"><i class="fa fa-search"></i></button>
		
	</div>

</form>
