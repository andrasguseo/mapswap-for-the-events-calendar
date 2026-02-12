<?php

namespace AGU\Openstreetmap_For_Tec;

use TEC\Common\Admin\Entities\Div;
use TEC\Common\Admin\Entities\Heading;
use TEC\Common\Admin\Entities\Paragraph;
use TEC\Common\Admin\Entities\Plain_Text;
use Tribe\Utils\Element_Classes as Classes;

class Settings {
	/**
	 * Option prefix for storing settings.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	const OPTION_PREFIX = 'osm_for_tec_';

	/**
	 * Hook common actions.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function hook(): void {
		add_filter( 'tec_events_settings_display_maps_section', [ $this, 'add_settings' ], 100 );
	}

	/**
	 * Adds a new section of fields to Events > Settings > Display tab > Maps subtab.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public function add_new_settings_fields(): array {
		$fields = [
			Settings::OPTION_PREFIX . 'general' => [
				'type' => 'html',
				'html' => '<h3 class="tec-settings-form__section-header tec-settings-form__section-header--sub">' . esc_html__( 'OpenStreetMaps', 'openstreetmap-for-tec' ) . '</h3>',
			],
			Settings::OPTION_PREFIX . 'zoom_control' => [
				'type'            => 'checkbox_bool',
				'label'           => esc_html_x( 'Enable zoom control', 'option label', 'openstreetmap-for-tec' ),
				'tooltip'         => esc_html__( 'Check to enable zoom control buttons on the map.', 'openstreetmap-for-tec' ),
				'validation_type' => 'boolean',
			],
			Settings::OPTION_PREFIX . 'zoom_level_single' => [
				'type'            => 'text',
				'label'           => esc_html_x( 'Default zoom level', 'option label', 'openstreetmap-for-tec' ),
				'tooltip'         => $this->get_default_zoom_level_tooltip(),
				'size'            => 'small',
				'validation_type' => 'number_or_percent',
			],
			Settings::OPTION_PREFIX . 'map_container_height' => [
				'type'            => 'text',
				'label'           => esc_html_x( 'Default height of map', 'option label', 'openstreetmap-for-tec' ),
				'tooltip'         => $this->get_map_container_height_tooltip(),
				'size'            => 'small',
				'validation_type' => 'number_or_percent',
				'can_be_empty'    => true,
			],
		];

		$fields = tribe( 'settings' )->wrap_section_content( 'tec-events-settings-calendar-template', $fields );

		return $fields;
	}

	/**
	 * Add the plugin's settings.
	 *
	 * @param array $settings Array of settings.
	 *
	 * @return array
	 */
	public function add_settings( array $settings ): array {
		// Add a new heading to the maps settings.
		$osm_header = [
			'tec-settings-form__header-block' => ( new Div( new Classes( [ 'tec-settings-form__header-block', 'tec-settings-form__header-block--horizontal' ] ) ) )->add_children(
				[
					new Heading(
						_x( 'Maps', 'Maps display settings header', 'openstreetmap-for-tec' ),
						2,
						new Classes( [ 'tec-settings-form__section-header' ] )
					),
					( new Paragraph( new Classes( [ 'tec-settings-form__section-description' ] ) ) )->add_child(
						new Plain_Text(
							__(
								"The settings below control the display of maps for your events.",
								'openstreetmap-for-tec'
							)
						)
					),
				]
			),
		];

		// Change the formating of the original title. Adds the 'tec-settings-form__section-header--sub' class.
		$settings['tribe-google-maps-settings-title']['html'] = '<h3 id="tec-settings-events-settings-display-maps" class="tec-settings-form__section-header tec-settings-form__section-header--sub">General</h3>';

		// Wrap the original settings in a section.
		$settings = tribe( 'settings' )->wrap_section_content( 'tec-settings-events-settings-display-maps', $settings );

		// Merge all the settings. (New header, TEC settings, OSM settings)
		$new_settings = array_merge( $osm_header, $settings, $this->add_new_settings_fields() );

		return $new_settings;
	}

	/**
	 * The tooltip for the default zoom level setting.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	private function get_default_zoom_level_tooltip(): string {
		$tooltip = esc_html__( 'Default zoom level for single event page and venue page*.', 'openstreetmap-for-tec' );
		$tooltip .= " ";
		$tooltip .= esc_html__( '0 = zoomed out; 18 = zoomed in.', 'openstreetmap-for-tec' );
		$tooltip .= sprintf(
		// Translators: %1$s: line break and opening emphasis tag, %2$s: link to 3rd-party plugin, %3$s: closing emphasis tag.
			esc_html__(
				'%1$s*Note: Venue page requires %2$s%3$s.',
				'openstreetmap-for-tec'
			),
			'<br><em>',
			'<a href="https://theeventscalendar.com/products/wordpress-events-calendar/" target="_blank">Events Calendar Pro</a> <span class="dashicons dashicons-external"></span>',
			'</em>',
		);

		return $tooltip;
	}

	/**
	 * The tooltip for the default map container height setting.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	private function get_map_container_height_tooltip(): string {
		$tooltip = esc_html__( 'Defaults to 250px when left empty.', 'openstreetmap-for-tec' );
		$tooltip .= " ";
		$tooltip .= esc_html__( 'Affects single event page and venue page*.', 'openstreetmap-for-tec' );
		$tooltip .= sprintf(
		// Translators: %1$s: line break and opening emphasis tag, %2$s: link to 3rd-party plugin, %3$s: closing emphasis tag.
			esc_html__(
				'%1$s*Note: Venue page requires %2$s%3$s.',
				'openstreetmap-for-tec'
			),
			'<br><em>',
			'<a href="https://theeventscalendar.com/products/wordpress-events-calendar/" target="_blank">Events Calendar Pro</a> <span class="dashicons dashicons-external"></span>',
			'</em>',
		);

		return $tooltip;
	}
}
