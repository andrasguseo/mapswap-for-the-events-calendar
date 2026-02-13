<?php
/**
 * Template used for maps embedded within single events and venues.
 * This is a template override that replaces Google Maps with OpenStreetMap.
 *
 *     [your-theme]/tribe-events/modules/map.php
 *
 * @version 4.6.19
 *
 * @var $index
 * @var $width
 * @var $height
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$zoomlevel = tribe_get_option( 'osm_for_tec_zoom_level_single', '15' );

// Zoom levels 19 and 20 don't render the map.
$zoomlevel = $zoomlevel > 18 ? 18 : $zoomlevel;

$zoomcontrol = tribe_get_option( 'osm_for_tec_zoom_control_single', false );

$mapheight = tribe_get_option( 'osm_for_tec_map_container_height_single', '250' );
$mapwidth  = tribe_get_option( 'osm_for_tec_map_container_width_single', '250' );

$venue_id = tribe_get_venue_id();

/* If Events Calendar Pro is active, and we are using Lat and Lng for the venue */
if ( class_exists( 'Tribe__Events__Pro__Geo_Loc' ) && 1 == get_post_meta( $venue_id, '_VenueOverwriteCoords', true ) ) {
	$coords  = tribe_get_coordinates( $venue_id );
	$address = 'lat=' . $coords['lat'] . ' lng=' . $coords['lng'];
} else {
	/* Otherwise use the address */
	$address = tribe_get_address( $venue_id ) . ", " . tribe_get_zip( $venue_id ) . " " . tribe_get_city( $venue_id ) . ", " . tribe_get_country( $venue_id );
	$address = 'address="' . $address . '"';
}

$shortcode = '[leaflet-map ' . $address . ' zoom=' . $zoomlevel . ' zoomcontrol=' . $zoomcontrol . ' height=' . $mapheight . ' width=' . $mapwidth . ']';
$shortcode .= '[leaflet-marker]';

echo do_shortcode( $shortcode );
