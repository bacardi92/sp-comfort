<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				$comments_number = get_comments_number();
				if ( 1 === $comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'bacardi' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s thought on &ldquo;%2$s&rdquo;',
							'%1$s thoughts on &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'bacardi'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
			?>
		</h2>

	

		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => true,
					'avatar_size' => 60,
					'per_page'	  => 2,
					'reply_text'  => '<i class="fa fa-reply" aria-hidden="true"></i> Reply'	
				) );
			?>
		</ul><!-- .comment-list -->

		<?php  the_comments_navigation();
		global $wp_query;
		$args = array(

			'base'    => add_query_arg( 'cpage', '%#%' ),
			'format'  => '?cpage=%#%',
			'total'   => ceil(count($wp_query->comments)/2),
			'current' => (get_query_var('cpage') ? get_query_var('cpage'): 1),
			'echo'    => true,			 
		);

		?>
		<div id="comments_pagination">
			
			<?php paginate_comments_links( $args ); ?>
			
		</div>		 

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'bacardi' ); ?></p>
	<?php endif; ?>

	<?php
		comment_form( array(
			'title_reply_before'	=> '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'		=> '</h2>',
			'comment_field'			=> '<p class="comment-form-comment"><textarea id="comment" class="form-control" name="comment" cols="45" rows="8"  aria-required="true" required="required"></textarea></p>',
			'class_submit'			=> 'btn-lg btn pull-right btn-default leave_comment',
			'fields'				=> array(
											'author' => '<p class="comment-form-author"><input id="author" placeholder="Your Name" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" required /></p>',
											'email'  => '<p class="comment-form-email"><input id="email" placeholder="Your Email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" required/></p>'											
										),
			'comment_notes_before'	=> '<p class="comment-notes">' . __( 'Your email address will not be published.' ) . '</p>',	 
		) );
	?>

</div><!-- .comments-area -->
