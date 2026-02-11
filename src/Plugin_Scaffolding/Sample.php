<?php

namespace AGU\Plugin_Scaffolding;

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
		wp_enqueue_script( 'plugin-scaffolding', plugins_url( '/src/resources/js/plugin-scaffolding.js', dirname( __FILE__, 2 ) ), [], null, true );
	}

	/**
	 * Load styles.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function enqueue_admin_styles() {
		wp_enqueue_style( 'plugin-scaffolding', plugins_url( '/src/resources/css/plugin-scaffolding.css', dirname( __FILE__, 2 ) ) );
	}

}
