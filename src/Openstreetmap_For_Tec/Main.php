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
			'modules/map.php'       => 'src/views/modules/open-street-map.php',
			'modules/map-basic.php' => 'src/views/modules/open-street-map.php',
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
}
