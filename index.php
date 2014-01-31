<?php
/**
 * @package required
 * @since   1.0.0
 */
?>
<?php get_header(); ?>

	<div id="main">

		<?php
			if ( have_posts() ) {

				while ( have_posts() ) {

					the_post();
					get_template_part( 'content', get_post_format() );

				} // end while
		?>

		<!-- post navigation / back and forth forever -->
		<nav id="secondary-nav" class="clearfix" role="pagenavigation">

			<?php if ( get_next_posts_link() ) : ?>
				<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> 下一页', 'required' ) ); ?></div>
				<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
				<div class="nav-next"><?php previous_posts_link( __( '上一页 <span class="meta-nav">&rarr;</span>', 'required' ) ); ?></div>
			<?php endif; ?>

		</nav><!-- /#secondary-nav -->

		<?php } else { ?>

			<?php get_template_part( '404' ); ?>

		<?php } // end else/if ?>

	</div><!-- /#main -->

<?php get_footer(); ?>