<?php
/**
 * @package required
 * @since   1.0.0
 */
?>
<?php get_header(); ?>

	<div id="main" class="clearfix">

		<?php
			if ( have_posts() ) {

				while ( have_posts() ) {

					the_post();
					get_template_part( 'content', get_post_format() );

				} // end while

		?>

			<!-- single post navigation / back and forth forever -->
			<nav id="secondary-nav" class="clearfix" role="pagenavigation">

				<?php if ( '' != get_previous_post() ) { ?>
					<div class="nav-previous">
						<?php previous_post_link( __( '<span class="meta-nav">&larr;</span> %link', 'required' ) ); ?>
					</div><!-- /.nav-previous -->
				<?php } // end if ?>

				<?php if ( '' != get_next_post() ) { ?>
					<div class="nav-next">
						<?php next_post_link( __( '%link <span class="meta-nav">&rarr;</span>', 'required' ) ); ?>
					</div><!-- /.nav-next -->
				<?php } // end if ?>

			</nav><!-- /#secondary-nav -->

		<?php

				if ( comments_open() || '0' != get_comments_number() ) {
					comments_template();
				} // end if

			} else {
				get_template_part( '404' );
			} // end else/if
		?>

	</div><!-- /#main -->


<?php get_footer(); ?>