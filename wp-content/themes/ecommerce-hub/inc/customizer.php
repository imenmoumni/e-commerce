<?php
/**
 * Ecommerce Hub Theme Customizer
 * @package Ecommerce Hub
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function ecommerce_hub_customize_register( $wp_customize ) {

	class Ecommerce_Hub_WP_Customize_Range_Control extends WP_Customize_Control{
	    public $type = 'custom_range';
	    public function enqueue(){
	        wp_enqueue_script(
	            'cs-range-control',
	            false,
	            true
	        );
	    }
	    public function render_content(){?>
	        <label>
	            <?php if ( ! empty( $this->label )) : ?>
	                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
	            <?php endif; ?>
	            <div class="cs-range-value"><?php echo esc_html($this->value()); ?></div>
	            <input data-input-type="range" type="range" <?php $this->input_attrs(); ?> value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?> />
	            <?php if ( ! empty( $this->description )) : ?>
	                <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
	            <?php endif; ?>
	        </label>
        <?php }
	}		

	//add home page setting pannel
	$wp_customize->add_panel( 'ecommerce_hub_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'ecommerce-hub' ),
	    'description' => __( 'Description of what this panel does.', 'ecommerce-hub' ),
	) );

	// Add the Theme Color Option section.
	$wp_customize->add_section( 'ecommerce_hub_theme_color_option', array( 
		'panel' => 'ecommerce_hub_panel_id', 
		'title' => esc_html__( 'Global Color Settings', 'ecommerce-hub' ) 
	) );

  	$wp_customize->add_setting( 'ecommerce_hub_first_theme_color', array(
	    'default' => '#00d5d0',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecommerce_hub_first_theme_color', array(
  		'label' => 'Color Option',
	    'description' => __('One can change complete theme global color settings on just one click.', 'ecommerce-hub'),
	    'section' => 'ecommerce_hub_theme_color_option',
	    'settings' => 'ecommerce_hub_first_theme_color',
  	)));

	// font array
	$ecommerce_hub_font_array = array(
        '' => 'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' => 'Acme',
        'Anton' => 'Anton',
        'Architects Daughter' => 'Architects Daughter',
        'Arimo' => 'Arimo',
        'Arsenal' => 'Arsenal', 
        'Arvo' => 'Arvo',
        'Alegreya' => 'Alegreya',
        'Alfa Slab One' => 'Alfa Slab One',
        'Averia Serif Libre' => 'Averia Serif Libre',
        'Bangers' => 'Bangers', 
        'Boogaloo' => 'Boogaloo',
        'Bad Script' => 'Bad Script',
        'Bitter' => 'Bitter',
        'Bree Serif' => 'Bree Serif',
        'BenchNine' => 'BenchNine', 
        'Cabin' => 'Cabin', 
        'Cardo' => 'Cardo',
        'Courgette' => 'Courgette',
        'Cherry Swash' => 'Cherry Swash',
        'Cormorant Garamond' => 'Cormorant Garamond',
        'Crimson Text' => 'Crimson Text',
        'Cuprum' => 'Cuprum', 
        'Cookie' => 'Cookie', 
        'Chewy' => 'Chewy', 
        'Days One' => 'Days One', 
        'Dosis' => 'Dosis',
        'Droid Sans' => 'Droid Sans',
        'Economica' => 'Economica',
        'Fredoka One' => 'Fredoka One',
        'Fjalla One' => 'Fjalla One',
        'Francois One' => 'Francois One',
        'Frank Ruhl Libre' => 'Frank Ruhl Libre',
        'Gloria Hallelujah' => 'Gloria Hallelujah',
        'Great Vibes' => 'Great Vibes',
        'Handlee' => 'Handlee', 
        'Hammersmith One' => 'Hammersmith One',
        'Inconsolata' => 'Inconsolata', 
        'Indie Flower' => 'Indie Flower', 
        'IM Fell English SC' => 'IM Fell English SC', 
        'Julius Sans One' => 'Julius Sans One',
        'Josefin Slab' => 'Josefin Slab', 
        'Josefin Sans' => 'Josefin Sans', 
        'Kanit' => 'Kanit', 
        'Lobster' => 'Lobster', 
        'Lato' => 'Lato',
        'Lora' => 'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather', 
        'Monda' => 'Monda',
        'Montserrat' => 'Montserrat',
        'Muli' => 'Muli', 
        'Marck Script' => 'Marck Script',
        'Noto Serif' => 'Noto Serif',
        'Open Sans' => 'Open Sans', 
        'Overpass' => 'Overpass',
        'Overpass Mono' => 'Overpass Mono',
        'Oxygen' => 'Oxygen', 
        'Orbitron' => 'Orbitron', 
        'Patua One' => 'Patua One', 
        'Pacifico' => 'Pacifico',
        'Padauk' => 'Padauk', 
        'Playball' => 'Playball',
        'Playfair Display' => 'Playfair Display', 
        'PT Sans' => 'PT Sans',
        'Philosopher' => 'Philosopher',
        'Permanent Marker' => 'Permanent Marker',
        'Poiret One' => 'Poiret One', 
        'Quicksand' => 'Quicksand', 
        'Quattrocento Sans' => 'Quattrocento Sans', 
        'Raleway' => 'Raleway', 
        'Rubik' => 'Rubik', 
        'Rokkitt' => 'Rokkitt', 
        'Russo One' => 'Russo One', 
        'Righteous' => 'Righteous', 
        'Slabo' => 'Slabo', 
        'Source Sans Pro' => 'Source Sans Pro', 
        'Shadows Into Light Two' =>'Shadows Into Light Two', 
        'Shadows Into Light' => 'Shadows Into Light', 
        'Sacramento' => 'Sacramento', 
        'Shrikhand' => 'Shrikhand', 
        'Tangerine' => 'Tangerine',
        'Ubuntu' => 'Ubuntu', 
        'VT323' => 'VT323', 
        'Varela Round' => 'Varela Round', 
        'Vampiro One' => 'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' => 'Volkhov', 
        'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
    );

	//Typography
	$wp_customize->add_section( 'ecommerce_hub_typography', array(
    	'title'      => __( 'Typography', 'ecommerce-hub' ),
		'priority'   => 30,
		'panel' => 'ecommerce_hub_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'ecommerce_hub_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecommerce_hub_paragraph_color', array(
		'label' => __('Paragraph Color', 'ecommerce-hub'),
		'section' => 'ecommerce_hub_typography',
		'settings' => 'ecommerce_hub_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('ecommerce_hub_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'ecommerce_hub_sanitize_choices'
	));
	$wp_customize->add_control(
	    'ecommerce_hub_paragraph_font_family', array(
	    'section'  => 'ecommerce_hub_typography',
	    'label'    => __( 'Paragraph Fonts','ecommerce-hub'),
	    'type'     => 'select',
	    'choices'  => $ecommerce_hub_font_array,
	));

	$wp_customize->add_setting('ecommerce_hub_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('ecommerce_hub_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_typography',
		'setting'	=> 'ecommerce_hub_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'ecommerce_hub_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecommerce_hub_atag_color', array(
		'label' => __('"a" Tag Color', 'ecommerce-hub'),
		'section' => 'ecommerce_hub_typography',
		'settings' => 'ecommerce_hub_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('ecommerce_hub_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'ecommerce_hub_sanitize_choices'
	));
	$wp_customize->add_control(
	    'ecommerce_hub_atag_font_family', array(
	    'section'  => 'ecommerce_hub_typography',
	    'label'    => __( '"a" Tag Fonts','ecommerce-hub'),
	    'type'     => 'select',
	    'choices'  => $ecommerce_hub_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'ecommerce_hub_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecommerce_hub_li_color', array(
		'label' => __('"li" Tag Color', 'ecommerce-hub'),
		'section' => 'ecommerce_hub_typography',
		'settings' => 'ecommerce_hub_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('ecommerce_hub_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'ecommerce_hub_sanitize_choices'
	));
	$wp_customize->add_control(
	    'ecommerce_hub_li_font_family', array(
	    'section'  => 'ecommerce_hub_typography',
	    'label'    => __( '"li" Tag Fonts','ecommerce-hub'),
	    'type'     => 'select',
	    'choices'  => $ecommerce_hub_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'ecommerce_hub_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecommerce_hub_h1_color', array(
		'label' => __('H1 Color', 'ecommerce-hub'),
		'section' => 'ecommerce_hub_typography',
		'settings' => 'ecommerce_hub_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('ecommerce_hub_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'ecommerce_hub_sanitize_choices'
	));
	$wp_customize->add_control(
	    'ecommerce_hub_h1_font_family', array(
	    'section'  => 'ecommerce_hub_typography',
	    'label'    => __( 'H1 Fonts','ecommerce-hub'),
	    'type'     => 'select',
	    'choices'  => $ecommerce_hub_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('ecommerce_hub_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('ecommerce_hub_h1_font_size',array(
		'label'	=> __('H1 Font Size','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_typography',
		'setting'	=> 'ecommerce_hub_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'ecommerce_hub_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecommerce_hub_h2_color', array(
		'label' => __('h2 Color', 'ecommerce-hub'),
		'section' => 'ecommerce_hub_typography',
		'settings' => 'ecommerce_hub_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('ecommerce_hub_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'ecommerce_hub_sanitize_choices'
	));
	$wp_customize->add_control(
	    'ecommerce_hub_h2_font_family', array(
	    'section'  => 'ecommerce_hub_typography',
	    'label'    => __( 'h2 Fonts','ecommerce-hub'),
	    'type'     => 'select',
	    'choices'  => $ecommerce_hub_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('ecommerce_hub_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('ecommerce_hub_h2_font_size',array(
		'label'	=> __('h2 Font Size','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_typography',
		'setting'	=> 'ecommerce_hub_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'ecommerce_hub_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecommerce_hub_h3_color', array(
		'label' => __('h3 Color', 'ecommerce-hub'),
		'section' => 'ecommerce_hub_typography',
		'settings' => 'ecommerce_hub_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('ecommerce_hub_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'ecommerce_hub_sanitize_choices'
	));
	$wp_customize->add_control(
	    'ecommerce_hub_h3_font_family', array(
	    'section'  => 'ecommerce_hub_typography',
	    'label'    => __( 'h3 Fonts','ecommerce-hub'),
	    'type'     => 'select',
	    'choices'  => $ecommerce_hub_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('ecommerce_hub_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('ecommerce_hub_h3_font_size',array(
		'label'	=> __('h3 Font Size','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_typography',
		'setting'	=> 'ecommerce_hub_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'ecommerce_hub_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecommerce_hub_h4_color', array(
		'label' => __('h4 Color', 'ecommerce-hub'),
		'section' => 'ecommerce_hub_typography',
		'settings' => 'ecommerce_hub_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('ecommerce_hub_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'ecommerce_hub_sanitize_choices'
	));
	$wp_customize->add_control(
	    'ecommerce_hub_h4_font_family', array(
	    'section'  => 'ecommerce_hub_typography',
	    'label'    => __( 'h4 Fonts','ecommerce-hub'),
	    'type'     => 'select',
	    'choices'  => $ecommerce_hub_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('ecommerce_hub_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('ecommerce_hub_h4_font_size',array(
		'label'	=> __('h4 Font Size','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_typography',
		'setting'	=> 'ecommerce_hub_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'ecommerce_hub_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecommerce_hub_h5_color', array(
		'label' => __('h5 Color', 'ecommerce-hub'),
		'section' => 'ecommerce_hub_typography',
		'settings' => 'ecommerce_hub_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('ecommerce_hub_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'ecommerce_hub_sanitize_choices'
	));
	$wp_customize->add_control(
	    'ecommerce_hub_h5_font_family', array(
	    'section'  => 'ecommerce_hub_typography',
	    'label'    => __( 'h5 Fonts','ecommerce-hub'),
	    'type'     => 'select',
	    'choices'  => $ecommerce_hub_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('ecommerce_hub_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('ecommerce_hub_h5_font_size',array(
		'label'	=> __('h5 Font Size','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_typography',
		'setting'	=> 'ecommerce_hub_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'ecommerce_hub_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecommerce_hub_h6_color', array(
		'label' => __('h6 Color', 'ecommerce-hub'),
		'section' => 'ecommerce_hub_typography',
		'settings' => 'ecommerce_hub_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('ecommerce_hub_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'ecommerce_hub_sanitize_choices'
	));
	$wp_customize->add_control(
	    'ecommerce_hub_h6_font_family', array(
	    'section'  => 'ecommerce_hub_typography',
	    'label'    => __( 'h6 Fonts','ecommerce-hub'),
	    'type'     => 'select',
	    'choices'  => $ecommerce_hub_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('ecommerce_hub_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('ecommerce_hub_h6_font_size',array(
		'label'	=> __('h6 Font Size','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_typography',
		'setting'	=> 'ecommerce_hub_h6_font_size',
		'type'	=> 'text'
	));

    //Social Icons(topbar)
	$wp_customize->add_section('ecommerce_hub_social_media',array(
		'title'	=> __('Social Icon','ecommerce-hub'),
		'description'	=> __('Add Header Content here','ecommerce-hub'),
		'priority'	=> null,
		'panel' => 'ecommerce_hub_panel_id',
	));

	$wp_customize->add_setting('ecommerce_hub_facebook',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('ecommerce_hub_facebook',array(
		'label'	=> __('Add Facebook link','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_social_media',
		'setting'	=> 'ecommerce_hub_facebook',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('ecommerce_hub_pintrest',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('ecommerce_hub_pintrest',array(
		'label'	=> __('Add Pintrest link','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_social_media',
		'setting'	=> 'ecommerce_hub_pintrest',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('ecommerce_hub_rss',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('ecommerce_hub_rss',array(
		'label'	=> __('Add RSS link','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_social_media',
		'setting'	=> 'ecommerce_hub_rss',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('ecommerce_hub_twitter',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('ecommerce_hub_twitter',array(
		'label'	=> __('Add Twitter link','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_social_media',
		'setting'	=> 'ecommerce_hub_twitter',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('ecommerce_hub_youtube',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('ecommerce_hub_youtube',array(
		'label'	=> __('Add Youtube link','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_social_media',
		'setting'	=> 'ecommerce_hub_youtube',
		'type'	=> 'url'
	));

	$wp_customize->add_setting( 'ecommerce_hub_social_icons_font_size', array(
		'default'=> '12',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Ecommerce_Hub_WP_Customize_Range_Control( $wp_customize, 'ecommerce_hub_social_icons_font_size', array(
        'label'  => __('Social Icons Font Size','ecommerce-hub'),
        'section'  => 'ecommerce_hub_social_media',
        'description' => __('Measurement is in pixel.','ecommerce-hub'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));

	//Topbar section
	$wp_customize->add_section('ecommerce_hub_topbar_icon',array(
		'title'	=> __('Topbar Section','ecommerce-hub'),
		'description'	=> __('Add Header Content here','ecommerce-hub'),
		'priority'	=> null,
		'panel' => 'ecommerce_hub_panel_id',
	));

	$wp_customize->add_setting('ecommerce_hub_top_header',array(
       'default' => true,
       'sanitize_callback'	=> 'ecommerce_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('ecommerce_hub_top_header',array(
       'type' => 'checkbox',
       'label' => __('Enable Top Header','ecommerce-hub'),
       'section' => 'ecommerce_hub_topbar_icon'
    ));

    $wp_customize->add_setting('ecommerce_hub_topbar_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('ecommerce_hub_topbar_padding',array(
		'label'	=> esc_html__('Topbar Padding','ecommerce-hub'),
		'section'=> 'ecommerce_hub_topbar_icon',
	));

    $wp_customize->add_setting('ecommerce_hub_top_topbar_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'ecommerce_hub_sanitize_float'
	));
	$wp_customize->add_control('ecommerce_hub_top_topbar_padding',array(
		'description'	=> __('Top','ecommerce-hub'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'ecommerce_hub_topbar_icon',
		'type'=> 'number',
	));

	$wp_customize->add_setting('ecommerce_hub_bottom_topbar_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'ecommerce_hub_sanitize_float'
	));
	$wp_customize->add_control('ecommerce_hub_bottom_topbar_padding',array(
		'description'	=> __('Bottom','ecommerce-hub'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'ecommerce_hub_topbar_icon',
		'type'=> 'number',
	));

    $wp_customize->add_setting('ecommerce_hub_sticky_header',array(
       'default' => '',
       'sanitize_callback'	=> 'ecommerce_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('ecommerce_hub_sticky_header',array(
       'type' => 'checkbox',
       'label' => __('Stick header on Desktop','ecommerce-hub'),
       'section' => 'ecommerce_hub_topbar_icon'
    ));

    $wp_customize->add_setting('ecommerce_hub_sticky_header_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('ecommerce_hub_sticky_header_padding',array(
		'label'	=> esc_html__('Sticky Header Padding','ecommerce-hub'),
		'section'=> 'ecommerce_hub_topbar_icon',
		'type' => 'hidden',
	));

    $wp_customize->add_setting('ecommerce_hub_top_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'ecommerce_hub_sanitize_float'
	));
	$wp_customize->add_control('ecommerce_hub_top_sticky_header_padding',array(
		'description'	=> __('Top','ecommerce-hub'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'ecommerce_hub_topbar_icon',
		'type'=> 'number'
	));

	$wp_customize->add_setting('ecommerce_hub_bottom_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'ecommerce_hub_sanitize_float'
	));
	$wp_customize->add_control('ecommerce_hub_bottom_sticky_header_padding',array(
		'description'	=> __('Bottom','ecommerce-hub'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'ecommerce_hub_topbar_icon',
		'type'=> 'number'
	));

	$wp_customize->add_setting('ecommerce_hub_search_placeholder',array(
       'default' => __('Search','ecommerce-hub'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('ecommerce_hub_search_placeholder',array(
       'type' => 'text',
       'label' => __('Search Placeholder text','ecommerce-hub'),
       'section' => 'ecommerce_hub_topbar_icon'
    ));

	$wp_customize->add_setting('ecommerce_hub_welcome',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ecommerce_hub_welcome',array(
		'label'	=> __('Add welcome Text','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_topbar_icon',
		'setting'	=> 'ecommerce_hub_welcome',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('ecommerce_hub_email_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ecommerce_hub_email_text',array(
		'label'	=> __('Add Email Text','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_topbar_icon',
		'setting'	=> 'ecommerce_hub_email_text',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('ecommerce_hub_email',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_email'
	));	
	$wp_customize->add_control('ecommerce_hub_email',array(
		'label'	=> __('Add Email Address','ecommerce-hub'),
		'section' => 'ecommerce_hub_topbar_icon',
		'setting' => 'ecommerce_hub_email',
		'type'	 => 'text'
	));

	$wp_customize->add_setting('ecommerce_hub_call_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ecommerce_hub_call_text',array(
		'label'	=> __('Add Contact Text','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_topbar_icon',
		'setting'	=> 'ecommerce_hub_call_text',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('ecommerce_hub_call_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'ecommerce_hub_sanitize_phone_number'
	));	
	$wp_customize->add_control('ecommerce_hub_call_number',array(
		'label'	=> __('Add Contact Number','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_topbar_icon',
		'setting'	=> 'ecommerce_hub_call_number',
		'type'		=> 'text'
	));

	$wp_customize->add_section('ecommerce_hub_header',array(
		'title'	=> __('Header','ecommerce-hub'),
		'priority'	=> null,
		'panel' => 'ecommerce_hub_panel_id',
	));

	$wp_customize->add_setting('ecommerce_hub_menu_case',array(
        'default' => 'capitalize',
        'sanitize_callback' => 'ecommerce_hub_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_hub_menu_case',array(
        'type' => 'select',
        'label' => __('Menu Case','ecommerce-hub'),
        'section' => 'ecommerce_hub_header',
        'choices' => array(
            'uppercase' => __('Uppercase','ecommerce-hub'),
            'capitalize' => __('Capitalize','ecommerce-hub'),
        ),
	) );

	$wp_customize->add_setting( 'ecommerce_hub_menu_font_size', array(
		'default'=> '14',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Ecommerce_Hub_WP_Customize_Range_Control( $wp_customize, 'ecommerce_hub_menu_font_size', array(
        'label'  => __('Menu Font Size','ecommerce-hub'),
        'section'  => 'ecommerce_hub_header',
        'description' => __('Measurement is in pixel.','ecommerce-hub'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));

	//home page slider
	$wp_customize->add_section( 'ecommerce_hub_slider_section' , array(
    	'title'     => __( 'Slider Settings', 'ecommerce-hub' ),
		'priority'   => null,
		'panel' => 'ecommerce_hub_panel_id'
	) );

	$wp_customize->add_setting('ecommerce_hub_slider_hide',array(
       'default' => false,
       'sanitize_callback'	=> 'ecommerce_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('ecommerce_hub_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','ecommerce-hub'),
       'section' => 'ecommerce_hub_slider_section',
    ));

    $wp_customize->add_setting('ecommerce_hub_slider_indicator',array(
        'default' => true,
        'sanitize_callback'	=> 'ecommerce_hub_sanitize_checkbox'
	));
	$wp_customize->add_control('ecommerce_hub_slider_indicator',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider Indicators','ecommerce-hub'),
      	'section' => 'ecommerce_hub_slider_section'
	));

	$wp_customize->add_setting('ecommerce_hub_slider_title',array(
        'default' => true,
        'sanitize_callback'	=> 'ecommerce_hub_sanitize_checkbox'
	));
	$wp_customize->add_control('ecommerce_hub_slider_title',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider Title','ecommerce-hub'),
      	'section' => 'ecommerce_hub_slider_section'
	));

	$wp_customize->add_setting('ecommerce_hub_slider_button',array(
        'default' => true,
        'sanitize_callback'	=> 'ecommerce_hub_sanitize_checkbox'
	));
	$wp_customize->add_control('ecommerce_hub_slider_button',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider Button','ecommerce-hub'),
      	'section' => 'ecommerce_hub_slider_section'
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'ecommerce_hub_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'ecommerce_hub_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'ecommerce_hub_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'ecommerce-hub' ),
			'section'  => 'ecommerce_hub_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting( 'ecommerce_hub_slider_speed', array(
		'default'              => 3000,
		'sanitize_callback'	=> 'ecommerce_hub_sanitize_float'
	) );
	$wp_customize->add_control( 'ecommerce_hub_slider_speed', array(
		'label'       => esc_html__( 'Slider Speed','ecommerce-hub' ),
		'section'     => 'ecommerce_hub_slider_section',
		'type'        => 'number',
		'settings'    => 'ecommerce_hub_slider_speed',
		'input_attrs' => array(
			'step'             => 500,
			'min'              => 500,
			'max'              => 5000,
		),
	) );

	//content Alignment
    $wp_customize->add_setting('ecommerce_hub_slider_alignment_option',array(
    'default' => 'Left Align',
        'sanitize_callback' => 'ecommerce_hub_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_hub_slider_alignment_option',array(
        'type' => 'radio',
        'label' => __('Slider Content Alignment','ecommerce-hub'),
        'section' => 'ecommerce_hub_slider_section',
        'choices' => array(
            'Center Align' => __('Center Align','ecommerce-hub'),
            'Left Align' => __('Left Align','ecommerce-hub'),
            'Right Align' => __('Right Align','ecommerce-hub'),
        ),
	) );

	$wp_customize->add_setting('ecommerce_hub_slider_image_overlay',array(
        'default' => true,
        'sanitize_callback'	=> 'ecommerce_hub_sanitize_checkbox'
	));
	$wp_customize->add_control('ecommerce_hub_slider_image_overlay',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider Image Overlay','ecommerce-hub'),
      	'section' => 'ecommerce_hub_slider_section',
	));

	$wp_customize->add_setting( 'ecommerce_hub_slider_overlay_color', array(
	    'default' => '#fff',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecommerce_hub_slider_overlay_color', array(
	    'label' => __('Slider Overlay Color', 'ecommerce-hub'),
	    'section' => 'ecommerce_hub_slider_section',
  	)));

	//Opacity
	$wp_customize->add_setting('ecommerce_hub_slider_opacity_color',array(
      'default'              => 0.7,
      'sanitize_callback' => 'ecommerce_hub_sanitize_choices'
	));
	$wp_customize->add_control( 'ecommerce_hub_slider_opacity_color', array(
		'label'       => esc_html__( 'Slider Image Opacity','ecommerce-hub' ),
		'section'     => 'ecommerce_hub_slider_section',
		'type'        => 'select',
		'settings'    => 'ecommerce_hub_slider_opacity_color',
		'choices' => array(
	      '0' =>  esc_attr('0','ecommerce-hub'),
	      '0.1' =>  esc_attr('0.1','ecommerce-hub'),
	      '0.2' =>  esc_attr('0.2','ecommerce-hub'),
	      '0.3' =>  esc_attr('0.3','ecommerce-hub'),
	      '0.4' =>  esc_attr('0.4','ecommerce-hub'),
	      '0.5' =>  esc_attr('0.5','ecommerce-hub'),
	      '0.6' =>  esc_attr('0.6','ecommerce-hub'),
	      '0.7' =>  esc_attr('0.7','ecommerce-hub'),
	      '0.8' =>  esc_attr('0.8','ecommerce-hub'),
	      '0.9' =>  esc_attr('0.9','ecommerce-hub')
		),
	));

	$wp_customize->add_setting( 'ecommerce_hub_slider_button_label', array(
		'default' => __('SHOP NOW','ecommerce-hub' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'ecommerce_hub_slider_button_label', array(
		'label' => esc_html__( 'Slider Button Label','ecommerce-hub' ),
		'section'     => 'ecommerce_hub_slider_section',
		'type'        => 'text',
		'settings'    => 'ecommerce_hub_slider_button_label'
	) );

	//Featured Products Section
	$wp_customize->add_section('ecommerce_hub_featured_products',array(
		'title'	=> __('Featured Products','ecommerce-hub'),
		'description'	=> __('Add Featured Products sections below.','ecommerce-hub'),
		'panel' => 'ecommerce_hub_panel_id',
	));

	$wp_customize->add_setting('ecommerce_hub_page_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ecommerce_hub_page_title',array(
		'label'	=> __('Section Title','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_featured_products',
		'type'		=> 'text'
	));

    $wp_customize->add_setting( 'ecommerce_hub_feature_page', array(
      'default'           => '',
      'sanitize_callback' => 'ecommerce_hub_sanitize_dropdown_pages'
    ));
    $wp_customize->add_control( 'ecommerce_hub_feature_page', array(
      'label'    => __( 'Select Page', 'ecommerce-hub' ),
      'section'  => 'ecommerce_hub_featured_products',
      'type'     => 'dropdown-pages'
    ));

	//layout setting
	$wp_customize->add_section( 'ecommerce_hub_theme_layout', array(
    	'title'    => __( 'Blog Settings', 'ecommerce-hub' ),
		'priority'   => null,
		'panel' => 'ecommerce_hub_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('ecommerce_hub_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'ecommerce_hub_sanitize_choices'	        
	) );
	$wp_customize->add_control('ecommerce_hub_layout',array(
        'type' => 'radio',
        'label' => __( 'Blog Layout', 'ecommerce-hub' ),
        'section' => 'ecommerce_hub_theme_layout',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','ecommerce-hub'),
            'Right Sidebar' => __('Right Sidebar','ecommerce-hub'),
            'One Column' => __('One Column','ecommerce-hub'),
            'Three Columns' => __('Three Columns','ecommerce-hub'),
            'Four Columns' => __('Four Columns','ecommerce-hub'),
            'Grid Layout' => __('Grid Layout','ecommerce-hub')
        ),
	));

    $wp_customize->add_setting('ecommerce_hub_metafields_date',array(
       'default' => 'true',
       'sanitize_callback'	=> 'ecommerce_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('ecommerce_hub_metafields_date',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Date ','ecommerce-hub'),
       'section' => 'ecommerce_hub_theme_layout'
    ));

    $wp_customize->add_setting('ecommerce_hub_metafields_author',array(
       'default' => 'true',
       'sanitize_callback'	=> 'ecommerce_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('ecommerce_hub_metafields_author',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Author','ecommerce-hub'),
       'section' => 'ecommerce_hub_theme_layout'
    ));

    $wp_customize->add_setting('ecommerce_hub_metafields_comment',array(
       'default' => 'true',
       'sanitize_callback'	=> 'ecommerce_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('ecommerce_hub_metafields_comment',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Comments','ecommerce-hub'),
       'section' => 'ecommerce_hub_theme_layout'
    ));

    $wp_customize->add_setting('ecommerce_hub_post_navigation',array(
       'default' => 'true',
       'sanitize_callback' => 'ecommerce_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('ecommerce_hub_post_navigation',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Post Navigation','ecommerce-hub'),
       'section' => 'ecommerce_hub_theme_layout'
    ));

    $wp_customize->add_setting('ecommerce_hub_blog_post_content',array(
    	'default' => 'Excerpt Content',
        'sanitize_callback' => 'ecommerce_hub_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_hub_blog_post_content',array(
        'type' => 'radio',
        'label' => __('Blog Post Content Type','ecommerce-hub'),
        'section' => 'ecommerce_hub_theme_layout',
        'choices' => array(
            'No Content' => __('No Content','ecommerce-hub'),
            'Full Content' => __('Full Content','ecommerce-hub'),
            'Excerpt Content' => __('Excerpt Content','ecommerce-hub'),
        ),
	) );

    $wp_customize->add_setting( 'ecommerce_hub_post_excerpt_number', array(
		'default'              => 20,
        'sanitize_callback'	=> 'ecommerce_hub_sanitize_float'
	) );
	$wp_customize->add_control( 'ecommerce_hub_post_excerpt_number', array(
		'label'       => esc_html__( 'Blog Post Excerpt Number (Max 50)','ecommerce-hub' ),
		'section'     => 'ecommerce_hub_theme_layout',
		'type'        => 'number',
		'settings'    => 'ecommerce_hub_post_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
		'active_callback' => 'ecommerce_hub_excerpt_enabled'
	) );

	$wp_customize->add_setting( 'ecommerce_hub_button_excerpt_suffix', array(
		'default'   => '...',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'ecommerce_hub_button_excerpt_suffix', array(
		'label'       => esc_html__( 'Post Excerpt Suffix','ecommerce-hub' ),
		'section'     => 'ecommerce_hub_theme_layout',
		'type'        => 'text',
		'settings'    => 'ecommerce_hub_button_excerpt_suffix',
		'active_callback' => 'ecommerce_hub_excerpt_enabled'
	) );

	$wp_customize->add_setting( 'ecommerce_hub_feature_image_border_radius', array(
		'default'=> '0',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Ecommerce_Hub_WP_Customize_Range_Control( $wp_customize, 'ecommerce_hub_feature_image_border_radius', array(
        'label'  => __('Featured Image Border Radius','ecommerce-hub'),
        'section'  => 'ecommerce_hub_theme_layout',
        'description' => __('Measurement is in pixel.','ecommerce-hub'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        ),
    )));

    $wp_customize->add_setting( 'ecommerce_hub_feature_image_shadow', array(
		'default'=> '0',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Ecommerce_Hub_WP_Customize_Range_Control( $wp_customize, 'ecommerce_hub_feature_image_shadow', array(
        'label'  => __('Featured Image Shadow','ecommerce-hub'),
        'section'  => 'ecommerce_hub_theme_layout',
        'description' => __('Measurement is in pixel.','ecommerce-hub'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        ),
    )));

    $wp_customize->add_setting( 'ecommerce_hub_pagination_type', array(
        'default'			=> 'page-numbers',
        'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control( 'ecommerce_hub_pagination_type', array(
        'section' => 'ecommerce_hub_theme_layout',
        'type' => 'select',
        'label' => __( 'Blog Pagination Style', 'ecommerce-hub' ),
        'choices'		=> array(
            'page-numbers'  => __( 'Number', 'ecommerce-hub' ),
            'next-prev' => __( 'Next/Prev', 'ecommerce-hub' ),
    )));

    $wp_customize->add_setting('ecommerce_hub_blog_nav_position',array(
        'default' => 'bottom',
        'sanitize_callback' => 'ecommerce_hub_sanitize_choices'
    ));
	$wp_customize->add_control('ecommerce_hub_blog_nav_position', array(
        'type' => 'select',
        'label' => __( 'Blog Post Navigation Position', 'ecommerce-hub' ),
        'section' => 'ecommerce_hub_theme_layout',
        'choices' => array(
            'top' => __('Top','ecommerce-hub'),
            'bottom' => __('Bottom','ecommerce-hub'),
            'both' => __('Both','ecommerce-hub')
        ),
    ));

	$wp_customize->add_section( 'ecommerce_hub_single_post_settings', array(
		'title' => __( 'Single Post Options', 'ecommerce-hub' ),
		'panel' => 'ecommerce_hub_panel_id',
	));

	$wp_customize->add_setting('ecommerce_hub_single_post_breadcrumb',array(
       'default' => 'true',
       'sanitize_callback' => 'ecommerce_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('ecommerce_hub_single_post_breadcrumb',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Breadcrumb','ecommerce-hub'),
       'section' => 'ecommerce_hub_single_post_settings'
    ));

	$wp_customize->add_setting('ecommerce_hub_single_post_date',array(
       'default' => 'true',
       'sanitize_callback'	=> 'ecommerce_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('ecommerce_hub_single_post_date',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Date','ecommerce-hub'),
       'section' => 'ecommerce_hub_single_post_settings'
    ));

    $wp_customize->add_setting('ecommerce_hub_single_post_author',array(
       'default' => 'true',
       'sanitize_callback'	=> 'ecommerce_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('ecommerce_hub_single_post_author',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Author','ecommerce-hub'),
       'section' => 'ecommerce_hub_single_post_settings'
    ));

    $wp_customize->add_setting('ecommerce_hub_single_post_comment_no',array(
       'default' => 'true',
       'sanitize_callback'	=> 'ecommerce_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('ecommerce_hub_single_post_comment_no',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Comment Number','ecommerce-hub'),
       'section' => 'ecommerce_hub_single_post_settings'
    ));

	$wp_customize->add_setting('ecommerce_hub_metafields_tags',array(
       'default' => 'true',
       'sanitize_callback'	=> 'ecommerce_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('ecommerce_hub_metafields_tags',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Tags','ecommerce-hub'),
       'section' => 'ecommerce_hub_single_post_settings'
    ));

    $wp_customize->add_setting('ecommerce_hub_single_post_image',array(
       'default' => 'true',
       'sanitize_callback'	=> 'ecommerce_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('ecommerce_hub_single_post_image',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Featured Image','ecommerce-hub'),
       'section' => 'ecommerce_hub_single_post_settings'
    ));

    $wp_customize->add_setting( 'ecommerce_hub_post_featured_image', array(
        'default' => 'in-content',
        'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control( 'ecommerce_hub_post_featured_image', array(
        'section' => 'ecommerce_hub_single_post_settings',
        'type' => 'radio',
        'label' => __( 'Featured Image Display Type', 'ecommerce-hub' ),
        'choices'		=> array(
            'banner'  => __('as Banner Image', 'ecommerce-hub'),
            'in-content' => __( 'as Featured Image', 'ecommerce-hub' ),
    )));

    $wp_customize->add_setting('ecommerce_hub_single_post_nav',array(
       'default' => 'true',
       'sanitize_callback'	=> 'ecommerce_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('ecommerce_hub_single_post_nav',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Navigation','ecommerce-hub'),
       'section' => 'ecommerce_hub_single_post_settings'
    ));

    $wp_customize->add_setting( 'ecommerce_hub_single_post_prev_nav_text', array(
		'default' => __('Previous','ecommerce-hub' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'ecommerce_hub_single_post_prev_nav_text', array(
		'label' => esc_html__( 'Single Post Previous Nav text','ecommerce-hub' ),
		'section'     => 'ecommerce_hub_single_post_settings',
		'type'        => 'text',
		'settings'    => 'ecommerce_hub_single_post_prev_nav_text'
	) );

	$wp_customize->add_setting( 'ecommerce_hub_single_post_next_nav_text', array(
		'default' => __('Next','ecommerce-hub' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'ecommerce_hub_single_post_next_nav_text', array(
		'label' => esc_html__( 'Single Post Next Nav text','ecommerce-hub' ),
		'section'     => 'ecommerce_hub_single_post_settings',
		'type'        => 'text',
		'settings'    => 'ecommerce_hub_single_post_next_nav_text'
	) );

    $wp_customize->add_setting('ecommerce_hub_single_post_comment',array(
       'default' => 'true',
       'sanitize_callback'	=> 'ecommerce_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('ecommerce_hub_single_post_comment',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post comment','ecommerce-hub'),
       'section' => 'ecommerce_hub_single_post_settings'
    ));

	$wp_customize->add_setting( 'ecommerce_hub_comment_width', array(
		'default'=> '100',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Ecommerce_Hub_WP_Customize_Range_Control( $wp_customize, 'ecommerce_hub_comment_width', array(
        'label'  => __('Comment textarea width','ecommerce-hub'),
        'section'  => 'ecommerce_hub_single_post_settings',
        'description' => __('Measurement is in %.','ecommerce-hub'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 100,
        ),
    )));

    $wp_customize->add_setting('ecommerce_hub_comment_title',array(
       'default' => __('Leave a Reply','ecommerce-hub'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('ecommerce_hub_comment_title',array(
       'type' => 'text',
       'label' => __('Comment form Title','ecommerce-hub'),
       'section' => 'ecommerce_hub_single_post_settings'
    ));

    $wp_customize->add_setting('ecommerce_hub_comment_submit_text',array(
       'default' => __('Post Comment','ecommerce-hub'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('ecommerce_hub_comment_submit_text',array(
       'type' => 'text',
       'label' => __('Comment Submit Button Label','ecommerce-hub'),
       'section' => 'ecommerce_hub_single_post_settings'
    ));

	$wp_customize->add_setting('ecommerce_hub_related_posts',array(
       'default' => true,
       'sanitize_callback'	=> 'ecommerce_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('ecommerce_hub_related_posts',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Related Posts','ecommerce-hub'),
       'section' => 'ecommerce_hub_single_post_settings'
    ));

    $wp_customize->add_setting('ecommerce_hub_related_posts_title',array(
       'default' => __('You May Also Like','ecommerce-hub'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('ecommerce_hub_related_posts_title',array(
       'type' => 'text',
       'label' => __('Related Posts Title','ecommerce-hub'),
       'section' => 'ecommerce_hub_single_post_settings'
    ));

    $wp_customize->add_setting( 'ecommerce_hub_related_post_count', array(
		'default' => 3,
		'sanitize_callback'	=> 'ecommerce_hub_sanitize_float'
	) );
	$wp_customize->add_control( 'ecommerce_hub_related_post_count', array(
		'label' => esc_html__( 'Related Posts Count','ecommerce-hub' ),
		'section' => 'ecommerce_hub_single_post_settings',
		'type' => 'number',
		'settings' => 'ecommerce_hub_related_post_count',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 6,
		),
	) );

    $wp_customize->add_setting( 'ecommerce_hub_post_shown_by', array(
        'default' => 'categories',
        'sanitize_callback'	=> 'ecommerce_hub_sanitize_choices'
    ));
    $wp_customize->add_control( 'ecommerce_hub_post_shown_by', array(
        'section' => 'ecommerce_hub_single_post_settings',
        'type' => 'radio',
        'label' => __( 'Related Posts must be shown:', 'ecommerce-hub' ),
        'choices'		=> array(
            'categories' => __('By Categories', 'ecommerce-hub'),
            'tags' => __( 'By Tags', 'ecommerce-hub' ),
    )));

	// Button option
	$wp_customize->add_section( 'ecommerce_hub_button_options', array(
		'title' =>  __( 'Button Options', 'ecommerce-hub' ),
		'panel' => 'ecommerce_hub_panel_id',
	));

    $wp_customize->add_setting( 'ecommerce_hub_blog_button_text', array(
		'default'   => __('Read Full','ecommerce-hub'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'ecommerce_hub_blog_button_text', array(
		'label'       => esc_html__( 'Blog Post Button Label','ecommerce-hub' ),
		'section'     => 'ecommerce_hub_button_options',
		'type'        => 'text',
		'settings'    => 'ecommerce_hub_blog_button_text'
	) );

	$wp_customize->add_setting('ecommerce_hub_button_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('ecommerce_hub_button_padding',array(
		'label'	=> esc_html__('Button Padding','ecommerce-hub'),
		'section'=> 'ecommerce_hub_button_options',
		'active_callback' => 'ecommerce_hub_button_enabled'
	));

	$wp_customize->add_setting('ecommerce_hub_top_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'ecommerce_hub_sanitize_float'
	));
	$wp_customize->add_control('ecommerce_hub_top_button_padding',array(
		'label'	=> __('Top','ecommerce-hub'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'ecommerce_hub_button_options',
		'type'=> 'number',
		'active_callback' => 'ecommerce_hub_button_enabled'
	));

	$wp_customize->add_setting('ecommerce_hub_bottom_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'ecommerce_hub_sanitize_float'
	));
	$wp_customize->add_control('ecommerce_hub_bottom_button_padding',array(
		'label'	=> __('Bottom','ecommerce-hub'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'ecommerce_hub_button_options',
		'type'=> 'number',
		'active_callback' => 'ecommerce_hub_button_enabled'
	));

	$wp_customize->add_setting('ecommerce_hub_left_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'ecommerce_hub_sanitize_float'
	));
	$wp_customize->add_control('ecommerce_hub_left_button_padding',array(
		'label'	=> __('Left','ecommerce-hub'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'ecommerce_hub_button_options',
		'type'=> 'number',
		'active_callback' => 'ecommerce_hub_button_enabled'
	));

	$wp_customize->add_setting('ecommerce_hub_right_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'ecommerce_hub_sanitize_float'
	));
	$wp_customize->add_control('ecommerce_hub_right_button_padding',array(
		'label'	=> __('Right','ecommerce-hub'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'ecommerce_hub_button_options',
		'type'=> 'number',
		'active_callback' => 'ecommerce_hub_button_enabled'
	));

	$wp_customize->add_setting( 'ecommerce_hub_button_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Ecommerce_Hub_WP_Customize_Range_Control( $wp_customize, 'ecommerce_hub_button_border_radius', array(
        'label'  => __('Border Radius','ecommerce-hub'),
        'section'  => 'ecommerce_hub_button_options',
        'description' => __('Measurement is in pixel.','ecommerce-hub'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        ),
		'active_callback' => 'ecommerce_hub_button_enabled'
    )));

    //Sidebar setting
	$wp_customize->add_section( 'ecommerce_hub_sidebar_options', array(
    	'title'   => __( 'Sidebar options', 'ecommerce-hub' ),
		'priority'   => null,
		'panel' => 'ecommerce_hub_panel_id'
	) );

	$wp_customize->add_setting('ecommerce_hub_single_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'ecommerce_hub_sanitize_choices'
    ));
	$wp_customize->add_control('ecommerce_hub_single_page_layout', array(
        'type' => 'select',
        'label' => __( 'Single Page Layout', 'ecommerce-hub' ),
        'section' => 'ecommerce_hub_sidebar_options',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','ecommerce-hub'),
            'Right Sidebar' => __('Right Sidebar','ecommerce-hub'),
            'One Column' => __('One Column','ecommerce-hub')
        ),
    ));

    $wp_customize->add_setting('ecommerce_hub_single_post_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'ecommerce_hub_sanitize_choices'
    ));
	$wp_customize->add_control('ecommerce_hub_single_post_layout', array(
        'type' => 'select',
        'label' => __( 'Single Post Layout', 'ecommerce-hub' ),
        'section' => 'ecommerce_hub_sidebar_options',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','ecommerce-hub'),
            'Right Sidebar' => __('Right Sidebar','ecommerce-hub'),
            'One Column' => __('One Column','ecommerce-hub')
        ),
    ));

    //Advance Options
	$wp_customize->add_section( 'ecommerce_hub_advance_options', array(
    	'title' => __( 'Advance Options', 'ecommerce-hub' ),
		'priority'   => null,
		'panel' => 'ecommerce_hub_panel_id'
	) );

	$wp_customize->add_setting('ecommerce_hub_preloader',array(
       'default' => 'true',
       'sanitize_callback'	=> 'ecommerce_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('ecommerce_hub_preloader',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Preloader','ecommerce-hub'),
       'section' => 'ecommerce_hub_advance_options'
    ));

    $wp_customize->add_setting( 'ecommerce_hub_preloader_color', array(
	    'default' => '#333333',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecommerce_hub_preloader_color', array(
  		'label' => __('Preloader Color', 'ecommerce-hub'),
	    'section' => 'ecommerce_hub_advance_options',
	    'settings' => 'ecommerce_hub_preloader_color',
  	)));

  	$wp_customize->add_setting( 'ecommerce_hub_preloader_bg_color', array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ecommerce_hub_preloader_bg_color', array(
  		'label' => __('Preloader Background Color', 'ecommerce-hub'),
	    'section' => 'ecommerce_hub_advance_options',
	    'settings' => 'ecommerce_hub_preloader_bg_color',
  	)));

  	$wp_customize->add_setting('ecommerce_hub_preloader_type',array(
        'default' => 'Square',
        'sanitize_callback' => 'ecommerce_hub_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_hub_preloader_type',array(
        'type' => 'radio',
        'label' => __('Preloader Type','ecommerce-hub'),
        'section' => 'ecommerce_hub_advance_options',
        'choices' => array(
            'Square' => __('Square','ecommerce-hub'),
            'Circle' => __('Circle','ecommerce-hub'),
        ),
	) );

	$wp_customize->add_setting('ecommerce_hub_theme_layout_options',array(
        'default' => 'Default Theme',
        'sanitize_callback' => 'ecommerce_hub_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_hub_theme_layout_options',array(
        'type' => 'radio',
        'label' => __('Theme Layout','ecommerce-hub'),
        'section' => 'ecommerce_hub_advance_options',
        'choices' => array(
            'Default Theme' => __('Default Theme','ecommerce-hub'),
            'Container Theme' => __('Container Theme','ecommerce-hub'),
            'Box Container Theme' => __('Box Container Theme','ecommerce-hub'),
        ),
	) );

	//404 Page Option
	$wp_customize->add_section('ecommerce_hub_404_settings',array(
		'title'	=> __('404 Page & Search Result Settings','ecommerce-hub'),
		'priority'	=> null,
		'panel' => 'ecommerce_hub_panel_id',
	));

	$wp_customize->add_setting('ecommerce_hub_404_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ecommerce_hub_404_title',array(
		'label'	=> __('404 Title','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_404_settings',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('ecommerce_hub_404_button_label',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ecommerce_hub_404_button_label',array(
		'label'	=> __('404 button Label','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_404_settings',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('ecommerce_hub_search_result_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ecommerce_hub_search_result_title',array(
		'label'	=> __('No Search Result Title','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_404_settings',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('ecommerce_hub_search_result_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ecommerce_hub_search_result_text',array(
		'label'	=> __('No Search Result Text','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_404_settings',
		'type'		=> 'text'
	));	

	//Woocommerce Options
	$wp_customize->add_section('ecommerce_hub_woocommerce',array(
		'title'	=> __('WooCommerce Options','ecommerce-hub'),
		'panel' => 'ecommerce_hub_panel_id',
	));

	$wp_customize->add_setting('ecommerce_hub_shop_page_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'ecommerce_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('ecommerce_hub_shop_page_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable Shop Page Sidebar','ecommerce-hub'),
       'section' => 'ecommerce_hub_woocommerce'
    ));

    $wp_customize->add_setting('ecommerce_hub_shop_page_navigation',array(
       'default' => true,
       'sanitize_callback' => 'ecommerce_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('ecommerce_hub_shop_page_navigation',array(
       'type' => 'checkbox',
       'label' => __('Enable Shop Page Pagination','ecommerce-hub'),
       'section' => 'ecommerce_hub_woocommerce'
    ));

    $wp_customize->add_setting('ecommerce_hub_single_product_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'ecommerce_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('ecommerce_hub_single_product_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable Single Product Page Sidebar','ecommerce-hub'),
       'section' => 'ecommerce_hub_woocommerce'
    ));

    $wp_customize->add_setting('ecommerce_hub_single_related_products',array(
       'default' => true,
       'sanitize_callback' => 'ecommerce_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('ecommerce_hub_single_related_products',array(
       'type' => 'checkbox',
       'label' => __('Enable related Products','ecommerce-hub'),
       'section' => 'ecommerce_hub_woocommerce'
    ));

    $wp_customize->add_setting('ecommerce_hub_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'ecommerce_hub_sanitize_float'
	));
	$wp_customize->add_control('ecommerce_hub_products_per_page',array(
		'label'	=> __('Products Per Page','ecommerce-hub'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'ecommerce_hub_woocommerce',
		'type'=> 'number',
	));

	$wp_customize->add_setting('ecommerce_hub_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'ecommerce_hub_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_hub_products_per_row',array(
		'label'	=> __('Products Per Row','ecommerce-hub'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'ecommerce_hub_woocommerce',
		'type'=> 'select',
	));

	$wp_customize->add_setting('ecommerce_hub_product_border',array(
       'default' => false,
       'sanitize_callback'	=> 'ecommerce_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('ecommerce_hub_product_border',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide product border','ecommerce-hub'),
       'section' => 'ecommerce_hub_woocommerce',
    ));

    $wp_customize->add_setting('ecommerce_hub_product_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('ecommerce_hub_product_padding',array(
		'label'	=> esc_html__('Product Padding','ecommerce-hub'),
		'section'=> 'ecommerce_hub_woocommerce',
	));

	$wp_customize->add_setting( 'ecommerce_hub_product_top_padding',array(
		'default' => 0,
		'sanitize_callback' => 'ecommerce_hub_sanitize_float'
	));
	$wp_customize->add_control('ecommerce_hub_product_top_padding', array(
		'label' => esc_html__( 'Top','ecommerce-hub' ),
		'type' => 'number',
		'section' => 'ecommerce_hub_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('ecommerce_hub_product_bottom_padding',array(
		'default' => 0,
		'sanitize_callback' => 'ecommerce_hub_sanitize_float'
	));
	$wp_customize->add_control('ecommerce_hub_product_bottom_padding', array(
		'label' => esc_html__( 'Bottom','ecommerce-hub' ),
		'type' => 'number',
		'section' => 'ecommerce_hub_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('ecommerce_hub_product_left_padding',array(
		'default' => 0,
		'sanitize_callback' => 'ecommerce_hub_sanitize_float'
	));
	$wp_customize->add_control('ecommerce_hub_product_left_padding', array(
		'label' => esc_html__( 'Left','ecommerce-hub' ),
		'type' => 'number',
		'section' => 'ecommerce_hub_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'ecommerce_hub_product_right_padding',array(
		'default' => 0,
		'sanitize_callback' => 'ecommerce_hub_sanitize_float'
	));
	$wp_customize->add_control('ecommerce_hub_product_right_padding', array(
		'label' => esc_html__( 'Right','ecommerce-hub' ),
		'type' => 'number',
		'section' => 'ecommerce_hub_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'ecommerce_hub_product_border_radius',array(
		'default' => '0',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new Ecommerce_Hub_WP_Customize_Range_Control( $wp_customize, 'ecommerce_hub_product_border_radius', array(
        'label'  => __('Product Border Radius','ecommerce-hub'),
        'section'  => 'ecommerce_hub_woocommerce',
        'description' => __('Measurement is in pixel.','ecommerce-hub'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));

    $wp_customize->add_setting('ecommerce_hub_product_sale_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'ecommerce_hub_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_hub_product_sale_position',array(
        'type' => 'radio',
        'label' => __('Product Sale Position','ecommerce-hub'),
        'section' => 'ecommerce_hub_woocommerce',
        'choices' => array(
            'Left' => __('Left','ecommerce-hub'),
            'Right' => __('Right','ecommerce-hub'),
        ),
	) );

    $wp_customize->add_setting('ecommerce_hub_product_sale_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('ecommerce_hub_product_sale_padding',array(
		'label'	=> esc_html__('Product Sale Padding','ecommerce-hub'),
		'section'=> 'ecommerce_hub_woocommerce',
	));

	$wp_customize->add_setting( 'ecommerce_hub_product_sale_top_padding',array(
		'default' => 0,
		'sanitize_callback' => 'ecommerce_hub_sanitize_float'
	));
	$wp_customize->add_control('ecommerce_hub_product_sale_top_padding', array(
		'label' => esc_html__( 'Top','ecommerce-hub' ),
		'type' => 'number',
		'section' => 'ecommerce_hub_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('ecommerce_hub_product_sale_bottom_padding',array(
		'default' => 0,
		'sanitize_callback' => 'ecommerce_hub_sanitize_float'
	));
	$wp_customize->add_control('ecommerce_hub_product_sale_bottom_padding', array(
		'label' => esc_html__( 'Bottom','ecommerce-hub' ),
		'type' => 'number',
		'section' => 'ecommerce_hub_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('ecommerce_hub_product_sale_left_padding',array(
		'default' => 0,
		'sanitize_callback' => 'ecommerce_hub_sanitize_float'
	));
	$wp_customize->add_control('ecommerce_hub_product_sale_left_padding', array(
		'label' => esc_html__( 'Left','ecommerce-hub' ),
		'type' => 'number',
		'section' => 'ecommerce_hub_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('ecommerce_hub_product_sale_right_padding',array(
		'default' => 0,
		'sanitize_callback' => 'ecommerce_hub_sanitize_float'
	));
	$wp_customize->add_control('ecommerce_hub_product_sale_right_padding', array(
		'label' => esc_html__( 'Right','ecommerce-hub' ),
		'type' => 'number',
		'section' => 'ecommerce_hub_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'ecommerce_hub_product_sale_border_radius',array(
		'default' => '50',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new Ecommerce_Hub_WP_Customize_Range_Control( $wp_customize, 'ecommerce_hub_product_sale_border_radius', array(
        'label'  => __('Product Sale Border Radius','ecommerce-hub'),
        'section'  => 'ecommerce_hub_woocommerce',
        'description' => __('Measurement is in pixel.','ecommerce-hub'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));

	//footer text
	$wp_customize->add_section('ecommerce_hub_footer_section',array(
		'title'	=> __('Footer Section','ecommerce-hub'),
		'panel' => 'ecommerce_hub_panel_id'
	));

	$wp_customize->add_setting('ecommerce_hub_hide_scroll',array(
        'default' => 'true',
        'sanitize_callback'	=> 'ecommerce_hub_sanitize_checkbox'
	));
	$wp_customize->add_control('ecommerce_hub_hide_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Back To Top','ecommerce-hub'),
      	'section' => 'ecommerce_hub_footer_section',
	));

	$wp_customize->add_setting('ecommerce_hub_back_to_top',array(
        'default' => 'Right',
        'sanitize_callback' => 'ecommerce_hub_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_hub_back_to_top',array(
        'type' => 'radio',
        'label' => __('Back to Top Alignment','ecommerce-hub'),
        'section' => 'ecommerce_hub_footer_section',
        'choices' => array(
            'Left' => __('Left','ecommerce-hub'),
            'Right' => __('Right','ecommerce-hub'),
            'Center' => __('Center','ecommerce-hub'),
        ),
	) );

	$wp_customize->add_setting('ecommerce_hub_footer_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ecommerce_hub_footer_bg_color', array(
		'label'    => __('Footer Background Color', 'ecommerce-hub'),
		'section'  => 'ecommerce_hub_footer_section',
	)));

	$wp_customize->add_setting('ecommerce_hub_footer_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'ecommerce_hub_footer_bg_image',array(
        'label' => __('Footer Background Image','ecommerce-hub'),
        'section' => 'ecommerce_hub_footer_section'
	)));

	$wp_customize->add_setting('ecommerce_hub_footer_widget',array(
        'default'           => '4',
        'sanitize_callback' => 'ecommerce_hub_sanitize_choices',
    ));
    $wp_customize->add_control('ecommerce_hub_footer_widget',array(
        'type'        => 'radio',
        'label'       => __('No. of Footer columns', 'ecommerce-hub'),
        'section'     => 'ecommerce_hub_footer_section',
        'description' => __('Select the number of footer columns and add your widgets in the footer.', 'ecommerce-hub'),
        'choices' => array(
            '1'     => __('One column', 'ecommerce-hub'),
            '2'     => __('Two columns', 'ecommerce-hub'),
            '3'     => __('Three columns', 'ecommerce-hub'),
            '4'     => __('Four columns', 'ecommerce-hub')
        ),
    )); 

    $wp_customize->add_setting('ecommerce_hub_copyright_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('ecommerce_hub_copyright_padding',array(
		'label'	=> esc_html__('Copyright Padding','ecommerce-hub'),
		'section'=> 'ecommerce_hub_footer_section',
	));

    $wp_customize->add_setting('ecommerce_hub_top_copyright_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'ecommerce_hub_sanitize_float'
	));
	$wp_customize->add_control('ecommerce_hub_top_copyright_padding',array(
		'description'	=> __('Top','ecommerce-hub'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'ecommerce_hub_footer_section',
		'type'=> 'number'
	));

	$wp_customize->add_setting('ecommerce_hub_bottom_copyright_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'ecommerce_hub_sanitize_float'
	));
	$wp_customize->add_control('ecommerce_hub_bottom_copyright_padding',array(
		'description'	=> __('Bottom','ecommerce-hub'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'ecommerce_hub_footer_section',
		'type'=> 'number'
	));

	$wp_customize->add_setting('ecommerce_hub_copyright_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'ecommerce_hub_sanitize_choices'
	));
	$wp_customize->add_control('ecommerce_hub_copyright_alignment',array(
        'type' => 'radio',
        'label' => __('Copyright Alignment','ecommerce-hub'),
        'section' => 'ecommerce_hub_footer_section',
        'choices' => array(
            'left' => __('Left','ecommerce-hub'),
            'right' => __('Right','ecommerce-hub'),
            'center' => __('Center','ecommerce-hub'),
        ),
	) );

	$wp_customize->add_setting( 'ecommerce_hub_copyright_font_size', array(
		'default'=> '15',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Ecommerce_Hub_WP_Customize_Range_Control( $wp_customize, 'ecommerce_hub_copyright_font_size', array(
        'label'  => __('Copyright Font Size','ecommerce-hub'),
        'section'  => 'ecommerce_hub_footer_section',
        'description' => __('Measurement is in pixel.','ecommerce-hub'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));
	
	$wp_customize->add_setting('ecommerce_hub_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ecommerce_hub_text',array(
		'label'	=> __('Copyright Text','ecommerce-hub'),
		'description'	=> __('Add some text for footer like copyright etc.','ecommerce-hub'),
		'section'	=> 'ecommerce_hub_footer_section',
		'type'		=> 'text'
	));	
}
add_action( 'customize_register', 'ecommerce_hub_customize_register' );	

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Ecommerce_Hub_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Ecommerce_Hub_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Ecommerce_Hub_Customize_Section_Pro(
			$manager,
			'ecommerce_hub_pro_link',
				array(
				'priority'   => 9,
				'title' => esc_html__( 'Ecommerce Hub Pro', 'ecommerce-hub' ),
				'pro_text' => esc_html__( 'Go Pro', 'ecommerce-hub' ),
				'pro_url'  => esc_url('https://www.themesglance.com/themes/wordpress-ecommerce-theme/')
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'ecommerce-hub-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'ecommerce-hub-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Ecommerce_Hub_Customize::get_instance();