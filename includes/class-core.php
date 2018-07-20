<?php
/**
 * Insertion sort - < Core class >
 * This is a built-in script, please do not
 * modify if is not really necessary.
 *
 * @package insertions
 */
namespace Insertions;

/**
 * Core class
 * All base hooks are settled here.
 *
 * @since 0.1
 */
class Core
{

    /**
     * Class construct
     *
     * @since   0.1
     * @return  void
     */
    function __construct() {
        $this->init();

    }

    /**
     * Class initializer
     *
     * @since   0.1
     * @return  void
     */
    private function init() {
        add_action( 'wp_head', array( $this, 'add_to_head') );
    }

    /**
     * Add elements before </head>
     *
     * @since 0.1
     * @return void
     */
    public function add_to_head() {
        echo '<script>'.get_option('insertion-sort-head-js').'</script>';
        echo '<style>'.get_option('insertion-sort-head-css').'</style>';
    }
}