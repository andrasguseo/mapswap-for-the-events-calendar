<?php

namespace AGU\Openstreetmap_For_Tec;

class Main {
	/**
	 * Hook common actions.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function hook(): void {
		// Enqueue scripts
		add_filter( 'tribe_template_path_list', [ $this, 'template_locations' ], 10, 2 );
	}

	/**
	 * Set up the template override folder for the extension.
	 *
	 * @param                  $folders
	 * @param \Tribe__Template $template
	 *
	 * @return array
	 */
	public function template_locations( $folders, \Tribe__Template $template ) {
		// Which file namespace your plugin will use.
		$plugin_name = 'openstreetmap-for-tec';

		/**
		 * Which order we should load your plugin files at. Plugin in which the file was loaded from = 20.
		 * Events Pro = 25. Tickets = 17
		 */
		$priority = 5;

		// Which folder in your plugin the customizations will be loaded from.
		$custom_folder[] = 'src/views';

		// Builds the correct file path to look for.
		$plugin_path = array_merge(
			(array) Plugin::get()->plugin_path,
			(array) $custom_folder,
			array_diff( $template->get_template_folder(), [ 'src', 'views' ] )
		);

		/*
		 * Custom loading location for overwriting file loading.
		 */
		$folders[ $plugin_name ] = [
			'id'        => $plugin_name,
			'namespace' => $plugin_name, // Only set this if you want to overwrite theme namespacing
			'priority'  => $priority,
			'path'      => $plugin_path,
		];

		return $folders;
	}

}
