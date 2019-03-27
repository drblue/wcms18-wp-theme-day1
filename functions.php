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

	// Add support for Custom Logo
	add_theme_support('custom-logo', [
		'height'		=> 40,
		'width'			=> 200,
		'flex-height'	=> false,
		'flex-width'	=> true,
		'header-text'	=> ['site-title', 'site-description'],
	]);

	// Add support for Custom Header
	add_theme_support('custom-header', [
		'default-image'			=> get_stylesheet_directory_uri() . '/assets/img/default-header-image.jpg',
		'default-text-color'	=> '000',
		'width'					=> 2560,
		'height'				=> 500,
		'flex-width'			=> true,
		'flex-height'			=> true,
	]);
}
add_action('after_setup_theme', 'mbt_theme_setup');

/**
 * Function for displaying the Custom Logo
 */
function mbt_the_custom_logo() {
	// get logo media id
	$custom_logo_id = get_theme_mod('custom_logo');

	// get URL to logo
	$logo_url = wp_get_attachment_image_src($custom_logo_id, 'full');

	// do we have a custom logo set?
	if (has_custom_logo()) {
		// yes, we have a logo that we should display
		echo '<img src="' . $logo_url[0] . '" class="img-fluid" alt="Site Logo" title="' . get_bloginfo('name') . '">';
	} else {
		// no, user has not set a logo so we should display the site title instead
		bloginfo('name');
	}
}

/**
 * Filter the_content()
 */
function mbt_filter_the_content($content) {
	$bad_words = file(get_stylesheet_directory() . '/inc/bad_words.txt', FILE_IGNORE_NEW_LINES);
	$censored_words = [];

	foreach ($bad_words as $bad_word) {
		$len = strlen($bad_word);
		$censored_word = str_repeat('*', $len);
		array_push($censored_words, $censored_word);
	}

	return str_ireplace($bad_words, $censored_words, $content);
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
	return ' <div class="d-flex justify-content-end"><a href="' . get_permalink() . '" class="btn btn-primary">Läs mer &raquo;</a></div>';
}
add_filter('excerpt_more', 'mbt_filter_excerpt_more', 999, 1);
