<?php
/**
 * Flydecor Theme Customizer
 *
 * @package Flydecor
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function flydecor_customize_register( $wp_customize ) {
	
function flydecor_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
	
	$wp_customize->get_setting( 'blogname' )->photobook_lite         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->photobook_lite  = 'postMessage';
		
	$wp_customize->add_setting('color_scheme', array(
		'default' => '#e63a4a',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','flydecor'),
			'description'	=> __('Select color from here.','flydecor'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	$wp_customize->add_setting('topheaderbg-color', array(
		'default' => '#000000',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'topheaderbg-color',array(
			'description'	=> __('Select background color for top header.','flydecor'),
			'section' => 'colors',
			'settings' => 'topheaderbg-color'
		))
	);
	
	$wp_customize->add_setting('headerbg-color', array(
		'default' => '#2e2e2e',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'headerbg-color',array(
			'description'	=> __('Select background color for header.','flydecor'),
			'section' => 'colors',
			'settings' => 'headerbg-color'
		))
	);
	
	$wp_customize->add_setting('footer-color', array(
		'default' => '#000000',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'footer-color',array(
			'description'	=> __('Select background color for footer.','flydecor'),
			'section' => 'colors',
			'settings' => 'footer-color'
		))
	);
	
	// Slider Section Start		
	$wp_customize->add_section(
        'slider_section',
        array(
            'title' => __('Slider Settings', 'flydecor'),
            'priority' => null,
			'description'	=> __('Recommended image size (1420x567). Slider will work only when you select the static front page.','flydecor'),	
        )
    );
	
	$wp_customize->add_setting('page-setting7',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','flydecor'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting8',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','flydecor'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting9',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','flydecor'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('slide_text',array(
		'default'	=> __('Read More','flydecor'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('slide_text',array(
		'label'	=> __('Add slider link button text.','flydecor'),
		'section'	=> 'slider_section',
		'setting'	=> 'slide_text',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('hide_slider',array(
			'default' => true,
			'sanitize_callback' => 'flydecor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_slider', array(
		   'settings' => 'hide_slider',
    	   'section'   => 'slider_section',
    	   'label'     => __('Check this to hide slider.','flydecor'),
    	   'type'      => 'checkbox'
     ));	
	
	// Slider Section End
	
	// Homepage Section Start		
	$wp_customize->add_section(
        'homepage_section',
        array(
            'title' => __('Welcome Section', 'flydecor'),
            'priority' => null,
			'description'	=> __('Select pages for Welcome Section. This section will be displayed only when you select the static front page.','flydecor'),	
        )
    );	
	
	$wp_customize->add_setting('page-setting1',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for welcome section','flydecor'),
			'section'	=> 'homepage_section'
	));	
	
	
	$wp_customize->add_setting('hide_section',array(
			'default' => true,
			'sanitize_callback' => 'flydecor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_section', array(
		   'settings' => 'hide_section',
    	   'section'   => 'homepage_section',
    	   'label'     => __('Check this to hide section.','flydecor'),
    	   'type'      => 'checkbox'
     ));
	 
// Contact Section

	$wp_customize->add_section(
        'tophead_section',
        array(
            'title' => __('Top Header', 'flydecor'),
            'priority' => null,
			'description'	=> __('Add top header info here.','flydecor'),	
        )
    );
	
	$wp_customize->add_setting('welcome-txt',array(
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('welcome-txt',array(
			'type'	=> 'text',
			'label'	=> __('Add welcome text here.','flydecor'),
			'section'	=> 'tophead_section'
	));
	
	$wp_customize->add_setting('facebook',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('facebook',array(
			'type'	=> 'url',
			'label'	=> __('Add facebook link here.','flydecor'),
			'section'	=> 'tophead_section'
	));
	
	$wp_customize->add_setting('twitter',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitter',array(
			'type'	=> 'url',
			'label'	=> __('Add twitter link here.','flydecor'),
			'section'	=> 'tophead_section'
	));
	
	$wp_customize->add_setting('linkedin',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('linkedin',array(
			'type'	=> 'url',
			'label'	=> __('Add linkedin link here.','flydecor'),
			'section'	=> 'tophead_section'
	));
	
	$wp_customize->add_setting('instagram',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('instagram',array(
			'type'	=> 'url',
			'label'	=> __('Add instagram link here.','flydecor'),
			'section'	=> 'tophead_section'
	));	
	
	$wp_customize->add_setting('call-txt',array(
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('call-txt',array(
			'type'	=> 'text',
			'label'	=> __('Add phone number here.','flydecor'),
			'section'	=> 'tophead_section'
	));
	
	$wp_customize->add_setting('email-txt',array(
			'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('email-txt',array(
			'type'	=> 'text',
			'label'	=> __('Add email here.','flydecor'),
			'section'	=> 'tophead_section'
	));
	
	$wp_customize->add_setting('hide_tophead',array(
			'default' => true,
			'sanitize_callback' => 'flydecor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_tophead', array(
		   'settings' => 'hide_tophead',
    	   'section'   => 'tophead_section',
    	   'label'     => __('Check this to hide section.','flydecor'),
    	   'type'      => 'checkbox'
     ));
	
}
add_action( 'customize_register', 'flydecor_customize_register' );	

function flydecor_css(){
		?>
        <style>
				a, 
				.tm_client strong,
				.postmeta a:hover,
				#sidebar ul li a:hover,
				.blog-post h3.entry-title,
				a.blog-more:hover,
				#commentform input#submit,
				input.search-submit,
				.nivo-controlNav a.active,
				.blog-date .date,
				a.read-more,
				.section-box .sec-left a,
				.sitenav ul li a:hover{
					color:<?php echo esc_attr(get_theme_mod('color_scheme','#e63a4a')); ?>;
				}
				h3.widget-title,
				.nav-links .current,
				.nav-links a:hover,
				p.form-submit input[type="submit"],
				.home-content a,
				.social a:hover{
					background-color:<?php echo esc_attr(get_theme_mod('color_scheme','#e63a4a')); ?>;
				}
				#header,
				.sitenav ul li.menu-item-has-children:hover > ul,
				.sitenav ul li.menu-item-has-children:focus > ul,
				.sitenav ul li.menu-item-has-children.focus > ul{
					background-color:<?php echo esc_attr(get_theme_mod('headerbg-color','#2e2e2e')); ?>;
				}
				.top-header{
					background-color:<?php echo esc_attr(get_theme_mod('topheaderbg-color','#000000')); ?>;
				}
				.copyright-wrapper{
					background-color:<?php echo esc_attr(get_theme_mod('footer-color','#000000')); ?>;
				}
				#slider .top-bar a.slide-button{
					background-color: <?php echo esc_attr(get_theme_mod('color_scheme','#e63a4a')); ?>;
				}
				#slider .top-bar a.slide-button:hover{
					background-color:<?php echo esc_attr(get_theme_mod('color_scheme','#e63a4a')); ?>;
					color: #ffffff;
				}
				
		</style>
	<?php }
add_action('wp_head','flydecor_css');

function flydecor_customize_preview_js() {
	wp_enqueue_script( 'flydecor-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'flydecor_customize_preview_js' );