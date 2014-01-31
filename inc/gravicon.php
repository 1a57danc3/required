<?php
/**
 * Grab the administrator's Gravatar for the site favicon.
 *
 * @package    required
 * @since      1.0.0
 * @version    1.0.0
 */
function required_gravicon() {

	$admin_email = get_option( 'admin_email' );
	$hash = md5( strtolower( trim( $admin_email ) ) );
	echo 'http://www.gravatar.com/avatar/' . $hash . '?s=144';

} // end required_gravicon