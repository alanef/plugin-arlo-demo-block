<?php
/**
 * Plugin Name:     Arlo Demo Block
 * Description:     Arlo Demo Block
 * Version:         0.1.0
 * Author:          Alan Fuller
 * License:         GPL-2.0-or-later
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:     arlo-demo-block
 *
 * @package         create-block
 */


add_action( 'init', function() {
	register_block_type_from_metadata( __DIR__ );
} );

add_action(
/*
 *  hook: enqueue_block_assets https://developer.wordpress.org/reference/hooks/enqueue_block_assets/
 */
	'enqueue_block_assets',
	/**
	 * anonymous function(): loads up arlo script into teh block &block editor
	 */
	function () {
		/*
		 *  wp_enqueue_script https://developer.wordpress.org/reference/functions/wp_enqueue_script/
		 */
		wp_enqueue_script( 'arlo', 'https://connect.arlocdn.net/jscontrols/1.0/init.js', array('wp-blocks', 'wp-element', 'wp-components', 'wp-i18n'), '1.0', false );
		wp_enqueue_script( 'arlo-demo', plugin_dir_url( __FILE__ ). 'src/arlo-demo.js', array('wp-blocks', 'wp-element', 'wp-components', 'wp-i18n'), '1.0', false );

	}
);
