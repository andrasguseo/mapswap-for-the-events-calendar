<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
function alternative_maps_for_tec_load() {
	// Last file that needs to be loaded manually.
	require_once dirname( __DIR__ ) . '/Alternative_Maps_For_Tec/Plugin.php';

	// Load the plugin, autoloading happens here.
	AGU\Alternative_Maps_For_Tec\Plugin::boot( ALTERNATIVE_MAPS_FOR_TEC_FILE );
}
