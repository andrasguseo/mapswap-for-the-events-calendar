<?php
/**
 * Plugin Name:         OpenStreetMap for TEC
 * Description:         Replaces Google Maps with OpenStreetMap in The Events Calendar.
 * Version:             1.0.0
 * Author:              Andras Guseo
 * Author URI:          https://andrasguseo.com
 * License:             GPL-2.0+
 * License URI:         http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:         openstreetmap-for-tec
 * Domain Path:         /languages
 * Requires at least:   5.0
 * Requires PHP:        8.0
 * Requires plugins:    the-events-calendar, leaflet-map
 */

define ( 'OPENSTREETMAP_FOR_TEC_FILE', __FILE__ );

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

require_once 'src/functions/load.php';

add_action( 'plugins_loaded', 'openstreetmap_for_tec_load' );
