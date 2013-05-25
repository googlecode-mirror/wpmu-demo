<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/*-----------------------------------------------------------------------------------*/
/* Start WooThemes Functions - Please refrain from editing this section */
/*-----------------------------------------------------------------------------------*/

// WooFramework init
require_once ( get_template_directory() . '/functions/admin-init.php' );	

/*-----------------------------------------------------------------------------------*/
/* Load the theme-specific files, with support for overriding via a child theme.
/*-----------------------------------------------------------------------------------*/

$includes = array(
				'includes/theme-options.php', 			// Options panel settings and custom settings
				'includes/theme-functions.php', 		// Custom theme functions
				'includes/theme-actions.php', 			// Theme actions & user defined hooks
				'includes/theme-comments.php', 			// Custom comments/pingback loop
				'includes/theme-js.php', 				// Load JavaScript via wp_enqueue_script
				'includes/sidebar-init.php', 			// Initialize widgetized areas
				'includes/theme-widgets.php'			// Theme widgets
				);

// Allow child themes/plugins to add widgets to be loaded.
$includes = apply_filters( 'woo_includes', $includes );
				
foreach ( $includes as $i ) {
	locate_template( $i, true );
}

if ( is_woocommerce_activated() ) {
	locate_template( 'includes/theme-woocommerce.php', true );
}

/*-----------------------------------------------------------------------------------*/
/* You can add custom functions below */
/*-----------------------------------------------------------------------------------*/

function admin_head_logo() {
    echo '<div style="margin: 10px"><img src="' . get_template_directory_uri() .'/images/logo_srikrung.png" alt=""/></div>';
}
add_action( 'admin_head', 'admin_head_logo' );

/**
 * Function : check_agent_no()
 * check the agent no. and return true when it's exist in the agent DB, otherwise return false.
 *
 * @param $agent_no
 * @return bool
 */
function check_agent_no($agent_no) {
    $agent_query = new WP_User_Query(array("meta_key" => 'agent_no', 'meta_value' => $agent_no));
    if(empty($agent_query->results))
        return false;
    return true;
}

/**
 * Function : check_agent_no()
 * check the agent no. and return true when it's exist in the agent DB, otherwise return false.
 *
 * @param $agent_no
 * @return bool
 */
function get_user_from_agent_no($agent_no) {
    $agents = get_users(array('meta_key' => 'agent_no', 'meta_value' => $agent_no));
    foreach($agents as $a)
        return $a;
}







/*-----------------------------------------------------------------------------------*/
/* Don't add any code below here or the sky will fall down */
/*-----------------------------------------------------------------------------------*/
?>