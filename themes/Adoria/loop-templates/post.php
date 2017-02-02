<?php
/**
 * The template used for displaying posts on archive page content in archive.php
 *
 * @package Bacardi
 */
$image = get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' );
if(!$image){
	$image = redux_post_meta( THEME_OPT, get_the_ID(), 'page_title_image');	
	if(isset($image['url']) && $image['url']!=''){
		$image = $image['url'];
	}else{
		$image = get_template_directory_uri().'/bacardi-logo.png';
	}
}

?>

<div class="col-md-4 col-sm-6 col-xs-12">
	<div class="img-box post">
		<div class="img-bg" style="background-image: url(<?=$image;?>);"></div>
		<div class="img-txt">
	        <a class="img-link" href="<?=the_permalink()?>"></a>     
	        <a href="<?=the_permalink()?>">
	            <h3><?=the_title()?></h3>
	            <span class="text-right post_date"><?=get_the_date()?></span>
	        </a>
	    </div>
	</div>
</div>