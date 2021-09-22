<?php
/**
 * Plugin Name:       Emon Toolkit
 * Plugin URI:        https://github.com/emon4u/emon-toolkit
 * Description:       A toolkit plugin for WordPress plugin development
 * Version:           1.0
 * Author:            Emon Ahmed
 * Author URI:        https://github.com/emon4u/
 * License:           GPLv2
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       emon-toolkit
 */

// If this file is called directly, abort.
if ( !defined( 'ABSPATH' ) ) {
    die;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class
 */
final class Emon_Toolkit {

    /**
     * Plugin version
     *
     * @var string
     */
    const version = '1.0';

    /**
     * Class constructor
     */
    private function __construct() {

        $this->define_constants();

        register_activation_hook( __FILE__, [$this, 'activate'] );

        add_action( 'plugins_loaded', [$this, 'init_plugin'] );
    }

    /**
     * Initializes a singleton instance
     *
     * @return \Emon_Toolkit
     */
    public static function init() {
        static $instance = false;

        if ( !$instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define the required plugin constants
     *
     * @return void
     */
    public function define_constants() {
        define( 'ET_VERSION', self::version );
        define( 'ET_FILE', __FILE__ );
        define( 'ET_PATH', __DIR__ );
        define( 'ET_URL', plugins_url( '', ET_FILE ) );
        define( 'ET_ASSETS', ET_URL . '/assets' );
    }

    /**
     * Initialize the plugin
     *
     * @return void
     */
    public function init_plugin() {
        if ( is_admin() ) {
            new EmonToolkit\Admin();
        }
    }

    /**
     * Do stuff upon plugin activation
     *
     * @return void
     */
    public function activate() {
        $installer = new EmonToolkit\Installer();
        $installer->run();
    }
}

/**
 * Initializes the main plugin
 *
 * @return \Emon_Toolkit
 */
function emon_toolkit() {
    return Emon_Toolkit::init();
}

// kick-off the plugin
emon_toolkit();