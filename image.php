<?php
/**
 * @package required
 * @since   1.0.0
 */
?>
<?php get_header(); ?>

	<div id="main" class="clearfix">

		<?php while ( have_posts() ) {
			the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">

					<h1 class="entry-title"><?php the_title(); ?></h1>

					<nav role="navigation" id="image-navigation" class="navigation-image">
						<div class="nav-previous"><?php previous_image_link( false, __( '<span class="meta-nav">&larr;</span> Previous', 'required' ) ); ?></div>
						<div class="nav-next"><?php next_image_link( false, __( 'Next <span class="meta-nav">&rarr;</span>', 'required' ) ); ?></div>
					</nav><!-- /#image-navigation -->

				</header><!-- /.entry-header -->

				<div class="entry-content">
					<div class="entry-attachment">

						<div class="attachment">
							<?php required_the_attached_image(); ?>
						</div><!-- /.attachment -->

						<?php if ( has_excerpt() ) { ?>
							<div class="entry-caption">
								<?php the_excerpt(); ?>
							</div><!-- /.entry-caption -->
						<?php } // end if ?>
					</div><!-- /.entry-attachment -->

					<?php
						the_content();
						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'required' ),
								'after'  => '</div>',
							)
						);
					?>
				</div><!-- /.entry-content -->

				<footer class="entry-meta">
					<?php
						if ( comments_open() && pings_open() ) : // Comments and trackbacks open
							printf( __( '<a class="comment-link" href="#respond" title="Post a comment">Post a comment</a> or leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'required' ), get_trackback_url() );
						elseif ( ! comments_open() && pings_open() ) : // Only trackbacks open
							printf( __( 'Comments are closed, but you can leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'required' ), get_trackback_url() );
						elseif ( comments_open() && ! pings_open() ) : // Only comments open
							 _e( 'Trackbacks are closed, but you can <a class="comment-link" href="#respond" title="Post a comment">post a comment</a>.', 'required' );
						elseif ( ! comments_open() && ! pings_open() ) : // Comments and trackbacks closed
							_e( 'Both comments and trackbacks are currently closed.', 'required' );
						endif;

						edit_post_link( __( 'Edit', 'required' ), ' <span class="edit-link">', '</span>' );
					?>
				</footer><!-- /.entry-meta -->
			</article><!-- /#post -->

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) {
					comments_template();
				} // end if
			?>

		<?php } // end while ?>

	</div><!-- /#main -->

<?php get_footer(); ?>