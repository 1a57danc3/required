<?php
/**
 * @package required
 * @since   1.0.0
 */
?>
<?php
if ( post_password_required() ) {
	return;
} // end if
?>

	<div id="comments" class="comments-area">

		<?php if ( have_comments() ) { ?>

			<h2 class="comments-title">
				<?php
					printf( _nx( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'required' ),
						number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
				?>
			</h2>

			<?php // Are there comments through which to navigate?  ?>
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>

				<nav id="comment-nav-above" class="navigation-comment" role="navigation">
					<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'required' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'required' ) ); ?></div>
				</nav><!-- #comment-nav-above -->

			<?php } // end if ?>

			<ol class="comment-list">
				<?php
					/* Loop through and list the comments. Tell wp_list_comments()
					 * to use required_comment() to format the comments.
					 * If you want to overload this in a child theme then you can
					 * define required_comment() and that will be used instead.
					 */
					wp_list_comments( array( 'callback' => 'required_comment' ) );
				?>
			</ol><!-- /.comment-list -->

			<?php // Are there comments through which to navigate?  ?>
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>

				<nav id="comment-nav-below" class="navigation-comment" role="navigation">
					<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'required' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'required' ) ); ?></div>
				</nav><!-- /#comment-nav-below -->

			<?php } // end if ?>

		<?php } // end if ?>

		<?php // If comments are closed and there are comments, let's leave a little note, shall we? ?>
		<?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>
			<p class="no-comments">
				<?php _e( 'Comments are closed.', 'required' ); ?>
			</p>
		<?php } // end if ?>

		<?php

			$comments_args = array(
	       		'comment_notes_after' => '', // Hide "Text or HTML to be displayed after the set of comment fields"
		   		'comment_field' => '<label for="comment">' . __( 'Comment', 'required' ) . '</label><br /><textarea id="comment" name="comment" aria-required="true"></textarea>',
	        );

			comment_form($comments_args);
		 ?>

	</div><!-- /#comments -->