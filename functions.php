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
