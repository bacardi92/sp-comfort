<?php

global $bacardi;
global $post;
// var_dump($post);
$categories = $bacardi['home_categories_list'];
$sidebar_opt = $bacardi['enable_sidebar'];

get_header(); ?>

	<?php if (is_array($categories)): ?>
		<div class="categoriesFlexWrapper clearfix">
			<?php foreach ($categories as $category): ?>
				<?php 
					$img = (isset($category['home_categories_img']['url'])? $category['home_categories_img']['url'] : null);
					$title = '';
					$href = '#';
					if(isset($category['home_categories_title'])){
						$cat = get_category( $category['home_categories_title'], ARRAY_A );
						$title = $cat['name'];
						$href = home_url($cat['name']);
					}
					$price = (isset($category['home_categories_price'])? $category['home_categories_price'] : null);

				?>
				<div class="singleCategory col-sm-6 col-xs-12">
					<a class="blockSizeLink" href="<?php echo $href?>"></a>
					<img src="<?php echo $img?>" alt="">
					<a class="titleLink" href="<?php echo $href?>"><?php echo $title?></a>
					<span class="priceItem"><?php echo $price; ?></span>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
	<?php if(isset($bacardi['home_excerpt_title'])): ?>
		<h2 class="homeExcerptTitle"><?php echo $bacardi['home_excerpt_title'] ?></h2>
	<?php endif; ?>
	<?php if(isset($bacardi['home_excerpt'])): ?>
		<p class="homeExcerpt"><?php echo $bacardi['home_excerpt'] ?></p>
	<?php endif; ?>
		</div>
	</div>
</div>
<?php 
	$background = (isset($bacardi['home_contact_color'])? $bacardi['home_contact_color'] : 'transparent');
	$form = (isset($bacardi['home_contact_form'])? $bacardi['home_contact_form'] : null);
	$img = (isset($bacardi['home_contact_img']['url'])? $bacardi['home_contact_img']['url'] : null);
	$imgSecondary = (isset($bacardi['home_contact_img_secondary']['url'])? $bacardi['home_contact_img_secondary']['url'] : null);
?>
<div class="container-fluid" >
	<div class="row" style="background: <?php echo $background['rgba']; ?>">
		<div class="container formFlex clearfix">
			<div class="col-sm-6 col-xs-12 clearfix">
				<div class="row">
					<div class="col-sm-6 hidden-xs clearfix imgSecondary">
						<div class="row">
							<img src="<?php echo $imgSecondary; ?>">
						</div>
					</div>
					<div class="col-sm-offset-6 col-sm-6 col-xs-12 formWrapper clearfix">
						<div class="row">
							<?php echo do_shortcode($form); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12 contactImg clearfix">
				<div class="row">
					<img src="<?php echo $img; ?>">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="<?php if ( is_active_sidebar( 'sidebar-bacardi' ) && $sidebar_opt) : ?>col-md-offset-3 col-md-9 col-sm-offset-4 col-sm-8 col-xs-12<?php else : ?>col-md-12 col-sm-12 col-xs-12<?php endif; ?> content-area">
<?php if(isset($bacardi['home_previliges_section_title'])): ?>
	<h1 class="previligesTitle"><?php echo $bacardi['home_previliges_section_title']; ?></h1>
<?php endif; ?>
<?php if(isset($bacardi['home_previliges']) && is_array($bacardi['home_previliges'])): ?>

	<div class="previligesWrapperFlex">
		<?php foreach($bacardi['home_previliges'] as $item): 
			$img = (isset($item['home_previliges_img']['url'])? $item['home_previliges_img']['url'] : null);
			$title = (isset($item['home_previliges_title'])? $item['home_previliges_title'] : null);
			$exc = (isset($item['home_previliges_excerpt'])? $item['home_previliges_excerpt'] : null);
		?>
			<div class="col-sm-6 col-xs-12">
				<div class="col-sm-5 col-xs-12">
					<div class="row">
						<img src="<?php echo $img; ?>">
					</div>
				</div>
				<div class="col-sm-7 col-xs-12">
					<div class="row">
						<h3><?php echo $title; ?></h3>
						<p><?php echo $exc; ?></p>
					</div>
				</div>

			</div>
		<?php endforeach; ?>
	</div>

<?php endif; ?>

<?php echo (isset($post->post_content))? $post->post_content : '' ; ?>
<?php get_footer(); ?>