<?php
/**
 * @package required
 * @since   1.0.0
 */
?>
<article id="post-<?php the_ID(); ?>"

	<?php post_class('clearfix'); ?>>

	<?php if( is_archive() || is_search() ) { ?>

		<figure class="featured-image col1">

			<?php if ( '' != get_the_post_thumbnail() ) { ?>
				<a href="<?php the_permalink(); ?>" ><?php the_post_thumbnail(); ?></a>
			<?php } else { ?>
				<a href="<?php the_permalink(); ?>" ><img src="<?php echo required_first_image(); ?>" alt="<?php the_title(); ?>" /></a>
			<?php } // end if/else ?>

		</figure><!-- /.featured-image -->

		<div class="col2">

			<header>

				<?php if ( 0 < strlen( get_the_title() ) ) { ?>
					<h1 class="entry-title">
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h1><!-- /.entry-title -->
				<?php } // end if ?>

				<div class="post-meta">
					<span class="post-date">
						<?php if ( 0 < strlen( get_the_title() ) ) { ?>
							<?php the_time( get_option( 'date_format' ) ); ?>
						<?php } else { ?>
							<a href="<?php the_permalink(); ?>">
								<?php the_time( get_option( 'date_format' ) ); ?>
							</a>
						<?php } // end if/else ?>
					</span><!-- /.post-date -->
					<?php _e( ' | ', 'required' ); ?>
					<span class="comment-link">
						<?php comments_popup_link( '评论', '1 条评论', '% 条评论', 'comments-link', ''); ?>
					</span><!-- /.comment-link -->
					<?php edit_post_link( '- 编辑 ', '<span>', '</span>'); ?>
				</div><!-- /.post-meta -->

			</header>

			<div class="entry-content clearfix">
				<?php the_excerpt(); ?>
			</div><!--/ .entry-content -->

		</div><!--/ col2 -->

	<?php } else { ?>

		<header>

			<?php if ( 0 < strlen( get_the_title() ) ) { ?>
				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h1><!-- /.entry-title -->
			<?php } // end if ?>

			<div class="post-meta">
				<span class="post-date">
					<?php if ( 0 < strlen( get_the_title() ) ) { ?>
						<?php the_time( get_option( 'date_format' ) ); ?>
					<?php } else { ?>
						<a href="<?php the_permalink(); ?>">
							<?php the_time( get_option( 'date_format' ) ); ?>
						</a>
					<?php } // end if/else ?>
				</span><!-- /.post-date -->
				<?php _e( ' | ', 'required' ); ?>
				<span class="comment-link">
					<?php comments_popup_link( '评论', '1 条评论', '% 条评论', 'comments-link', ''); ?>
				</span><!-- /.comment-link -->
				<?php edit_post_link( '- 编辑', '<span>', '</span>'); ?>
			</div><!-- /.post-meta -->

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

			<?php $tags_list = get_the_tag_list( '', __( ', ', 'required' ) );
				if ( $tags_list ) {
			?>
					<span class="tag-links">
						<?php printf( __( 'Tagged %1$s', 'required' ), $tags_list ); ?>
					</span><!-- /.tag-links -->
			<?php } // end if ?>

		</footer>

	<?php } //end if ?>

</article>
