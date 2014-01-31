<?php
/**
 * All functions defined here are based on core WordPress functionality.
 * Any functionality that was developed specifically for or tailored
 * to Required can be located in the `inc` directory.
 *
 * @package    required
 * @since      1.0.0
 * @version    1.0.0
 */

// Define the version as a constant so we can eassily replace it throughout the theme
define( 'REQUIRED_VERSION', '1.5.0' );

// Load up the dependencies
require_once( get_template_directory() . '/inc/custom-header.php' );
require_once( get_template_directory() . '/inc/gravicon.php' );
require_once( get_template_directory() . '/inc/first-image.php' );

// Defines the default content width for media in posts
if ( ! isset( $content_width ) ) {
	$content_width = 620; // this is in pixels
} // end if

if ( ! function_exists( 'required_setup' ) ) {

	/**
	 * Sets up initial theme features based on the WordPress API. Specifically, this function:
	 *
	 * - Sets the default content width
	 * - Registers navigation menus
	 * - Adds support for post thumbnails and infinite scroll
	 * - Defines support for custom headers
	 *
	 * @since    1.0.0
	 */
	function required_setup() {

		// Localization
		load_theme_textdomain( 'required', get_template_directory() . '/lang' );

		// Single navigation menu
		register_nav_menus(
			array(
				'primary' => __( 'Main Menu', 'required' )
			)
		);

		// Feed Links, Post Thumbnails and Infinite Scroll
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support(
			'infinite-scroll',
			array(
				'container' => 'main'
			)
		);

		// Default options for header images
		register_default_headers(

			array(
				'Woods' => array(
					'url'           => '%s/images/headers/woods.jpg',
					'thumbnail_url' => '%s/images/headers/woods-thumbnail.jpg',
					'description'   => __( 'Woods', 'required' )
				),
				'City' => array(
					'url'           => '%s/images/headers/city.jpg',
					'thumbnail_url' => '%s/images/headers/city-thumbnail.jpg',
					'description'   => __( 'City', 'required' )
				),
				'Train Yard' => array(
					'url'           => '%s/images/headers/trainyard.jpg',
					'thumbnail_url' => '%s/images/headers/trainyard-thumbnail.jpg',
					'description'   => __( 'Train Yard', 'required' )
				),
				'Sunset' => array(
					'url'           => '%s/images/headers/sunset.jpg',
					'thumbnail_url' => '%s/images/headers/sunset-thumbnail.jpg',
					'description'   => __( 'Sunset', 'required' )
				),
				'Gradient 1' => array(
					'url'           => '%s/images/headers/gradient1.jpg',
					'thumbnail_url' => '%s/images/headers/gradient1-thumbnail.jpg',
					'description'   => __( 'Gradient 1', 'required' )
				),
				'Gradient 2' => array(
					'url'           => '%s/images/headers/gradient2.jpg',
					'thumbnail_url' => '%s/images/headers/gradient2-thumbnail.jpg',
					'description'   => __( 'Gradient 2', 'required' )
				)
			)

		);

	} // end required_setup
} // end if
add_action( 'after_setup_theme', 'required_setup' );

/**
 * Setup public-facing JavaScript and Stylesheets
 *
 * @since    1.0.0
 */
function required_styles_and_scripts() {

	// Animate.css - http://daneden.me/animate/
	wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_style( 'required-style', get_stylesheet_uri() );

	// FitVids and Required Theme JavaScript
	wp_enqueue_script( 'fitvid-js', get_template_directory_uri() . '/js/lib/jquery.fitvids.js', array( 'jquery' ), REQUIRED_VERSION, true );
	wp_enqueue_script( 'required', get_template_directory_uri() . '/js/theme.min.js', array( 'jquery', 'fitvid-js' ), REQUIRED_VERSION, true );

	// If we're on a single post, the comments are open, and the user has threaded comments, and the comment reply script
	if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option('thread_comments') ) {
		wp_enqueue_script( 'comment-reply' );
	} // end if

} // end required_styles_and_scripts
add_action( 'wp_enqueue_scripts', 'required_styles_and_scripts' );

// Check to see if a child theme has implemented the template
if ( ! function_exists( 'required_comment' ) ) {

	/**
	 * Template for comments and pingbacks.
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 * @since    1.0.0
	 */
	function required_comment( $comment, $args, $depth ) {

		$GLOBALS['comment'] = $comment;

		if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) { ?>

			<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
				<div class="comment-body">
					<?php _e( 'Pingback:', 'required' ); ?>
					<?php comment_author_link(); ?>
					<?php edit_comment_link( __( 'Edit', 'required' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- /div#comment -->
			</li><!-- /li#comment -->

		<?php } else { ?>

			<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
				<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
					<footer class="comment-meta">
						<div class="comment-author vcard">

							<?php
								if ( 0 != $args['avatar_size'] ) {
									echo get_avatar( $comment, $args['avatar_size'] );
								} // end if
								printf( sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) );
							?>

							<div class="comment-metadata">
								<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
									<time datetime="<?php comment_time( 'c' ); ?>">
										<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'required' ), get_comment_date(), get_comment_time() ); ?>
									</time>
								</a>
								<?php edit_comment_link( __( 'Edit', 'required' ), '<span class="edit-link">', '</span>' ); ?>
							</div><!-- /.comment-metadata -->

						</div><!-- /.comment-author -->

						<?php if ( '0' == $comment->comment_approved ) { ?>
							<p class="comment-awaiting-moderation">
								<?php _e( 'Your comment is awaiting moderation.', 'required' ); ?>
							</p>
						<?php } // end if ?>
					</footer><!-- .comment-meta -->

					<div class="comment-content">
						<?php comment_text(); ?>
					</div><!-- /.comment-content -->

					<div class="reply">
						<?php comment_reply_link( array_merge( $args, array( 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</div><!-- .reply -->
				</article><!-- .comment-body -->
			</li><!-- /li#comment -->

		<?php
		} // end if

	} // required_comment

} // end if

/**
 * Template for a single page of images. This is primarily used for galleries.
 *
 * @since    1.0.0
 */

// Check to see if a child theme has implemented the template
if ( ! function_exists( 'required_the_attached_image' ) ) {

	/**
	 * Prints the attached image with a link to the next attached image.
	 *
	 * @since    1.0.0
	 */
	function required_the_attached_image() {

		$post                = get_post();
		$attachment_size     = apply_filters( 'required_attachment_size', array( 1200, 1200 ) );
		$next_attachment_url = wp_get_attachment_url();

		/**
		 * Grab the IDs of all the image attachments in a gallery so we can get the
		 * URL of the next adjacent image in a gallery, or the first image (if
		 * we're looking at the last image in a gallery), or, in a gallery of one,
		 * just the link to that image file.
		 */
		$attachment_ids = get_posts(
			array(
				'post_parent'    => $post->post_parent,
				'fields'         => 'ids',
				'numberposts'    => -1,
				'post_status'    => 'inherit',
				'post_type'      => 'attachment',
				'post_mime_type' => 'image',
				'order'          => 'ASC',
				'orderby'        => 'menu_order ID'
			)
		);

		// If there is more than one attachment in a gallery...
		if ( count( $attachment_ids ) > 1 ) {

			foreach ( $attachment_ids as $attachment_id ) {

				if ( $attachment_id == $post->ID ) {

					$next_id = current( $attachment_ids );
					break;

				} // end if

			} // end foreach

			// get the URL of the next image attachment...
			if ( $next_id ) {

				$next_attachment_url = get_attachment_link( $next_id );

			// or get the URL of the first image attachment.
			} else {
				$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
			} // end if/else

		} // end if

		printf(
			'<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
			esc_url( $next_attachment_url ),
			the_title_attribute( array( 'echo' => false ) ),
			wp_get_attachment_image( $post->ID, $attachment_size )
		);

	} // end required_the_attached_image

} // end if

/* Features to be implemented in a future version:
 *------------------------------------------------------------------------*/
 register_sidebar( array() );
 dynamic_sidebar();

function colorCloud($text) { 
$text = preg_replace_callback('|<a (.+?)>|i', 'colorCloudCallback', $text); 
return $text; 
} 
function colorCloudCallback($matches) { 
$text = $matches[1]; 
$color = dechex(rand(0,16777215)); 
$pattern = '/style=(\'|\")(.*)(\'|\")/i'; 
$text = preg_replace($pattern, "style=\"color:#{$color};$2;\"", $text); 
return "<a $text>"; 
} 
add_filter('wp_tag_cloud', 'colorCloud', 1);