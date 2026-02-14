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
		add_action( 'init', [ $this, 'common_setup' ] );

		add_filter( 'tribe_get_map_link_html', [ $this, 'alter_map_link' ] );
	}

	/**
	 * Do the things to override the templates.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function common_setup(): void {
		$this->set_up_templates();
	}

	/**
	 * Filters templates to use our overrides.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function set_up_templates(): void {
		foreach ( $this->templates() as $template => $new_template ) {
			add_filter( 'tribe_get_template_part_path_' . $template, function ( $file, $slug, $name ) use ( $new_template ) {
				// Return the path for our file.
				$new_template = Plugin::get()->plugin_path . $new_template;

				return $new_template;
			}, 10, 3 );
		}
	}

	/**
	 * The list of The Events Calendar's template files to override with
	 * which of this plugin's template files.
	 * Note: Filtering `tribe_template_path_list` doesn't work here, likely due to the 'v2' folder.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	private function templates(): array {
		$templates = [
			// Template used with the default Google Maps API key.
			'modules/map-basic.php' => 'src/views/modules/open-street-map.php',
			// Template used with a custom Google Maps API key.
			'modules/map.php'       => 'src/views/modules/open-street-map.php',
		];


		/**
		 * Filters the templates to override.
		 *
		 * @since 1.0.0
		 *
		 * @var array $templates The list of templates to override.
		 *                       Key: The original template file.
		 *                       Value: The new template file.
		 */
		$templates = apply_filters( 'openstreetmap_for_tec_templates', $templates );

		return $templates;
	}

	/**
	 * Alters the venue map link to point to OpenStreetMap.
	 *
	 * @since 1.0.0
	 *
	 * @param string $link The original map link.
	 *
	 * @return string The modified map link pointing to OpenStreetMap.
	 */
	public function alter_map_link( string $link ): string {
		$base_url = 'https://www.openstreetmap.org/search?zoom=17&query=';
		$address  = $this->get_venue_address();

		$map_link = esc_url( $base_url . $address );

		if ( ! empty( $map_link ) ) {
			$link = sprintf(
				'<a class="tribe-events-osm" href="%1$s" title="%2$s" target="_blank" rel="noreferrer noopener">%3$s</a>%4$s',
				$map_link,
				esc_html__( 'Click to view it on OpenStreetMap', 'openstreetmap-for-tec' ),
				esc_html__( '+ OpenStreetMap', 'openstreetmap-for-tec' ),
				'<span class="dashicons dashicons-external"></span>'
			);
		}

		return $link;
	}

	/**
	 * Compile the venue address into a single string.
	 *
	 * @since 1.0.0
	 *
	 * @return string The URL encoded venue address.
	 */
	private function get_venue_address(): string {
		$venue_id = get_the_ID();

		$a = [];

		$a['address'] = tribe_get_address( $venue_id );
		$a['city']    = tribe_get_city( $venue_id );
		$a['region']  = tribe_get_region( $venue_id );
		$a['zip']     = tribe_get_zip( $venue_id );
		$a['country'] = tribe_get_country( $venue_id );

		return urlencode( trim( implode( ' ', $a ) ) );
	}
}
