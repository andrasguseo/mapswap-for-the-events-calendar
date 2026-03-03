<?php
namespace AGU\Alternative_Maps_For_Tec;

use TEC\Common\Admin\Entities\Div;
use TEC\Common\Admin\Entities\Heading;
use TEC\Common\Admin\Entities\Paragraph;
use TEC\Common\Admin\Entities\Plain_Text;
use Tribe\Utils\Element_Classes as Classes;
use Tribe\Utils\Element_Attributes as Attributes;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

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
		$header = [
			Settings::OPTION_PREFIX . 'osm-header-block' => ( new Div( new Classes( [
				'tec-settings-form__header-block',
				'tec-settings-form__header-block--horizontal'
			] ) ) )->add_children(
				[
					new Heading(
						_x( 'OpenStreetMap', 'OpenStreetMap settings header', 'alternative-maps-for-tec' ),
						2,
						new Classes( [ 'tec-settings-form__section-header' ] ),
						new Attributes( [ 'id' => 'osm-settings' ] ),
					),
					( new Paragraph( new Classes( [ 'tec-settings-form__section-description' ] ) ) )->add_child(
						new Plain_Text(
							__(
								'These are the settings for OpenStreetMap.',
								'alternative-maps-for-tec'
							)
						)
					),
				]
			)
		];

		$fields = [
			Settings::OPTION_PREFIX . 'general'              => [
				'type' => 'html',
				'html' => '<h3 class="tec-settings-form__section-header tec-settings-form__section-header--sub">' . esc_html__( 'Single Event Page', 'alternative-maps-for-tec' ) . '</h3>',
			],
			Settings::OPTION_PREFIX . 'zoom_control_single'  => [
				'type'            => 'checkbox_bool',
				'label'           => esc_html_x( 'Enable zoom control', 'option label', 'alternative-maps-for-tec' ),
				'tooltip'         => esc_html__( 'Check to enable zoom control buttons on the map.', 'alternative-maps-for-tec' ),
				'validation_type' => 'boolean',
			],
			Settings::OPTION_PREFIX . 'zoom_level_single'    => [
				'type'            => 'text',
				'label'           => esc_html_x( 'Default zoom level', 'option label', 'alternative-maps-for-tec' ),
				'tooltip'         => esc_html__( '0 = zoomed out; 18 = zoomed in.', 'alternative-maps-for-tec' ),
				'size'            => 'small',
				'validation_type' => 'number_or_percent',
			],
			Settings::OPTION_PREFIX . 'map_container_height_single' => [
				'type'            => 'text',
				'label'           => esc_html_x( 'Default height of map', 'option label', 'alternative-maps-for-tec' ),
				'tooltip'         => esc_html__( 'Defaults to 250px when left empty.', 'alternative-maps-for-tec' ) . $this->get_tooltip_note(),
				'size'            => 'small',
				'validation_type' => 'number_or_percent',
				'can_be_empty'    => true,
			],
			Settings::OPTION_PREFIX . 'map_container_width_single' => [
				'type'            => 'text',
				'label'           => esc_html_x( 'Default width of map', 'option label', 'alternative-maps-for-tec' ),
				'tooltip'         => esc_html__( 'Defaults to 250px when left empty.', 'alternative-maps-for-tec' ) . $this->get_tooltip_note(),
				'size'            => 'small',
				'validation_type' => 'number_or_percent',
				'can_be_empty'    => true,
			],
		];

		$fields = tribe( 'settings' )->wrap_section_content( 'tec-events-settings-calendar-maps-osm-single', $fields );

		return array_merge( $header, $fields );
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
		$new_maps_header = [
			'tec-settings-form__header-block' => ( new Div( new Classes( [
				'tec-settings-form__header-block',
				'tec-settings-form__header-block--horizontal'
			] ) ) )->add_children(
				[
					new Heading(
						_x( 'Maps', 'Maps display settings header', 'alternative-maps-for-tec' ),
						2,
						new Classes( [ 'tec-settings-form__section-header' ] )
					),
					( new Paragraph( new Classes( [ 'tec-settings-form__section-description' ] ) ) )->add_child(
						new Plain_Text(
							__(
								'The settings below control the display of maps for your events.',
								'alternative-maps-for-tec'
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
		$new_settings = array_merge( $new_maps_header, $settings, $this->add_new_settings_fields() );

		return $new_settings;
	}

	/**
	 * @return string
	 */
	public static function get_tooltip_note(): string {
		$tooltip = '<br>';
		$tooltip .= '<em>';
		$tooltip .= esc_html__( 'The actual dimensions can be limited by the styling of the container.', 'alternative-maps-for-tec' );
		$tooltip .= '</em>';

		return $tooltip;
	}

}
