<?php

/**
 * This file handles tweaking the admin area.
 *
 * @package    Tweaks
 * @subpackage Administration
 */

/**
 * Remove the Welcome Panel
 */
remove_action( 'welcome_panel', 'wp_welcome_panel' );

/**
 * Remove Yoast SEO page analysis features and annoying SEO columns
 */
add_filter( 'wpseo_use_page_analysis', '__return_false' );

/**
 * Disable some of the dashboard widgets that
 * are included with WordPress Core and some
 * popular plugins.
 *
 * Remove or comment-out lines as appropriate
 *
 * @uses   remove_meta_box()
 * @return void
 */
function disable_default_dashboard_widgets() {

	/* Right Now */
#	remove_meta_box( 'dashboard_right_now', 'dashboard', 'core' );

	/* Comments */
#	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'core' );

	/* Incoming Links */
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'core' );

	/* Plugins */
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'core' );

	/* QuickPress */
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'core' );

	/* Recent Drafts */
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'core' );

	/* WordPress Blog */
	remove_meta_box( 'dashboard_primary', 'dashboard', 'core' );

	/* Other WordPress News */
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'core' );

	/* Yoast SEO */
	remove_meta_box( 'yoast_db_widget', 'dashboard', 'normal' );
}

add_action( 'admin_init', 'disable_default_dashboard_widgets' );

/**
 * Remove some of the default widgets that
 * will just confuse people
 *
 * @uses   unregister_widget()
 * @return void
 */
function tweaks_unregister_widgets() {
	unregister_widget( 'WP_Widget_Calendar' );
	unregister_widget( 'WP_Widget_Links' );
	unregister_widget( 'WP_Widget_Meta' );
	unregister_widget( 'WP_Widget_Recent_Comments' );
}

add_action( 'widgets_init', 'tweaks_unregister_widgets', 11 );


/**
 * Remove menus from the admin bar
 *
 * @uses   $wp_admin_bar
 * @return void
 */
function tweaks_admin_bar() {
	global $wp_admin_bar;

	/* WordPress Logo */
	$wp_admin_bar->remove_menu( 'wp-logo' );

	/* Yoast SEO */
	$wp_admin_bar->remove_menu( 'wpseo-menu' );
}

add_action( 'wp_before_admin_bar_render', 'tweaks_admin_bar' );

/**
 * Change the link on the login logo
 * from WordPress.org to the site's homepage
 *
 * @uses   home_url()
 * @return string     The site's homepage URL
 */
function tweaks_login_url() {
	return home_url();
}

add_filter( 'login_headerurl', 'tweaks_login_url' );

/**
 * Change the hover text on the login logo to the site name
 *
 * @uses   get_option()
 * @return string       The site name
 */
function tweaks_login_title() {
	return get_option( 'blogname' );
}

add_filter( 'login_headertitle', 'tweaks_login_title' );

/**
 * Add a personal message in the admin footer.
 *
 * @uses   wp_get_theme()  To get data from the active theme
 * @param  string $content The original admin footer
 * @return string          The modified admin footer
 */
function tweaks_custom_admin_footer( $content ) {
	return $content . sprintf (
		__( ' Site developed by <a href="%2$s">%1s</a>.', 'tweaks' ),
		wp_get_theme()->get( 'Author' ),
		wp_get_theme()->get( 'AuthorURI' )
	);
}

add_filter( 'admin_footer_text', 'tweaks_custom_admin_footer' );

/**
 * Hide admin menu items
 *
 * @uses   current_user_can() To check if the logged in user is an administrator
 * @uses   remove_menu_page()
 * @return void
 */
function tweaks_remove_menus() {

	/* Check if the logged in user is an administrator */
	if ( ! current_user_can( 'manage_options' ) ) {

		/* Jetpack */
		remove_menu_page( 'jetpack' );

		/* Settings */
		remove_menu_page( 'options-general.php' );

		/* Tools */
		remove_menu_page( 'tools.php' );
	}
}

add_action( 'admin_menu', 'tweaks_remove_menus' );
