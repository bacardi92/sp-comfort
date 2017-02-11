<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Bacardi theme
 * @since Bacardi theme 1.0
 */

global $bacardi;
$sidebar_opt = $bacardi['enable_sidebar'];
$logo = (isset($bacardi['header_logo']['url'])? $bacardi['header_logo']['url'] : '');
$logo_sticky = (isset($bacardi['header_logo_sticky']['url'])? $bacardi['header_logo_sticky']['url'] : '');
$logo_size = (isset($bacardi['header_logo_size'])? $bacardi['header_logo_size'] : 5);
$logo_size_sticky = (isset($bacardi['header_logo_sticky_size'])? $bacardi['header_logo_sticky_size'] : 5);
$sidebar_opt = $bacardi['enable_sidebar'];
if(is_category() || is_archive() || is_single() || is_home()){
    $sidebar_opt = $bacardi['enable_sidebar_blog'];
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php 
	$header_class = '';
	if ( is_admin_bar_showing() ) {
		$header_class="admin_header";
	}
	?>
	<header id="bc_header" class="non-sticky <?=$header_class?>">
	    
	    <!-- ******************* The Navbar Area ******************* -->
	   <div class="nav-bottom">
	        <div class="container clearfix topBarArea">
				  
			    <!-- Brand and toggle get grouped for better mobile display -->
		    	<div class="navbar-header col-xs-12 col-sm-9 clearfix">
			    	<a href="<?=home_url()?>">
			    		<?php if($logo): ?>
				      		<img class="navbar-brand logo logo-normal" src="<?=$logo?>" style="height: <?=$logo_size*14?>px" />
				   		<?php else: ?>
				    		<span class="navbar-brand logo logo-normal" style="line-height: <?=$logo_size*14?>px" ><?php echo get_bloginfo('name'); ?></span>
				    	<?php endif; ?>
				    	<?php if($logo_sticky): ?>
				      		<img class="navbar-brand logo logo-sticky" src="<?=$logo_sticky?>" style="height: <?=$logo_size_sticky*16?>px" />
				    	<?php else: ?>
				    		<span class="navbar-brand logo logo-sticky" style="line-height: <?=$logo_size_sticky*16?>px"><?php echo get_bloginfo('name'); ?></span>
				    	<?php endif; ?>
				    </a>      
			    </div>
	            <div class="phones hidden-xs col-sm-3 clearfix">
	            	<ul class="phoneList">
	            		<li>123456789</li>
	            		<li>123456789</li>
	            		<li>123456789</li>
	            	</ul>
	            </div>          
	        </div>
	    </div>
	   
	</header>
	<div class="wrapper" id="wrapper-index">
		


		<?php if ( is_front_page() && isset($bacardi["home_slider_shortcode"])): ?>
		<div id="slider" class="container-fluid">
				<div class="row">
					<?php echo do_shortcode('[bc_slick_slider id='.$bacardi["home_slider_shortcode"].']'); ?>
				</div>
		</div>		
		<?php endif; ?>
	    <div id="primary-main-menu" class="container-fluid"> 
			<nav class="navbar main-menu" role="navigation">
			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <!-- <div class="collapse navbar-collapse" id="primary-menu"> -->
			      <?php wp_nav_menu(
		                            array(
		                                'theme_location' => 'primary',
		                                'menu_class' => 'cat-menu nav container',
		                                'desc_depth' => 1,
		                                'thumbnail' => true,
		                                'thumbnail_link' => false,
		                                'thumbnail_size' => 'nav-thumb',
		                                'thumbnail_attr' => array( 'class' => 'nav_thumb' , 'alt' => '' , 'title' => '' ),		                                
		                                'walker' => new Walker_Extend_Menu()
		                            )
			                    ); ?>
			    <!-- </div>/.navbar-collapse -->
			</nav>
		</div>
	    <?php //get_template_part( 'loop-templates/single-title' ); ?> 
		<div class="container">
	
	        <div class="row">
	        	<?php if ( is_active_sidebar( 'sidebar-bacardi' ) && $sidebar_opt) : ?>
                    <div class="col-md-3 col-sm-4 hidden-xs" id="sidebar_wrapper">
                        <?php get_sidebar('main'); ?>
                    </div>
                <?php endif; ?> 
	        	<div id="main-page-content" class="<?php if ( is_active_sidebar( 'sidebar-bacardi' ) && $sidebar_opt) : ?>col-md-9 col-sm-8 col-xs-12<?php else : ?>col-md-12 col-sm-12 col-xs-12<?php endif; ?> content-area">