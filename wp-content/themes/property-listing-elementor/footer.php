<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Property Listing Elementor
 */

?>

<footer class="footer-side">
  <div class="footer-widget">
    <div class="container">
      <?php if ( is_active_sidebar( 'footer1-sidebar' ) || is_active_sidebar( 'footer2- sidebar' ) || is_active_sidebar( 'footer3-sidebar' ) || is_active_sidebar( 'footer4-sidebar' ) ) : ?>
      <?php $property_listing_elementor_count = 0;
        if ( is_active_sidebar('footer1-sidebar') ) : $property_listing_elementor_count++; endif; 
        if ( is_active_sidebar('footer2-sidebar') ) : $property_listing_elementor_count++; endif; 
        if ( is_active_sidebar('footer3-sidebar') ) : $property_listing_elementor_count++; endif; 
        if ( is_active_sidebar('footer4-sidebar') ) : $property_listing_elementor_count++; endif;
        $property_listing_elementor_row = 'col-lg-'. 12/$property_listing_elementor_count .' col-md-'. 12/$property_listing_elementor_count .' col-sm-12';
      ?>
      <div class="row pt-2">
          <?php if ( is_active_sidebar('footer1-sidebar') ) : ?>
              <div class="footer-area <?php echo $property_listing_elementor_row ?>">
                  <?php dynamic_sidebar('footer1-sidebar'); ?>
              </div>
          <?php endif; ?>
          <?php if ( is_active_sidebar('footer2-sidebar') ) : ?>
              <div class="footer-area <?php echo $property_listing_elementor_row ?>">
                  <?php dynamic_sidebar('footer2-sidebar'); ?>
              </div>
          <?php endif; ?>
          <?php if ( is_active_sidebar('footer3-sidebar') ) : ?>
              <div class="footer-area <?php echo $property_listing_elementor_row ?>">
                  <?php dynamic_sidebar('footer3-sidebar'); ?>
              </div>
          <?php endif; ?>
          <?php if ( is_active_sidebar('footer4-sidebar') ) : ?>
              <div class="footer-area <?php echo $property_listing_elementor_row ?>">
                  <?php dynamic_sidebar('footer4-sidebar'); ?>
              </div>
          <?php endif; ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      <div class="row pt-2">
        <div class="col-lg-6 col-md-6 align-self-center">
          <p class="mb-0 py-3 text-center text-md-start">
            <?php
              if (!get_theme_mod('property_listing_elementor_footer_text') ) { ?>   
                <a href="<?php echo esc_url(__('https://www.wpelemento.com/products/free-real-estate-wordpress-theme', 'property-listing-elementor' )); ?>" target="_blank">
                  <?php esc_html_e('Property Listing Elementor WordPress Theme','property-listing-elementor'); ?>
                </a>
            <?php } else {
                echo esc_html(get_theme_mod('property_listing_elementor_footer_text'));
              }
            ?>
            <?php if ( get_theme_mod('property_listing_elementor_copyright_enable', true) == true ) : ?>
            <?php
              /* translators: %s: WP Elemento */
              printf( esc_html__( ' By %s', 'property-listing-elementor' ), 'WP Elemento' ); ?>
            <?php endif; ?>
          </p>
        </div>
        <div class="col-lg-6 col-md-6 align-self-center text-center text-md-end">
          <?php if ( get_theme_mod('property_listing_elementor_copyright_enable', true) == true ) : ?>
            <a href="<?php echo esc_url(__('https://wordpress.org','property-listing-elementor') ); ?>" rel="generator"><?php  /* translators: %s: WordPress */ printf( esc_html__( 'Proudly powered by %s', 'property-listing-elementor' ), 'WordPress' ); ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div> 
  <?php if ( get_theme_mod('property_listing_elementor_scroll_enable_setting')) : ?>
    <div class="scroll-up">
      <a href="#tobottom"><i class="fa fa-arrow-up"></i></a>
    </div>
  <?php endif; ?>
</footer>

<?php wp_footer(); ?>

</body>
</html>