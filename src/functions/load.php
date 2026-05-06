<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

require_once __DIR__ . '/helpers.php';

function mapswap_for_tec_load() {
	// Last file that needs to be loaded manually.
	require_once dirname( __DIR__ ) . '/MapSwap_For_TEC/Plugin.php';

	// Load the plugin, autoloading happens here.
	AGU\MapSwap_For_TEC\Plugin::boot( MAPSWAP_FOR_TEC_FILE );
}
