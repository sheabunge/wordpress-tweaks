# WordPress Tweaks

When building a custom theme for a client site, you're likely to include functionality that 'cleans up' the code generated by WordPress, and the admin interface. The problem is, such functionality should be in a plugin, not a theme. This plugin is a collection of tweaks that you can use to extend your WordPress site.

This plugin was designed for use with my [Theme Boilerplate](https://github.com/bungeshea/theme-boilerplate) in an attempt to separate theme and plugin functionality, however it is not specific to the boilerplate in any way, and can be used virtually anywhere.

## Usage

This plugin is meant for hacking! Dive into the code, and add or remove tweaks depending on your personal preferences, or the current project.

Install this plugin through Git:

    cd wp-content/plugins
    git clone https://github.com/bungeshea/wordpress-tweaks.git tweaks

Then, open up the plugin files and add, remove, or edit tweaks as you see fit.

## Included Tweaks

* Allow shortcodes to be used in text widgets
* Cleanup extra information that WordPress puts in the page head
* Provides a template tag to be used instead of `wp_head()` that fixes indentation, and removes unnecessary markup

### Admin

* Remove confusing sidebar widgets
* Remove unnecessary dashboard widgets
* Remove the WordPress logo and Yoast SEO menus from the admin bar
* Set the login page to use the site's name and URL
* Add a 'developed by' message in the admin footer
* Remove admin menus for non-administrators
* Hide the welcome panel
* Remove Yoast SEO page insights feature and annoying SEO admin columns
