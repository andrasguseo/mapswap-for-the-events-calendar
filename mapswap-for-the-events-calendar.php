<?php
/**
 * Plugin Name:         MapSwap for The Events Calendar
 * Description:         Replaces Google Maps with an alternative map provider in The Events Calendar. No API key required, no usage fees, no restrictions - just fast, reliable, and free maps powered by OpenStreetMap.
 * Version:             1.1.1
 * Author:              Andras Guseo
 * Author URI:          https://andrasguseo.com
 * License:             GPLv2 or later
 * License URI:         https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain:         mapswap-for-the-events-calendar
 * Domain Path:         /languages
 * Requires at least:   6.7
 * Requires PHP:        8.0
 * Requires plugins:    the-events-calendar, leaflet-map
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

define( 'MAPSWAP_FOR_TEC_FILE', __FILE__ );

require_once 'src/functions/load.php';

add_action( 'plugins_loaded', 'mapswap_for_tec_load' );
