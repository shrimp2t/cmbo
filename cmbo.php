<?php
/**
* Plugin Name:       Custom Meta Box Options
* Plugin URI:        #
* Description:
* Version:           1.0.0
* Author:            SmoothThemes
* Author URI:        http://smoothemes.com/
* License:           GPL-2.0+
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
* Text Domain:
* Domain Path:       /languages
*/

/**
 * Root folder url
 * @since 1.0.0
 */
define( 'CMBO_ROOT_URL',  trailingslashit( plugins_url('', __FILE__) ) );

/**
 * Root folder path
 *
 * @since 1.0.0
 */
define( 'CMBO_ROOT_PATH', trailingslashit( plugin_dir_path( __FILE__) ) );

/**
 * Script version
 */
define( 'CMBO_VERSION', '1.0.0' );


/**
 * Get Option settings file config
 *
 * Override template in your theme
 * YOUR_THEME_DIR/inc/options.php
 * YOUR_THEME_DIR/includes/options.php
 * or YOUR_THEME_DIR/admin/options.php
 * or YOUR_THEME_DIR/settings/options.php
 *
 * @since 1.0
 * @param string file path
 * @return string|bool
 */
function cmbo_get_file_config( $file_config = '' ) {

    $templates =  array(
        'settings/'.$file_config.'.php',
        'config/'.$file_config.'.php',
        'inc/'.$file_config.'.php',
        'includes/'.$file_config.'.php',
        'admin/'.$file_config.'.php',
    );

    if ( $file = locate_template( $templates ) ) {
        // locate_template() returns path to file
        // if either the child theme or the parent theme have overridden the template
        return $file;
    } else {
        // If neither the child nor parent theme have overridden the template,
        // we load the template from the 'templates' directory if this plugin
        $file =  CMBO_ROOT_PATH.'settings/'.$file_config.'.php';
        return ( is_file( $file ) ) ?  $file : false ;
    }
}

if ( ! class_exists( 'CMBO_100' ) ) {

    class CMBO_100
    {

        /**
         * Single instance of the CMBO_100 object
         * @var CMBO_100
         */
        public static $instance;

        /**
         * The Function creates a singleton class that’s cached to stop duplicate instances
         *
         * @return CMBO_100
         */
        public static function instance() {
            if ( ! self::$instance ) {
                self::$instance = new self();
                self::$instance->init();
            }
            return self::$instance;
        }

        /**
         * Setup object
         * @since 1.0.0
         */
        public function init() {
            self::inc();
            add_action( 'cmb2_init', array( __CLASS__, 'load_config' ) );
        }

        /**
         * Load include files
         * @since 1.0.0
         */
        public static function inc() {

            require_once dirname(__FILE__) . '/cmb2/init.php';
            /**
             * Load extension search field
             */
            require_once dirname(__FILE__) . '/CMB2/cmb2_post_search_field.php';
            /**
             * Load admin option page
             */
            require_once dirname(__FILE__) . '/admin/admin.php';

        }

        /**
         * Load config files
         * @since 1.0.0
         */
        public static function load_config() {

            $files = array(
                'post-meta',
                'user-meta'
            );

            foreach ( $files as $file ) {
                $f = cmbo_get_file_config( $file ) ;
                if ( $f ) {
                    require_once $f;
                }
            }
        }

    }

    CMBO_100::instance();

}








