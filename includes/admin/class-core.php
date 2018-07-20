<?php
/**
 * Insertion sort - < Admin Core class >
 * This is a built-in script, please do not
 * modify if is not really necessary.
 *
 * @package insertions
 */

namespace Insertions\Admin;

use \Insertions\Utils as Utils;

/**
 * [Admin] Core class
 * All needed actions and filters are settled here.
 *
 * @since 0.1
 */
class Core {

    /**
     * Class construct
     *
     * @since 0.1
     */
    function __construct() {
        $this->init();
    }

    /**
     * Loads all needed components
     *
     * @since   0.1
     * @return  void
     */
    function init() {
        $this->general_admin_hooks();
        new Menu();

        add_action( 'wp_ajax_insertion_sort_admin_form', array( $this, 'insertion_sort_admin_form_ajax') );
        add_action( 'wp_ajax_nopriv_insertion_sort_admin_form', array( $this, 'insertion_sort_admin_form_ajax') );
    }

    /**
     * Misc. hooks to be executed across dashboard
     *
     * @return void
     */
    function general_admin_hooks() {
        remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
        wp_admin_css_color(
            'insertions',
            __( 'Insertion sort', 'insertions' ),
            INSERTIONS_URL . 'assets/admin/css/scheme/colors.min.css',
            array( '#222222', '#6a5bb4', '#CCCCCC', '#F0F0F0' ),
            array(
                'base' => '#F0F0F0',
                'focus' => '#F0F0F0',
                'current' => '#F0F0F0',
            )
        );
    }

    /**
     * Save Form on options table
     *
     * @return void
     */
    public function insertion_sort_admin_form_ajax() {
        $updated = 0;

        try {
            $data = array_filter($_POST);

            foreach ($data as $k => $v) {
                if ( update_option( $k, $v ) ) {
                    $updated++;
                }
            }
        } catch (\Exception $e) {
            $updated = 0;
        }

        wp_send_json(['updated' => $updated]);
    }
}