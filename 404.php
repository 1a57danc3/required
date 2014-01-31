<?php
/**
 * @package required
 * @since   1.0.0
 */
?>
<?php get_header(); ?>

	<div id="main">

		<article id="post-<?php the_ID(); ?>" class="<?php post_class( ); ?>">

			<header class="animated fadeInDown">

				<h1 class="entry-title"><?php _e( '404 - Not Found ', 'required' ) ?></h1>
				<h2 class="error-description"><?php _e( '此页没有找到哟~ ^_^.', 'required' ) ?></h2>

			</header>

			<div id="error-search">
				<?php get_search_form(); ?>
			</div><!--/ #error-search -->

		</article>

	</div><!-- /#main -->

<?php get_footer(); ?>

