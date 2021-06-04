<?php
//about theme info
add_action( 'admin_menu', 'ecommerce_hub_gettingstarted' );
function ecommerce_hub_gettingstarted() {    	
	add_theme_page( esc_html__('Get Started', 'ecommerce-hub'), esc_html__('Get Started', 'ecommerce-hub'), 'edit_theme_options', 'ecommerce_hub_guide', 'ecommerce_hub_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function ecommerce_hub_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getting-started/getting-started.css');
}
add_action('admin_enqueue_scripts', 'ecommerce_hub_admin_theme_style');

//guidline for about theme
function ecommerce_hub_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'ecommerce-hub' );
?>
<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php esc_html_e( 'Welcome to Ecommerce Hub WordPress Theme', 'ecommerce-hub' ); ?></h3>
		</div>
		<div class="color_bg_blue">
			<p>Version: <?php echo esc_html($theme['Version']);?></p>
				<p class="intro_version"><?php esc_html_e( 'Congratulations! You are about to use the most easy to use and felxible WordPress theme.', 'ecommerce-hub' ); ?></p>
				<div class="blink">
					<h4><?php esc_html_e( 'Theme Created By Themesglance', 'ecommerce-hub' ); ?></h4>
				</div>
			<div class="intro-text"><img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/themesglance-logo.png" alt="" /></div>
			<div class="coupon-code"><?php esc_html_e( 'Get', 'ecommerce-hub' ); ?> <span><?php esc_html_e( '20% off', 'ecommerce-hub' ); ?></span> <?php esc_html_e( 'on Premium Theme with the discount code: ', 'ecommerce-hub' ); ?> <span><?php esc_html_e( '" Get20 "', 'ecommerce-hub' ); ?></span></div>
		</div>
		<div class="started">
			<h3><?php esc_html_e( 'Lite Theme Info', 'ecommerce-hub' ); ?></h3>
			<p><?php esc_html_e( 'Ecommerce Hub is a stylish, expressive, engaging, versatile and contemporary WordPress eCommerce theme made to serve diverse range of eCommerce websites like apparel and fashion accessories store, cosmetic shop, sports shop, jewellery store, furniture house, mobile and gadget store, grocery store, home decor store, multipurpose online shop and many more. This multipurpose ecommerce theme is supported by WooCommerce plugin which gives many beautiful shop layouts and easy and secure payment gateways to set up a fully functional website within minutes. It will provide a never before online presence to your website and will help you establish yourself in the ecommerce world without any fuss. The theme is extremely easy to use with smooth navigation throughout the website. It is responsive, cross-browser compatible, multilingual, RTL supportive and SEO ready. Social media icons will do the needful of publicising your website on different networking platforms. It is built from scratch to get a bug-free site. Ecommerce Hub has generously used banners and sliders to make the site more attractive and stylish. It offers easy customization through theme customizer which eliminates the need of any coding knowledge. Although it is loaded with features but it is feathery light to load. ', 'ecommerce-hub')?></p>
			<hr>
			<h3><?php esc_html_e( 'Help Docs', 'ecommerce-hub' ); ?></h3>
			<ul>
				<p><?php esc_html_e( 'Ecommerce Hub', 'ecommerce-hub' ); ?> <a href="<?php echo esc_url( ECOMMERCE_HUB_THEMESGLANCE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'ecommerce-hub' ); ?></a></p>
			</ul>
			<hr>
			<h3><?php esc_html_e( 'Get started with Ecommerce Hub Theme', 'ecommerce-hub' ); ?></h3>
			<div class="col-left-inner"> 
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/free-screenshot.png" alt="" />
			</div>		
			<div class="col-right-inner">
				<p><?php esc_html_e( 'Go to', 'ecommerce-hub' ); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizer', 'ecommerce-hub' ); ?> </a> <?php esc_html_e( 'and start customizing your website', 'ecommerce-hub' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'Easily customizable ', 'ecommerce-hub' ); ?> </li>
					<li><?php esc_html_e( 'Absolutely free', 'ecommerce-hub' ); ?> </li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-right">
		<div class="col-left-area">
			<h3><?php esc_html_e('Premium Theme Information', 'ecommerce-hub'); ?></h3>
			<hr>
		</div>
		<div class="centerbold">
			<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/responsive.png" alt="" />
			<hr class="firsthr">
			<a href="<?php echo esc_url( ECOMMERCE_HUB_THEMESGLANCE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'ecommerce-hub'); ?></a>
			<a href="<?php echo esc_url( ECOMMERCE_HUB_THEMESGLANCE_PRO_THEME_URL ); ?>"><?php esc_html_e('Buy Pro', 'ecommerce-hub'); ?></a>
			<a href="<?php echo esc_url( ECOMMERCE_HUB_THEMESGLANCE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'ecommerce-hub'); ?></a>
			<hr class="secondhr">
		</div>
		<h3><?php esc_html_e( 'PREMIUM THEME FEATURES', 'ecommerce-hub'); ?></h3>
		<ul>
		 	<li><?php esc_html_e( 'Slider with unlimited slides', 'ecommerce-hub'); ?></li>
		 	<li><?php esc_html_e( 'Custom Posttype for "testimonial" listing', 'ecommerce-hub'); ?></li>
		 	<li><?php esc_html_e( 'product Categories Section', 'ecommerce-hub'); ?></li>
		 	<li><?php esc_html_e( 'Multiple Products Section', 'ecommerce-hub'); ?></li>
		 	<li><?php esc_html_e( 'Promo section', 'ecommerce-hub'); ?></li>
		 	<li><?php esc_html_e( 'Latest News Section', 'ecommerce-hub'); ?></li>
		 	<li><?php esc_html_e( 'About Section', 'ecommerce-hub'); ?></li>
		 	<li><?php esc_html_e( 'Partner/Sponser listing', 'ecommerce-hub'); ?></li>
		 	<li><?php esc_html_e( 'Social Icon widget', 'ecommerce-hub'); ?></li>
		 	<li><?php esc_html_e( 'Blog Post section on home', 'ecommerce-hub'); ?></li>
		 	<li><?php esc_html_e( 'Newsletter with contact form 7', 'ecommerce-hub'); ?></li>
		 	<li><?php esc_html_e( 'Woocommerce Product section on home', 'ecommerce-hub'); ?></li>
		 	<li><?php esc_html_e( 'Record Section', 'ecommerce-hub'); ?></li>
		 	<li><?php esc_html_e( 'Contact widget for footer', 'ecommerce-hub'); ?></li>
		 	<li><?php esc_html_e( 'Contact page Template', 'ecommerce-hub'); ?></li>
		 	<li><?php esc_html_e( 'Recent Post Widget with thumbnails', 'ecommerce-hub'); ?></li>
		 	<li><?php esc_html_e( 'Blog full width, With Left and Right sidebar Template', 'ecommerce-hub'); ?></li>
		</ul>
	</div>
	<div class="service">
		<div class="col-lg-3 col-md-3">
			<h3><span class="dashicons dashicons-media-document"></span> <?php esc_html_e('Get Support', 'ecommerce-hub'); ?></h3>
			<ol>
				<li>
				<a href="<?php echo esc_url( ECOMMERCE_HUB_THEMESGLANCE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'ecommerce-hub'); ?></a>
				</li>
			</ol>
		</div>
		<div class="col-lg-3 col-md-3">
			<h3><span class="dashicons dashicons-welcome-widgets-menus"></span> <?php esc_html_e('Getting Started', 'ecommerce-hub'); ?></h3>
			<ol>
				<li> <?php esc_html_e('Start', 'ecommerce-hub'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'ecommerce-hub'); ?></a> <?php esc_html_e('your website.', 'ecommerce-hub'); ?></li>
			</ol>
		</div>
		<div class="col-lg-3 col-md-3">
			<h3><span class="dashicons dashicons-star-filled"></span> <?php esc_html_e('Rate This Theme', 'ecommerce-hub'); ?></h3>
			<ol>
				<li>
				<a href="<?php echo esc_url( ECOMMERCE_HUB_THEMESGLANCE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Rate it here', 'ecommerce-hub'); ?></a>
				</li>
			</ol>
		</div>
		<div class="col-lg-3 col-md-3">
			<h3><span class="dashicons dashicons-editor-help"></span> <?php esc_html_e( 'Help Docs', 'ecommerce-hub' ); ?></h3>
			<ol>
				<li><?php esc_html_e( 'Ecommerce Hub Lite', 'ecommerce-hub' ); ?> <a href="<?php echo esc_url( ECOMMERCE_HUB_THEMESGLANCE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'ecommerce-hub' ); ?></a></li>
			</ol>
		</div>
	</div>
</div>
<?php } ?>