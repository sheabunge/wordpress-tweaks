<?php

/**
 * Plugin Name: Tweaks
 * Plugin URI:  https://github.com/bungeshea/wordpress-tweaks
 * Description: Functionality used to tweak your WordPress site
 * Author:      Shea Bunge
 * Author URI:  http://bungeshea.com
 * License:     MIT
 * License URI: http://opensource.org/licenses/MIT
 */

/**
 * Include tweaks for the admin dashboard
 */
require plugin_dir_path( __FILE__ ) . '/admin.php';


/**
 * Allow shortcodes to be used in the text widgets
 */
add_filter( 'widget_text', 'do_shortcode' );

/**
 * Clean up the extra information
 * that WordPress puts in the head
 *
 * @uses   remove_action()
 * @return void
 */
function tweaks_head_cleanup() {

	/* Category feeds */
#	remove_action( 'wp_head', 'feed_links_extra', 3 );

	/* Post and comment feeds */
#	remove_action( 'wp_head', 'feed_links', 2 );

	/* EditURI link */
	remove_action( 'wp_head', 'rsd_link' );

	/* Windows Live Writer */
	remove_action( 'wp_head', 'wlwmanifest_link' );

	/* Index link */
#	remove_action( 'wp_head', 'index_rel_link' );

	/* Previous link */
#	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );

	/* Start link */
#	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );

	/* Links for adjacent posts */
#	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

	/* WordPress version */
	remove_action( 'wp_head', 'wp_generator' );
}

add_action( 'init', 'tweaks_head_cleanup' );
