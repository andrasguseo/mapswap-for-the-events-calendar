<?php

function plugin_scaffolding_load() {
	// Last file that needs to be loaded manually.
	require_once dirname( __DIR__ ) . '/Plugin_Scaffolding/Plugin.php';

	// Load the plugin, autoloading happens here.
	AGU\Plugin_Scaffolding\Plugin::boot( PLUGIN_SCAFFOLDING_FILE );
}