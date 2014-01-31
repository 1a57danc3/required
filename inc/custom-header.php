<?php
/**
 * Implementation of the WordPress Custom Header function.
 *
 * @package    required
 * @since      1.0.0
 * @version    1.0.0
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses required_header_style()
 * @uses required_admin_header_style()
 * @uses required_admin_header_image()
 *
 * @package    required
 * @since      1.0.0
 * @version    1.0.0
 */
function required_custom_header_setup() {

	add_theme_support(
		'custom-header',
		apply_filters(
			'required_custom_header_args',
			array(
				'default-image'          => '',
				'default-text-color'     => 'fff',
				'width'                  => 260,
				'height'                 => 825,
				'flex-height'            => true,
				'wp-head-callback'       => 'required_header_style'
			)
		)
	);
}
add_action( 'after_setup_theme', 'required_custom_header_setup' );

if ( ! function_exists( 'required_header_style' ) ) {

	/**
	 * Styles the header image and text displayed on the blog
	 *
	 * @see required_custom_header_setup().
	 */
	function required_header_style() {

		$header_text_color = get_header_textcolor();
		$header_image = get_header_image();

		// If we get this far, we have custom styles.
		?>
		<style type="text/css">

		<?php
			// if image use it and add text shadow to the text
			if ( '' != $header_image ) {
		?>
			#sidebar {
				background-image: url(<?php echo esc_url( $header_image ); ?>);
				background-size: cover;
				text-shadow: 0 0 5px rgba(0,0,0,0.4);
			}
			.site-title a,
			.site-description {
				color: #<?php echo $header_text_color; ?>;
			}

			nav ul li a {
				color: #<?php echo $header_text_color; ?>;
			}


		<?php } // end if ?>

		</style>
		<?php
	} // end required_header_style

} // end if