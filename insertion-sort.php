<?php
/*
 * Plugin Name: Insertions Sort
 * Plugin URI:  https://github.com/normeno/wordpress-insertion-sort
 * Description: Add code in our pages
 * Version:     0.1 alpha
 * Author:      Nicolas Ormeno
 * Author URI:  //normeno.com
 * Text Domain: insertion-sort
 * Domain Path: /languages
 * License:     GPL-3.0
 * License URI: https://opensource.org/licenses/MIT
 *
 * @package   insertion-sort
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
define( 'INSERTIONS_VERSION', '0.1 alpha' );

/**
 * Set common constants
 *
 * @since   0.1
 */
define( 'INSERTIONS_URL', plugin_dir_url( __FILE__ ) );
define( 'INSERTIONS_PATH', dirname( __FILE__ ) . DIRECTORY_SEPARATOR );
define( 'INSERTIONS_NAMESPACE', 'Insertions' );
define( 'INSERTIONS_ADMIN_SLUG', 'insertions' );

/**
 * Class loader function
 *
 * @since   0.1
 * @param   string $class Class name.
 * @return  void
 */
function insertions_class_loader( $class ) {
    $namespace  = INSERTIONS_NAMESPACE . '\\';

    if ( strpos( $class, $namespace ) !== false ) {
        $class      = strtolower( str_replace( $namespace, '', $class ) );
        $path_array = explode( '\\', $class );

        if ( count( $path_array ) > 1 ) {
            $dir_array  = array_slice( $path_array, 0, -1 );
            $file_path  = implode( DIRECTORY_SEPARATOR, $dir_array );
            $file_name  = DIRECTORY_SEPARATOR . 'class-' . end( $path_array ) . '.php';
            $file       = DIRECTORY_SEPARATOR . $file_path . $file_name;
        } else {
            $file       = DIRECTORY_SEPARATOR . 'class-' . $class . '.php';
        }

        $file   = INSERTIONS_PATH . 'includes' . $file;

        if ( file_exists( $file ) ) {
            include $file;
        }
    }
}

spl_autoload_register( 'insertions_class_loader' );

add_action( 'init', 'insertions_init' );

/**
 * Initializes plugin
 *
 * @since   0.1
 * @return  void
 */
function insertions_init() {
    new Insertions\Core();

    if ( is_admin() ) {
        new Insertions\Admin\Core();
    }
}