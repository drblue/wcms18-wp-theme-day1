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
	register_sidebar([
		'name'			=> 'Blog Sidebar',
		'id'			=> 'blog-sidebar',
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
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
