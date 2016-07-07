<?php
/**
 * Created by PhpStorm.
 * User: t.meier
 * Date: 04.07.2016
 * Time: 15:32
 */
$plugin_url = WP_PLUGIN_URL.'/'.dirname(plugin_basename (__FILE__));

function detectWidth() {
    // make the ajaxurl var available to the above script
    wp_localize_script( 'ajax-test', 'the_ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    if(!empty($_POST['width']))
    {
        $_SESSION['screenWidth'] = $screenWidth = get_post( $_REQUEST['width'] );
        echo json_encode( $screenWidth );
    }
    wp_die();
}
add_action('wp_enqueue_scripts', 'detectWidth');

add_action( 'wp_ajax_nopriv_example_ajax_request', 'detectWidth' );

