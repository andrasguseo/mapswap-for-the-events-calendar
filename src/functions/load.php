<?php

function openstreetmap_for_tec_load() {
	// Last file that needs to be loaded manually.
	require_once dirname( __DIR__ ) . '/Openstreetmap_For_Tec/Plugin.php';

	// Load the plugin, autoloading happens here.
	AGU\Openstreetmap_For_Tec\Plugin::boot( OPENSTREETMAP_FOR_TEC_FILE );
}
