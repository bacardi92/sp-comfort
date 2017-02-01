<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Bacardi
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>    
    


            <div class="entry-content main-content">

                <div class="col-md-12 col-sm-12">

                <?php the_content(); ?>

                <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'bacardi' ),
                    'after'  => '</div>',
                ) );
                ?>


                <footer class="entry-footer">

                    <?php edit_post_link( __( 'Edit', 'bacardi' ), '<span class="edit-link">', '</span>' ); ?>

                </footer><!-- .entry-footer -->

                </div> <!-- .col-md-12 col-sm-12 -->

        

    </div><!-- .container -->

</article><!-- #post-## -->