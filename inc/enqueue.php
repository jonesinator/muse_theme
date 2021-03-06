<?php
/**
 * Understrap enqueue scripts
 *
 * @package understrap
 */

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme = wp_get_theme();
		wp_enqueue_style( 'understrap-styles', get_stylesheet_directory_uri() . '/css/theme.min.css', array(), $the_theme->get( 'Version' ), false );
		wp_enqueue_script( 'schema', get_template_directory_uri() . '/js/schema.js', array(), false );
		wp_enqueue_script( 'jquery');
		wp_enqueue_script( 'price-format', get_template_directory_uri() . '/js/price-format.js', array(), true );
		wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), true);
		wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $the_theme->get( 'Version' ), true );
		wp_enqueue_script( 'moment-custom', get_template_directory_uri() . '/js/moment-custom.js', array(), true );
		wp_enqueue_script( 'bootstrap-date-picker', get_template_directory_uri() . '/js/bootstrap-date-picker.js', array(), true );
		wp_enqueue_script( 'handlebars', get_template_directory_uri() . '/js/handlebars.js', array(), true );
		wp_enqueue_script( 'alpaca', get_template_directory_uri() . '/js/alpaca.js', array(), true );
		wp_enqueue_script( 'spin', get_template_directory_uri() . '/js/spin.js', array(), true );
		wp_enqueue_script( 'ladda', get_template_directory_uri() . '/js/ladda.js', array(), true );
		wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/js/lightbox.js', array(), true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );
