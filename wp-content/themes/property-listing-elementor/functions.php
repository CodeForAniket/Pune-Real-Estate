<?php
/**
 * Property Listing Elementor functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Property Listing Elementor
 */

/* Enqueue script and styles */

function property_listing_elementor_enqueue_google_fonts() {

	require_once get_theme_file_path( 'includes/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'hind-madurai',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Hind+Madurai:wght@300;400;500;600;700&display=swap' ),
		array(),
		'1.0'
	);

}
add_action( 'wp_enqueue_scripts', 'property_listing_elementor_enqueue_google_fonts' );

if (!function_exists('property_listing_elementor_enqueue_scripts')) {

	function property_listing_elementor_enqueue_scripts() {

		wp_enqueue_style(
			'bootstrap-css',
			get_template_directory_uri() . '/assets/css/bootstrap.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'fontawesome-css',
			get_template_directory_uri() . '/assets/css/fontawesome-all.css',
			array(),'4.5.0'
		);

		wp_enqueue_style('property-listing-elementor-style', get_stylesheet_uri(), array() );

		wp_enqueue_style(
			'property-listing-elementor-responsive-css',
			get_template_directory_uri() . '/assets/css/responsive.css',
			array(),'2.3.4'
		);

		wp_enqueue_script(
			'property-listing-elementor-navigation',
			get_template_directory_uri() . '/assets/js/navigation.js',
			FALSE,
			'1.0',
			TRUE
		);

		wp_enqueue_script(
			'property-listing-elementor-script',
			get_template_directory_uri() . '/assets/js/script.js',
			array('jquery'),
			'1.0',
			TRUE
		);

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

		$css = '';

		if ( get_header_image() ) :

			$css .=  '
				.header-image-box{
					background-image: url('.esc_url(get_header_image()).') !important;
					-webkit-background-size: cover !important;
					-moz-background-size: cover !important;
					-o-background-size: cover !important;
					background-size: cover !important;
					height: 550px;
				    display: flex;
				    align-items: center;
				}';

		endif;

		wp_add_inline_style( 'property-listing-elementor-style', $css );

	}

	add_action( 'wp_enqueue_scripts', 'property_listing_elementor_enqueue_scripts' );

}

/* Setup theme */

if (!function_exists('property_listing_elementor_after_setup_theme')) {

	function property_listing_elementor_after_setup_theme() {

		load_theme_textdomain( 'property-listing-elementor', get_template_directory() . '/languages' );
		if ( ! isset( $content_width ) ) $content_width = 900;

		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main menu', 'property-listing-elementor' ),
		));

		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'align-wide' );
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support( 'wp-block-styles' );
		add_theme_support('post-thumbnails');
		add_theme_support( 'custom-background', array(
		  'default-color' => 'f3f3f3'
		));

		add_theme_support( 'custom-logo', array(
			'height'      => 120,
			'width'       => 240,
			'flex-height' => true,
		) );
	
		add_theme_support( 'custom-header', array(
			'default-image' => get_parent_theme_file_uri( '/assets/images/default-header-image.png' ),
			'width' => 1920,
			'flex-width' => true,
			'height' => 550,
			'flex-height' => true,
			'header-text' => false,
		));

		register_default_headers( array(
			'default-image' => array(
				'url'           => '%s/assets/images/default-header-image.png',
				'thumbnail_url' => '%s/assets/images/default-header-image.png',
				'description'   => __( 'Default Header Image', 'property-listing-elementor' ),
			),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_editor_style( array( '/assets/css/editor-style.css' ) );
	
		global $pagenow;
		
		if (is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] )) {
			add_action('admin_notices', 'property_listing_elementor_activation_notice');
		}

	}

	add_action( 'after_setup_theme', 'property_listing_elementor_after_setup_theme', 999 );

}

function property_listing_elementor_activation_notice() {
	echo '<div class="notice notice-info wpele-activation-notice is-dismissible">';
		echo '<div class="notice-body">';
			echo '<div class="notice-icon">';
				echo '<img src="'.esc_url(get_template_directory_uri()).'/includes/getstart/images/get-logo.png ">';
			echo '</div>';
			echo '<div class="notice-content">';
				echo '<h2>'. esc_html__( 'Welcome to WPElemento', 'property-listing-elementor' ) .'</h2>';
				echo '<p>'. esc_html__( 'Thank you for choosing Property Listing Elementor theme .To setup the theme, please visit the get started page.', 'property-listing-elementor' ) .'</p>';
				echo '<span><a href="'. esc_url( admin_url( 'themes.php?page=property_listing_elementor_about' ) ) .'" class="button button-primary">'. esc_html__( 'GET STARTED', 'property-listing-elementor' ) .'</a></span>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
}

require get_template_directory() .'/includes/tgm/tgm.php';
require get_template_directory() . '/includes/customizer.php';
load_template( trailingslashit( get_template_directory() ) . '/includes/go-pro/class-upgrade-pro.php' );

/* Get post comments */

if (!function_exists('property_listing_elementor_comment')) :
    /**
     * Template for comments and pingbacks.
     *
     * Used as a callback by wp_list_comments() for displaying the comments.
     */
    function property_listing_elementor_comment($comment, $args, $depth){

        if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class('media'); ?>>
            <div class="comment-body">
                <?php esc_html_e('Pingback:', 'property-listing-elementor');
                comment_author_link(); ?><?php edit_comment_link(__('Edit', 'property-listing-elementor'), '<span class="edit-link">', '</span>'); ?>
            </div>

        <?php else : ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body media mb-4">
                <a class="pull-left" href="#">
                    <?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size']); ?>
                </a>
                <div class="media-body">
                    <div class="media-body-wrap card">
                        <div class="card-header">
                            <h5 class="mt-0"><?php /* translators: %s: author */ printf('<cite class="fn">%s</cite>', get_comment_author_link() ); ?></h5>
                            <div class="comment-meta">
                                <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                                    <time datetime="<?php comment_time('c'); ?>">
                                        <?php /* translators: %s: Date */ printf( esc_html__('%1$s at %2$s','property-listing-elementor'), esc_html( get_comment_date() ), esc_html( get_comment_time() ) ); ?>
                                    </time>
                                </a>
                                <?php edit_comment_link( __( 'Edit', 'property-listing-elementor' ), '<span class="edit-link">', '</span>' ); ?>
                            </div>
                        </div>

                        <?php if ('0' == $comment->comment_approved) : ?>
                            <p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'property-listing-elementor'); ?></p>
                        <?php endif; ?>

                        <div class="comment-content card-block">
                            <?php comment_text(); ?>
                        </div>

                        <?php comment_reply_link(
                            array_merge(
                                $args, array(
                                    'add_below' => 'div-comment',
                                    'depth' => $depth,
                                    'max_depth' => $args['max_depth'],
                                    'before' => '<footer class="reply comment-reply card-footer">',
                                    'after' => '</footer><!-- .reply -->'
                                )
                            )
                        ); ?>
                    </div>
                </div>
            </article>

            <?php
        endif;
    }
endif; // ends check for property_listing_elementor_comment()

if (!function_exists('property_listing_elementor_widgets_init')) {

	function property_listing_elementor_widgets_init() {

		register_sidebar(array(

			'name' => esc_html__('Sidebar','property-listing-elementor'),
			'id'   => 'property-listing-elementor-sidebar',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'property-listing-elementor'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Page Sidebar','property-listing-elementor'),
			'id'   => 'sidebar-2',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'property-listing-elementor'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Sidebar three','property-listing-elementor'),
			'id'   => 'sidebar-3',
			'description'   => esc_html__('This sidebar will be shown on blog pages.', 'property-listing-elementor'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Footer sidebar 1','property-listing-elementor'),
			'id'   => 'footer1-sidebar',
			'description'   => esc_html__('It appears in the footer 1.', 'property-listing-elementor'),
			'before_widget' => '<aside id="%1$s" class="%2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Footer sidebar 2','property-listing-elementor'),
			'id'   => 'footer2-sidebar',
			'description'   => esc_html__('It appears in the footer 2.', 'property-listing-elementor'),
			'before_widget' => '<aside id="%1$s" class="%2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Footer sidebar 3','property-listing-elementor'),
			'id'   => 'footer3-sidebar',
			'description'   => esc_html__('It appears in the footer 3.', 'property-listing-elementor'),
			'before_widget' => '<aside id="%1$s" class="%2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Footer sidebar 4','property-listing-elementor'),
			'id'   => 'footer4-sidebar',
			'description'   => esc_html__('It appears in the footer 4.', 'property-listing-elementor'),
			'before_widget' => '<aside id="%1$s" class="%2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

	}

	add_action( 'widgets_init', 'property_listing_elementor_widgets_init' );

}

function property_listing_elementor_the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
		echo esc_url( home_url() );
		echo '">';
		bloginfo('name');
		echo "</a> >> ";
		if (is_category() || is_single()) {
			the_category(' , ');
			if (is_single()) {
				echo " >> ";
				the_title();
			}
		} elseif (is_page()) {
			the_title();
		}
	}
}
/**
 * logo resizer
 */

 function property_listing_elementor_logo_resizer() {

    $property_listing_elementor_theme_logo_size_css = '';
	$property_listing_elementor_theme_custom_logo_id = get_theme_mod( 'custom_logo' );
	$property_listing_elementor_theme_logo_width = get_theme_mod( 'property_listing_elementor_logo_resizer', 150 ); // Default to 200 if not set
	$property_listing_elementor_theme_logo_height = $property_listing_elementor_theme_logo_width * 0.5;

	if ( $property_listing_elementor_theme_custom_logo_id ) {
		$property_listing_elementor_theme_logo_data = wp_get_attachment_image_src( $property_listing_elementor_theme_custom_logo_id, 'full' );
		$property_listing_elementor_theme_logo_url = $property_listing_elementor_theme_logo_data[0];
		$property_listing_elementor_theme_original_width = $property_listing_elementor_theme_logo_data[1];
		$property_listing_elementor_theme_original_height = $property_listing_elementor_theme_logo_data[2];
		$property_listing_elementor_theme_aspect_ratio = $property_listing_elementor_theme_original_height / $property_listing_elementor_theme_original_width;
		$property_listing_elementor_theme_logo_height = $property_listing_elementor_theme_logo_width * $property_listing_elementor_theme_aspect_ratio;
   
	}
	$property_listing_elementor_theme_logo_size_css = '
		.custom-logo{
			height: '.esc_attr($property_listing_elementor_theme_logo_height).'px !important;
			width: '.esc_attr($property_listing_elementor_theme_logo_width).'px !important;
		}
	';
    wp_add_inline_style( 'property-listing-elementor-style',$property_listing_elementor_theme_logo_size_css );

}

add_action( 'wp_enqueue_scripts', 'property_listing_elementor_logo_resizer' );

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'property_listing_elementor_loop_columns', 999);
if (!function_exists('property_listing_elementor_loop_columns')) {
	function property_listing_elementor_loop_columns() {
		return get_theme_mod( 'property_listing_elementor_products_per_row', '3' ); 
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'property_listing_elementor_products_per_page' );
function property_listing_elementor_products_per_page( $cols ) {
  	return  get_theme_mod( 'property_listing_elementor_products_per_page',9);
}

function property_listing_elementor_customize_css() {
	?>
	<?php if ( 'right' == get_theme_mod( 'property_listing_elementor_sale_badge_position', 'right' ) ) : ?>
		<style>
		.woocommerce ul.products li.product .onsale {
			left: auto; right: 10px;
		}
		</style>
	<?php elseif ( 'left' == get_theme_mod( 'property_listing_elementor_sale_badge_position', 'right' ) ) : ?>
		<style>
		.woocommerce ul.products li.product .onsale{
			left: 10px; right: auto ;
		}
		</style>
	<?php endif; ?>

	<?php
}

add_action( 'wp_head', 'property_listing_elementor_customize_css');

define('PROPERTY_LISTING_ELEMENTOR_FREE_THEME_DOC',__('https://preview.wpelemento.com/theme-documentation/real-estate-listings-lite/','property-listing-elementor'));
define('PROPERTY_LISTING_ELEMENTOR_SUPPORT',__('https://wordpress.org/support/theme/property-listing-elementor/','property-listing-elementor'));
define('PROPERTY_LISTING_ELEMENTOR_REVIEW',__('https://wordpress.org/support/theme/property-listing-elementor/reviews/','property-listing-elementor'));
define('PROPERTY_LISTING_ELEMENTOR_BUY_NOW',__('https://www.wpelemento.com/products/property-listing-wordpress-theme','property-listing-elementor'));
define('PROPERTY_LISTING_ELEMENTOR_LIVE_DEMO',__('https://preview.wpelemento.com/property-listing-elementor/','property-listing-elementor'));
define('PROPERTY_LISTING_ELEMENTOR_THEME_BUNDLE',__('https://www.wpelemento.com/products/wordpress-theme-bundle','property-listing-elementor'));

/* Plugin Activation */
require get_template_directory() . '/includes/getstart/plugin-activation.php';

/* Implement the About theme page */
require get_template_directory() . '/includes/getstart/getstart.php';

?>