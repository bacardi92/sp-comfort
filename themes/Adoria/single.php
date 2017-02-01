<?php
/**
 * The template for displaying all single posts.
 *
 * @package Bacardi
 */

get_header(); ?>


		<main id="main" class="site-main" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

                <div class="col-md-12 col-sm-12">
	                <?php the_title('<h1>', '</h1>') ?>
	                <hr>    
				    <div class="main-content fp-bottom-line">

				        <?php the_content(); ?>

				    </div><!-- .main-content -->
				    <hr>    
				</div>

				<div class="col-md-12 col-sm-12">

					<section class="post-details row">

						<div class="col-md-4 col-sm-4 sol-xs-12">            	

							<i class="fa fa-tags post-data-icon" aria-hidden="true"></i>
							<p class="post-data-entry"><?php the_category( ', ', 'single', get_the_ID() ); ?></p>

			            </div>

			            <div class="col-md-4 col-sm-4 sol-xs-12">
			            	
			            	<i class="fa fa-clock-o post-data-icon" aria-hidden="true"></i>
			            	<p class="post-data-entry"><?php the_date() ?></p>

			            </div>

			            <div class="col-md-4 col-sm-4 sol-xs-12">
			            	
			            	<i class="fa fa-user post-data-icon" aria-hidden="true"></i>
			            	<p class="post-data-entry">
			            		<strong>Author: </strong>
			            		<?php echo the_author_posts_link() ?>			            	
			            	</p>
			            </div>

			        </section>

		        </div>
				<div class="col-md-12 col-sm-12">
	                <?php
	                // If comments are open or we have at least one comment, load up the comment template
	                if ( comments_open() || get_comments_number() ) :
	                    comments_template();
	                endif;
	                ?>
                </div>

            <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->

<?php get_footer(); ?>