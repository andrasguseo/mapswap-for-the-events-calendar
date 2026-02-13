<?php

namespace AGU\Openstreetmap_For_Tec;

class Plugin {

	/**
	 * Stores plugin file name.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public string $plugin_file;

	/**
	 * Stores plugin path.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public string $plugin_path;

	/**
	 * Stores plugin dir.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public string $plugin_dir;

	/**
	 * Stores plugin url.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public string $plugin_url;

	/**
	 * Stores Plugin instance.
	 *
	 * @since 1.0.0
	 *
	 * @var Plugin
	 */
	protected static Plugin $instance;

	/**
	 * Stores Sample class instance.
	 *
	 * @since 1.0.0
	 *
	 * @var Sample
	 */
	public Sample $sample;

	/**
	 * Stores Main class instance.
	 *
	 * @since 1.0.0
	 *
	 * @var Main
	 */
	public Main $main;

	/**
	 * Stores Setting class instance.
	 *
	 * @since 1.0.0
	 *
	 * @var Settings
	 */
	public Settings $settings;

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	protected function __construct() {
		// Intentionally empty.
	}

	/**
	 * Boot.
	 *
	 * @since 1.0.0
	 *
	 * @param string $file The main plugin file.
	 *
	 * @return Plugin
	 */
	public static function boot( string $file ): self {
		$plugin = new static();
		$plugin->set_file_path( $file );
		$plugin->register_autoloader();

		$plugin->register();
		static::$instance = $plugin;

		return $plugin;
	}

	/**
	 * Get Plugin instance.
	 *
	 * @since 1.0.0
	 *
	 * @return self
	 */
	public static function get(): self {
		return static::$instance;
	}

	/**
	 * Set up plugin variables.
	 *
	 * @since 1.0.0
	 *
	 * @param string $file The main plugin file.
	 *
	 * @return void
	 */
	protected function set_file_path( string $file ): void {
		$this->plugin_file = $file;
		$this->plugin_path = trailingslashit( dirname( $file ) );
		$this->plugin_dir  = trailingslashit( basename( $this->plugin_path ) );
		$this->plugin_url  = plugins_url( $this->plugin_dir, $this->plugin_path );
	}

	/**
	 * Register autoloader.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	protected function register_autoloader(): void {
		require_once $this->plugin_path . "vendor/autoload.php";
	}

	/**
	 * Register classes.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	protected function register(): void {
		$this->main = new Main();
		$this->settings = new Settings();

		$this->main->hook();
		$this->settings->hook();
	}
}
