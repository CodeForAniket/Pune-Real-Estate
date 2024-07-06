<?php

if ( class_exists("Kirki")){

	Kirki::add_config('theme_config_id', array(
		'capability'   =>  'edit_theme_options',
		'option_type'  =>  'theme_mod',
	));

	Kirki::add_field( 'theme_config_id', [
        'type'        => 'slider',
        'settings'    => 'property_listing_elementor_logo_resizer',
        'label'       => __( 'Logo Size', 'property-listing-elementor' ),
        'section'     => 'title_tagline',
        'default'     => 150,
        'choices'     => [
            'min'   => 50,
            'max'   => 300,
            'step'  => 1,
        ],
    ] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_enable_logo_text',
		'section'     => 'title_tagline',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'property-listing-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

  	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'property_listing_elementor_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'property-listing-elementor' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'property-listing-elementor' ),
			'off' => esc_html__( 'Disable', 'property-listing-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'property_listing_elementor_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'property-listing-elementor' ),
		'section'     => 'title_tagline',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'property-listing-elementor' ),
			'off' => esc_html__( 'Disable', 'property-listing-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_site_tittle_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Title Font Size', 'property-listing-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'property_listing_elementor_site_tittle_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo a'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_site_tagline_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Tagline Font Size', 'property-listing-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'property_listing_elementor_site_tagline_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo span'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );

	// TYPOGRAPHY SETTINGS

	Kirki::add_panel( 'property_listing_elementor_typography_panel', array(
		'priority' => 10,
		'title'    => __( 'Typography', 'property-listing-elementor' ),
	) );

	//Heading 1 Section

	Kirki::add_section( 'property_listing_elementor_h1_typography_setting', array(
		'title'    => __( 'Heading 1', 'property-listing-elementor' ),
		'panel'    => 'property_listing_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_h1_typography_heading',
		'section'     => 'property_listing_elementor_h1_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 1 Typography', 'property-listing-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'property_listing_elementor_h1_typography_font',
		'section'   =>  'property_listing_elementor_h1_typography_setting',
		'default'   =>  [
			'font-family'   =>  '"Hind Madurai", sans-serif',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h1',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 2 Section

	Kirki::add_section( 'property_listing_elementor_h2_typography_setting', array(
		'title'    => __( 'Heading 2', 'property-listing-elementor' ),
		'panel'    => 'property_listing_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_h2_typography_heading',
		'section'     => 'property_listing_elementor_h2_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 2 Typography', 'property-listing-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'property_listing_elementor_h2_typography_font',
		'section'   =>  'property_listing_elementor_h2_typography_setting',
		'default'   =>  [
			'font-family'   =>  '"Hind Madurai", sans-serif',
			'font-size'       => '',
			'variant'       =>  '700',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h2',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 3 Section

	Kirki::add_section( 'property_listing_elementor_h3_typography_setting', array(
		'title'    => __( 'Heading 3', 'property-listing-elementor' ),
		'panel'    => 'property_listing_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_h3_typography_heading',
		'section'     => 'property_listing_elementor_h3_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 3 Typography', 'property-listing-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'property_listing_elementor_h3_typography_font',
		'section'   =>  'property_listing_elementor_h3_typography_setting',
		'default'   =>  [
			'font-family'   =>  '"Hind Madurai", sans-serif',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h3',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 4 Section

	Kirki::add_section( 'property_listing_elementor_h4_typography_setting', array(
		'title'    => __( 'Heading 4', 'property-listing-elementor' ),
		'panel'    => 'property_listing_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_h4_typography_heading',
		'section'     => 'property_listing_elementor_h4_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 4 Typography', 'property-listing-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'property_listing_elementor_h4_typography_font',
		'section'   =>  'property_listing_elementor_h4_typography_setting',
		'default'   =>  [
			'font-family'   =>  '"Hind Madurai", sans-serif',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h4',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 5 Section

	Kirki::add_section( 'property_listing_elementor_h5_typography_setting', array(
		'title'    => __( 'Heading 5', 'property-listing-elementor' ),
		'panel'    => 'property_listing_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_h5_typography_heading',
		'section'     => 'property_listing_elementor_h5_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 5 Typography', 'property-listing-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'property_listing_elementor_h5_typography_font',
		'section'   =>  'property_listing_elementor_h5_typography_setting',
		'default'   =>  [
			'font-family'   =>  '"Hind Madurai", sans-serif',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h5',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 6 Section

	Kirki::add_section( 'property_listing_elementor_h6_typography_setting', array(
		'title'    => __( 'Heading 6', 'property-listing-elementor' ),
		'panel'    => 'property_listing_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_h6_typography_heading',
		'section'     => 'property_listing_elementor_h6_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 6 Typography', 'property-listing-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'property_listing_elementor_h6_typography_font',
		'section'   =>  'property_listing_elementor_h6_typography_setting',
		'default'   =>  [
			'font-family'   =>  '"Hind Madurai", sans-serif',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h6',
				'suffix' => '!important'
			],
		],
	) );

	//body Typography

	Kirki::add_section( 'property_listing_elementor_body_typography_setting', array(
		'title'    => __( 'Content Typography', 'property-listing-elementor' ),
		'panel'    => 'property_listing_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_body_typography_heading',
		'section'     => 'property_listing_elementor_body_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Content  Typography', 'property-listing-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'property_listing_elementor_body_typography_font',
		'section'   =>  'property_listing_elementor_body_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'Hind Madurai', sans-serif",
			'variant'       =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   => 'body',
				'suffix' => '!important'
			],
		],
	) );


	// Theme Options Panel
	Kirki::add_panel( 'property_listing_elementor_theme_options_panel', array(
		'priority' => 10,
		'title'    => __( 'Theme Options', 'property-listing-elementor' ),
	) );

	// HEADER SECTION

	Kirki::add_section( 'property_listing_elementor_section_header', array(
	    'title'          => esc_html__( 'Header Settings', 'property-listing-elementor' ),
	    'description'    => esc_html__( 'Here you can add header information.', 'property-listing-elementor' ),
	    'panel'    => 'property_listing_elementor_theme_options_panel',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'property_listing_elementor_sticky_header',
		'label'       => esc_html__( 'Enable/Disable Sticky Header', 'property-listing-elementor' ),
		'section'     => 'property_listing_elementor_section_header',
		'default'     => 'on',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'property-listing-elementor' ),
			'off' => esc_html__( 'Disable', 'property-listing-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_enable_button_heading',
		'section'     => 'property_listing_elementor_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Button', 'property-listing-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    => esc_html__( 'Button Text', 'property-listing-elementor' ),
		'settings' => 'property_listing_elementor_header_button_text',
		'section'  => 'property_listing_elementor_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'label'    =>  esc_html__( 'Button Link', 'property-listing-elementor' ),
		'settings' => 'property_listing_elementor_header_button_url',
		'section'  => 'property_listing_elementor_section_header',
		'default'  => '',
	] );

	// WOOCOMMERCE SETTINGS

	Kirki::add_section( 'property_listing_elementor_woocommerce_settings', array(
		'title'          => esc_html__( 'Woocommerce Settings', 'property-listing-elementor' ),
		'description'    => esc_html__( 'Woocommerce Settings of themes', 'property-listing-elementor' ),
		'panel'    => 'woocommerce',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'property_listing_elementor_shop_page_sidebar',
		'label'       => esc_html__( 'Enable/Disable Shop Page Sidebar', 'property-listing-elementor' ),
		'section'     => 'property_listing_elementor_woocommerce_settings',
		'default'     => 'true',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Shop Page Layouts', 'property-listing-elementor' ),
		'settings'    => 'property_listing_elementor_shop_page_layout',
		'section'     => 'property_listing_elementor_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'property-listing-elementor' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'property-listing-elementor' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'property_listing_elementor_shop_page_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]

	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'label'       => esc_html__( 'Products Per Row', 'property-listing-elementor' ),
		'settings'    => 'property_listing_elementor_products_per_row',
		'section'     => 'property_listing_elementor_woocommerce_settings',
		'default'     => '3',
		'priority'    => 10,
		'choices'     => [
			'2' => '2',
			'3' => '3',
			'4' => '4',
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'label'       => esc_html__( 'Products Per Page', 'property-listing-elementor' ),
		'settings'    => 'property_listing_elementor_products_per_page',
		'section'     => 'property_listing_elementor_woocommerce_settings',
		'default'     => '9',
		'priority'    => 10,
		'choices'  => [
					'min'  => 0,
					'max'  => 50,
					'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'property_listing_elementor_single_product_sidebar',
		'label'       => esc_html__( 'Enable / Disable Single Product Sidebar', 'property-listing-elementor' ),
		'section'     => 'property_listing_elementor_woocommerce_settings',
		'default'     => 'true',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Single Product Layout', 'property-listing-elementor' ),
		'settings'    => 'property_listing_elementor_single_product_sidebar_layout',
		'section'     => 'property_listing_elementor_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'property-listing-elementor' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'property-listing-elementor' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'property_listing_elementor_single_product_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_products_button_border_radius_heading',
		'section'     => 'property_listing_elementor_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Products Button Border Radius', 'property-listing-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'property_listing_elementor_products_button_border_radius',
		'section'     => 'property_listing_elementor_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
		'choices'  => [
					'min'  => 1,
					'max'  => 50,
					'step' => 1,
				],
		'output' => array(
			array(
				'element'  => array('.woocommerce ul.products li.product .button',' a.checkout-button.button.alt.wc-forward','.woocommerce #respond input#submit', '.woocommerce a.button', '.woocommerce button.button','.woocommerce input.button','.woocommerce #respond input#submit.alt','.woocommerce button.button.alt','.woocommerce input.button.alt'),
				'property' => 'border-radius',
				'units' => 'px',
			),
		),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_sale_badge_position_heading',
		'section'     => 'property_listing_elementor_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sale Badge Position', 'property-listing-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'property_listing_elementor_sale_badge_position',
		'section'     => 'property_listing_elementor_woocommerce_settings',
		'default'     => 'right',
		'choices'     => [
			'right' => esc_html__( 'Right', 'property-listing-elementor' ),
			'left' => esc_html__( 'Left', 'property-listing-elementor' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_products_sale_font_size_heading',
		'section'     => 'property_listing_elementor_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sale Font Size', 'property-listing-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'text',
		'settings'    => 'property_listing_elementor_products_sale_font_size',
		'section'     => 'property_listing_elementor_woocommerce_settings',
		'priority'    => 10,
		'output' => array(
			array(
				'element'  => array('.woocommerce span.onsale','.woocommerce ul.products li.product .onsale'),
				'property' => 'font-size',
				'units' => 'px',
			),
		),
	] );
	
	//ADDITIONAL SETTINGS

	Kirki::add_section( 'property_listing_elementor_additional_setting', array(
		'title'          => esc_html__( 'Additional Settings', 'property-listing-elementor' ),
		'description'    => esc_html__( 'Additional Settings of themes', 'property-listing-elementor' ),
		'panel'    => 'property_listing_elementor_theme_options_panel',
		'priority'       => 10,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'property_listing_elementor_preloader_hide',
		'label'       => esc_html__( 'Here you can enable or disable your preloader.', 'property-listing-elementor' ),
		'section'     => 'property_listing_elementor_additional_setting',
		'default'     => '0',
		'priority'    => 10,
	] );
 
	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'property_listing_elementor_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'property-listing-elementor' ),
		'section'     => 'property_listing_elementor_additional_setting',
		'default'     => '0',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_single_page_layout_heading',
		'section'     => 'property_listing_elementor_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Single Page Layout', 'property-listing-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'property_listing_elementor_single_page_layout',
		'section'     => 'property_listing_elementor_additional_setting',
		'default'     => 'One Column',
		'choices'     => [
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'property-listing-elementor' ),
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'property-listing-elementor' ),
			'One Column' => esc_html__( 'One Column', 'property-listing-elementor' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_header_background_attachment_heading',
		'section'     => 'property_listing_elementor_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image Attachment', 'property-listing-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'property_listing_elementor_header_background_attachment',
		'section'     => 'property_listing_elementor_additional_setting',
		'default'     => 'scroll',
		'choices'     => [
			'scroll' => esc_html__( 'Scroll', 'property-listing-elementor' ),
			'fixed' => esc_html__( 'Fixed', 'property-listing-elementor' ),
		],
		'output' => array(
			array(
				'element'  => '.header-image-box',
				'property' => 'background-attachment',
			),
		),
	 ) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_header_overlay_heading',
		'section'     => 'property_listing_elementor_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image Overlay', 'property-listing-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'property_listing_elementor_header_overlay_setting',
		'label'       => __( 'Overlay Color', 'property-listing-elementor' ),
		'type'        => 'color',
		'section'     => 'property_listing_elementor_additional_setting',
		'transport' => 'auto',
		'default'     => '#00000061',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.header-image-box:before',
				'property' => 'background',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'property_listing_elementor_header_page_title',
		'label'       => esc_html__( 'Enable / Disable Header Image Page Title.', 'property-listing-elementor' ),
		'section'     => 'property_listing_elementor_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'property_listing_elementor_header_breadcrumb',
		'label'       => esc_html__( 'Enable / Disable Header Image Breadcrumb.', 'property-listing-elementor' ),
		'section'     => 'property_listing_elementor_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );

	// POST SECTION

	Kirki::add_section( 'property_listing_elementor_blog_post', array(
		'title'          => esc_html__( 'Post Settings', 'property-listing-elementor' ),
		'description'    => esc_html__( 'Here you can add post information.', 'property-listing-elementor' ),
		'panel'    => 'property_listing_elementor_theme_options_panel',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_post_layout_heading',
		'section'     => 'property_listing_elementor_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Layout', 'property-listing-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'property_listing_elementor_post_layout',
		'section'     => 'property_listing_elementor_blog_post',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'property-listing-elementor' ),
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'property-listing-elementor' ),
			'One Column' => esc_html__( 'One Column', 'property-listing-elementor' ),
			'Three Columns' => esc_html__( 'Three Columns', 'property-listing-elementor' ),
			'Four Columns' => esc_html__( 'Four Columns', 'property-listing-elementor' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'property_listing_elementor_date_hide',
		'label'       => esc_html__( 'Enable / Disable Post Date', 'property-listing-elementor' ),
		'section'     => 'property_listing_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'property_listing_elementor_author_hide',
		'label'       => esc_html__( 'Enable / Disable Post Author', 'property-listing-elementor' ),
		'section'     => 'property_listing_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'property_listing_elementor_comment_hide',
		'label'       => esc_html__( 'Enable / Disable Post Comment', 'property-listing-elementor' ),
		'section'     => 'property_listing_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'property_listing_elementor_blog_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Post Image', 'property-listing-elementor' ),
		'section'     => 'property_listing_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_length_setting_heading',
		'section'     => 'property_listing_elementor_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Post Content Limit', 'property-listing-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'property_listing_elementor_length_setting',
		'section'     => 'property_listing_elementor_blog_post',
		'default'     => '15',
		'priority'    => 10,
		'choices'  => [
					'min'  => -10,
					'max'  => 40,
		 			'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'property_listing_elementor_single_post_date_hide',
		'label'       => esc_html__( 'Enable / Disable Single Post Date', 'property-listing-elementor' ),
		'section'     => 'property_listing_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'property_listing_elementor_single_post_author_hide',
		'label'       => esc_html__( 'Enable / Disable Single Post Author', 'property-listing-elementor' ),
		'section'     => 'property_listing_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'property_listing_elementor_single_post_comment_hide',
		'label'       => esc_html__( 'Enable / Disable Single Post Comment', 'property-listing-elementor' ),
		'section'     => 'property_listing_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'label'       => esc_html__( 'Enable / Disable Single Post Tag', 'property-listing-elementor' ),
		'settings'    => 'property_listing_elementor_single_post_tag',
		'section'     => 'property_listing_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'label'       => esc_html__( 'Enable / Disable Single Post Category', 'property-listing-elementor' ),
		'settings'    => 'property_listing_elementor_single_post_category',
		'section'     => 'property_listing_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'property_listing_elementor_single_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Single Post Image', 'property-listing-elementor' ),
		'section'     => 'property_listing_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_single_post_radius',
		'section'     => 'property_listing_elementor_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Single Post Image Border Radius(px)', 'property-listing-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'property_listing_elementor_single_post_border_radius',
		'label'       => __( 'Enter a value in pixels. Example:15px', 'property-listing-elementor' ),
		'type'        => 'text',
		'section'     => 'property_listing_elementor_blog_post',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.post-img img'),
				'property' => 'border-radius',
			),
		),
	) );

	// No Results Page Settings

	Kirki::add_section( 'property_listing_elementor_no_result_section', array(
		'title'          => esc_html__( '404 & No Results Page Settings', 'property-listing-elementor' ),
		'panel'    => 'property_listing_elementor_theme_options_panel',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_page_not_found_title_heading',
		'section'     => 'property_listing_elementor_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( '404 Page Title', 'property-listing-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'property_listing_elementor_page_not_found_title',
		'section'  => 'property_listing_elementor_no_result_section',
		'default'  => esc_html__('404 Error!', 'property-listing-elementor'),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_page_not_found_text_heading',
		'section'     => 'property_listing_elementor_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( '404 Page Text', 'property-listing-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'property_listing_elementor_page_not_found_text',
		'section'  => 'property_listing_elementor_no_result_section',
		'default'  => esc_html__('The page you are looking for may have been moved, deleted, or possibly never existed.', 'property-listing-elementor'),
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'     => 'custom',
		'settings' => 'property_listing_elementor_page_not_found_line_break',
		'section'  => 'property_listing_elementor_no_result_section',
		'default'  => '<hr>',
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_no_results_title_heading',
		'section'     => 'property_listing_elementor_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'No Results Title', 'property-listing-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'property_listing_elementor_no_results_title',
		'section'  => 'property_listing_elementor_no_result_section',
		'default'  => esc_html__('Nothing Found', 'property-listing-elementor'),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_no_results_content_heading',
		'section'     => 'property_listing_elementor_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'No Results Content', 'property-listing-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'property_listing_elementor_no_results_content',
		'section'  => 'property_listing_elementor_no_result_section',
		'default'  => esc_html__('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'property-listing-elementor'),
	] );
	
	// FOOTER SECTION

	Kirki::add_section( 'property_listing_elementor_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'property-listing-elementor' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'property-listing-elementor' ),
        'panel'    => 'property_listing_elementor_theme_options_panel',
		'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_footer_text_heading',
		'section'     => 'property_listing_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'property-listing-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'property_listing_elementor_footer_text',
		'section'  => 'property_listing_elementor_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_footer_enable_heading',
		'section'     => 'property_listing_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'property-listing-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'property_listing_elementor_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'property-listing-elementor' ),
		'section'     => 'property_listing_elementor_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'property-listing-elementor' ),
			'off' => esc_html__( 'Disable', 'property-listing-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_footer_background_widget_heading',
		'section'     => 'property_listing_elementor_footer_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Widget Background', 'property-listing-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id',
	[
		'settings'    => 'property_listing_elementor_footer_background_widget',
		'type'        => 'background',
		'section'     => 'property_listing_elementor_footer_section',
		'default'     => [
			'background-color'      => 'rgba(18,18,18,1)',
			'background-image'      => '',
			'background-repeat'     => 'no-repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',
		'output'      => [
			[
				'element' => '.footer-widget',
			],
		],
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_footer_copright_color_heading',
		'section'     => 'property_listing_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Copyright Background Color', 'property-listing-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'property_listing_elementor_footer_copright_color',
		'type'        => 'color',
		'label'       => __( 'Background Color', 'property-listing-elementor' ),
		'section'     => 'property_listing_elementor_footer_section',
		'transport' => 'auto',
		'default'     => '#121212',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.footer-copyright',
				'property' => 'background',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'property_listing_elementor_footer_copright_text_color_heading',
		'section'     => 'property_listing_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Copyright Text Color', 'property-listing-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'property_listing_elementor_footer_copright_text_color',
		'type'        => 'color',
		'label'       => __( 'Text Color', 'property-listing-elementor' ),
		'section'     => 'property_listing_elementor_footer_section',
		'transport' => 'auto',
		'default'     => '#ffffff',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => array( '.footer-copyright a', '.footer-copyright p'),
				'property' => 'color',
			),
		),
	) );

}
