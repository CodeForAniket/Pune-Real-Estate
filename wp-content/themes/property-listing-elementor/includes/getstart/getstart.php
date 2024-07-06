<?php
//about theme info
add_action( 'admin_menu', 'property_listing_elementor_gettingstarted' );
function property_listing_elementor_gettingstarted() {
	add_theme_page( esc_html__('Property Listing Elementor', 'property-listing-elementor'), esc_html__('Property Listing Elementor', 'property-listing-elementor'), 'edit_theme_options', 'property_listing_elementor_about', 'property_listing_elementor_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function property_listing_elementor_admin_theme_style() {
	wp_enqueue_style('property-listing-elementor-custom-admin-style', esc_url(get_template_directory_uri()) . '/includes/getstart/getstart.css');
	wp_enqueue_script('property-listing-elementor-tabs', esc_url(get_template_directory_uri()) . '/includes/getstart/js/tab.js');
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
}
add_action('admin_enqueue_scripts', 'property_listing_elementor_admin_theme_style');

// Changelog
if ( ! defined( 'PROPERTY_LISTING_ELEMENTOR_CHANGELOG_URL' ) ) {
    define( 'PROPERTY_LISTING_ELEMENTOR_CHANGELOG_URL', get_template_directory() . '/readme.txt' );
}

function property_listing_elementor_changelog_screen() {	
	global $wp_filesystem;
	$property_listing_elementor_changelog_file = apply_filters( 'property_listing_elementor_changelog_file', PROPERTY_LISTING_ELEMENTOR_CHANGELOG_URL );
	if ( $property_listing_elementor_changelog_file && is_readable( $property_listing_elementor_changelog_file ) ) {
		WP_Filesystem();
		$property_listing_elementor_changelog = $wp_filesystem->get_contents( $property_listing_elementor_changelog_file );
		$property_listing_elementor_changelog_list = property_listing_elementor_parse_changelog( $property_listing_elementor_changelog );
		echo wp_kses_post( $property_listing_elementor_changelog_list );
	}
}

function property_listing_elementor_parse_changelog( $property_listing_elementor_content ) {
	$property_listing_elementor_content = explode ( '== ', $property_listing_elementor_content );
	$property_listing_elementor_changelog_isolated = '';
	foreach ( $property_listing_elementor_content as $key => $property_listing_elementor_value ) {
		if (strpos( $property_listing_elementor_value, 'Changelog ==') === 0) {
	    	$property_listing_elementor_changelog_isolated = str_replace( 'Changelog ==', '', $property_listing_elementor_value );
	    }
	}
	$property_listing_elementor_changelog_array = explode( '= ', $property_listing_elementor_changelog_isolated );
	unset( $property_listing_elementor_changelog_array[0] );
	$property_listing_elementor_changelog = '<div class="changelog">';
	foreach ( $property_listing_elementor_changelog_array as $property_listing_elementor_value) {
		$property_listing_elementor_value = preg_replace( '/\n+/', '</span><span>', $property_listing_elementor_value );
		$property_listing_elementor_value = '<div class="block"><span class="heading">= ' . $property_listing_elementor_value . '</span></div><hr>';
		$property_listing_elementor_changelog .= str_replace( '<span></span>', '', $property_listing_elementor_value );
	}
	$property_listing_elementor_changelog .= '</div>';
	return wp_kses_post( $property_listing_elementor_changelog );
}

//guidline for about theme
function property_listing_elementor_mostrar_guide() { 
	//custom function about theme customizer
	$property_listing_elementor_return = add_query_arg( array()) ;
	$property_listing_elementor_theme = wp_get_theme( 'property-listing-elementor' );
?>

    <div class="top-head">
		<div class="top-title">
			<h2><?php esc_html_e( 'Property Listing Elementor', 'property-listing-elementor' ); ?></h2>
		</div>
		<div class="top-right">
			<span class="version"><?php esc_html_e( 'Version', 'property-listing-elementor' ); ?>: <?php echo esc_html($property_listing_elementor_theme['Version']);?></span>
		</div>
    </div>

    <div class="inner-cont">

	    <div class="tab-sec">
	    	<div class="tab">
				<button class="tablinks" onclick="property_listing_elementor_open_tab(event, 'wpelemento_importer_editor')"><?php esc_html_e( 'Setup With Elementor', 'property-listing-elementor' ); ?></button>
				<button class="tablinks" onclick="property_listing_elementor_open_tab(event, 'setup_customizer')"><?php esc_html_e( 'Setup With Customizer', 'property-listing-elementor' ); ?></button>
				<button class="tablinks" onclick="property_listing_elementor_open_tab(event, 'changelog_cont')"><?php esc_html_e( 'Changelog', 'property-listing-elementor' ); ?></button>
			</div>

			<div id="wpelemento_importer_editor" class="tabcontent open">
				<?php if(!class_exists('WPElemento_Importer_ThemeWhizzie')){
					$property_listing_elementor_plugin_ins = Property_Listing_Elementor_Plugin_Activation_WPElemento_Importer::get_instance();
					$property_listing_elementor_actions = $property_listing_elementor_plugin_ins->property_listing_elementor_recommended_actions;
					?>
					<div class="property-listing-elementor-recommended-plugins ">
							<div class="property-listing-elementor-action-list">
								<?php if ($property_listing_elementor_actions): foreach ($property_listing_elementor_actions as $property_listing_elementor_key => $property_listing_elementor_actionValue): ?>
										<div class="property-listing-elementor-action" id="<?php echo esc_attr($property_listing_elementor_actionValue['id']);?>">
											<div class="action-inner plugin-activation-redirect">
												<h3 class="action-title"><?php echo esc_html($property_listing_elementor_actionValue['title']); ?></h3>
												<div class="action-desc"><?php echo esc_html($property_listing_elementor_actionValue['desc']); ?></div>
												<?php echo wp_kses_post($property_listing_elementor_actionValue['link']); ?>
											</div>
										</div>
									<?php endforeach;
								endif; ?>
							</div>
					</div>
				<?php }else{ ?>
					<div class="tab-outer-box">
						<h3><?php esc_html_e('Welcome to WPElemento Theme!', 'property-listing-elementor'); ?></h3>
						<p><?php esc_html_e('Click on the quick start button to import the demo.', 'property-listing-elementor'); ?></p>
						<div class="info-link">
							<a  href="<?php echo esc_url( admin_url('admin.php?page=wpelementoimporter-wizard') ); ?>"><?php esc_html_e('Quick Start', 'property-listing-elementor'); ?></a>
						</div>
					</div>
				<?php } ?>
			</div>

			<div id="setup_customizer" class="tabcontent">
				<div class="tab-outer-box">
				  	<div class="lite-theme-inner">
						<h3><?php esc_html_e('Theme Customizer', 'property-listing-elementor'); ?></h3>
						<p><?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'property-listing-elementor'); ?></p>
						<div class="info-link">
							<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'property-listing-elementor'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Help Docs', 'property-listing-elementor'); ?></h3>
						<p><?php esc_html_e('The complete procedure to configure and manage a WordPress Website from the beginning is shown in this documentation .', 'property-listing-elementor'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( PROPERTY_LISTING_ELEMENTOR_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'property-listing-elementor'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Need Support?', 'property-listing-elementor'); ?></h3>
						<p><?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'property-listing-elementor'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( PROPERTY_LISTING_ELEMENTOR_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'property-listing-elementor'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Reviews & Testimonials', 'property-listing-elementor'); ?></h3>
						<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'property-listing-elementor'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( PROPERTY_LISTING_ELEMENTOR_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'property-listing-elementor'); ?></a>
						</div>
						<hr>
						<div class="link-customizer">
							<h3><?php esc_html_e( 'Link to customizer', 'property-listing-elementor' ); ?></h3>
							<div class="first-row">
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','property-listing-elementor'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','property-listing-elementor'); ?></a>
									</div>
								</div>
							
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=header_image') ); ?>" target="_blank"><?php esc_html_e('Header Image','property-listing-elementor'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','property-listing-elementor'); ?></a>
									</div>
								</div>
							</div>
						</div>
				  	</div>
				</div>
			</div>

			<div id="changelog_cont" class="tabcontent">
				<div class="tab-outer-box">
					<?php property_listing_elementor_changelog_screen(); ?>
				</div>
			</div>
			
		</div>

		<div class="inner-side-content">
			<h2><?php esc_html_e('Premium Theme', 'property-listing-elementor'); ?></h2>
			<div class="tab-outer-box">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
				<h3><?php esc_html_e('Property Listing Elementor WordPress Theme', 'property-listing-elementor'); ?></h3>
				<div class="iner-sidebar-pro-btn">
					<span class="premium-btn"><a href="<?php echo esc_url( PROPERTY_LISTING_ELEMENTOR_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Premium', 'property-listing-elementor'); ?></a>
					</span>
					<span class="demo-btn"><a href="<?php echo esc_url( PROPERTY_LISTING_ELEMENTOR_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'property-listing-elementor'); ?></a>
					</span>
					<span class="doc-btn"><a href="<?php echo esc_url( PROPERTY_LISTING_ELEMENTOR_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e('Theme Bundle', 'property-listing-elementor'); ?></a>
					</span>
				</div>
				<hr>
				<div class="premium-coupon">
					<div class="premium-features">
						<h3><?php esc_html_e('premium Features', 'property-listing-elementor'); ?></h3>
						<ul>
							<li><?php esc_html_e( 'Multilingual', 'property-listing-elementor' ); ?></li>
							<li><?php esc_html_e( 'Drag and drop features', 'property-listing-elementor' ); ?></li>
							<li><?php esc_html_e( 'Zero Coding Required', 'property-listing-elementor' ); ?></li>
							<li><?php esc_html_e( 'Mobile Friendly Layout', 'property-listing-elementor' ); ?></li>
							<li><?php esc_html_e( 'Responsive Layout', 'property-listing-elementor' ); ?></li>
							<li><?php esc_html_e( 'Unique Designs', 'property-listing-elementor' ); ?></li>
						</ul>
					</div>
					<div class="coupon-box">
						<h3><?php esc_html_e('Use Coupon Code', 'property-listing-elementor'); ?></h3>
						<a class="coupon-btn" href="<?php echo esc_url( PROPERTY_LISTING_ELEMENTOR_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('UPGRADE NOW', 'property-listing-elementor'); ?></a>
						<div class="coupon-container">
							<h3><?php esc_html_e( 'elemento20', 'property-listing-elementor' ); ?></h3>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>

<?php } ?>