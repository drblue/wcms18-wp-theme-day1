<?php

require("inc/bs4navwalker.php");

/**
 * Register menus for our theme.
 *
 * @return void
 */
function mbt_register_menus() {
	register_nav_menus([
		'main-menu' => 'Main Menu',
	]);
}
add_action('init', 'mbt_register_menus');

/**
 * Register Theme Widget Areas.
 *
 * @return void
 */
function mbt_widgets_init() {
	// Blog Sidebar Widget Area
	register_sidebar([
		'name'			=> 'Blog Sidebar',
		'id'			=> 'blog-sidebar',
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h1 class="widget-title">',
		'after_title'	=> '</h1>',
	]);

	// Page Sidebar Widget Area
	register_sidebar([
		'name'			=> 'Page Sidebar',
		'id'			=> 'page-sidebar',
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h1 class="widget-title">',
		'after_title'	=> '</h1>',
	]);

	// Footer Widget Area
	register_sidebar([
		'name'			=> 'Footer Area',
		'id'			=> 'footer-widgets',
		'before_widget'	=> '<div id="%1$s" class="col widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h1 class="widget-title">',
		'after_title'	=> '</h1>',
	]);
}
add_action('widgets_init', 'mbt_widgets_init');

/**
 * Register scripts and styles for our theme.
 *
 * @return void
 */
function mbt_register_scripts_and_styles() {
	/**
	 * Styles
	 */

	// Add Bootstrap CSS
	wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', [], '4.3.1', 'all');

	// Add Theme CSS
	wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css', ['bootstrap']);

	// Add Theme Print CSS
	wp_enqueue_style('print-style', get_stylesheet_directory_uri() . '/assets/css/print.css', ['bootstrap', 'style'], null, 'print');

	/**
	 * Scripts
	 */

	// Remove WordPress jQuery
	wp_deregister_script('jquery');

	// Add jQuery
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.3.1.slim.min.js', [], '3.3.1', true);

	// Add popper.js
	wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', ['jquery'], '1.14.7', true);

	// Add bootstrap.js
	wp_enqueue_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', ['jquery', 'popper'], '4.3.1', true);
}
add_action('wp_enqueue_scripts', 'mbt_register_scripts_and_styles');

/**
 * Theme Setup Declaration
 */
function mbt_theme_setup() {
	// Add support for Featured Images
	add_theme_support('post-thumbnails');

	// Set Image Size for Blog Thumbnail
	set_post_thumbnail_size(180, 0, false);

	// Add Image Size for Single Post Featured Image
	add_image_size('featured-image', 1110, 0, false);
}
add_action('after_setup_theme', 'mbt_theme_setup');

/**
 * Filter the_content()
 */
function mbt_filter_the_content($content) {
	return $content;
}
add_filter('the_content', 'mbt_filter_the_content', 10, 1);

/**
 * Filter the_title()
 */
function mbt_filter_the_title($title) {
	if (in_the_loop() && is_single()) {
		$title = $title . " (I was here)";
	}
	return $title;
}
add_filter('the_title', 'mbt_filter_the_title', 10, 1);

/**
 * Restrict the_excerpt to 20 words.
 */
function mbt_filter_excerpt_length($length) {
	return 20;
}
add_filter('excerpt_length', 'mbt_filter_excerpt_length', 999, 1);

/**
 * Modify excerpt suffix.
 */
function mbt_filter_excerpt_more($more) {
	return " Läs mer &raquo;";
}
add_filter('excerpt_more', 'mbt_filter_excerpt_more', 999, 1);
