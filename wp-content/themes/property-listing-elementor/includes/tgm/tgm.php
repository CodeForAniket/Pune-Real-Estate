<?php
	
require get_template_directory() . '/includes/tgm/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 */
function property_listing_elementor_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Kirki Customizer Framework', 'property-listing-elementor' ),
			'slug'             => 'kirki',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'WPElemento Importer', 'property-listing-elementor' ),
			'slug'             => 'wpelemento-importer',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Easy Property Listings', 'property-listing-elementor' ),
			'slug'             => 'easy-property-listings',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	property_listing_elementor_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'property_listing_elementor_register_recommended_plugins' );
