<?php
/**
 * @package required
 * @since   1.0.0
 */
?>
<?php get_header(); ?>

	<div id="main">

		<?php if ( have_posts() ) { ?>

		<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page'); ?>

				<?php
					if ( comments_open() || '0' != get_comments_number() )
						comments_template();
				?>

			<?php endwhile; ?>

		<?php } else { ?>

			<?php get_template_part( '404' ); ?>

		<?php } // end else/if ?>

	</div><!-- /#main -->


<?php get_footer(); ?>