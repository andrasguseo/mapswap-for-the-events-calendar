<?php
/**
 * Plugin Name: Plugin Scaffolding
 * Description:
 * Version:     1.0.0
 * Author:      Andras Guseo
 */

define ( 'PLUGIN_SCAFFOLDING_FILE', __FILE__ );

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

require_once 'src/functions/load.php';

add_action( 'plugins_loaded', 'plugin_scaffolding_load' );
