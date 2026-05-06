<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! function_exists( 'mapswap_get_option' ) ) {
	/**
	 * Wrapper around tribe_get_option() that falls back to the default when the
	 * stored value is an empty string or null. tribe_get_option() only applies
	 * its default when the option key is missing entirely, so a saved blank
	 * field would otherwise slip through as a valid value.
	 *
	 * @since 1.1.1
	 *
	 * @param string     $key     The option key to retrieve.
	 * @param mixed|null $default The fallback value if the stored value is empty.
	 *
	 * @return mixed
	 */
	function mapswap_get_option( string $key, mixed $default = null ): mixed {
		$value = tribe_get_option( $key, $default );

		return ( '' === $value || null === $value ) ? $default : $value;
	}
}
