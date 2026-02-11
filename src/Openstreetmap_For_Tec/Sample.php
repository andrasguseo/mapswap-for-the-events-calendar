<?php

namespace AGU\Openstreetmap_For_Tec;

class Sample {

	/**
	 * Hook common actions.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function hook():void {
		// Enqueue scripts
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_admin_scripts' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_admin_styles' ] );
	}

	/**
	 * Load scripts.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function enqueue_admin_scripts() {
		wp_enqueue_script( 'openstreetmap-for-tec', plugins_url( '/src/resources/js/openstreetmap-for-tec.js', dirname( __FILE__, 2 ) ), [], null, true );
	}

	/**
	 * Load styles.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function enqueue_admin_styles() {
		wp_enqueue_style( 'openstreetmap-for-tec', plugins_url( '/src/resources/css/openstreetmap-for-tec.css', dirname( __FILE__, 2 ) ) );
	}

}
