<?php
/**
 * @package required
 * @since   1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="http://index.qiniudn.com/favicon.ico">
		<title>汐</title>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

		<div id="wrapper" class="clearfix">

			<aside id="sidebar" class="animated fadeInLeft">

				<header id="masthead">

					<div class="bio-pic">
						<a href="<?php echo esc_html( home_url( '/' ) ); ?>" >
							<?php
								// Get the admin email and the gravatar for said admin
								$admin_email = get_option('admin_email');
								echo get_avatar( $admin_email, 80 );
							?>
						</a>
					</div><!--/ bio-pic -->

					<hgroup>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url() ); ?>" ><?php bloginfo( 'name' ); ?></a></h1>
						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					</hgroup>

				</header><!-- /#masthead -->

				<nav id="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'depth' => 1, ) ); ?>
				</nav><!-- /#navigation -->

			</aside><!-- /#sidebar -->