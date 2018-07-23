<?php
/**
 * Insertion sort - < Menu class >
 * This is a built-in script, please do not
 * modify if is not really necessary.
 *
 * @package insertions
 */

namespace Insertions\Admin;

use \Insertions\Utils as Utils;

/**
 * [Admin] Menu class
 * Enables plugin admin menu and its pages.
 *
 * @since   0.1
 */
class Menu {

    /**
     * Home page slug
     *
     * @since   0.1
     * @var     string
     */
    private $home;

    /**
     * Class construct
     *
     * @since   0.1
     * @return  void
     */
    function __construct() {
        $this->home = INSERTIONS_ADMIN_SLUG . '-home';
        $this->init();
    }

    /**
     * Initializes menu relative actions.
     *
     * @since   0.1
     * @return  void
     */
    function init() {
        add_action( 'admin_bar_menu', array( $this, 'logo_bar_menu' ), 1 );
        add_action( 'admin_bar_menu', array( $this, 'custom_bar_menu' ), 90 );
        add_action( 'admin_menu', array( $this, 'build' ) );
    }

    /**
     * Prepend plugin's logo at admin bar.
     *
     * @return void
     */
    function logo_bar_menu() {
        global $wp_admin_bar;
        $wp_admin_bar->add_node(
            [
                'id'    => 'insertion-sort',
                'title' => '<img src="' . INSERTIONS_URL . 'assets/public/img/logo_small.png" />',
                'href'  => '/',
                'meta'  => [
                    'class' => 'insertions-admin-bar',
                ],
            ]
        );
    }

    /**
     * Modifies top bar nodes.
     *
     * @return void
     */
    function custom_bar_menu() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_node( 'wp-logo' );
    }

    /**
     * Build plugin menu and its sub-elements (if apply).
     *
     * @since   0.1
     * @return  void
     */
    public function build() {
        add_menu_page(
            __( 'General', 'insertion-sort' ),
            __( 'Insertion Sort', 'insertion-sort' ),
            'edit_pages',
            $this->home,
            array( $this, 'home' ),
            'dashicons-editor-code',
            75
        );
    }

    /**
     * Admin home page
     *
     * @since   0.1
     * @return  void
     */
    public function home() {
        Utils::load_public_assets( 'fontawesome-all.min.css' );
        Utils::load_admin_assets( 'home.min.css' );
        Utils::load_admin_assets( 'default.css', 'admin/plugins/highlightjs' );
        Utils::load_admin_assets( 'highlight.pack.js', 'admin/plugins/highlightjs' );
        Utils::load_admin_assets( 'notify.js', 'admin/plugins/notifyjs' );
        Utils::load_admin_assets( 'home.js' );
        Utils::load_admin_page(
            'home.php', array(
                'LOGO' => INSERTIONS_URL . 'assets/public/img/logo.png',
                'HINT_ADD_SCRIPT' => __('You need add &lt;script&gt;&lt;/script&gt; tags', 'insertion-code'),
                'HINT_DONT_USE' => __('don\'t use \" or \'', 'insertion-code'),
                'HINT_ADD_STYLE' => __('You need add &lt;style&gt;&lt;/style&gt; tags', 'insertion-code'),
                'SAVE' => __('Save', 'insertion-code'),
                'head-css-data' => esc_attr( get_option('insertion-sort-head-css') ),
                'head-js-data' => esc_attr( get_option('insertion-sort-head-js') ),
                'footer-css-data' => esc_attr( get_option('insertion-sort-footer-css') ),
                'footer-js-data' => esc_attr( get_option('insertion-sort-footer-js') )
            )
        );
    }
}