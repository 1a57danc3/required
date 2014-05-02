<?php
/**
 * @package required
 * @since   1.0.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

	<header>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>

	<figure class="featured-image">
		<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			} // end if
		?>
	</figure><!-- /.featured-image -->

	<div class="entry-content clearfix">

		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'required' ) ); ?>
		<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'required' ),
					'after'  => '</div>',
				)
			);
		?>
	</div><!-- /.entry-content -->

	<footer class="post-footer">

		<?php $categories_list = get_the_category_list( __( ', ', 'required' ) ); ?>
		<span class="category-links">
			<?php printf( __( '%1$s', 'required' ), $categories_list ); ?>
		</span><!-- /.category-links -->

		<?php
			$tags_list = get_the_tag_list( '', __( ', ', 'required' ) );
			if ( $tags_list ) {
		?>
				<span class="tag-links">
					<?php printf( __( '标签 %1$s', 'required' ), $tags_list ); ?>
				</span>
		<?php } // end if ?>

	</footer><!-- /.post-footer -->


</article><!-- /#post -->