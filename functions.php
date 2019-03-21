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
	// Add Bootstrap CSS
	wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', [], '4.3.1', 'all');

	// Add Theme CSS
	wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css', ['bootstrap']);
}
add_action('wp_enqueue_scripts', 'mbt_register_scripts_and_styles');
