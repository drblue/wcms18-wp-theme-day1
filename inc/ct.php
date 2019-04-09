<?php

function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Topics.
	 */

	$labels = array(
		"name" => __( "Topics", "mybasictheme" ),
		"singular_name" => __( "Topic", "mybasictheme" ),
	);

	$args = array(
		"label" => __( "Topics", "mybasictheme" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'faq-topics', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "mbt_faq_topic",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "mbt_faq_topic", array( "mbt_faq" ), $args );

	/**
	 * Taxonomy: Genres.
	 */

	$labels = array(
		"name" => __( "Genres", "mybasictheme" ),
		"singular_name" => __( "Genre", "mybasictheme" ),
	);

	$args = array(
		"label" => __( "Genres", "mybasictheme" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'genres', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "mbt_movie_genre",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "mbt_movie_genre", array( "mbt_movie_review" ), $args );

	/**
	 * Taxonomy: Actors.
	 */

	$labels = array(
		"name" => __( "Actors", "mybasictheme" ),
		"singular_name" => __( "Actor", "mybasictheme" ),
	);

	$args = array(
		"label" => __( "Actors", "mybasictheme" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => false,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'actors', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "mbt_actor",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "mbt_actor", array( "mbt_movie_review" ), $args );
}
add_action( 'init', 'cptui_register_my_taxes' );
