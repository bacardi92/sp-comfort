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
<style type="text/css">
	#bc_header.sticky .nav-bottom .navbar .nav > li > a{
		line-height: <?=$logo_size_sticky*16?>px;
		padding: 0 15px;
	}
	#bc_header.non-sticky .nav-bottom .navbar .nav > li > a{
		/*line-height: <?=$logo_size*0?>px;*/
		padding: 0 15px;
		/*line-height: 100px;*/
	}
	.navbar{
		
	}
</style>
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
	        <div class="container">
	            <nav class="navbar" role="navigation">
				  
				    <!-- Brand and toggle get grouped for better mobile display -->
				    	<div class="navbar-header">
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
			                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-menu" aria-expanded="false">		                     
			                    <i class="fa fa-times" aria-hidden="true"></i>
			                </button>				      
					    </div>

					    <!-- Collect the nav links, forms, and other content for toggling -->
					    <div class="collapse navbar-collapse" id="primary-menu">
					      <?php wp_nav_menu(
				                            array(
				                                'theme_location' => 'primary',
				                                'menu_class' => 'cat-menu nav navbar-nav',
				                                'desc_depth' => 1,
				                                'thumbnail' => true,
				                                'thumbnail_link' => false,
				                                'thumbnail_size' => 'nav-thumb',
				                                'thumbnail_attr' => array( 'class' => 'nav_thumb' , 'alt' => '' , 'title' => '' ),		                                
				                                'walker' => new bc_walker()
				                            )
					                    ); ?>
					    </div><!-- /.navbar-collapse -->
				  
				</nav>
	                       
	        </div>
	    </div>
	   
	</header>
	<div class="wrapper" id="wrapper-index">
		
		<?php 
		global $post;
		$slides = redux_post_meta(THEME_OPT, $post->ID, 'opt-slides');
		
		if(is_array($slides) && !empty($slides)): ?>
			<div class="your-class" style="display: none;">
				<?php foreach ($slides as $slide): ?>
					<?php if(isset($slide['image']) && !empty($slide['image'])): ?>
			 			<div class="slider_item_home" style="max-height:700px; min-height:600px; width:100%; background-image:url(<?=$slide['image']?>);""></div>
			 		<?php endif; ?>
			  	<?php endforeach; ?>
			</div>
		<?php endif; ?>

	    <?php get_template_part( 'loop-templates/single-title' ); ?>  
		<div id="content" class="container-fluid">

			<div class="container">
		
		        <div class="row">
		        	
		        	<div id="primary" class="<?php if ( is_active_sidebar( 'sidebar-bacardi' ) && $sidebar_opt) : ?>col-md-9 col-sm-8 col-xs-12<?php else : ?>col-md-12 col-sm-12 col-xs-12<?php endif; ?> content-area">