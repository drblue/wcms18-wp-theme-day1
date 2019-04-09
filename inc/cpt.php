<?php

function cptui_register_my_cpts() {

	/**
	 * Post Type: FAQs.
	 */

	$labels = array(
		"name" => __( "FAQs", "mybasictheme" ),
		"singular_name" => __( "FAQ", "mybasictheme" ),
		"all_items" => __( "All FAQs", "mybasictheme" ),
	);

	$args = array(
		"label" => __( "FAQs", "mybasictheme" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "faqs", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor" ),
		"taxonomies" => array( "mbt_faq_topic" ),
	);

	register_post_type( "mbt_faq", $args );

	/**
	 * Post Type: Movie Reviews.
	 */

	$labels = array(
		"name" => __( "Movie Reviews", "mybasictheme" ),
		"singular_name" => __( "Movie Review", "mybasictheme" ),
	);

	$args = array(
		"label" => __( "Movie Reviews", "mybasictheme" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "movie-reviews", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "mbt_movie_review", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );
