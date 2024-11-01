<?php
/**
 * Plugin Name: Twitter Profile Field
 * Plugin URI: http://jayj.dk/plugins/twitter-profile-field/
 * Description: Adds an additional field to the user profile page where the user can enter their Twitter username.
 * Author: Jesper Johansen
 * Author URI: http://jayj.dk
 * Version: 1.5.0
 * License: GPLv2 or later
 * Text Domain: twitter-profile-field
 * Domain Path: /languages
 */

class Twitter_Profile_Field {

	/**
	 * Constructor method.
	 *
	 * @since 1.5.0
	 */
	public function __construct() {

		/* Internationalize the text strings used. */
		add_action( 'plugins_loaded', array( $this, 'i18n' ), 2 );

		/* Register the shortcode on 'init'. */
		add_action( 'init', array( $this, 'register_shortcode' ) );

		/* Add the Twitter username field. */
		add_filter( 'user_contactmethods', array( $this, 'profile_field' ) );

		/* Allow the shortcode to be used in text widgets. */
		add_filter( 'widget_text', 'do_shortcode' );
	}

	/**
	 * Loads the translation files
	 *
	 * @since  1.5.0
	 * @access public
	 * @return void
	 */
	public function i18n() {
		load_plugin_textdomain( 'twitter-profile-field', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}

	/**
	 * Creates Twitter Username field
	 *
	 * @since  1.5.0
	 * @access public
	 * @param  array $contactmethods The registered contact methods
	 * @return array
	 */
	public function profile_field( $contactmethods ) {
		$contactmethods['twitter'] = __( 'Twitter username', 'twitter-profile-field' );

		return $contactmethods;
	}

	/**
	 * Registers the [twitter-user] shortcode
	 *
	 * @since  1.5.0
	 * @access public
	 * @return void
	 */
	public function register_shortcode() {
		add_shortcode( 'twitter-user', array( $this, 'do_shortcode' ) );
	}

	/**
	 * Returns the content of the twitter-user shortcode
	 *
	 * @since  1.5.0
	 * @access public
	 * @param  array  $attr The user-inputted arguments.
	 * @return string
	 */
	public function do_shortcode( $attr ) {
		$attr = shortcode_atts( array(
			'link'   => '', // Any value will display the link
			'title'  => '',
			'userid' => ''
		), $attr, 'twitter_profile_field' );

		/* Get the Twitter username. */
		$username = get_the_author_meta( 'twitter', $attr['userid'] );

		/* Return the username with link. */
		if ( ! empty( $attr['link'] ) ) {

			return sprintf( '<a href="%s" title="%s" class="twitter-profile">%s</a>',
				esc_url( "https://twitter.com/{$username}" ),
				esc_attr( $attr['title'] ),
				$username
			);

		}

		/* Return the username. */
		return $username;
	}
}

$twitter_profile_field = new Twitter_Profile_Field();

?>
