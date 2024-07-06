<?php
if ( ! class_exists( 'Property_Listing_Elementor_Plugin_Activation_WPElemento_Importer' ) ) {
    /**
     * Property_Listing_Elementor_Plugin_Activation_WPElemento_Importer initial setup
     *
     * @since 1.6.2
     */

    class Property_Listing_Elementor_Plugin_Activation_WPElemento_Importer {

        private static $property_listing_elementor_instance;
        public $property_listing_elementor_action_count;
        public $property_listing_elementor_recommended_actions;

        /** Initiator **/
        public static function get_instance() {
          if ( ! isset( self::$property_listing_elementor_instance) ) {
            self::$property_listing_elementor_instance = new self();
          }
          return self::$property_listing_elementor_instance;
        }

        /*  Constructor */
        public function __construct() {

            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

            // ---------- wpelementoimpoter Plugin Activation -------
            add_filter( 'property_listing_elementor_recommended_plugins', array($this, 'property_listing_elementor_recommended_elemento_importer_plugins_array') );

            $property_listing_elementor_actions                   = $this->property_listing_elementor_get_recommended_actions();
            $this->property_listing_elementor_action_count        = $property_listing_elementor_actions['count'];
            $this->property_listing_elementor_recommended_actions = $property_listing_elementor_actions['actions'];

            add_action( 'wp_ajax_create_pattern_setup_builder', array( $this, 'create_pattern_setup_builder' ) );
        }

        public function property_listing_elementor_recommended_elemento_importer_plugins_array($property_listing_elementor_plugins){
            $property_listing_elementor_plugins[] = array(
                    'name'     => esc_html__('WPElemento Importer', 'property-listing-elementor'),
                    'slug'     =>  'wpelemento-importer',
                    'function' => 'WPElemento_Importer_ThemeWhizzie',
                    'desc'     => esc_html__('We highly recommend installing the WPElemento Importer plugin for importing the demo content with Elementor.', 'property-listing-elementor'),               
            );
            return $property_listing_elementor_plugins;
        }

        public function enqueue_scripts() {
            wp_enqueue_script('updates');      
            wp_register_script( 'property-listing-elementor-plugin-activation-script', esc_url(get_template_directory_uri()) . '/includes/getstart/js/plugin-activation.js', array('jquery') );
            wp_localize_script('property-listing-elementor-plugin-activation-script', 'property_listing_elementor_plugin_activate_plugin',
                array(
                    'installing' => esc_html__('Installing', 'property-listing-elementor'),
                    'activating' => esc_html__('Activating', 'property-listing-elementor'),
                    'error' => esc_html__('Error', 'property-listing-elementor'),
                    'ajax_url' => esc_url(admin_url('admin-ajax.php')),
                    'wpelementoimpoter_admin_url' => esc_url(admin_url('admin.php?page=wpelemento-importer-tgmpa-install-plugins')),
                    'addon_admin_url' => esc_url(admin_url('admin.php?page=wpelementoimporter-wizard'))
                )
            );
            wp_enqueue_script( 'property-listing-elementor-plugin-activation-script' );

        }

        // --------- Plugin Actions ---------
        public function property_listing_elementor_get_recommended_actions() {

            $property_listing_elementor_act_count  = 0;
            $property_listing_elementor_actions_todo = get_option( 'recommending_actions', array());

            $property_listing_elementor_plugins = $this->property_listing_elementor_get_recommended_plugins();

            if ($property_listing_elementor_plugins) {
                foreach ($property_listing_elementor_plugins as $property_listing_elementor_key => $property_listing_elementor_plugin) {
                    $property_listing_elementor_action = array();
                    if (!isset($property_listing_elementor_plugin['slug'])) {
                        continue;
                    }

                    $property_listing_elementor_action['id']   = 'install_' . $property_listing_elementor_plugin['slug'];
                    $property_listing_elementor_action['desc'] = '';
                    if (isset($property_listing_elementor_plugin['desc'])) {
                        $property_listing_elementor_action['desc'] = $property_listing_elementor_plugin['desc'];
                    }

                    $property_listing_elementor_action['name'] = '';
                    if (isset($property_listing_elementor_plugin['name'])) {
                        $property_listing_elementor_action['title'] = $property_listing_elementor_plugin['name'];
                    }

                    $property_listing_elementor_link_and_is_done  = $this->property_listing_elementor_get_plugin_buttion($property_listing_elementor_plugin['slug'], $property_listing_elementor_plugin['name'], $property_listing_elementor_plugin['function']);
                    $property_listing_elementor_action['link']    = $property_listing_elementor_link_and_is_done['button'];
                    $property_listing_elementor_action['is_done'] = $property_listing_elementor_link_and_is_done['done'];
                    if (!$property_listing_elementor_action['is_done'] && (!isset($property_listing_elementor_actions_todo[$property_listing_elementor_action['id']]) || !$property_listing_elementor_actions_todo[$property_listing_elementor_action['id']])) {
                        $property_listing_elementor_act_count++;
                    }
                    $property_listing_elementor_recommended_actions[] = $property_listing_elementor_action;
                    $property_listing_elementor_actions_todo[]        = array('id' => $property_listing_elementor_action['id'], 'watch' => true);
                }
                return array('count' => $property_listing_elementor_act_count, 'actions' => $property_listing_elementor_recommended_actions);
            }

        }

        public function property_listing_elementor_get_recommended_plugins() {

            $property_listing_elementor_plugins = apply_filters('property_listing_elementor_recommended_plugins', array());
            return $property_listing_elementor_plugins;
        }

        public function property_listing_elementor_get_plugin_buttion($slug, $name, $function) {
                $property_listing_elementor_is_done      = false;
                $property_listing_elementor_button_html  = '';
                $property_listing_elementor_is_installed = $this->is_plugin_installed($slug);
                $property_listing_elementor_plugin_path  = $this->get_plugin_basename_from_slug($slug);
                $property_listing_elementor_is_activeted = (class_exists($function)) ? true : false;
                if (!$property_listing_elementor_is_installed) {
                    $property_listing_elementor_plugin_install_url = add_query_arg(
                        array(
                            'action' => 'install-plugin',
                            'plugin' => $slug,
                        ),
                        self_admin_url('update.php')
                    );
                    $property_listing_elementor_plugin_install_url = wp_nonce_url($property_listing_elementor_plugin_install_url, 'install-plugin_' . esc_attr($slug));
                    $property_listing_elementor_button_html        = sprintf('<a class="property-listing-elementor-plugin-install install-now button-secondary button" data-slug="%1$s" href="%2$s" aria-label="%3$s" data-name="%4$s">%5$s</a>',
                        esc_attr($slug),
                        esc_url($property_listing_elementor_plugin_install_url),
                        sprintf(esc_html__('Install %s Now', 'property-listing-elementor'), esc_html($name)),
                        esc_html($name),
                        esc_html__('Install & Activate', 'property-listing-elementor')
                    );
                } elseif ($property_listing_elementor_is_installed && !$property_listing_elementor_is_activeted) {

                    $property_listing_elementor_plugin_activate_link = add_query_arg(
                        array(
                            'action'        => 'activate',
                            'plugin'        => rawurlencode($property_listing_elementor_plugin_path),
                            'plugin_status' => 'all',
                            'paged'         => '1',
                            '_wpnonce'      => wp_create_nonce('activate-plugin_' . $property_listing_elementor_plugin_path),
                        ), self_admin_url('plugins.php')
                    );

                    $property_listing_elementor_button_html = sprintf('<a class="property-listing-elementor-plugin-activate activate-now button-primary button" data-slug="%1$s" href="%2$s" aria-label="%3$s" data-name="%4$s">%5$s</a>',
                        esc_attr($slug),
                        esc_url($property_listing_elementor_plugin_activate_link),
                        sprintf(esc_html__('Activate %s Now', 'property-listing-elementor'), esc_html($name)),
                        esc_html($name),
                        esc_html__('Activate', 'property-listing-elementor')
                    );
                } elseif ($property_listing_elementor_is_activeted) {
                    $property_listing_elementor_button_html = sprintf('<div class="action-link button disabled"><span class="dashicons dashicons-yes"></span> %s</div>', esc_html__('Active', 'property-listing-elementor'));
                    $property_listing_elementor_is_done     = true;
                }

                return array('done' => $property_listing_elementor_is_done, 'button' => $property_listing_elementor_button_html);
            }
        public function is_plugin_installed($slug) {
            $property_listing_elementor_installed_plugins = $this->get_installed_plugins(); // Retrieve a list of all installed plugins (WP cached).
            $property_listing_elementor_file_path         = $this->get_plugin_basename_from_slug($slug);
            return (!empty($property_listing_elementor_installed_plugins[$property_listing_elementor_file_path]));
        }
        public function get_plugin_basename_from_slug($slug) {
            $property_listing_elementor_keys = array_keys($this->get_installed_plugins());
            foreach ($property_listing_elementor_keys as $property_listing_elementor_key) {
                if (preg_match('|^' . $slug . '/|', $property_listing_elementor_key)) {
                    return $property_listing_elementor_key;
                }
            }
            return $slug;
        }

        public function get_installed_plugins() {

            if (!function_exists('get_plugins')) {
                require_once ABSPATH . 'wp-admin/includes/plugin.php';
            }

            return get_plugins();
        }
        public function create_pattern_setup_builder() {

            $edit_page = admin_url().'post-new.php?post_type=page&create_pattern=true';
            echo json_encode(['page_id'=>'','edit_page_url'=> $edit_page ]);

            exit;
        }

    }
}
/**
 * Kicking this off by calling 'get_instance()' method
 */
Property_Listing_Elementor_Plugin_Activation_WPElemento_Importer::get_instance();