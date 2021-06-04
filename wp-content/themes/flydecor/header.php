<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Flydecor
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if(is_singular() && pings_open()) { ?>
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' )); ?>">
<?php } ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
	//wp_body_open hook from WordPress 5.2
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
?>
<a class="skip-link screen-reader-text" href="#sitemain">
	<?php _e( 'Skip to content', 'flydecor' ); ?>
</a>

<div id="header">
	<?php $hideheader = get_theme_mod('hide_tophead', '1'); ?>
		<?php if($hideheader  == '') { ?>
	<div class="top-header">
			<div class="flex-element">
					<div class="top-header-left">
							<div class="flex-element">
								<?php if(get_theme_mod('welcome-txt') != '') { ?>
									<div class="top-header-col"><?php echo esc_html(get_theme_mod('welcome-txt')); ?></div><!-- header-box-row -->
								<?php } ?>
										<div class="top-header-col">
											<div class="social-icons">
												<?php if(get_theme_mod('facebook') != '') { ?>
													<a href="<?php echo esc_url(get_theme_mod('facebook')); ?>" target="_blank" title="facebook-f"><i class="fa fa-facebook-f" aria-hidden="true"></i></a>
												<?php } ?>
												<?php if(get_theme_mod('twitter') != '') { ?>
													<a href="<?php echo esc_url(get_theme_mod('twitter')); ?>" target="_blank" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
												<?php } ?>
												<?php if(get_theme_mod('linkedin') != '') { ?>
													<a href="<?php echo esc_url(get_theme_mod('linkedin')); ?>" target="_blank" title="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
												<?php } ?>
												<?php if(get_theme_mod('instagram') != '') { ?>
													<a href="<?php echo esc_url(get_theme_mod('instagram')); ?>" target="_blank" title="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
												<?php } ?>
											</div><!-- social-icons -->
										</div><!-- header box row -->            
						</div><!-- flex- elemnt -->
				</div><!-- top header left -->
				<div class="top-header-right">
						<div class="flex-element">
							<?php if(get_theme_mod('call-txt')) { ?>
								<div class="top-header-col"><?php echo esc_html(get_theme_mod('call-txt') ); ?></div><!-- header-box-row -->
							<?php } ?>
							<div class="top-header-col"><a href="<?php echo esc_url('mailto:'.sanitize_email(get_theme_mod('email-txt'))); ?>"><?php echo sanitize_email(get_theme_mod('email-txt')); ?></a></div><!-- header-box-row --></div><!-- flex-elemnt -->
				</div><!-- top-header-right -->
			</div><!-- flex-elements -->
	</div><!-- top-header -->
	<?php } ?>
	<div class="header-inner container">
		  <div class="logo">
		   <?php flydecor_the_custom_logo(); ?>
							<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a></h1>

						<?php $description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p><?php echo esc_html($description); ?></p>
						<?php endif; ?>
		 </div><!-- .logo -->                 
		<div id="navigation">
			<div class="toggle">
					<a class="toggleMenu" href="#"><?php esc_html_e('Menu','flydecor'); ?></a>
			</div><!-- toggle --> 	
			<nav id="main-navigation" class="site-navigation primary-navigation sitenav" role="navigation">		
					<?php wp_nav_menu( array('theme_location' => 'primary') ); ?>	
			</nav>
		</div><!-- navigation -->
	</div><!-- .header-inner--><div class="clear"></div>  
</div><!-- #header -->