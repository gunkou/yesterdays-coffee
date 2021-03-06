<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package yesterdays-coffee
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function yesterdays_coffee_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'yesterdays_coffee_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function yesterdays_coffee_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'yesterdays_coffee_pingback_header' );

// 不要そうなmeta要素を削除
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head','rest_output_link_wp_head');
remove_action('wp_head','adjacent_posts_rel_link_wp_head');


// タグ
function custom_tag_cloud($args) {
        $custom_args = array(
                'smallest'  => 100,
                'largest'   => 100,
                'unit'      => '%',
                'format'    => 'list',
        );
        $args = wp_parse_args( $args, $custom_args );
        return $args;
}
add_filter( 'widget_tag_cloud_args', 'custom_tag_cloud');
