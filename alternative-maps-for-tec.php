<?php
/**
 * Plugin Name:         Alternative Maps for The Events Calendar
 * Description:         Replaces Google Maps with OpenStreetMap in The Events Calendar.
 * Version:             1.0.0
 * Author:              Andras Guseo
 * Author URI:          https://andrasguseo.com
 * License:             GPLv2 or later
 * License URI:         https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain:         alternative-maps-for-tec
 * Domain Path:         /languages
 * Requires at least:   6.7
 * Requires PHP:        8.0
 * Requires plugins:    the-events-calendar, leaflet-map
 */

define( 'ALTERNATIVE_MAPS_FOR_TEC_FILE', __FILE__ );

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

require_once 'src/functions/load.php';

add_action( 'plugins_loaded', 'alternative_maps_for_tec_load' );
