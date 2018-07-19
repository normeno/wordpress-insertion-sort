<?php
/*
 * Plugin Name: Intervened Code
 * Plugin URI:  https://github.com/normeno/wordpress-intervened-code
 * Description: Add code in our pages
 * Version:     0.1 alpha
 * Author:      Nicolas Ormeno
 * Author URI:  //normeno.com
 * Text Domain: intervened-code
 * Domain Path: /languages
 * License:     GPL-3.0
 * License URI: https://opensource.org/licenses/MIT
 *
 * @package   intervened-code
 * @author    Nicolas Ormeno
 * @license   MIT
 */

/**
 * Avoid direct file access
 *
 * @since   0.1
 */
defined( 'ABSPATH' ) || die( 'Don\'t try so hard!' );

/**
 * Set current version
 *
 * @since   0.1
 */
define( 'INTERVENTIONS_VERSION', '0.1 alpha' );

/**
 * Set common constants
 *
 * @since   0.1
 */
define( 'INTERVENTIONS_URL', plugin_dir_url( __FILE__ ) );
define( 'INTERVENTIONS_PATH', dirname( __FILE__ ) . DIRECTORY_SEPARATOR );
define( 'INTERVENTIONS_NAMESPACE', 'Interventions' );
define( 'INTERVENTIONS_ADMIN_SLUG', 'interventions' );

/**
 * Class loader function
 *
 * @since   0.1
 * @param   string $class Class name.
 * @return  void
 */
function interventions_class_loader( $class ) {
    $namespace  = INTERVENTIONS_NAMESPACE . '\\';

    if ( strpos( $class, $namespace ) !== false ) {
        $class      = strtolower( str_replace( $namespace, '', $class ) );
        $path_array = explode( '\\', $class );
        $file       = false;

        if ( count( $path_array ) > 1 ) {
            $dir_array  = array_slice( $path_array, 0, -1 );
            $file_path  = implode( DIRECTORY_SEPARATOR, $dir_array );
            $file_name  = DIRECTORY_SEPARATOR . 'class-' . end( $path_array ) . '.php';
            $file       = DIRECTORY_SEPARATOR . $file_path . $file_name;
        } else {
            $file       = DIRECTORY_SEPARATOR . 'class-' . $class . '.php';
        }

        $file   = INTERVENTIONS_PATH . 'includes' . $file;

        if ( file_exists( $file ) ) {
            include $file;
        }
    }
}

spl_autoload_register( 'interventions_class_loader' );

/**
 * Initializes plugin
 *
 * @since   0.1
 * @return  void
 */
function interventions_init() {
    new Interventions\Core();

    if ( is_admin() ) {
        new Interventions\Admin\Core();
    }
}

add_action( 'init', 'interventions_init' );